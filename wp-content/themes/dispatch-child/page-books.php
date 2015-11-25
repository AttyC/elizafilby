<?php
/**
 * The template for displaying BOOKS page  
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Divi Child
 * @since Divi 1.0
 */

get_header(); ?>


<section class="home-page books">
	<div id="primary" class="site-content">

		<div id="content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
          <h3><?php the_content(); ?></h3>
        <?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

</section><!-- .home-page -->


    <h4>Reviews</h4>
    <p class="services-intro">We take pride in our clients and the content we create for them.<br/>Here's a brief overview of our offered services.</p>
    <?php $args = array(
      'posts_per_page' => 4,
      'post_type' => 'reviews',
      'orderby' => 'ID',
      'order'   => 'ASC'
    );?>

    <?php query_posts($args);?>

    <?php while (have_posts() ) : the_post(); ?>

      <?php 
        $image = get_field("review_image");
        $size = "full"; 
        $flex = "flex";
      ?>
      <?php if ($wp_query->current_post % 2 == 0): 
        $flex = "flex_rtl"; ?>
      <?php endif; ?>
      
      <div class="featured-service flex <?php echo $flex; ?>">
        <div class="featured-service-text">
          <h3><?php the_title(); ?></h3>

          <?php the_content(); ?>
        </div>
        <div class="featured-service-image">
          <?php echo wp_get_attachment_image( $image, $size); ?>
        </div>
      </div> <!-- end featured service --> 
    <?php endwhile; ?> <!-- end loop -->
    <?php wp_reset_query(); ?> <!-- resets query back to original -->



<section class="contact-us">
  <div class="site-content">
    <ul class="contact-us-action">
      <li><h2>Interested in working with us?</h2></li>
      <li><a class="button" href="<?php echo home_url(); ?>/contact">Contact Us</a></li>
    </ul>
  </div>
</section>
<?php get_footer(); ?>