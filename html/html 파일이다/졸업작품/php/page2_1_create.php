<?php

$db_host = "localhost";

$db_user = "hec8897";

$db_passwd = "rlaekdns786";

$db_name = "hec8897";

$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/page2.css">
  <link rel="stylesheet" href="css/create.css">
  <link rel="stylesheet" href="css/foot.css">
  <script src="js/mo_slide_menu.js"></script>
  <script src="js/faid.js"></script>
  <title>바르다알바생 -세상의 바른알바-</title>
</head>

<body>
  <div class="mo_slide">
    <a href="page1_1.html">임금계산기</a>
    <a href="page2.php">알바생커뮤니티</a>
    <a href="page3.php">고용주커뮤니티</a>
    <a href="page4.html">TODAY</a>
    <a href="" class="mo_s_close">닫기</a>
  </div>

  <div class="wrap">
    <header>
      <div class="head">

        <div class="h_manu">
          <div class="logo">
            <a href="index.html"><img src="img/lo.png" alt=""></a>
          </div>
          <div class="h_m_texts">
            <a href="page1_1.html">임금계산기</a>
            <a href="page2.php">알바생커뮤니티</a>
            <a href="page3.php">고용주커뮤니티</a>
            <a href="page4.html">TODAY</a>
          </div>

          <div class="mo_manu">
            <div></div>
            <div></div>
            <div></div>

          </div>


        </div>



      </div>

      <div class="h_texts">
        <div>알바생커뮤니티</div>
        <div>알바생님의 스토리를 공유해주세요</div>
      </div>

      <div class="mo_texts">
        <div>세상에 바른알바</div>

      </div>

      <div class="btns">
        <div class="btns1"><a href="page2.php">알바꿀팁</a></div>

        <div class="btns2"><a href="page2_2.php">갑질신고</a></div>

      </div>


    </header>

    <article>


      <div class="tbl">



        <div class="tbl_des">

    <form action="page2_1_process_create.php" method="POST" name="frm">

     <div>
    <p>이름</p><input type="text" name="name" placeholder="yourname" autocomplete="off" id="names" value="<?php echo $_POST['name'];?>">
     <p>제목</p>
     <input type="text" name="title" placeholder="title" id="tit" autocomplete="off" value="<?php echo $_POST['title'];?>">
     </div>
     <div>
     <p>비밀번호</p><input type="password" name="pw" placeholder="password" autocomplete="off" id="pww">
     <p>작성일자</p>
     <input type="date" name="today" placeholder="today" value="<?php echo date('Y-m-d'); ?>" readonly/></div>
     <p><input type="textarea" name="description" value="<?php echo $_POST['description'];?>"placeholder="알바하면서 공유하면 좋을 팁을 남겨주세요" autocomplete="off" id="des"></p>
     <p><input type="submit" value ="작성하기" placeholder="d" onclick="emty()" class="subbtn"></p>
   </form>

   <script>/*고쳐야할부분*/
   function emty(){

     if(document.getElementById('names').value === '') {
       var theForm = document.frm;
       theForm.action = "page2_1_create.php";
           alert('이름이 비어있습니다.');
           return;
         }

     if(document.getElementById('pww').value === '') {
       var theForm = document.frm;
       theForm.action = "page2_1_create.php";
           alert('비밀번호가 비어있습니다.');
           return;
         }

      if( document.getElementById('tit').value === ''){
		       var theForm = document.frm;
		         theForm.action = "page2_1_create.php";
            alert('제목이 비어있습니다.');
            return;
          }

          if( document.getElementById('des').value === ''){
               var theForm = document.frm;
                 theForm.action = "page2_1_create.php";
                alert('본문이 비어있습니다.');
                return;
              }




    };
   </script>


  </div>




  </div>


  </article>

  <footer>
  <div class="foot">
   <a href="index.html"><img src="img/lo.png" alt=""></a>
   <div class="fo_text">
     세상의 바른알바 찾기-바르다알바생 &nbsp;
     ⓒ2018 SIMJINWOON & DAELIM College. All Rights reserced.

   </div>
   <div class="mo_fo_text">
     세상의 바른알바 찾기-바르다알바생



   </div>
  </div>
  </footer>

  </div>

  </body>

  </html>
