<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location:../login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Realtime Chat App</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<style>
.card .image{
height:300px;
width:300px;
background:red;
  }
.card img{
    border-radius:90%;
  }
.posts{
  position: relative;
  min-height: 500px;
  max-height: 500px;
  overflow-y: auto;
  padding: 10px 30px 10px 30px;
  background: #f7f7f7;
  box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
              inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
}
.typing-area {
  overflow: hidden;
  background-color: #333;
}

.typing-area a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.typing-area a:hover {
  background: #ddd;
  color: black;
}

  </style>
</head>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
      <div class="content" style="display: flex;">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          </div>
        </div>
          <a href="../users.php" class="logout" style=" display: block;outline: none;  border: none;  padding: 7px 15px;text-decoration: none;border-radius: 5px;
            font-size: 17px; margin-left: 120px;"><i class="fab fa-facebook-messenger" style="font-size:30px; color: black;"></i></a>
      </header>
      <div class="posts">
      
      
                  <!--  for image posts -->
                  <?php
           $id=$_SESSION['unique_id'];
          $query="SELECT post.img,post.post_id,post.caption,users.fname,users.lname,post.user_id FROM 
          (post INNER join users on post.user_id=users.unique_id)  order by post.user_id";
   $response=mysqli_query($conn,$query) or ("error");
  while ($result1=mysqli_fetch_array($response))
   {
    $id=$result1['user_id'];
     $query2="SELECT users.img,users.fname,users.lname,users.unique_id FROM (post INNER join users on post.user_id=users.unique_id) where users.unique_id=$id";
   $response2=mysqli_query($conn,$query2) or ("error");
   $result2=mysqli_fetch_array($response2);
         echo "<td>"?>
       <a href=".$result2['img']."><img src="images/<?php echo $result2['img'];?> " style="width:50px; height:50px;border-radius:50%; margin-left: auto; margin-right: auto;"></a><?php
         "</td>";
        ?>&nbsp&nbsp<?php
       echo '<td>';
       ?> <a href='view-profile.php?>&id=<?php echo $result1['user_id'];?>' style='color:black; font-weight:bolder; text-decoration:none;'>
        <?php echo  $result1['fname']. " " . $result1['lname']; 
       echo "</a>";
       echo '</td>';
  
    ?><a href="deletepost.php?>&id=<?php echo $result1['post_id'];?>" ><span class='glyphicon glyphicon-trash' style='float:right; font-size:3vh; color:black;  margin-top:14px; margin-right:6px;'></span></a>
    <div class="card">
   <figcaption style="margin: 5px; padding: 5px; width: 100%;"><pre style="width:100%;"><?php echo $result1['caption'] ;  ?></pre></figcaption>
    <img src="images/<?php echo $result1['img'];?>
     " class="image" style="height:300px; width:300px;" >
  </div><br><br>
      <?php
   }?> 

                      <!--  for thoughts-->
   <?php
     $query="SELECT thoughts.thought,thoughts.thought_id,users.fname,users.lname,thoughts.user_id FROM 
    (thoughts INNER join users on thoughts.user_id=users.unique_id)  order by thoughts.user_id";
$response=mysqli_query($conn,$query) or ("error");
while ($result1=mysqli_fetch_array($response))
{
$id=$result1['user_id'];
$query2="SELECT users.img,users.fname,users.lname,users.unique_id FROM (thoughts INNER join users on thoughts.user_id=users.unique_id) where users.unique_id=$id";
$response2=mysqli_query($conn,$query2) or ("error");
$result2=mysqli_fetch_array($response2);
   echo "<td>"?>
 <a href=".$result2['img']."><img src="images/<?php echo $result2['img'];?> " style="width:50px; height:50px;border-radius:50%; margin-left: auto; margin-right: auto;"></a><?php
   "</td>";
  ?>&nbsp&nbsp<?php
  echo '<td>';?>
  <a href='view-profile.php?>&id=<?php echo $result1['user_id'];?>' style='color:black; font-weight:bolder; text-decoration:none;'>
<?php  echo  $result1['fname']. " " . $result1['lname']; 
  echo "</a>";
  echo '</td>';

?><a href="deletepost.php?>&id2=<?php echo $result1['thought_id'];?>" ><span class='glyphicon glyphicon-trash'
 style='float:right; font-size:3vh; color:black;  margin-top:14px; margin-right:6px;'></span></a>
<div class="card">
<h3> <?php echo $result1['thought'];?> </h3>
</div><br><br>
<?php
}?> 

 <!--  for video posts -->
   <?php
     $query="SELECT video.video,video.video_id,video.caption,users.fname,users.lname,video.user_id FROM 
    (video INNER join users on video.user_id=users.unique_id)  order by video.user_id";
$response=mysqli_query($conn,$query) or ("error");
while ($result1=mysqli_fetch_array($response))
{
$id=$result1['user_id'];
$query2="SELECT users.img,users.fname,users.lname,users.unique_id FROM (video INNER join users on video.user_id=users.unique_id) where users.unique_id=$id";
$response2=mysqli_query($conn,$query2) or ("error");
$result2=mysqli_fetch_array($response2);
   echo "<td>"?>
 <a href=".$result2['img']."><img src="images/<?php echo $result2['img'];?> " style="width:50px; height:50px;border-radius:50%; margin-left: auto; margin-right: auto;"></a><?php
   "</td>";
  ?>&nbsp&nbsp<?php
  echo '<td>';?>
  <a href='view-profile.php?>&id=<?php echo $result1['user_id'];?>' style='color:black; font-weight:bolder; text-decoration:none;'>
<?php  echo  $result1['fname']. " " . $result1['lname']; 
  echo "</a>";
  echo '</td>';

?><a href="deletepost.php?>&id1=<?php echo $result1['video_id'];?>" ><span class='glyphicon glyphicon-trash'
 style='float:right; font-size:3vh; color:black;  margin-top:14px; margin-right:6px;'></span></a>
<div class="card">
 <figcaption style="margin: 5px; padding: 5px; width: 100%;"><pre style="width:100%; overflow:none;"><?php echo $result1['caption'] ;  ?></pre></figcaption>
 <video width="100%" controls>
<source src="images/<?php echo $result1['video'];?> ">
</video>
</div><br><br>
<?php
}?> 

  
      </div>


      
      <div class="typing-area">
          <a href="home.php"><i class="fas fa-home" style="font-size:30px;"></i></a>
          <a href="upload.php"><i class="fa fa-plus-circle" style="font-size:30px;"></i></a>
          <a href="#contact"><i class="fas fa-user-friends" style="font-size:30px;"></i></a>
          <a href="profile.php"><i style='font-size:30px' class='fas'>&#xf2bd;</i></a>
      </div>
    </section>
  </div>
  <script src="javascript/chat.js"></script>
</body>
</html>
  