<?php

include "config/db.php";

$db= new DB();

if(isset($_POST['registeruser']) && $_POST['registeruser']=="true"){
  if(!empty($_POST['username']) && !empty($_POST['userpassword']) && !empty($_POST['useremail']) && !empty($_POST['usercontact'])){
    $userregdate=date("Y-m-d H:i:s");
    $result=$db->registerUser($_POST['username'], $_POST['userpassword'], $_POST['useremail'], $_POST['usercontact'], $userregdate);
    if($result>0){
      echo "success";
    }else{
      echo "error";
    }
  }
}