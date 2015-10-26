<?php
header("content-type:application/json");
session_start();
if(!isset($_SESSION['id'])){
	header("Location: index.html");
}

require_once 'dbaccess.php';
require_once 'functions.php';


 
$info = array(
       array
       (
            'username' => 'facingdown',
            'profile_pic' => 'img/default-avatar.png'
       ),
       array
       (
            'username' => 'doggy_bag',
            'profile_pic' => 'img/default-avatar.png'
       ),
       array
       (
            'username' => 'goingoutside',
            'profile_pic' => 'img/default-avatar.png'
       ),
       array
       (
            'username' => 'redditdigg',
            'profile_pic' => 'img/default-avatar.png'
       ),
       array
       (
            'username' => 'lots_of_pudding',
            'profile_pic' => 'img/default-avatar.png'
       ),
       'nextpage' => '#pg2'
);



  echo json_encode($info);

exit();
?>