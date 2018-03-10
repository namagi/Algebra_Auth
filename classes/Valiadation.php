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

                if (empty($value) && ($rule === 'required')) {
                    $this->addError($item, "Field {$item} is required.");
                } else if (!empty ($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) < $rule_value) {
                                $this->addError($item, "Field {$item} must have minimally {$rule_value} characters.");
                            }
                            break;
                        case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError($item, "Field {$item} must not exceed {$rule_value} characters.");
                            }
                            break;
                        case 'matches':
                            if ($value != Input::get($rule_value)) {
                                $this->addError($item, "Field {$item} must match {$rule_value}.");
                            }
                            break;
                        case 'unique':
                            $check = $this->db->get('id', $rule_value, array($item, '=', $value));
                            if ($check->getCount()) {
                                $this->addError($item, 'Username ' . $value . ' already taken');
                            }
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        if (empty($this->errors)) {
            $this->passed = true;
        }

        return $this;
    }

    private function addError($item, $error) {
        $this->errors[$item] = $error;
    }

    public function getPassed() {
        return $this->passed;
    }

    public function hasError($field) {
        if (isset($this->errors[$field])) {
            return $this->errors[$field];
        } else {
            return false;
        }
    }
}
