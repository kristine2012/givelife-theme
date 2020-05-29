<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php wp_head(); ?><!-- notice the wordpress admin bar on top-->
  </head>
  <body>
    <!-- <header class="header">
      <div class="container">
        <h1 class="site-logo">
          <a href="<?php echo home_url(); ?>/">
            <span class="site-title"><?php bloginfo( 'name' ); ?></span>
            <?php
              // display custom logo if available
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              if($custom_logo_id):
                $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                echo $image[0];
              endif;
            ?>
          </a>
        </h1>
        <?php
          wp_nav_menu(
            array(
            'theme_location' => 'top-menu',
          //  'menu' => 'Top Bar',
            'menu_class' => 'top-bar'
            )
          );
        ?>
        
      </div>

    </header> -->


    <header class="header">
      <div class="container">
        <div class="row">
          <div class="col-2">
            <h1 class="site-logo">
              <a href="<?php echo home_url(); ?>/">
                <span class="site-title"><?php bloginfo( 'name' ); ?></span>
                <?php
                  // display custom logo if available
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  if($custom_logo_id):
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    echo $image[0];
                  endif;
                ?>
              </a>
            </h1>
          </div>
          <div class="col-10">
            <?php
              wp_nav_menu(
                array(
                'theme_location' => 'top-menu',
              //  'menu' => 'Top Bar',
                'menu_class' => 'top-bar'
                )
              );
            ?>
            <!-- <div class="container text-info my-5">
              <?php get_search_form();?>
            </div> -->
          
          </div>
        </div>
      </div>

    </header>
