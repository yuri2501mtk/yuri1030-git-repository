<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portfolio-temporaly
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="breadcrumbs wrapper-ovn" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>

		<!-- <nav>
		<?php
		wp_nav_menu(array(
		  'theme_location' => 'footer-navi',
		  'container_class' => 'ftr',
		  'container_id' => 'footer',
		  'items_wrap' => '<ul>%3$s</ul>'
		));
		?>
		</nav> -->
		<div class="copy tac">
			<small>© Yurina Negishi All Right Reserved.</small>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<script type="text/javascript">


//slick.js
$('.single-item').slick({
	autoplay: false,
	dots: true,
	arrows: true,
	adaptiveHeight: true,
});


//fadeIn
$(function(){
	$(window).scroll(function (){
		$('.fadein').each(function(){
			var elemPos = $(this).offset().top;
			var scroll = $(window).scrollTop();
			var windowHeight = $(window).height();
			if (scroll > elemPos - windowHeight + 200){
				$(this).addClass('scrollin');
			}
		});
	});
});

$(function() {
    $('.hamburger').click(function() {
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $('.globalMenuSp').addClass('active');
        } else {
            $('.globalMenuSp').removeClass('active');
        }

    });
});
//メニュー内を閉じておく
$(function() {
    $('.globalMenuSp a[href]').click(function() {
        $('.globalMenuSp').removeClass('active');
       $('.hamburger').removeClass('active');

    });
  });

</script>

</body>
</html>
