<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure;
class AdsController extends AppController
{
    public function initialize() {
        parent::initialize();
        //$this->Auth->allow();
    }
    public function index(){
        $this->loadComponent('Paginator');
        $this->add_model(array('Ads'));
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
                'Ads.created' => 'desc'
            ],
            'conditions' => $conditions
        ];
        $ads = $this->paginate('Ads')->toArray();
        $this->set('search', $search);
        $this->set(compact('ads'));
    }

    public function add(){
        $this->add_model(array('Ads'));
        if (!empty($this->request->data)){
            $data = $this->request->data;
            //pr($data);exit;
            $data['image'] = $this->Image('ads');
            $notice = $this->Ads->newEntity();
            $notice = $this->Ads->patchEntity($notice, $data);
            //pr($notice);exit();
            if($this->Ads->save($notice)){
                $this->Flash->success(__('Advertisement has been successfully saved.'));
                $this->redirect('/admin/ads');
            } else{
                $this->Flash->error(__('Advertisement could not be saved. Please try again.'));
                $this->redirect('/admin/ads');
            }
        }
    }


    public function update($id){
        $this->add_model(array('Ads'));
        $notice = $this->Ads->get($id);
        if (!empty($this->request->data)){
            $data = $this->request->data;
            //$data['banner_image'] = $this->Image('DA');
            $notice = $this->Ads->patchEntity($notice, $data);
            if($this->Ads->save($notice)){
                $this->Flash->success(__('Advertisement has been updated successfully.'));
                $this->redirect('/admin/ads');
            } else{
                $this->Flash->error(__('Advertisement could not be updated. Please try again.'));
                $this->redirect('/admin/ads');
            }
        }
        $this->set(compact('ads'));
    }

    public function delete($id){
        $this->add_model(array('Ads'));
        $notice = $this->Ads->get($id);
        if($this->Ads->delete($notice)){
            $this->Flash->success(__('Advertisement has been deleted successfully.'));
            $this->redirect('/admin/ads');
        } else{
            $this->Flash->error(__('Advertisement could not be deleted. Please try again.'));
            $this->redirect('/admin/ads');
        }
        
    }
}