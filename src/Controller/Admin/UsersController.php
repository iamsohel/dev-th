<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

class UsersController extends AppController
{
    public function initialize() {

        parent::initialize();
        $this->Auth->allow('activate');
        $this->Auth->allow('register');
        $this->Auth->allow('forgotPassword');
        $this->Auth->allow(['cpassword']);
    }

     /**
     * User login 
     * @return type
     */
    public function login() {
        $this->viewBuilder()->layout('admin_login');
        if (!empty($this->request->data)) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                $options = array('content_id' => $this->Auth->user('id'), 'user_id' => $this->Auth->user('id'), 'type' => 'login', 'action' => 'success');
                $this->addNotification($options);
                $this->redirect('/admin/dashboard');
            } else {
                $this->Flash->error('Email or Password is incorrect');
            }
        }
    }

    /**
     * Index method
     */
    public function index()
    {
        $this->loadComponent('Paginator');
        $this->add_model(array('Users'));
        $conditions = [];
        $options = $this->request->data;
        $search = false;
        if (!empty($options['reset']) && ($options['reset'] == 'reset')) { // Reset list
            $this->Session->delete('Users.search');
            $this->request->data = $options = array();
        }
        if (!empty($options['search']) && ($options['search'] == 'submit')) { // searc submit and & set session params
            $this->Session->write('Users.Search', $options);
            $search = true;
        }
        if (!empty($options['name'])) {
            $conditions = array_merge(array("Users.name LIKE '%" . $options['name'] . "%'"), $conditions);
        }
        if (!empty($options['email'])) {
            $conditions = array_merge(array("Users.email LIKE '%" . $options['email'] . "%'"), $conditions);
        }
        if (!empty($options['status'])) {
            $options['status'] = ($options['status'] == 2) ? 0 : 1;
            $conditions = array_merge(array("Users.status" => $options['status']), $conditions);
        }

        $this->paginate = [
            'limit' => 25,
            'order' => [
                'Users.name' => 'asc'
            ],
            'conditions' => $conditions,
            'contain'=>'Categories'
        ];
        $users = $this->paginate('Users')->toArray();
        $this->set('search', $search);
        $this->set(compact('users'));
    }

    /** User accout activation after registration */
    public function activate($activation_key) {
        $this->viewBuilder()->layout(false);
        $this->autoRender = false;
        if (!empty($activation_key)) {
            $check_user = $this->User->find()->where(['activation_key' => $activation_key])->first();
            if (!empty($check_user)) {
                // $this->User->id = $check_user['id'];
                $check_user->status = 1;
                $check_user->activation_key = '';
                $this->User->save($check_user);
                $this->Flash->success('Your account activated successfully');
                $options = array('content_id' => $check_user['id'], 'user_id' => $check_user['id'], 'type' => 'register', 'action' => 'activate');
                $this->addNotification($options);
            } else {
                $this->Flash->error('Invalid activation code');
            }
        } else {
            $this->Flash->error('Invalid activation code');
        }
        $this->redirect('/users/login');
    }

    /** User chang password after clicking from email  */
    public function cpassword($activation_code = null) {
         $this->viewBuilder()->layout('main_site');
        if (!empty($activation_code)) {
            $check_user = $this->User->find()->where(['activation_key' => $activation_code])->first();
            if (empty($check_user)) {
                $this->Flash->error('Invalid Activation Code');
                $this->redirect('/users/login');
            } else {
                if (!empty($this->request->data)) {
                    $check_user->password = (new \Cake\Auth\DefaultPasswordHasher)->hash($this->request->data['password']);
                    $check_user->activation_key = '';
                    if ($this->User->save($check_user)) {
                        $this->Flash->success('Password Changed Successfully');
                        $this->redirect('/users/login');
                    }
                }
            }
        } else {
            $this->Flash->error('Invalid Activation Code');
        }


        $this->set('activation_key', $activation_code);
    }

    /**
     * change user profile image
     * @param type $user_id

    /** User Forgot Password & send email to change password */
    public function forgotPassword() {
        $this->viewBuilder()->layout('user_login');
        if (!empty($this->request->data)) {
            $email = $this->request->data['email'];
            if (!empty($email)) {
                $user = $this->User->find()->where(['email' => $email])->first();
                if (empty($user)) {
                    $this->Flash->error(Configure::read('ErrorsCodes.7'));
                } else {
                    $activation = md5($this->randomnum(8));
                    $params = array('activation_key' => $activation);
                    $user->activation_key = $activation;
                    if ($this->User->save($user)) {
                        $options = array('template' => 'forgot_password', 'to' => $email, 'activation' => $activation, 'subject' => 'Forgot Password');
                        $this->send_email($options);
                        $this->Flash->success('Please check your email and change password.');
                    }
                }
            }
        }
    }
 
    /**
     * User logout
     */
    public function logout() {
        $this->viewBuilder()->layout(false);
        $this->autoRender = false;
        $options = array('content_id' => $this->Auth->user('id'), 'user_id' => $this->Auth->user('id'), 'type' => 'logout', 'action' => '');
        $this->addNotification($options);
        $this->Auth->logout();
        $session = $this->request->session();
        $session->destroy();

        $this->redirect('/admin/users/login');
    }

    /**
     * Change User password
     * @param type $id
     */
    public function changePassword() {
        $id = $this->Auth->user('id');
        $this->add_model(array('Users','Bloods','Categories'));
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['npassword'])) {
                $user = $this->Users->get($id);
                $data['password'] = (new \Cake\Auth\DefaultPasswordHasher)->hash($this->request->data['npassword']);
                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Password Changed successfully.'));
                }
            }
        }
        $user = $this->Users->get($id);
        $bloods = $this->Bloods->find('list')->toArray();
        $categories = $this->Categories->find('list')->where(['type'=>'Member'])->toArray();
        $this->set(compact('user','bloods','categories'));
    }

    /**
     * User Profile page
     * @param type $id
     */
    public function profile() {
        $this->add_model(array('Country'));
        $user = $this->User->get($this->Session->read('Auth.User.id'));
        if ($this->request->is(['patch', 'post', 'put'])) {
            $update = false;
            $query = $this->User->find()->where(['User.email LIKE "%' . $this->request->data['email'] . '%"']);
            $checkEmail = $query->first()->toArray();
            if (empty($checkEmail)) {
                $update = true;
            } elseif ($checkEmail['id'] == $user['id']) {
                $update = true;
            } else {
                $update = false;
            }
            if ($update) {
                $account = $this->User->patchEntity($user, $this->request->data);
                if ($this->User->save($account)) {
                    $this->Session->write('Auth.User.name', $account['name']);
                    $this->Session->write('Auth.User.email', $account['email']);
                    $options = array('content_id' => $this->Auth->user('id'), 'user_id' => $this->Auth->user('id'), 'type' => 'user', 'action' => 'change_profile');
                    $this->addNotification($options);
                    $this->Flash->success(__('Account data has been saved.'));
                    $this->Session = $this->request->session();
                    $this->set('session', $this->Session->read());
                } else {
                    $this->Flash->error(__('Account data could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('Account data could not be saved. Please, try again.'));
            }
        }
        $this->set('user', $user);
        $countries = $this->Country->find('list')->toArray();
        $this->set(compact('countries'));
    }

    /**     * User Registration Page  */
    public function register() {
        $this->viewBuilder()->layout('user_login');
        if (!empty($this->request->data)) {
            $params = $this->request->data;
            if (!empty($params['email'])) {
                $params['activation_key'] = md5($this->randomnum(8));
                $params['status'] = 2;
                $params['social_type'] ='normal';
                $params['password'] = (new \Cake\Auth\DefaultPasswordHasher)->hash($params['password']);
                $response = $this->User->addNewUser($params);
                if ($response['status'] == 'error') {
                    $response['codeMessage'] = Configure::read('ErrorsCodes.' . $response['code']);
                    //$this->Flash->error($response['codeMessage']);
                    $this->Flash->error(' Email already Exist');
                } else {
                    $options = array('template' => 'register', 'to' => $params['email'], 'activation' => $params['activation_key'], 'subject' => 'Registraion');
                    $this->send_email($options);
                    $this->Flash->success('Registration has been done successfully.Please check your email to activate your account.');
                    $options = array('content_id' => $response['code'], 'user_id' => $response['code'], 'type' => 'register', 'action' => 'success');
                    $this->addNotification($options);
                    $this->set('success', 'success');
                }
            } else {
                $this->Flash->error('Invalid or Wrong Email.');
            }
        }
    }
    public function view($id){
        //$this->viewBuilder()->layout('admin');
        $this->add_model(array('Users','Bloods','Categories'));
        if(!empty($id)){
            $user = $this->Users->find('all')->where(['Users.id'=> $id])->contain(['Bloods','Categories'])->first();
        }
        $bloods = $this->Bloods->find('list')->toArray();
        $categories = $this->Categories->find('list')->where(['type'=>'Member'])->toArray();
        $this->set(compact('user','bloods','categories'));
    }
    //add new user
    public function add(){
        $this->add_model(array('Users','Bloods','Categories'));
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $data['image'] = $this->uploadImage('profile');
            $data['activation_key'] = md5($this->randomnum(8));
            $check_duplicate = $this->Users->find()->where(['email'=>$data['email']])->orWhere(['member_id'=>$data['member_id']])->first();
            if(empty($check_duplicate)){
                $user = $this->Users->newEntity();
                $user = $this->Users->patchEntity($user, $data);
                //pr($user);exit();
                if($this->Users->save($user)){
                    $this->Flash->success(__('The User has been successfully saved.'));
                    $this->redirect('/admin/users');
                } else{
                    $this->Flash->error(__('Users could not be saved. Please try again.'));
                    $this->redirect('/admin/users');
                }
            }else{
                $this->Flash->error(__('This email or member id is already exists.Please enter unique email and member id.'));
                $this->redirect('/admin/users/add');
            }
        }
        $bloods = $this->Bloods->find('list')->toArray();
        $categories = $this->Categories->find('list')->where(['type'=>'Member'])->toArray();
        $this->set(compact('bloods','categories'));
    }

    //edit user
    public function edit($id){
        $this->add_model(array('Users','Bloods','Categories'));
        $user = $this->Users->get($id);
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $user = $this->Users->patchEntity($user, $data);
            if($this->Users->save($user)){
                $this->Flash->success(__('The User has been successfully updated.'));
                $this->redirect('/admin/users/view/'.$user['id']);
            } else{
                $this->Flash->error(__('Users could not be updated. Please try again.'));
                $this->redirect('/admin/users/view/'.$user['id']);
            }
        }
        $bloods = $this->Bloods->find('list')->toArray();
        $categories = $this->Categories->find('list')->where(['type'=>'Member'])->toArray();
        $this->set(compact('bloods','categories','user'));
    }

    //upload QR code
    public function uploadQr($id){
        $this->add_model(array('Users','Bloods','Categories'));
        $user = $this->Users->get($id);
        if (!empty($this->request->data)){
            $image = $this->uploadImage('qr');
                if (!empty($image)) {
                    if (!empty($user['qr_code'])) {
                        unlink(getcwd() . DS . 'img' . DS . 'qr' . DS . $user['qr_code']);
                    }
                $user = $this->Users->patchEntity($user, array('qr_code' => $image));
                if($this->Users->save($user)){
                    $this->Flash->success(__('The QR Code has been successfully uploaded.'));
                    $this->redirect('/admin/users/view/'.$user['id']);
                } else{
                    $this->Flash->error(__('The QR Code could not be updated. Please try again.'));
                    $this->redirect('/admin/users/view/'.$user['id']);
                }
            }
        }
        $bloods = $this->Bloods->find('list')->toArray();
        $categories = $this->Categories->find('list')->where(['type'=>'Member'])->toArray();
        $this->set(compact('bloods','categories','user'));
    }

    //upload ID Card
    public function uploadId($id){
        $this->add_model(array('Users','Bloods','Categories'));
        $user = $this->Users->get($id);
        if (!empty($this->request->data)){
            $image = $this->uploadImage('id_card');
                if (!empty($image)) {
                    if (!empty($user['id_card'])) {
                        unlink(getcwd() . DS . 'img' . DS . 'id_card' . DS . $user['id_card']);
                    }
                $user = $this->Users->patchEntity($user, array('id_card' => $image));
                if($this->Users->save($user)){
                    $this->Flash->success(__('The Id Card has been successfully uploaded.'));
                    $this->redirect('/admin/users/view/'.$user['id']);
                } else{
                    $this->Flash->error(__('The Id Card Code could not be updated. Please try again.'));
                    $this->redirect('/admin/users/view/'.$user['id']);
                }
            }
        }
        $bloods = $this->Bloods->find('list')->toArray();
        $categories = $this->Categories->find('list')->where(['type'=>'Member'])->toArray();
        $this->set(compact('bloods','categories','user'));
    }

    //Change Avatar
    public function changeAvatar($id){
        $this->add_model(array('Users','Bloods','Categories'));
        $user = $this->Users->get($id);
        if (!empty($this->request->data)){
            $image = $this->uploadImage('profile');
                if (!empty($image)) {
                    if (!empty($user['image'])) {
                        unlink(getcwd() . DS . 'img' . DS . 'profile' . DS . $user['image']);
                    }
                $user = $this->Users->patchEntity($user, array('image' => $image));
                if($this->Users->save($user)){
                    $this->Flash->success(__('The profile image has been successfully uploaded.'));
                    $this->redirect('/admin/users/view/'.$user['id']);
                } else{
                    $this->Flash->error(__('The profile image could not be updated. Please try again.'));
                    $this->redirect('/admin/users/view/'.$user['id']);
                }
            }
        }
        $bloods = $this->Bloods->find('list')->toArray();
        $categories = $this->Categories->find('list')->where(['type'=>'Member'])->toArray();
        $this->set(compact('bloods','categories','user'));
    }

    public function committee(){
        $this->add_model(array('Users'));
        $advisor = $this->Users->find()->where(['member_category'=>1])->toArray();
        $on_going = $this->Users->find()->where(['member_category'=>2])->toArray();
        $general = $this->Users->find()->where(['member_category'=>3])->toArray();
        $this->set(compact('advisor','on_going','general'));
    }

}
  