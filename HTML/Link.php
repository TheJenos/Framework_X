<?php
include_once 'Basic/Tag.php';
class Link extends Tag{
    public $HTML_rel="stylesheet";
    public $HTML_href="";
    
    public function __construct($Link) {
        parent::__construct("link",NULL,TRUE);
        $this->HTML_href = $Link;
    }
    
    function getHTML_href() {
        return $this->HTML_href;
    }

    function setHTML_href($HTML_href) {
        $this->HTML_href = $HTML_href;
    }

}
