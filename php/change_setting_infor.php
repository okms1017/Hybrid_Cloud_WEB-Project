<!DOCTYPE html>
<html>
<head>
    <title>Info</title>
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
                        <a class="navbar-brand" href="../index.html"><img src="../images/logo1.png" width="70"></a>
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
                                        <li><a href="./sub_auth.html">과목영상</a></li>
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

    <!-- Board_Modified -->
    <?php
        session_start();
        require_once("./db_con.php");
        $userid = $_SESSION["userid"];
        $Member_content_sql = "SELECT * FROM member WHERE ID='$userid'";
        $result = $conn->query($Member_content_sql);
        $Member_data = $result->fetch_assoc();
    ?>


    <div class="container-3">
    <h2>회원 정보 변경</h2>
    <div class="row">
    <table class="table table-bordered">

        <thead>
            <tr>
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">아이디</th>
                <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['ID']; ?></td>
            </tr>

            </thead>

            <tbody>
            <tr >
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;"> 현재 이름</th>
                <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['Name']; ?></td>
                <form action="./chage_finish.php" method="POST" name="modified-form">
                <div class="form-group">
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;"> 새 이름</th>
                <div class="col-sm-6">
                    <td><input class="form-control" name="name" id="name" maxlength="20" type="text" placeholder="이름을 입력하세요" required autocomplete="off" ></td>
                </div>
            </div>
            </tr>

            <tr >
                <form action="./chage_finish.php" method="POST" name="modified-form">
                <div class="form-group">
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;"> 새 비밀번호</th>
                    <div class="col-sm-6">
                <td><input class="form-control" name="pw" id="pw" maxlength="30" type="password" placeholder="비밀번호를 입력하세요" required autocomplete="off" ></td>
                </div>
                </div>
            </tr>
            <tr >
                 <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">새 비밀번호 확인</th>
                <div class="col-sm-6">
                    <td><input class="form-control" name="pw2" id="pw2" maxlength="30" type="password" placeholder="비밀번호를 한 번 더 입력하세요" required autocomplete="off" ></td>
                </div>
                </div>
            </tr>

            <tr >
                 <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">생년월일</th>
              <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['Birthdate']; ?></td>
                <form action="./chage_finish.php" method="POST" name="modified-form">
                <div class="form-group">
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;"> 생년월일 재입력 </th>
                <td><div class="flex-container">
                    <select name="birth_year" class="form-control-0">
                        <?php for ($i=1960;$i<=2021;$i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                    
                        <?php } ?>
                    </select>&nbsp;&nbsp;년&nbsp;&nbsp;&nbsp;
                    <select name="birth_month" class="form-control-1">
                        <?php for ($i=1;$i<=12;$i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                    
                        <?php } ?>
                    </select>&nbsp;&nbsp;월&nbsp;&nbsp;&nbsp;
                    <select name="birth_day" class="form-control-1">
                        <?php for ($i=1;$i<=31;$i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                    
                        <?php } ?>
                    </select>&nbsp;&nbsp;일&nbsp;&nbsp;&nbsp;
                </div></td>
            </div>
            </tr>


            <tr>
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">성별</th>
                <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['Gender']; ?></td>
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">성별 설정</th>
                <form action="./chage_finish.php" method="POST" name="modified-form">
                <div class="form-group">
                <div class="col-sm-6">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="chk_gender" value="man">남자&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="chk_gender" value="woman">여자</td>
                </div>
                </div> 
            </tr>


            <tr >
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">흥미 분야</th>
                <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['concern']; ?></td>
                <form action="./chage_finish.php" method="POST" name="modified-form">
                <div class="form-group">
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;"> 흥미 분야</th>
                <div class="col-sm-6">
                <td><input class="form-control" name="concern" id="concern" maxlength="50" type="text" placeholder="분야를 선택하세요" required autocomplete="off" ></td>
                </div>
                </div>
            </tr>


            <tr >
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">연락처</th>
                <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['phone']; ?></td>
                <form action="./chage_finish.php" method="POST" name="modified-form">
                <div class="form-group">
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">연락처 변경</th>
                <div class="col-sm-6">
                   <td><input class="form-control" name="phone" id="phone" maxlength="50" type="text" placeholder="연락처를 입력하세요" required autocomplete="off" ></td>
                </div>
                </div>
            </tr>


            <tr>
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">주소</th>
                <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['addr']; ?></td>
                <form action="./chage_finish.php" method="POST" name="modified-form">
                <div class="form-group">
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">주소 재입력</th>
                <div class="col-sm-6">
                    <td><input class="form-control" name="addr" id="addr" maxlength="50" type="text" placeholder="주소를 입력하세요" required autocomplete="off" ></td>
                </div>
                </div>
            </tr>
            <tr >
                 <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">이메일</th>
              <td class="tg-0pky text-center" style="font-size:15pt;"><?php echo $Member_data['Mail']; ?></td>
                <form action="./chage_finish.php" method="POST" name="modified-form">
                <div class="form-group">
                <th class="col-md-2 text-center" style="font-size:15pt; background-color:#c2c2c2;">이메일 재입력</th>
                <div class="col-sm-6">
                    <td><input class="form-control" name="mail" id="mail" maxlength="50" type="email" placeholder="이메일을 입력하세요" required autocomplete="off" ></td>
                </div>
                </div>
            </tr>

        </form>
    </div>
    </div>
            </tbody>
    </table>


        <blockquote>
            <input type="hidden" name="page" value="<?php echo $page; ?>">
            <a href="./chage_finish.php"><button type="submit" class="btn btn-info">수정하기</button></a>
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

