<?php
    require_once("./db_con.php");
    session_start();
    $userpw=$_POST["pw"];
    $userpw2=$_POST["pw2"];
    $username=$_POST["name"];
    $userbirthyear=$_POST["birth_year"];
    $userbirthmonth=$_POST["birth_month"];
    $userbirthday=$_POST["birth_day"];
    $userbirthdate=$userbirthyear."-".$userbirthmonth."-".$userbirthday;
    $usergender=$_POST["chk_gender"];
    $userconcern=$_POST["concern"];
    $userphone=$_POST["phone"];
    $useraddr=$_POST["addr"];
    $usermail=$_POST["mail"];
    
    $id_check_sql = "SELECT * FROM member WHERE id='$userid'";
    $result = $conn->query($id_check_sql);


    $insert_sql = "INSERT INTO member (PW,Name,Birthdate,Gender,Concern,Phone,Addr,Mail) VALUES (password('$userpw'),'$username','$userbirthdate','$usergender','$userconcern','$userphone','$useraddr','$usermail')";

    if (mysqli_query($conn,$insert_sql)){
        echo "<script>alert(\"정상적으로 수정되었습니다.\");</script>";
        echo "<script>location.replace('./information.php?page=$page');</script>";
    } else {
        echo "<script>alert(\"오류발생: 관리자에게 문의하세요.\");</script>";
        echo "<script>location.replace('./information.php');</script>";
        exit;
    }
?>



