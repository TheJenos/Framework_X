<?php

include_once 'Basic/Tag.php';

class Input extends Tag {

    public $HTML_type = "";
    public $HTML_value = "";
    public $HTML_disable = FALSE;

    function getdisable() {
        return $this->HTML_disable;
    }

    function setdisable($HTML_disable) {
        $this->HTML_disable = $HTML_disable;
    }

    public function __construct() {
        parent::__construct("Input", TRUE);
    }

    function gettype() {
        return $this->HTML_type;
    }

    function getvalue() {
        return $this->HTML_value;
    }

    function settype($HTML_type) {
        $this->HTML_type = $HTML_type;
    }

    function setvalue($HTML_value) {
        $this->HTML_value = $HTML_value;
    }

}
