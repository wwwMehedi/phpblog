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
$per_page=2;
if(isset($_GET["page"])){
	$page=$_GET["page"];
}else{
	$page=1;
}
$start_form=($page-1)*$per_page;

?>


		<?php
         $query="SELECT *FROM tbl_post limit $start_form, $per_page";
        // $query="SELECT *FROM tbl_post limit 4";
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


<?php 
$query="SELECT *FROM tbl_post";
 $result=$db->select($query);
 $total_rows=mysqli_num_rows($result);
 $total_pages=ceil($total_rows/$per_page);
echo "<span class='pagination'> <a href='index.php?page=1'>first page </a>";
  for ($i=1; $i < $total_pages; $i++) { 
	echo "<a href='index.php?page=".$i."'>".$i."</a>";
}

 echo "<a href='index.php?page=$total_pages'>Last page</a> </span>"; ?>

<?php } else { header("Location:error.php"); }?>


	</div>
	<?php include 'inc/sidebar.php'; ?>
    <?php include 'inc/footer.php';  ?>
    