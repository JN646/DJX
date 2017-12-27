<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/lib/lastfm.php");
?>
<head>
	<title>Song Artists</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<?php
					$genre = urldecode($_GET['song_genre']);
					echo "<h1 class='display-4'>$genre</h1>";
					?>
					<div id="status_bar" class="alert alert-warning" role="alert">This is a warning alert</div>
					<br>
					<div class="row">
						<?php
						// Attempt select query execution
						$sql = "SELECT * FROM songs WHERE song_genre='$genre' ORDER BY song_name ASC";
						if($result = mysqli_query($mysqli, $sql)){
							if(mysqli_num_rows($result) > 0){
								while($row = mysqli_fetch_array($result)){
									echo"<div class='col-md-2'>";
										echo "<div class-'col-md-12 border' border-primary>";
										echo "<img class='card-img-top' onerror=this.src='../images/250x250.png' src=\"";
										echo LastFMArtwork::getArtwork($row['song_artist'],$row['song_album'], true, "large");
										echo "\">";
										echo"<h4 class='text-center'>" . $row['song_name'] . "</h4>";
										echo"<h5 class='text-center'>" . $row['song_artist'] . "</h5>";
										echo"<table width=100%>";
											echo"<td class='text-center'><a href=../requests/functions/func_add_request.php?song_id=" .$row['song_id']. ">Request</a></td>";
											echo"<td class='text-center'><a href=functions/func_edit_song.php?song_id=" .$row['song_id']. ">Edit</a></td>";
											echo"<td class='text-center'><a href=functions/func_delete_song.php?song_id=" .$row['song_id']. ">Delete</a></td>";
										echo"</table>";
										echo "</div>";
									echo"</div>";
								}
								// Free result set
								mysqli_free_result($result);
							} else{
								echo "No songs were found.";
							}
						} else{
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
						}
						?>
						</div>
						<p><a href="browse_song_artist.php">Back</a></p>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<script>
// hide status bar
var status_bar = document.getElementById("status_bar");
status_bar.style.display="none";
</script>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>