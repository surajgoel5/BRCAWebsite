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
								<h1><a class="animated fadeIn slower" data-id='1'>Music Club</a></h1>
							</header>
						</div>
			    <!-- Nav -->						
                    <?php include 'menu.php';?>
			</div> 
		</div>
		<!--Club page navigation-->
		<div id="buttons" class="animatedParent animateOnce" data-sequence='700'>
		    <a href="music.php" class="btn btn-default customize animated fadeIn slower" data-id='1'>ABOUT</a>
		    <a href="musicteam.php" class="btn btn-default customize animated fadeIn slower" data-id='1'>TEAM</a>
            <a href="https://drive.google.com/folderview?id=0B1vLhp0aiT7efmtzV3RQdmU3Q1ZaTHQ4SkhMQzBoWnZCX1lKZWpoQ01wYUhUaUVSTEJYTGc&usp=sharing" target="blank" class="btn btn-default customize animated fadeIn slower" data-id='1'>ARCHIVES</a>
		</div>

        <div class="animatedParent animateOnce" data-sequence='700'>
		<!-- Carousel -->
		    <section  id="dummy-id" class="carousel animated fadeIn slower" data-id='2'>
		    <!-- Remove style="..." and align="center"iff Events more
		         than 4-->
		    <!-- For Events <=4 you need to adjust manually. 
		         Nothing for dynamic modification for now -->
			    <div class="reel">
				    <article>
					    <a class="image featured"><img src=" images/music-images/dhwani.jpg" alt="" /></a>
				    	<header class="active">
					    	<h6><a data-toggle="tab" href="#dhwani">Dhwani<br></a></h6>
					    </header>
					    <p>First Week of September, 2017</p>
				    </article>
				    <article>
					    <a class="image featured"><img src=" images/music-images/jukebox.jpg" alt="" /></a>
					    <header>
						    <h6><a data-toggle="tab" href="#jukebox">Jukebox</a></h6>
			    		</header>
				    	<p>November, 2017</p>
				    </article>
				    <article>
					    <a class="image featured"><img src=" images/music-images/ragnarok.jpg" alt="" /></a>
				    	<header>
					    	<h6><a data-toggle="tab" href="#ragnarok">Ragnarok</a></h6>
					    </header>
					    <p>Mid January, 2018</p>
			    	</article>
    				<article>
	    				<a class="image featured"><img src=" images/music-images/mehfil.jpg" alt="" /></a>
	    				<header>
		    				<h6><a data-toggle="tab" href="#mehfil">Mehfil</a></h6>
				    	</header>
					    <p>Mid February, 2018</p>
			    	</article>
                    <article>
                        <a class="image featured"><img src=" images/music-images/consonance.jpg" alt="" /></a>
                        <header>
                            <h6><a data-toggle="tab" href="#consonance">Consonance<br></a></h6>
                        </header>
                        <p>End of April, 2018</p>
                    </article>
			    </div> 
		    </section> 
		</div>
        <div id="description" class="animatedParent animateOnce" data-sequence='700'>
            <section  class="tab-content"  id="dummy-id">
                <article id="dhwani" class="tab-pane fade active in animated fadeIn slower" data-id='2'>
                    <h1>Dhwani</h1>
                    <p>Witness the fusion of Bollywood, folk-fusion and semi classical forms of music into one melodic performance. Watch the hostels compete against each other in this battle of the bands.
                    </p>
                    <div style="padding-top: 10px">
                        <div id="ninja-slider1">
                            <ul>
                                <li><div data-image=" images/music-images/dhwani/1.jpg"></div></li>
                                <li><div data-image=" images/music-images/dhwani/2.jpg"></div></li>
                                <li><div data-image=" images/music-images/dhwani/3.jpg"></div></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <article id="jukebox" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <h1>Jukebox</h1>
                    <p>
                    This is the Western Band Interhostel Competition. Witness the hostels competing against each other as they battle it out to win the event. An evening dedicated to the geniuses of Western Music.
                    </p>
                    <div style="padding-top: 10px">
                        <div id="ninja-slider2">
                            <ul>
                                <li><div data-image=" images/music-images/jukebox/1.jpg"></div></li>
                                <li><div data-image=" images/music-images/jukebox/2.jpg"></div></li>
                                <li><div data-image=" images/music-images/jukebox/3.jpg"></div></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <article id="ragnarok" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <h1>Ragnarok</h1>
                    <p>Music Club presents its most awaited event of the year, "Ragnarok - The Battle of the Years", where each year (Freshers, Sophomores, Juniors, Seniors and Post Graduates) put in all they have, to show their mettle by presenting a perfect concoction of both Indian and Western songs.</p>
                    <div style="padding-top: 10px">
                        <div id="ninja-slider3">
                            <ul>
                                <li><div data-image=" images/music-images/ragnarok/1.jpg"></div></li>
                                <li><div data-image=" images/music-images/ragnarok/2.jpg"></div></li>
                                <li><div data-image=" images/music-images/ragnarok/3.jpg"></div></li>
                                <li><div data-image=" images/music-images/ragnarok/4.jpg"></div></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <article id="mehfil" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <h1>Mehfil</h1>
                    <p>This event features rich performances comprising of Ghazals, Qawalis, Indian Folk, Sufi, Bhajan and semi-classical songs. The aim of this event is to bridge the gap between Faculty, Postgraduates and Undergraduate students by teaming them all up together on the occasion of ethnic day when we rememeber our roots and dress up in ethnic attire.</p>
                    <div style="padding-top: 10px">
                        <div id="ninja-slider4">
                            <ul>
                                <li><div data-image=" images/music-images/mehfil/1.jpg"></div></li>
                                <li><div data-image=" images/music-images/mehfil/2.jpg"></div></li>
                                <li><div data-image=" images/music-images/mehfil/3.jpg"></div></li>
                                <li><div data-image=" images/music-images/mehfil/4.jpg"></div></li>
                            </ul>
                        </div>
                    </div>
                </article>
                <article id="consonance" class="tab-pane fade animated fadeIn slower" data-id='2' style="padding-bottom: 43.3px">
                    <h1>Consonance</h1>
                    <p>An informal and fun music event for the entire IITD community. A platform for anyone passionate about music and willing to showcase their talent. Consonance aims to bring together the entire campus music fraternity.</p>
                    <div style="padding-top: 10px">
                        <div id="ninja-slider5">
                            <ul>
                                <li><div data-image=" images/music-images/consonance/1.jpg"></div></li>
                                <li><div data-image=" images/music-images/consonance/2.jpg"></div></li>
                                <li><div data-image=" images/music-images/consonance/3.jpg"></div></li>
                                <li><div data-image=" images/music-images/consonance/4.jpg"></div></li>
                                <li><div data-image=" images/music-images/consonance/5.jpg"></div></li>
                                <li><div data-image=" images/music-images/consonance/6.jpg"></div></li>
                            </ul>
                        </div>
                    </div>
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