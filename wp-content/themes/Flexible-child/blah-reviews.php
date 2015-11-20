<?php
/**
 * The template for displaying the archive of case studies
 *
 * @package WordPress
 * @subpackage Flexible
 * @since Flexible Theme 1.1
 */


get_header(); ?>

 <div id="primary" class="site-content">
    <div id="content" role="main">

      <h1>THIS IS THE REVIEWS TEMPLATE</h1>
    <?php 
      $reviews = get_field('reviews');
      $date = get_field('review_date');
      $image_1 = get_field('image_1');
      //$size = "full";    
    ?>     

    <?php while ( have_posts() ) : the_post(); ?>
    <div class="case-study-wrapper">
      <aside class="case-study">
        <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
        <h5><?php echo $reviews; ?></h5>
        <p><?php echo $date ?> </p>

        <?php the_excerpt(); ?>
        <p class="link"><a href="<?php the_permalink();?>">Read more ></a></p>
      </aside>

      <article class="reviews">
               <div class="reviews-images">
          <?php if($image_1) { ?>
            <a href="<?php the_permalink();?>">
            <?php echo wp_get_attachment_image( $image_1, $size ); ?>
          </a>
          <?php } ?>

        </div>
      </article>
    </div>
      <?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_footer(); ?>