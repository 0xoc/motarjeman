<?php
/**
 * Template Name: Natayej
 *
 * This is the template that displays all pages with using visual composer to edit it
 *
 * @package WordPress
 * @subpackage FreelanceEngine
 * @since FreelanceEngine 1.0
 */

get_header();

if(have_posts()) { the_post();
	//the_title();
 ?>

<?Php
	function Redirect($url){
   		header('Location: ' . $url);
    	exit();
	}
				  
?>


 <div class="fre-page-wrapper">
    <div class="fre-page-title">
        <div class="container">
            <h2><?php the_title(); ?></h2>
        </div>
    </div>

    <div class="fre-page-section">
        <div class="container">
				
			
			<div style="background-color: #fff; margin: 0 auto; padding-top:66px; width: 100%; height: 290px;border-radius: 16px;text-align: center;">
					<?php

					echo "<div  style=\"color: #27ae60; padding-left: 5%; line-height: 35px; padding-right: 5%;\">با سپاس از خرید شما. کانون ترجمان در اولین فرصت با شما برای دریافت آدرس و ارسال کتاب تماس خواهد گرفت.</div>";

					?>
				
				

				</div



        </div>
    </div>
</div>
<?php
}
get_footer();