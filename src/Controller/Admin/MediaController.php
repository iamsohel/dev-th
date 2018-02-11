<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

class MediaController extends AppController
{
    public function initialize() {

        parent::initialize();
        //$this->Auth->allow();
    }

    public function index(){
    	
    }

    public function images($folder_id){
        $this->add_model(array('Images','Folders'));
        $this->loadComponent('Paginator');
        $this->add_model(array('Folders'));
        $conditions = [];
        $options = $this->request->data;
        $search = false;
        if (!empty($options['reset']) && ($options['reset'] == 'reset')) { // Reset list
            $this->Session->delete('Images.search');
            $this->request->data = $options = array();
        }
        if (!empty($options['search']) && ($options['search'] == 'submit')) { // searc submit and & set session params
            $this->Session->write('Images.Search', $options);
            $search = true;
        }
        if (!empty($options['name'])) {
            $conditions = array_merge(array("Images.name LIKE '%" . $options['name'] . "%'"), $conditions);
        }

        $this->paginate = [
            'limit' => 20,
            'order' => [
                'Images.name' => 'asc'
            ],
            'conditions' => $conditions,
            'contain' => (['Folders' => function ($q) {
                return $q->select(['name','Folders.id']);}])
        ];
        $images = $this->paginate($this->Images->find()->where(['folder_id'=>$folder_id]))->toArray();
        $folder_name = $this->Folders->find()->where(['id'=>$folder_id])->first();
        $this->set('search', $search);
        $this->set(compact('images','folder_id','folder_name'));
    }

    public function imageFolders(){
        $this->loadComponent('Paginator');
        $this->add_model(array('Folders'));
        $conditions = [];
        $options = $this->request->data;
        $search = false;
        if (!empty($options['reset']) && ($options['reset'] == 'reset')) { // Reset list
            $this->Session->delete('Folders.search');
            $this->request->data = $options = array();
        }
        if (!empty($options['search']) && ($options['search'] == 'submit')) { // searc submit and & set session params
            $this->Session->write('Folders.Search', $options);
            $search = true;
        }
        if (!empty($options['name'])) {
            $conditions = array_merge(array("Folders.name LIKE '%" . $options['name'] . "%'"), $conditions);
        }

        $this->paginate = [
            'limit' => 20,
            'order' => [
                'Folders.name' => 'asc'
            ],
            'conditions' => $conditions
        ];
        $folders = $this->paginate($this->Folders->find()->where(['type'=>1]))->toArray();
        $this->set('search', $search);
        $this->set(compact('folders'));
    }

    // for image
    public function createFolder(){
        $this->add_model(array('Folders'));
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $data['type'] = 1;
            $directoryPath = WWW_ROOT . 'img' . DS . $data['name'];
            if (!is_dir($directoryPath)) {
                mkdir($directoryPath);
            }
            $folder = $this->Folders->newEntity();
            $folder = $this->Folders->patchEntity($folder, $data);
            //pr($user);exit();
            if($this->Folders->save($folder)){
                $this->Flash->success(__('The Folder has been successfully created.'));
                $this->redirect('/admin/media/image_folders');
            } else{
                $this->Flash->error(__('Folder could not be saved. Please try again.'));
                $this->redirect('/admin/media/image_folders');
            }
        }
    }

    // for video
    public function createVideoFolder(){
        $this->add_model(array('Folders'));
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $data['type'] = 2;
            $folder = $this->Folders->newEntity();
            $folder = $this->Folders->patchEntity($folder, $data);
            //pr($user);exit();
            if($this->Folders->save($folder)){
                $this->Flash->success(__('The Folder has been successfully created.'));
                $this->redirect('/admin/media/video_folders');
            } else{
                $this->Flash->error(__('Folder could not be saved. Please try again.'));
                $this->redirect('/admin/media/video_folders');
            }
        }
    }

    public function addImage($folder_id){
        $this->add_model(array('Images','Folders'));
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $folder = $data['folder_name'];
            $data['image'] = $this->Image($folder);
            //pr($data['image']); exit();
            $data['folder_id'] = $folder_id;
            $img = $this->Images->newEntity();
            $img = $this->Images->patchEntity($img, $data);
            
            if($this->Images->save($img)){
                $this->Flash->success(__('The Image has been successfully saved.'));
                $this->redirect('/admin/media/images/'.$folder_id);
            } else{
                $this->Flash->error(__('Image could not be saved. Please try again.'));
                $this->redirect('/admin/media/images/'.$folder_id);
            }
        }
        $folder_name = $this->Folders->find()->where(['id'=>$folder_id])->first();
        $this->set(compact('folder_id','folder_name'));
    }

    public function removeImage($id){
        $this->viewBuilder()->autoLayout(false);
        $this->autoRender = false;
        $this->add_model(array('Images','Folders'));
        if(!empty($id)){
            $img = $this->Images->get($id);
            if (!empty($img)) {
                $folder_name = $this->Folders->find()->where(['id' => $img['folder_id']])->first();
                //pr($folder_name['name'].'-'.$img['image']);exit();
                unlink(getcwd() . DS . 'img' . DS . $folder_name['name'] . DS . $img['image']);
                //$img->image = '';
                if($this->Images->delete($img)){
                    $this->Flash->success(__('The Image has been deleted successfully.'));
                    $this->redirect('/admin/media/images/'.$img['folder_id']);
                } else{
                    $this->Flash->error(__('Image could not be deleted. Please try again.'));
                    $this->redirect('/admin/media/images/'.$img['folder_id']);
                }
            }
        }
    }

    public function removeFolder($id){
        $this->viewBuilder()->autoLayout(false);
        $this->autoRender = false;
        $this->add_model(array('Folders'));
        if(!empty($id)){
            $folder = $this->Folders->get($id);
            if($this->Folders->delete($folder)){
                $this->Flash->success(__('The Folder has been deleted successfully.'));
                $this->redirect('/admin/media/image_folders/');
            } else{
                $this->Flash->error(__('Folder could not be deleted. Please try again.'));
                $this->redirect('/admin/media/image_folders/');
            } 
        }
    }

    public function videoFolders(){
        $this->loadComponent('Paginator');
        $this->add_model(array('Folders'));
        $conditions = [];
        $options = $this->request->data;
        $search = false;
        if (!empty($options['reset']) && ($options['reset'] == 'reset')) { // Reset list
            $this->Session->delete('Folders.search');
            $this->request->data = $options = array();
        }
        if (!empty($options['search']) && ($options['search'] == 'submit')) { // searc submit and & set session params
            $this->Session->write('Folders.Search', $options);
            $search = true;
        }
        if (!empty($options['name'])) {
            $conditions = array_merge(array("Folders.name LIKE '%" . $options['name'] . "%'"), $conditions);
        }

        $this->paginate = [
            'limit' => 20,
            'order' => [
                'Folders.name' => 'asc'
            ],
            'conditions' => $conditions
        ];
        $folders = $this->paginate($this->Folders->find()->where(['type'=>2]))->toArray();
        $this->set('search', $search);
        $this->set(compact('folders'));
    }

    public function videos($folder_id){
        $this->add_model(array('Videos','Folders'));
        $this->loadComponent('Paginator');
        $conditions = [];
        $options = $this->request->data;
        $search = false;
        if (!empty($options['reset']) && ($options['reset'] == 'reset')) { // Reset list
            $this->Session->delete('Videos.search');
            $this->request->data = $options = array();
        }
        if (!empty($options['search']) && ($options['search'] == 'submit')) { // searc submit and & set session params
            $this->Session->write('Videos.Search', $options);
            $search = true;
        }
        if (!empty($options['name'])) {
            $conditions = array_merge(array("Videos.name LIKE '%" . $options['name'] . "%'"), $conditions);
        }

        $this->paginate = [
            'limit' => 20,
            'order' => [
                'Videos.name' => 'asc'
            ],
            'conditions' => $conditions,
            'contain' => (['Folders' => function ($q) {
                return $q->select(['name','Folders.id']);}])
        ];
        $videos = $this->paginate($this->Videos->find()->where(['folder_id'=>$folder_id]))->toArray();
        $folder_name = $this->Folders->find()->where(['id'=>$folder_id])->first();
        $this->set('search', $search);
        $this->set(compact('videos','folder_id','folder_name'));
    }

    public function addVideo($folder_id){
        $this->add_model(array('Videos','Folders'));
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $data['folder_id'] = $folder_id;
            $video = $this->Videos->newEntity();
            $video = $this->Videos->patchEntity($video, $data);
            if($this->Videos->save($video)){
                $this->Flash->success(__('The video has been successfully saved.'));
                $this->redirect('/admin/media/videos/'.$folder_id);
            } else{
                $this->Flash->error(__('Video could not be saved. Please try again.'));
                $this->redirect('/admin/media/videos/'.$folder_id);
            }
        }
        $folder_name = $this->Folders->find()->where(['id'=>$folder_id])->first();
        $this->set(compact('folder_id','folder_name'));
    }

    public function editVideo($id){
        $this->add_model(array('Videos','Folders'));
        $video = $this->Videos->get($id);
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $video = $this->Videos->patchEntity($video, $data);
            if($this->Videos->save($video)){
                $this->Flash->success(__('The video has been updated successfully.'));
                $this->redirect('/admin/media/videos/'.$video['folder_id']);
            } else{
                $this->Flash->error(__('Video could not be updated. Please try again.'));
                $this->redirect('/admin/media/videos/'.$video['folder_id']);
            }
        }
        $folder_name = $this->Folders->find()->where(['id'=>$video['folder_id']])->first();
        $this->set(compact('video','folder_name'));
    }

    public function removeVideo($id){
        $this->viewBuilder()->autoLayout(false);
        $this->autoRender = false;
        $this->add_model(array('Videos'));
        if(!empty($id)){
            $video = $this->Videos->get($id);
            if (!empty($video)) {
                if($this->Videos->delete($video)){
                    $this->Flash->success(__('The video has been deleted successfully.'));
                    $this->redirect('/admin/media/videos/'.$video['folder_id']);
                } else{
                    $this->Flash->error(__('Video could not be deleted. Please try again.'));
                    $this->redirect('/admin/media/videos/'.$video['folder_id']);
                }
            }
        }
    }

}