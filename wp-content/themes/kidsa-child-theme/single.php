<?php
/**
 * Blog Single Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kidsa
 */

get_header();
$kidsa = kidsa();
$page_layout_meta = Kidsa_Group_Fields_Value::page_layout_options('blog_single');
$full_width_class = $page_layout_meta['content_column_class'] === 'col-lg-12' ? ' full-width-content ' : '';
if ($kidsa->is_kidsa_core_active()){
    kidsa_core()->setPostViews(get_the_ID());
}
?>
	<div id="primary" class="content-area blog-content-page padding-120 <?php echo esc_attr($full_width_class);?>">
        <main id="main" class="site-main">
            <div class="container">
                <div class="row">
                    <div class="<?php echo esc_attr($page_layout_meta['content_column_class']);?>">
                        <?php
                        while ( have_posts() ) :
                            the_post();
                            get_template_part( 'template-parts/content', 'single' );
                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() || get_option( 'thread_comments' )) :
                                comments_template();
                            endif;
                        endwhile; // End of the loop.
                        ?>
                    </div>
                    <?php if ($page_layout_meta['sidebar_enable']): ?>
                        <div class="<?php echo esc_attr($page_layout_meta['sidebar_column_class']);?>">
                            <?php get_sidebar();?>
                        </div>
                    <?php endif; ?>
                </div>
				
				
					<section class="pt-4 pb-4">
							<div class="container user-bio-data">
									<div class="row">
										<div class="col-sm-2"></div>
										<div class="col-sm-1 p-0">
											 <?php
												echo get_avatar( get_the_author_meta( 'ID' ), '96' );
											?>
										</div>
										<div class="col-sm-6 bio-details">
											 <?php
												echo '<h5> About The Author: ' . get_the_author_meta( 'display_name' ) . '</h5><p>' . get_the_author_meta( 'description' ). '</p>';
											?>
										</div>
										
								</div>
							</div>
					</section>
					
				 <?php echo do_shortcode('[related_posts]'); ?>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
