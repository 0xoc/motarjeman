<?php

global $wp_query, $ae_post_factory, $post;
$post_object = $ae_post_factory->get(PROJECT);
query_posts(array('post_type' => 'project' , 'post_status' => 'publish'));

?>
<div class="section-archive-project">
    <div class="page-project-list-wrap">
        <div class="fre-page-section fre-project-list-wrap">
            <?php get_template_part('template/filter', 'projects' ); ?>
            <div class="fre-project-list-box">
                <div class="fre-project-list-wrap">
                    <div class="fre-project-result-sort">
                        <div class="row">
                            <div class="col-sm-6 col-sm-push-6">
                                <div class="fre-project-sort">
                                    <select class="fre-chosen-single sort-order" id="project_orderby" name="orderby" >
                                        <option value="date"><?php _e('Newest Projects first',ET_DOMAIN);?></option>
                                        <option value="et_budget"><?php _e('Budget Projects first',ET_DOMAIN);?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-sm-pull-6">
                                <div class="fre-project-result">
                                    <p>
                                        <?php
                                        $found_posts = '<span class="found_post">'.$wp_query->found_posts.'</span>';
                                        $plural = sprintf(__('%s projects found',ET_DOMAIN), $found_posts);
                                        $singular = sprintf(__('%s project found',ET_DOMAIN),$found_posts);
                                        ?>
                                        <span class="plural <?php if( $wp_query->found_posts <= 1 ) { echo 'hide'; } ?>" >
                                                    <?php echo $plural; ?>
                                                </span>
                                        <span class="singular <?php if( $wp_query->found_posts > 1 ) { echo 'hide'; } ?>">
                                                    <?php echo $singular; ?>
                                                </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php get_template_part( 'list', 'projects' ); ?>
                </div>
            </div>
            <?php
            $wp_query->query = array_merge(  $wp_query->query ,array('is_archive_project' => is_post_type_archive(PROJECT) ) ) ;
            echo '<div class="fre-paginations paginations-wrapper">';
            ae_pagination($wp_query, get_query_var('paged'));
            echo '</div>';
            ?>
        </div>
    </div>

</div>