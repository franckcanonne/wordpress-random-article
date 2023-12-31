<?php
/*
Plugin Name: Extension pour Article au Hasard
Plugin URI: https://factotum.bzh/boutique-wordpress/
Description: Affiche un article au hasard sur une page.
Version: 1.0
Author: Franck Canonne
Author Email: franck.canonne@gmail.com
Author URI: https://factotum.bzh
License: GPL2
*/

// Ajout du shortcode [article_au_hasard]
add_shortcode('article_au_hasard', 'shortcode_article_au_hasard');

function afficher_article_au_hasard() {
$args = array(
'posts_per_page' => 1,
'orderby' => 'rand'
);

$query = new WP_Query($args);

if ($query->have_posts()) {
while ($query->have_posts()) {
$query->the_post();
// Afficher le titre et le contenu de l'article
the_title('<h2>', '</h2>');
the_content();
}
}

wp_reset_postdata();
}

function shortcode_article_au_hasard()
{
    ob_start();
    afficher_article_au_hasard();
    return ob_get_clean();
}




