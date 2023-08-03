<?php 

   include('header.php');
   if(isset($_SESSION['user_data'])){
        $author_id = $_SESSION['user_data']['0'];
    }
    // fetch_catagory
    $sql = "SELECT * FROM `categories`";
    $query = mysqli_query($config, $sql);
    // get blog id
    $blog_id = $_GET['id'];
    if(empty($blog_id)){
        header("location: index.php");
    }
    $sql2 = "SELECT * FROM blog LEFT JOIN categories ON blog.category=categories.cat_id LEFT JOIN user ON blog.author_id=user.user_id WHERE blog_id='$blog_id'";
    $query2 = mysqli_query($config, $sql2);
    $result = mysqli_fetch_assoc($query2);
?>
<div class="container">
    <h5 class="mb-2 text-gray-800">Blogs</h5>
    <div class="row">
        <div class="col-xl-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary mt-2">Publish blog/article</h6>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="text" name="blog_title" placeholder="Title" class="form-control" required value="<?php echo $result['blog_title'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="blog">Body/Description</label>
                                <textarea name="blog_body" id="blog" rows="2" class="form-control" required>
                                <?php echo $result['blog_body'] ?>
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="blog_image" class="form-control">
                                <img src="upload/<?php echo $result['blog_img'] ?>" alt="img" class="mt-1" style="width: 200px;">
                            </div>
                            </div>
                            <div class="mb-3">
                                <select name="category" class="form-control" required>
                                    <?php while($cats = mysqli_fetch_assoc($query)){ ?>
                                        <option value="<?php echo $cats['cat_id'] ?>"
                                        <?php
                                        if($result['category']==$cats['cat_id']){
                                            echo "selected";
                                        }else{
                                            echo "";
                                        }
                                        ?>
                                        >

                                            <?php echo $cats['cat_name'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="edit_blog" value="Update" class="btn btn-primary">
                                <a href="index.php" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 

   include('footer.php');
   if(isset($_POST['edit_blog'])){
    $title = mysqli_real_escape_string($config, $_POST['blog_title']);
    $body = mysqli_real_escape_string($config, $_POST['blog_body']);
    $category = mysqli_real_escape_string($config, $_POST['category']);
    $filename = $_FILES['blog_image']['name'];
    $tmp_name = $_FILES['blog_image']['tmp_name'];
    $size = $_FILES['blog_image']['size'];
    $image_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $allow_type = ['jpg','png','jpeg'];
    if(!empty($filename)){
        if(in_array($image_ext, $allow_type)){
            if($size<=2000000){
                $unlink = "upload/".$result['blog_img'];
                unlink($unlink);
                move_uploaded_file($tmp_name, "upload./".$filename);
                $sql3 = "UPDATE `blog` SET `blog_title`='$title',`blog_body`='$body',`blog_img`='$filename',`category`='$category',`author_id`='$author_id' WHERE blog_id='$blog_id'";
                $query3 = mysqli_query($config, $sql3);
                if($query3){
                    $msg = ['Post Update successfully','alert-success'];
                    $_SESSION['msg'] = $msg;
                    header('location: index.php');
                }else{
                    $msg = ['Failed,please try again','alert-danger'];
                    $_SESSION['msg'] = $msg;
                    header('location: index.php');
                }
            }else{
                $msg = ['Image size should not be greater then 2MB','alert-danger'];
                $_SESSION['msg'] = $msg;
                header('location: index.php');
            }
        }else{
            $msg = ['Image file type is not allow (Only jpg, png & jpeg)','alert-danger'];
            $_SESSION['msg'] = $msg;
            header('location: index.php');
        }
    }else{
        $sql3 = "UPDATE `blog` SET `blog_title`='$title',`blog_body`='$body',`category`='$category',`author_id`='$author_id' WHERE blog_id='$blog_id'";
        $query3 = mysqli_query($config, $sql3);
        if($query3){
            $msg = ['Post Update successfully','alert-success'];
            $_SESSION['msg'] = $msg;
            header('location: index.php');
        }else{
            $msg = ['Failed,please try again','alert-danger'];
            $_SESSION['msg'] = $msg;
            header('location: index.php');
        }
    }
}                                      

?>