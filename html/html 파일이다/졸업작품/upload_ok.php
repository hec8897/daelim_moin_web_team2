<?php 

$upload_dir = '/img/m_image';
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');

//error check
if (!isset($_FILE['m_image']['error'])) {
	echo json_decode(array(
		'status' => 'error',
		'message' => '파일이 첨부되지 않았습니다.'
	));
	exit;
}
$error = $_FILE['m_image']['error'];
if ($error != UPLOAD_ERR_OK) {
	switch ($error) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
		$message = "파일이 너무 큽니다. ($error)";
		break;
		case UPLOAD_ERR_NO_FILE:
		$message = "파일이 첨부되지 않았습니다. ($error)";
		break;		
		default:
		$message = "파일이 제대로 업로드 되지 않았습니다. ($error)";
	}
	echo json_encode( array(
		'ststus' => 'error',
		'message' => $message
	));
	exit;
}
//variable check
$name = $_FILE['m_image']['name'];
$ext = array_pop(explode('.', $name));

//ext check
if (!in_array($ext, $allowed_ext)) {
	echo json_encode(array(
		'status' => 'error',
		'message' => '허용되지 않는 확장자 입니다.'
	));
	exit;
}

//move file
move_uploaded_file($_FILES['m_image']['tmp_name', $upload_dir/$name);

//file info disp
echo json_encode(array(
	'status' => 'OK',
	'name' => $name,
	'ext' => $ext,
	'type' => $_FILES['m_image']['type'],
	'size' => $_FILES['m_image']['size']
));


?>