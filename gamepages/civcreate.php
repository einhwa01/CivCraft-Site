

<div id="pageContent">

<div id="content">
	<h3>What type of civilization will you found?</h3>
    <P>Create your civilization below.  You will need to decide what you and your people will call yourselves.  Also you will need to pick your civilization type, disposition, and bonus.  These will
    	affect the growth and future of you society and cannot be changed later!  Choose wisely!</P>
    	<br/>
    	<form name="civcreate" id="civcreate" method="post" accept-charset="utf-8" class="main-frm">
    		<ul>		
				
					<input type="text" maxlength="30" name="civname" placeholder="Civilization Name (ex: United States of Whateva)" id="civname" required>
				
				<br>
				
				<blockquote>What type of people are you?</blockquote>
					<select id="civtype" name="civtype">
						<option>Explorers: Training Cost -10%</option>
						<option>Scientists: Training Cost -10%</option>
						<option>Warriors: Training Cost -10%</option>
						<option>Builders: Training Cost -10%</option>
						<option>Preachers: Training Cost -10%</option>
					</select>
				
				<br>
					<blockquote>What are your people's disposition?</blockquote>					
					<select id="civdisp" name="civdisp">
						<option>Brave: Casualties Taken -10%</option>
						<option>Cynical: Espionage Defense +10%</option>
						<option>Deceitful: Espionage Offense +10%</option>
						<option>Friendly: Population Growth +10%</option>
						<option>Trustworthy: Faith Power +10%</option>
						
					</select>
				
				<br>
					<blockquote>Pick a bonus for your civilization</blockquote>			
					<select id="civbonus" name="civbonus">
						<option>Attack: Offensive Power +10%</option>
						<option>Defense: Defensive Power +10%</option>
						<option>Research: Technology Speed +10%</option>
						<option>Land: Exploring Speed +10%</option>
					</select>
				
				<br>
				
				
					<input id="submit" class="submit" type="submit" value="Create">
				
			</ul>
	</form>
</div>

<script>


    (function($){
        function processForm( e ){
            $.ajax({
                url: 'gamepagesphp/civcreatesubmit.php',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: $(this).serialize(),
                success: function( data, textStatus, jQxhr ){
                    $('#content').html( "Civ Created!" );
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

            e.preventDefault();
        }

        $('#civcreate').submit( processForm );
    })(jQuery);
</script>

</div>