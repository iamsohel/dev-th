<?php
$prefix = !empty($this->request->params['prefix']) ? $this->request->params['prefix'] . '_' : '';
$action = $prefix . $this->name . '_' . $this->template;
switch ($action) {
    case 'admin_Users_view':
        echo $this->Html->css(array('/assets/pages/css/profile.min.css'));
        break;
    default:
        break;
}
?>