<?php
    // mysqli Class
    require_once("./db_con.php");

    session_start();
    $userid = $_SESSION["userid"];
    $delete_user = "DELETE FROM member WHERE ID='$userid'";
    $conn->query($delete_user);

    echo "<script>alert(\"정상적으로 탈퇴되었습니다.\");</script>";
    echo "<script>location.replace('/index.html');</script>";
?>