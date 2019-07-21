<?php
// Template Name: Portfolio-4-column
get_header();
get_template_part('index', 'banner');
?>

<?php
// Enqueue Script 
wp_register_script('elitepress-portfolio',get_template_directory_uri().'/js/Portfolio/portfolio.js');
wp_enqueue_script('elitepress-portfolio');
?>

<!-- call template -->
<?php get_template_part('content','portfolio');  ?>
<!-- /Portfolio Section -->
<?php get_footer(); ?>