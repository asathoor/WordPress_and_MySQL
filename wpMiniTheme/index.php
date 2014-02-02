<html>
<head>
	<?php wp_head(); ?>
</head>
<body>

<?php
// a menu - simple page list
wp_list_pages();

// the loop
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        the_title( '<h3>', '</h3>' );
        the_content();
    }
}

// add sidebar
php get_sidebar();



wp_footer();

?>
</body>
</html>
