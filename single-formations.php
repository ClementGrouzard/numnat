<?php

/**  
 * Test d'affichage single 
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<main>

<?php 
the_post_thumbnail();
the_content();?>

</main>

<?php get_footer();
