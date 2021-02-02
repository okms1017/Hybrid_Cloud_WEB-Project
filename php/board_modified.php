<!DOCTYPE html>
<html>
<head>
    <title>Board</title>
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
                                        <li><a href="#">과목영상</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li><a id="signup_button" href="./logout.php"><span class="glyphicon glyphicon-log-out"></span>로그아웃</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Board_Modified -->
    <?php
        require_once("./db_con.php");
        $page = $_GET["page"];
        $Board_content_sql = "SELECT * FROM board WHERE No='$page'";
        $result = $conn->query($Board_content_sql);
        $board_data = $result->fetch_assoc();
    ?>

    <div class="container-3">
        <h2>게 시 판</h2><br>
        <blockquote>
        <div class="row">
            <div class="col-sm-4" style="font-size:13pt;">작성자 : <code style="font-family: 'Nanum Gothic', sans-serif;"><?php echo $board_data['Userid'];?></code></div>
        </div>
        </blockquote>

        <blockquote>
        <div class="row">
            <div class="col-sm-12">
            <p style="font-size:13pt;">제목 : <code style="font-family: 'Nanum Gothic', sans-serif;"><?php echo $board_data['Title'];?></code></p><br>
                <form action="./board_modified_write.php" method="POST" name="modified-form">
                <div class="form-group">
                    <textarea style="font-size:13pt;" class="form-control" rows="12" name = "content" id="content" maxlength="200" type="text" placeholder="수정할 내용을 입력하세요" required autocomplete="off"></textarea>
                </div>
                <div class="form-group">
                    <br>
                    <input class="form-control" type="date" id='currentDate' name="date" readonly>
                    <script>document.getElementById('currentDate').value = new Date().toISOString().slice(0,10);</script>
                </div>
            </div>
        </div>
        </blockquote>

        <blockquote>
            <input type="hidden" name="page" value="<?php echo $page; ?>">
            <button type="submit" class="btn btn-info">수정하기</button>
            </form>
            <button id="cancel" class="btn btn-info" onclick="cancel();">취소</button>
            <script>
                function cancel() {
                   window.history.back();
                }
            </script>
        </blockquote>
    </div>
    
    <!-- footer Container -->
    <footer class="container text-center">
    <p style="font-size:10px; color:#c2c2c2;"><span>Cloud System 4조 Site | 정성윤, 김만성, 허정연, 김동수, 황석현<br>서울시 종로구 | 전화 02-123-4567<br>Copyright &copy; BlaBla</span></p>
    </footer>

</body>
</html>

