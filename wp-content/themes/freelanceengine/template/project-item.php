<?php

global $wp_query, $ae_post_factory, $post, $no_category;  /* mene77   no_category */
$post_object = $ae_post_factory->get( PROJECT );
$current     = $post_object->current_post;
$tax_input   = $current->tax_input;
?>

<!--/// mene77 ///-->

<?php
if($no_category==1){
	$bori_mari='border-right: none !important; margin-right: 245px;';
}else{
	$bori_mari='border-right: 1px solid #ededed !important;margin-right: 452px;';
}
?>
<!--/// mene77 ///-->


<li class="project-item">
    <div style="<?php echo $bori_mari; ?>" class="project-list-wrap">  <!-- mene77 -->
        <h2 class="project-list-title">
            <a  class="secondary-color" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="project-list-info">
            <span><?php printf( __( 'Posted %s', ET_DOMAIN ), get_the_date() ); ?></span>
            <span><?php echo $current->text_total_bid; ?></span>
			<?php
			if ( ! empty( $current->text_country ) ) {
				echo "<span>";
				echo $current->text_country;
				echo "</span>";
			}
			?>
			
						<!--/// mene77 ///-->
						<?php
						$msg_budget=($convert->et_budget);
						
						
							if(($msg_budget)==100000){
								$Budget_line="از 5,000 تومان تا 100,000 تومان";
							}elseif(($msg_budget)==300000){
								$Budget_line="از 100,000 تومان تا 300,000 تومان";
							}elseif(($msg_budget)==750000){
								$Budget_line="از 300,000 تومان تا 750,000 تومان";
							}elseif(($msg_budget)==2500000){
								$Budget_line="از 750,000 تومان تا 2,500,000 تومان";
							}elseif(($msg_budget)==5000000){
								$Budget_line="از 2,500,000 تومان تا 5,000,000 تومان";
							}elseif(($msg_budget)==15000000){
								$Budget_line="از 5,000,000 تومان تا 15,000,000 تومان";
							}
						
						?>
			
            <span><?php echo $Budget_line; ?></span>
						<!--/// mene77 ///-->
        </div>
        <div class="project-list-desc">
            <p><?php echo $current->post_content_trim; ?></p>
        </div>
		<?php
		echo $current->list_skills;
		?>
        <!-- <div class="project-list-bookmark">
            <a class="fre-bookmark" href="">Bookmark</a>
        </div> -->
    </div>
</li>