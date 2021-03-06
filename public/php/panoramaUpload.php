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
CREATE TABLE `locations` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(255) NOT NULL,
`location` varchar(255) NOT NULL,
`filename` varchar(255) NOT NULL,
`dirction` varchar(255) NOT NULL UNIQUE,
PRIMARY KEY (`id`),
FOREIGN KEY (`username`) REFERENCES `user`(`username`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

CREATE TABLE `marker` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL,
`location` varchar(255),
`longitude` varchar(255),
`latitude` varchar(255),
`info` varchar(255),
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8

 */
 session_start();
//  echo "start";
 //$files = multiple($_FILES);
//print_r($files);
//  echo $_FILES['pan']['name'];
 $target_dir = "/panoramas/";
 $target_file = $_SERVER['DOCUMENT_ROOT'].$target_dir.basename($_FILES['pan']['name']);
//  echo $target_file;
 $uploadOk = 1;

 /*
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
  */

  try {
      if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.<br>";
          echo '<a href="../">Return</a>';
          // if everything is ok, try to upload file
      } else {
          if (1) { // used to be session logic but we lost sessions (sorry gavin), might be able to do something with $auth here

              $connString = "mysql:host=localhost;dbname=sfview";
              $user = "sfview_user";
              $pass = "pass";
              $pdo = new PDO($connString, $user, $pass);

            //   $username = $_SESSION['username'];
              $location = $_POST['location'];

              $sql = "SELECT * FROM locations WHERE location = :location";
              $astmt = $pdo->prepare($sql);
              $astmt->bindValue(":location", $location);
              $astmt->execute();
              $arow = $astmt->fetch();
              if ($arow['id']) {
                  echo "This location's photosphere already exists <br>";
                  echo '<a href="/">Return</a>';
              } else {
                  //$D = md5(time() . 'daxin');
                  $filetype = strrchr($_FILES['pan']['name'], ".");
                  //$newname = $D . $filetype;
                  $newname = $_FILES['pan']['name'];
                  $diction = $_POST['diction'];
                  if (file_exists($target_file)) {
                      echo "cannot upload it now because there is another file with the same name";
                      echo '<a href="/">Return</a>';
                  } else {
                      if (move_uploaded_file($_FILES["pan"]["tmp_name"], $target_file)) {
                          $sql = "INSERT INTO locations(location, filename, dirction)
                     VALUES(:location, :filename, :dir)";
                          $stmt = $pdo->prepare($sql);
                          $stmt->bindValue(":location", $location);
                          $stmt->bindValue(":filename", $newname);
                          $stmt->bindValue(":dir", $diction); //dir is path of the file
                          $stmt->execute();

                          //add the markers
                        //   $MarkerNumber = $_POST['number'];
                        //   if ($MarkerNumber != 0) {
                        //       for ($i = 0; $i < $MarkerNumber; $i++) {
                        //           $sql = "INSERT INTO marker(name, location)
                        //  VALUES(:name, :location)";
                        //           $bstmt = $pdo->prepare($sql);
                        //           $marker = $_POST['Marker'];
                        //           if ($marker != "") {
                        //               $bstmt->bindValue(":name", $marker[$i]);
                        //               $bstmt->bindValue(":location", $location);
                        //               $bstmt->execute();
                        //           }
                        //       }
                        //   }
                          echo "The file " . basename($_FILES["pan"]["name"]) . " has been uploaded.";
                          echo '<br> <a href="../">Return</a>';
                      } else {
                          echo "Sorry, there was an error uploading your file. <br>";
                          echo '<a href="/">Return</a>';
                      }
                  }
              }


              /*
              //$filesdata = file_get_contents($_FILES["pan"]["tmp_name"]);
              //$file = addslashes($filesdata);
              $username = $_SESSION['username'];
              $location = $_POST['location'];
              $type = $_FILES['pan']['type'];
              $sql = "INSERT INTO locations(username, location, data, type)
                 VALUES(:username, :location, :dat, :type)";
              $stmt = $pdo->prepare($sql);
              $stmt->bindValue(":username", $username);
              $stmt->bindValue(":location", $location);
              //$stmt->bindValue(":dir", $target_file); //dir is path of the file
              $stmt->bindValue(":dat", $file); //dat is data of the file
              $stmt->bindValue(":type", $type);
              $stmt->execute(); */
          } else {
              echo "Sorry, pleas log in first <br>";
              echo '<a href="../">Return</a>';
          }
      }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
     //}
 //}
