<?php
include_once "navbar.php";
?>
<div class="container">
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<h1>Hey there!</h1>
			<p>Please fill the form...</p>
			<form>
			<input type="text" id="name" class="form-control"<?php if ($id) echo "value=\"".$id->name."\" disabled=\"\""; ?> placeholder="Your name" >
			<?php if (!$id){?> <input type="text" id="email" class="form-control" placeholder="Your email" ><? } ?>
			<textarea id ="feed" class="form-control" rows="3" placeholder="Your query"></textarea>
			<div class="btn btn-primary btn-success"  onclick="contactus()">Submit</div>
			</form>

				</div>
    <footer style="text-align:center;font-size:2.5vh;padding-top:3vh;padding-bottom:3vh;" class="jumbotron">
	Implemented By Rendezvous' 16 team for IIT Delhi
</footer>	</div>

	<!-- Latest compiled and minified JavaScript -->
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">    
	function logout() {
		document.cookie = 'login' +
			'=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
		location.href='index.php';
	}

	function contactus() {
    var http = new XMLHttpRequest();
	var feed  = $('textarea#feed').val();
	var name  = $('#name').val();
    console.log(feed);
    var url = "passes/contactus.php";
    var kerberos = <? if($id) echo $id->user_id; else echo "$('#email').val();"; ?>;
	var params = "kerberos="+kerberos+"&name="+name+"&feedback="+feed;
	http.open("POST", url, true);
    http.setRequestHeader('Access-Control-Allow-Headers', '*');
    http.setRequestHeader("Access-Control-Allow-Origin", "*");
    http.setRequestHeader("Access-Control-Allow-Credentials", "true");
    http.setRequestHeader("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
    http.setRequestHeader("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");//Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            var reg = JSON.parse((http.responseText));
            console.log(http.responseText);
            if(reg.success){
            	alert(reg.message);
            }
        }
    };
	http.send(params);
	}

    </script>

</body></html>
