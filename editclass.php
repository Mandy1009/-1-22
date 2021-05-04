<?php
$link = mysqli_connect("localhost","root","","project","3306");
$result = mysqli_query($link,"set names utf8");
// require_once "db.php";
// $id = $_GET["id"];
$sql = <<<sqlStatement
select cName, cPrice, cDescribe, cPic,cID
from class
sqlStatement;


$result = mysqli_query($link, $sql);
$resulta = mysqli_query($link, $sql);
// var_dump($result);


if (isset($_POST["okButton"])) {
  $sql= <<<Statement
  update class
  set cName = '{$_POST["cName"]}',
  cprice = '{$_POST["cprice"]}',
  cDescribe = '{$_POST["cDescribe"]}'
  WHERE cID  = '3'
  Statement;
  
  $result = mysqli_query($link, $sql);
  header("location: class.php");
  exit("");
}
// 只可以改第三筆

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="icon" href="./img/logoicon-32.ico" type="ico">
    <style>
        @import url(projectcss.css);
        @import url(class.css);
        @import url('https://fonts.googleapis.com/css2?family=Allura&display=swap&family=Noto+Serif+TC:wght@200&display=swap&family=Fraunces&display=swap&family=Homemade+Apple&display=swap');

    #cName{
      width:100%;
    }

    #cDescribe{
      width:100%;
      height:20vh;
    }
    #formset{
      border:none;
      background-color:#FCF7F8;
      width:100%;
      height:100vh;
     
    }   
    #okButton{
      position:relative;
      top:-100px;
     
    }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="./project.js" type="text/javascript" defer></script>
    <!-- <script src="./zoom.js" type="text/javascript"></script> -->
    <script src="https://use.fontawesome.com/b4547aa58e.js"></script>

</head>

<body>
<div id="header">




</div>
  
    <div class="container">
    <form id="formset" method="post" action="">
        <div class="card-columns cardsIn ">

         
        
        <?php while( $row = mysqli_fetch_assoc($result)): ?> 
              <input type="hidden" name="cID" value="<?= $row["cID"]?>">
            <div class="card ">
             <img class="card-img-top" src="./img<?= $row["cPic"]?>" alt="class01">
                
              <div class="card-body">
                
                <input id="cName" class="card-title" name="cName" value="<?= $row["cName"]?>" type="text" placeholder="">
                    
                   
                     <p> NT$<input id="cprice" name="cprice" value="<?= $row["cPrice"]?>"  type="text" placeholder=""></p>

                    <p class="card-text">
                    <textarea id="cDescribe" name="cDescribe" value=""  ><?= $row["cDescribe"]?></textarea>
                    </p>
                    
                    
              </div>
            </div>
      <?php endwhile; ?>       
            
           








      </div>  <button id="okButton"  name="okButton"  >UPDATE</button>
      </form> 
        
    </div>
    
    

</body>
</html>