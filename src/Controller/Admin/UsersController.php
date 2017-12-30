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
            $conditions = array_merge(array("Users.email LIKE '%" . $options['name'] . "%'"), $conditions);
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
            'conditions' => $conditions
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
     */
    public function changeAvatar() {
        $id = $this->Auth->user('id');
        $this->add_model(array('Users'));
        if (!empty($this->request->data)) {
            $image = $this->uploadImage('profile');
            if (!empty($image)) {
                $user = $this->User->get($id);
                if (!empty($user['image'])) {
                    unlink(getcwd() . DS . 'img' . DS . 'profile' . DS . $user['image']);
                }
                $user = $this->User->patchEntity($user, array('image' => $image));
                if ($this->User->save($user)) {
                    $options = array('content_id' => $this->Auth->user('id'), 'user_id' => $this->Auth->user('id'), 'type' => 'user', 'action' => 'change_avatar');
                    $this->addNotification($options);
                    $this->Flash->success(__('Profile image updated successfully.'));
                }
            }
        }
        $user = $this->User->get($id);
        $this->set('user', $user);
    }

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
    public function password() {
        $id = $this->Auth->user('id');
        $this->add_model(array('User'));
        if (!empty($this->request->data)) {
            if (!empty($this->request->data['password'])) {
                $user = $this->User->get($id);
                $data['password'] = (new DefaultPasswordHasher)->hash($this->request->data['password']);
                // if ($user['password'] != $data['password']) {
                //     $this->Flash->aerror('Invalid Current Password');
                //  } else {
                $data['password'] = (new \Cake\Auth\DefaultPasswordHasher)->hash($this->request->data['npassword']);
                $user = $this->User->patchEntity($user, $data);
                if ($this->User->save($user)) {
                    $options = array('content_id' => $this->Auth->user('id'), 'user_id' => $this->Auth->user('id'), 'type' => 'user', 'action' => 'change_password');
                    $this->addNotification($options);
                    $this->Flash->success(__('Password Changed successfully.'));
                }
                //   }
            }
        }
        $user = $this->User->get($id);
        $this->set('user', $user);
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
    public function view(){
        $this->viewBuilder()->layout('admin');
        $users = $this->Users->find('all')->toArray();
        $this->set(compact('users'));
    }
    //add new user
    public function add(){
        $this->add_model(array('Users'));
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $check_email = $this->Users->find()->where(['email'=>$data['email']])->first();
            if(empty( $check_email)){
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
                $this->Flash->error(__('This email is already exists.'));
                $this->redirect('/admin/users/add');
            }
        }
    }
}
  