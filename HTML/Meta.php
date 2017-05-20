<?php
include_once 'Basic/Tag.php';
class Meta extends Tag{
    public $HTML_content="";
    
    public function __construct($name = "",$content = "") {
        parent::__construct("meta",NULL,TRUE);
        $this->setname($name);
        $this->setcontent($content);
    }
    function getcontent() {
        return $this->HTML_content;
    }

    function setcontent($HTML_content) {
        $this->HTML_content = $HTML_content;
    }

}
