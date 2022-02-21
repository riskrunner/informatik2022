<!DOCTYPE html>
<html>





<?php
$isLogedIn = FALSE;
$curName = "";
?>



<title>KSL-Leihbibliothek</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey w3-content" style="max-width:1600px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="websiteicon.png" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Ausleihe</b></h4>
  </div>
  <div class="w3-bar-block">
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Sortiment</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>Sign in</a>
    <a href="https://www.tu.berlin/ub/" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i></i>Universitäts-Bibliothek</a>
    <a href="ausleihen.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i></i>Ausleihen</a>
    <a href="reservieren.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i></i>Reservieren</a>
  </div>
  
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>Featured Media/Bestand:</b></h1>

    <div class="w3-section w3-bottombar w3-padding-16">
      <form action="etst.php" method="GET" id="search_frm">
        <span class="w3-margin-right">Filter:</span> 
        <button type="submit" class="w3-button w3-black" name="All_filter" ></i>ALL</button>
        <button type="submit" class="w3-button w3-white" name="Book_filter" ><i class="fa fa-diamond w3-margin-right"></i>Books</button>
        <button type="submit" class="w3-button w3-white w3-hide-small" name="DVD_filter" ><i class="fa fa-photo w3-margin-right"></i>DVD</button>
        <button type="submit" class="w3-button w3-white w3-hide-small" name="CD_filter" ><i class="fa fa-map-pin w3-margin-right"></i>CD</button>
        <button type="submit" class="w3-button w3-white w3-hide-small" name="Film_filter" ><i class="fa fa-photo w3-margin-right"></i>Film</button>
        <button type="submit" class="w3-button w3-white w3-hide-small" name="ZS_filter" ><i class="fa fa-map-pin w3-margin-right"></i>Zeitschrift</button>
        <input type="text" style="height: auto;" name="search_trm" placeholder="suchen">
        <button class="w3-button w3-black">Search</button>
      </form>
    </div>
    
    </div>
  </header>
  
  <?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $DBname = "leihbuechereimysqldb";

    $conn = new mysqli($servername, $username, $password, $DBname);

    if ($conn->connect_error){
        die("Error connecting to server: " . $conn->connect_error);
    }
    #echo "connection established";
    if(isset($_GET['search_trm']) && $_GET['search_trm'] !== ''){
      $search_trm=$_GET['search_trm'];
    }
    else{$search_trm = '';}

    $sqlBestandSearch = "SELECT * FROM `tabellebuechereibestand` WHERE INSTR(NameObj, '$search_trm')>0";

    if(isset($_GET['All_filter'])){
      $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE INSTR(NameObj, '$search_trm')>0";
    }
    if(isset($_GET['Book_filter'])){
      $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE (INSTR(NameObj, '$search_trm')>0 AND ObjTyp = 1)";
    }
    if(isset($_GET['DVD_filter'])){
      $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE (INSTR(NameObj, '$search_trm')>0 AND ObjTyp = 5)";
    }
    if(isset($_GET['CD_filter'])){
      $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE (INSTR(NameObj, '$search_trm')>0 AND ObjTyp = 3)";
    }
    if(isset($_GET['Film_filter'])){
      $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE (INSTR(NameObj, '$search_trm')>0 AND ObjTyp = 4)";
    }
    if(isset($_GET['ZS_filter'])){
      $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE (INSTR(NameObj, '$search_trm')>0 AND (ObjTyp = 6 OR ObjTyp = 2))";
    }

    if($result = $conn->query($sqlBestandSearch)){
        if($result->num_rows>0){
            #first photo grid
            echo "<div class=\"w3-row-padding\">";
            while($row=$result->fetch_array()){
              $ObjTyp=(int)$row['ObjTyp'];
              $sqlMedium = "SELECT NameMedienArt FROM `tabellemedienarten` WHERE IDMedienArt=$ObjTyp";
              $QueryOutput = $conn->query($sqlMedium);
              $QOArray = $QueryOutput->fetch_array();
              $ResObjTyp = $QOArray['NameMedienArt'];
              $sqlBoolleih = "SELECT IsAusleihbar FROM `tabellemedienarten`WHERE IDMedienArt=$ObjTyp";
              $Boolleih = $conn->query($sqlBoolleih);
              $QBoolleih = $Boolleih->fetch_array();
              #echo "<img src=\" " . $row['NameObj'] . ".jpg\" alt=\" " . $row['NameObj'] . "\" style=\"width:45%;\" class=\"w3-round\">" ;
              echo "<div class=\"w3-third w3-container w3-margin-bottom\">";
                echo "<img src=\"" . $row['NameObj'] . ".jpg\" alt=\" ". $row['NameObj'] . " \" style=\"height=100px; width:100%; object-fit:cover;\" height=\"500px\"  class=\"w3-hover-opacity\">";
                echo "<div class=\"w3-container w3-white\">";
                echo "<p><b>" . $row['NameObj'] . "</b></p>";
                echo "<p>". $ResObjTyp . "</p>";
                if(($QBoolleih['IsAusleihbar'] == 1 and $row['ObjLeihStatus'] == 0) and $row['ObjResStatus'] == 0){
                  echo "<form method=\"get\" action=\"ausleihen.php\">";
                  echo "<button href=\"ausleihen.php\" name=\"leihbtn_" . $row['IDObj'] . "\" type=\"submit\" class=\"w3-button w3-black\">Ausleihen</button><t>";
                  echo "</form>";
                } else{
                  echo "<button class=\"w3-button w3-gray\">Ausleihen</button><br>";
                }
                if($QBoolleih['IsAusleihbar'] == 1 and $row['ObjResStatus'] == 0){
                  echo "<form method=\"get\" action=\"reservieren.php\">";
                  echo "<button name=\"resbtn_" . $row['IDObj'] . "\" type=\"submit\" class=\"w3-button w3-black\">Reservieren</button>";
                  echo "</form>";
                } else{
                  echo "<button class=\"w3-button w3-gray\">Reservieren</button>";
                }
                echo "</div>";
              echo "</div>";
            }
            echo "</div>";
        }
      }
?>

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
    <div class="w3-third">
      <h3>FOOTER</h3>
      <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
    </div>
  
    <div class="w3-third">
      <h3>NEWS</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="websiteicon.png" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Lorem</span><br>
          <span>Sed mattis nunc</span>
        </li>
        <li class="w3-padding-16">
          <img src="websiteicon.png" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Ipsum</span><br>
          <span>Praes tinci sed</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third">
      <h3>Contact us</h3>
      <h5>jk pls dont</h5>
      <p>
        email@email.com
        374074807992
        Berlin, GERMANY
      </p>
    </div>

  </div>
  </footer>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
