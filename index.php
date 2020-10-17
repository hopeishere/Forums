<?php
require "login.php";
?>
<link rel="stylesheet" type="text/css" href="login.css">
<main>
	<section>
		<?php  
			if(isset($_SESSION['userid'])){
				echo '<p class="success">You are logged in </p>';
			}else{
				#echo '<p class="success">You are logged out</p>';
			}
		?>
		<?php  
	include_once("dbh.php");
	$sql = "SELECT * FROM categories ORDER BY cat_title ASC";
	$res = mysqli_query($conn,$sql);
	$categories = "";
	if(mysqli_num_rows($res)>0){
		while($row = mysqli_fetch_assoc($res)){
			$id = $row['id'];
			$title = $row['cat_title'];
			$description = $row['cat_desc'];
			$categories.= "<a href = 'view_category.php?cid=".$id."' style = 'color : white;'>".$title."-<font size '-1'>".$description."</font></a>";
		}
		echo $categories;

	}else{
		echo "<p>No categories avaiable yet</p>";
	}
	?>
		
	</section>
</main>