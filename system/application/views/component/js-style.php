<link rel="stylesheet" type="text/css" href="<?php $this->template->template_base();?>js/facebox.css" media="screen"/>
<script type="text/javascript" src="<?php $this->template->template_base();?>js/jquery.js"></script>
<script type="text/javascript" src="<?php $this->template->template_base();?>js/facebox.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '<?php $this->template->template_base();?>js/loading.gif',
        closeImage   : '<?php $this->template->template_base();?>js/closelabel.png'
      })
    })
  </script>