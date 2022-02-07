<?php 
	//inclued("../database/db.php");

	function successMessage($message){
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulation! </strong>' .$message. '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	}

	function warningMessage($message){
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Warning! </strong>' .$message. '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
	}

	function getCategoryName($conn, $id){
		$sql = "SELECT * FROM category WHERE $id = cat_id";
		$runSql = mysqli_query($conn, $sql);
		$name = mysqli_fetch_array($runSql);
		return $name['cat_name'];
	}




 ?>