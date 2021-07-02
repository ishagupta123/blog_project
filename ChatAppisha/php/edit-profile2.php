<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location:../login.php");
  }
  
         $id=$_SESSION['unique_id'];
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Realtime Chat App</title>
  <link rel="stylesheet" href="../style.css">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <style>
body {
    
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
.logo {
font-size: 25px;
font-weight: bold;
}

</style>
</head>
<body>
<?php
$query2="SELECT * FROM users where unique_id=$id";
$response2=mysqli_query($conn,$query2) or ("error");
$result2=mysqli_fetch_array($response2);
$query="SELECT * FROM post where user_id=$id";
$response=mysqli_query($conn,$query) or ("error");
$result=mysqli_fetch_array($response);
$row=mysqli_num_rows($response);
$query3="SELECT * FROM video where user_id=$id";
$response3=mysqli_query($conn,$query3) or ("error");
//$result3=mysqli_fetch_array($response3);
$row3=mysqli_num_rows($response3);
$result2['fname'];
?>
  <div class="wrapper">
    <section class="chat-area">
        <!-- Profile widget -->
        <div class="upload">
<body>
<?php
echo "<table>";
echo "<tr>";
?>
<div class="profile mr-6"><img src="images/<?php echo $result2['img'];?>" alt="..."  class="img-thumbnail"
                  style="border-radius:50%; height:150px; width: 150px; margin-left:60px;"> <br>
                  <br> <a href="../chat1.php?>&id1=<?php echo $id;    ?>" class="btn btn-outline-dark btn-sm btn-block" style="background:black; color:white;
                  font-size:15px;">Edit Profile</a>
                  <a href="logout.php?logout_id=<?php echo $id ; ?>" class="btn btn-outline-dark btn-sm btn-block" style="background:gray; color:white;
                  font-size:15px;">Logout</a><br></div>
                  
<div class="text-center">
<a href="profile.php"><span class="glyphicon glyphicon-camera" style=" color:black; font-size:7vh; margin-top:-6vh; margin-right:-15vh;  "></span></a>
</div>
<?php
echo "<h2 style='text-align: center; margin-top:-1vh;'>".$result2['fname']. " " .$result2['lname']."</h2>";
?><tr><a href="edit1.php" type="button" class="btn btn-block" style="background-color:cyan; color:black;"><h5>Edit profile</h5></a></tr>
<span class='fas fa-user-plus' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Age</ph>". $result['Age']."</ph>";?><br>
<span class='fas fa-restroom' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Gender</ph>". $result['Gender']."</ph>";?><br>
<span class='fas fa-address-book' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Contact</ph>". $result2['fna']."</ph>";?><br>
<span class='fa fa-birthday-cake' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Date_of_birth</ph>". $result['Date_of_birth']."</ph>";?><br>
<span class='fas fa-envelope' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Email</ph>". $result['Email']."</ph>";?><br>
<span class='fa fa-university' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#School</ph>". $result['School']."</ph>";?><br>
<span class='fa fa-graduation-cap' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#College</ph>". $result['College']."</ph>";?><br>
<span class='fa fa-suitcase' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Status</ph>". $result['Status']."</ph>";?><br>
<span class='fa fa-map-marker' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#City</ph>". $result['City']."</ph>";?><br>
<span class='glyphicon glyphicon-map-marker' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Hometown</ph>". $result['Hometown']."</ph>";?><br>
<span class='fab fa-facebook' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Facebook</ph>". $result['Facebook']."</ph>";?><br>
<span class='fab fa-instagram' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Instagram</ph>". $result['Instagram']."</ph>";?><br>
<span class='fab fa-linkedin' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Linkdin</ph>". $result['Linkdin']."</ph>";?><br>
<span class='fas fa-heart' style=" color:cyan;margin-top:2vh;  margin-right:1vh; margin-left:2vh; font-size:3vh;  "></span><?php echo"<ph style='font-size:3vh;'><ph style='color:lightgray;'>#Relationship</ph>". $result['Relationship']."</ph>";?><br>
<?php

echo "</tr>";
echo "</tr>";
echo "</tr>";
echo "</tr>";
echo "</table>";
?>
</div> 
</div>
</section>
</div>    
</body>
</html>