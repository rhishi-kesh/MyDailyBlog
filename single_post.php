<?php 

    include "header.php";
    $id = $_GET['id'];
    if(empty($id)){
        header("location: index.php");
    }
    $sql = "SELECT * FROM blog WHERE blog_id='$id'";
    $query = mysqli_query($config, $sql);
    $row = mysqli_fetch_assoc($query);

?>

<div class="container mt-2">
	<div class="row">
		<div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <div>
                        <a href="admin/upload/<?= $row['blog_img'] ?>">
                        <img src="admin/upload/<?= $row['blog_img'] ?>" alt="img" class="img-fluid">
                        </a>
                    </div>
                    <hr>
                    <div>
                        <h5 class="mt-3"><?= ucfirst($row['blog_title']) ?></h5>
                        <p><?= $row['blog_body'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php include "sidebar.php" ?>
    </div>
</div>
<?php include "footer.php" ?>