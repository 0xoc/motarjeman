<?php
	$query_args = array(
		'post_type' => PROJECT ,
        'post_status' => 'publish' ,
        'posts_per_page' => 6,
        'orderby'   => 'date',
        'order'     => 'DESC',
        'is_block'  => 'projects'
    ) ;
    query_posts( $query_args);
?>
<ul class="fre-jobs-list">
	<?php
		global $wp_query, $ae_post_factory, $post;
		$post_object = $ae_post_factory->get('project');
		while (have_posts()) { the_post();
	        $convert = $post_object->convert($post);
	        $postdata[] = $convert;
	?>
			<li>
				<div class="jobs-title">
					<p><?php echo $convert->post_title;?></p>
				</div>
				<div class="jobs-date">
					<p><?php echo $convert->post_date;  echo "$et_expired_date"?></p>
				</div>
				<div class="jobs-price">
					
					
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
							/*  fre_price_format($convert->et_budget)  */
						?>
					<p><?php echo $Budget_line;?></p>
					
								<!--/// mene77 ///-->
				</div>
				<div class="jobs-view">
					<a href="<?php the_permalink();?>"><?php _e('View details', ET_DOMAIN)?></a>
				</div>
			</li>
	<?php } ?>
</ul>
<div class="fre-jobs-online-more">
	<a class="probtnsabt fre-btn-o primary-color" href="<?php echo get_post_type_archive_link( PROJECT ); ?>"><?php _e('See all jobs', ET_DOMAIN)?></a>
</div>