<?php

include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";

$conn = getConnection();

$m_id = $_REQUEST['m_id'];
$idcheck = "SELECT * FROM member_tb WHERE m_id = '$m_id'";
$idcheck_query = mysqli_query($conn, $idcheck);
$idcheck_result = mysqli_fetch_array($idcheck_query);
if ($idcheck_result) {
	echo "<p>중복된 아이디 입니다.</p>";
}else{
	echo "<p>사용가능한 아이디 입니다.</p>";
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script>
	 $("html").keyup(function(e){
		 if (e.keyCode==13){
			{
				// $("html").css({"background":"black"});
				window.close();

		 }
	 }
 })

	 </script>
	 <style media="screen">
	 *{
	 	margin: 0px;
		padding: 0px;
	 }
	 body{
	 	background-color: #1b2d43;
	 }
	 	p{
			max-height: 100px;
	 		font-weight: bold;
			color: white;
			text-align: center;
			margin-top: 10%;
	 	}
		button{
			height: 30px;
			width: 40%;
			margin: 0px auto;
			display: block;
			border: none;
			background-color: red;
			color: white;
			margin-top: 5%;
		}
	 </style>
 	<meta charset="utf-8">
 	<title>아이디 중복체크</title>
 </head>
 <body>
 	<button value="closewindow" onclick="window.close()">닫기</button>
 </body>
 </html>
