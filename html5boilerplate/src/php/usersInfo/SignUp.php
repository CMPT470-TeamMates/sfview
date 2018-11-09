<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2018-10-27
 * Time: 11:05 PM
 */


require_once 'Users.php';

try {
    $connString = "mysql:host=localhost;dbname=sfview";
    $user = DBNAME;
    $pass = DBPASS;
    $pdo = new PDO($connString,$user,$pass);
    //if (isset($_POST['SignUP'])) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $usertype = $_POST['userType'];
        if($usertype == "option1"){
          $usertype = 0;
        }else{
          $usertype = 1;
        }
        echo "<p> start </p>";
        $New_User = new Users($username, $password, $usertype);
        echo "<p> start1? </p>";
        if ($New_User->searchUsername($username, $pdo)){
            echo "<p> The Username already exists. </p>";
        }
        else if($New_User->storeDB($pdo)){
            echo "<p> Sign up Successfully! </p>";
        }else{
            echo "<p> Sign up failed. </p>";
        }
    //}
}
catch (PDOException $e) {
    die( $e->getMessage() );
    echo "<p> Database error. </p>";
}
