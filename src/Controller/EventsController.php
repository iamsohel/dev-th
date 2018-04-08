<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class EventsController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->layout('main_site_2');
        $this->add_model(array('Notices'));
        $this->paginate = [
            'limit' => 3,
            'order' => [
                'Notices.created' => 'desc'
            ]
        ];
        $events = $this->paginate('Notices')->toArray();
        $this->set(compact('events'));
    }
}
