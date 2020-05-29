

<?php get_header(); ?>
<style>.archive div.container{ width:100%; padding:0; }</style>

<section class="page-wrap">
      <!-- IF: featured image -->
      <?php
      if (has_post_thumbnail()):
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
            $thumb_url = $thumb_url_array[0];
      ?>
            <div class="container">
                  <div class="row">
                        <div class="col-lg-12 image-header" style="background-image: url('<?php echo $thumb_url?>')"></div>
                  </div>
            </div>
      <?php endif; ?>

      <div class="wrapper">
            <div class="container">
                  <div class="row">
                        <div class="col-lg-12">
                              <span class="homepage-title has-text-align-center">
                                    "Give Life's Mission"
                              </span>
                        </div>
                  </div>
            </div>
            <div class="container">
                  <div class="row">
                        <div class="col-lg-12">
                              <?php get_template_part('includes/section','content'); ?>
                        </div>
                  </div>
            </div>
      </div>
</section>

<?php get_footer(); ?>
