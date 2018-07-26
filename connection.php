<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "idclkdb";

$uemail=$_GET['email'];
$upassword=base64_encode(trim($_GET['password'])); 
echo "Login";
echo $uemail;
echo $upassword;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
	echo 'Connection Successful';
}

$sql = "SELECT * FROM `mst_user` WHERE `txt_email`='".$uemail."' AND `txt_pswd`='".$upassword."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["nbr_user_id"]. " - Name: " . $row["txt_name"];
    }
} else {
    echo "0 results";
}

$conn->close();
?> 