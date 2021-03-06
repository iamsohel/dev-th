<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class HomeController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->layout('main_site');
        $this->add_model(array('Notices'));
        $this->paginate = [
            'limit' => 5,
            'order' => [
                'Notices.created' => 'desc'
            ]
        ];
        $events = $this->paginate('Notices')->toArray();
        $this->set(compact('events'));
    }
}
