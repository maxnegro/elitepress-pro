<div class="col-md-4 col-sm-6">
  <article class="portfolio-area">


    <figure class="portfolio-image">
      <?php elitepress_image_thumbnail('','img-responsive');
      ?>
      <?php
      if(has_post_thumbnail())
      {
      $post_thumbnail_id = get_post_thumbnail_id();
      $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
      } ?>
      <div class="portfolio-showcase-overlay">
        <div class="portfolio-showcase-overlay-inner">
          <div class="portfolio-showcase-icons">
          <?php if(isset($post_thumbnail_url)){ ?>
          <a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" class="hover_thumb"><i class="fa fa-search"></i></a>
          <?php }
          elitepress_get_custom_link($project_more_btn_link,get_post_meta( get_the_ID(), 'project_more_btn_target', true ),'<i class="fa fa-link"></i>'); ?>
          </div>
        </div>
      </div>
    </figure>


    <div class="portfolio-info">
      <header class="entry-header">
        <h4 class="entry-title">
          <?php
          elitepress_get_custom_link(get_permalink(get_the_ID()), false, get_the_title());
          // elitepress_get_custom_link($project_more_btn_link,get_post_meta( get_the_ID(), 'project_more_btn_target', true ),get_the_title());
          ?>
        </h4>
      </header>
      <?php if(get_post_meta( get_the_ID(), 'project_description', true )){ ?>
      <div class="entry-content">
        <p><?php echo get_post_meta( get_the_ID(), 'project_description', true ); ?></p>
        <?php if (get_post_meta( get_the_ID(), 'project_more_btn_text', true )){ ?>
        <p><a class="port-more-link" href="<?php echo $project_more_btn_link; ?>" <?php if(get_post_meta( get_the_ID(), 'project_more_btn_target', true )) { echo "target='_blank'"; } ?> title="Read More"><?php echo get_post_meta( get_the_ID(), 'project_more_btn_text', true ); ?></a></p>
        <?php } ?>
      </div>
      <?php } ?>

    </div>
  </article>
</div>
