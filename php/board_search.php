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
                        <a class="navbar-brand" href="../index_auth.html"><img src="../images/logo1.png" width="70"a>
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

    
    <!-- Board_Search_list -->
    <div class="container-3">
        <h2>게 시 판</h2><br>
        <table class="table">
            <thead>
                <tr style="font-size:15pt; background-color:#abd5f6;">
                    <th class="col-md-1 text-center">No</th>
                    <th class="col-md-6 text-center">제목</th>
                    <th class="col-md-2 text-center">작성자</th>
                    <th class="col-md-2 text-center">작성일</th>
                </tr>
            </thead>
            <tbody class="text-center"> 
            <?php
                require_once("./db_con.php"); 
                function result($sql){
                    global $conn;
                    return $conn->query($sql);
                }
                $selectSearchBy = $_GET['selectSearchBy'];
                $query = $_GET['query'];
                $sql_result = result("select * from board where $selectSearchBy like '%$query%' order by No desc");
                $total_row = $sql_result->num_rows;
                if (isset($_GET["page"])){
                    $start = ($_GET["page"]-1) * 10;
                    $page_sql = "SELECT * FROM board WHERE $selectSearchBy like '%$query%' ORDER BY No DESC LIMIT $start, 10";
                }
                else{
                    $page_sql = "SELECT * FROM board WHERE $selectSearchBy like '%$query%' ORDER BY No DESC LIMIT 10";
                }
                $result = $conn->query($page_sql);
                $flag = 1;
                while($search_result = $result->fetch_assoc()){ /*필드 이름으로 된 배열로만 저장*/
                    if ($flag % 2 == 1) {
                        $st = "active";
                    }
                    else {
                        $st = "table";
                    }
                    print "<tr class='$st'>";
                        print "<td>$search_result[No]</td>";
                        print "<td><a style='color: black;' href='./board_read.php?page=$search_result[No]'>$search_result[Title]</a></td>";
                        print "<td>$search_result[Userid]</td>";
                        print "<td>$search_result[Date]</td>";
                    print "</tr>";
                    $flag++;
                }
                $page_count = ceil($total_row / 10);
                    if (($total_row % 10) +1){ 
                        $page_count++;
                    }
                    $page_count--;
                    if (isset($_GET['page'])) { 
                        $page = $_GET['page']; 
                    } else $page = 1;
                ?>   
                <tr>
                    <td colspan=12>
                        <ul class="pager" style="margin-top:10px">
                        <div class='row'>
                            <div class="pull-right" style='text-align:center;'>
                                <li><a style='color: black;' data-toggle="modal" data-target="#Modal_Write">글쓰기</a></li>    
                            </div>     
                            <div class="col-sm-12">
                                <ul class="pagination justify-content-center" style="margin:10px 0;">
                                    <li class="<?php if ($page == 1) echo 'disabled'; ?>">
                                        <?php
                                            if ($page == 1) {
                                            ?>
                                                <a> ◀ </a>
                                            <?php
                                            } else {
                                            ?>
                                                <a style='color: blue;' href="./board.php?page=<?php echo ($page - 1); ?>"> ◀ </a>
                                            <?php
                                            }
                                        ?>
                                    <?php
                                        $pagenum_list = 5;
                                        $block=ceil($page/$pagenum_list);
                                        $b_start_page = ( ($block-1) * $pagenum_list ) + 1;
                                        $b_end_page = $b_start_page + $pagenum_list - 1;
                                    ?>
                                    </li>
                                    <?php
                                    for ($j=$b_start_page;$j<=$b_end_page;$j++) {
                                    ?>
                                        <?php if ($b_end_page >= $page_count) {
                                        ?>
                                            <?php $b_end_page = $page_count ?>
                                        <?php
                                        }
                                        ?>
                                        <li class="<?php
                                            if ($page == $j) {
                                        ?>active
                                        <?php
                                            }
                                        ?>"><a href="./board.php?page=<?php echo $j; ?>"><?php echo $j; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="<?php if ($page >= $page_count) echo 'disabled'; ?>">
                                            <?php if ($page >= $page_count) {
                                            ?>
                                                <a> ▶ </a>
                                            
                                            <?php
                                            } else {
                                            ?>
                                                <a style='color: blue;' href="./board.php?page=<?php echo ($page + 1); ?>"> ▶ </a>
                                            <?php
                                            }
                                            ?>
                                    </li>
                                </ul>
                            </div>
                            <br><br>

                            <div id="searchBox2" class="searchBox">
                                <form name="formSearchBy" action="./board_search.php" method="get">
                                <div class="flex-container">  
                                    <div id="divSearchBy2" class="flex-container-child" style="width:144px">
                                        <select name="selectSearchBy" class="form-control">
                                            <option value="Title" selected>제목</option>
                                            <option value="Content">내용</option>
                                            <option value="Userid">글쓴이</option>
                                        </select>
                                    </div>&nbsp;&nbsp;
                                    <div class="flex-container-child" style="width:200px">
                                        <input type="text" id="query2" name="query" class="form-control" placeholder="검색할 내용을 입력하세요" required>
                                    </div>&nbsp;&nbsp;
                                    <div class="flex-container-child">
                                        <button type="submit" class="btn btn-default">검색</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
    </div> 

    <!-- WRITE Modal Container -->
    <div class="container">
    <div class="modal fade" id="Modal_Write" role="dialog">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">글 작성하기</h4>
        </div>

        <div class="modal-body">
        <div class="container">
        <form class="form-horizontal" action="./board_write.php" method="POST" name="board_write-form"> 
            <div class="form-group">
                <label style="text-align:left" for="title" class="col-sm-2 control-label">제목</label>
                <div class="col-sm-6">
                    <input class="form-control" name="title" id="title" maxlength="20" type="text" autofocus placeholder="제목을 입력하세요" required autocomplete="off" >
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="pw" class="col-sm-2 control-label">내용</label>
                <div class="col-sm-6">
                    <textarea class="form-control" rows="20" name = "content" id="content" maxlength="100" type="text" placeholder="내용을 입력하세요" required autocomplete="off"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label style="text-align:left" for="date" class="col-sm-2 control-label">작성 일자</label>
                <div class="col-sm-6">
                    <input class="form-control" type="date" id='date' name="date" readonly>
                    <script>document.getElementById('date').value = new Date().toISOString().slice(0,10);</script>
                </div>
            </div>
        </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-default">글 게시</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
        </div>
        </form>
        </div>
        </div>
    </div>
    </div>

    <!-- footer Container -->
    <footer class="container text-center">
        <p style="font-size:10px; color:#c2c2c2;"><span>Cloud System 4조 Site | 정성윤, 김만성, 허정연, 김동수, 황석현<br>서울시 종로구 | 전화 02-123-4567<br>Copyright &copy; BlaBla</span></p>
    </footer>

</body>
</html>
