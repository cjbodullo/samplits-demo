<?php
/**
 * Template part for displaying single package post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kidsa
 */

$kidsa = kidsa();
$project_single_meta_data = get_post_meta(get_the_ID(), 'kidsa_project_options', true);
$project_clients = isset($kidsa_projec_meta['project_clients']) && !empty($kidsa_projec_meta['project_clients']) ? $kidsa_projec_meta['project_clients'] : '';
$project_cat = isset($kidsa_projec_meta['project_cat']) && !empty($kidsa_projec_meta['project_cat']) ? $kidsa_projec_meta['project_cat'] : '';
$project_date = isset($kidsa_projec_meta['project_date']) && !empty($kidsa_projec_meta['project_date']) ? $kidsa_projec_meta['project_date'] : '';
$project_location = isset($kidsa_projec_meta['project_location']) && !empty($kidsa_projec_meta['project_location']) ? $kidsa_projec_meta['project_location'] : '';
$project_content = isset($project_single_meta_data['project_content']) && !empty($project_single_meta_data['project_content']) ? $project_single_meta_data['project_content'] : '';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('projec-details-item'); ?>>
    <div class="entry-content">
        <div class="row">
            <div class="col-lg-4">
                <div class="td-sidebar service-sidebar">
                    <div class="widget widget_info">
                        <h5 class="widget-title"><i class="fas fa-arrow-right"></i> Project Info</h5>               
                        <div class="widget-info-inner">
                            <?php
                                if (!empty($project_clients)) { ?>
                                    <h6><?php echo esc_html('Clients:', 'kidsa'); ?></h6>  
                                    <p><?php echo esc_html($project_clients); ?></p>    
                                <?php }
                            ?>
                            <?php
                                if (!empty($project_cat)) { ?>
                                    <h6><?php echo esc_html('Category:', 'kidsa'); ?></h6>  
                                    <p><?php echo esc_html($project_cat); ?></p>    
                                <?php }
                            ?>
                            <?php
                                if (!empty($project_date)) { ?>
                                    <h6><?php echo esc_html('Date:', 'kidsa'); ?></h6>  
                                    <p><?php echo esc_html($project_date); ?></p>    
                                <?php }
                            ?>
                            <?php
                                if (!empty($project_location)) { ?>
                                    <h6><?php echo esc_html('Location:', 'kidsa'); ?></h6>  
                                    <p><?php echo esc_html($project_location); ?></p>    
                                <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <?php
                    the_content();
                ?>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->