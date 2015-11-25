<section class="homepage-featured-work">
  <div class="site-content">
    <h4>Featured Work</h4>
    <?php query_posts('posts_per_page=3&post_type=testimonials');?>
    <ul class="flex flex-start">
    <?php while (have_posts() ) : the_post(); 
      
    ?>

      <li >
        
      <h5><a href="<?php the_permalink(); ?>">  <?php the_title(); ?> </a></h5>
      </li>
      <?php the_content(); ?>

    <?php endwhile; ?> <!-- end loop -->
        </ul>
    <?php wp_reset_query(); ?> <!-- resets query back to original -->

  </div>
</section>