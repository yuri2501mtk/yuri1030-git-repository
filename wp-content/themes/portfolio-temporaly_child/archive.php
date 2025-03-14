<?php
/**
 * The template for displaying archive pages
 *
 * @package 
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

									$wp_query = new WP_Query();
				  $param = array(
				  'posts_per_page' => '18', //表示件数。-1なら全件表示
				  'post_type' => 'post', //カスタム投稿タイプの名称を入れる
				  'paged' => $paged,
				);
			  $wp_query->query($param);
			  if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
				?>
                        <li class="archive-li">
                            <div class="arcive-img">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            <p class="tags"><?php the_category(', '); ?></p>
                            <h3 class="ar-til"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        </li>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>投稿が見つかりませんでした。</p>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            </ul>

            <!-- ページネーション -->
            <div class="pager_blog wrapper-ovn">
                <div class="page_navi_blog tac roboto">
									<?php global $wp_rewrite;
								  $paginate_base = get_pagenum_link(1);
								  if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
								    $paginate_format = '';
								    $paginate_base = add_query_arg('paged','%#%');
								  }
								  else{
								    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') .
								    user_trailingslashit('page/%#%/','paged');;
								    $paginate_base .= '%_%';
								  }
								  echo paginate_links(array(
								    'base' => $paginate_base,
								    'format' => $paginate_format,
								    'total' => $wp_query->max_num_pages,
								    'mid_size' => 1,
								    'current' => ($paged ? $paged : 1),
								    'prev_text' => '<',
								    'next_text' => '>',
								  )); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_sidebar();
get_footer();
