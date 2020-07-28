<?php
/**
 * The template for displaying the home page
 */

get_header();
?>
<div class="">
		<div class="full-img" data-scroll-speed="7"></div>
		<!-- <div class="full-img2" data-scroll-speed="1"></div> -->
		<!-- <div class="full-img2 full-img3" data-scroll-speed="4"></div> -->

</div>
<header class="header">
	<nav class="primary-nav">
		<ul class="menu">
			<a href="#profile"><li>Profile</li></a>
			<a href="#resume"><li>Resume</li></a>
			<a href="#portfolio"><li>Portfolio</li></a>
			<a href="#contact"><li>Contact</li></a>
		</ul>
	</nav>
</header>


<section class="intro">
	<div class="intro-title">
		<h1>Rachel Hettinga</h1>
		<h2>Designer + Developer</h2>
		<a href="#profile"><button class="peach">Let's get to know eachother</button></a>
	</div><!-- title -->
</section><!-- intro -->


<section class="profile panel" id="profile" data-color="white">
	<div class="wrapper">
		<div class="title" data-aos="fade-up">
			<h2>Profile</h2>
		</div>
		<div class="grid-collage">
			<div class="prof-img-1" data-aos="fade-up">
				<img src="<?php echo get_template_directory_uri(); ?>/img/rachel-hettinga.png" alt="Profile - Rachel Hettinga" class="prof-img" />
				<div class="intro">
					<p>I have always had a passion for creating things. After teaching myself an ancient form of photoshop and programming my first website at 13, I knew I had found something that truly interested me.</p>

					<p>My love for colours and layout pulled me into the work of design, but when I noticed a barrier between designers and developers, I pushed to connect the two. Understanding code made me a better designer, and understating design made me a better coder. </p>

					<!-- <p>My passion lead me to teach development, which in turn taught me so much more. I continue to teach and freelance for agencies and clients, and am put into motion by taking on projects that inspire me.</p> -->
				</div>
			</div>
			<div class="prof-summary">
				<div class="grid bottom">
					<h3 data-aos="fade-up">creativity, functionality, simplicity, and coffee.</h3>
					<h4 data-aos="fade-up">These are the key elements that help me work, explore, learn, grow, and wake up.</h4>
					<div class="prof-btn" data-aos="fade-up">
						<a href="https://rmhettinga.ca/wp-content/uploads/2020/07/RachelHettinga-resume.pdf" target="_blank"><button class="peach">dowload resume</button></a>
					</div>
			</div><!-- prof summary -->
			<div class="prof-img-below">
				<div class="prof-img-2" data-aos="fade-up">
					<img src="<?php echo get_template_directory_uri(); ?>/img/rachel-hettinga-1.png" alt="Profile - Rachel Hettinga" class="prof-img" />
				</div>
				<div class="prof-img-3" data-aos="fade-up">
					<img src="<?php echo get_template_directory_uri(); ?>/img/desk.jpg" alt="Profile - Rachel Hettinga" class="prof-img" />
				</div>
			</div>
		</div><!--grid collage -->
	</div><!-- wrapper -->
</section><!-- profile -->
<div style="clear: both;"></div>
<section class="break">
	<h2>I believe that vulnerability is a strength rather then a weakness, and I approach all new things with this mindset. I crave change and growth, and that is why I am still captivated by this industry.</h2>
</section>

<section class="resume" id="resume">
	<div class="wrapper">
		<div class="title resume-title" data-aos="fade-up">
			<h2>Resume</h2>
			<h5>I am a multidisciplinary designer and developer who is real, honest, friendly and a self starter.</h5>
		</div>

		<div class="resume-content">

			<h2 class="new-res-section">Professional</h2>


			<?php
			$args = array(
			'post_type' => 'Resume',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => [
        [
            'taxonomy' => 'type',
            'terms' => 3,
						'posts_per_page' => -1,
    		],
			],
			);
			$the_query = new WP_Query( $args );
			?>




			<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<div class="job">
					<div class="info">
						<div class="date" data-aos="fade-right">
							<p><?php the_field('dates'); ?></p>
						</div>
						<div class="line">
							<div></div>
						</div>
						<div class="logo" data-aos="fade-right">
							<img src="<?php the_field('logo'); ?>" />
						</div><!-- logo -->
					</div><!-- info -->
					<div class="description" data-aos="fade-up">
						<?php the_field('job_description'); ?>
					</div><!-- decript -->
				</div><!-- job -->

			<?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
			<?php wp_reset_query(); ?>



			<h2 class="new-res-section">Fun</h2>

			<?php
			$argsFun = array(
			'post_type' => 'Resume',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => [
        [
            'taxonomy' => 'type',
            'terms' => 4,
						'posts_per_page' => -1,
        ],
			],

			);
			$the_fun_query = new WP_Query( $argsFun );
			?>

			<?php if ( $the_fun_query->have_posts() ) : while ( $the_fun_query->have_posts() ) : $the_fun_query->the_post(); ?>

				<div class="job">
					<div class="info">
						<div class="date" data-aos="fade-right">
							<p><?php the_field('dates'); ?></p>
						</div>
						<div class="line">
							<div></div>
						</div>
						<div class="logo" data-aos="fade-right">
							<img src="<?php the_field('logo'); ?>" />
						</div><!-- logo -->
					</div><!-- info -->
					<div class="description" data-aos="fade-up">
						<?php the_field('job_description'); ?>
					</div><!-- decript -->
				</div><!-- job -->

			<?php endwhile; else: ?>  <?php endif; ?>
			<?php wp_reset_query(); ?>


			<h2 class="new-res-section">Education</h2>
			<?php
			$argsEdu = array(
			'post_type' => 'Resume',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => [
        [
            'taxonomy' => 'type',
            'terms' => 6,
						'posts_per_page' => -1,
        ],
			],

			);
			$the_edu_query = new WP_Query( $argsEdu );
			?>

			<?php if ( $the_edu_query->have_posts() ) : while ( $the_edu_query->have_posts() ) : $the_edu_query->the_post(); ?>

				<div class="job">
					<div class="info">
						<div class="date" data-aos="fade-right">
							<p><?php the_field('dates'); ?></p>
						</div>
						<div class="line">
							<div></div>
						</div>
						<div class="logo" data-aos="fade-right">
							<img src="<?php the_field('logo'); ?>" />
						</div><!-- logo -->
					</div><!-- info -->
					<div class="description" data-aos="fade-up">
						<?php the_field('job_description'); ?>
					</div><!-- decript -->
				</div><!-- job -->

			<?php endwhile; else: ?>  <?php endif; ?>
			<?php wp_reset_query(); ?>


			<h2 class="new-res-section">Involvement</h2>
			<?php
			$argsInv = array(
			'post_type' => 'Resume',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => [
        [
            'taxonomy' => 'type',
            'terms' => 5,
						'posts_per_page' => -1,
        ],
			],

			);
			$the_inv_query = new WP_Query( $argsInv );
			?>

			<?php if ( $the_inv_query->have_posts() ) : while ( $the_inv_query->have_posts() ) : $the_inv_query->the_post(); ?>

				<div class="job">
					<div class="info">
						<div class="date" data-aos="fade-right">
							<p><?php the_field('dates'); ?></p>
						</div>
						<div class="line">
							<div></div>
						</div>
						<div class="logo" data-aos="fade-right">
							<img src="<?php the_field('logo'); ?>" />
						</div><!-- logo -->
					</div><!-- info -->
					<div class="description" data-aos="fade-up">
						<?php the_field('job_description'); ?>
					</div><!-- decript -->
				</div><!-- job -->

			<?php endwhile; else: ?>  <?php endif; ?>
			<?php wp_reset_query(); ?>



			<!-- <h2 class="new-res-section">Skills</h2> -->
		</div><!--resume-content-->
	</div><!-- wrapper -->
</section><!-- resume -->

<section class="break-2">
	<div id="counter">
		<div>
    	<div class="counter-value" data-count="12">0</div>
			<h3>Years of Experience</h3>
		</div>
		<div>
    	<div class="counter-value" data-count="9658">2000</div>
			<h3>Cups of Coffee</h3>
		</div>
		<div>
	    <div class="counter-value" data-count="29">0</div>
			<h3>Countries Visited</h3>
		</div>
	</div>
</section>

<section class="portfolio" id="portfolio">
	<div class="wrapper">
		<div class="title" data-aos="fade-up">
			<h2>Portfolio</h2>
		</div>



		<div class="mg-space-init container vert">
			<div class="mg-rows row row-flex">

				<?php
				$args = array(
				'orderby' => 'title',
				'post_type' => 'Portfolio',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => -1,
				);
				$the_query = new WP_Query( $args );
				?>
				<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<div class="xs-6 sm-4 lg-3">
						<div class="mg-trigger img-responsive" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
						<h2 class="port-title"><?php the_title(); ?></h2>
					</div>
				<?php endwhile; else: ?> <p>Sorry, there are no portfolio items to display</p> <?php endif; ?>
				<?php wp_reset_query(); ?>

			</div>
			<div class="mg-targets row">
				<?php
				$args = array(
				'orderby' => 'title',
				'post_type' => 'Portfolio',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => -1,

				);
				$the_query = new WP_Query( $args );
				?>
				<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<div class="">
						<div class="container">
							<div class="row row-flex">
								<div class="port-item">
									<div class="port-imgs">
										<?php if( get_field('project_media') ): ?>
											<img src="<?php the_field('project_media'); ?>" />
										<?php endif; ?>
										<?php if( get_field('project_media_2') ): ?>
											<img src="<?php the_field('project_media_2'); ?>" />
										<?php endif; ?>
										<?php if( get_field('project_media_3') ): ?>
											<img src="<?php the_field('project_media_3'); ?>" />
										<?php endif; ?>
										<?php if( get_field('project_media_4') ): ?>
											<img src="<?php the_field('project_media_4'); ?>" />
										<?php endif; ?>
									</div>
									<div class="port-desc">
										<div class="sticky-sb">
											<h2><?php the_title(); ?></h2>
											<h3>Description</h3>
											<?php the_field('description'); ?>
											<?php if( get_field('project_details') ): ?>
												<h3>Details</h3>
												<?php the_field('project_details'); ?>
											<?php endif; ?>
											<?php if( get_field('project_url') ): ?>
												<a href="<?php the_field('project_url'); ?>" target="_blank"><button class="peach">Visit Site</button></a>
											<?php endif; ?>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				<?php endwhile; else: ?> <p>Sorry, there are no posts to display</p> <?php endif; ?>
				<?php wp_reset_query(); ?>

			</div>
		</div>
	</div><!-- wrapper -->
</section>
<section class="contact" id="contact">
	<div class="wrapper">
		<div class="title contact-title" data-aos="fade-up">
			<h2>Contact</h2>
			<p>I would love to hear from you! Please send me an email at <a href="mailto:rmhettinga@gmail.com">rmhettinga@gmail.com</a> or give me a call at +1 (204) 809-5299. If you have any questions please do not hesitate to ask! Cheers!</p>
		</div>

	</div>
</section>

<?php

get_footer();
