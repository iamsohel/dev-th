<?php

$prefix = !empty($this->request->params['prefix']) ? $this->request->params['prefix'] . '_' : '';
$action = $prefix . $this->name . '_' . $this->template;
switch ($action) {
    case 'admin_Users_view':
        echo $this->Html->script(array('/assets/pages/scripts/profile.min.js'));
        break;
    default:
        break;
}
        
