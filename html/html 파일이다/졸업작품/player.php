<?php
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

$p_name = $_REQUEST['searchPlayer'];

$pDetail_sql = "select * from player_tb where p_name = '$p_name'";
$pDetail_query = mysqli_query($conn, $pDetail_sql);
$pDetial_array = mysqli_fetch_array($pDetail_query);


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
  <script>
    //선수검색 팝업
    function searchPlayer(){
      var s_player = document.getElementById("member_finder").value;
      if(s_player)
      {
        url = "search_player.php?s_player="+s_player;
        window.open(url,"선수검색","width=500,height=800");
      }else{
        alert("선수이름을 입력하세요.\n모든 선수를 검색하려면 @ALL 을 입력해주세요.");
      }
    }
  </script>
  <script>
    //팝업창 제어용
    window.name = "player";
  </script>
  <title></title>
</head>

<body>
  <div class="page2_wrap">

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

      <div class="logout_box" style="display: none">
        <div class="logout_team_logo">

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




      </div>
    </div>
    <div class="page1_article">
      <div class="nav">
        <div class="nav_team_logo_box" style="background-image:url(<?php echo $info_array['m_image']; ?>)!important;"id="phpteamlogo">
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

        <div class="my_member_box">
          <div class="member_info">
            <div class="member_member_tit">
              <p>MEMBER</p>
            </div>

            <div class="member_member_find">

              <!--검색하면 정보가 검색한사람 정보로 바뀌어야뎀-->
              <form class="">
                <input type="text" name="s_player" value="" id="member_finder" onkeypress="if(event.keyCode==13){searchPlayer();}" placeholder="선수검색">
                <!--엔터키입력시 함수실행-->
                <input type="button" name="submit" value="" id="member_finder_btn" onclick="searchPlayer();"  >
                <!--버튼클릭시 함수실행-->
              </form>
            </div>

            <div class="member_infomation">
              <div class="member_photo">
                <!--멤버사진 php-->
                <img src="img/people.png" alt="">

              </div>
              <?php
              echo "
              <div class='member_is'>
              <h1><span>".$pDetial_array['p_backnum']."</span><span>".$pDetial_array['p_name']."</span></h1>
              <!--php 정보 처리-->
              <ul>
              <li>
              <p>보직</p>
              <p>".$pDetial_array['p_pos']."</p>
              </li>
              <li>
              <p>생년월일</p>
              <p>".$pDetial_array['p_birth']."</p>
              </li>
              <li>
              <p>가입연월</p>
              <p>".$pDetial_array['p_regidate']."</p>
              </li>
              <li>
              <p>연락처</p>
              <p>".$pDetial_array['p_tel']."</p>
              </li>
              <li>
              <p>주소</p>
              <p>".$pDetial_array['p_addr1']."</p>
              </li>
              <li>
              <p>상세주소</p>
              <p>".$pDetial_array['p_addr2']."</p>
              </li>
              <li>
              <p>메신져</p>
              <p>".$pDetial_array['p_sns']."</p>
              </li>

              </ul>

              </div>";
              ?>
            </div>



          </div>

          <div class="member_table">
            <div class="member_table_tit">
              <p>RECORD</p>
            </div>
            <div class="record_table">

              <h1>경기기록 <select class="record_select" >
                <option value="">기록선택</option>
                <option value="record_ul_batter_btn">타자</option>
                <option value="record_ul_picture_btn">투수</option>

              </select></h1>
              <!-- 최근일수로 6개까지나오고 맨마지막은 모든 값 합계로! -->

              <!-- 타자기록들어갈 목록 -->
              <div class="record_batter_ul">
                <ul class="batter_table">
                  <li>일자</li>
                  <li>타율</li>
                  <li>타수</li>
                  <li>안타</li>
                  <li>2루타</li>
                  <li>3루타</li>
                  <li>홈런</li>
                  <li>득점</li>
                  <li>타점</li>
                  <li>도루</li>
                  <li>볼넷</li>
                  <li>사사구</li>
                  <li>삼진</li>

                </ul>
                <ul>
                  <li>10/15</li>
                  <li>0.5</li>
                  <li>2</li>
                  <li>2</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>
                <ul>
                  <li>10/16</li>
                  <li>0.4</li>
                  <li>2</li>
                  <li>2</li>
                  <li>1</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>
                <ul>
                  <li>10/16</li>
                  <li>0.4</li>
                  <li>5</li>
                  <li>2</li>
                  <li>1</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>
                <ul>
                  <li>10/16</li>
                  <li>0.4</li>
                  <li>5</li>
                  <li>2</li>
                  <li>1</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>
                <ul>
                  <li>10/16</li>
                  <li>0.4</li>
                  <li>2</li>
                  <li>2</li>
                  <li>1</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>

                <ul>
                  <li>10/16</li>
                  <li>0.4</li>
                  <li>2</li>
                  <li>2</li>
                  <li>1</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>
                <ul>
                  <li>합계</li>
                  <li>0.302</li>
                  <li>120</li>
                  <li>50</li>
                  <li>20</li>
                  <li>1</li>
                  <li>5</li>
                  <li>40</li>
                  <li>20</li>
                  <li>5</li>
                  <li>4</li>
                  <li>20</li>
                  <li>15</li>

                </ul>






              </div>
              <!-- 타자기록들어갈 목록 -->

              <!-- 투수기록들어갈 목록 -->
              <div class="record_picture_ul">
                <ul class="batter_table">
                  <li>투수</li>
                  <li>타율</li>
                  <li>타수</li>
                  <li>안타</li>
                  <li>2루타</li>
                  <li>3루타</li>
                  <li>홈런</li>
                  <li>득점</li>
                  <li>타점</li>
                  <li>도루</li>
                  <li>볼넷</li>
                  <li>사사구</li>
                  <li>삼진</li>

                </ul>
                <ul>
                  <li>10/15</li>
                  <li>0.5</li>
                  <li>2</li>
                  <li>2</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>
                <ul>
                  <li>10/16</li>
                  <li>0.4</li>
                  <li>2</li>
                  <li>2</li>
                  <li>1</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>
                <ul>
                  <li>10/16</li>
                  <li>0.4</li>
                  <li>5</li>
                  <li>2</li>
                  <li>1</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>
                <ul>
                  <li>10/16</li>
                  <li>0.4</li>
                  <li>5</li>
                  <li>2</li>
                  <li>1</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>
                <ul>
                  <li>10/16</li>
                  <li>0.4</li>
                  <li>2</li>
                  <li>2</li>
                  <li>1</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>

                <ul>
                  <li>10/16</li>
                  <li>0.4</li>
                  <li>2</li>
                  <li>2</li>
                  <li>1</li>
                  <li>1</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>
                  <li>0</li>

                </ul>
                <ul>
                  <li>합계</li>
                  <li>0.302</li>
                  <li>120</li>
                  <li>50</li>
                  <li>20</li>
                  <li>1</li>
                  <li>5</li>
                  <li>40</li>
                  <li>20</li>
                  <li>5</li>
                  <li>4</li>
                  <li>20</li>
                  <li>15</li>

                </ul>






              </div>
              <!-- 투수기록들어갈 목록 -->

            </div>
            <script>
            $(document).ready(function(){

              $(".record_select").change(function(){
                var opt = $(".record_select").val();
            if(opt == 'record_ul_batter_btn'){
              $(".record_batter_ul").css({"display":"block"});
              $(".record_picture_ul").css({"display":"none"});
             }
            else if(opt=='record_ul_picture_btn'){
              $(".record_batter_ul").css({"display":"none"});
              $(".record_picture_ul").css({"display":"block"});
            }


           })

            })

            </script>
          </div>

        </div>

        <div class="member_chart">
          <h2>GRAPH</h2>

        </div>

      </div>


    </div>

  </div>

</body>

</html>
