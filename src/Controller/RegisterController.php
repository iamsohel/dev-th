<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class RegisterController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->layout('main_site_2');
        
    }
    public function download()
    {
        $this->viewBuilder()->enableAutoLayout(false);

        $this->loadModel('Register');
        try {
            $file = $this->Register->find()->order(['created' => 'desc']) ->first();
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
