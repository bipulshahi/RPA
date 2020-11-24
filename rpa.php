<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
<style>
    
    #tlook {width: 100%;
            font-family: monospace;}
    
    #tlook td, #tlook th{
        border : 1px solid #ddd;
        padding: 8px;
    }
    
    #tlook tr:nth-child(all){background-color: #33a174;}
    
    #tlook tr:hover{background-color: #ddd;}
    
    #tlook th {
        padding-top : 12px;
        background-color : #00A8A9;
    }
    
    #tlook tr {
        padding-top : 12px;
        text-align : center;
    }
</style>

<form action = "rpa.php" method="post">
    <input type="text" placeholder="First" name="fn"/>
    <input type="text" placeholder="Last" name="ln"/>
    <input type="text" placeholder="Gender" name="gn"/>
    <input type="text" placeholder="Address" name="ad"/>
    <input type="text" placeholder="City" name="ct"/>
    <input type="text" placeholder="State" name="st"/>
    <input type="text" placeholder="Home" name="hm"/>
    <input type="text" placeholder="Work" name="wk"/>
    <input type="text" placeholder="Personal_mail" name="pm"/>
    <input type="text" placeholder="Work_Mail" name="wm"/>
    <input type="submit"/>
</form>

<?php
    if (isset($_POST['fn'])){
        include "rpa_feed.php";
    }
?>

<?php
$i = 0;
$servername = "localhost";
$username = "id15454669_peopletech";
$password = "Hellopeople@123";
$dbname = "id15454669_iot_data";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die("Database Connection failed:".$conn->connect_error);
    echo "<a href='install.php'>If first time running click here to install</a>";
}

$sql = "SELECT * FROM rpa_table ORDER BY Id DESC";

if($result = mysqli_query($conn,$sql)){
    
    echo "<TABLE id = 'tlook'>";
        echo "<TR><TH>S.No.</TH><TH>First</TH><TH>Last</TH><TH>Gender</TH><TH>Address</TH><TH>City</TH><TH>State</TH><TH>Home</TH><TH>Work</TH><TH>Personal_mail</TH><TH>Work_Mail</TH></TR>";
    
        while($row = mysqli_fetch_row($result)){
            echo "<TR>";
                echo "<TD>".$i++."</TD>";    
                echo "<TD>".$row[1]."</TD>";  
                echo "<TD>".$row[2]."</TD>";  
                echo "<TD>".$row[3]."</TD>";  
                echo "<TD>".$row[4]."</TD>";
                echo "<TD>".$row[5]."</TD>";  
                echo "<TD>".$row[6]."</TD>";  
                echo "<TD>".$row[7]."</TD>";  
                echo "<TD>".$row[8]."</TD>";
                echo "<TD>".$row[9]."</TD>";  
                echo "<TD>".$row[10]."</TD>";  
            echo "</TR>";
        }
    
    echo "</TABLE>";
    
    
    mysqli_free_result($result);

}
  mysqli_close($conn);  

?>
</body>  
</html>
