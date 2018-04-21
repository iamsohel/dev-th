<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class MembersController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->layout('main_site_2');
        $this->add_model(array('Users','Bloods','Categories'));
        $this->paginate = [
            'limit' => 20,
            'order' => [
                'Users.created' => 'desc'
            ]
        ];
         $users_ad = $this->paginate($this->Users->find()->where(['member_category' => 1]))->toArray();
         $users_ge = $this->paginate($this->Users->find()->where(['member_category' => 3]))->toArray();
         $users_on = $this->paginate($this->Users->find()->where(['member_category' => 2]))->toArray();
         $users_sib = $this->paginate($this->Users->find()->where(['member_category' => 9]))->toArray();
        $bloods = $this->Bloods->find('list')->toArray();
        $categories = $this->Categories->find('list')->where(['type'=>'Member'])->toArray();
        $this->set(compact('users_ad','bloods','categories','users_on','users_ge','users_sib'));
    }
    public function view($id)
    {
        $this->viewBuilder()->autoLayout(false);
        $this->autoRender = false;
        $this->viewBuilder()->layout('main_site_2');
        $this->add_model(array('Users','Bloods','Categories'));
        
         $user = $this->Users->find()
         ->select(['Users.name','Users.member_id','Users.profession','Users.address','Users.phone','Users.nid','Users.email','Users.image','Users.qr_code','Bloods.name','Categories.name'])
         ->where(['Users.id' => $id])
         ->contain(['Bloods', 'Categories'])
         ->first();
         //pr($user);exit;
         
        $bloods = $this->Bloods->find('list')->toArray();
        $categories = $this->Categories->find('list')->where(['type'=>'Member'])->toArray();
        //$this->set(compact('user','bloods','categories'));
       // echo json_encode($user);
        $result = json_encode($user);
        $this->response->body($result);
        $this->response->type('json');
        return $this->response;
    }
}
