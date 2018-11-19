<?php

$section_param = "dashboard_section";
$base_dashboard_url = get_page_link();
$base_request_url = $base_dashboard_url. "?$section_param=";
$submit_project_url = $base_request_url."submit-project";
$all_projects_url = $base_request_url."all-projects";
$profile_url = $base_request_url."profile";
$credit_url = $base_request_url."credit";

?>
<style>
    .dashboard-item{
        margin-bottom: 10px;
    }
</style>

<ul class="list-group dashboard-items">
    <li class="list-group-item active dashboard-item">
        <a href="<?php echo $submit_project_url; ?>">ثبت پروژه</a>
    </li>
    <li class="list-group-item  dashboard-item">
        <a href="<?php echo $all_projects_url; ?>">لیست پروژه ها</a>
    </li>
    <li class="list-group-item  dashboard-item">
        <a href="<?php echo $profile_url; ?>">پروفایل</a>
    </li>
    <li class="list-group-item  dashboard-item">
        <a href="<?php echo $credit_url; ?>">اطلاعات حساب بانکی</a>
    </li>
    <a href="<?php echo wp_logout_url(); ?>">
    <li class="list-group-item dashboard-item">
        خروج
    </li>
    </a>
</ul>