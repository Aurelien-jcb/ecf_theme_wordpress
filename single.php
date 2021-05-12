<?php 

get_header();

if ( have_posts() ) :
    the_post();
    ?>
<article class="row">
    <!-- Affiche le titre de l'article -->
    <h2 class="col-12"><?php the_title(); ?></h2>
    <!-- Affiche l'image mise en avant si il y en a une -->
    <?php if (has_post_thumbnail()): ?>
        <div class="col-12">
            <?php the_post_thumbnail( 'medium_large' ); ?>
        </div>
        <?php endif ?>
    <!-- Affiche le contenu de l'article  -->
    <div class="col-12">
        <?php the_content(); ?>
    </div>
    <?php
    // Afficher les categorie
    $categories = get_the_category();
    if ($categories):
    ?>
        <ul class="categories col-12">    
            <!-- Afficher chaque element catégorie dans le tableau category -->
            <?php foreach ($categories as $category): 
                // Affiche la categorie seulement si elle est differente de non-classé (id=1)
                if ($category->term_id != 1): 
                ?>
                <li>
                    <!-- esc_url récupère les chaines de caractère et ressort une url valide(sans guillemet etc) -->
                    <!-- get_term_link($category) récupère l'url de category -->
                    <a href="<?= esc_url(get_term_link($category))?>"><?= $category-> name ?> </a>
                </li>
            <?php 
                endif;
            endforeach; ?>
        </ul>
        <?php 
        endif;
        ?>
        <?php
        // Afficher les categorie
    $tags = get_the_tags();
    if ($tags):
    ?>
        <ul class="tags col-12">    
            <!-- Afficher chaque element catégorie dans le tableau category -->
            <?php foreach ($tags as $tag): ?>
                <li>
                    <!-- esc_url récupère les chaines de caractère et ressort une url valide(sans guillemet etc) -->
                    <!-- get_term_link($category) récupère l'url de category -->
                    <a href="<?= esc_url(get_term_link($tag))?>"><?= $tag-> name ?> </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php 
        endif;
        ?>
    </article>
    <?php 
endif;