
<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body  onload="loaders()">
    <div id="loader">
    </div>
<?php 
	
	include("header/nav.php");

?>
<section style="background-color:#d8e0d7">
	<div class="searchbox  col-md-4" >
		<label for="searchboxx"> <h3>Search News </h3> </label>
		<form class="form-inline my-2 my-lg-0 ml-2" >
                    <input class="form-control mr-sm-2" type="search" name="search_nav" placeholder="Search News" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit" >Search</button>
                </form>
	</div>
	<div class="home-header ml-4 mt-2">
		<h3 class="text-left">Latest News</h3>
	</div>
</section>
<div class="news">
	<div class="row mt-3 ml-2 mr-2">
<!-- search code -->
<?php
if (isset($_GET['search_nav'])) {
 	$search_key = $_GET['search_nav'];
 	$post_query = "SELECT * FROM news WHERE title LIKE '%$search_key%' ORDER BY created_at DESC";
 }
 
 else{
 	$post_query = "SELECT * FROM news ORDER BY created_at DESC ";

 } 
 $runquery= mysqli_query($conn, $post_query);
 while($post= mysqli_fetch_assoc($runquery)){
?>
<div class="col-md-4">
			<div class="card mb-1">
				<img src="../assets/img/<?php echo $post['img']; ?>" alt="" class="card-img-top">
				<div class="card-body">
						<h5 class="card-title"><?php echo $post['title']; ?> </h5>
						<p class="card-text text-truncate" > <?php echo $post['news_body']; ?> </p>
					<div class="link">
						<a href="post.php?id= <?php echo $post['news_id'] ?>" style="float:left">Read More</a>
						<div class="news-date" style="float: right;"><i class="fa fa-clock-o"> </i> <?php echo date('F jS,Y', strtotime($post['created_at'])) ?></div>
					</div>

				</div>
			</div>
		</div>

<?php
 }
?>


	</div>
</div>

<script>
    // var preloader = document.getElementById('loader');

    // function loaders() {

    //     preloader.style.display = 'none';
    // }
    var preloader = document.getElementById('loader');
    function loaders (){
        preloader.style.display = 'none';
    }
    </script>
	
</body>
</html>