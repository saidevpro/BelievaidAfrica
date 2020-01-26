<?php 
$query = new WP_Query(array(
    "posts_per_page" => 5,
    'tax_query' => array(
        array(                
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array('post-format-link'),
        )
    )
)); 
?>

<section class="section__links">
    <ul>
        <?php while( $query->have_posts() ): $query->the_post(); ?>
            <li>
                <?php get_template_part( 'template-parts/content/content', get_post_format() ); ?>
            </li>
        <?php endwhile; ?>
    </ul>
</section>