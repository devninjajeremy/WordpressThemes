<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7 "> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title><?php wp_title(); ?></title>
	<meta name="description" content="<?php echo bloginfo('description'); ?>">
	<meta name="author" content="Jeremy Davis">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Favicons
  ================================================== -->
  <!-- 
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri();?>/assets/img/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri();?>/assets/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri();?>/assets/img/apple-touch-icon-114x114.png">
   -->

   <?php
       /* LOAD WORDPRESS HEAD */
       wp_head();
   ?>
</head>

<body>