<!-- Step 1 -->
<?php
    global $user_ID, $ae_post_factory;
    $ae_pack = $ae_post_factory->get('fre_credit_plan');
    $packs = $ae_pack->fetch('fre_credit_plan');
?>
<div id="fre-post-project-1 step-plan" class="fre-post-project-step step-wrapper step-plan active">
    <div class="fre-post-project-box">
        <div class="step-post-package">
            
            <ul class="fre-post-package">

                <?php
                //add by morteza
                if(ae_get_option('custom_charge', true)) {
                    ?>
                    <li id="custom_plan"
                        data-sku="custom"
                        data-id=""
                        data-price="0"
                        data-package-type="fre_credit_plan"
                        data-title="بسته دلخواه"
                        data-description="در این بسته شما شارژ مورد نظر خود را به دلخواه وارد میکنید">
                        <label class="fre-radio" for="package-custom">
                            <input id="package-custom" name="post-package" type="radio">   
                           	<span style="display: inline-block;margin-left: 12px;">مبلغ شارژ:</span>
                        </label>    
						 
                        <input style="border-radius: 7px;text-align: center;border: 1px solid #dbdbdb; width: 198px;height: 37px; padding-bottom: 6px; padding-top: 10px;" name="custom_charge" id="custom_charge"  placeholder="تومان">            <!--  mene77  -->										
      
						
                    </li>


                    <script type="text/javascript">
                        jQuery( document ).ready( function( $ ) {
                            $(".select-custom").on("click", function () {

                                if ($('#package-custom').is(':checked') && $('#custom_charge').val() === "") {
                                    alert('لطفا ابتدا مقدار دلخواه را وارد نمایید');
                                    return false;
                                }else if($('#package-custom').is(':checked') && $('#custom_charge').val() < 100){
                                    alert('مبلغ وارد شده باید بیشتر از 100 تومان باشد');
                                    return false;
                                }else if($('#package-custom').is(':checked') && $('#custom_plan').attr('data-price') < 100){
                                    alert('لطفا مبلغ را تایپ کنید');
                                    return false;
                                }else{
                                    $('#custom_disc').text($('#custom_charge').val()+' '+"تومان به اعتبار شما اضافه خواهد شد")
                                }
                            })

                            $('#custom_charge').keyup(function () {
                                $('#custom_plan').attr("data-price",$(this).val())
                                $('.CustomPrice').attr("value",$(this).val())
                            });

                        })
                    </script>
                    <?php
                } //end add by morteza
                ?>

             <?php foreach ($packs as $key => $package) {                
                if( $package->et_price ) {
                    $price = fre_price_format($package->et_price);
                }else {
                    $price = __("Free", ET_DOMAIN);
                }
                
                if($package->et_price > 0){
                    if($package->et_price > 1){
                        $text = sprintf(__("%s for %s credits.", ET_DOMAIN) , $price, $price);
                    }else{
                        $text = sprintf(__("%s for %s credit.", ET_DOMAIN) , $price, $price);
                    }
                }else{
                    $text = sprintf(__("%s for %s credits.", ET_DOMAIN) , $price, $price);
                }
            ?>
                <li data-sku="<?php echo trim($package->sku);?>" 
                    data-id="<?php echo $package->ID ?>" 
                    data-package-type="<?php echo $package->post_type; ?>" 
                    data-price="<?php echo $package->et_price; ?>" 
                    data-title="<?php echo $package->post_title ;?>" 
                    data-description="<?php echo $text;?>">
                    <label class="fre-radio" for="package-<?php echo $package->ID?>">
                        <input id="package-<?php echo $package->ID?>" name="post-package" type="radio">
                        <span><?php echo $package->post_title ; ?></span>
                    </label>
                    <span class="disc"><?php echo $text;?> <?php echo wp_strip_all_tags( $package->post_content );?></span>
                </li>
            <?php } ?>
            </ul>
            <?php 
            echo '<script type="data/json" id="package_plans">'.json_encode($packs).'</script>';
            ?>
            <div class="fre-select-package-btn">
                <!-- <a class="fre-btn" href="">Select Package</a> -->
                <input class="probtnsabt fre-btn fre-post-project-next-btn select-plan" type="button" value="<?php _e('Next Step', ET_DOMAIN);?>">
            </div>
        </div>
    </div>
</div>