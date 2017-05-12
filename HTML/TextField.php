<?php

include_once 'Input.php';

class TextField extends Input {

    public static $TYPE_TXET = "text";
    public static $TYPE_EMAIL = "email";
    public static $TYPE_NUMBER = "number";
    public static $TYPE_FILE = "number";
    public static $TYPE_PASSWORD = "password";

    public $HTML_placeholder = "";
    public $HTML_readonly = FALSE;
    public $HTML_type = "";
    
    
    function getHTML_type() {
        return $this->HTML_type;
    }

    function setHTML_type($HTML_type) {
        $this->HTML_type = $HTML_type;
    }

        function getHTML_placeholder() {
        return $this->HTML_placeholder;
    }

    function getHTML_readonly() {
        return $this->HTML_readonly;
    }

    function setHTML_placeholder($HTML_placeholder) {
        $this->HTML_placeholder = $HTML_placeholder;
    }

    function setHTML_readonly($HTML_readonly) {
        $this->HTML_readonly = $HTML_readonly;
    }

    
    public function __construct($name = "") {
        parent::__construct();
        $this->setHTML_type("Text");
        $this->setHTML_name($name);
    }

}
