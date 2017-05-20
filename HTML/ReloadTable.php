<?php

//include_once 'Table.php';

class ReloadTable extends Table {

    public $table_sql = "";
    public $table_json = array();
    public $sql_con = "";
    public $reload = 1000;
    public $sql_map = array();
    public $header_row = null;
    public $body_row = null;

    public function AddBind($text, $text1) {
        $this->addData($this->header_row, $text);
        $this->addData($this->body_row, $text1);
        $this->sql_map[$text] = $text1;
    }

    public function getKey() {
        return ($this->getname() == "" || $this->getname() == null) ? $this->getid(): $this->getname();
    }

    public function updateHTML() {
        $this->setJS_controller("controler_" . $this->getTAG_number());
        $script = new Script();
        $script->setInner_HTML('app.controller("' . $this->getJS_controller() . '", function($scope, $interval) {'
                . '$scope.result = $.parseJSON(\'' . json_encode($this->table_json) . '\');'
                . '$interval(function() {'
                . '$.get("' . basename($_SERVER['SCRIPT_NAME']) . '?utable=' . urlencode($this->getKey()) . '").done(function(response) {'
                . '$scope.result = $.parseJSON(response);'
                . '});'
                . '},' . $this->reload . ');'
                . '});');
        $script->updateHTML();
        $this->setTAG_after($script->getTAG_HTML());
        parent::updateHTML();
    }

    public function getData($sql = null) {
        $this->table_json = array();
        $this->sql_con = ($sql == null) ? $this->sql_con : $sql;
        $result = mysqli_query($this->sql_con, $this->table_sql);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($this->table_json, $row);
        }
        if (isset($_GET['utable']) && $_GET['utable'] == $this->getKey()) {
            die(json_encode($this->table_json));
        }
    }

    public function __construct($sql, $table_sql, $name = "", $reload = 1000) {
        parent::__construct();
        $this->sql_con = $sql;
        $this->reload = $reload;
        $this->table_sql = $table_sql;
        $this->header_row = $this->addARowToHead();
        $this->body_row = $this->addARowToBody();
        $this->body_row->setJS_repeat("x in result");
        $this->setname($name);
        $this->getData();
        $this->saveElementByID();
    }

}
