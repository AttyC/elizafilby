  <div class="homepage-news">
    <h4>Featured Work</h4>
    <?php query_posts('posts_per_page=1');?>
    <ul class="flex flex-start">
    <?php while (have_posts() ) : the_post(); 
      $image = get_field("image_1");
      $size = "medium"; 
    ?>

      <li >
  
      <h5><a href="<?php the_permalink(); ?>">  <?php the_title(); ?> </a></h5>
      </li>

    <?php endwhile; ?> <!-- end loop -->
        </ul>
    <?php wp_reset_query(); ?> <!-- resets query back to original -->

  </div>