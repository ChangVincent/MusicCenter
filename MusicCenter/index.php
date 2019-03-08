<?php
include("includes/config.php");

//session_destroy(); 

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to MusicCenter!!</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	
	<div id="mainContainer">

		<div id="topContainer">

			<div id="navBarContainer">
				<nav class="navBar">
					<a href="index.php" class="logo">
						<img src="assets/images/icons/Clover_48px.png" alt="logo">
					</a>

					<div class="group">
						<div class="navItem">
							<a href="search.php" class="navItemLink">Search
								<img src="assets/images/icons/Search_24px.png" class="icon" alt="Search">
							</a>
						</div>
					</div>

					<div class="group">
						<div class="navItem">
							<a href="browse.php" class="navItemLink">Browse</a>
						</div>

						<div class="navItem">
							<a href="yourMusic.php" class="navItemLink">Your Music</a>
						</div>

						<div class="navItem">
							<a href="profile.php" class="navItemLink">Vincent CHANG</a>
						</div>
					</div>

				</nav>
			</div>

		</div>


		<div id="nowPlayingBarContainer">

			<div id="nowPlayingBar">

				<div id="nowPlayingLeft">
					<div class="content">
						<span class="albumLink">
							<img src="assets/images/albums/20anni.jfif" class="albumArtwork">
						</span>

						<div class="trackInfo">
							<span class="trackName">
								<span>20 anniversary - Beyond Imagination</span>
							</span>

							<span class="artistName">
								<span>KOKIA</span>
							</span>
						</div>
					</div>
				</div>

				
				<div id="nowPlayingCenter">

					<div class="content playerControls">

						<div class="buttons"> 

							<button class="controlButton shuffle" title="Shuffle button">
								<img src="assets/images/icons/Shuffle_24px.png" alt="Shuffle">
							</button>

							<button class="controlButton previous" title="Previous button">
								<img src="assets/images/icons/Previous_24px.png" alt="Previous">
							</button>

							<button class="controlButton play" title="Play button">
								<img src="assets/images/icons/Circled Play_24px.png" alt="Play">
							</button>

							<button class="controlButton pause" title="Pause button" style="display: none;">
								<img src="assets/images/icons/Pause_24px.png" alt="Pause">
							</button>

							<button class="controlButton next" title="Next button">
								<img src="assets/images/icons/Next_24px.png" alt="Next">
							</button>

							<button class="controlButton repeat" title="Repeat button">
								<img src="assets/images/icons/Repeat_24px.png" alt="Repeat">
							</button>

						</div>

						<div class="playbackBar">

							<span class="progressTime current">0.00</span>

							<div class="progressBar">
								<div class="progressBarBg">
									<div class="progress"></div>
								</div>
							</div>

							<span class="progressTime remaining">0.00</span>
							
						</div>
						
					</div>

				</div>
				

				<div id="nowPlayingRight">
					<div class="volumeBar">
						<button class="controlButton volume" title="volume button">
							<img src="assets/images/icons/Sound_24px.png" alt="volume">
						</button>

						<div class="progressBar">
							<div class="progressBarBg">
								<div class="progress"></div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>













</body>
</html>