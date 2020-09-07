

<?php
 include '../lib/session.php'; 
 Session::init();

?>

<?php include '../config/config.php';?>
<?php  include '../lib/database.php';?>
<?php include '../helpers/Formate.php';?>


<?php
   $db=new Database();
   $fm=new Formate();
  ?>


<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>

<div class="container">
	<section id="content">

<?php   
 

if($_SERVER['REQUEST_METHOD']=='POST'){
//validation
	$username=$fm->validation($_POST['username']);
	$password=$fm->validation(md5($_POST['password']));
	$username=mysqli_real_escape_string($db->link,$username);
	$password=mysqli_real_escape_string($db->link,$password);
     
	$query="SELECT * FROM tbl_user WHERE username = '$username' AND password='$password'";
	$results=$db->select($query);

	if($results!=false){

		$value=mysqli_fetch_array($results);
		$row=mysqli_num_rows($results);
		if($row>0){
         Session::set("login",true);
         Session::set("username",$value['username']);
         Session::set("userid",$value['id']);
         header("Location:index.php");
		}else{
           echo "not fount";
		}
	}

	else{
		echo " username or password not match";
	}



}




 ?>



		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->

<div>
	<div>
				<input type="text" placeholder="Username" required="" name="username"
                  value="<?php echo $_POST['username'];  ?>" 
				/>
			</div>
	
</div>
</body>
</html>