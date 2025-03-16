<?php
/*
Template Name:top
*/

get_header();
?>
<link rel='stylesheet' id='style-css'  href='<?php echo get_stylesheet_directory_uri();?>/works/css/style.css' />

	<main id="primary" class="site-main">
		<!--home-main-->
		<section class="home-main">
<div class="wrapper">
	<h1>バブさん</h1>
	<p>Yurina Negishi</p>
</div>
		</section>
		<!--end home-main-->


		<!--works-->
		<section class="">

<div class="_fadein">
			<ul class="wrapper-ovn category-li flex jss aic" >
				<li><a href="<?php echo home_url("/works/all/");?>" class="Text">ALL</a></li>
				<li><a href="<?php echo home_url("/works/webdesign/");?>" class="Text">WEB</a></li>
				<li><a href="<?php echo home_url("/works/banner/");?>" class="Text">Banner</a></li>
				<li><a href="<?php echo home_url("/works/flyer/");?>" class="Text">Flyer</a></li>
				<li><a href="<?php echo home_url("/works/illust/");?>" class="Text">Illust</a></li>
				<li><a href="<?php echo home_url("/works/photo/");?>" class="Text">Photo</a></li>
				<!-- <li><a href="<?php echo home_url("/works/banner/");?>" class="Text">Banner</a></li> -->
			</ul>
			<div class="page-eyecatch">
				<!-- <img src="<?php echo get_stylesheet_directory_uri();?>/works/img/01bg.jpg" alt="背景" > -->
			</div>



			<!--single-->
			<ul class="archive_list flex jss wrapper-ovn">
				<?php
				$paged = (int) get_query_var('paged');
				$args = array(
					'posts_per_page' =>18,
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
			<div class="pager_blog wrapper-ovn ">
							<div class="page_navi_blog _tac roboto btn02">
						<p class="_tac all-link"><a href="<?php echo home_url("/works/all/");?>">All works</a></p>
							</div>
						</div>

	</div>
					</section>
					<!--end works-->
						</main><!-- #main -->
<?php
get_sidebar();
get_footer();
