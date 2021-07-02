

<?php 
  session_start();
  include_once "config.php";
  if(isset($_GET['id'])) 
		{
		    $id=$_GET['id'];
			  echo   $query="DELETE FROM post where post_id='$id'";
				 $response=mysqli_query($conn,$query) or die('error') ;
		     	header("location:home.php");
		       }		   
	 if(isset($_GET['id1'])) 
			   {
				   $id=$_GET['id1'];
					 echo   $query="DELETE FROM video where video_id='$id'";
						$response=mysqli_query($conn,$query) or die('error') ;
						header("location:home.php");
					  }		   
					  if(isset($_GET['id2'])) 
					  {
						  $id2=$_GET['id2'];
							echo   $query="DELETE FROM thoughts where thought_id='$id2'";
							   $response=mysqli_query($conn,$query) or die('error') ;
							   header("location:home.php");
							 }		   
						   
?>
</body>
</html>