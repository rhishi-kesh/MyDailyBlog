<?php 

    include "config.php";
    $sql2 = "SELECT * FROM categories";
    $query2 = mysqli_query($config, $sql2);

    $sql3 = "SELECT * FROM  blog ORDER BY publish_date DESC LIMIT 5";
    $query3 = mysqli_query($config, $sql3);

?>
<div class="col-lg-4">
    <div class="card">
        <div class="card-body d-flex right-section">
            <div id="categories">
                <h6>Categories</h6>
                <ul>
                    <?php while($row = mysqli_fetch_assoc($query2)){ ?>
                    <li>
                        <a href="category.php?id=<?= $row['cat_id'] ?>" class="text-primary fw-bold"><?= $row['cat_name'] ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div id="posts">
                <h6>Recent Posts</h6>
                <ul>
                <?php while($row1 = mysqli_fetch_assoc($query3)){ ?>
                    <li>
                        <a href="single_post.php?id=<?= $row1['blog_id'] ?>" class="text-primary fw-bold"><?= $row1['blog_title'] ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>