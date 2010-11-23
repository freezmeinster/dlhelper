<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/system/application/views/component/js/facebox.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/system/application/views/component/js/tooltip.css" media="screen"/>
<script type="text/javascript" src="<?php echo base_url();?>/system/application/views/component/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/system/application/views/component/js/facebox.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/system/application/views/component/js/dimensions.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/system/application/views/component/js/bgiframe.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/system/application/views/component/js/tooltip.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : '<?php echo base_url();?>/system/application/views/component/js/loading.gif',
        closeImage   : '<?php echo base_url();?>/system/application/views/component/js/closelabel.png'
      });
      
      $('[rel*=tooltip]').tooltip({ 
         track: true, 
    delay: 0, 
    showURL: false, 
    showBody: " - ", 
    extraClass: "title", 
    fixPNG: true, 
    opacity: 0.95, 
    left: -120 
      });
    
    })
    
    
  </script>