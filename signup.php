<?php
$con=mysqli_connect("localhost","sati","sati","project_db");
if (mysqli_connect_errno($con))
{
   echo '{"query_result":"ERROR"}';
}
 
$username = $_GET['username'];
$passWord = $_GET['password'];
$name=$_GET['name'];
$location=$_GET['location'];
$email=$_GET['email'];
$mobile=$_GET['mobile'];
$sq="SELECT * FROM `project_db`.`user` WHERE `location`='$location';";
$loc= mysqli_query($con,$sq);
$j=mysqli_num_rows($loc);
if($j==0)
{
$query="CREATE TABLE `$location`(
`username` varchar(255),
`sale` int(30),
`ts_create` TIMESTAMP DEFAULT CURRENT_TIMESTAMP);";

$oc= mysqli_query($con,$query);
}
$sql="INSERT INTO `project_db`.`user` ( `id`,`username`, `password`,`name`,`location`,`email`,`mobile`) VALUES ('2','$username', '$passWord','$name','$location','$email','$mobile');";
$result = mysqli_query($con,$sql); 
if($result == true) {
    echo '{"query_result":"SUCCESS"}';
}
else{
    echo '{"query_result":"FAILURE"}';
}
mysqli_close($con);
?>