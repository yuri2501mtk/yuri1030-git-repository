<?php
/**
 * Template Post Type: page
 * * Template Name: Works Page
 * @package Mebukinomori-Kanra
 */
 /*
 Template Name:allpost
 */
get_header();
?>

<link rel='stylesheet' id='style-css' href='<?php echo get_stylesheet_directory_uri(); ?>/works/css/style.css' />

<main id="primary" class="site-main">
    <section class="page-top">
        <div class="til tac wrapper-ovn">
            <h1 class="tac">All Works</h1>
        </div>
        <div class="_fadein">
            <ul class="wrapper-ovn category-li flex jss aic">
                <li><a href="<?php echo home_url('/works/'); ?>" class="Text">ALL</a></li>
                <li><a href="<?php echo home_url('/category/webdesign/'); ?>" class="Text">WEB</a></li>
                <li><a href="<?php echo home_url('/category/banner/'); ?>" class="Text">Banner</a></li>
                <li><a href="<?php echo home_url('/category/flyer/'); ?>" class="Text">Flyer</a></li>
                <li><a href="<?php echo home_url('/category/illust/'); ?>" class="Text">Illust</a></li>
                <li><a href="<?php echo home_url('/category/photo/'); ?>" class="Text">Photo</a></li>
            </ul>
            <div class="page-eyecatch"></div>

            <ul class="archive_list flex jss wrapper-ovn">
							<?php
					                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // 現在のページを取得
					                $args = array(
					                    'posts_per_page' => 6,
					                    'paged' => $paged,
					                    'orderby' => 'post_date',
					                    'order' => 'DESC',
					                    'post_type' => 'post', // 通常の投稿
					                    'post_status' => 'publish'
					                );
					                $my_posts = new WP_Query($args); // 記事取得
					                if ($my_posts->have_posts()):
					                    while ($my_posts->have_posts()):
					                        $my_posts->the_post();
					                ?>
                        <li class="archive-li">
                            <div class="arcive-img">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            <p class="tags"><?php the_category(', '); ?></p>
                            <h3 class="ar-til"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </li>
											<?php endwhile; wp_reset_postdata(); ?>
									<?php else : ?>
									  <p class="">記事が見つかりませんでした。</p>
									<?php endif; ?>
            </ul>

            <!-- ページネーション -->
									<div class="pager_blog wrapper-ovn">
			                <div class="page_navi_blog tac roboto">
												<?php
                     echo paginate_links(array(
                         'base' => get_pagenum_link(1) . '%_%',  // ページネーションのベースURL
                         'format' => 'page/%#%',  // /works/page/番号 の形式
                         'total' => $my_posts->max_num_pages,  // 総ページ数
                         'current' => $paged,  // 現在のページ番号
                         'mid_size' => 1,
                         'prev_text' => '＜',
                         'next_text' => '＞',
                     ));
                     ?>
			                </div>
                </div>
    </section>
</main>

<?php
get_sidebar();
get_footer();
