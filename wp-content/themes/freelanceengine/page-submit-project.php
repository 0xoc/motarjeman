<?php
/**
 * Template Name: Page Post Project
*/

global $user_ID;

get_header();
?>
 <div class="fre-page-wrapper">
        <div class="fre-page-title">
            <div class="container">
                <h2><?php the_title(); ?></h2>
        </div>
</div>

<div class="fre-page-section">
    <div class="container">
        <?php
            include "post-project-core.php"
        ?>
    </div>
</div>
</div>

<?php
get_footer();