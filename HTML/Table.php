<?php

include_once 'Basic/Tag.php';

class Table extends Tag {

    public $HTML_border = "";
    public $Header_Tags = array();
    public $Header_HTML = "";
    public $Body_Tags = array();
    public $Body_HTML = "";

    public function updateBody() {
        foreach ($this->Body_Tags as $key => $value) {
            $value->updateHTML();
            $this->Body_HTML .= $value->getTAG_HTML();
        }
    }

    public function updateHead() {
        foreach ($this->Header_Tags as $key => $value) {
            $value->updateHTML();
            $this->Header_HTML .= $value->getTAG_HTML();
        }
    }

    public function updateHTML() {
        $this->updateHead();
        $this->updateBody();
        $this->setInner_HTML("<thead>" . $this->Header_HTML . "</thead><tbody>" . $this->Body_HTML . "</tbody>");
        parent::updateHTML();
    }

    public function __construct() {
        parent::__construct("table");
    }

    public function addARowToHead() {
        $tr = new Tag("tr");
        $this->Header_Tags[$tr->getTAG_number()] = $tr;
        return $tr;
    }

    public function addARowToBody() {
        $tr = new Tag("tr");
        $this->Body_Tags[$tr->getTAG_number()] = $tr;
        return $tr;
    }

    public function isATableHeader($tag) {
        foreach ($this->Header_Tags as $key => $value) {
            if ($value == $tag) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function isATableBody($tag) {
        foreach ($this->Body_Tags as $key => $value) {
            if ($value == $tag) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function addData($tr, $tag, $tdd = null) {
        if ($tdd == null) {
            if ($this->isATableHeader($tr)) {
                $td = new Tag("th");
            } else {
                $td = new Tag("td");
            }
        }
        if ($tag instanceof Tag) {
            $td->addElement($tag);
        } else {
            $td->addText($tag);
        }
        if ($tdd == null)
            $tr->addElement($td);

        return $td;
    }

}
