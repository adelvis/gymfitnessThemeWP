<?php while(have_posts()): the_post(); ?>

    <h1 class="text-center text-primary"><?php the_title() ?></h1>

    <?php
        if ( has_post_thumbnail() ):
            the_post_thumbnail('blog', array('class'=>'img-prominent'));
        endif; 
    ?>

    <?php
        // Revisa si el custom post type es classes
        if(get_post_type()==='gymfitness_clases'):
            $hora_inicio = get_field('hora_inicio');
            $hora_fin = get_field('hora_fin');
    ?>
        <p class="info-class"><?php the_field('dias_clase');?> - <?php echo $hora_inicio ." a ". $hora_fin?></p>

    <?php endif; ?>

    <?php the_content(); ?>


<?php endwhile; ?>