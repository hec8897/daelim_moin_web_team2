<?php
if (!isset($_SESSION)) {
  // echo "세션 없음";
  session_start();
}else{
  // echo "세션 있음";
  session_start();
}
$m_id = $_SESSION['m_id'];
$m_pw = $_SESSION['m_pw'];

if (isset($_SESSION['m_id']) || isset($_SESSION['m_pw'])) {
  $login_check = true;
}else{
  $login_check = false;
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="js/event.js"></script>
  <script src="js/post_check.js"></script>
  <script>
    function checkid(){
      var m_id = document.getElementById("join_id").value;
      if(m_id)
      {
        url = "id_check.php?m_id="+m_id;
        window.open(url,"chkid","width=300,height=100");
      }else{
        alert("아이디를 입력하세요");
      }
    }
  </script>
  <!-- 메모장CSS 완성시 삭제바람 -->
  <style media="screen">
  .memo{
    width: 500px;
    height: 500px;
    background-color: rgba(255,255,255,0.4);
    position: absolute;
    left: 10px;
    top: 10px;
    overflow-y: scroll;
  }
</style>
</head>

<body>
  <div class="wrap">
    <!-- 메모장영역 완성시 삭제바람 -->
    <!-- 메모장영역 완성시 삭제바람 -->
    <!-- 메모장영역 완성시 삭제바람 -->
    <!-- 메모장영역 완성시 삭제바람 -->
    <!-- 메모장영역 완성시 삭제바람 -->
    <!-- <div class="memo">
      <h1>메모장입니다</h1>
      <b>*****클릭하면사라짐******</b>
      <p><b>진행사항</b></p>
    로그인 로그아웃 UI / 시스템 완성(10/01)</br>
  회원가입 폼 제작중 (10/02 -) (팀이름도추가해주세여! - input은 만들어둠)</br></br>
테스트 계정</br>
<b>계정:test16 / 패스워드 :test16!</b></br>
회원가입 가능합니다</br>
로그인 로그아웃 UI / 시스템 완성(10/01)</br>
회원가입 폼 제작중 (10/02 -) (팀이름도추가해주세여! - input은 만들어둠)</br>
회원사진업로드안뎀 ㅠ (10/05)
ㄴ아니됐다안뎃다함;(10/06)



</div> -->
<script type="text/javascript">
  $(".memo").click(function(){
    $(this).hide()
  })
</script>
<!-- 메모장영역 완성시 삭제바람 -->
<!-- 메모장영역 완성시 삭제바람 -->
<!-- 메모장영역 완성시 삭제바람 -->
<!-- 메모장영역 완성시 삭제바람 -->
<!-- 메모장영역 완성시 삭제바람 -->



<section class="intor_section">
  <div class="section_wrap">
    <div class="boxs">
      <div class="sitelogo"></div>
      <!--변경-->
      <div class="index_box1">

        <a href="team.php">
          <div class="box1_img">
            <img src="img/support.png" alt="">
          </div>
        </a>

        <div class="box1_text">
          팀 관리
        </div>
      </div>

      <div class="index_box2">

        <a href="player.php">
          <div class="box2_img">
            <img src="img/avatar.png" alt="">
          </div>
        </a>

        <div class="box2_text">
          선수 관리
        </div>
      </div>
      <div class="index_box3">

        <a href="" onclick="alert('준비중입니다.')">
          <div class="box3_img">
            <img src="img/trophy.png" alt="">
          </div>
        </a>
        <div class="box3_text">
          리그 관리(준비중입니다)
        </div>
      </div>

      <!--변경-->
    </div>

    <div class="login_box">
      <div class="login_selector">
        <?php
        if ($login_check == false) {
          ?>
          <p id="selector_login">Login</p>
          <p id="selector_join">Join</p>
          <?php
        }
        ?>
      </div>

      <div class="select_login">
        <div class="login_mark_people"></div>

        <div class="logout">
          <?php
          if ($login_check == true) {
            echo "<p>[".$m_id."] 님이 로그인중입니다</p>";
            echo "<p>로그아웃을 하시겠습니까?</p>";
            echo "
            <button type='submit' name='button' value='로그아웃' class='logout_yes'>
            <a href='dess_sess.php'>예</a>
            </button>

            <div class='login_box_close'>아니오</div>

            ";
          }else{
            ?>

          </div>


          <form class="login_form" action="login_proc.php" method="get">
            <input type="text" name="m_id" placeholder="ID" autocomplete="off" class="login_input" required></br>
            <input type="password" name="m_pw" placeholder="PW" autocomplete="off" class="password_input" required>
            <button type="submit" name="button" value="로그인" class="form_login_btn">로그인</button>
            <div class="login_box_close">닫기</div>
          </form>

        <? } ?>

      </div>
      <div class="select_join">

        <!-- 회원가입폼 -->

        <form class="join_form" enctype="multipart/form-data" name="wform" action="regi_proc.php" method="post" onsubmit="return post_check()">
          <h1>SIGN UP</h1>
          <p>ID</p>
          <input type="text" name='m_id' placeholder="ID" autocomplete="off" id="join_id" class="join_inset" required>
          <input type="button" value="중복확인" onclick="checkid();" name="" id="idcheck">
          <p>PASSWORD</p>
          <input type="password" name="m_pw" placeholder="PW" autocomplete="off" id="join_password" class="join_inset" required>
          <p>Retry_password</p>
          <input type="password" name="m_pwre" placeholder="PW_repeat" autocomplete="off" id="join_password" class="join_inset" required>
          <p>NAME</p>
          <input type="text" name="m_name" placeholder="NAME" autocomplete="off" id="join_name" class="join_inset" required>
          <p>TEAM NAME</p>
          <input type="text" name="m_tname" placeholder="NAME" autocomplete="off" id="join_teamname" class="join_inset" required>

          <input type="file" size=2048 name="m_image" id="upload_img">

          <input type="submit" name="button" value="회원가입" id="form_join_btn">

        </form>
        <div class="login_box_close">닫기</div>

      </div>

    </div>

  </div>

</section>
<div class="login_btn">
  <?php
  if ($login_check == true) {
    echo "$m_id";
    //장난으로 마퀴태그 써봄 ㅋㅋㅋㅋ 한줄로 그냥 쓰면 아랫줄로 넘어가버림
  }else{
    echo "Log In";
  }
  ?>
</div>
</div>

</body>

</html>
