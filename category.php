<?php

    include "header.php";
    $id = $_GET['id'];
    if(empty($id)){
        header("location: index.php");
    }
    $sql = "SELECT * FROM blog LEFT JOIN categories ON blog.category=categories.cat_id LEFT JOIN user ON blog.author_id=user.user_id WHERE cat_id='$id' ORDER BY blog.publish_date DESC";
    $query = mysqli_query($config, $sql);
    $rows = mysqli_num_rows($query);
?>
<div class="container mt-2">
	<div class="row">
		<div class="col-lg-8">
        <?php

            if($rows){
               while($row = mysqli_fetch_assoc($query)){ 

        ?>
			<div class="card shadow">
				<div class="card-body d-flex blog_flex">
					<div class="flex-part1">
						<a href="single_post.php?id=<?= $row['blog_id'] ?>"> <img src="admin/upload/<?= $row['blog_img'] ?>"> </a>
					</div>
					<div class="flex-grow-1 flex-part2">
						  <a href="single_post.php?id=<?= $row['blog_id'] ?>" id="title"><?= ucfirst($row['blog_title']) ?></a>
						<p>
						  <a href="single_post.php?id=<?= $row['blog_id'] ?>" id="body">
                          <?= strip_tags(substr($row['blog_body'], 0,300)). "..." ?>
						  </a> <span><br>
                          <a href="single_post.php?id=<?= $row['blog_id'] ?>" class="btn btn-sm btn-outline-primary">Continue Reading
                          </a></span>
                        </p>
						<ul>
							<li class="me-2"><a href=""> <span>
                                <i class="fa-solid fa-pen-to-square"></i></span><?= $row['username'] ?></a>
							</li>
							<li class="me-2">
								<a href=""> <span><i class="fa-regular fa-calendar"></i></span> <?= date('d-M-Y', strtotime($row['publish_date'])) ?> </a>
							</li>
							<li>
								<a href="" class="text-primary"> <span><i class="fa fa-tag" aria-hidden="true"></i></span> <?= $row['cat_name'] ?> </a>
						    </li>
						</ul>
					</div>
				</div>
			</div>
            <?php } } ?>
		</div>
        <?php include "sidebar.php" ?>
	</div>
</div>
<?php

    include "footer.php";

?>