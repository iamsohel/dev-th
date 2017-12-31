<?php
$prefix = !empty($this->request->params['prefix']) ? $this->request->params['prefix'] . '_' : '';
$action = $prefix . $this->name . '_' . $this->template;
switch ($action) {
    case 'admin_Users_view':
        echo $this->Html->css(array('/css/profile.min.css'));
        break;
    case 'admin_Pages_home':
        echo $this->Html->css(array('http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css','http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css','/css/summernote.css'));
        break;
    default:
        break;
}
?>