<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

class NotificationsTable extends Table {

    public function initialize(array $config) {
        parent::initialize($config);
        $this->table('logs');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');
    }

    public function addToLog($options) {
        $user = $_SESSION['Auth']['User'];
        $data = [
            'user_id' => $user['id'],
            'content_id' => $options['content_id'],
            'type' => $options['type'],
            'action'=> $options['action'],
            'receiver_id' => !empty($options['receiver_id']) ? $options['receiver_id']: '',
            'log_from' => !empty($user['user_type_id']) && (in_array($user['user_type_id'], array(1, 2))) ? 'admin' : 'user',
            'message' => !empty($options['message']) ? $options['message'] : ''
        ];
        $log = $this->newEntity();
        $log = $this->patchEntity($log, $data);
        $this->save($log);
    }

}
