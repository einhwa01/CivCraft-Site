<?php
session_start();
if(!isset($_SESSION['id'])){
	header("Location: index.html");
}

require_once 'dbaccess.php';
require_once 'functions.php';

getCiv();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Civival</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="main.css" rel="stylesheet" type="text/css" />
	<link href="menu.css" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript" src="script/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="script/script.js"></script>
	
	</head>
<body>

<div id="banner">
  <h1> <a href="main.php">Civival</a></h1>
  <br><h1>Can your civilization survive?</h1>
</div>
<div id="menuh-container">
  <div id="menuh">
    <ul>
      <li><a href="#" class="top_parent">Civilization</a> 
      <ul>
      	<li><a href="#civilization">Your Civilization</a></li>
      	<li><a href="#status">Current Status</a></li>
          <li><a href="#policies">Policies</a></li>
      </ul>
     </li>
    </ul>
    <ul>
      <li><a href="#" class="top_parent">Actions</a>
        <ul>
          <li><a href="#explore">Explore</a></li>
          <li><a href="#build">Build</a></li>
          <li><a href="#science">Research</a></li>
          <li><a href="#recruit">Recruit</a></li>
        </ul>
      </li>
    </ul>
    <ul>
      <li><a href="#" class="top_parent">Interactions</a>
        <ul>
          <li><a href="#spy">Espionage</a></li>
          <li><a href="#attack">Attack</a></li>
          <li><a href="#diplomacy">Diplomacy</a></li>
        </ul>
      </li>
    </ul>
    <ul>
      <li><a href="#" class="top_parent">Strategy</a>
        <ul>
          <li><a href="#plans">Battle Plans</a></li>
          <li><a href="#offense">Offense</a></li>
          <li><a href="#defense">Defense</a></li>
        </ul>
      </li>
    </ul>
    <ul>
      <li><a href="#" class="top_parent">Help</a> </li>
    </ul>
    <ul>
      <li><a href="logout.php" class="top_parent">Logout</a> </li>
    </ul>
  </div>
</div>
<div id="container">
  <div id="sidebar">
    <h3>Social</h3>
    <ul>
      <li><a href="#">Local Forums</a></li>
      <li><a href="#">Alliance Forums</a></li>
      <li><a href="#">World Forums</a></li>
      <li><a href="#">Public Forums</a></li>
      <li><a href="#">Message Board</a></li>
    </ul>    
    <h3>Scores</h3>
    <ul>
      <li><a href="#">Current Scores</a></li>
      <li><a href="#">Past Scores</a></li>
      <li><a href="#">High Scores</a></li>
      <iframe src="http://free.timeanddate.com/clock/i4dxz9s5/n263/fti/tt0/tw0/tm2/tb1" frameborder="0" width="196" height="18"></iframe>
    </ul>
  </div>

