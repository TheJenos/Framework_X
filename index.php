<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        include "./HTML/Inti.php";
        $btn1 = new Button("Test");
        $btn1->setname("name1");
        $btn1->setvalue("Submit");
        $btn1->addClass("btn");
        $btn1->addClass("btn-success");
        
        $txt1 = new TextField();
        $lab1 = new Label("Email address");
        $txt1->setplaceholder("Type Email");
        $txt1->settype(TextField::$TYPE_EMAIL);
        $txt1->addClass("form-control");
        $lab1->setfor($txt1->getid());

        $div1 = new Div("div");
        $div1->addClass("form-group");
        $div1->addElement($lab1);
        $div1->addElement($txt1);
        

        $div0 = new Div("div");
        $div0->addElement($div1);
        $div0->addElement($btn1);

        $div0->addClass("container");
        $div0->addStyle("padding-top", "10px");
        $div0->updateHTML();
        $div0->printTag();
        ?>
    </body>
</html>
