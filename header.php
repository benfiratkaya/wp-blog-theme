<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- FONTS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header id="header">
    <nav class="navbar navbar-expand-md navbar-light">
      <div class="container">
        <?php benfiratkaya_the_custom_logo(); ?>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar">
          <div class="toggle-icon">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </div>
        </button>
        <div id="navbar" class="navbar-collapse collapse justify-content-stretch">
          <?php
            wp_nav_menu(array(
              'theme_location' => 'primary',
              'container' => false,
              'menu_class' => 'navbar-nav ml-auto',
              'walker' => new BenFiratKaya_Walker_Nav()
            ));
          ?>
        </div>
      </div>
    </nav>
  </header>

  <main id="main">
