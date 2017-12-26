<?php
 /**
  * Project:		DJ Request Application
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171210
  */
	// Include config file
	require_once($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/config/DBconfig.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/header.php");
?>
<head>
	<title>Song Management</title>
</head>
<body>
	<div class="fluid-container">
		<div class="col-md-12">
			<div class="row">
				<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/nav.php"); ?>
				<div class="col-md-11">
					<br>
					<h1 class="display-4">Song Requests</h1>
					<p>All your active requests this session.</p>
					<?php
					
					$songterms = "SELECT songs.song_name, songs.song_artist, songs.song_year, requests.request_time, requests.request_active
					FROM songs
					INNER JOIN requests
					ON songs.song_id = requests.request_song_id";
					$result = mysqli_query($mysqli, $songterms);
					
					echo "<table>";
					echo "<tr>";
						echo "<th>Song</th>";
						echo "<th>Artist</th>";
						echo "<th>Year</th>";
						echo "<th>Requested at</th>";
						echo "<th>Active</th>";
					echo "</tr>";
					while($row = mysqli_fetch_array($result)) {
						echo "<tr>";
							echo "<td>".$row['song_name']."</td>";
							echo "<td>".$row['song_artist']."</td>";
							echo "<td>".$row['song_year']."</td>";
							echo "<td>".$row['request_time']."</td>";
							echo "<td>".$row['request_active']."</td>";
						echo "</tr>";
					}
					echo "</table>";
					
					?>
				</div> <!-- Close col-md-11 -->
			</div> <!-- Close row -->
		</div> <!-- Close col-md-12 -->
	</div> <!-- Close Container -->
</body>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/djx/djx/partials/footer.php"); ?>