<!DOCTYPE html>
<html>
<head>
    <title>Written</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google WEB Font URL : https://fonts.google.com/?subset=korean&selection.family=Nanum+Gothic -->
    <!-- Nanum 고딕체중 마음에 드는거 선택 후 해당 링크를 HTML 코드에 삽입 -->
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../in-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <style>
    .navbar {
        font-size: 15px;
        margin-bottom: 0;
        border-radius: 0;
        background-color: white;
    }
    .navbar-brand {
     padding-top:6px;
    }
    .carousel-inner > .item > img {
        width:2000px;
        height:960px;
    }
    .modal-content {
        font-size: 15px; 
        margin: 0;
        padding: 0;
    }
    
    </style>
</head>

<body style="font-family: 'Nanum Gothic', sans-serif;">
    <!-- Navigation Bar Container -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">   
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="../index_auth.html"><img src="../images/logo1.png" width="70"></a>
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNav">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="MyNav">
                            <ul class="nav navbar-nav">
                                <form class="navbar-form navbar-left" action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                            <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <li class="dropdown">
                                    <a id="menu" class="dropdown-toggle" data-toggle="dropdown" href="#">메뉴<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="./board.php">게시판</a></li>
                                        <li><a href="/sub_auth.html">과목영상</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li><a id="login_button" href="./logout.php"><span class="glyphicon glyphicon-log-out"></span>로그아웃</a></li>
                                <li><a id="signup_button" href="../php/information.php"><span class="glyphicon glyphicon-user"></span>회원정보</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Board_Read -->
    <?php
        require_once("./db_con.php");
        $page = $_GET["page"];
        $Board_content_sql = "SELECT * FROM board WHERE No='$page'";
        $result = $conn->query($Board_content_sql);
        $board_data = $result->fetch_assoc();
    ?>

    <div class="container-3">
    <h2>게 시 판</h2><br>
    <table class="table table-bordered">
        <thead class="table">
            <tr style="font-size:12pt; background-color:#88c4f3;">
                <th class="col-md-1 text-center">제목</th>
                <th class="col-md-5 text-left"><?php echo $board_data['Title'];?></th>
                <th class="col-md-3 text-center">작성자 : <?php echo $board_data['Userid'];?></th>
                <th class="col-md-5 text-center">작성일 : <?php echo $board_data['Date']; ?></th>
            </tr>
        </thead>
        <tbody>
            <tr class="table" style="font-size:12pt; background-color:#e6f7ff;">
                <th colspan="4" height="400"><?php echo $board_data['Content']; ?></th>
            </tr>
        </tbody>
    </table>
    <blockquote style="height:56px;">
        <span style="float:left;">
        <a href="./user_check_mod.php?page=<?php echo $page;?>" class="btn btn-info" role="button">수정</a>
        <a href="./user_check_del.php?page=<?php echo $page;?>" class="btn btn-info" role="button">삭제</a>
        </span>
        <span style="float:right;">
        <a href="./board.php" class="btn btn-info" role="button">글 목록</a>  
        </span>  
    </blockquote>
    </div>
    <br><br><br>
    
    <!-- footer Container -->
    <footer class="container text-center">
    <p style="font-size:10px; color:#c2c2c2;"><span>Cloud System 4조 Site | 정성윤, 김만성, 허정연, 김동수, 황석현<br>서울시 종로구 | 전화 02-123-4567<br>Copyright &copy; BlaBla</span></p>
    </footer>

</body>
</html>

