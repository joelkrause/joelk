<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head();?>
    <style>
        <?php include("library/styles/css/main.css");?>
    </style>
</head>

<body <?php body_class();?>>
    <header class="site--header">
        <div class="logo">
            <a href="<?php echo home_url();?>">
                <img src="<?php echo get_template_directory_uri();?>/library/images/logo.svg" />
            </a>
        </div>
        <button id="open--nav" class="menu--button">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav class="site--nav">
            <button id="close--nav" class="menu--button close">
                <span></span>
                <span></span>
            </button>
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'main-nav',
                    'menu_id'        => 'main-nav',
                ) );
            ?>
        </nav>
        <div class="social--links header">
            <?php get_template_part('template-parts/sitewide/socialmedia');?>
        </div>
    </header>