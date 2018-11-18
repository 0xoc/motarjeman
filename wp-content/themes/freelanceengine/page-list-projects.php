<?php
/**
 * Template Name: List projects
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FreelanceEngine
 * @since FreelanceEngine 1.0
 */
//global $wp_query, $ae_post_factory, $post;
//$post_object = $ae_post_factory->get(PROJECT);
//query_posts(array('post_type' => 'project' , 'post_status' => 'publish'));
get_header();

?>
<div class="fre-page-wrapper">
    <div class="fre-page-title">
        <div class="container">
            <h2><?php the_title();?></h2>
        </div>
    </div>
    <?php include "projects-list-core.php" ;?>
</div>
<?php
get_footer();
