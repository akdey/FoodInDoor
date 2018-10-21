<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
	<header>
	<div class="wrapper">
		<a class="slidebar" id="slidebar">
			
		</a>
		<button class="openbtn" onclick="openNav()">&#9776;</button> 
		<a class="home activecls" id="home" href="home.php" onclick="homeactive()"><i class="fa fa-home"></i>Home</a>
		<a class="myques" id="myquest" href="myques.php" onclick="myquesactive()"><i class="fa fa-question-circle"></i>My Questions</a>
		<span class="search-container">
			<form method="POST" class="form-search">
			<input type="text" name="search" placeholder="Search.." class="search-name"><button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
			</form>
		</span>
		<a class="account" href="account.php"><i class="fa fa-user-circle"></i></a>
	</div>
	</header>
	<div class="content">
