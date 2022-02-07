<?php 

	include("../header/adminPageHead.php");

 ?>
<?php 
 if(isset($_POST['add_news']))
{

     $title = mysqli_real_escape_string($conn,$_POST['newstitle']);
      $news_body = mysqli_real_escape_string($conn,$_POST['newsBody']);
      $cate_id = $_POST['categories'];
      $img =  $_FILES["img"]["name"];
 $file_name = $_FILES["img"]["name"];
$file_tmp = $_FILES["img"]["tmp_name"];
  if($file_name!=''){
        move_uploaded_file($file_tmp,"../../assets/img/".$file_name);
  }

$sql_query="INSERT INTO news (title,news_body,cat_id,img) VALUES('$title','$news_body','$cate_id','$img')";

 

 if(mysqli_query($conn,$sql_query))
 {
  ?>
  <script type="text/javascript">
  alert('news added Successfully ');
  
  </script>
  <?php
 }
 else
 {
  ?>
  <script type="text/javascript">
  alert('error occured while inserting your data');
  </script>
  <?php
 }
 
}
?>
 <html>
    <body  style="background-image: url('https://images.unsplash.com/photo-1510936111840-65e151ad71bb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=767&q=80');"   onload="loaders()">
      <div class="container-fluid col-md-12" id="forms"  style="margin-top: 70px; margin-bottom: 50px;">
           
        <div class="container col-md-3 mb-5">
            <h4 style="color:white;" style="padding-bottom: 50px;">Add New Post</h4>
        </div>
        <form class="col-md-5" style="margin: auto;" action="adminHome.php" enctype="multipart/form-data" method="POST" onsubmit="return true">
            <div class="form-group mt-1">
               <label for="newstitle" style="color:white;">Enter title of the news!</label>
                <input class="form-control" type="text" name="newstitle" id="posttitle"  onfocus="this.placeholder=''" onblur="this.placeholder='Enter title of the news!'" placeholder="Enter the title." required="" style="background: transparent ; color: white;">
            </div>
            <div class="form-group">
               <label for="newsBody" style="color:white;">Enter body of the news!</label>
               <textarea class="form-control" name="newsBody" id="newsBody"   placeholder="Enter body of the news!" style="background: transparent ;color: white;" required="" cols="30" rows="10">
               </textarea>
                
            </div>
            <div class="form-group">
               <label for="categoriess" style="color:white;"><b>Selcet the category of the news:</b></label> 
                  <select class="form-control" name="categories" id="" required="" style="background: transparent ; color: white;">
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
               <input type="file" name="img" id="fileToUploadd" style="background: transparent ; color: white;">
            </div>
            
           
            
            
            <button type="submit" class="btn btn-success col-md-5" name="add_news" >Add News</button>
            
        </form>
    </div>
    </body>
 </html>