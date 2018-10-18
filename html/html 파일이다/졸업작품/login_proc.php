<?php

include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";

$conn = getConnection();

$m_id = $_REQUEST['m_id'];
$m_pw = $_REQUEST['m_pw'];

$check = "SELECT * FROM member_tb WHERE m_id = '$m_id'";
$check_query = mysqli_query($conn, $check);
$check_result = mysqli_fetch_array($check_query);

if ($check_result) {
	//아이디가 존재하면 다음으로 진행
	if (password_verify($m_pw, $check_result['m_pw'])) {
		//비밀번호까지 일치 하면
		//세션으로 아이디와 비밀번호를 넘겨줌
		session_start();
		$_SESSION['m_id'] = $m_id;
		$_SESSION['m_pw'] = $m_pw;


		// echo "
		// <script type='text/javascript'>
		// alert('$m_id님 어서오세요!');
		// location.href = 'index.php';
		// </script>
		// ";

		?>

		<script type='text/javascript'>
		alert('<?php echo($m_id.'님 어서오세요!') ?>');
		location.href = 'index.php';
		</script>


		<?php

	}else{
		//비밀번호가 일치하지 않다면
		//비밀번호가 일치하지 않는다는 경고창 출력
		echo "
		<script type='text/javascript'>
		alert('비밀번호가 일치하지 않습니다.');
		location.href = 'index.php';
		</script>";

	}

}else{
	//같은아이디가 존재하지 않을 때

	echo "
	<script type='text/javascript'>
	alert('존재하지 않는 아이디 입니다.');
	location.href = 'index.php';
	</script>";

}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

</body>
</html>
