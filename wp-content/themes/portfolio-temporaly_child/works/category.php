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
		<section class="page-top fadein ">

			<div class="til tac wrapper-ovn">
					<h2 class=""><?php single_cat_title(); ?></h2>
					<img src="<?php echo get_stylesheet_directory_uri();?>/img/works.png" alt="works" >
			</div>

			<ul class="wrapper-ovn category-li flex jss aic" >
				<li><a href="<?php echo home_url("/works/");?>" class="Text">ALL</a></li>
				<li>/</li>
				<li><a href="<?php echo home_url("/category/webdesign/");?>" class="Text">WEBデザイン</a></li>
				<li>/</li>
				<li><a href="<?php echo home_url("/category/flyer/");?>" class="Text">チラシ</a></li>
				<li>/</li>
				<li><a href="<?php echo home_url("/category/illust/");?>" class="Text">イラスト</a></li>
				<li>/</li>
				<li><a href="<?php echo home_url("/category/photo/");?>" class="Text">写真</a></li>
			</ul>
			<div class="page-eyecatch">
				<img src="<?php echo get_stylesheet_directory_uri();?>/works/img/01bg.jpg" alt="背景" >
			</div>



			<!--single-->
			<ul class="archive_list flex jss wrapper-ovn">
					<?php if(have_posts()): while(have_posts()):the_post(); ?>
				<li class=" archive-li ">

									<div class="arcive-img">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
									</div>
										<p class="tag <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>"><?php $cat = get_the_category(); ?><?php $cat = $cat[0]; ?><?php echo get_cat_name($cat->term_id); ?></p>
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


					</section>
					<!--end works-->
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
