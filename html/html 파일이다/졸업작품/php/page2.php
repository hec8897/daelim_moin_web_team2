<?php

$db_host = "localhost";

$db_user = "hec8897";

$db_passwd = "rlaekdns786";

$db_name = "hec8897";

$conn = mysqli_connect($db_host,$db_user,$db_passwd,$db_name);

mysqli_set_charset($conn, "utf8");

$page = $_GET[page];
$start_page = ($page-1) * 10;
if($page=='') {
	$sql = "SELECT * FROM page2  order by id DESC limit 0, 10";
} else {
	$sql = "SELECT * FROM page2 order by id DESC limit $start_page, 10";
}
$result = mysqli_query($conn, $sql);

mysqli_set_charset($conn, "utf8");
$list = '';
while($row = mysqli_fetch_array($result)) {

 $list = $list."<tr>
                <td>{$row['name']}</td>
                <td><a href='page2_Read.php?id={$row['id']}'>{$row['title']}</a></td>
                <td>{$row['today']}</td></tr>";
             };
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/bord.css">
  <link rel="stylesheet" href="css/page2.css">
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
      <div class="article_texts">
      <div>꿀팁게시판</div>
      <div>알바생 커뮤니티를 통해 꿀팁을 공유해보세요</div>
      </div>

      <div class="tbl">


        <div class="tbl_des">

    <table>
      <thead>
      <tr>
      <th>작성자</th><th>제목</th><th>작성일시</th>
      </tr>
        </thead>
        <tbody>


        <?=$list?>



    </tbody>
      <!--리스트 출력-->


    </table>


       </div>








      </div>




<?php
$query = "SELECT * FROM page2";
$data = mysqli_query($conn, $query);
$total_rows = mysqli_num_rows($data);

$page = $_GET[page] ? $_GET[page] : 1;

$total_articles = $total_rows;

$scale = 10;

$pageScale = 5;

$totalPage = ceil ($total_articles / $scale);

$pageBlock = ceil ($page / $pageScale);

$listStart = $scale * ($page - 1);

$listEnd = $scale * ($page + 1);

$articles_num = $total_articles - $listStart;

$blockStart = ($pageBlock - 1) * $pageScale;

$blockEnd = $pageBlock * $pageScale;

if ($blockEnd > $totalPage) $blockEnd = $totalPage;





?>

<div class="number">


<? if ($pageBlock > 1) { // 이전페이지?>

		<li class="box"><a href="page2.php?table=<?=$table?>&page=<?=$blockStart?>">◀</a></li>

<?}?>



<? for ($i = $blockStart + 1; $i <= $blockEnd; $i++) { // 페이지 출력?>

		<li class="box">

			<? if($i==$page){?>

				<a><span class="orange"><?=$i?></span></a>

			<?} else {?>

				<a href="page2.php?table=<?=$table?>&page=<?=$i?>"><?=$i?></a>

			<?}?>

		</li>

<?}?>





<?if ($pageBlock < $totalPage && $blockEnd != $totalPage) {?>

		<li class="box"><a href="page2.php?table=<?=$table?>&page=<?=($blockEnd+1)?>">▶</a></li>

<?}?>



<div class="create_btn">



<a href="page2_1_create.php">글쓰기</a>

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
