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
        if(!empty($id)){
            $user = $this->Users->find('all')->where(['Users.id'=> $id])->contain(['Bloods','Categories'])->first();
        }
        $bloods = $this->Bloods->find('list')->toArray();
        $categories = $this->Categories->find('list')->where(['type'=>'Member'])->toArray();
        $this->set(compact('user','bloods','categories'));
    }
}
