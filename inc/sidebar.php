<div class="sidebar clear">
		<div class="semisidebar clear">
		<h2>Latest Article</h2>


			<?php 
			$query="SELECT *FROM tbl_category";
			$category=$db->select($query);
			if($category){
             while ($result=$category->fetch_assoc()) {
		  ?>
		 <ul>
	      <li> <a href="catposts.php?category=<?php echo $result['id'] ?>"><?php echo $result['name']; ?></a></li> 
          </ul>
      <?php } ?>
      <?php }  else{ ?>
      	<h1>No data here</h1>
      <?php } ?>
		</div>


		<div class="semisidebar clear">
		<h4>Popular articles</h4>
		<?php 
			$query="SELECT *FROM tbl_post";
			$post=$db->select($query);
			if($post){
             while ($result=$post->fetch_assoc()) {
		  ?>
		<div class="popular clear">
			<h3><?php echo $result['title']; ?></h3>
			<img src="admin/upload/<?php echo $result['image']; ?>" alt="post.img" >
		<a href="populararticles.php?id=<?php echo $result['id']; ?>"><?php echo $fm->textshorten ($result['body'],100); ?></a>	
		</div>

	<?php } ?>
	<?php } ?>
	
	</div>
		
	</div>