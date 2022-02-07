<?php 

	include("../header/adminPageHead.php");

 ?>
 <?php 
 		if (isset($_GET['deleteNews'])) {
 			$deleteNewss = $_GET['deleteNews'];
 			$delSql = "DELETE FROM news WHERE title LIKE '%$deleteNewss%' ";
 			mysqli_query($conn, $delSql);
 		}
  	if (isset($_GET['searchbox'])) {
  			$searchNews = $_GET['searchbox'];
  			$sql = "SELECT * FROM news WHERE title LIKE '%$searchNews%'  ";
  		}
  		else{

  			$sql = "SELECT * FROM news";

  		}
  		
   ?>
<html>

<body style="background-color: lightgray;">
	<div class="searchbox mt-3 col-md-4" >
		<label for="searchboxx"> <h3>Search News title to modify</h3> </label>
		<form class="form-inline my-2 my-lg-0 ml-2" >
                    <input class="form-control mr-sm-2" type="search" name="searchbox" placeholder="Search News" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit" >Search</button>
                </form>
	</div>
    <div class="container col-md-12">
  <h2>All News</h2>

              
  <table class="table table-dark"  style="border: 6px solid green;">
    
      <tr>
        <th class="col-md-3">Title</th>
        <th class="col-md-6">News Body</th>
        <th colspan="2" class="col-md-2">Action</th>
      </tr>
    
    <?php 

    	$runsql = mysqli_query($conn, $sql);
  		while ($post = mysqli_fetch_assoc($runsql)) {

  		?>
  		<tr>
  		<td><?php echo $post['title']; ?></td>
  		<td> <?php echo $post['news_body']; ?></td>
  		<td>
        <form action=" " method="GET">
  			<button class="btn btn-danger" name="deleteNews" value="<?php echo $post['title']; ?>" type="submit" >Delete News</button> 
  		</form>
  	</td>
  		<td>
        <form action="editpost.php" method="GET">
        <button class="btn btn-success" name="editNews" value="<?php echo $post['news_id']; ?>" type="submit">Edit News</button></td>
  		</tr>
  		<?php	
  		}

     ?>
      
        
        
      
      
      
    
  </table>
</div>
</body>

</html>