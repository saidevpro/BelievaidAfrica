<?php
    $query = new WP_Query(
        array(
            "post__in" => get_option('sticky_posts'),
            'tax_query' => array(
                array(                
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array( 
                        'post-format-link',
                        'post-format-quote',
                    ),
                    'operator' => 'NOT IN'
                )
            )
        )
    ); 
?>
<?php if ($query->have_posts()): ?>
<section class="sticky-banner">
    <div id="carousel-posts-sticky" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
                $is_first = true;
                while ( $query->have_posts() ) {
                    $query->the_post(); ?>
                    <div class="carousel-item <?php echo $is_first ? "active" : "" ?>">
                        <?php get_template_part( 'template-parts/content/content' ); ?>
                    </div>
                    <?php
                    $is_first = false;
                }
            ?>
        </div>
        <a class="carousel-control-prev" href="#carousel-posts-sticky" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-posts-sticky" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<?php endif; ?>