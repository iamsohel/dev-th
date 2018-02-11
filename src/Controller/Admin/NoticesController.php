<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

class NoticesController extends AppController
{
    public function initialize() {

        parent::initialize();
    }

    public function index(){
    	$this->loadComponent('Paginator');
        $this->add_model(array('Notices'));
        $conditions = [];
        $options = $this->request->data;
        $search = false;
        if (!empty($options['reset']) && ($options['reset'] == 'reset')) { // Reset list
            $this->Session->delete('Notices.search');
            $this->request->data = $options = array();
        }
        if (!empty($options['search']) && ($options['search'] == 'submit')) { // searc submit and & set session params
            $this->Session->write('Notices.Search', $options);
            $search = true;
        }
        if (!empty($options['name'])) {
            $conditions = array_merge(array("Notices.name LIKE '%" . $options['name'] . "%'"), $conditions);
        }
        if (!empty($options['date'])) {
            $conditions = array_merge(array("Notices.date" => $options['date']), $conditions);
        }
        if (!empty($options['status'])) {
            $options['status'] = ($options['status'] == 2) ? 0 : 1;
            $conditions = array_merge(array("Users.status" => $options['status']), $conditions);
        }

        $this->paginate = [
            'limit' => 25,
            'order' => [
                'Notices.name' => 'asc'
            ],
            'conditions' => $conditions
        ];
        $notices = $this->paginate('Notices')->toArray();
        $this->set('search', $search);
        $this->set(compact('notices'));
    }

    public function add(){
        $this->add_model(array('Notices','Categories'));
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $data['banner_image'] = $this->Image('notice_banner');
            $data['media1'] = $this->uploadMedia1('media_logo');
            $data['media2'] = $this->uploadMedia2('media_logo');
            $data['media3'] = $this->uploadMedia3('media_logo');
            $notice = $this->Notices->newEntity();
            $notice = $this->Notices->patchEntity($notice, $data);
            //pr($notice);exit();
            if($this->Notices->save($notice)){
                $this->Flash->success(__('The Notice has been successfully saved.'));
                $this->redirect('/admin/notices');
            } else{
                $this->Flash->error(__('Notice could not be saved. Please try again.'));
                $this->redirect('/admin/notices');
            }
        }
    }


    public function update($id){
        $this->add_model(array('Notices'));
        $notice = $this->Notices->get($id);
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $data['banner_image'] = $this->Image('notice_banner');
            $notice = $this->Notices->patchEntity($notice, $data);
	        if($this->Notices->save($notice)){
	            $this->Flash->success(__('The Notice has been updated successfully.'));
	            $this->redirect('/admin/notices');
	        } else{
	            $this->Flash->error(__('Notice could not be updated. Please try again.'));
	            $this->redirect('/admin/notices');
	        }
        }
        $this->set(compact('notice'));
    }

    public function delete($id){
        $this->add_model(array('Notices'));
        $notice = $this->Notices->get($id);
        if($this->Notices->delete($notice)){
            $this->Flash->success(__('The Notice has been deleted successfully.'));
            $this->redirect('/admin/notices');
        } else{
            $this->Flash->error(__('Notice could not be deleted. Please try again.'));
            $this->redirect('/admin/notices');
        }
        
    }

}