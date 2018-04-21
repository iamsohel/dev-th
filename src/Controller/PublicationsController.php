<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.3.4
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Event\Event;

/**
 * Error Handling Controller
 *
 * Controller used by ExceptionRenderer to render error responses.
 */
class PublicationsController extends AppController
{
    
    public function initialize()
    {
        $this->loadComponent('RequestHandler');
    }


    public function index()
    {
        $this->viewBuilder()->layout('main_site_2');
        $this->add_model(array('Publications'));
        $this->paginate = [
            'limit' => 4,
            'order' => [
                'Publications.created' => 'desc'
            ]
        ];
        $pubs = $this->paginate('Publications')->toArray();
        $this->set(compact('pubs'));
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
