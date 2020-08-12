<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>

<?php include 'config/config.php'; ?>
<?php  include 'lib/database.php';?>
<?php include 'helpers/Formate.php';?>

<?php
   $db=new Database();
   $fm=new Formate();
  ?>

<div class="contentsection template clear">
	<div class="maincontent clear">
<?php 
if(!isset($_GET['search'])|| isset($_GET['search'])==NULL){
	header("Location:error.php");
}else{
$search=$_GET['search'];	
}

?>

<?php
   $query="SELECT *FROM tbl_post where title LIKE '%$search%' or body LIKE '%$search%' or author LIKE 
    '$search%' or image LIKE '%$search%'";
   $post=$db->select($query);
   if($post) { 
   	while ($result=$post->fetch_assoc()) {
?>
	<div class="samepost clear">
		<h3> <a href="readmore.php?id=<?php echo  $result['id']; ?>"><?php echo $result['title']; ?></a>  </h3>
		<div class="date clear">
			<h5><?php echo $fm->formDate($result['date'])?>,By <a href="#"><?php echo $result['author']; ?> </a> </h5>
		</div>
		
		
		<img src="admin/upload/<?php echo $result['image']; ?>" alt="post.img" >
		<?php echo $fm->textshorten ($result['body'],100); ?>
		<div class="readmore clear">
			<a href="readmore.php?id=<?php echo  $result['id']; ?>">readmore</a>
		</div>
		
	</div>


<?php } ?>
<?php } else {echo "not found";}?>

	</div>
	<?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php';  ?>
