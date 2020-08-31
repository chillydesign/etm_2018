    <!-- header -->
    <header class="header clear" role="banner">
      <div class="nnwrapper" style="padding:0 15px;">
        <!-- logo -->

        <a class="logo" href="<?php echo home_url(); ?>">
          <div>
            ETM - <?php _e('Ecole des Musiques Actuelles', 'webfactor'); ?>
          </div>
        </a>

        <!-- /logo -->

        <div class="search_and_language">
          <div class="searchbar"><?php get_template_part('searchform'); ?></div>

          <?php if (isset($_GET['language'])) : ?>
            <div class="language_switcher">
              <?php do_action('wpml_add_language_selector'); ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="clear"></div>
      </div>

      <!-- nav -->
      <nav class="nav" role="navigation">

        <div class="cdwrapper"><a href="#" id="mobile_nav_button"><?php _e('Menu', 'webfactor'); ?> </a><?php html5blank_nav(); ?></div>
      </nav>
      <!-- /nav -->

    </header>
    <!-- /header -->