<?php
	//include head scripts
	require_once('header.scripts.php');
?>

<!-- preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- /preloader -->

<div id="main-wrapper">
	<!-- main navigation -->
	<div class="menusurround">    
        <?php wp_nav_menu(
            array(
                'menu' => 'main-menu',
                'theme_location'=>'main-menu',
                'container_class' => 'menu',
                'container_id' => 'menu',
                'menu_class' => 'level-1 slide-nav',
                'fallback_cb' => '',
                'menu_id' => 'mainnav',
                'walker' => new Swag_Walker_Nav_Menu()
            )
        ); ?>
		<!-- add logo --> 
		<a class="brand" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
			<div class="logo-text">
				<?php echo esc_attr(get_bloginfo('name', 'display')); ?><span>.</span>
			</dev>
		</a>
        <!-- end logo --> 
    </div><!-- /main navigation --> 
