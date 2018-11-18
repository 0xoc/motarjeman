<?php
/*  wp-content/themes/freelanceengine/template/filter-projects.php */

$category_project_selected = '';
if ( isset( $_GET['category_project'] ) && $_GET['category_project'] != '' ) {
	$category_project_selected = $_GET['category_project'];
}


?>



<div class="fre-project-filter-box">
    <script type="data/json" id="search_data">
            <?php
		$search_data = $_POST;
		echo json_encode( $search_data );
		?>

    </script>
	
	
	
	
	
    <div class="project-filter-header visible-sm visible-xs">
        <a class="project-filter-title" href=""><?php _e( 'Advance search', ET_DOMAIN ); ?></a>
    </div>
    <div class="fre-project-list-filter">
        <form style="margin-left: -326px;">
            <div class="row">
                <div class="col-md-4">
                    <div class="fre-input-field">
                        <label for="s" class="fre-field-title"><?php _e( 'Keyword', ET_DOMAIN ); ?></label>
                        <input class="fieldechange keyword search" id="s" type="text" name="s"
                               placeholder="<?php _e( 'Search projects by keyword', ET_DOMAIN ); ?>">  <!-- mene77  fieldechange -->
                    </div>
                </div>
				
				<?php
				/*
					<!--                    -->
					<!--                    -->
					<!--                    -->
					<!--Skill delete mene77 -->
					<!--                    -->
					<!--                    -->
					<!--                    -->

				
					<!--                               -->
					<!--                               -->
					<!--                               -->
					<!--project_category delete mene77 -->
					<!--                               -->
					<!--                               -->
					<!--                               -->

					
				<!--                          -->
				<!--                          -->
				<!--                          -->
				<!--number_bids delete mene77 -->
				<!--                          -->
				<!--                          -->
				<!--                          -->
				
				
				<!--                      -->
				<!--                      -->
				<!--                      -->
				<!--country delete mene77 -->
				<!--                      -->
				<!--                      -->
				<!--                      -->
     
           */
				?>
				
                <div class="col-md-4">
					<?php $max_slider = ae_get_option( 'fre_slide_max_budget', 2000 ); ?>
                    <div class="fre-input-field fre-budget-field">
                        <label for="budget" class="fre-field-title"><?php _e( 'Budget', ET_DOMAIN ); ?>
                            (<?php fre_currency_sign() ?>)</label>
                        <input id="budget" class="fieldechange filter-budget-min" type="number" name="min_budget" value="0" min="0">  <!-- mene77  fieldechange -->
                        <span>-</span>
                        <input class="fieldechange filter-budget-max" type="number" name="max_budget"
                               value="<?php echo $max_slider; ?>" min="0"> <!-- mene77  fieldechange -->
                        <input id="et_budget" type="hidden" name="et_budget" value="0,<?php echo $max_slider; ?>"/>
                    </div>
                </div>
            </div>
            <a class="project-filter-clear clear-filter secondary-color" href=""><?php _e( 'Clear all filters', ET_DOMAIN ); ?></a>
        </form>
    </div>
</div>