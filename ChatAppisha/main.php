<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
 <style>
      .header {
  overflow: hidden;
  background-color:rgb(128,128,128,0.1);
  padding: 10px 10px;
}
.logo {
  font-size: 25px;
  font-weight: bold;
}
.icon-bar {
  width: 100%;
  background-color:rgb(128,128,128,0.1);
  overflow: auto;
}

.icon-bar a {
  float: left;
  width: 20%;
  text-align: center;
  padding: 10px 0;
  color: black;
  font-size: 26px;
  margin: 5px;
}

.icon-bar a:hover {
  background-color: cyan;
}

.active {
  background-color:cyan;
}
</style>
</head>
<body>
 <div class="header">
<b class="logo">CHATme</b>
  <a href="logout.php" type="button" class="btn" style="background-color:cyan; color:black; border-radius:10%;float:right; "><span class="glyphicon glyphicon-off"style="font-size:18px; "></span></a>
</div>
<div class="icon-bar">
  <a class="active" href="main.php"><span class="fas fa-home"></span></a> 
  <a href="friends.php"><span class="fas fa-user-friends"></span></a> 
  <a href="allmedia.php"><span class="fas fa-photo-video"></span></a> 
  <a href="#"><span class="fab fa-facebook-messenger"></span></a>
</div>
<?php
$db=mysqli_connect("localhost","root","","test") or die("error while connecting with database");

  $Unique_id=$_COOKIE['user'];
 $query="SELECT * FROM chatme where Unique_id=$Unique_id" ;
 $response=mysqli_query($db,$query) or ("error");
 $result=mysqli_fetch_array($response);
   ?><div class="table"><?php
    echo "<table>";
     echo "<tr>";
   
 #user button and profile...
    if(!empty($result['img']))
    {
       echo "<td><a href='edit.php'><img src=".$result['img']." style='width:90px; height:90px; overflow:hidden;border-radius:50%; display: block;'></a></td>";
     }
     else{
      echo "<td><img src='download.png'style='width:90px; height:90px; overflow:hidden;border-radius:50%; display: block;'></td>";
     }
    ?> <td><a href="upload.php" type="button" class="btn btn-primary" style="background-color:cyan; color:black; width:35vh; height:8vh;"><h5>Upload Media</h5></a></td>
<?php  echo "</tr>";

 echo "</table>";

   ?></div><?php  
  #userprofile ,name ,pic..
 if(!empty($result['img']))
    {
       echo "<td><a href=".$result['img']."><img src=".$result['img']." style='width:50px; height:50px;border-radius:50%; margin-left: auto; margin-right: auto;'></a></td>";
     }
     else{
      echo "<img src='download.png'style='width:50px; height:50px; border-radius:50%;border-radius:50%; margin-left: auto; margin-right: auto;'></a>";
     } ?>&nbsp&nbsp<?php
     echo "<td><b>".$result['Name']."</b></td>"; 
    if(!empty($result['img']))
    {
       echo "<td><a href=".$result['img']."><img src=".$result['img']." style='width:100%;'></a></td>";
     }
     else{
      echo "<img src='download.png'style='width:100%;'>";
     } 
?><br><br><?php


 #for image upload..

   $Userid=$_COOKIE['user'];
 $query="SELECT * FROM image where Userid=$Userid" ;
 $response=mysqli_query($db,$query) or ("error");
while ($result1=mysqli_fetch_array($response))
 {
if(!empty($result['img']))
    {
       echo "<td><a href=".$result['img']."><img src=".$result['img']." style='width:50px; height:50px;border-radius:50%; margin-left: auto; margin-right: auto;'></a></td>";
     }
     else{
      echo "<img src='download.png'style='width:50px; height:50px; border-radius:50%; margin-left: auto;margin-right: auto;'>";
     } ?>&nbsp&nbsp<?php
     echo "<td><b>".$result['Name']."</b></td>";

  ?><a href="deleteimage.php?>&id=<?php echo $result1['id'];?>" ><span class="glyphicon glyphicon-trash" style=" float:right; font-size:3vh; color:gray;  margin-top:14px; margin-right:6px; "></span></a>
  <?php
    echo "<a href=".$result1['image']."><img src=".$result1['image']." style='width:100%;'></a>";?><br><br><?php
 }



 # for vedio upload...
$Userid=$_COOKIE['user'];
   $query2="SELECT * FROM vedio where Userid=$Userid" ;
 $response2=mysqli_query($db,$query2) or ("error");
while ($result2=mysqli_fetch_array($response2))
 {
  if(!empty($result['img']))
    {
       echo "<td><a href=".$result['img']."><img src=".$result['img']." style='width:50px; height:50px;border-radius:50%; margin-left: auto; margin-right: auto;'></a></td>";
     }
     else{
      echo "<img src='download.png'style='width:50px; height:50px; border-radius:50%; margin-left: auto;margin-right: auto;'>";
     } ?>&nbsp&nbsp<?php
     echo "<td><b>".$result['Name']."</b></td>"; 

?><a href="deletevedio.php?>&id=<?php echo $result2['id'];?>" ><span class="glyphicon glyphicon-trash" style=" float:right; font-size:3vh; color:gray;  margin-top:14px; margin-right:6px; "></span></a>
 <div>
   <video width="100%" controls>
<source src="<?php echo 'vedio/'.$result2['vedio'];?>">
</video><br><br>
<?php
 }
 ?>
</body>
</html>



