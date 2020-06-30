<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="<?php echo get_bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="alternate" href="<?php echo get_home_url(); ?>" hreflang="en-gb" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_home_url(); ?>/favicon.ico">
		<?php wp_head(); ?>
		<?php echo sixth_google_analytics('UA-545469-59'); ?>
		<link rel="stylesheet" href="https://use.typekit.net/lqg1wom.css">
	</head>

	<body <?php body_class(); ?>>
	
		<header class="c-header js-header">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-4 col-md-3 d-flex align-items-center">
						<a href="<?php echo get_home_url(); ?>">
							<?php echo file_get_contents(image('utrack-logo.svg')); ?>
						</a>
					</div>
					<div class="col-7 col-md-9 d-flex align-items-center justify-content-end">
						<?php
							wp_nav_menu([
								'menu'              => 'Main Menu',
								'theme_location'    => 'Main Menu',
								'container_class' 	=> 'c-header-menu js-mobile-menu',
								'depth' 			=> 2,
								'walker' 			=> new SixthStory_Walker()
							]);
						?>
						<div class="c-header-menu__toggle js-mobile-menu-toggle">
							<i class="far fa-bars menu-closed-icon"></i>
							<i class="far fa-times menu-open-icon"></i>
						</div>
					</div>
				</div>
			</div>
		</header>