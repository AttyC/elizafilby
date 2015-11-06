<?php
// Get Left Content
$topbar_left = is_active_sidebar( 'topbar-left' );

// Get Right Content
$topbar_right = '';
$topbar_icons = hoot_get_option( 'topbar_icons' );
if ( is_array( $topbar_icons ) ) {
	foreach ( $topbar_icons as $profile ) {
		if ( !empty( $profile['icon'] ) && !empty( $profile['url'] ) ) {
			$topbar_right .= '<a class="social-icons-icon ' . $profile['icon'] . '-block" href="' . esc_url( $profile['url'] ) . '"><i class="fa ' . $profile['icon'] . '"></i></a>';
		}
	}
}

// Show Search
$search = !(bool) hoot_get_option( 'topbar_hide_search' );

// Return if nothing to show
if ( empty( $topbar_left ) && empty( $topbar_right ) && !$search )
	return;

// Display Topbar
?>

<div id="topbar" class="grid-stretch">
	<div class="grid">
		<div class="grid-row">
			<div class="grid-span-12">

				<div class="table">
					<?php if ( $topbar_left ): ?>
						<div id="topbar-left" class="table-cell-mid">
							<?php dynamic_sidebar( 'topbar-left' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( $topbar_right || $search ): ?>
						<div id="topbar-right" class="table-cell-mid">
							<div id="topbar-right-inner" class="social-icons-widget social-icons-small">
								<?php
								if ( $search )
									get_search_form();
								if ( $topbar_right )
									echo $topbar_right;
								?>
							</div>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>
</div>