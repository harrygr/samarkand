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
    </nav>
  </div>
</header>
<header class="sub-header">
<div class="container title-header">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-title"><?php echo roots_title(); ?></h1>
      <?php //if ( is_single() ) get_template_part( 'templates/single', 'meta' ); ?>
    </div>
  </div>
</div>
</header>