<?php  
global $ae_post_factory;
$field_object = $ae_post_factory->get('ae_field');
$current_field = $field_object->current_post;

$field_type = $current_field->field_type;
$required = $current_field->required;
if($required) {
    $required = array('required' => true);
}else {
    $required = array();
}
$required['placeholder'] = $current_field->placeholder;
/* post data */
$post = $ae_post_factory->get($current_field->field_for);
$post = $post->current_post;
$field_name = strtolower($current_field->post_title);

$value = '';

if($post) {
    $value = $post->$field_name;   
}
?>
<li class="form-group custom-field">
    <div class="row">
				<!--/// mene77 ///-->
        <div class="col-md-4">
            <label style="display: inline-block;" for="<?php echo $current_field->post_title ?>" class="control-label title-plan">
                <?php echo $current_field->label; ?>
                <br />
                <span><?php echo $current_field->post_content; ?></span>  
            </label><span class="star-for-require">&nbsp *</span>
        </div>
				<!--/// mene77 ///-->
        <div class="col-sm-8 <?php echo $field_type; ?>-field">
            <!-- <input type="text" class="input-item  form-control text-field" name="<?php echo $current_field->post_title ?>" value="" /> -->
        <?php 
            switch ($field_type) {
                case 'text':
                    AE_Form::text($current_field->post_title, $value, $required);
                    break;
                case 'url':
                    AE_Form::url($current_field->post_title, $value, $required);
                    break;
                case 'email':
                    AE_Form::email($current_field->post_title, $value, $required);
                    break;
                case 'textarea':
                    AE_Form::textarea($current_field->post_title, $value, $required);
                    break;
                case 'select':
                    $attr = array(  "data-chosen-width"=>"95%",
                                    "data-chosen-disable-search" => "",
                                    "data-placeholder" => $current_field->placeholder
                                );
                    if($current_field->required) {
                        $attr['required'] = true;
                    }
                    AE_Form::ae_tax($current_field->post_title, $value, $attr);
                    break;
                case 'multi_select':
                    $attr = array(  "data-chosen-width"=>"95%",
                                    "data-chosen-disable-search" => "",
                                    "data-placeholder" => $current_field->placeholder
                                );
                    if($current_field->required) {
                        $attr['required'] = true;
                    }
                    AE_Form::ae_tax_multi($current_field->post_title, array(), $attr);
                    break;
                case 'radio':
                    AE_Form::radio( $current_field->post_title, '', $required);
                    break;
                case 'checkbox':
                    AE_Form::checkbox($current_field->post_title, '', $required);
                    break;
                case 'datepicker':
                    $attr = array(
                                "id" => "datepicker",
                                "data-placeholder" => $current_field->placeholder
                            );
                    if($current_field->required){
                        $attr['required'] = true;
                    }
                    AE_Form::datepicker($current_field->post_title, $value, $attr);
                    break;
                case 'carousel':
                    $attr = array(
                                "id" => "carousel",
                                "data-placeholder" => $current_field->placeholder
                            );
                    if($current_field->required){
                        $attr['required'] = true;
                    }
                    AE_Form::carousel($current_field->post_title, $value, $attr);
                    break;        
                default:
                    break;
            }
        ?>
        </div>
    </div>
</li>