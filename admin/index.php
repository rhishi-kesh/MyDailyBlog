<?php 

   include('header.php');
   if(isset($_SESSION['user_data'])){
      $userId = $_SESSION['user_data']['0'];
  }else{
   header("location: ../admin_login.php");
  }

?>
<!-- Begin Page Content -->
<div class="container-fluid" id="adminpanal">
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">Blog Posts</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
      <div class="card-header py-3 d-flex justify-content-between">
         <div>
            <a href="add_blog.php">
               <h6 class="font-weight-bold text-primary mt-2">Add New</h6>
            </a>
         </div>
         <div>
            <form class="navbar-search">
               <div class="input-group">
                  <input type="text" class="form-control bg-white border-0 small" placeholder="Search for...">
                  <div class="input-group-append">
                     <button class="btn btn-primary" type="button"> <i class="fas fa-search fa-sm"></i> </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Title</th>
                     <th>Category</th>
                     <th>Author</th>
                     <th>Date</th>
                     <th colspan="2">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php

                     if(!isset($_GET['page'])){
                        $page = 1;
                     }else{
                        $page = $_GET['page'];
                     }
                     $limit = 5;
                     $offset = ($page-1)*$limit;
                     $sql = "SELECT * FROM blog LEFT JOIN categories ON blog.category=categories.cat_id LEFT JOIN user ON blog.author_id=user.user_id WHERE user_id='$userId' ORDER BY blog.publish_date DESC LIMIT $offset,$limit";
                     $query = mysqli_query($config, $sql);
                     $rows = mysqli_num_rows($query);
                     $count = 1;
                     if($rows){
                        while($row = mysqli_fetch_assoc($query)){
                           ?>
                           <tr>
                              <td><?php echo ++$offset ?></td>
                              <td><?php echo $row['blog_title'] ?></td>
                              <td><?php echo $row['cat_name'] ?></td>
                              <td><?php echo $row['username'] ?></td>
                              <td><?php echo date('d-M-Y', strtotime($row['publish_date'])) ?></td>
                              <td>
                                 <a href="update_blog.php?id=<?php echo $row['blog_id'] ?>" class="btn btn-sm btn-success">Edit</a>
                              </td>
                              <td>
                              <form action="" method="POST" onsubmit="return confirm('Are your sure you want to delete?')">
                                    <input type="hidden" name="id" value="<?php echo $row['blog_id'] ?>">
                                    <input type="hidden" name="image" value="<?php echo $row['blog_img'] ?>">
                                    <input type="submit" name="delete" value="Delete" class="btn btn-sm btn-danger">
                                 </form>
                              </td>
                           </tr>
                           <?php
                        }
                     }else{
                        ?>
                           <tr><td colspan="7">No record found</td></tr>
                        <?php
                     }

                  ?>
               </tbody>
            </table>
            <?php

				$pagination = "SELECT * FROM blog WHERE author_id='$userId'";
				$query = mysqli_query($config, $pagination);
				$total = mysqli_num_rows($query);
				$pages = ceil( $total/$limit);
				if($total > $limit){
			?>
			<div>
				<ul class="pagination mt-3">
					<!-- <li class="page-item">
						<a class="page-link" href="#">&laquo;</a>
					</li> -->
					<?php for ($i=1; $i <= $pages; $i++) { ?>
						<li class="page-item <?= ($i == $page) ? $active = "active" : "" ?>">
							<a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a>
						</li>
					<?php }  ?>
					<!-- <li class="page-item">
						<a class="page-link" href="#">&raquo;</a>
					</li> -->
				</ul>
			</div>
			<?php } ?>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<?php 

   include('footer.php');
   if(isset($_POST['delete'])){
      $id = $_POST['id'];
      $image = "upload/".$_POST['image'];
      $sql = "DELETE FROM `blog` WHERE blog_id = '$id'";
      $query = mysqli_query($config, $sql);
      if($query){
         unlink($image);
         $msg = ['Blog has been delete successfully','alert-success'];
         $_SESSION['msg'] = $msg;
         header('location: index.php');
      }else{
         $msg = ['Failed, Please try again','alert-danger'];
         $_SESSION['msg'] = $msg;
         header('location: index.php');
      }
   }

?>