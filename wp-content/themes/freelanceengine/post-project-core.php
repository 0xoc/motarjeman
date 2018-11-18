
                <div class ="page-post-project-wrap" id="post-place">
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
