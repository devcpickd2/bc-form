<?php
// Compatibility for PHP 8.2+
trait CI_Compatibility {
    public function __get($name) {
        return property_exists($this, $name) ? $this->$name : null;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
}
