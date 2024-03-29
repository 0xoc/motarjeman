<?php
    global $user_ID;
    $step = 3;
    $class_active = '';
    $disable_plan = ae_get_option('disable_plan', false);
    if( $disable_plan ) {
        $step--;
        $class_active = 'active';
    }
    if($user_ID) $step--;
    $post = '';
    $current_skills = '';

?>
<div id="fre-post-project-2 step-post" class="fre-post-project-step step-wrapper step-post <?php echo $class_active;?>">
    <?php
    	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
        if( $id ) {
            $post = get_post($id);
            if($post) {
                global $ae_post_factory;
                $post_object = $ae_post_factory->get($post->post_type);
                $post_convert = $post_object->convert($post);
                echo '<script type="data/json"  id="edit_postdata">'. json_encode($post_convert) .'</script>';
            }
            //get skills
            $current_skills = get_the_terms( $_REQUEST['id'], 'skill' );
        }

        if( !$disable_plan ) {

            $total_package = ae_user_get_total_package($user_ID);
    ?>
            <div class="fre-post-project-box">
                <div class="step-change-package show_select_package">
                    <p class="package_title"><i class="fa fa-plus primary-color" aria-hidden="true"></i> <?php _e('You are selecting the package:', ET_DOMAIN);?> <strong></strong></p>
                    <p class="package_description pdl-10"></p>
                    <p class="pdl-10"><?php _e('The number of posts included in this package will be added to your total post after this project is posted.',ET_DOMAIN) ?></p>
                    <br><!-- 'boxtheme' to ET_DOMAIN by morteza-->
                    <p><i class="fa fa-check primary-color" aria-hidden="true"></i> <?php _e('Number posts limit and detail of your purchased package.',ET_DOMAIN);?></p>
                    <p>
                        <?php printf(__('You have <span class="post-number">%s</span> post(s) left', ET_DOMAIN), $total_package); ?>
                    </p>
	                <?php
	                ob_start();
	                ae_user_package_info($user_ID);
	                $package = ob_get_clean();
	                if($package != '') {
		                echo $package;
	                }
	                ?>
                    <a class="probtnsabt fre-btn-o fre-post-project-previous-btn fre-btn-previous primary-color" href="#"><?php _e('Change package', ET_DOMAIN);?></a>
                </div>
                <div class="step-change-package show_had_package" style="display:none;">
                    <!-- 'boxtheme' to ET_DOMAIN by morteza-->
                    <p><i class="fa fa-check primary-color" aria-hidden="true"></i> <?php _e('Number posts limit and detail of your purchased package.',ET_DOMAIN);?></p>
                    <p>
	                    <?php printf(__('You have <span class="post-number">%s</span> post(s) left.', ET_DOMAIN), $total_package); ?>
                    </p>
                    <?php
                        ob_start();
                        ae_user_package_info($user_ID);
                        $package = ob_get_clean();
                        if($package != '') {
                            echo $package;
                        }
                    ?>
                    <p><em><?php _e('You are choosing a package that still available to post or pending so can not buy again. If you want to get more posts, you can directly move on the posting project plan by clicking the next "Add more" button.', ET_DOMAIN);?></em></p>
                    <a class="fre-btn-o fre-post-project-previous-btn fre-btn-previous" href="#"><?php _e('Add more', ET_DOMAIN);?></a>
                </div>
            </div>
    <?php } ?>
    <div class="fre-post-project-box">
        <form class="post" role="form">
            <div class="step-post-project" id="fre-post-project">
                <h2><?php _e('Your Project Details', ET_DOMAIN);?></h2>
                <div class="fre-input-field">
                    <label class="fre-field-title" for="project_category"><?php _e('What categories do your project work in?', ET_DOMAIN);?><span class="star-for-require">&nbsp *</span></label>  <!-- mene77 -->
                    <?php
                        $cate_arr = array();
                        if(!empty($post_convert->tax_input['project_category'])){
                            foreach ($post_convert->tax_input['project_category'] as $key => $value) {
                                $cate_arr[] = $value->term_id;
                            };
                        }
                        ae_tax_dropdown( 'project_category' ,
                          array(  'attr' => 'data-chosen-width="100%" data-chosen-disable-search="" multiple data-placeholder="'.sprintf(__("Choose maximum %s categories", ET_DOMAIN), ae_get_option('max_cat', 5)).'"',
                                  'class' => 'fre-chosen-category',
                                  //'class' => 'fre-chosen-multi',
                                  'hide_empty' => false,
                                  'hierarchical' => true ,
                                  'id' => 'project_category' ,
                                  'show_option_all' => false,
                                  'selected'        => $cate_arr,
                              )
                        );
                    ?>
                </div>
                <div class="fre-input-field">
                    <label class="fre-field-title" for="fre-project-title"><?php _e('Your project title', ET_DOMAIN);?><span class="star-for-require">&nbsp *</span></label> <!-- mene77 -->
                    <input class="fieldechange input-item text-field" id="fre-project-title" type="text" name="post_title">  <!-- mene77  fieldechange -->
					<p class="fre-allow-upload">(مفید و کوتاه بنویسید اگر تیتر پروژه شما گویا نباشد شانس دیده شدن آن کم خواهد شد)</p>  <!-- mene77 -->
                </div>
				
				                <div class="fre-input-field">
                    <label class="fre-field-title" for="skill"><?php _e('What skills do you require?', ET_DOMAIN);?><span class="star-for-require">&nbsp *</span></label>    <!-- mene77 -->
                    <?php
                        $c_skills = array();
                        if(!empty($post_convert->tax_input['skill'])){
                            foreach ($post_convert->tax_input['skill'] as $key => $value) {
                                $c_skills[] = $value->term_id;
                            };
                        }
                        ae_tax_dropdown( 'skill' , array(  'attr' => 'data-chosen-width="100%" data-chosen-disable-search="" multiple data-placeholder="'.sprintf(__("Choose maximum %s skills", ET_DOMAIN), ae_get_option('fre_max_skill', 5)).'"',
                                            'class' => ' fre-chosen-skill required',
                                            //'class' => ' fre-chosen-multi required',
                                            'hide_empty' => false,
                                            'hierarchical' => true ,
                                            'id' => 'skill' ,
                                            'show_option_all' => false,
                                            'selected' => $c_skills
                                    )
                        );
                    ?>
					<p class="fre-allow-upload">(با کلیک بر روی کادر بالا می توانید از فهرست مهارت ها، مهارت مورد نیاز را اضافه کنید)</p>  <!-- mene77 -->
                </div>
				
                <div class="fre-input-field">
                    <label class="fre-field-title" for="fre-project-describe"><?php _e('Describe what you need done', ET_DOMAIN);?><span class="star-for-require">&nbsp *</span></label>  <!-- mene77 -->
                    <?php wp_editor( '', 'post_content', ae_editor_settings() );  ?>
					<p class="fre-allow-upload">(شرح پروژه بایستی کامل و دقیق باشد زیرا به منزله قرارداد شما با متخصص می باشد، همچنین از درج اطلاعات تماس یا هرگونه تبلیغی پرهیز شود در غیر این صورت پروژه شما تایید نهایی نمی گردد)</p>  <!-- mene77 -->
                </div>
                <div class="fre-input-field" id="gallery_place">
                    <label class="fre-field-title" for=""><?php _e('Attachments (optional)', ET_DOMAIN);?></label>
                    <div class="edit-gallery-image" id="gallery_container">
                        <ul class="fre-attached-list gallery-image carousel-list" id="image-list"></ul>
                        <div  id="carousel_container">
                            <a href="javascript:void(0)" style="display: block"
                               class="img-gallery fre-project-upload-file secondary-color" id="carousel_browse_button">
                                <?php _e("Upload Files", ET_DOMAIN); ?>
                            </a>
                            <span class="et_ajaxnonce hidden" id="<?php echo wp_create_nonce( 'ad_carousels_et_uploader' ); ?>"></span>
                        </div>
                        <p class="fre-allow-upload"><?php _e('(Upload maximum 5 files with extensions including png, jpg, pdf, xls, and doc format)', ET_DOMAIN);?></p>
                    </div>
                </div>

                <div class="fre-input-field">
                    <label class="fre-field-title" for="project-budget"><?php _e('Your project budget', ET_DOMAIN);?><span class="star-for-require">&nbsp *</span></label>  <!-- mene77 -->
                    <div class="fre-project-budget">        <!--/// mene77 ///-->
                     
						
						<select required id="project-budget" name="et_budget" class="budget-select-mene fieldechange input-item text-field is_number numberVal">  <!-- mene77  fieldechange -->
 							<option value="100000">از 5,000 تومان تا 100,000 تومان</option>
 				 			<option value="300000">از 100,000 تومان تا 300,000 تومان</option>
							<option value="750000">از 300,000 تومان تا 750,000 تومان</option>
							<option value="2500000">از 750,000 تومان تا 2,500,000 تومان</option>
							<option value="5000000">از 2,500,000 تومان تا 5,000,000 تومان</option>
							<option value="15000000">از 5,000,000 تومان تا 15,000,000 تومان</option>
						</select>
						
                    </div>                                   <!--/// mene77 ///-->
                </div>
				
				
				<!--/// mene77 ///-->
<!--                 <div class="fre-input-field">
                    <label class="fre-field-title" for="project-location"><?php _e('Location (optional)', ET_DOMAIN);?></label>
                    <?php
                        ae_tax_dropdown( 'country' ,array(
                                'attr'            => 'data-chosen-width="100%" data-chosen-disable-search="" data-placeholder="'.__("Choose country", ET_DOMAIN).'"',
                                'class'           => 'fre-chosen-single',
                                'hide_empty'      => false,
                                'hierarchical'    => true ,
                                'id'              => 'country',
                                'show_option_all' => __("Choose country", ET_DOMAIN)
                            )
                        );
                    ?>
                </div> -->
				<!--/// mene77 ///-->
				
				
                <?php
                    // Add hook: add more field
                    echo '<ul class="fre-custom-field">';
                    do_action( 'ae_submit_post_form', PROJECT, $post );
                    echo '</ul>';
                ?>
                <div class="fre-post-project-btn">
                    <button class="probtnsabt fre-btn fre-post-project-next-btn primary-bg-color" type="submit"><?php _e("Submit Project", ET_DOMAIN); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Step 3 / End -->