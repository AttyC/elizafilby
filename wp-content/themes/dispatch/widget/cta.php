<?php
$top_class = hoot_widget_border_class( $border, 0, 'topborder-');
$bottom_class = hoot_widget_border_class( $border, 1, 'bottomborder-');

$page_id = intval( $page_id );
if ( empty( $page_id ) )
	return;

global $post;
$post = get_post( $page_id );
setup_postdata( $post );
?>

<div class="cta-widget-wrap <?php echo sanitize_html_class( $top_class ); ?>">
	<div class="cta-widget-box <?php echo sanitize_html_class( $bottom_class ); ?>">
		<div class="cta-widget">
			<?php if ( !empty( $post->post_title ) ) { ?>
				<h3 class="cta-headine"><?php the_title(); ?></h3>
			<?php } ?>
			<?php if ( !empty( $post->post_content ) ) { ?>
				<div class="cta-description"><?php the_content(); ?></div>
			<?php } ?>
			<?php if ( !empty( $url ) ) { ?>
				<a class="cta-widget-button button button-large border-box titlefont" href="<?php echo esc_url( $url ); ?>"><?php echo $button_text; ?></a>
			<?php } ?>
		</div>
	</div>
</div>

<?php wp_reset_postdata(); ?>