<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package indo-pajero
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<!-- header page -->
			<?php
			while ( have_posts() ) : the_post(); ?>

			<div class="head-cell">
				<div class="title"><?php the_title(); ?></div>
				<div class="subtitle"><?php the_content(); ?></div>
				<div class="image"><?php the_post_thumbnail(); ?></div>
				<div class="border-bawah clear"><div></div></div>
			</div>
			<?php endwhile; // End of the loop. ?>

			<!-- about us page -->
			<div class="about page-cell ">
				<div class="container">
					<?php
					$args = array (
							'name' => 'about us',
							'post_type'=> 'page',
							'orderby' => 'date',
							'posts_per_page' => '2'
						);
					$loop = new WP_Query($args);
					while ($loop->have_posts()): $loop->the_post(); ?>

						<div class="title top-container"><span>&#9670</span> <?php the_title(); ?></div>
						<div class="ab-con">
						<div class="content"><?php the_excerpt(); ?></div>
						<div class="image"><?php the_post_thumbnail(); ?></div>
						</div>

					<?php endwhile; ?>
				</div>
				<div class="border-bawah clear"><div></div></div>
			</div>

			<!-- galery page -->
			<div class="galery page-cell ">
				<div class="container">
					<div class="title top-container"><span>&#9670</span> Gallery</div>
					<div class="im-con">
					<?php
					$args = array (
							'post_type'=> 'gallery',
							'orderby' => 'date',
							'posts_per_page' => '10'
						);
					$loop = new WP_Query($args);
					while ($loop->have_posts()): $loop->the_post(); ?>
						<div class="image"><?php the_post_thumbnail();?></div>				
					<?php endwhile; ?>
					</div>
				</div>
				<div class="border-bawah clear"><div></div></div>
			</div>

			<!-- event page -->
			<div class="event page-cell ">
				<div class="container">
					<div class="title top-container"><span>&#9670</span> Event</div>
					<div class="ev-con">	
					<?php
					$args = array (
							'post_type'=> 'event',
							'orderby' => 'date',
							'posts_per_page' => '2'
						);
					$loop = new WP_Query($args);
					while ($loop->have_posts()): $loop->the_post(); ?>
						<div class="con-ev">
							
							<div class="image"> <?php the_post_thumbnail(); ?></div>
							<div class="content"><div class="title"> <?php the_title(); ?></div> <div class="date"><?php echo get_the_date(); ?></div><?php the_excerpt(); ?></div>
						</div>
					<?php endwhile; ?>
					</div>
				</div>
				<div class="border-bawah clear"><div></div></div>
			</div>

			<div class="alamat page-cell ">
				<div class="container">
					<div class="title top-container"><span>&#9670</span> kontak</div>	

					<?php 
						$kt_phone = get_option('kt_phone');
						$kt_email = get_option('kt_email');
						$kt_alamat1 = get_option('kt_alamat1');
						$kt_alamat2 = get_option('kt_alamat2');
						$kt_alamat3 = get_option('kt_alamat3');
					?>

					<div class="content alamat"> <?php echo $kt_alamat1;?></div>
					<div class="content alamat"> <?php echo $kt_alamat2; ?></div>
					<div class="content alamat"> <?php echo $kt_alamat3; ?></div>
					<div class="content phone"> <?php echo $kt_phone; ?></div>
					<div class="content negara"> INDONESIA</div>
					
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();?
get_footer();
