<?php 

   include('header.php');
   if($admin != 1){
      header("location: index.php");
   }
   if(!isset($_GET['page'])){
      $page = 1;
   }else{
      $page = $_GET['page'];
   }
   $limit = 5;
   $offset = ($page-1)*$limit;
   $sql = "SELECT * FROM `user` LIMIT $offset,$limit";
   $query = mysqli_query($config, $sql);
   $rows = mysqli_num_rows($query);
   $count = 1;
?>
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">Users</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
      <div class="card-header py-3 d-flex justify-content-between">
         <div>
            <a href="add_user.php">
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
                     <th>Username</th>
                     <th>Email</th>
                     <th>Roll</th>
                     <th colspan="2">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  if($rows){
                     foreach($query as $row){
                        ?>
                        <tr>
                           <td><?= ++$offset ?></td>
                           <td><?= $row['username'] ?></td>
                           <td><?= $row['email'] ?></td>
                           <td>
                              <?php 
                                 $role = $row['role'];
                                 if($role == 1){
                                    echo "Admin";
                                 }else{
                                    echo "Co-admin";
                                 }
                              ?>
                           </td>
                           <td>
                           <form action="" method="POST" onsubmit="return confirm('Are your sure you want to delete?')">
                              <input type="hidden" name="userId" value="<?php echo $row['user_id'] ?>">
                              <input type="submit" name="deleteuser" value="Delete" class="btn btn-sm btn-danger">
                           </form>
                           </td>
                        </tr>

                        <?php
                     }
                  }else{
                     ?>
                     <tr>
                        <td colspan="5">No Record Found</td>
                     </tr>
                     <?php
                  }
                  ?>
               </tbody>
            </table>
            <?php

				$pagination = "SELECT * FROM user";
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
							<a class="page-link" href="users.php?page=<?= $i ?>"><?= $i ?></a>
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
   if(isset($_POST['deleteuser'])){
      $id = $_POST['userId'];
      $sql = "DELETE FROM `user` WHERE user_id  = '$id'";
      $query = mysqli_query($config, $sql);
      if($query){
         $msg = ['User has been delete successfully','alert-success'];
         $_SESSION['msg'] = $msg;
         header('location: users.php');
      }else{
         $msg = ['ThiFailed, Please try again','alert-danger'];
         $_SESSION['msg'] = $msg;
         header('location: users.php');
      }
   }

?>