<?php


function gymfitness_list_class($cantidad = -1){ ?>
 
    <ul class= "list-class">

        <?php
            $args =array(
                'post_type' => 'gymfitness_clases',
                'posts_per_page'=>$cantidad
            );
            $classes = new WP_Query($args);

            while($classes->have_posts()): $classes->the_post();?>

                <li class="clase card gradient">
                   <?php the_post_thumbnail('mediumm'); ?>

                   <div class="container">
                        <a href="<?php the_permalink();?>">
                            <h3><?php the_title();  ?></h3>
                        </a>

                        <?php
                            $hora_inicio = get_field('hora_inicio');
                            $hora_fin = get_field('hora_fin');

                        ?>
                        <p><?php the_field('dias_clase');?> - <?php echo $hora_inicio ." a ". $hora_fin?></p>

                   </div>
                </li>

        <?php endwhile; wp_reset_postdata(); ?>
       
    
    
    
    </ul>
 
<?php
}


