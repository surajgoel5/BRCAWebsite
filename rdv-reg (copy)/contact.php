<?php
list($c_username,$cookie_hash) = explode(',',$_COOKIE['login']);
$secret_word='~Kt9az.z*^w~M.Cd';
if (md5($c_username.$secret_word) == $cookie_hash) {
    $id = unserialize($c_username);
    $cat=$id->category;
    if(
        $cat=="faculty"||
        $cat=="vfaculty"||
        $cat=="xfaculty"||
        $cat=="retfaculty"||
        $cat=="head"||
        $cat=="hod"||
        $cat=="adjunct"||
        $cat=="emeritus"||
        ($cat=="staff"&&!strpos($id->user_id, 'cstaff'))
    ){
        if($cat=="staff"&&!strpos($id->user_id, 'cstaff')){
            $catT = "staff/";
            $catD = "_";
        }
        else{
        $catT = "profs/";
        $catD = "~";
    }
        $isStudent=false;
    }
    if(
        $cat=="phd"||
        $cat=="mba"||
        $cat=="msr"||
        $cat=="msc"||
        $cat=="mdes"||
        $cat=="btech"||
        $cat=="mtech"||
        $cat=="dual"||
        $cat=="integrated"
    ){
        $catT = "student/";
        $catD = "*";
        $isStudent=true;
    }
    if(!isset($isStudent)){
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<!-- saved from url=(0034)https://oauth.iitd.ac.in/index.php -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="https://oauth.iitd.ac.in/favicon.ico" type="image/x-icon">
	<title>Rendezvous' 16</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body style="background:#286090" cz-shortcut-listen="true">

	<div class="container">

		<!-- Static navbar -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="http://rdv-iitd.com/">Rendezvous' 16</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="javascript:location.href='account.php'">Home</a></li>
						<li><a href="javascript:location.href='contact.php'">Contact Us</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<div class="navbar-form navbar-right"  >
							<div style="float: left;padding-right:2vw;padding-top: 0vh;font-size:1.5vw;">
								<?php if($id) echo "Hi, ".$id->name; ?>
							</div>
							<button <?php if(!$id) echo "style=\"display:none\""; ?> type="submit" class="btn btn-success" name="doit" onclick="logout()">Logout</button>
						</div>					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>

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
