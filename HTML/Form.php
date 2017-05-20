<?php
include_once 'Basic/Tag.php';
class Form extends Tag {
    public $HTML_action = "";
    public $HTML_method = "get";
    public $HTML_enctype = "multipart/form-data";
    
    public function __construct() {
        parent::__construct("form");
    }
    
    function getaction() {
        return $this->HTML_action;
    }

    function getmethod() {
        return $this->HTML_method;
    }

    function getenctype() {
        return $this->HTML_enctype;
    }

    function setaction($HTML_action) {
        $this->HTML_action = $HTML_action;
    }

    function setmethod($HTML_method) {
        $this->HTML_method = $HTML_method;
    }

    function setenctype($HTML_enctype) {
        $this->HTML_enctype = $HTML_enctype;
    }


}
