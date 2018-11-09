<!-- for checks: make sure file is an image, and that it is the correct size (?)

logic: upload image into db. user should then be redirected to markerForm.php

-->

<?php
/**
 * Created by PhpStorm.
 * User: Gavin
 * Date: 2018-10-30
 * Time: 12:06 AM
 */



// DataBase Table:
/*
CREATE TABLE `pan` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(255) NOT NULL,
`location` varchar(255) NOT NULL,
`dirction` varchar(255) NOT NULL UNIQUE,
PRIMARY KEY (`id`),
FOREIGN KEY (`username`) REFERENCES `user`(`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

CREATE TABLE `marker` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`longitude` varchar(255),
`latitude` varchar(255),
`name` varchar(255) NOT NULL,
`info` varchar(255),
`loaction` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8


 */
 session_start();
 $target_dir = "/panoramas/";
 $target_file = $_SERVER['DOCUMENT_ROOT'].$target_dir.basename($_FILES["pan"]["name"]);
 $uploadOk = 1;
 // Check if image file is a actual image or fake image
 //if(isset($_POST["submit"])) {
     //$check = getimagesize($_FILES["pan"]["tmp_name"]);
     //if($check !== false) {
     //    echo "File is an image - " . $check["mime"] . ".";
     //    $uploadOk = 1;
   //  } else {
     //    echo "File is not an image.";
   //      $uploadOk = 0;
   //  }
   //  if (file_exists($target_file)) {
   //      echo "Sorry, file already exists.";
   //      $uploadOk = 0;
   //  }
     // Check file size
     echo $_SESSION["username"];
     if ($_FILES["pan"]["size"] > 500000) {
         echo "Sorry, your file is too large.";
         $uploadOk = 0;
     }
     if ($uploadOk == 0) {
         echo "Sorry, your file was not uploaded.";
 // if everything is ok, try to upload file
     } else {
         if (move_uploaded_file($_FILES["pan"]["tmp_name"], $target_file)) {
             echo "The file ". basename( $_FILES["pan"]["name"]). " has been uploaded.";

             $connString = "mysql:host=localhost;dbname=bookcrm";
             $user = DBNAME;
             $pass = DBPASS;
             $pdo = new PDO($connString,$user,$pass);
             $username = $_SESSION['username'];
             $location = $_POST['location'];
             $sql = "INSERT INTO location(username, location, dirction)
                 VALUES(:username, :location, :dir)";
             $stmt = $pdo->prepare($sql);
             $stmt->bindValue(":username", $username);
             $stmt->bindValue(":location", $location);
             $stmt->bindValue(":dir", $target_file); //dir is path of the file
             $stmt->execute();
         } else {
             echo "Sorry, there was an error uploading your file.";
         }
     }
 //}
