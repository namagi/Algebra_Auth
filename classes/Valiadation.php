<?php

class Valiadation
{
    private $passed = false;
    private $errors = array();
    private $db = null;

    public function __construct() {
        $this->db = DB::getInstance();
    }
    
    public function check($items = array()) {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                $value = trim(Input::get($item));
                
                if(empty($value) && ($rule === 'required')) {
                    $this->addError($item, "Field {$item} is required.");
                } elseif (0) {
                    
                }
            }
        }
        
        return $this;
    }
    
    private function addError($item, $error) {
        $this->errors[$item] = $error;
    }
}
