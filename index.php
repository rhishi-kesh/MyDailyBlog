<?php

    include "header.php";
	// pagination
	if(!isset($_GET['page'])){
		$page = 1;
	}else{
		$page = $_GET['page'];
	}
	$limit = 2;
	$offset = ($page-1)*$limit;
    $sql = "SELECT * FROM blog LEFT JOIN categories ON blog.category=categories.cat_id LEFT JOIN user ON blog.author_id=user.user_id ORDER BY blog.publish_date DESC LIMIT $offset, $limit";
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
								<a href="category.php?id=<?= $row['cat_id'] ?>" class="text-primary"> <span><i class="fa fa-tag" aria-hidden="true"></i></span> <?= $row['cat_name'] ?> </a>
						    </li>
						</ul>
					</div>
				</div>
			</div>
            <?php } } ?>
			<!-- pagination -->
			<?php

				$pagination = "SELECT * FROM blog";
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
        <?php include "sidebar.php" ?>
	</div>
</div>
<?php

    include "footer.php";

?>