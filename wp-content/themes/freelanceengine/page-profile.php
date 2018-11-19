<?php
/**
 * Template Name: Member Profile Page
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage FreelanceEngine
 * @since FreelanceEngine 1.0
 */

get_header();
?>


<div class="fre-page-wrapper list-profile-wrapper">
    <div class="fre-page-title">
        <div class="container">
            <h2><?php _e( 'My Profile', ET_DOMAIN ) ?></h2>
        </div>
    </div>

    <div class="fre-page-section">
        <div class="container">
            <?php include "profile-core.php "?>
        </div>
    </div>
</div>


<?php
get_footer();