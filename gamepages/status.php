<?php
getStats();
getUnits();
getBuildings();


?>

<div id="pageContent">
	
	
<div id="content">
	<h3>Civ Status</h3>
	
<table class="tg">
  <tr>
    <th colspan="5" class="tophead"><strong>Status</strong></th>    
  </tr>
  <tr>
  	<th>Money</th>
  	<th>Population</th>
  	<th>Science</th>
  	<th>Faith</th>
  	<th>Land</th>
  </tr>
  <tr>
  	<?php
  		echo "<td>".$_SESSION['money']."</td>";
		echo "<td>".$_SESSION['population']."</td>";
		echo "<td>".$_SESSION['science']."</td>";
		echo "<td>".$_SESSION['faith']."</td>";
		echo "<td>".$_SESSION['land']."</td>";  	
  	?>
  </tr>
</table>

<table class="tg">
  <tr>
    <th colspan="5" class="tophead"><strong>Buildings</strong></th>    
  </tr>
  <tr>
  	<th>Homes</th>
  	<th>Barracks</th>
  	<th>Shrines</th>
  	<th>Markets</th>
  	<th>Schools</th>
  </tr>
  <tr>
  	<?php
  		echo "<td>".$_SESSION['homes']."</td>";
		echo "<td>".$_SESSION['barracks']."</td>";
		echo "<td>".$_SESSION['shrines']."</td>";
		echo "<td>".$_SESSION['markets']."</td>";
		echo "<td>".$_SESSION['schools']."</td>";  	
  	?>
  </tr>
</table>

<table class="tg">
  <tr>
    <th colspan="5" class="tophead"><strong>Units</strong></th>    
  </tr>
  <tr>
  	<th>Explorers</th>
  	<th>Preachers</th>
  	<th>Scientists</th>
  	<th>Workers</th>
  	<th>Warriors</th>
  </tr>
  <tr>
  	<?php
  		echo "<td>".$_SESSION['explorers']."</td>";
		echo "<td>".$_SESSION['preachers']."</td>";
		echo "<td>".$_SESSION['scientists']."</td>";
		echo "<td>".$_SESSION['workers']."</td>";
		echo "<td>".$_SESSION['warriors']."</td>";  	
  	?>
  </tr>
</table>
	
</div>


</div>