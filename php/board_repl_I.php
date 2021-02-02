<?php
    require_once("./db_con.php");
    session_start();
    $board_no = $_POST["board_no"];
    $userid = $_SESSION["userid"];
    $data = $_POST["data"];
    $re = $_POST["re"];
    $Board_repl_sql = "SELECT MAX(repl_group)+1 repl_group_max, MAX(repl_no)+1 repl_no_max FROM board_re WHERE board_no ='$board_no'";
    $result_re = $conn->query($Board_repl_sql); 
    $board_data = $result_re->fetch_assoc();   
        
    $repl_group_max=$board_data[repl_group_max];
    $repl_no_max=$board_data[repl_no_max];

    $insert_sql = "INSERT INTO board_re (board_no, repl_group, repl_no, deps, content, Userid, Data) VALUES ('$board_no', '$repl_group_max', '$repl_no_max', '0', '$re', '$userid', '$data')";
    if (mysqli_query($conn,$insert_sql)){
        echo "<script>alert(\"정상적으로 등록되었습니다.\");</script>";
        echo "<script>location.replace('./board_read.php?page=$board_no');</script>";
        exit;
    } else {
	    echo "<script>alert(\"오류발생: 관리자에게 문의하세요.\");</script>";
        echo "<script>location.replace('./board_read.php?page=$board_no');</script>";
        exit;
    }
?>