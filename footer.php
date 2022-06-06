        <footer class="site-footer container">
            <hr>
            <div class="container-footer">
                <!-- Navegation -->
                <?php
                    $args = array(
                        'theme_location' => 'menu-principal',
                        'container' =>'nav',
                        'container_class' => 'menu-principal'
                    );

                    wp_nav_menu($args);


                ?>

                <p class="copyrigth">Todos los derechos reservados. <?php echo get_bloginfo('name')." ".date('Y');?></p>
            
            </div>
        </footer>
        <?php wp_footer(); ?>


    </body>
</html>