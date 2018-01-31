<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package dynamic
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php $fav = get_field('favicon', 'option'); if ($fav) { ?>
	<link rel="shortcut icon" href="<?php echo $fav; ?>">
	<?php } ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'dynamic' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="site-branding">
                    <?php 
                        $image = get_field('logo', 'option');
                    ?>
                   
                    <?php if (is_home()) { ?><h1 class="site-title logo"><?php } ?><a id="blogname" rel="home" href="<?php bloginfo('siteurl'); ?>/" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"><img src="<?php if( !empty($image) ) {echo $image['url'];} ?>" alt="<?php echo $image['alt']; ?>" width="330" style="height:auto;"></a><?php if (is_home()) { ?></h1><?php } ?>
                </div>
                
                <div class="navigation d-flex">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php wp_nav_menu(array('theme_location' => 'menu1', 'container_id' => 'menu-pricipal', 'menu_class' => 'd-flex menu')); ?>
                    </nav>
                </div>
                
                <?php get_search_form(); ?>
            </div>
        </div>
    </header>
    <!-- #masthead -->

	<div id="content" class="site-content">
