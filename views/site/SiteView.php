<?php
    class SiteView{
        private $inputModel;
        private $inputView;
    
        public function render($view){
            return $this->$view;
          
        }
    
    }
?>