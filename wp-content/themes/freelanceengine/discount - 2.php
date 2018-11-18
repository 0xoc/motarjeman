<?php
/**
 * Template Name: safhe badi
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
				
				<div style="background-color: #fff; margin: 0 auto; padding-top:66px; width: 100%; height: 900px;border-radius: 16px;text-align: center;">
					
		

					
					
					
					<div style="color: #27ae60;padding-right: 5%; padding-left: 5%; font-size: 16px; line-height: 33px; margin-top: 86px;"><span style="font-size: 46px;padding-right: 9%;"> تبریک! 😀 </span></br></br> اطلاعات شما با موفقیت ثبت شد، یک امتیاز برای قرعه‌کشی کانون ترجمان دریافت کردید همچنین می توانید با خرید ویژه کتاب ها از لینک های زیر شانس خود را در قرعه‌کشی چندین برابر کنید.</br> لطفا کارت قرعه کشی خود را تا اعلام نتایج نهای نزد خود نگه دارید. </div>
	 
	 
	 			 <div style="color: #27ae60; padding-top: 61px; font-size:12px;">کتابهای مورد علاقه‌تان را انتخاب کرده و دکمه خرید کتاب را بفشارید</div>
				<form method="post">
					
				<div style="background-color: #cae6ff; width: 255px; font-size: 14px; color: #337ab7;border: 1px dashed #337ab7; margin: 17px auto; margin-bottom: 1px;height: 84px;padding-top: 12px; border-radius: 20px 20px 0 0;">
					<label style="cursor: pointer;" class="container"> کتاب ماشین محتوا <input style=" " type="checkbox" name="machine" value="content-machine"></br></br>
				
						<a style="color: #00539d; font-size: 11px;" href="https://noorando.com/content-machine/" target="_blank">(توضیحات کتاب) فقط 20.000 تومان</a>
				</div>
					
				<div style="width: 255px; height: 84px; margin: 0 auto;border: 1px dashed #337ab7; color: #337ab7; background-color: #cae6ff; padding-top: 12px; font-size: 14px;">
					<label style="cursor: pointer;" class="container"> کتاب خلق یا نفرت <input  style=" " type="checkbox" name="create" value="create-or-hate"></br></br>
					<a style="color: #00539d; font-size: 11px;" href="https://noorando.com/create-or-hate/" target="_blank">(توضیحات کتاب) فقط 12.000 تومان</a>
				</div>	
					
				<div style="width: 255px; height: 84px;margin: 2px auto; font-size: 14px; padding-top: 12px; border: 1px dashed #337ab7; background-color: #cae6ff; color: #337ab7;     border-radius: 0 0 20px 20px; margin-bottom: 37px; ">
					 <label style="cursor: pointer;" class="container"> کتاب بازاریابی هکر رشد <input  style=" " type="checkbox" name="hacker" value="growth-hacker-marketing" ><br><br>
						
					<a style="color: #00539d; font-size: 11px;" href="https://noorando.com/growth-hacker-marketing/" target="_blank">(توضیحات کتاب) فقط 13.000 تومان</a>
				</div>	


					<input  style="border-radius: 21px;border: none;height: 38px;margin-top: -33px; font-size: 18px;color: #fff;background-color: #358bc6;width: 186px;"  type="submit" value="خرید کتاب">
					
					
					<?php
				  
				  	echo "<div style=\"padding-top: 24px;\">اعلام نتایج قرعه کشی در کانال کانون ترجمان <a href=\"https://t.me/tarjomanclub\">@tarjomanclub</a></div>";
				  
				  
				if((isset($_POST['machine']) && !empty($_POST['machine'])) || (isset($_POST['create']) && !empty($_POST['create']))  || (isset($_POST['hacker']) && !empty($_POST['hacker'])) ){
					

						if(isset($_POST['hacker']) && isset($_POST['create']) &&  isset($_POST['machine'])){Redirect("http://bit.ly/2uOBFmS");}
						
						if(isset($_POST['machine']) && isset($_POST['create'])){Redirect("http://bit.ly/2OhEKnP");}
						if(isset($_POST['machine']) && isset($_POST['hacker'])){Redirect("http://bit.ly/2mGWPz0");}
						if(isset($_POST['hacker']) && isset($_POST['create'])){Redirect("http://bit.ly/2AdG73Z");}
						if(isset($_POST['machine'])){Redirect("http://bit.ly/2LplfvQ");}
						if(isset($_POST['create'])){Redirect("http://bit.ly/2OjQiXN");}
						if(isset($_POST['hacker'])){Redirect("http://bit.ly/2LQEaf3");}
						
				
					}
					?>
	 			</form>

			</div


        </div>
    </div>
</div>
<?php
}
get_footer();