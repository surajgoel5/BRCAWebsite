<?php
include_once "navbar.php";
?>
<div class="uk-container uk-margin-medium-top">
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="uk-card uk-card-default">

			<div class="uk-card-header">
				<h1>Contact Us</h1>
			</div>
            <div class="uk-card-body">
			<form data-uk-margin class="uk-form">
                <div class="uk-form-row"><input type="text" id="name" class="uk-input uk-text-meta uk-text-bold"<?php if ($id) echo "value=\"".$id->name."\" disabled=\"\""; ?> placeholder="Your name" >
                </div>
                <div class="uk-form-row"><?php if (!$id){?> <input type="text" id="email" class="form-control" placeholder="Your email" ><? } ?>
                </div>
                <div class="uk-form-row"><textarea id ="feed" class="form-control uk-textarea" rows="3" placeholder="Your query"></textarea>
                    <div class="uk-button uk-button-primary uk-width-1-1 uk-margin-medium-top"  onclick="contactus()">Submit</div>
            </form>
            </div>

				</div>
    <footer style="text-align:center;font-size:2.5vh;padding-top:3vh;padding-bottom:3vh;" class="jumbotron">
	Implemented By Rendezvous' 16 team for IIT Delhi
</footer>
</div>

	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript">
	function contactus() {
    var http = new XMLHttpRequest();
	var feed  = $('textarea#feed').val();
    var url = "contactus.php";
	var params = "feedback="+feed;
	http.open("POST", url, true);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            var reg = JSON.parse((http.responseText));
            console.log(http.responseText);
            if(reg.success){
                UIkit.notification({message:reg.message,pos: 'bottom-left',status:'primary'});
            }
        }
    };
	http.send(params);
	}

    </script>

</body></html>
