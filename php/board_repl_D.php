<?php
    // mysqli Class
    require_once("./db_con.php");
    $board_no = $_GET["board_no"];
    $repl_group=$_GET["repl_group"];
    $repl_no=$_GET["repl_no"];
    $delete_sql = "DELETE FROM board_re WHERE board_no='$board_no' AND repl_group='$repl_group' AND repl_no='$repl_no'";
    $conn->query($delete_sql);
    
    echo "<script>alert(\"정상적으로 삭제되었습니다.\");</script>";
    echo "<script>location.replace('./board_read.php?page=$board_no');</script>";
?>

