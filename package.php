<?php
session_start();
$email = $_SESSION["email"];
// echo $email;
$pid = intval($_GET['pkgid']);


$conn = mysqli_connect('localhost','admin','admin1234','Tour');

if(!$conn){
    echo "Connection Error".mysqli_connect_error();
}
// $package = $_POST['pac'];

$sql1 = "SELECT * FROM tbltourpackages WHERE PackageId= $pid";

$result1 = mysqli_query($conn, $sql1);

$packages = mysqli_fetch_all($result1, MYSQLI_ASSOC);

// print_r($packages);
$package_name = $packages[0]['PackageName'];
$package_price = $packages[0]['PackagePrice'];
$package_details = $packages[0]['PackageDetails'];
$package_image = $packages[0]['PackageImage'];

if(isset($_POST['sub'])){
    $conn = mysqli_connect('localhost','admin','admin1234','Tour');

    if(!$conn){
        echo "Connection Error".mysqli_connect_error();
    }
    // $package = $_POST['pac'];

    $sql = "INSERT INTO tblbooking (UserEmail,package) VALUE ('{$_SESSION["email"]}','{$package_name}')";

    echo $package_name;

    $result = mysqli_query($conn, $sql);

    // $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // mysqli_free_result($result);

    mysqli_close($conn);
    header('Location: show_pack.php');
}
?>


<html>
    <head><link rel="stylesheet" href="/CSS/package.css">
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
<form method="POST">
<!--NAME OF THE PLACE AND THE PACKAGE  NAME-->
<div class="center">
<!-- <p class="text-center"  style="font-size:15px;"><b>Himachal Pradesh</b></p> -->
  <h1 class="text-center" style="font-size:50px;"><b><?php echo $package_name;?></b></h1>
</div>
<!--DURATION OF THE PACKAGE-->
<div class="alert alert-light text-center" role="alert"  style="font-size:20px;"><b>5 Nights / 6 Days </b></div>

<div class="price">
<div class="text-center"><!--PACKAGE PRICE-->
<sub>STARTING FROM </sub><b style="font-size:35px;">INR <?php echo $package_price;?></b><sub>per person on twin sharing.<sub>&nbsp &nbsp &nbsp &nbsp &nbsp

<button type="submit" class="btn btn-danger" style="height:40px;width:120px;font-size:15px;" name="sub" ><b>Book Now</b></button>
<button type="button" class="btn btn-secondary" style="height:40px;width:120px;font-size:15px;"><b>Submit Query</b></button>
</div>


</div>
</form>

<!--SLIDER IMAGE-->
<div class="card" style="width: 100%;height:70%">
  <div class="card-body">
  <div id="myCarousel">
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="data:image/jpeg;base64,<?php echo base64_encode( $package_image); ?>" width='75' height='800' />
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Images/m2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="Images/m3.jpg" alt="Third slide">
    </div>
  </div>
</div>
</div>
  </div>
</div>



<!-- SAME FOR ALL PAGES-->
<div class="row">
    <div class="col-md-6">
        <div class="card" style="height:120%">
            <div class="card-body">
               <h2><b>Inclusions:</b></h2><br>
               <table>
                 <tr>
                   <td>
                 <table>
                 <tr><td style="text-align: center; vertical-align: middle;"><i class="fas fa-plane"></i></td><tr>
                  <tr><td>Flight</td></tr>
                 </table>
                </td>
                <td>&nbsp&nbsp&nbsp&nbsp</td>
                <td>
               <table>
                 <tr><td style="text-align: center; vertical-align: middle;"><i class="fas fa-hotel"></i></td><tr>
                  <tr><td>Accomodation</td></tr>
                 </table>
                </td>
                <td>&nbsp&nbsp&nbsp&nbsp</td>
                <td>
                 <table>
                 <tr><td style="text-align: center; vertical-align: middle;"><i class="fas fa-bus"></i></td><tr>
                  <tr><td>Volvo</td></tr>
                 </table>
                </td>
                <td>&nbsp&nbsp&nbsp&nbsp</td>
                <td>
                 <table>
                 <tr><td style="text-align: center; vertical-align: middle;"><i class="fas fa-car"></i></td><tr>
                  <tr><td>Transfer</td></tr>
                 </table>
                </td>
                <td>&nbsp&nbsp&nbsp&nbsp</td>
                <td>
                 <table>
                 <tr><td style="text-align: center; vertical-align: middle;"><i class="fas fa-binoculars"></i></td><tr>
                  <tr><td>Sightseeing</td></tr>
                 </table>
                </td>

                </tr>
       </table> 
          
              
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card" style="height:120%">
                <div class="card-body">
                <h2><b>Themes:</b></h2><br>

                <table>
                 <tr>
                   <td>
                 <table>
                 <tr><td style="text-align: center; vertical-align: middle;"><i class="fas fa-mountain"></i></td><tr>
                  <tr><td>Adventure</td></tr>
                 </table>
                </td>
                <td>&nbsp&nbsp&nbsp&nbsp</td>
                <td>
               <table>
                 <tr><td style="text-align: center; vertical-align: middle;"><i class="fas fa-users"></i></td><tr>
                  <tr><td>Family</td></tr>
                 </table>
                </td>
                <td>&nbsp&nbsp&nbsp&nbsp</td>
                <td>
                 <table>
                 <tr><td style="text-align: center; vertical-align: middle;"><i class="fas fa-user-friends"></i></td><tr>
                  <tr><td>Friends</td></tr>
                 </table>
                </td>
                <td>&nbsp&nbsp&nbsp&nbsp</td>
                <td>
                 <table>
                 <tr><td style="text-align: center; vertical-align: middle;"><i class="fas fa-binoculars"></i></td><tr>
                  <tr><td>Sightseeing</td></tr>
                 </table>
                </td>
                <td>&nbsp&nbsp&nbsp&nbsp</td>
                <td>
                 <table>
                 <tr><td style="text-align: center; vertical-align: middle;"><i class="fas fa-shopping-bag"></i></td><tr>
                  <tr><td>Shopping</td></tr>
                 </table>
                </td>

                </tr>
</table>

                </div>
            </div>
    </div>
</div>


<!--OVERVIEW OF THE PARTICULAR PACKAGE DESTINATION-->
<div class="card" style="width: 100%;height:auto">
  <div class="card-body">
    <h2><b>Overview:</b></h2><br>
    <!-- Manali is a lovely hill station in Himachal Pradesh. A string of brilliant waterfalls, sulphur springs and monasteries only add to the ambience of this hill station. The glacial paradise of Rohtang Pass is a popular skiing destination, where you can enjoy activities in the snow even in peak summer. -->
    <?php echo $package_details; ?>
</div>
</div>


<!--OVERVIEW OF THE PLACE-->
<div class="card" style="width: 100%;height:auto">
  <div class="card-body">
    <h2><b>About Himachal Pradesh:</b></h2><br>
    Referred to as the Queen of Himachal Pradesh, Manali is an ancient town that is located at an altitude of nearly 2050 meters in Kullu district. Manali is blessed with breathtaking natural beauty that comprises lofty snow-capped peaks of Dhauladhar and Pir Panjal, thick forests, fruit orchards, beautiful hamlets and meadows that are carpeted with lovely wild flowers. Being a high altitude resort town, Manali is an all-year-round destination that offers alluring vistas. An ideal destination for Honeymooners and adventure junkies alike, the town of Manali is a mix of old and new. Being a hub of adventure activities, Manali offers enthralling escapades of skiing, paragliding, trekking, mountaineering and rafting. Get enchanted by the surrealistic snowscape of Rohtang Pass or the Snow Point. Lose yourself in the spiritual realm by paying a visit to Hadimba Temple, Vashisth Bath and Van Vi</td>
  
  </div>
</div>






</body>
</html>