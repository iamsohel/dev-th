<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 */
class NoticesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('notices');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp');
        //$this->belongsTo('Folders', ['foreignKey' => 'folder_id']);
    }  
}
