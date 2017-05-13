<?php
include_once 'Basic/Tag.php';
class Meta extends Tag{
    public $HTML_content="";
    
    public function __construct($name = "",$content = "") {
        parent::__construct("meta",NULL,TRUE);
        $this->setHTML_name($name);
        $this->setHTML_content($content);
    }
    function getHTML_content() {
        return $this->HTML_content;
    }

    function setHTML_content($HTML_content) {
        $this->HTML_content = $HTML_content;
    }

}
