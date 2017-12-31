<?php

$prefix = !empty($this->request->params['prefix']) ? $this->request->params['prefix'] . '_' : '';
$action = $prefix . $this->name . '_' . $this->template;
switch ($action) {
    case 'admin_Users_view':
        echo $this->Html->script(array('/js/profile.min.js'));
        break;
    case 'admin_Pages_home':
        echo $this->Html->script(array('/js/markdown.js','/js/bootstrap-markdown.js','/js/summernote.min.js','/js/components-editors.min.js'));
        ?>
		<!-- <script type="text/javascript">
					var ComponentsEditors = function() {
				    var s = function() {
				            $("#summernote_1").summernote({
				                height: 300
				            })
				        };
				    return {
				        init: function() {
				          s()
				        }
				    }
				}();
				jQuery(document).ready(function() {
				    ComponentsEditors.init()
				});
		</script> -->
<?php 
	    break;
		default:
		break;
}

        
