<!DOCTYPE html>
<html>









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
    <img src="/cat.jpg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>Ausleihe</b></h4>
    <p class="w3-text-grey">Template by W3.CSS</p>
  </div>
  <div class="w3-bar-block">
    <a href="#portfolio" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-teal"><i class="fa fa-th-large fa-fw w3-margin-right"></i>Sortiment</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-envelope fa-fw w3-margin-right"></i>Sign in</a>
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
    <h1><b>Featured Media</b></h1>

    <div class="w3-section w3-bottombar w3-padding-16">
      <form action=etst.php method="get" id=search_frm>
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

    #if(isset($GET_['All_filter'])){
    #  $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE INSTR(NameObj, '$search_trm')>0";
    #}
    #if(isset($GET_['Book_filter'])){
    #  $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE (INSTR(NameObj, '$search_trm')>0 AND ObjTyp = 1)";
    #}
    #if(isset($GET_['DVD_filter'])){
    #  $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE (INSTR(NameObj, '$search_trm')>0 AND ObjTyp = 5)";
    #}
    #if(isset($GET_['CD_filter'])){
    #  $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE (INSTR(NameObj, '$search_trm')>0 AND ObjTyp = 3)";
    #}
    #if(isset($GET_['Film_filter'])){
    #  $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE (INSTR(NameObj, '$search_trm')>0 AND ObjTyp = 4)";
    #}
    #if(isset($GET_['ZS_filter'])){
    #  $sqlBestandSearch= "SELECT * FROM `tabellebuechereibestand` WHERE (INSTR(NameObj, '$search_trm')>0 AND (ObjTyp = 6 OR ObjTyp = 2))";
    #}

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
                echo "<img src=\"C:\xampp\htdocs\test\Bilder\ " . $row['NameObj'] . ".jpg\" alt=\" ". $row['NameObj'] . " \" style=\"width:100%\" class=\"w3-hover-opacity\">";
                echo "<div class=\"w3-container w3-white\">";
                  echo "<p><b>" . $row['NameObj'] . "</b></p>";
                  echo "<p>". $ResObjTyp . "</p>";
                  if($QBoolleih['IsAusleihbar'] == 1){
                  echo "<form method=\"get\" action=\"etst.php\">";
                  echo "<button name=\"leihbtn_" . $row['IDObj'] . "\" type=\"submit\" class=\"w3-button w3-black\">Ausleihen</button><t>";
                  echo "</form>";
                  echo "<form method=\"get\" action=\"etst.php\">";
                  echo "<button name=\"res_btn\" type=\"submit\" class=\"w3-button w3-black\">Reservieren</button>";
                  echo "</form>";
                  }
                echo "</div>";
              echo "</div>";
            }
            echo "</div>";
        }
      }
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "leihbuechereimysqldb";

$conn = new mysqli($servername, $username, $password, $DBname);

$ObjId=0;
for ($x = 0; $x <= 40; $x++) {
  if(isset($_GET['leihbtn_'.$x])){
    $ObjID = $x;
    break;
  }
}

$datetoday = new DateTime();
$abgabe_datum = date_add($datetoday,date_interval_create_from_date_string("14 days"));
$Datum = date_format($abgabe_datum, 'Y-m-d');
$sqlleihinput = "INSERT INTO tabelleausleihe (IDLeihObj, IDLeihKunde, AbgabeFrist) VALUES ('$ObjId', 0, '$Datum')";

if ($conn->query($sqlleihinput) === TRUE) {
} else {
  echo "Error: " . $sqlleihinput . "<br>" . $conn->error;
}

?>

            <!-- Second Photo Grid
            <div class="w3-row-padding">
              <div class="w3-third w3-container w3-margin-bottom">
                <img src="" alt="Book" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                  <p><b>Title</b></p>
                  <p>Summary through php</p>
                </div>
              </div>
              <div class="w3-third w3-container w3-margin-bottom">
                <img src="" alt="Book" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                  <p><b>Title</b></p>
                  <p>Summary through php</p>
                </div>
              </div>
              <div class="w3-third w3-container w3-margin-bottom">
                <img src="" alt="Book" style="width:100%" class="w3-hover-opacity">
                <div class="w3-container w3-white">
                  <p><b>Title</b></p>
                  <p>Summary through php</p>
                </div>
              </div>
            </div>
            -->
          
  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-button w3-hover-black">�</a>
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="#" class="w3-bar-item w3-button w3-hover-black">�</a>
    </div>
  </div>

  
    
    
  
    
    
  
  <!-- Login -->
  <div class="w3-container w3-padding-large w3-grey">
    <h4 id="contact"><b>Sign in</b></h4>
    <h5>accounts can only be created at a library</h5>
    <hr class="w3-opacity">
    <form action="/action_page.php" target="_blank">
      <div class="w3-section">
        <label>Name</label>
        <input class="w3-input w3-border" type="text" name="alias" required>
      </div>
      
      <div class="w3-section">
        <label>Password</label>
        <input class="w3-input w3-border" type="text" name="password" required>
      </div>
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>Log in</button>
    </form>
  </div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
    <div class="w3-third">
      <h3>FOOTER</h3>
      <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>
  
    <div class="w3-third">
      <h3>NEWS</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="/w3images/workshop.jpg" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Lorem</span><br>
          <span>Sed mattis nunc</span>
        </li>
        <li class="w3-padding-16">
          <img src="/w3images/gondol.jpg" class="w3-left w3-margin-right" style="width:50px">
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
  
  <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>

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
