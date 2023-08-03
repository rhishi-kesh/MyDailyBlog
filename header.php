<?php include 'config.php'; ?>
<?php
	$page = basename($_SERVER['PHP_SELF'],".php");
	$sql2 = "SELECT * FROM categories";
    $query2 = mysqli_query($config, $sql2);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="img/logo.png">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">
  </head>
  <body class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <div class="container">
	    <a class="navbar-brand" href="index.php">
			<img src="img/logo.png" class="navbar-brand" width="60px !important">
		</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarColor02">
	      <ul class="navbar-nav me-auto">
	        <li class="nav-item">
	          <a class="nav-link <?= ($page == "index")? 'active': ''; ?>" href="index.php">Home
	            <span class="visually-hidden">(current)</span>
	          </a>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
	          <div class="dropdown-menu">
				<?php while($row = mysqli_fetch_assoc($query2)){ ?>
	            <a class="dropdown-item" href="category.php?id=<?= $row['cat_id'] ?>"><?= $row['cat_name'] ?></a>
				<?php } ?>
	          </div>
	        </li>
	      </ul>
		  <?php
		  if(isset($_GET['keybord'])){
			$keyword = $_GET['keybord'];
		  }else{
			$keyword = "";
		  }
		  ?>
	      <form class="d-flex" action="search.php" method="get">
	        	<input class="form-control me-sm-2" type="search" value="<?= $keyword ?>" placeholder="Search" name="keybord" required maxlength="70" autocomplete="off">
	        	<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
	      </form>
	    </div>
	  </div>
	</nav>