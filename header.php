<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head();?>
</head>

<body>
    <div class="preloader"></div>
    <header class="site--header">
        <div class="logo">
            <a href="<?php echo home_url();?>">
                Joel<br/>Krause.
            </a>
        </div>
        <nav class="site--nav">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'main-nav',
                    'menu_id'        => 'main-nav',
                ) );
            ?>
        </nav>
        <div class="social--links">
            <?php get_template_part('template-parts/sitewide/socialmedia');?>
        </div>
    </header>