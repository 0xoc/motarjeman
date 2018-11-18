<?php
global $wp_query, $ae_post_factory, $post, $no_category;   /* mene77   no_category */
$post_object = $ae_post_factory->get( 'project' );
?>

<!--/// mene77 ///-->

			<?php

					 $f= $_SERVER["REQUEST_URI"];
					$r=str_split($f);
					$r=array_slice($r,16);
					$m='';
					for($i=1; $i <=count($r) ; $i++) {
						$m.=$r[$i];
					}
					/* $m== esm linke daste  */  
				
					
					if($m=='/web-and-blog-writing/'){$l='محتوا‌نویسی وب'; $colornev1='background-color: #cfe3e8';}
					elseif($m=='/technical-writing/'){$l='متون فنی'; $colornev2='background-color: #cfe3e8';}
					elseif($m=='/personal-writing/'){$l='متون شخصی'; $colornev3='background-color: #cfe3e8';}
					elseif($m=='/editor-writing/'){$l='ویرایش'; $colornev4='background-color: #cfe3e8';}
					elseif($m=='/translation/'){$l='ترجمه'; $colornev5='background-color: #cfe3e8';}
					elseif($m=='/creative-writing/'){$l='نوشتن خلاقانه'; $colornev6='background-color: #cfe3e8';}
					elseif($m=='/business-writing/'){$l='کسب و کار'; $colornev7 = "background-color: #cfe3e8";}
					elseif($m=='/academic-writing/'){$l='متون دانشگاهی'; $colornev8='background-color: #cfe3e8';}
					elseif($m=='/press/'){$l='متون خبری'; $colornev9='background-color: #cfe3e8';}
					elseif($m=='/transcription/'){$l='رونویسی'; $colornev10='background-color: #cfe3e8';}
					elseif($m=='/legal-writing/'){$l='نوشته حقوقی'; $colornev11='background-color: #cfe3e8';}
					elseif($m=='/other-writings/'){$l='متون متفرقه'; $colornev12='background-color: #cfe3e8';}
					else{ $l='پروژه‌های موجود';}
					?>

<!--/// mene77 ///-->



<ul class="fre-project-list project-list-container">
	
	
		<!--/// mene77 ///-->
	
	
		<?php
			if($m=='/web-and-blog-writing/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'مقاله و پست وبلاگی'.'<br>';
				echo 'محتوای وب'.'<br>';
				echo 'شرایط و مقررات'.'<br>';
				echo 'پرسش‌های متداول'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '</div>';
			}
			elseif($m=='/technical-writing/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'متن بروشور'.'<br>';
				echo 'کتابچه محصول'.'<br>';
				echo 'کتابچه راهنما'.'<br>';
				echo 'گزارش پروژه'.'<br>';
				echo 'راهنمای نرم‌افزار'.'<br>';
				echo '.'.'<br>';
				echo '</div>';
			}
			elseif($m=='/personal-writing/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'رزومه'.'<br>';
				echo 'نامه معرفی'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '</div>';
			}
			elseif($m=='/editor-writing/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'نمونه‌خوانی'.'<br>';
				echo 'ویرایش'.'<br>';
				echo 'ویراستاری'.'<br>';
				echo 'صفحه‌آرایی در ورد'.'<br>';
				echo 'صفحه‌آرایی در لاتکس'.'<br>';
				echo '.'.'<br>';
				echo '</div>';
			}
			elseif($m=='/translation/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'مقاله'.'<br>';
				echo 'وبسایت'.'<br>';
				echo 'کتاب'.'<br>';
				echo 'ویدئو'.'<br>';
				echo 'صوت'.'<br>';
				echo 'تصویر'.'<br>';
				echo '</div>';
			}
			elseif($m=='/creative-writing/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'ادبی'.'<br>';
				echo 'شعر'.'<br>';
				echo 'داستان'.'<br>';
				echo 'خاطره'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '</div>';
			}
			elseif($m=='/business-writing/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'تبلیغ نویسی'.'<br>';
				echo 'طرح کسب‌وکار'.'<br>';
				echo 'تحقیقات بازار'.'<br>';
				echo 'پرسش‌نامه'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '</div>';
			}	
			elseif($m=='/academic-writing/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'گزارش پژوهش'.'<br>';
				echo 'پیشنهاد پژوهش'.'<br>';
				echo 'پایان‌نامه'.'<br>';
				echo 'مقاله‌نویسی'.'<br>';
				echo 'پرسش‌نامه'.'<br>';
				echo '.'.'<br>';
				echo '</div>';
			}
			elseif($m=='/press/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'اعلامیه‌های مطبوعاتی'.'<br>';
				echo 'سخنرانی'.'<br>';
				echo 'مصاحبه'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '</div>';
			}
			elseif($m=='/transcription/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'فایل صوتی'.'<br>';
				echo 'فایل ویدئویی'.'<br>';
				echo 'تصویر'.'<br>';
				echo 'فایل‌های غیر ورد'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '</div>';
			}
			elseif($m=='/legal-writing/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo 'وکالت‌نامه'.'<br>';
				echo 'قرارداد'.'<br>';
				echo 'شرایط و مقررات'.'<br>';
				echo 'نامه دادخواست'.'<br>';
				echo 'توافق عدم افشاء'.'<br>';
				echo 'شراکت'.'<br>';
				echo '</div>';
			}
			elseif($m=='/other-writings/'){
				echo '<div style="width: 270px;margin-top: 0px;padding-top: 20px;line-height: 36px;margin-left: 39px;padding-right: 58px;height: 65%;" class="col-md-4">';
				echo '<div style="font-size: 20px;color: #2c3e50;padding-bottom: 16px;">'."زیردسته‌های $l" .'</div>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '.'.'<br>';
				echo '</div>';
			}
			else{
				$no_category=1;
			}
			
			
		?>
	
	
	<?php if(have_posts()==0){ ?>
				<li class="no-project project-item">
					<div style="padding-bottom: 284px;border-right: 1px solid #ededed !important;" class="project-list-wrap">
						<h3>پروژه‌ای یافت نشد.</h3>
						<div></div>
						<div></div>
						<div></div>
					</div>
				</li>
	<?php }else{ ?>
	
	<!--/// mene77 ///-->
	
	<?php
	$postdata = array();
	while ( have_posts() ) {
		the_post();
		$convert    = $post_object->convert( $post );
		$postdata[] = $convert;

		if ( $convert->post_status == 'publish' ) {
			get_template_part( 'template/project', 'item' );
		}
	}
	?>
</ul>
<div class="profile-no-result" style="display: none;">
    <div class="profile-content-none">
        <p><?php _e( 'There are no results that match your search!', ET_DOMAIN ); ?></p>
        <ul>
            <li><?php _e( 'Try more general terms', ET_DOMAIN ) ?></li>
            <li><?php _e( 'Try another search method', ET_DOMAIN ) ?></li>
            <li><?php _e( 'Try to search by keyword', ET_DOMAIN ) ?></li>
        </ul>
    </div>
</div>

<?php } ?>  <!-- mene77 -->
<?php wp_reset_query(); ?>
<?php
/**
 * render post data for js
 */
echo '<script type="data/json" class="postdata" >' . json_encode( $postdata ) . '</script>';