<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<?php include 'config/config.php'; ?>
<?php  include 'lib/database.php';?>
<?php include 'helpers/Formate.php';?>

<?php
   $db=new Database();
   $fm=new Formate();
   ?>
   <?php 
        if(!isset($_GET['id'])||$_GET['id']==NULL){
        	//header("Location:error.php");
        	echo "id not found ";
        }else{
        	$id=$_GET['id'];
        }
   ?>

   <div class="contentsection template clear">
	<div class="maincontent clear">

		<?php

         $query="SELECT *FROM tbl_post WHERE id=$id";
		   $post=$db->select($query);
		   if($post) { 
		   	while ($result=$post->fetch_assoc()) {
		?>
	<div class="samepost clear">
		<h3> <a href="#"><?php echo $result['title']; ?></a>  </h3>
		<div class="date clear">
			<h5><?php echo $fm->formDate($result['date'])?>,By <a href="#"><?php echo $result['author']; ?> </a> </h5>
		</div>
		<img src="admin/upload/<?php echo $result['image']; ?>" alt="post.img" >
		<?php echo $result['body']; ?>
		<div class="readmore clear">
			
		</div>
		
	</div>

<div class="related template class">
<?php
           $catid=$result['cat'];
           $query="SELECT *FROM tbl_post WHERE cat=$catid";
		   $rlpost=$db->select($query);
		   if($rlpost) { 
		   	while ($result=$rlpost->fetch_assoc()) {
		?>

	<div class="div1">
		<h4><a><?php echo $result['title']; ?></a></h4><br>
	<img src="admin/upload/<?php echo $result['image']; ?>" alt="post.img" >
	</div>
<?php } ?>

<?php } ?>

<?php } ?>

<?php } else { header("Location:error.php"); }?>

	</div>

	</div>

	
	<?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php';?>