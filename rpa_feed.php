<?php

//Define credientials for data base
$servername = "localhost";
$username = "id15454669_peopletech";
$password = "Hellopeople@123";
$dbname = "id15454669_iot_data";

//Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

date_default_timezone_set('Asia/Kolkata');
$d = date("Y-m-d");
$t = date("H:i:s");

$first = $_REQUEST['fn'];
$last = $_REQUEST['ln'];
$gender = $_REQUEST['gn'];
$address = $_REQUEST['ad'];
$city = $_REQUEST['ct'];
$state = $_REQUEST['st'];
$home = $_REQUEST['hm'];
$work = $_REQUEST['wk'];
$personel = $_REQUEST['pm'];
$workmail = $_REQUEST['wm'];


$del = "SELECT * FROM rpa_table ORDER BY Id ASC";
$result = mysqli_query($conn,$del);


$count = mysqli_num_rows($result);

$row = mysqli_fetch_array($result);
$i = $row['Id'];

if ($count >= 30){
    $a = "delete from rpa_table where Id ='$i'";
    mysqli_query($conn,$a);
    $sql = "INSERT INTO rpa_table (First,Last,Gender,Address,City,State,Home,Work,Personal_mail,Work_Mail) VALUES ('$first','$last','$gender','$address','$city','$state','$home','$work','$personel','$workmail')";


    if(mysqli_query($conn,$sql)){
        echo "Data uploaded";
            }
        else{
        echo mysqli_error($conn);
        }
}
else{
    $sql = "INSERT INTO rpa_table (First,Last,Gender,Address,City,State,Home,Work,Personal_mail,Work_Mail) VALUES ('$first','$last','$gender','$address','$city','$state','$home','$work','$personel','$workmail')";


    if(mysqli_query($conn,$sql)){
        echo "Data uploaded";
            }
        else{
        echo mysqli_error($conn);
        }
}
$conn->close();

?>
