<?php
//ajoute la feuille de style de mon thème
add_action( 'wp_footer', 'wpb_hook_javascript_footer', 'my_theme_enqueue_styles' );

if(!function_exists('my_theme_enqueue_styles')){ // vérifie que la fonction n'existe pas avant
    function my_theme_enqueue_styles() {
        
            wp_enqueue_style(
            'child-style',
            get_stylesheet_uri(),
            array( 'generatepress' ), 
            wp_get_theme()->get('Version') 
            );
        }
    }


if(!function_exists('wpb_hook_javascript_footer')){ 
    function wpb_hook_javascript_footer() {
        ?>
        <script>
          const backBtn = document.createElement('button');
                        document.body.appendChild(backBtn);
                        backBtn.innerText = 'Retour à la page précédente';
                        backBtn.addEventListener('click', function () {
                            if(document.referrer.includes('localhost/numnat')){
                                window.location.href = document.referrer ;
                            } else {
                                window.location.href = 'http://localhost/numnat';
                            }
                        })

            const copyright = document.createElement('p');
            document.body.appendChild(copyright);
            copyright.innerText = '© 2022 par NUMÉNAT . Tous droits réservés';
            copyright.style.textAlign = 'center';

        </script>
        <?php
    }
}

// Ajoute un type de publication personnalisé
/* add_action('init', 'numenat_projet_custom_post_type');

if(!function_exists('numenat_projet_custom_post_type')){
    function numenat_projet_custom_post_type(){
        $labels = array();
        $args = array(
            'label' => 'Formations', // nom dans l'interface back-office
            'labels' => $labels,
            'public' => true,
            'hierarchical' => true, // se comporte comme un article et non comme une page
            'exclude_from_search' => false,
            'publicly_queryable' => true, // visible dans le front du site
            'show_ui' => true, // visible dans le back-office
            'show_in_menu' => true, // ajoute un bonton dans le back-office pour gérer les "formations"
            'show_in_nav_menus' => true, // permet d'ajouter les 'formations' aux menus de navigation
            'show_in_rest' => true, // permet d'utiliser Gutenberg et de créer une rest API pour les "formations"
            'menu_position' => 5, // où se situe le bouton 'Formations' dans le menu d'admin
            'menu_icon' => 'dashicons-admin-home', // change l'icône dans le back-office
            'capability_type' => 'post', // mêmes droits utlisateur que les articles
            'supports' => array('title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'),
            'has_archive' => true, // créer une page d'archive, qui liste toutes les "formations"

        );
        register_post_type('formations', $args);
    }
} */
