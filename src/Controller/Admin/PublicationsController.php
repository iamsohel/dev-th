<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

class PublicationsController extends AppController
{
    public function initialize() {

        parent::initialize();
    }

    public function index(){
    	$this->loadComponent('Paginator');
        $this->add_model(array('Publications'));
        $conditions = [];
        $options = $this->request->data;
        $search = false;
        if (!empty($options['reset']) && ($options['reset'] == 'reset')) { // Reset list
            $this->Session->delete('Publications.search');
            $this->request->data = $options = array();
        }
        if (!empty($options['search']) && ($options['search'] == 'submit')) { // searc submit and & set session params
            $this->Session->write('Publications.Search', $options);
            $search = true;
        }
        if (!empty($options['name'])) {
            $conditions = array_merge(array("Publications.name LIKE '%" . $options['name'] . "%'"), $conditions);
        }

        $this->paginate = [
            'limit' => 25,
            'order' => [
                'Publications.name' => 'asc'
            ],
            'conditions' => $conditions
        ];
        $publications = $this->paginate('Publications')->toArray();
        $this->set('search', $search);
        $this->set(compact('publications'));
    }

    public function add(){
        $this->add_model(array('Publications'));
        if (!empty($this->request->data)){
            $data = $this->request->data;
            //pr($data); exit();
            $data['cover'] = $this->uploadCoverImage('cover_image');
            $data['file'] = $this->uploadFile('file');
            $pub = $this->Publications->newEntity();
            $pub = $this->Publications->patchEntity($pub, $data);
            if($this->Publications->save($pub)){
                $this->Flash->success(__('The Publication has been saved successfully.'));
                $this->redirect('/admin/publications');
            } else{
                $this->Flash->error(__('Publication could not be saved. Please try again.'));
                $this->redirect('/admin/publications');
            }
        }
    }


    public function update($id){
        $this->add_model(array('Publications'));
        $pub = $this->Publications->get($id);
        if (!empty($this->request->data)){
            $data = $this->request->data;
             $data['cover'] = $this->Image('cover_image');
            $data['file'] = $this->Image('file');
            $pub = $this->Publications->patchEntity($pub, $data);
	        if($this->Publications->save($pub)){
	            $this->Flash->success(__('The Publication has been updated successfully.'));
	            $this->redirect('/admin/publications');
	        } else{
	            $this->Flash->error(__('Publication could not be updated. Please try again.'));
	            $this->redirect('/admin/publications');
	        }
        }
        $this->set(compact('pub'));
    }

    public function delete($id){
        $this->add_model(array('Publications'));
        $pub = $this->Publications->get($id);
        if($this->Publications->delete($pub)){
            $this->Flash->success(__('The Publication has been deleted successfully.'));
            $this->redirect('/admin/publications');
        } else{
            $this->Flash->error(__('Publication could not be deleted. Please try again.'));
            $this->redirect('/admin/publications');
        }
        
    }

    public function download($id)
    {
        $this->viewBuilder()->enableAutoLayout(false);

        $this->loadModel('Publications');
        try {
            $file = $this->Publications->get($id);
            if(!empty($file)){
                $path = WWW_ROOT.'img'.DS.'file'.DS.$file['file'];
                $response = $this->response->withFile(
                    $path, ['download' => true, 'name' => $file['name']]
                );
            }
        }catch(Exception $e){

        }
        //pr($path);exit;
        return $response;
    }
}