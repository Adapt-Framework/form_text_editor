<?php

namespace adapt\forms\text_editor{
    
    /*
     * Prevent direct access
     */
    defined('ADAPT_STARTED') or die;
    
    class view_field_text_editor extends \adapt\forms\view_form_page_section_group_field{
        
        public function __construct($form_data, $data_type, $user_data){
            parent::__construct($form_data, $data_type, $user_data);
            $this->add_class('form-group field input text-editor');
            
            /* Create the control */
            $value = $this->user_value ? $this->user_value : $form_data['default_value'];
            $control = new \bootstrap\views\view_textarea($form_data['name'], $value, 3);
            $control->add_class('tinymce');
            $control->set_id();
            
            /* Add the label */
            if (isset($form_data['label']) && trim($form_data['label']) != ''){
                $this->add(new html_label($form_data['label'], array('for' => $control->attr('id'))));
            }
            
            /* Add the control */
            $this->add($control);
            
            /* Add the decription */
            if (isset($form_data['description']) && trim($form_data['description']) != ''){
                $this->add(new html_p($form_data['description'], array('class' => 'help-block')));
            }
            
            /* Do we have a placeholder label? */
            if (isset($form_data['placeholder_label']) && trim($form_data['placeholder_label']) != ''){
                $control->attr('placeholder', $form_data['placeholder_label']);
            }
            
            /* Is the field mandatory? */
            if (isset($form_data['mandatory']) && strtolower($form_data['mandatory']) == "yes"){
                /* Mark the label */
                $this->find('label')->append(
                    new html_sup(
                        array(
                            '*',
                            new html_span(' (This field is required)', array('class' => 'sr-only'))
                        )
                    )
                );
                
                /* Is it a mandatory group? */
                if (isset($form_data['mandatory_group']) && trim($form_data['mandatory_group']) != ""){
                    $control->attr('data-mandatory', 'group');
                    $control->attr('data-mandatory-group', $form_data['mandatory_group']);
                }else{
                    $control->attr('data-mandatory', 'Yes');
                }
            }
            
        }
        
    }
    
}

?>
