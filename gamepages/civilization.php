
<div id="pageContent">
	
	
<div id="content">
	<h3><?php 
		echo "Welcome <strong>".$_SESSION['username']."</strong>, leader and ruler of <strong>".$_SESSION['civname']."</strong>"; ?> 
	</h3>
    <P>Your civilization has the following traits:
    	<?php echo "<br>Your people are <strong>".$_SESSION['civtype']."</strong>.";
    	  echo "<br>They have a <strong>".$_SESSION['civdisp']."</strong> disposition."; 
    	  echo "<br>They are naturally good with <strong>".$_SESSION['civbonus']."</strong>."; ?>    
    </P>
</div>




<!-- <script>
$(document).ready(function(){
	
	$.ajax({
      url: 'info.php',
      type: 'post',
      data: {'action': 'follow', 'userid': '11239528343'},
      success: function(data, status) {
        if(data == "ok") {
          $('#followbtncontainer').html('<p><em>Following!</em></p>');
          var numfollowers = parseInt($('#followercnt').html()) + 1;
          $('#followercnt').html(numfollowers);
        }
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    });
	
});

    (function($){
        function processForm( e ){
            $.ajax({
                url: 'signup.php',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: $(this).serialize(),
                success: function( data, textStatus, jQxhr ){
                    $('#response pre').html( data );
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

            e.preventDefault();
        }

        $('#civcreate').submit( processForm );
    })(jQuery);
</script> -->

</div>