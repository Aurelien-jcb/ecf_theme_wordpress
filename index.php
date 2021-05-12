<?php
get_header();
// The LOOP - Structure de base qui permet d'afficher du contenu dans wordpress
if ( have_posts() ) :
    while ( have_posts() ) : 
        the_post();
        ?>
        <article class="row">
            <div class="col-9 order-2">
                <!-- Affiche le titre de l'article -->
                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <?php
                // Afficher les categorie
                $categories = get_the_category();
                if ($categories):
                ?>
                    <ul class="categories">    
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
                        endforeach; 
                        ?>
                    </ul>
                <?php 
                endif;
                    ?>
                    <?php
                    // Afficher les categorie
                $tags = get_the_tags();
                if ($tags):
                ?>
                    <ul class="tags">    
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
            </div>
            <!-- Affiche l'image mise en avant si il y en a une -->
            <div class="col-2 order-1">
                <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
                <?php endif ?>
            </div>
    </article>
    <?php 
    endwhile;
endif;
get_footer();