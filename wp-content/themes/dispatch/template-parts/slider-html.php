<?php
global $hoot_theme;

if ( !isset( $hoot_theme->slider ) || empty( $hoot_theme->slider ) )
	return;

// Ok, so we have a slider to show. Now, lets display the slider.

/* Create Data attributes for javascript settings for this slider */
$atts = $class = '';
if ( isset( $hoot_theme->sliderSettings ) && is_array( $hoot_theme->sliderSettings ) ) {
	if ( isset( $hoot_theme->sliderSettings['class'] ) )
		$class .= ' ' . sanitize_html_class( $hoot_theme->sliderSettings['class'] );
	if ( isset( $hoot_theme->sliderSettings['id'] ) )
		$atts .= ' id="' . sanitize_html_class( $hoot_theme->sliderSettings['id'] ) . '"';
	foreach ( $hoot_theme->sliderSettings as $setting => $value )
		$atts .= ' data-' . $setting . '="' . esc_attr( $value ) . '"';
}

/* Start Slider Template */
$slide_count = 1; ?>
<ul class="lightSlider<?php echo $class; ?>"<?php echo $atts; ?>><?php
	foreach ( $hoot_theme->slider as $slide ) :
		if ( !empty( $slide['image'] ) || !empty( $slide['content'] ) || !empty( $slide['title'] ) ) :

			$slide_bg = hoot_css_rule( 'background', $slide['background'] );
			?><li class="lightSlide hootslider-html-slide hootslider-html-slide-<?php echo $slide_count; $slide_count++; ?>" style="<?php echo esc_attr( $slide_bg ); ?>">

				<?php if ( !empty( $slide['image'] ) ) { ?>
					<div class="hootslider-html-slide-img">
						<img src="<?php echo esc_url( $slide['image'] ); ?>">
					</div>
				<?php } ?>

				<?php if ( !empty( $slide['content'] ) || !empty( $slide['title'] ) ) { ?>
					<div class="hootslider-html-slide-entry">
						<div class="grid">
							<div class="column-1-2">
								<?php if ( !empty( $slide['title'] ) ) { ?>
									<h3 class="hootslider-html-slide-title invert-typo">
										<?php if ( !empty( $slide['url'] ) ) { ?>
											<a href="<?php echo esc_url( $slide['url'] ); ?>">
										<?php } ?>
										<?php echo esc_html( $slide['title'] ) ; ?>
										<?php if ( !empty( $slide['url'] ) ) { ?>
											</a>
										<?php } ?>
									</h3>
								<?php } ?>
								<?php if ( !empty( $slide['content'] ) ) { ?>
									<div class="hootslider-html-slide-content linkstyle">
										<?php
										$slide['content'] = wp_kses_post( wpautop( $slide['content'] ) );
										if ( !empty( $slide['url'] ) && !empty( $slide['button'] ) )
											$slide['content'] .= '<a class="hootslider-html-slide-button more-link" href="' . esc_url( $slide['url'] ) . '">' . $slide['button'] . '</a>';
										echo wpautop( $slide['content'] ); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>

			</li><?php

		endif;
	endforeach; ?>
</ul>