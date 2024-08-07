<?php $single_post_id = get_the_ID(); ?>

<div class="gallerie-single">
    <?php echo get_the_post_thumbnail(get_the_ID(), 'large'); ?>
    <div class="lightbox-single">
        <div class="icon-oeil">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_template_directory_uri() . "/images/icon_eye.png"; ?>" alt="icon-oeil">
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
        $single_titre_photo = get_the_title($single_post_id); //Titre de la photo
        $single_categories_photo = get_the_terms(get_the_ID(), 'categorie_photo'); //Categorie de la photo
        $single_category_names = array();

        if ($single_categories_photo) {
            foreach ($single_categories_photo as $category) {
                $single_category_names[] = esc_html($category->name);
            }
        }
        ?>

        <div class="single-photo-info">
            <div class="single-info-left">
                <p><?php echo esc_html($single_titre_photo); ?></p>
            </div>
            <div class="single-info-right">
                <p><?php echo implode(', ', $single_category_names); ?></p>
            </div>
        </div>
    </div>
</div>


<!-- Trigger to open the lightbox -->

<div id="lightbox-gallery" class="lightbox-overlay">
    <span class="close-lightbox">&times;</span>
    <div class="lightbox-content">

        <!--Image url lightbox fullsreen-->
        <img src="" alt="lightbox-image" id="lightbox-image">

         <!--Categorie et reference-->
         <div class="lightbox-infos">
            <span class="lightboxCategorie"></span>
            <span class="lightboxReference"></span>
        </div>

    </div>
</div>