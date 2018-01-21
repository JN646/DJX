<?php
/**
* Project:		DJ Request Application
* Copyright:	(C) JGinn 2017 - 2018
* FileCreated:	171210
*/

// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBVar.php");

// Include header
include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");

// LastFM library
require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/lib/lastfm.php");

//Login handler
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
	//header("location: http://localhost/djx/djx/accounts/login.php");
	//exit;
}
?>
<head>
	<title>Song Request</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-12">
					<br>
					<div class="jumbotron jumbo-header" id="header">
						<div class="row">
							<div class="col-md-9">
								<?php
								// Add venue name.
								echo"<h1 class='display-2 text-center'>$VenueName</h1>";
								
								// Add venue slogan.
								echo"<h1 class='lead text-center'>$VenueSlogan</h1>";
								
								// Browsing button.
								// <form class="form-inline">
									// <button class="form-control btn btn-primary">Start Browsing</button>
								// </form>
								?>
							</div>
							<div class="col-md-3 jumbo-aside">
								<div class="col-md-12" style="height: 150px">
								<p>Thank You for choosing the private area of our club. As a VIP you can use these devices to request songs straight to the DJ.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 offset-md-3 offset-sm-0" id="search_back">
						<div class="col-md-12 offset-md-0 offset-sm-0">
							<form class="form-inline my-2 my-lg-0" action="songs/search_song.php" method="get">
								<div class="form-inline">
									<input name="search_val" type="text" id="txtSearch" placeholder="Search" class="form-control mr-sm-2" style="font-size: 24px;"></input>
									<button class="btn btn-outline-success my-2 my-sm-0" name="SearchButton" value="search" type="submit">Search</button>
								</div>
							</form>
						</div>
					</div>
					<br>
					<div class="row">
						<script>
						// Fade in Header.
						$( document ).ready(function() {
							$("#header").fadeIn('slow');
						});
						
						// Expand search box.
						$(document).ready(function() {
							$('#txtSearch').width(500);
							$('#txtSearch').focus(function() {
								$(this).animate({
									width: 750
								})
							});
							
							// Restore to original size.
							$('#txtSearch').blur(function() {
								$(this).animate({
									width: 500
								})
							});
						});
						</script>
						<?php
						// Attempt select query execution.
						$sql = "SELECT * FROM songs WHERE song_album <> '' ORDER BY RAND () ASC LIMIT 12";
						
						// Process each row.
						if($result = mysqli_query($mysqli, $sql)){
							if(mysqli_num_rows($result) > 0){
								while($row = mysqli_fetch_array($result)){
									
									// Create song block.
									echo"<div class='col-md-2' id='song_block'>";
									
										// Set block border.
										echo "<div class-'col-md-12 border' border-primary>";
											
											// Cover Image.
											echo "<a href='songs/song_profile.php?song_id=" .$row['song_id']. "'><img class='card-img-top' onerror=this.src='images/250x250.png' src=\"";
												echo LastFMArtwork::getArtwork($row['song_artist'],$row['song_album'], true, "large");
											echo "\"></a>";
											
											// Song Name.
											echo"<h4 class='text-center'>" . $row['song_name'] . "</h4>";
											
											// Song Artist.
											echo"<h5 class='text-center'>" . $row['song_artist'] . "</h5>";
											
										echo "</div>"; // Inner block.
									echo"</div>"; // Outer block.
								}
								
								// Free result set
								mysqli_free_result($result);
							} else{
								
								// No songs in the database.
								echo "<p class='text-center'>No songs were found.</p>";
							}
						} else{
							
							// Error message.
							echo "ERROR: Not able to execute $sql. " . mysqli_error($mysqli);
						}
						?>
					</div> <!-- Close row -->
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>