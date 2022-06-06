<?php get_header(); ?>

    <main class="page seccion container ">

       
            
            <?php
                $category= get_queried_object();
            ?>

            <h2 class="text-center text-primary">Categoria: <?php echo $category->name  ?></h2>
        
            <ul class="list-blog">
                <?php while(have_posts()): the_post(); ?>
                    <?php get_template_part( 'template-parts/loop', 'blog'); ?>
                <?php endwhile; ?> 
            </ul>



     

       

    </main>

<?php get_footer(); ?>