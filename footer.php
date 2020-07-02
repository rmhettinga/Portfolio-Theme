<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rmhettinga
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rmhettinga' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'rmhettinga' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				Big thanks to <a href="http://underscores.me/" target="_blank">Underscores.me</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->



<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
	// AOS.init({
	// 	duration: 600, // values from 0 to 3000, with step 50ms
	// 	});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.mg-space.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.0/lity.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.0/lity.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scroll.js"></script>
<script>
var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});
</script>


<?php wp_footer(); ?>



</body>
</html>
