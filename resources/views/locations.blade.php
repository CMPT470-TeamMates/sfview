
<html>
<body style="background-color: antiquewhite">

<div class="formDiv">
  <form action="./panoramaInfo/panoramaUpload.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>All Panoramas</legend>
      <div class="form-group row">

      
        <?php
        /*
          define("DBNAME", "sfview");
          define("DBPASS", "pass");
          $connString = "mysql:host=localhost;dbname=sfview";

          $user = DBNAME;
          $pass = DBPASS;
          $pdo = new PDO($connString,$user,$pass);

          $sql = "SELECT * FROM locations";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $number_of_rows = $stmt->rowCount();
          if ($number_of_rows == 0){
            $pages = 0;
          }else{
            $pages = ($number_of_rows - 1) / 10 + 1;
            $pages = (int)$pages;
            if (isset($_GET["page"])){
              $page  = $_GET["page"];
            } else {
              $page=1;
            };
            $start_from = ($page-1) * 10;
            $sql = "SELECT * FROM locations LIMIT $start_from, 10";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($next = $stmt->fetch())
            {
              $current = $next;
              echo '<a href="./panoramaInfo/panoramaSearch.php?location='.$next["location"].'">'.$next["location"].'</a> <br>';
            }
            echo "<br>";
            echo "<a href='./panoramaList.php?page=1'>".'|<'."</a> "; // first page
            for ($i=1; $i<=$pages; $i++) {
              echo "<a href='./panoramaList.php?page=".$i."'>".$i."</a> ";
            };
            echo "<a href='./panoramaList.php?page=$pages'>".'>|'."</a> "; // last page
          }

          //test:
*/
         ?>
      </div>
    </fieldset>
  </div>

<!-- php logic (put in panoramaUpload.php): image is added to db, we retrieve image from db and create
a panorama. we show this panorama to the user and ask them to add markers -->

<!-- once this form has been submitted, user should be directed to markerForm.php -->

</body>


</html>