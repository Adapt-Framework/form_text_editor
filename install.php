<?php

namespace frameworks\adapt;
/*
 * Prevent direct access
 */
defined('ADAPT_STARTED') or die;

/* Lets register the field type in forms */
$field_type = new model_form_field_type();
$field_type->bundle_name = 'form_text_editor';
$field_type->name = 'Text editor';
$field_type->view = '\\extensions\\form_text_editor\\view_field_text_editor';
$field_type->save();


?>