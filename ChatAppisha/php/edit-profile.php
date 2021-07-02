<?php 
  session_start();
  include_once "config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location:../login.php");
  }
  if(isset($_GET['id1'])){
         $id=$_GET['id1'];
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
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script type="text/javascript">
         $(document).ready(function () {
         $("#btn1").hide();
          $('input').attr('disabled', 'disabled');
            $('#btn2').click(function () {
               $('input').removeAttr('disabled');
               $("#btn2").hide();
               $("#btn1").show();
            });
            $('#btn1').click(function () {
               $('input').attr('disabled','disabled');
               $("#btn2").show();
               $("#btn1").hide();
            });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function () {
         $("#btn3").hide();
          $('input').attr('disabled', 'disabled');
            $('#btn4').click(function () {
               $('input').removeAttr('disabled');
               $("#btn4").hide();
               $("#btn3").show();
            });
            $('#btn3').click(function () {
               $('input').attr('disabled','disabled');
               $("#btn4").show();
               $("#btn3").hide();
            });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function () {
         $("#btn5").hide();
          $('input').attr('disabled', 'disabled');
            $('#btn6').click(function () {
               $('input').removeAttr('disabled');
               $("#btn6").hide();
               $("#btn5").show();
            });
            $('#btn5').click(function () {
               $('input').attr('disabled','disabled');
               $("#btn6").show();
               $("#btn5").hide();
            });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function () {
         $("#btn7").hide();
          $('input').attr('disabled', 'disabled');
            $('#btn8').click(function () {
               $('input').removeAttr('disabled');
               $("#btn8").hide();
               $("#btn7").show();
            });
            $('#btn7').click(function () {
               $('input').attr('disabled','disabled');
               $("#btn8").show();
               $("#btn7").hide();
            });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function () {
         $("#btn9").hide();
          $('input').attr('disabled', 'disabled');
            $('#btn0').click(function () {
               $('input').removeAttr('disabled');
               $("#btn0").hide();
               $("#btn9").show();
            });
            $('#btn9').click(function () {
               $('input').attr('disabled','disabled');
               $("#btn0").show();
               $("#btn9").hide();
            });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function () {
         $("#btna").hide();
          $('input').attr('disabled', 'disabled');
            $('#btnb').click(function () {
               $('input').removeAttr('disabled');
               $("#btnb").hide();
               $("#btna").show();
            });
            $('#btna').click(function () {
               $('input').attr('disabled','disabled');
               $("#btnb").show();
               $("#btna").hide();
            });
         });
      </script>
<style>
   .form{
  margin: 20px 0;
}
.form .name-details{
  display: flex;
}
.form .name-details .field:first-child{
  margin-right: 10px;
}
.form .name-details .field:last-child{
  margin-left: 10px;
}
.form .field{
  display: flex;
  margin-bottom: 10px;
  flex-direction: column;
  position: relative;
}
.form .field label{
  margin-bottom: 2px;
}
.form .input input{
  height: 40px;
  width: 100%;
  font-size: 16px;
  padding: 0 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
}
.form .field input{
  outline: none;
}
.form .image input{
  font-size: 17px;
}
.form .button input{
  height: 45px;
  border: none;
  color: #fff;
  font-size: 17px;
  background: #333;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 13px;
}
.form .field button{
  position: absolute;
  right: 15px;
  top: 70%;
  color: #ccc;
  cursor: pointer;
  transform: translateY(-50%);
}
.form .link{
  text-align: center;
  margin: 10px 0;
  font-size: 17px;
}
.form .link a{
  color: #333;
}
.form .link a:hover{
  text-decoration: underline;
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
    <section class="form signup">
      <header><div class="text-center">
<img src="images/<?php echo $result2['img'];?>" class='rounded' style="width:120px; height:120px; overflow:hidden;
 border-radius:50%; margin-top: 10px;">  </div>
 <div class="text-center">
<a href="profile.php"><hidden type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg"><span class="glyphicon glyphicon-camera" style=" color:black; font-size:7vh; margin-top:0px; padding:0px; margin-right:-15vh;  "></span></a>
</div>
<h2 style='text-align: center; margin-top:-1vh;'><?php echo  $result2['fname']. " " . $result2['lname'] ?></h2>
</header>
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" value="<?php echo  $result2['fname']; ?>">
            <button id="btn1">Update</button>
          <button id="btn2"><i  class="fas fa-pencil-alt"></i></button>
          </div>
         <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" value="<?php echo  $result2['lname']; ?>">
            <button id="btn3">Update</button>
          <button id="btn4"><i  class="fas fa-pencil-alt"></i></button>
         </div>

        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" value="<?php echo  $result2['email']; ?>">
          <div class="alert alert-success"><p>Email can't be change</p></div>
        </div>

        <div class="field input">
          <label>Address</label>
          <input type="text" name="address" placeholder="Enter your Address" value="<?php echo  $result2['address']; ?>">
          <button id="btn7">Update</button>
          <button id="btn8"><i  class="fas fa-pencil-alt"></i></button>
        </div>


        <div class="field input">
          <label>City</label>
          <input type="text" name="city" placeholder="Enter your city" value="<?php echo  $result2['city']; ?>">
          <button id="btn9">Update</button>
          <button id="btn0"><i  class="fas fa-pencil-alt"></i></button>
        </div>


        <div class="field input">
          <label>About</label>
          <input type="text" name="about" placeholder="About yourself" value="<?php echo  $result2['about']; ?>">
          <button id="btna">Update</button>
          <button id="btnb"><i  class="fas fa-pencil-alt"></i></button>
        
        </div> 
  
    </section>
  </div>
</body>
</html>
