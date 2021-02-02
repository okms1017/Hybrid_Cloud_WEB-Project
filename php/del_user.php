<?php
    // mysqli Class
    require_once("./db_con.php");
    session_start();
    $userid = $_SESSION["userid"];
    $userid_check_sql = "SELECT * FROM member WHERE ID='$userid'";
    $result=$conn->query($userid_check_sql);
    $num = $result->num_rows;


    if ($num > 0){
        
        require_once("./del_infor.php");
    }



?>



