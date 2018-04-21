

<!DOCTYPE html>
<html>
<head>
	<title>Old Music Website</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


<link href='https://fonts.googleapis.com/css?family=Allerta' rel='stylesheet'>
<?php
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	} else {
		$id = 1;
	}
	include 'db_config.php';

	$sql = "SELECT url FROM radio WHERE id = $id";
	$result = mysqli_query($con,$sql)->fetch_assoc();

?>

    <h2>Old Song Player</h2>
    <div class="container-audio">
        <audio controls loop>
             <source src="<?php echo $result['url'] ?>" type="audio/ogg">
                   Player Not Supported By your Browser.
        </audio>
    </div>
    <div class="container-audio">
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
    </div>


</body>
</html>