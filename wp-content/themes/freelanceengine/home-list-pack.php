<!-- wp-content/themes/freelanceengine/home-list-pack.php -->
<?php
	global $user_ID, $ae_post_factory;
	global $disable_plan, $pay_to_bid;

?>
<div class="fre-service-content">

	<div class="row">
		<div class="col-md-1 hidden-sm"></div>
		
		<div class="col-md-10">
			<div class="row fre-service-package-list">
				<?php
					if( ! $disable_plan && (  !is_user_logged_in() || ae_user_role($user_ID) != FREELANCER ) ){
						// Show Package for project - role Admin, Employer & Visitor
					    $ae_pack = $ae_post_factory->get('pack');
					    $packs = $ae_pack->fetch('pack');
					    if ( ! empty( $packs ) ) {
							foreach ($packs as $key => $package) {
		                        if($package->et_duration == 1){
		                        	$duration = sprintf(__('%s day', ET_DOMAIN), $package->et_duration);
		                        }else{
		                        	$duration = sprintf(__('%s days', ET_DOMAIN), $package->et_duration);
		                        }	?>
								
								<?php   if($key<3){    ?>
								<div class="col-md-4 col-sm-6">
									<div class="fre-service-pricing">
										<div class="service-price">

										<h3 class="packname"><?php echo $package->post_title; ?></h3>
										</div>
										<div class="service-info">
											<?php  //mene77//
												$pri=($package->et_price)/1000;
													
												if(($package->et_price) > 0 && $duration == 30) {
													echo '<h2 class="Defineprice">ماهیانه '.$pri .' هزار تومان														</h2>';
																																								if($pri==20){
														echo '<a href="https://noorando.com/submit-project/?pack_id=1364"><h2 class="Defineprice1">سالیانه 180 هزار تومان														   </h2></a>';
													}elseif($pri==50){
														echo '<a href="https://noorando.com/submit-project/?pack_id=1366"><h2 class="Defineprice1">سالیانه 450 هزار تومان 														</h2></a>';
													}
													
		                        				}elseif($package->et_price > 0 && $duration == 365){
													echo '<h2 class="Defineprice">سالیانه'. $pri .' هزار تومان 													</h2>';

												}else{
		                        					echo '<h2 class="Defineprice">';_e("FREE", ET_DOMAIN);													  echo "</h2> ";
													echo '<a href="#"><h2 class="Defineprice1">24 پروژه در سال</h2></a>';
		                        				}
													//mene77// 
											?>   
											
											
											<p><?php echo $package->post_content; ?></p>	
											
										</div>
									 	<?php
									 	if( !is_user_logged_in() ) {
								 				if(fre_check_register()){ ?>
		                                	<a class="fre-service-btn primary-color-hover" href="<?php echo et_get_page_link( 'register', array('role' => 'employer')); ?>">
		                                    	<?php _e('Sign Up', ET_DOMAIN); ?>
		                                    </a>
		                                <?php }
		                                }else{
		                                	$submit_url = et_get_page_link( array('page_type' => 'submit-project') );
		                                	$purchage_url = add_query_arg( 'pack_id',$package->ID, $submit_url );
		                                	?>
		                                	<a class="fre-service-btn primary-color-hover" href="<?php echo esc_url($purchage_url); ?>">
		                                    	<?php _e("Purchase", ET_DOMAIN); ?>
		                                    </a>
		                                <?php } ?>
									</div>
									
								</div>
								<?php  }   ?>

								
				
							<?php
							}
						} else { ?>
							<div class="col-md-12" style="font-size: 14px;">
		    					<center><?php _e('There are no package plans available yet!.',ET_DOMAIN ); ?></center>
		    				</div> <?php
						}

					} else if( $pay_to_bid ) { // if freelancer similar - only show list bid package if pay_to_bid = 1

						// Show Package for bid - role Freelancer
						$ae_bid = $ae_post_factory->get('bid_plan');
    					$bid_plans = $ae_bid->fetch('bid_plan');

    					if ( ! empty( $bid_plans ) ) {
    						$pay_link = et_get_page_link('upgrade-account');

	    					foreach ($bid_plans as $key => $plan) {	?>
	    						<div class="col-md-4 col-sm-6">
									<div class="fre-service-pricing">
											<div class="service-price">
												<h3 class="packname"><?php echo $plan->post_title; ?></h3>
											</div>
											<div class="service-info">
												<?php
																   
												$prii=($plan->et_price)/1000;
												if($prii > 0){
													echo '<h2 class="Defineprice">ماهیانه '.$prii .' هزار تومان														</h2>';
												}else{
		                        					echo '<h2 class="Defineprice">';_e("FREE", ET_DOMAIN);
		                        				}
											?>
											
											<p><?php echo $plan->post_content; ?></p>
										</div>
										<?php $pack_link = add_query_arg('pack_id',$plan->ID,$pay_link );?>
										<a class="fre-service-btn primary-color-hover" href="<?php echo $pack_link; ?>"><?php _e('Purchase', ET_DOMAIN)?></a>
									</div>
								</div> <?php

	    					}
	    				} else { ?>
	    					<div class="col-md-12" style="font-size: 14px;">

		    					<center><?php _e('There are no package plans available yet!.',ET_DOMAIN ); ?></center>

		    				</div> <?php
	    				}

					}
				?>
			</div>
		</div>
		

		
		<div class="col-md-1 hidden-sm"></div>
	</div>
	
	
</div>