<?
include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";

$conn = getConnection();
session_start();

$m_id = $_SESSION['m_id'];

if (!$m_id) {

    echo "
    <script type='text/javascript'>
    alert('로그인이 필요한 서비스 입니다.');
    location.href = 'index.php';
    </script>";

}

$info_sql = "SELECT * FROM member_tb WHERE m_id = '$m_id'";
$info_query = mysqli_query($conn, $info_sql);
$info_array = mysqli_fetch_array($info_query);

$player_info_sql = "SELECT * FROM player_tb WHERE p_tname = '$info_array[m_tname]'";
$player_info_query = mysqli_query($conn, $player_info_sql);
$player_info_array = mysqli_fetch_array($player_info_query);
$player_row_count = mysqli_num_rows($player_info_query);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/master.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR" rel="stylesheet">
  <script src="js/event.js"></script>
  <title></title>
</head>

<body>
  <div class="page1_wrap">

    <div class="head">

      <div class="head_logo_section">
        <div class="hamber" id="hamber_open">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <div class="hamber" id="hamber_close">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <a href="index.php">
          <div class="head_logo">
          </div>
        </a>
      </div>

      <div class="head_login">
        <?php echo $_SESSION['m_id']; ?>
      </div>

      <!-- <div class="logout_box">
        <div class="logout_team_logo">
d
        </div>
        <div class="logout_team_info">
          <h1><?php echo $_SESSION['m_id']; ?></h1>
          <p>팀대표자 : <?php echo $_SESSION['m_id']; ?> </p>

        </div>

        <div class="logout_logout">

          로그아웃하시겠습니까?
          <div class="logout_logout_yes">
            yes
          </div>
          <div class="logout_logout_no">
            no
          </div>
        </div>
        <script type="text/javascript">
        $(".head_login").click(function(){
          $(".logout_box").show()
        })
        $(".logout_logout_no").click(function(){
          $(".logout_box").css({"display":"none"})

        })

        </script>




      </div> -->

    </div>
    <div class="page1_article">
      <div class="nav">
        <div class="nav_team_logo_box" style="background-image:url(<?php echo $info_array['m_image']; ?>)!important;"id="phpteamlogo">
          <!-- <img src="<?php echo $info_array['m_image']; ?>"> -->
        </div>
        <p>WELCOME</p>
        <h1><?php echo $info_array['m_tname']; ?></h1>

        <div class="menu_list">
          <ul class="high_list">
            <h2>MENU</h2>
            <li id="team_ul"><span><img src="img/nav_icon1.png" alt=""></span>&emsp;TEAM</li>

            <ul class="small_list_1">
              <a href="team.php"><li>list1</li></a>
              <a href="team.php"><li>list1</li></a>
              <a href="team.php"><li>list1</li></a>
              <a href="team.php"><li>list1</li></a>
            </ul>

            <li id="member_ul"><img src="img/nav_icon2.png" alt=""></span>&emsp;MEMBER</li>
            <ul class="small_list_2">
              <a href="player.php"><li>list1</li></a>
              <a href="player.php"><li>list1</li></a>
              <a href="player.php"><li>list1</li></a>
              <a href="player.php"><li>list1</li></a>
            </ul>

            <li id="league_ul"><img src="img/nav_icon3.png" alt=""></span>&emsp;LEAGUE</li>
            <ul class="small_list_3">
              <a href="league.php"><li>list1</li></a>
              <a href="league.php"><li>list1</li></a>
              <a href="league.php"><li>list1</li></a>
              <a href="league.php"><li>list1</li></a>
            </ul>
          </ul>
        </div>

      </div>

      <div class="main">
        <h1>TEAM PAGE</h1>

        <div class="my_team_box">
          <div class="my_team_logo">
            <p><?php echo $info_array['m_tname']; ?></p>
            <div class="my_logo" style="background-image:url(<?php echo $info_array['m_image']; ?>)!important;" id="phpteamlogo">
            </div>
          </div>
          <div class="my_team_member">
            <div class="member_tit">
              <p>MEMBER LIST</p>

              <!--멤버검색하면 리스트에 검색한 이름만뜨게 / 멤버추가는 다른페이지에서-->

              <form class="search_form" action="index.php" method="post">

                <div class="member_input">
                  <div class="zoom_icon">
                  </div>
                  <input type="text" class="member_input_search" name="" value="" placeholder="search_member">
                </div>
                <input type="submit" class="member_input_submit" name="" value="search">
                <div class="member_plus">plus</div>
                <!-- 여기는 멤버추가하는 페이지로 이동해야할것 같습 -->


              </form>

            </div>


            <!--PHP 처리해야할부분!-->
            <!--li 클릭하면 PAGE2 에서 바로 그 이름에 해당하는 회원을 볼수있어야함-->
            <!-- 팀 리스트 작업 시작 -->
            <ul>
              <li><span>연번</span><span>이름</span><span>보직</span><span>생년월일</span><span>연락처</span></li>
              <a href="page2.php">
                <li>
                  <span><?php echo $player_info_array['p_backnum']; ?></span><!--등번호-->
                  <span><?php echo $player_info_array['p_name']; ?></span><!--선수이름-->
                  <span><?php echo $player_info_array['p_pos']; ?></span><!--보직-->
                  <span><?php echo $player_info_array['p_birth']; ?></span><!--생년월일-->
                  <span>
                    <?php
                      printf("%d rows",$player_row_count);
                    ?>
                  </span>
                </li>
              </a>
              <li><span>002</span></li>
              <li><span>003</span></li>
              <li><span>003</span></li>
              <li><span>003</span></li>
              <li><span>003</span></li>
              <li><span>003</span></li>
              <li><span>003</span></li>
              <li><span>003</span></li>
            </ul>
            <!-- 팀 리스트 작업 끝 -->
          </div>

        </div>

        <div class="my_team_date">
          <h2>SCHEDULE</h2>

        </div>

      </div>








    </div>


  </div>

</body>

</html>
