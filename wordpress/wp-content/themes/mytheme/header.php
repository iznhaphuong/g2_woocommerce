<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <meta charset="<?php bloginfo( 'charset' ); ?>" >
   <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <!--container-->
    <div id="container">
  <header id="header">
    <!-- logo: hello -->
   <?php mytheme_logo(); ?>
   <!-- menu -->
   <?php mytheme_menu('my-custom-menu' ); ?>
  </header>