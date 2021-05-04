<?php
$link = mysqli_connect("localhost","root","","project","3306");
$result = mysqli_query($link,"set names utf8");
// require_once "db.php";
$sql = <<<sqlStatement
select cName, cPrice, cDescribe, cPic
from class
sqlStatement;

$result = mysqli_query($link, $sql);
$resulta = mysqli_query($link, $sql);
// var_dump($result);


if ( isset($_POST["okButton"]) ){
   
  $sql = <<<sqlStatement
  insert into studentList 
    (sName, sEmail, sTel, sClass) 
    values 
    ('{$_POST["sName"]}', '{$_POST["sEmail"]}', '{$_POST["sTel"]}', '{$_POST["sClass"]}');
  sqlStatement;
  
  $result = mysqli_query($link, $sql);
 
  
  echo "<script>alert('報名成功！請確認下方報名資料');</script>";
  $url = "classok.php";
  echo "<script>window.location.href='$url';</script>";
  exit("");
  }

$cfm = mysqli_query($link, "SELECT * FROM `studentlist` ORDER BY sID DESC LIMIT 0,1");
// $latest= mysqli_num_rows($cfm); //總報名筆數

// $edit =<<<edsql
// select sName, sEmail, s.sClass, pName from pj_class as p join studentlist s on s.sClass = p.pId
// edsql;

// if (isset($_POST["cfmButton"])) {
//     $cfmsql = <<<sqlCommand
//       update studentlist set 
//       sName = '{$_POST["sName"]}',
//       sEmail = '{$_POST["sEmail"]}',
//       sTel = '{$_POST["sTel"]}',
//       cName = '{$_POST["cName"]}'
//       where employeeId = {$_POST["employeeId"]}
//    sqlCommand;
//    // echo $sql;
//    mysqli_query($link, $cfmsql);
//    header("Location: index.php");
//    exit();
// }
$sqlClass = "select * from pj_class";
$resultClass = mysqli_query($link, $sqlClass);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class</title>
    <link rel="icon" href="./img/logoicon-32.ico" type="ico">
    <style>
        @import url(projectcss.css);
        @import url(class_o.css);
        @import url('https://fonts.googleapis.com/css2?family=Allura&display=swap&family=Noto+Serif+TC:wght@200&display=swap&family=Fraunces&display=swap&family=Homemade+Apple&display=swap');

        

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

<nav>


    <span style="color: white;" id="brbar" onclick="nav()">
        <i class="fa fa-bars" aria-hidden="true"></i></span>


    <div><img id="iconnav" src="./img/slogo-normal.png" alt=""></div>
    <div  id="navDiv">
        <ul class="dropDown-menu">
            <li> <a href="index.html">HOME</a> </li>
            <li> <a href="about.html"> ABOUT</a>
                <!-- <ul class="sec-menu">
                    <li><a href="about.html">Copperplate</a></li>
                    <li><a href="#">Spencerian </a></li>
                    <li><a href="#">Gothic</a> </li>
                </ul> -->
            </li>
            <li> <a href="gallery.html">GALLERY</a>
            </li>
            <li><a href="class.php">CLASS</a></li>
        </ul>
    </div>
</nav>

<div class="h1"></div>
</div>
  
    <div class="container">
        <div class="card-columns cardsIn ">

            <?php while( $row = mysqli_fetch_assoc($result)): ?>
            <div class="card ">
            <img class="card-img-top" src="./img<?= $row["cPic"]?>" alt="class01">
                
                <div class="card-body">
                    <h5 class="card-title"> 【體驗】英文書法 <?= $row["cName"]?></h5>
                    <span>NT$ <?= $row["cPrice"]?>起</span>
                    <p class="card-text">
                    <?= $row["cDescribe"]?></p>
                    <a href="#" class="btn">報名此課程</a>
                </div>
            </div>
            <?php endwhile; ?>
           

        </div>
    </div>
    <div class="form-bg" >
        <form id="cfm_list" method="post" action="">
        <h4>報名成功！</h4>
        <h6> 以下為您的報名資料：</h6>
          <p>
                <ul>
                
                <?php $rowk = mysqli_fetch_assoc($cfm) ?>
                <?php $row = mysqli_fetch_assoc($resulta)?>
                    <li>姓名:  </li> 
                    <li><?= $rowk["sName"]?></li>
                    <li>Email: </li>
                    <li><?= $rowk["sEmail"]?></li>
                    <li>聯絡電話: </li>
                    <li><?= $rowk["sTel"]?></li>
                    <li>報名課程:  </li>
                    <li>【體驗】英文書法<?= $row["cName"]?></li>
                      
                </ul>
                <!-- <p class="cfbtn"><input class="subbtn" type="submit" name="cfmButton"></p> -->
          </p>
            </form>    

        <form class="registration_form" method="post" action="">
        
        <fieldset>
                <legend>報名資料</legend>
                <label for="username">姓名: </label><br>
                <input type="text" id="username" name="sName" required>
                <br>
                <br>
                <label for="usermail">Email: </label><br>
                <input type="email" id="usermail" name="sEmail" required>
                <br>
                <br>
                <label for="userphone">聯絡電話: </label><br>
                <input type="tel" id="userphone"  name="sTel" required>
                <br>
                <br>
                <p>
                    <select name="sClass">
                        <option disabled>請選擇欲報名課程</option>
                        <option value="basic">【體驗】英文書法 基礎班</option>
                        <option value="advanced">【體驗】英文書法 進階班</option>
                        <option value="abclass">【體驗】英文書法 基礎班+進階班</option>
                    </select>
                </p>

                <p> <input class="subbtn" type="submit" name="okButton"></p>
            </fieldset>
        </form>
                

    </div>
    <a href="login.php" id="admin_login"> Admin </a>

    <footer>
        <div class="copyright">Copyright &copy; All rights Reserved. Designed by <a href="mailto:goooday@gmail.com"
                target="_blank">Good
                Day</a></div>
        </div>
        <!-- mt-auto -->

        <span style="color: white;">

            <a href="https://www.facebook.com/" target="_blank">
                <i class="fa fa-facebook-square fa-2x " aria-hidden="true">
                </i>
            </a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram fa-2x"
                    aria-hidden="true"></i></a>
            <a href="https://twitter.com/?lang=zh-tw" target="_blank"><i class="fa fa-twitter-square fa-2x "
                    aria-hidden="true"></i></a>
        </span>
    </footer>
</body>

</html>