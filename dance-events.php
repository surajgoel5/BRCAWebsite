<!DOCTYPE HTML>

<html>
	<head>
		<title>BRCA, IIT Delhi</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

        <link href="2/ninja-slider.css" rel="stylesheet" type="text/css" />
        <!--ninjaVideoPlugin.js is required only when the slider contains videos, and its link should be placed before the ninja-slider.js link.-->
        <script src="2/ninjaVideoPlugin.js" type="text/javascript"></script>
        <script src="2/ninja-slider.js" type="text/javascript"></script>

        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/animations.css">


        <!-- Custom CSS -->
     	<link rel="stylesheet" href="magnific-popup/magnific-popup.css">
    
        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
		
	</head>
	<body class="homepage">
		<div id="page-wrapper">
			<!-- Header -->
            <div id="header" class="animatedParent animateOnce" data-sequence='700' >
					<!-- Inner -->
						<div class="inner">
							<header>
								<h1><a class="animated fadeIn slower" data-id='1'>Dance Club</a></h1>
							</header>
						</div>
			    <!-- Nav -->						
                    <?php include 'menu.php';?>
			</div> 
		</div>
		<!--Club page navigation-->
		<div id="buttons" class="animatedParent animateOnce" data-sequence='700'>
		    <a href="dance.php" class="btn btn-default customize animated fadeIn slower" data-id='1'>ABOUT</a>
		    <a href="danceteam.php" class="btn btn-default customize animated fadeIn slower" data-id='1'>TEAM</a>
		    <a href="https://drive.google.com/drive/folders/0B1vLhp0aiT7efmQzUEZLNGxOQ3BjMGNIZ1N2cTl4cnJBUWFRVmt5WXMtTzRZUmF5QVNWOGc" target="blank" class="btn btn-default customize animated fadeIn slower" data-id='1'>ARCHIVES</a>
		</div>

        <div class="animatedParent animateOnce" data-sequence='700'>
		<!-- Carousel -->
		<!-- Carousel Image needs to be updated!!!-->
		    <section class="carousel animated fadeIn slower" data-id='2'>
		    <!-- Remove style="..." and align="center"iff Events more
		         than 4-->
		    <!-- For Events <=4 you need to adjust manually. 
		         Nothing for dynamic modification for now -->
			    <div class="reel" align="center" style="margin-left:10px">
				    <article>
					    <a class="image featured"><img src=" images/dance-images/duo.jpg" alt="" /></a>
				    	<header class="active">
					    	<h6><a data-toggle="tab" href="#duo">Duo Dance<br></a></h6>
					    </header>
					    <p>Mid August</p>
				    </article>
				    <article>
					    <a class="image featured"><img src=" images/dance-images/gd.jpg" alt="" /></a>
					<header>
						<h6><a data-toggle="tab" href="#gd">Group Dance</a></h6>
			    		</header>
				    	<p>Last week of January</p>
				    </article>
				    <article>
					    <a class="image featured"><img src=" images/images-dance/fvm.jpg" alt="" /></a>
				    	<header>
					    	<h6><a data-toggle="tab" href="#fvm">Fresher’s Video Making</a></h6>
					    </header>
					    <p>Mid March</p>
			    	</article>
    				<article>
	    				<a class="image featured"><img src=" images/dance-images/idp.jpg" alt="" /></a>
	    				<header>
		    				<h6><a data-toggle="tab" href="#idp"> Institute Dance Production (IDP)</a></h6>
				    	</header>
					    <p>Third week of April</p>
			    	</article>
            <!-- Useless stuff. to be deleted 
				<article>
					<a class="image featured"><img src=" images/images-dance/workshops2.jpg" alt="" /></a>
					<header>
						<h6><a data-toggle="tab" href="#event5">Useless#1</a></h6>
					</header>
					<p>Throughout the semester on weekends</p>
				</article>
				<article>
					<a class="image featured"><img src=" images/images-dance/idp.jpg" alt="" /></a>
					<header>
						<h6><a data-toggle="tab" href="#event6">Useless#2</a></h6>
					</header>
					<p>19th April, 2016</p>
				</article> -->
			    </div> 
		    </section> 
		</div>
        <div id="description" class="animatedParent animateOnce" data-sequence='700'>
            <section  class="tab-content">
                <article id="duo" class="tab-pane fade active in animated fadeIn slower" data-id='2'>
                    <h1>Duo Dance</h1>
                    <p>IIT Delhi presents inter-hostel duo dance competition where the irresistible dancing sensations will make you thump to their beats. This is the first event organised for the fuchas to give them a glimpse of the sensational dancing world of IIT Delhi. The stupendous moves and jhatkas will make you want more and more! Put on your shoes and waltz, salsa and cha cha your way into the world of incredible duet performances!
                    </p>
                    <div id="rotating-pics" style="padding-top: 10px">
                        <div id="ninja-slider">
                            <ul>
                                <li><div data-image=" images/dance-images/duo/1.jpg"></div></li>
                                <li><div data-image=" images/dance-images/duo/2.jpg"></div></li>
                                <li><div data-image=" images/dance-images/duo/3.jpg"></div></li>
                                <li><div data-image=" images/dance-images/duo/5.jpg"></div></li>
                                <li><div data-image=" images/dance-images/duo/6.jpg"></div></li>
                                <li><div data-image=" images/dance-images/duo/7.jpg"></div></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <article id="gd" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <p>Event 2 description</p>
                </article>
                <article id="idp" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <p>Event 3 description</p>
                </article>
                <article id="fvm" class="tab-pane fade animated fadeIn slower" data-id='2' style="padding-bottom: 43.3px">
                    <p>Event 4 description</p>
                </article>
            </section>
        </div>

		<div id="foot">
            <?php include ('footer.php');?>
        </div>
        <!--end-->
 
        <!--start-->
        

			

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.onvisible.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src='assets/js/css3-animate-it.js'></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>

	</body>
</html>