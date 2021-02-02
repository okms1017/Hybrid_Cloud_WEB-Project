<?php session_start(); ?>
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
    .carousel-inner > .item > img {
        width:2000px;
        height:960px;
    }
    .modal-content {
        font-size: 15px; 
        margin: 0;
        padding: 0;
    }

    .navbar-brand {
        padding-top:6px;
    }
    </style>
</head>

<body style="font-family: 'Nanum Gothic', sans-serif;">
    <!-- Navigation Bar Container -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">   
                        <?php if ( isset($_SESSION['userid']) ) {
                        ?>
                            <a class="navbar-brand" href="../index_auth.html"><img src="../images/logo1.png" width="70"></a>
                        <?php
                        }
                        else {
                        ?>
                            <a class="navbar-brand" href="../index.html"><img src="../images/logo1.png" width="70"></a>
                        <?php
                        }
                        ?>
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
                                        <li><a href="../sub.html">과목영상</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <?php if (isset($_SESSION['userid'])) {
                                ?>
                                    <li><a href="./logout.php"><span class="glyphicon glyphicon-log-out"></span>로그아웃</a></li>
                                    <li><a id="signup_button" href="../php/information.php"><span class="glyphicon glyphicon-user"></span>회원정보</a></li>
                                <?php
                                }
                                else {
                                ?>  <li><a data-toggle="modal" data-target="#Modal_Login"><span class="glyphicon glyphicon-log-in"></span>로그인</a></li>
                                    <li><a data-toggle="modal" data-target="#Modal_Signup"><span class="glyphicon glyphicon-user"></span>회원가입</a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Login Modal Container -->
    <div class="container">
    <div class="modal fade" id="Modal_Login" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">로그인</h4>
        </div>

        <div class="modal-body">
        <div class="container">
        <form class="form-horizontal" action="./login.php" method="POST" name="login-form">

            <div class="form-group">
                <label style="text-align:left" for="login_id" class="col-sm-1 control-label">아이디</label>
                <div class="col-sm-4">
                    <input class="form-control" name="login_id" id="login_id" maxlength="20" type="text" autofocus placeholder="아이디를 입력하세요" required autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="login_pw" class="col-sm-1 control-label">비밀번호</label>
                <div class="col-sm-4">
                    <input class="form-control" name="login_pw" id="login_pw" maxlength="30" type="password" autofocus placeholder="비밀번호를 입력하세요" required autocomplete="off" >
                </div>
            </div>
        </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-default">로그인</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
        </div>
        </form>

        </div>
        </div>
    </div>
    </div>

    <!-- SignUP Modal Container -->
    <div class="container">
    <div class="modal fade" id="Modal_Signup" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">회원 가입</h4>
        </div>

        <div class="modal-body">
        <div class="container">
        <form class="form-horizontal" action="./php/signup.php" method="POST" name="signup-form"> 
            <div class="form-group">
                <label style="text-align:left" for="id" class="col-sm-2 control-label">아이디</label>
                <div class="col-sm-6">
                    <input class="form-control" name="id" id="id" maxlength="20" type="text" autofocus placeholder="아이디를 입력하세요" required autocomplete="off" >
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="pw" class="col-sm-2 control-label">비밀번호</label>
                <div class="col-sm-6">
                    <input class="form-control" name="pw" id="pw" maxlength="30" type="password" placeholder="비밀번호를 입력하세요" required autocomplete="off" >
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="pw2" class="col-sm-2 control-label">비밀번호 재확인</label>
                <div class="col-sm-6">
                    <input class="form-control" name="pw2" id="pw2" maxlength="30" type="password" placeholder="비밀번호를 한 번 더 입력하세요" required autocomplete="off" >
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="name" class="col-sm-2 control-label">이름</label>
                <div class="col-sm-6">
                    <input class="form-control" name="name" id="name" maxlength="20" type="text" placeholder="이름을 입력하세요" required autocomplete="off" >
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="birth_date" class="col-sm-2 control-label">생년월일</label>
                <div class="flex-container">
                    <select name="birth_year" class="form-control-1">
                        <?php for ($i=1960;$i<=2021;$i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                    
                        <?php } ?>
                    </select>&nbsp;&nbsp;년&nbsp;&nbsp;&nbsp;
                    <select name="birth_month" class="form-control-2">
                        <?php for ($i=1;$i<=12;$i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                    
                        <?php } ?>
                    </select>&nbsp;&nbsp;월&nbsp;&nbsp;&nbsp;
                    <select name="birth_day" class="form-control-2">
                        <?php for ($i=1;$i<=31;$i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>                    
                        <?php } ?>
                    </select>&nbsp;&nbsp;일&nbsp;&nbsp;&nbsp;
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="gender" class="col-sm-2 control-label">성별</label>
                <div class="col-sm-6">
                    <input type="radio" name="chk_gender" value="man">남자&nbsp;&nbsp;
                    <input type="radio" name="chk_gender" value="woman">여자
                </div>
            </div> 

            <div class="form-group">
                <label style="text-align:left" for="concern" class="col-sm-2 control-label">흥미 분야</label>
                <div class="col-sm-6">
                    <input class="form-control" name="concern" id="concern" maxlength="50" type="text" placeholder="분야를 선택하세요" required autocomplete="off" >
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="phone" class="col-sm-2 control-label">연락처</label>
                <div class="col-sm-6">
                    <input class="form-control" name="phone" id="phone" maxlength="50" type="text" placeholder="연락처를 입력하세요" required autocomplete="off" >
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="addr" class="col-sm-2 control-label">주소</label>
                <div class="col-sm-6">
                    <input class="form-control" name="addr" id="addr" maxlength="50" type="text" placeholder="주소를 입력하세요" required autocomplete="off" >
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="mail" class="col-sm-2 control-label">이메일</label>
                <div class="col-sm-6">
                    <input class="form-control" name="mail" id="mail" maxlength="50" type="email" placeholder="이메일을 입력하세요" required autocomplete="off" >
                </div>
            </div>
        </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-default">가입하기</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
        </div>
        </form>
        </div>
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
    <div class="contaniner-3">
        <form class="form-horizontal" action="./board_repl_I.php" method="POST" name="board_repl_I-form"> 
            <span style="float:left; width:90%">
                <input type='hidden' id='board_no' name='board_no' value=<?php echo $page;?>>
                <input type='hidden' id='userid' name='userid' value=<?php echo $board_data['Userid'];?>>
                <input type='hidden' id='data' name='data' value=<?php echo $board_data['Date'];?>>
                <input type="text" id="re" name="re" maxlength="450" class="form-control" placeholder="댓글을 입력하세요" required>
            </span>
            <span style="float:right; width:9%">
                <button type="submit" class="btn btn-default">등록</button>
            </span>
        </form>
        <table class="table_re">
            <tbody class="repl-text-center">
            <!-- Board_Repl -->
            <?php
                require_once("./db_con.php");
                $board_no = $_GET["page"];
                $Board_repl_sql = "SELECT board_no, repl_group, repl_no, deps, IF(deps>0, CONCAT(REPEAT( '  ㄴ', deps), content) , content) content, Userid FROM board_re WHERE board_no ='$board_no'";
                $result_re = $conn->query($Board_repl_sql);
                while ($re_data = $result_re->fetch_assoc()){
                    print "<tr>";
                    print " <td style='width:79%'>$re_data[content] &nbsp</td>";
                    print " <td style='width:11%'>작성자: $re_data[Userid] &nbsp &nbsp</td>";
                    print " <td style='width:10%;'><a href='#STORE_$re_data[repl_no]' role='button' style='color:blue' data-toggle='collapse'>댓글</a> &nbsp <a href='./board_repl_D.php?board_no=$re_data[board_no]&repl_group=$re_data[repl_group]&repl_no=$re_data[repl_no]' role='button' style='color:blue'>삭제</a></td>"; 
                    print "</tr>";
                    print "<tr>";
                    print "<form class='form-horizontal' action='./board_rerepl_I.php' method='POST' name='board_rerepl_I-form'>"; 
                    print " <td id='STORE_$re_data[repl_no]' class='collapse'>";
                    print "    <input type='hidden' id='board_no' name='board_no' value='$re_data[board_no]'>";
                    print "    <input type='hidden' id='repl_group' name='repl_group' value='$re_data[repl_group]'>";
                    print "    <input type='hidden' id='deps' name='deps' value='$re_data[deps]'>";
                    print "    <input type='hidden' id='Userid' name='Userid' value='$re_data[Userid]'>";
                    print "    <input type='text' id='re_re' name='re_re' maxlength='450' class='form-control' placeholder='대댓글을 입력하세요' required> &nbsp <button type='submit' class='btn btn-default'>등록</button></td>";
                    print " </td>";
                    print "</form>"; 
                    print "</tr>";
                }
            ?>           
            </tbody>
        </table>
    </div>
    </div>
    <br><br><br>
    
    <!-- footer Container -->
    <footer class="container text-center">
        <p style="font-size:10px; color:#c2c2c2;"><span>Cloud System 4조 Site | 정성윤, 김만성, 허정연, 김동수, 황석현<br>서울시 종로구 | 전화 02-123-4567<br>Copyright &copy; BlaBla</span></p>
    </footer>

</body>
</html>

