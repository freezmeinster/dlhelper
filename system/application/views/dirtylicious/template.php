<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $url = $this->uri->segment('2');?>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/> 
<meta name="author" content="author"/> 
<link rel="stylesheet" type="text/css" href="<?php $this->template->template_base();?>default.css" media="screen"/>
<title><?php $this->template->title();?></title>
</head>

<body>

<div class="outer-container">

<div class="inner-container">

	<div class="header">
		
		<div class="title">

			<span class="sitename"><a href="<?php echo site_url();?>"><?php $this->template->title();?></a></span>
			<div class="slogan"><?php $this->template->slogan();?></div>

		</div>
		
	</div>

	<div class="path">
         <a href="<?php echo site_url();?>">Home</a> &#8250; <a href="<?php echo site_url();?>/dlhelper/<?php echo $url;?>"><?php echo $url;?></a>
	</div>

	<div class="main">		
		
		<div class="content">
                <?php $this->template->content($url);?>
		</div>

		<div class="navigation">

			<ul>
			 <?php $this->template->menu();?>
                        </ul>

		</div>

		<div class="clearer">&nbsp;</div>

	</div>

	<div class="footer">

		<span class="left">
			&copy; 2007 <a href="index.html"><?php $this->template->title();?></a>. Valid <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> &amp; <a href="http://validator.w3.org/check?uri=referer">XHTML</a>
		</span>

		<span class="right"><a href="http://templates.arcsin.se/">Website template</a> by <a href="http://arcsin.se/">Arcsin</a></span>

		<div class="clearer"></div>

	</div>

</div>

</div>

</body>

</html>