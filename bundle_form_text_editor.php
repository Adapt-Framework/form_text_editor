<?php

namespace adapt\forms\text_editor{
    
    /* Prevent Direct Access */
    defined('ADAPT_STARTED') or die;
    
    class bundle_form_text_editor extends \adapt\bundle{
        
        public function __construct($data){
            parent::__construct('form_text_editor', $data);
        }
        
        public function boot(){
            if (parent::boot()){
                
                $this->dom->head->add(new html_script(array('type' => 'text/javascript', 'src' => "/adapt/form_text_editor/form_text_editor-{$this->version}/static/js/form_text_editor.js")));
                return true;
            }
            
            return false;
        }
        
    }
    
    
}

?>