<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mebukinomori-Kanra
 */
/*
Template Name:archive-category
*/
get_header();
?>
<link rel='stylesheet' id='style-css'  href='<?php echo get_stylesheet_directory_uri();?>/works/css/style.css' />
	<main id="primary" class="site-main">
		<!--works-->
		<section class="page-top  ">

			<div class="til tac wrapper-ovn">
					<h1 class="tac">All Works</h1>
					<!-- <img src="<?php echo get_stylesheet_directory_uri();?>/img/works.png" alt="works" > -->
			</div>
<div class="_fadein">
			<ul class="wrapper-ovn category-li flex jss aic" >
				<li><a href="<?php echo home_url("/works/");?>" class="Text">ALL</a></li>
				<li><a href="<?php echo home_url("/category/webdesign/");?>" class="Text">WEB</a></li>
				<li><a href="<?php echo home_url("/category/banner/");?>" class="Text">Banner</a></li>
				<li><a href="<?php echo home_url("/category/flyer/");?>" class="Text">Flyer</a></li>
				<li><a href="<?php echo home_url("/category/illust/");?>" class="Text">Illust</a></li>
				<li><a href="<?php echo home_url("/category/photo/");?>" class="Text">Photo</a></li>
			</ul>
			<div class="page-eyecatch">
				<!-- <img src="<?php echo get_stylesheet_directory_uri();?>/works/img/01bg.jpg" alt="背景" > -->
			</div>



			<!--single-->
			<ul class="archive_list flex jss wrapper-ovn">
				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'posts_per_page' =>24,
					'paged' => $paged,
					'orderby' => 'post_date',
					'order' => 'DESC',
					'post_type' => 'post',
					'post_status' => 'publish'

				);
				$the_query = new WP_Query($args);
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<li class=" archive-li ">

									<div class="arcive-img">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
									</div>
									<p class="tags <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>"><?php
					$category = get_the_category();
					if ( $category[0] ) {
					echo '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a>';
					}
					?></p>
										<h3 class="ar-til"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

					</li>
			<?php endwhile; endif; ?>
		</ul>

		<!--end single-->
			<div class="pager_blog wrapper-ovn">
							<div class="page_navi_blog tac roboto">
								<?php
								if ($the_query->max_num_pages > 1) {
									echo paginate_links(array(
										'base' => get_pagenum_link(1) . '%_%',
										'format' => 'page/%#%/',
										'current' => max(1, $paged),
										'end_size' => '1',
										'mid_size' => '2',

										'total' => $the_query->max_num_pages,
										'prev_text'          => __( '<' ),
										'next_text'          => __( '>' ),
										'end_size'
									));
								}
								?>
							</div>
						</div>

	</div>
					</section>
					<!--end works-->
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
