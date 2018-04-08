<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure;
class DashboardController extends AppController
{
    public function initialize() {
        parent::initialize();
        //$this->Auth->allow();
    }
    public function index(){
    	$this->add_model(array('Images','Videos','Users'));
    	$user = $this->Users->find()->count();
    	$image = $this->Images->find()->count();
    	$video = $this->Videos->find()->count();
    	$this->set(compact('user','image','video'));
    }
}