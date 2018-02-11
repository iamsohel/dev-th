<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

class MemberController extends AppController
{
    public function initialize() {

        parent::initialize();
    }

    public function index(){
    	$this->add_model(array('Users'));
    	$users = $this->Users->find()->where(['is_admin'=>1])->toArray();
    	$this->set(compact('users'));
    }
}