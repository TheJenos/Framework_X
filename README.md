# Framework_X
Object Orientated HTML (PHP Framework)

```
<?php

include "./HTML/Inti.php";

$full = new PageStructure();
$btn1 = new Button("Test");
$txt1 = new TextField();
$lab1 = new Label("Email address");
$div1 = new Div();
$div0 = new Div();

$full->addToHead(new Meta("viewport", "width=device-width, initial-scale=1"));
$full->addToHead(new Link("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"));
$full->addToHead(new Link("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"));
$full->addToHead(new Script("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"));

$btn1->setHTML_name("name1");
$btn1->setHTML_value("Submit");
$btn1->addClass("btn");
$btn1->addClass("btn-success");

$txt1->setHTML_placeholder("Type Email");
$txt1->setHTML_type(TextField::$TYPE_EMAIL);
$txt1->addClass("form-control");
$lab1->setHTML_for($txt1->getHTML_id());

$div1->addClass("form-group");
$div1->addElement($lab1);
$div1->addElement($txt1);

$div0->addElement($div1);
$div0->addElement($btn1);
$div0->addClass("container");
$div0->addStyle("padding-top", "20px");

$table1 = new Table();
$table1->addClass("table");
$tr1 = $table1->addARowToHead();
$table1->addData($tr1, "Name");
$table1->addData($tr1, "Value");
$tr2 = $table1->addARowToBody();
$table1->addData($tr2, "Thanura");
$table1->addData($tr2, "12");
$tr3 = $table1->addARowToBody();
$table1->addData($tr3, "Hirusha");
$table1->addData($tr3, "13");
$tr3 = $table1->addARowToBody();
$table1->addData($tr3, "Chamath");
$table1->addData($tr3, "15");


$div0->addElement($table1);

$full->addToBody($div0);
$full->printHTML();
```

<html lang="en"><head><title></title><meta content="width=device-width, initial-scale=1" name="viewport"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head><body id="body_473987779##759014771"><div id="div_443911181##599603379" class="container " style="padding-top:20px;"><div id="div_624567550##469805294" class="form-group "><label for="Input_922853605##242815583" id="label_31382891##454014217">Email address</label><input placeholder="Type Email" type="email" id="Input_922853605##242815583" class="form-control "></div><input type="Button" value="Submit" id="Input_591688137##68352410" name="name1" class="btn btn-success "><table id="table_22688407##555827360" class="table "><thead><tr id="tr_196697625##187137274"><th id="th_638642116##960031273">Name</th><th id="th_899748776##748541989">Value</th></tr></thead><tbody><tr id="tr_481751195##393249013"><td id="td_450659140##258958742">Thanura</td><td id="td_835254291##283743871">12</td></tr><tr id="tr_269992662##630930422"><td id="td_532526335##110433025">Hirusha</td><td id="td_717806439##534183361">13</td></tr><tr id="tr_665997214##27121254"><td id="td_9119832##899158755">Chamath</td><td id="td_378217830##353066471">15</td></tr></tbody></table></div></body></html>