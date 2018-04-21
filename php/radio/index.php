
<?php 
    include 'db_config.php';
    $sql = "SELECT name FROM countryname ORDER BY name ASC";
    $result = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $countryname[] = $row;
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Radio Station</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


    <div class="container text-center header">
        <h1>Online Radio Station</h1>
    </div>


    <div class="container">
        <div class="col-md-3">
            <ol>
<?php foreach ($countryname as $key) {?>
                <a href="index.php?name=<?php echo $key['name']; ?>"><li><?php echo $key['name']; ?></li></a>
<?php } ?>      
            </ol>
        </div>
<?php
    if (isset($_GET['name'])) {
        $name = $_GET['name'];
    } else {
        $name = 'Afghanistan';
    }

    $sql = "SELECT id,img,station FROM radio WHERE countryname = '$name'";
    
    $result = mysqli_query($con,$sql);
if (mysqli_num_rows($result)) {

    while ($row = mysqli_fetch_assoc($result)) {
        $stations[] = $row;
    }

?>


        <div class="col-md-9">

<?php foreach ($stations as $key) { ?>

            <div class="single-station col-md-3">
                <img src="<?php echo $key['img'] ; ?>">
                <a href="player.php?id=<?php echo $key['id'] ; ?>"><h3><?php echo $key['station'] ; ?></h3></a>
            </div>

<?php } } else {?>
<h1>No Station Added Yet.</h1>
<?php } ?>

        </div>

    </div>

   


    <div class="text-center footer">
        <p>Developed By <a href="http://www.facebook.com/mdmortuza.hossain">Md Mortuza Hossain</a></p>
    </div>

    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>