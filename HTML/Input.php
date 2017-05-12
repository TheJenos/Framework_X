<?php

include_once 'Basic/Tag.php';

class Input extends Tag {

    public $HTML_type = "";
    public $HTML_value = "";
    public $HTML_disable = FALSE;

    function getHTML_disable() {
        return $this->HTML_disable;
    }

    function setHTML_disable($HTML_disable) {
        $this->HTML_disable = $HTML_disable;
    }

    public function __construct() {
        parent::__construct("Input", TRUE);
    }

    function getHTML_type() {
        return $this->HTML_type;
    }

    function getHTML_value() {
        return $this->HTML_value;
    }

    function setHTML_type($HTML_type) {
        $this->HTML_type = $HTML_type;
    }

    function setHTML_value($HTML_value) {
        $this->HTML_value = $HTML_value;
    }

}
