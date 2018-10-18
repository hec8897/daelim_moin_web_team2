<?php

include_once $_SERVER['DOCUMENT_ROOT']."/inc/conn.inc";

$conn = getConnection();


$m_id = $_REQUEST['m_id'];
$m_pw = password_hash($_REQUEST['m_pw'], PASSWORD_DEFAULT);
$m_name = $_REQUEST['m_name'];
$m_tname = $_REQUEST['m_tname'];
$m_image_temp = $_FILES['m_image']['name'];
$m_image = preg_replace('/\s+/', '-', $m_image_temp);
$m_image = iconv("utf-8", "EUC-KR", $m_image);
$default_dir = '/img/m_image';
$upload_dir = $_SERVER['DOCUMENT_ROOT'].'/img/m_image';
$allowed_ext = array('jpg','jpeg','png','gif');

if ($m_image) {
	$error = $_FILES['m_image']['error'];
	$filename = $_FILES['m_image']['name'];
	$file_explode = explode('.', $filename);
	$file_ext = array_pop($file_explode);

	// $origin_filename = join(".", (array)$file_ext);
	// $_FILES['m_image']['name'] = iconv("UTF-8", "cp949", $origin_filename.".".$file_ext);

	// if (empty($_FILES['m_image']['name'])) {
	// 	$_FILES['m_image']['name'] = mb_convert_encoding($origin_filename.".".$file_ext, "EUC-KR");
	// }

	// $m_image = preg_replace('/\s+/', '-', $m_image);
	$upload_filename = "$m_id"."_"."$m_image";


	if( $error != UPLOAD_ERR_OK ) {
		switch( $error ) {
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
			case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
			default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
		}
		exit;
	}
	if (!in_array($file_ext, $allowed_ext)) {
		?>
		<script type='text/javascript'>
			alert('<?php echo "허용되지 않는 확장자 입니다.(jpg, jpeg, png, gif)" ?>');
			history.back();
		</script>
		<?php
		exit;
	}

	// $upload_filename = iconv("UTF-8", "EUC-KR", $_FILES['m_image']['name']);
	$upload_filename = iconv("UTF-8", "EUC-KR", $upload_filename);
	move_uploaded_file($_FILES['m_image']['tmp_name'], "$upload_dir/$upload_filename");

}


if (!$m_id) {
	?>
	<script type='text/javascript'>
		alert('<?php echo "아이디가 입력되지 않았습니다." ?>');
		history.back();
	</script>
	<?php
	break;
}elseif (!$m_pw) {
	?>
	<script type='text/javascript'>
		alert('<?php echo "비밀번호가 입력되지 않았습니다." ?>');
		history.back();
	</script>
	<?php
	break;
}elseif (!$m_name) {
	?>
	<script type='text/javascript'>
		alert('<?php echo "이름이 입력되지 않았습니다." ?>');
		history.back();
	</script>
	<?php
	break;
}elseif (!$m_tname) {
	?>
	<script type='text/javascript'>
		alert('<?php echo "팀이름이 입력되지 않았습니다." ?>');
		history.back();
	</script>
	<?php
	break;
}


if ($m_image) {
	$upload_filename = iconv("EUC-KR", "utf-8", $upload_filename);
	$regi_sql = "INSERT INTO `member_tb` (`m_num`, `m_id`, `m_pw`, `m_name`,`m_tname`, `m_image`) VALUES (NULL, '$m_id', '$m_pw', '$m_name', '$m_tname', '$default_dir/$upload_filename')";

}else{

	$regi_sql = "INSERT INTO `member_tb` (`m_num`, `m_id`, `m_pw`, `m_name`,`m_tname`, `m_image`) VALUES (NULL, '$m_id', '$m_pw', '$m_name', '$m_tname', '$default_dir/default.png')";

}


$regi_query = mysqli_query($conn, $regi_sql);
if ($regi_query) {
	?>
	<script type='text/javascript'>
		alert('<?php echo($m_id.'님 반갑습니다!<br>회원가입이 정상적으로 완료되었습니다.') ?>');
		location.href = 'index.php';
	</script>
	<?php
}else{
	?>
	<script type='text/javascript'>
		alert('<?php echo('회원가입을 실패하였습니다.') ?>');
		location.href = 'index.php';
	</script>
	<?php
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
