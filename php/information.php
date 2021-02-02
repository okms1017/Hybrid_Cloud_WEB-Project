<!DOCTYPE html>
<html>
<head>
    <title>information</title>
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
                                        <li><a href="../sub_auth.html">과목영상</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li><a id="logout_button" href="./logout.php"><span class="glyphicon glyphicon-log-out"></span>로그아웃</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- infor_Read -->
    <?php
        session_start();
        require_once("./db_con.php");
        $userid = $_SESSION["userid"];
        $Member_content_sql = "SELECT * FROM member WHERE ID='$userid'";
        $result = $conn->query($Member_content_sql);
        $Member_data = $result->fetch_assoc();
    ?>

    <div class="container-3">
    <h2>회원 정보</h2><br>
    <table class="table table-bordered">
        <tbody>
                <tr>
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">아이디</th>
                <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['ID']; ?></td>
              </tr>
                 <tr >
                 <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">이름</th>
              <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['Name']; ?></td>
                </tr>
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">생일</th>
                <td class="tg-0pky text-center"  style="font-size:15pt;"><?php echo $Member_data['Birthdate']; ?></td>
              </tr>
              </tr>
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">성별</th>
                <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['Gender']; ?></td>
              </tr>
                 <tr>
                 <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">관심사</th>
              <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['concern']; ?></td>
                </tr>
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">전화번호</th>
                <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['phone']; ?></td>
              </tr>
                 <tr>
                 <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">주소</th>
              <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['addr']; ?></td>
                </tr>
                <tr>
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">이메일</th>
              <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['Mail']; ?></td>
                </tr>
        </tbody>
    </table>
        <span style="float:left;">
        <a href="./change_infor.php" class="btn btn-info" role="button">회원정보 수정</a>
        </span>
        <span style="float:right;">
        <a href="./del_user.php" class="btn btn-danger" role="button" >회원탈퇴</a>
        </span>
    </div>
    <br><br><br>
    
    <!-- footer Container -->
    <footer class="container text-center">
    <p style="font-size:10px; color:#c2c2c2;"><span>Cloud System 4조 Site | 정성윤, 김만성, 허정연, 김동수, 황석현<br>서울시 종로구 | 전화 02-123-4567<br>Copyright &copy; BlaBla</span></p>
    </footer>

</body>
</html>

