<!-- cutomizing header start -->
<?php

function givelife_customize_register($wp_customize) {
  /* All our sections,settings, and controls will be added here *
   *This will create a database value for the theme setting(will not create input field)
   *'header_bg_color' is the setting_id defined by us  
  */ 
  $wp_customize->add_setting( 'header_bg_color' , array(
    'default'   => '#ff6000',
    'transport' => 'refresh', // wp will refresh the preview with new value enterd by user 
  ) );

  $wp_customize->add_setting( 'header_link_color' , array(
    'default'   => '#FFFFFF',
    'transport' => 'refresh', // wFp will refresh the preview with new value enterd by user 
  ) );

  //This will add the section containing input field in the customizer
  $wp_customize->add_section('givelife_header_color_theme_section', array(
    'title'     => __('Header','givelife'),
    'priority'  =>  30,   //Lower the priorty higher will the placement of this input field 
  ));

//   /*
//   * This will create an input field and add it to your chosen section.
//   * This function also takes care of modifying the data to the data base when a new imput field is updated.
//   * We are instantiating a class WP_Customize_Color_Control to create a new input field
//   * and passing new WP_Customize_Color_Control() as an instantiated object to add_control()
//   * This class needs $wp_customize object as its first parameter, trhen an id which is 'theme color 
//   * and third parameter is an array containing additional settings that we need to set.
//   * 'label' is the label of the input field 
//   * In 'section' we need to define where this section needs to be added to (Our custom id nbame)
//   * In settings we define the same name 'header_bg_color' as defined in add_setting() 
//   */
  
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_theme_bg_color', array(
    'label'     => __('Header background colour', 'givelife'),
    'section'   => 'givelife_header_color_theme_section',
    'settings'  => 'header_bg_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_theme_link_color', array(
    'label'     => __('Header link colour', 'givelife'),
    'section'   => 'givelife_header_color_theme_section',
    'settings'  => 'header_link_color',
  )));

  $wp_customize->add_setting( 'footer_bg_color' , array(
    'default'   => '#ff6000',
    'transport' => 'refresh', // wp will refresh the preview with new value enterd by user 
  ) );

  $wp_customize->add_setting( 'footer_link_color' , array(
    'default'   => '#FFFFFF',
    'transport' => 'refresh', // wFp will refresh the preview with new value enterd by user 
  ) );

  $wp_customize->add_section('givelife_footer_color_theme_section', array(
    'title'     => __('Footer','givelife'),
    'priority'  =>  30,   //Lower the priorty higher will the placement of this input field 
  ));

  
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_theme_bg_color', array(
    'label'     => __('Footer background colour', 'givelife'),
    'section'   => 'givelife_footer_color_theme_section',
    'settings'  => 'footer_bg_color',
  )));

  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_theme_link_color', array(
    'label'     => __('Footer link colour', 'givelife'),
    'section'   => 'givelife_footer_color_theme_section',
    'settings'  => 'footer_link_color',
  )));
}

add_action('customize_register', 'givelife_customize_register');
/*
 * will allow us to echo info in the head tag of our themes.
 * we are using get_theme_mod() to get the id name 'header_bg_color' and its default value '#ff6000'
 * from created customizer settings above. Which means if user has not set the background color set it to default
 * value of '#ff6000'.
*/

function givelife_head(){
    ?>
         <style type="text/css">
             .header { 
                background-color: <?php echo get_theme_mod('header_bg_color', '#ff6000'); ?> !important;
              }
              .header a { 
                color: <?php echo get_theme_mod('header_link_color', '#ff6000'); ?> !important;
              }

              .footer { 
                 background-color: <?php echo get_theme_mod('footer_bg_color', '#ff6000'); ?> !important;
             }
             .footer a, .footer { 
                 color: <?php echo get_theme_mod('footer_link_color', '#ff6000'); ?> !important;
             }
         </style>
    <?php
}
add_action( 'wp_head', 'givelife_head');

?>