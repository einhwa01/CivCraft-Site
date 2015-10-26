<?php
getStats();
getUnits();

$unusedPop = $_SESSION['population'] - $_SESSION['explorers'] - $_SESSION['preachers'] - $_SESSION['scientists'] - $_SESSION['workers'] - $_SESSION['warriors'];
?>

<div id="pageContent">

	<div id="content">
		<h3>Train your units </h3>
		<P>
			Here you can train your population into special units.  Keep in mind trained units will not reproduce like the normal population.
		</P>
		<form name="trainunits" id="trainunits" method="post" accept-charset="utf-8" class="main-frm">
			<ul>
				<h2>
					You have <i id="unused_pop">
					<?php
					echo $unusedPop;
					?>
					</i> free civilians to train.
				</h2>
				
				<label for="explorers">Explorers:</label>
				<i id="explorers">
					<?php
					echo $_SESSION['explorers'];
					?></i>
				<input id="explorers" name="explorers" placeholder="#totrain" class="input-mini" type="number" step="1" min="0">				
				<blockquote>
					Explorers will find land for you.  It takes 1 Explorer 4 hours to find 1 suitable plot of land.
				</blockquote>
				<hr>
				
				<label for="preachers">Preachers:</label>
				<i id="preachers">
					<?php
					echo $_SESSION['preachers'];
					?></i>
				<input id="preachers" name="preachers" placeholder="#totrain" class="input-mini" type="number" step="1" min="0">				
				<blockquote>
					Preachers will spread your civilization's religion.  This gives you faith which can be used to purchase bonuses.
				</blockquote>
				<hr>
				
				<label for="scientists">Scientists:</label>
				<i id="scientists">
					<?php
					echo $_SESSION['scientists'];
					?></i>
				<input id="scientists" name="scientists" placeholder="#totrain" class="input-mini" type="number" step="1" min="0">				
				<blockquote>
					Scientists will progress your technology.  They generate science which can be used to earn new advancements.
				</blockquote>
				<hr>
				
				<label for="workers">Workers:</label>
				<i id="workers">
					<?php
					echo $_SESSION['workers'];
					?></i>
				<input id="workers" name="workers" placeholder="#totrain" class="input-mini" type="number" step="1" min="0">				
				<blockquote>
					Workers will build for you.  The more workers the faster a building or improvement is completed.
				</blockquote>
				<hr>
				
				<label for="warriors">Warriors:</label>
				<i id="warriors">
					<?php
					echo $_SESSION['warriors'];
					?></i>
				<input id="warriors" name="warriors" placeholder="#totrain" class="input-mini" type="number" step="1" min="0">				
				<blockquote>
					Warriors are the back bone of your military.  They can be trained into elite units with the right civilization advancements.
				</blockquote>

				<input id="submit" class="submit" type="submit" value="Train">

			</ul>
		</form>
		<div id="message"></div>
	</div>

<script>
	(function($) {
		function processForm(e) {
			$.ajax({
				url : 'gamepagesphp/recruitsubmit.php',
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