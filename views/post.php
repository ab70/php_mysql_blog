<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>News</title>
</head>
<body>
	<?php 
	
	include("header/nav.php");
	include('functions.php');

?>
<?php
		$successAler = false;
		$warningAlert = false; 
		if (isset($_POST['postComment']) && isset($_SESSION['loggedin'])) {
			$post_id = $_GET['id'];
			$comBody = $_POST['postComment'];
			$userId = $_SESSION['user_id'];
			$userName = $_SESSION['username'];

			$commentSql = "INSERT INTO comments (news_id, comment_body, user_id, user_name) VALUES ('$post_id', '$comBody', '$userId', '$userName')";
			$run_commentSql = mysqli_query($conn, $commentSql);
			$successAler = true;
		}
		if (isset($_POST['postComment']) && !isset($_SESSION['loggedin'])) {
			$warningAlert = true;
		}
	 ?>
	 <?php 
	 		if($successAler){
	 			successMessage("Comment posted Successfully.");
	 		}
	 		if ($warningAlert) {
	 			warningMessage(" You must be logged in to comment.");
	 		}
	  ?>
	<div class="mt-3 row">
        <div class="col-md-8">
          <?php 
          $post_id = $_GET['id'];
          $postQuery = "SELECT * FROM news WHERE news_id = $post_id";
          $runPQ = mysqli_query($conn,$postQuery);
          $post = mysqli_fetch_assoc($runPQ);
           
           ?>
		<div class="card mb-3">
			<div class="card-body">
                  <h5 class="card-title"><?php echo $post['title']; ?></h5>
                  <span class="badge bg-primary ">Posted on: <?php echo date('F jS,Y',strtotime($post['created_at'])) ?></span>
                  <span class="badge bg-danger"> <?php echo getCategoryName($conn,$post['cat_id']) ?> </span>
                  <div class="border-bottom mt-3"></div>
                  <img src="../assets/img/<?php echo $post['img']; ?>" class="img-fluid mb-2 mt-2" alt="Responsive image">
                  <p class="card-text"><?php echo $post['news_body']; ?>
                  </p>
                  

        	</div>

		</div>
		
	</div>

	<div class="col-md-4 comment ">
			<div class="card mb-3">
				<div class="card-body">
					<h3 class="card-title">Add Comment</h3>
					<div class="border-bottom mt-2"></div>
					<div class="comment-area">
						<form action="" method="POST" onsubmit="return true">
							<textarea class="form-control" name="postComment" id="" onfocus="this.placeholder='' " onblur="this.placeholder= 'To comment on this news write in here!'" placeholder="Write here to express your thoughts." rows="4"></textarea>
							<button type="submit" class="btn btn-outline-success mt-1">Comment</button>
						</form>
						
					</div>


				</div>
				<h4 class="ml-2 mb-2">All comments</h4>
				<?php 
					$post_id = $_GET['id'];
					$commentsSql = "SELECT * FROM comments WHERE $post_id = news_id";
					$run_commentsSql = mysqli_query($conn, $commentsSql);
					while ($comment = mysqli_fetch_assoc($run_commentsSql)) {

				?>
				<div class="border-bottom border-success" style="color: red;"></div>
				<h4 class="card-title ml-2 mt-1"><?php echo $comment['user_name']; ?></h4>
				<p class="container-fluid comment_body"><?php echo $comment['comment_body']; ?></p>
				<div class="border-bottom mt-2"></div>
				<?php
					}
				?>
				

			</div>
		
		
	</div>
</div>

	
</body>
</html>