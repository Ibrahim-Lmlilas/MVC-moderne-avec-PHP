<?php

namespace App\Core;

class Validator {
    protected $errors = [];
    protected $data;

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function required($field, $message = null) {
        if (empty($this->data[$field])) {
            $this->errors[$field] = $message ?? "The {$field} field is required";
        }
        return $this;
    }

    public function email($field, $message = null) {
        if (!filter_var($this->data[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $message ?? "The {$field} must be a valid email";
        }
        return $this;
    }

    public function min($field, $length, $message = null) {
        if (strlen($this->data[$field]) < $length) {
            $this->errors[$field] = $message ?? "The {$field} must be at least {$length} characters";
        }
        return $this;
    }

    public function max($field, $length, $message = null) {
        if (strlen($this->data[$field]) > $length) {
            $this->errors[$field] = $message ?? "The {$field} must not exceed {$length} characters";
        }
        return $this;
    }

    public function passes() {
        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }
}
