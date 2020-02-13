<?php
    if(isset($_GET['crud'])){
        $crud = $_GET['crud'];
    }

    $dataReturn = array();
    $statusCRUD = array();
    $cn = new mysqli("127.0.0.1","root","12345678","vuedb");
    $cn->set_charset("utf8");
    if($cn->connect_errno){
        echo $cn->connect_errno;
    }
    //======== Select ==========//
    if($crud == "select"){
        $sql = "select * from person";
        $res = $cn->query($sql);

        while($row = $res->fetch_object()){
            $dataReturn[] = array("id" => $row->id, "name" => $row->name);   
        }
        echo json_encode($dataReturn);
    }
    //===========================//

    //========== Live Search =========//
    else if($crud == "rselect"){
        $sid = $_POST['id'];
        $sql = "select * from person where id = '".$sid."'";
        $res = $cn->query($sql);

        while($row = $res->fetch_object()){
            $dataReturn[] = array("id" => $row->id, "name" => $row->name);   
        }
        echo json_encode($dataReturn);
    }
    //===============================//

    //=========== Insert ============//
    else if($crud == "insert"){
        $_id = $_POST['id'];
        $_name = $_POST['name'];
        if($_id != '' && $_name != ''){
            $sql_insert = "insert into person(id,name) values('".$_id."','".$_name."')";
        
            if($cn->query($sql_insert)){
                $statusCRUD["msg"] = true;
                echo json_encode($statusCRUD);
            } 
        }else{
            $statusCRUD["msg"] = false;
            echo json_encode($statusCRUD);
        }
    }
    //=================================//

    //=========== update ==============//
    else if($crud == "update"){
        $_id = $_POST['id'];
        $_name = $_POST['name'];
        if($_id != '' && $_name != ''){
            $sql_update = "update person set id = '".$_id."',name = '".$_name."' where id = '".$_id."'";
        
            if($cn->query($sql_update)){
                $statusCRUD["msg"] = true;
                echo json_encode($statusCRUD);
            } 
        }else{
            $statusCRUD["msg"] = false;
            echo json_encode($statusCRUD);
        }
    }
    //==================================//
    
    //=========== update ==============//
    else if($crud == "delete"){
        $_id = $_POST['id'];
        if($_id != ''){
            $sql_delete = "delete from person where id = '".$_id."'";
        
            if($cn->query($sql_delete)){
                $statusCRUD["msg"] = true;
                echo json_encode($statusCRUD);
            } 
        }else{
            $statusCRUD["msg"] = false;
            echo json_encode($statusCRUD);
        }
    }
    //==================================//
    
?>