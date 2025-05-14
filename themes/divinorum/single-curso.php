<?php get_header();?>
<?php while ( have_posts() ) { the_post(); ?>
<?php 
    $user =  wp_get_current_user();
    $cdvar =  get_the_author_meta( 'curso_dv', $user->ID ) ;
	$curso_dv =  maybe_unserialize($cdvar);
    $curso_dv = (is_array($curso_dv))?$curso_dv:[$curso_dv];
    if((in_array((string)get_the_ID(), $curso_dv) || (string)get_the_ID() == $curso_dv) || $user->allcaps['administrator'] ){?>
        
                
        <!--div class="breadcrumbs-wrap"-->
        <div class="container">
                <h1 class="page-title" ><?php the_title(); ?></h1>
            </div>
        <!--/div-->

        <!-- - - - - - - - - - - - - end Breadcrumbs - - - - - - - - - - - - - - - -->

        <!-- - - - - - - - - - - - - - Content - - - - - - - - - - - - - - - - -->

        <div id="content" class="page-content-wrap">
            <div class="container">
                <div class="row">
                    <main id="main" class="col-lg-9 col-md-12">
                        <?php the_content(); ?>				
                    </main>
                    <aside id="sidebar" class="col-lg-3 col-md-12">
                    <?php
                        $content = get_post_meta(get_the_ID(), 'meta_sidebar', true);
                        $testimonial_items = apply_filters('the_content', $content);
                        echo $testimonial_items;
                    ?>	
                    </aside>
                    </div>		
                </div>
            </div>
        </div>
    <?php } ?>
    <style>
        .container-login {
            background: #45b29d;
            padding: 15px;
            margin-bottom: 100px;
        }
        h1.page-title {
            text-align: center;
        }
        div#content {
            padding: 10px 0 125px 0;
        }
    </style>
<?php } ?>
<?php get_footer();