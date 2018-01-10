<?php

$prefix = !empty($this->request->params['prefix']) ? $this->request->params['prefix'] . '_' : '';
$action = $prefix . $this->name . '_' . $this->template;
switch ($action) {
    case 'admin_Users_view':
    case 'admin_Users_changePassword':
        echo $this->Html->script(array('/js/profile.min.js'));
        break;
    case 'admin_Pages_home':
        echo $this->Html->script(array('/js/markdown.js','/js/bootstrap-markdown.js','/js/summernote.min.js','/js/components-editors.min.js'));
	    break;
	case 'admin_Media_images':
	case 'admin_Media_videos':
        echo $this->Html->script(array('/js/jquery.cubeportfolio.min.js','/js/portfolio-1.min.js'));
        
		default:
		break;
}
?>
        
