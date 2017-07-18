<!DOCTYPE HTML>

<html>
	<head>
		<title>BRCA, IIT Delhi</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="apple-touch-icon" sizes="180x180" href="favicons1/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicons1/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicons1/favicon-16x16.png">
        <link rel="manifest" href="favicons1/manifest.json">
        <link rel="mask-icon" href="favicons1/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">
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
        <link href="https://fonts.googleapis.com/css?family=Amethysta" rel="stylesheet">
		
	</head>
	<body class="homepage">
		<div id="page-wrapper">
			<!-- Header -->
            <div id="header" class="animatedParent animateOnce" data-sequence='700' >
					<!-- Inner -->
						<div class="inner">
							<header>
								<h1><a class="animated fadeIn slower" data-id='1'>Photography and Film Club</a></h1>
							</header>
						</div>
			    <!-- Nav -->						
                    <?php include 'menu.php';?>
			</div> 
		</div>
		<!--Club page navigation-->
		<div id="buttons" class="animatedParent animateOnce" data-sequence='700'>
		    <a href="pfc.php" class="btn btn-default customize animated fadeIn slower" data-id='1'>ABOUT</a>
		    <a href="pfcteam.php" class="btn btn-default customize animated fadeIn slower" data-id='1'>TEAM</a>
            <a href="https://drive.google.com/drive/u/0/folders/0B1vLhp0aiT7edVJGMFBjdy1mc2M" target="blank" class="btn btn-default customize animated fadeIn slower" data-id='1'>ARCHIVES</a>
		</div>

        <div class="animatedParent animateOnce" data-sequence='700'>
		<!-- Carousel -->
		    <section  id="dummy-id" class="carousel animated fadeIn slower" data-id='2'>
		    <!-- Remove style="..." and align="center"iff Events more
		         than 4-->
		    <!-- For Events <=4 you need to adjust manually. 
		         Nothing for dynamic modification for now -->
			    <div class="reel" align="center" style="margin-left:10px">
				    <article>
                        <a class="image featured"><img src=" images/pfc-images/photography.jpg" alt="" /></a>
                        <header>
                            <h6><a data-toggle="tab" href="#photography">Photography</a></h6>
                        </header>
                        <p>???</p>
                    </article>
                    <article>
					    <a class="image featured"><img src=" images/pfc-images/workshop.jpg" alt="" /></a>
				    	<header class="active">
					    	<h6><a data-toggle="tab" href="#workshop">Film Making Workshop<br></a></h6>
					    </header>
					    <p>???</p>
				    </article>
				    <article>
					    <a class="image featured"><img src=" images/pfc-images/film.jpeg" alt="" /></a>
				    	<header>
					    	<h6><a data-toggle="tab" href="#film">Film Making</a></h6>
					    </header>
					    <p>???</p>
			    	</article>
    				<article>
	    				<a class="image featured"><img src=" images/pfc-images/graphic.jpg" alt="" /></a>
	    				<header>
		    				<h6><a data-toggle="tab" href="#graphic">Graphic Designing</a></h6>
				    	</header>
					    <p>???</p>
			    	</article>
			    </div> 
		    </section> 
		</div>
        <div id="description" class="animatedParent animateOnce" data-sequence='700'>
            <section  class="tab-content"  id="dummy-id">
                <article id="photography" class="tab-pane fade active in animated fadeIn slower" data-id='2'>
                    <h1>Photography</h1>
                    <p>
                    This is your chance to showcase your photography skills and compete with others from the institute. May the best photo win.
                    </p>
                </article>
                <article id="workshop" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <h1>Film Making Workshop</h1>
                    <p>Here you will be able to learn not just the technical aspects of film making but also about the very art of film making, helping you understand what goes into film making.</p>
                </article>
                <article id="film" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <h1>Film Making</h1>
                    <p>This is a chance for you to use your scriptwriting, directing and cinematography skills to make film just how you want. Get acting and directing I your very own film.</p>
                </article>
                <article id="graphic" class="tab-pane fade animated fadeIn slower" data-id='2' style="padding-bottom: 43.3px">
                    <h1>Graphic Designing</h1>
                    <p>Bored of looking for things to shoot? Well go digital and create your own. Let your imagination run and come up with the most  innovatiove photo.</p>
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