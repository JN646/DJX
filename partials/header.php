<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171210
*/
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $environment; ?>css/custom.css">
	<link rel="icon" href="<?php echo $environment; ?>favicon.ico" type="image/ico" sizes="16x16">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <?php echo"<a class='navbar-brand' href='$environment/index.php'>$VenueName</a>"; ?>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		<li class="nav-item active"><a class="nav-link" href="<?php echo $environment; ?>index.php">Home <span class="sr-only">(current)</span></a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/browse_song.php">Browse</a></li>
		<li class="nav-item"><a class="nav-link disabled" href="#">DEBUG</a></li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?php echo $environment; ?>songs/search_song.php" method="get">
		<input class="form-control mr-sm-2" name="search_val" type="text" placeholder="Search" class="form-control" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" name="SearchButton" value="search" type="submit">Search</button>
    </form>
  </div>
</nav>