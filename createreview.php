<?php
$hardware_id = $_POST['hardware_id'];
$username_review = $_POST['username'];
$rate = $_POST['rate'];
$review_text = $_POST['review_text'];

$servername = 'localhost';
$username = "root";
$password = "";
$dbname = "NMSTU";

$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

$sql = "INSERT INTO reviews (id_hardware, username, rating, review_text)
       VALUES ($hardware_id,'$username_review',$rate,'$review_text')";

$res = $conn->query($sql);

$conn->close();

echo $rate;

?>
