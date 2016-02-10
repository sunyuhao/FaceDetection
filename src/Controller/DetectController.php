<?php
require_once('../Manager/DetectManager.php');
session_start();
$detectManager = new DetectManager();
//var_dump($detectManager->person_get_info('username'));
//exit;
if(isset($_POST['image']) && !empty($_POST['image']) && isset($_POST['face'])) {

    $result = [];
    $username = $_POST['username'];
    // get the dataURL
    $dataURL = $_POST["image"];
    // the dataURL has a prefix (mimetype+datatype)
    // that we don't want, so strip that prefix off
    $parts = explode(',', $dataURL);
    $data = $parts[1];
    // Decode base64 data, resulting in an image
    $data = base64_decode($data);
    $file = '../Image/user/'.$username.'.jpg';
    file_put_contents($file, $data);

//    $faceIds = [];
//    $detect = $detectManager->detect('http://projects.dev:8080/fd/src/Image/guimin.png', $username);
//    if(isset($detect['ResultCode']) && $detect['ResultCode'] == $detectManager::DETECT_SUCCESS) {
//        if(isset($detect['FaceId'])) {
//            $result = [
//                'status'=>'success',
//                'message'=>'',
//            ];
//            return $result;
//        }
//    } else {
//        return 'detecting';
//    }

    $detectManager->person_delete($username);
    $detectManager->person_create($username);
    $detectManager->person_add_face($_POST['face']['face'][0]['face_id'], $username);

    $detectManager->group_create('user');
    $detectManager->group_add_person($username, 'user');

    $detectManager->train('user');
   
    $_SESSION["user"]=$username;

 return "success";
}

