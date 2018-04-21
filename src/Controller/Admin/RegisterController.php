<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Configure;

class RegisterController extends AppController
{
    public function initialize() {

        parent::initialize();
    }

    public function index(){
        $this->add_model(array('Register'));

        $register = $this->paginate('Register')->toArray();
        $this->set(compact('register'));
    }

    public function add(){
        $this->add_model(array('Register'));
        if (!empty($this->request->data)){
            $data = $this->request->data;

            $data['form'] = $this->File('register_form');
            $notice = $this->Register->newEntity();
            $notice = $this->Register->patchEntity($notice, $data);

            if($this->Register->save($notice)){
                $this->Flash->success(__('The Register form has been successfully saved.'));
                $this->redirect('/admin/register');
            } else{
                $this->Flash->error(__('Register form could not be saved. Please try again.'));
                $this->redirect('/admin/register');
            }
        }
    }


    public function update($id){
        $this->add_model(array('Register'));
        $notice = $this->Register->get($id);
        if (!empty($this->request->data)){
            $data = $this->request->data;
            $data['form'] = $this->File('register_form');
            $register = $this->Register->patchEntity($notice, $data);
            if($this->Register->save($notice)){
                $this->Flash->success(__('The Register form has been updated successfully.'));
                $this->redirect('/admin/register');
            } else{
                $this->Flash->error(__('Register form could not be updated. Please try again.'));
                $this->redirect('/admin/register');
            }
        }
        $this->set(compact('register'));
    }

    public function delete($id){
        $this->add_model(array('Register'));
        $notice = $this->Register->get($id);
        if($this->Register->delete($notice)){
            $this->Flash->success(__('The Register form has been deleted successfully.'));
            $this->redirect('/admin/register');
        } else{
            $this->Flash->error(__('Register form could not be deleted. Please try again.'));
            $this->redirect('/admin/register');
        }

    }

    public function download($id)
    {
        $this->viewBuilder()->enableAutoLayout(false);

        $this->loadModel('Register');
        try {
            $file = $this->Register->get($id);
            if(!empty($file)){
                $path = WWW_ROOT.'img'.DS.'register_form'.DS.$file['form'];
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