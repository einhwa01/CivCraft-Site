<?php
getStats();
getUnits();

$unusedPop = $_SESSION['population'] - $_SESSION['explorers'] - $_SESSION['preachers'] - $_SESSION['scientists'] - $_SESSION['workers'] - $_SESSION['warriors'];
?>

<div id="pageContent">

	<div id="content">
		<h3>Explore Unknown Lands</h3>
		<P>
			You can send out your explorers here in different directions to see if they can find suitable land upon which to build buildings.
		</P>
		<form name="explore" id="explore" method="post" accept-charset="utf-8" class="main-frm">
			<ul>
				
			</ul>
		</form>
		<div id="message"></div>
	</div>

<script>
	(function($) {
		function processForm(e) {
			$.ajax({
				url : 'gamepagesphp/exploresubmit.php',
				dataType : 'html',
				type : 'POST',
				data : $(this).serialize(),
				success : function(msg, textStatus, jQxhr) {
					
					$('#message').html("<p><i><center>" + msg + "</center></i></p>");
				},
				error : function(jqXhr, textStatus, errorThrown) {
					console.log(errorThrown);
				}
			});

			e.preventDefault();
		}


		$('#trainunits').submit(processForm);
	})(jQuery);
</script>

</div>