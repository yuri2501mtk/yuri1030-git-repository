<?php
// 親テーマのスタイルを読み込む
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

// カスタムメニューを追加
add_action('after_setup_theme', 'add_custom_menu');
function add_custom_menu() {
    register_nav_menus(array(
        'header-navi' => 'ヘッダーナビ',
        'footer-navi' => 'フッターナビ',
    ));
}

// カテゴリページでの投稿数を変更
add_action('pre_get_posts', 'custom_posts_per_page');
function custom_posts_per_page($query) {
    if ($query->is_main_query() && !is_admin() && is_category()) {
        $query->set('posts_per_page', 12);
    }
}
function custom_rewrite_rules() {
    // /works/works/ を /works/ として処理するためのルールを追加
    add_rewrite_rule('^works/works/?$', 'index.php?post_type=post', 'top');
}
add_action('init', 'custom_rewrite_rules');

//スキルの投稿タイプの追加
function register_skill_post_type() {
    register_post_type('skill', [
        'labels' => [
            'name' => 'スキル',
            'singular_name' => 'スキル',
        ],
        'public' => true,
        'has_archive' => false,
        'supports' => ['title', 'editor', 'custom-fields'],
        'menu_icon' => 'dashicons-awards',
    ]);
}
add_action('init', 'register_skill_post_type');

//経歴のカスタム投稿を追加
function register_history_post_type() {
    register_post_type('history',[
        'labels' => [
            'name' => '経歴',
            'singular_name' => '経歴',
        ],
        'public' => true,
        'has_archive' => false,
        'supports' => ['title', 'editor', 'custom-fields'],
        'menu_icon' => 'dashicons-businessman'
    ]);
    }
    add_action('init', 'register_history_post_type');

    
function enqueue_about_page_scripts() {
    if (is_page_template('about.php')) {
        // Vue.js のスクリプトを読み込む
        wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@3', [], null, true);

        // カスタムスクリプト
        wp_enqueue_script('about-script', get_stylesheet_directory_uri() . '/js/about.js', ['vue'], null, true);

        // スキルデータを取得して渡す
        $skills = [];
        $query = new WP_Query([
            'post_type' => 'skill',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]);
        while ($query->have_posts()) {
            $query->the_post();
            $skills[] = [
                'name' => get_the_title(),
                'description' => get_the_content(),
                'level' => get_field('レベル'), // ACF フィールド
                'year' => get_field('年数'), // ACF フィールド
                'category' => get_field('カテゴリー'), // ACF フィールド
            ];
        }
        wp_reset_postdata();

        $history = [];
        $query = new WP_Query([
            'post_type' => 'history',
            'orderby' => 'title',
            'order' => 'ASC',
        ]);
        while ($query->have_posts()){
            $query->the_post();
            $history[] = [
         'place' => get_the_title(),
        'description' => get_the_content(),
        'id' => get_field('番号') ?: uniqid(),
        'type' => get_field('経歴タイプ') ?: 'unknown',
        'startDate' => get_field('開始日') ?: '',
        'endDate' => get_field('終了日') ?: '',
        'faculty' => get_field('学部') ?: '-',
        'industry' => get_field('業界') ?: '-',
        'role' => get_field('職種') ?: '-',
            ];
        }
        wp_reset_postdata();


        // スクリプトにローカライズデータを渡す
        wp_localize_script('about-script', 'aboutData', [
            'skills' => $skills,
            'history' => $history,
        ]);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_about_page_scripts');
function setup_theme() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'setup_theme');