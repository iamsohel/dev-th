<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class VideosController extends AppController
{

    public function index($id)
    {
      $this->viewBuilder()->layout('main_site_2');
      $this->add_model(array('Videos','Folders'));
        $this->loadComponent('Paginator');
        
        $this->paginate = [
            'limit' => 20,
            'order' => [
                'Videos.name' => 'asc'
            ],
            'contain' => (['Folders' => function ($q) {
                return $q->select(['name','Folders.id']);}])
        ];
        $videos = $this->paginate($this->Videos->find()->where(['folder_id'=>$id]))->toArray();

        $this->set(compact('videos'));
    }

    public function folders()
    {
      $this->viewBuilder()->layout('main_site_2');
      $this->add_model(array('Folders'));
        
        $this->paginate = [
            'limit' => 16,
            'order' => [
                'Folders.created' => 'desc'
            ]
        ];
        $folders = $this->paginate($this->Folders->find()->where(['type'=>2]))->toArray();
        $this->set(compact('folders'));
    }
}
