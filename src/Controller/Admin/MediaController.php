<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

class MediaController extends AppController
{
    public function initialize() {

        parent::initialize();
        $this->Auth->allow();
    }

    public function index(){
    	
    }

    public function images(){

    }

    public function videos(){

    }
}