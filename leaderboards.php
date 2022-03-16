<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$query = mysqli_query($conn,"select * from quiz.leaderboards ORDER BY person_score DESC");
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="leaderboards.css">
	<title>Leaderboard</title>
   
</head>

<body>
	<!-- 	<div class="blog">Visit <a href="#" target="_blank">My Blog</a></div> -->
	<div class="container">
		<div class="leaderboard">
			<div class="head">
				<i class="fas fa-crown"></i>
				<h1>Leaderboard</h1>
			</div>
			

			<div class="body">
				<?php
					$i=1;
					while($row = mysqli_fetch_array($query)) {
				?>
				<ol>
					<li>
						<mark><?php echo $i;echo ".)";echo $row['person_name']; ?></mark>
						<small><?php echo $row['person_score']; ?></small>
					</li>
				</ol>
				<?php
					$i++;
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>