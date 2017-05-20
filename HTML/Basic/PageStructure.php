<?php

include_once 'Tag.php';

class PageStructure {

    public $Inner_HTML = "";
    public $Header_HTML = "";
    public $Header_Tags = array();
    public $Body_HTML = "";
    public $Body_Tags = array();
    public $Full_HTML = "";
    public $Body = null;
    public $HTML_title = "";

    public function updateBody() {
        $this->Body_HTML = "";
        foreach ($this->Body_Tags as $key => $value) {
            $value->updateHTML();
            $this->Body_HTML .= $value->getTAG_HTML();
        }
    }

    public function updateHead() {
        $this->Header_HTML = "";
        foreach ($this->Header_Tags as $key => $value) {
            $value->updateHTML();
            $this->Header_HTML .= $value->getTAG_HTML();
        }
    }

    public function getElementByName($name) {
        $data = NULL;
        foreach ($this->Body_Tags as $key => $value) {
            if ($value->getname() == $name) {
                $data = $value;
            } else {
                $txt = $value->getElementByName($name);
                if ($txt != null)
                    $data = $txt;
            }
        }
        foreach ($this->Header_Tags as $key => $value) {
            if ($value->getname() == $name) {
                $data = $value;
            } else {
                $txt = $value->getElementByName($name);
                if ($txt != null)
                    $data = $txt;
            }
        }
        return $data;
    }

    public function clearAll() {
        if (count($this->Header_Tags) > 0) {
            foreach ($this->Header_Tags as $key => $value) {
                $value->ClearInnerHTML();
            }
        }
        if (count($this->Body_Tags) > 0) {
            foreach ($this->Body_Tags as $key => $value) {
                $value->ClearInnerHTML();
            }
        }
    }

    public function addToBody($tag) {
        $this->Body_Tags[$tag->getTAG_number()] = $tag;
    }

    public function addToHead($tag) {
        $this->Header_Tags[$tag->getTAG_number()] = $tag;
    }

    public function saveOnSession() {
        $_SESSION[$_SERVER['SCRIPT_NAME']] = serialize($this);
    }

    public function updateHTML() {
        $this->updateHead();
        $this->updateBody();
        $this->Body->setInner_HTML($this->Body_HTML);
        $this->Body->updateHTML();
        $this->Full_HTML = "<!DOCTYPE html>";
        $this->Full_HTML .= '<html lang="en">';
        $this->Full_HTML .= "<head>";
        $this->Full_HTML .= "<title>" . $this->HTML_title . "</title>";
        $this->Full_HTML .= $this->Header_HTML;
        $this->Full_HTML .= "</head>";
        $this->Full_HTML .= $this->Body->getTAG_HTML();
        $this->Full_HTML .= "</html>";
    }

    public function isSaved() {
        return isset($_SESSION[$_SERVER['SCRIPT_NAME']]);
    }

    public function loadFromSession() {
        return unserialize($_SESSION[$_SERVER['SCRIPT_NAME']]);
    }

    public function __construct($title = "") {
        if (!$this->isSaved()){
            $this->HTML_title = $title;
            $this->Body = new Tag("body");
        }
        foreach ($_SESSION['Elements'] as $key => $value) {
            $_SESSION['Elements'][$key]=0; 
        }
    }

    function getInner_HTML() {
        return $this->Inner_HTML;
    }

    function getHeader_HTML() {
        return $this->Header_HTML;
    }

    function getHeader_Tags() {
        return $this->Header_Tags;
    }

    function getBody_HTML() {
        return $this->Body_HTML;
    }

    function getBody_Tags() {
        return $this->Body_Tags;
    }

    function getFull_HTML() {
        return $this->Full_HTML;
    }

    function getBody() {
        return $this->Body;
    }

    function gettitle() {
        return $this->HTML_title;
    }

    function setInner_HTML($Inner_HTML) {
        $this->Inner_HTML = $Inner_HTML;
    }

    function setHeader_HTML($Header_HTML) {
        $this->Header_HTML = $Header_HTML;
    }

    function setHeader_Tags($Header_Tags) {
        $this->Header_Tags = $Header_Tags;
    }

    function setBody_HTML($Body_HTML) {
        $this->Body_HTML = $Body_HTML;
    }

    function setBody_Tags($Body_Tags) {
        $this->Body_Tags = $Body_Tags;
    }

    function setFull_HTML($Full_HTML) {
        $this->Full_HTML = $Full_HTML;
    }

    function setBody($Body) {
        $this->Body = $Body;
    }

    function settitle($HTML_title) {
        $this->HTML_title = $HTML_title;
    }

    public function printHTML() {
        $this->updateHTML();
        echo $this->Full_HTML;
        $this->clearAll();
    }

}
