<header class="banner navbar navbar-default navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
      endif;
      ?>

      <?php if(!isset($woocommerce)) global $woocommerce; ?>
      <p class="navbar-text navbar-right" id="micro-cart">  
        <i class="fa fa-shopping-cart"></i>&nbsp;
        <span class="cart_totals">
          <a href="" class="cart_link navbar-link"></a>&nbsp;
          <span class="cart_amount"></span>
        </span>
      </p>
    </nav>

  </div>
</header>

<header class="sub-header">
  <div class="container title-header">
    <div class="row">
      <div class="col-sm-6 col-sm-push-6 site-logo">
        <a href="<?php bloginfo("url"); ?>" id="masthead-link">
          <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width;?>">
        </a>
      </div>
      <div class="col-sm-6 col-sm-pull-6">
        <h1 class="page-title"><?php echo roots_title(); ?></h1>
        <?php //if ( is_single() ) get_template_part( 'templates/single', 'meta' ); ?>
      </div>
    </div>
  </div>
</header>