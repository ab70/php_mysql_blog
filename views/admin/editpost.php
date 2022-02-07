<?php 

	include("../header/adminPageHead.php");
   include("../functions.php");

 ?>
 <?php 
         $post_id = $_GET['editNews'];
         $fetchSql = "SELECT * FROM news WHERE $post_id = news_id ";
         $run_fetchSql = mysqli_query($conn, $fetchSql);
         $fetchedPost = mysqli_fetch_array($run_fetchSql);         
 ?>
 <?php 
   $success = false;
   $error = false;
   if(isset($_POST['edit_news']))
{
   
     $title = mysqli_real_escape_string($conn,$_POST['editnewstitle']);
      $news_body = mysqli_real_escape_string($conn,$_POST['editnewsBody']);
      $cate_id = $_POST['editcategories'];
      $img =  $_FILES["img"]["name"];
      $file_name = $_FILES["img"]["name"];
      $file_tmp = $_FILES["img"]["tmp_name"];
  if(!empty($file_name)){
        move_uploaded_file($file_tmp,"../../assets/img/".$file_name);
        $sql_query = "UPDATE news SET title = '$title', news_body = '$news_body', cat_id = '$cate_id', img = '$img' WHERE $post_id = news_id "; 
      }
   else{
      $sql_query="UPDATE news SET title = '$title', news_body = '$news_body', cat_id = '$cate_id' WHERE $post_id = news_id";
   }

      

 

 if(mysqli_query($conn,$sql_query))
 {
   $success = true;
  
  
 }
 else
 {
   $error = true;
  
  
 }
}

  ?>
 

 <html>
    <body  style="background-image: url('https://images.unsplash.com/photo-1510936111840-65e151ad71bb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=767&q=80');"   onload="loaders()">
      <div class="container-fluid col-md-12" id="forms"  style="margin-top: 70px; margin-bottom: 50px;">
        <?php 

        if ($success) {
           successMessage("Post Edit Successfull.");
           
        }
        if ($error) {
           successMessage("Post Edit Not Successfull.");
           
        }
         ?>
   
           
        <div class="container col-md-3 mb-5">
            <h4 style="color:white;" style="padding-bottom: 50px;">Edit post Post</h4>
        </div>
        <form class="col-md-5" style="margin: auto;" action="" enctype="multipart/form-data" method="POST" onsubmit="return true">
            <div class="form-group mt-1">
               <label for="newstitle" style="color:white;">Enter updated title of the news!</label>
                <input class="form-control" type="text" name="editnewstitle" value="<?php echo $fetchedPost['title']; ?>" id="posttitle"  required="" style="background: transparent ; color: white;">
            </div>
            <div class="form-group">
               <label for="newsBody" style="color:white;">Enter updated body of the news!</label>
               <textarea class="form-control" name="editnewsBody" id="newsBody"   placeholder="Enter body of the news!" style="background: transparent ;color: white;" required="" cols="30" rows="10">
                  <?php echo $fetchedPost['news_body']; ?>
               </textarea>
                
            </div>
            <div class="form-group">
               <label for="categoriess" style="color:white;">Selcet the category of the news:</label>
                  <select class="form-control" name="editcategories" id="" required="" style="background: transparent ; color: white;">
                     <?php 
                        $catQuery = "SELECT * FROM category";
                        $runcat = mysqli_query($conn, $catQuery);
                        while ($row=mysqli_fetch_assoc($runcat)) {
                           $cat_id = $row['cat_id'];
                           $cat_name = $row['cat_name'];

                     ?>
                        <option value="<?php echo $cat_id; ?>" style="background-color:black;"><?php echo $cat_name; ?></option>
                     <?php     
                        }
                     ?>
                     
                  </select>
            </div>
            <div class="form-group">
               <img src="../../assets/img/<?php echo $fetchedPost['img']; ?>" alt="">
               <input type="file" name="img" id="fileToUploadd" style="background: transparent ; color: white;">
            </div>
            
           
            
            
            <button type="submit" class="btn btn-success col-md-5" name="edit_news" >Update News</button>
            
        </form>
    </div>
    </body>
 </html>