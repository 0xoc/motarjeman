<?php
/**
 * Template Name: dashboard-template
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

$section = "submit-project";
if (isset($_GET['dashboard_section'])){
    global $section;
    $section = $_GET['dashboard_section'];
}

?>

<style>
    .dashboard-container {
        padding:20px;
    }
    .dashboard-sidebar{
        float:right;
        height: 100%;
        direction: rtl;
    }
    .post{
        clear:both;
    }
</style>

    <div class="fre-page-title">
        <div class="container">
            <h2><?php _e( 'Dashboard', ET_DOMAIN ) ?></h2>
        </div>
    </div>



        <div class="container dashboard-container ">
            <div class="row">
                <div class="col-sm-2 dashboard-sidebar">
                    <?php include "dashboard-menu.php" ?>
                </div>
                <div class="col-sm-10">
                    <?php if($section == "submit-project") {?>
                    <div id="post-place">
                        <?php
                        // check disable payment plan or not
                        $disable_plan = ae_get_option('disable_plan', false);
                        if(!$disable_plan) {
                            // template/post-place-step1.php
                            get_template_part( 'template/post-project', 'step1' );
                        }

                        // template/post-place-step3.php
                        get_template_part( 'template/post-project', 'step3' );

                        if(!$disable_plan) {
                            // template/post-place-step4.php
                            get_template_part( 'template/post-project', 'step4' );
                        }
                        ?>
                    </div>
                    <?php } else if ($section == "all-projects") {
                            include "projects-list-core.php";
                        ?>

                    <?php } else if ($section == "profile") { ?>
                        <?php include "profile-core.php" ?>
                    <?php } else if ($section == "credit" ) {

                        global $wp_query, $ae_post_factory, $post, $current_user, $user_ID;
                        $user_role = ae_user_role($current_user->ID);

                        if(!is_user_logged_in()){
                            wp_redirect(et_get_page_link('login').'?ae_redirect_url='.urlencode(et_get_page_link('my-credit')));
                        }


                       // get_header();

                        //do_action('fre_profile_tab_content');
                        do_action('fre_profile_tab_content_credit');
                    }
                        ?>
                </div>
                </div>
            </div>
    <div class="post"></div>
<?php
get_footer();