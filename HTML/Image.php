<?php
include_once 'Basic/Tag.php';
class Image  extends Tag{
    
    public $HTML_src = "";
    public $HTML_width = "";
    public $HTML_height = "";

    function getsrc() {
        return $this->HTML_src;
    }
    
    function setsrc($HTML_src) {
        $this->HTML_src = $HTML_src;
    }
    
    function getwidth() {
        return $this->HTML_width;
    }

    function getheight() {
        return $this->HTML_height;
    }

    function setwidth($HTML_width) {
        $this->HTML_width = $HTML_width;
    }

    function setheight($HTML_height) {
        $this->HTML_height = $HTML_height;
    }
        
    public function __construct($url="") {
        parent::__construct("img",NULL,TRUE);
        $this->HTML_src = $url;
    }
    
}
