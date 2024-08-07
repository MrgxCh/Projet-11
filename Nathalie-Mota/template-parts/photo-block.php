<!--CONTENT: BLOC PHOTOS ACCUEIL-->
<div class="liste-photos">
    <input type="hidden" name="page" value="1">
    <div class="gallerie">
        <?php
        $args_custom_posts = array(
            'post_type' => 'photo',
            'posts_per_page' => 8,
            'orderby' => 'date',
            'order' => 'DESC',
        );

        $custom_posts_query = new WP_Query($args_custom_posts);
        while ($custom_posts_query->have_posts()):
            $custom_posts_query->the_post();
            ?>
            <div class="article-container">
                <?php if (has_post_thumbnail()): ?>
                    <div class="photos-container">
                        <?php the_post_thumbnail(); ?>
                        <!-- Section | hover lightbox -->
                        <?php $post_id = get_the_ID(); ?>

                        <div class="thumbnail-overlay">

                            <div class="icon-eye">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_template_directory_uri() . "/images/icon_eye.png"; ?>"
                                        alt="icon-oeil">
                                </a>
                            </div>

                            <!--Ouvre la lightbox-->
                            <?php 
                            $reference = get_field('reference');
                            $categories = get_the_terms(get_the_ID(), 'categorie_photo');
                            $categorie_name = $categories[0]->name; ?>

                            <div class="icon-fullscreen open-lightbox-trigger">
                                <img class="zoom lightbox-photo"
                                    src="<?php echo get_template_directory_uri() . '/images/icon-fullscreen.png'; ?>"
                                    data-image="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>"
                                    data-category="<?php echo esc_attr($categorie_name); ?>"
                                    data-reference="<?php echo esc_attr($reference); ?>">
                            </div>

                            <?php
                            // Récupère la référence et la catégorie de l'image associée.
                            $titre_photo = get_the_title($post_id); //Titre de la photo
                            $categories_photo = get_the_terms(get_the_ID(), 'categorie_photo'); //Categorie de la photo 
                            $category_names = array();

                            if ($categories_photo) {
                                foreach ($categories_photo as $category) {
                                    $category_names[] = esc_html($category->name);
                                }
                            }
                            ?>

                            <div class="photo-info">
                                <div class="photo-info-left">
                                    <p><?php echo esc_html($titre_photo); ?></p>
                                </div>
                                <div class="photo-info-right">
                                    <p><?php echo implode(', ', $category_names); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php $id = get_the_ID(); ?>

        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>

    <div class="pagination-button">
        <button id="load-more">Charger plus</button>
    </div>
</div>

<?php get_template_part('/assets/includes/ajax.php'); ?>
<?php get_template_part('template-parts/lightbox'); ?>