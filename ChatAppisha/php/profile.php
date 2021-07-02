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
.profile-head {
    transform: translateY(5rem)
}

.cover {
      background-size: cover;
    background-repeat: no-repeat
}
  .upload{
  position: relative;
  min-height: 500px;
  max-height: 500px;
  overflow-y: auto;
  padding: 10px 20px 10px 20px;
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
<?php
$query2="SELECT * FROM users where unique_id=$id";
$response2=mysqli_query($conn,$query2) or ("error");
$result2=mysqli_fetch_array($response2);
$query="SELECT * FROM post where user_id=$id";
$response=mysqli_query($conn,$query) or ("error");
//$result=mysqli_fetch_array($response);
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
        <div class="">
            <div class="px-3 pt-0 pb-3 cover">
                <div class="media align-items-end profile-head">
                  <div class="profile mr-5"><img src="images/<?php echo $result2['img'];?>" alt="..."  class="img-thumbnail"
                  style="border-radius:50%; height:150px; width: 150px; margin-left:60px;"> <br>
                  <br> <a href="edit-profile.php?>&id1=<?php echo $id; ?>" class="btn btn-outline-dark btn-sm btn-block" style="background:black; color:white;
                  font-size:15px;">Edit Profile</a>
                  <a href="logout.php?logout_id=<?php echo $id ; ?>" class="btn btn-outline-dark btn-sm btn-block" style="background:gray; color:white;
                  font-size:15px;">Logout</a><br></div>
                  <div class="media-body mb-5 text-white">
                    <h4 class="mt-0 mb-0" style="color:black"><?php echo  $result2['fname']. " " . $result2['lname'] ?></h4>
                    <h5 class="" style="color:black"> <i class="fas fa-map-marker-alt mr-2"></i>&nbsp<?php echo  $result2['city'] ?></h5><br>
                  </div>
                </div>
            </div><br>
            <div class="bg-light p-4 d-flex text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                    <a href="#photos" style="text-decoration:none; color:black; ">   <h5 class="font-weight-bold mb-0 d-block"><?php echo $row; ?></h5><small class="text-muted"> <i class="fas fa-image mr-1"></i>&nbspPhotos</small>
                   </a> </li>
                    <li class="list-inline-item">
                    <a href="#photos" style="text-decoration:none; color:black;">   <h5 class="font-weight-bold mb-0 d-block"><?php echo $row3; ?></h5><small class="text-muted"> <i class="fas fa-video mr-1"></i>&nbspVideos</small>
                    </a></li>
                    <li class="list-inline-item">
                        <h5 class="font-weight-bold mb-0 d-block">340</h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Following</small>
                    </li>
                </ul>
            </div>
            <div class="px-4 py-3">
                <h5 class="mb-0">About</h5><br>
                <div class="p-4 rounded shadow-sm bg-light">
                    <p class="font-italic mb-0"><?php echo  $result2['about'] ?></p>
                </div>
            </div>
            <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0" id="photos">Recent photos / Videos</h5><!--<a href="#" class="btn btn-link text-muted">Show all</a>-->
                </div>
                <div class="row">
                <?php  while($result=mysqli_fetch_array($response)){
                    ?>
                    <div class="col-lg-6 mb-2 pr-lg-1"><img src="images/<?php echo $result['img'];?>" alt="" class="img-fluid rounded shadow-sm"></div>
                    <?php   }   ?>
                </div>
                <div class="row">
                <?php  while($result3=mysqli_fetch_array($response3)){
                    ?>
                    <div class="col-lg-6 mb-2 pr-lg-1"> <video width="100%" controls>
                      <source src="images/<?php echo $result3['video'];?> ">
                    </video></div>
                    <?php   }   ?>
                </div>
            </div>
        </div>
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
