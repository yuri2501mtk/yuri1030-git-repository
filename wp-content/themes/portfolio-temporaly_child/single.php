<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Portfolio-temporaly
 */

get_header();
?>
<link rel='stylesheet' id='style-css'  href='<?php echo get_stylesheet_directory_uri();?>/works/css/style.css' />
<link rel='stylesheet' id='style-css'  href='<?php echo get_stylesheet_directory_uri();?>/works/css/style-single.css' />
	<main id="primary" class="site-main">
		<!--works-->
		<section class="page-top  ">

			<div class="til tac wrapper-ovn">
					<h1  class="tac">Works</h1>
					<!-- <img src="<?php echo get_stylesheet_directory_uri();?>/img/works.png" alt="works" > -->
			</div>
<div class="_fadein">
	<ul class="wrapper-ovn category-li flex jss aic" >
		<li><a href="<?php echo home_url("/works/all/");?>" class="Text">ALL</a></li>
		<li><a href="<?php echo home_url("/works/webdesign/");?>" class="Text">WEB</a></li>
		<li><a href="<?php echo home_url("/works/banner/");?>" class="Text">Banner</a></li>
		<li><a href="<?php echo home_url("/works/flyer/");?>" class="Text">Flyer</a></li>
		<li><a href="<?php echo home_url("/works/illust/");?>" class="Text">Illust</a></li>
		<li><a href="<?php echo home_url("/works/photo/");?>" class="Text">Photo</a></li>
	</ul>
			<div class="page-eyecatch">
				<!-- <img src="<?php echo get_stylesheet_directory_uri();?>/works/img/01bg.jpg" alt="背景" > -->
			</div>

<!-- single til -->
			<div class="single-til wrapper-ovn">
				<!-- <li class="child-subtil roboto"><?php the_time('Y.n.j'); ?></p> -->
				<p class="tags <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?>"><?php
$category = get_the_category();
if ( $category[0] ) {
echo '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a>';
}
?></p>
				<h2 class="page-til"><?php single_post_title(); ?></h2>
			</div>

			<div class="wrapper-ovn post-info_con">
				<?php
				//グループのデータを取得
				$field = get_field('group_6767534ac1e2a');
				?>
				<ul class="post-info_li flex jss">
    <li><span class="post-info_til">URL</span><a href="<?php the_field('url'); ?>" target="_blank"><span class="post-info_txt"><?php the_field('url'); ?></a></span></li>
    <li><span class="post-info_til">担当ポジション</span><span class="post-info_txt"><?php the_field('position'); ?></span></li>
    <li><span class="post-info_til">担当工程</span><span class="post-info_txt"><?php the_field('process'); ?></span></li>
    <li><span class="post-info_til">制作期間</span><span class="post-info_txt"><?php the_field('period'); ?></span></li>
    <li><span class="post-info_til">制作目的</span><span class="post-info_txt"><?php the_field('aim'); ?></span></li>
    <li><span class="post-info_til">ターゲット</span><span class="post-info_txt"><?php the_field('target'); ?></span></li>
				</ul>
					<p class="single-tag"><span>タグ:</span><?php the_tags( '', ' , ' );  ?></p>
			</div>

<!-- end single til -->

<!-- single contents -->
			<div class=" wrapper-ovn">
			    <main class="main_contents ">
					<?php if(have_posts()): ?>
							  <?php while(have_posts()):the_post(); ?>

						<!-- <?php if(has_post_thumbnail()) : ?>
						<div class="single_thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?> -->
					<div class="single_content">
						<?php the_content(); ?>
					</div>
				<?php endwhile; endif; ?>
    			</main>
			</div>
<!-- end single contents -->



			<ul class=" page-ba flex">
					<li class="tal first"><?php previous_post_link('%link', '<i class="fa-solid fa-circle-chevron-left"></i>PREVIOUS'); ?></li>
					<li class="tar"><?php next_post_link('%link', 'NEXT<i class="fa-solid fa-circle-chevron-right"></i>'); ?></li>
			</ul>
			</div>
		</section>
					<!--end works-->
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();