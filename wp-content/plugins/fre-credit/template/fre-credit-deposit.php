<?php
/**
 * Template Name: Recharge Pages
 */
global $user_ID;
$user_wallet = FRE_Credit_Users()->getUserWallet($user_ID);
$project_id = !empty($_GET['project_id']) ? $_GET['project_id'] : '';
et_write_session('project_id',$project_id);
?>
<div class="post-place-warpper" id="upgrade-account">
    <?php
	    include dirname(__FILE__) . '/fre-credit-deposit-step1.php';
	    include dirname(__FILE__) . '/fre-credit-deposit-step4.php';
    ?>
</div>
