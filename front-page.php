<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package GeneratePress
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Numnat</title>
</head>

<body>
    <main>
        <?php
        get_header();
       
        $args = array(
            'post_type' => 'formations',
            'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        ?>

        <section class="block-infos" id="accueil">

            <h2>Notre ambition, vous former pour la réussite de vos projets</h2>
            <p>Tout au long de notre vie, nous sommes amené à apprendre, à nous questionner, sur le monde qui nous entoure.
                NUMÉNAT vous propose des formations certifiantes et 100% finançables par les droits salariés dans le cadre du Compte Personnel Formation (CPF).</p>

            <p>Découvrez les avantages de nos formations :</p>
            <ul>
                <li>Démarrage de nos formations en présentiel</li>
                <li>Suivi des formations 100 % à distance</li>
                <li>Des formations 100 % personnalisées et individualisées</li>
                <li>Des formations 100 % prises en charge par le CPF</li>
                <li>Des formation qualifiantes ou certifiantes</li>
                <li>Mise à disposition, par notre partenaire informatique, de l’équipement nécessaire au bon déroulement de la formation</li>
            </ul>

            <div class="formations-demandees">
                <h3> Nos formations les plus demandées :</h3>
                <?php
                while ($query->have_posts()) {

                    $query->the_post();
                    
                    $formation = get_field('nom');
                    $demande = get_field('demandee');

                    if ($demande === true) { ?>

                        <h5><a href="<?php the_permalink(); ?>"><?= $formation ?> </a></h5><br>

                <?php } 
                }
                ?>
            </div>
                <div class="separator" style="height: 20px;"></div>
                
            <a href="/numnat/index.php/formations" class="button-link">Voir toutes nos formations</a>

        </section>

    </main>
    <?php get_footer(); ?>
</body>

</html>