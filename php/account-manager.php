<?php
ini_set("session.use_only_cookies", 1);
include_once($_SERVER["DOCUMENT_ROOT"]."/php/connection.php");

$data = false;

function generate_unique_id(){
    //generate random appended_id:
    $code_array = [0,1,2,3,4,5,6,7,8,9];
    shuffle($code_array);
    $code_out = "";
    
    $arr = [0,1,2,3,4,5];
    shuffle($arr);
    
    foreach($arr as $a){
        $code_out .= $code_array[$a];
    }
    
    $user_unique_id = time()."_".$code_out;
    return $user_unique_id;
}

if((isset($_COOKIE["unique_id"]))){
    $user_unique_id = htmlentities($_COOKIE["unique_id"]);

    $stmt = $pdo->prepare("SELECT * FROM customers WHERE unique_id = ? LIMIT ?, ?");
    $stmt->execute([$user_unique_id, 0, 1]);
  
    $data = $stmt->fetch(PDO::FETCH_OBJ);
} else {
    $user_unique_id = generate_unique_id();
    setcookie("unique_id", $user_unique_id,  time()+(48*3600), "/");
}

// then call 'if data(){ ... }' for all necessary dashboard related page.