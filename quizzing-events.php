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
								<h1><a class="animated fadeIn slower" data-id='1'>Quizzing Club</a></h1>
							</header>
						</div>
			    <!-- Nav -->						
                    <?php include 'menu.php';?>
			</div> 
		</div>
		<!--Club page navigation-->
		<div id="buttons" class="animatedParent animateOnce" data-sequence='700'>
		    <a href="quizzing.php" class="btn btn-default customize animated fadeIn slower" data-id='1'>ABOUT</a>
		    <a href="quizzingteam.php" class="btn btn-default customize animated fadeIn slower" data-id='1'>TEAM</a>
            <a href="https://drive.google.com/folderview?id=0ByQs4RiVZ79jOHB1eklSUDJfbm8&usp=sharing" target="blank" class="btn btn-default customize animated fadeIn slower" data-id='1'>ARCHIVES</a>
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
                        <a class="image featured"><img src=" images/quiz-images/fresher.jpg" alt="" /></a>
                        <header class="active">
                            <h6><a data-toggle="tab" href="#fresher">Fresher's Events</a></h6>
                        </header>
                        <p>August and September, 2017</p>
                    </article>
                    <article>
					    <a class="image featured"><img src=" images/quiz-images/league.jpg" alt="" /></a>
				    	<header>
					    	<h6><a data-toggle="tab" href="#league">League Quizzes<br></a></h6>
					    </header>
					    <p>Throughout the year</p>
				    </article>
				    <article>
					    <a class="image featured"><img src=" images/quiz-images/themed.jpg" alt="" /></a>
				    	<header>
					    	<h6><a data-toggle="tab" href="#themed">Themed Quizzes</a></h6>
					    </header>
					    <p>Throughout the year</p>
			    	</article>
    				<article>
	    				<a class="image featured"><img src=" images/quiz-images/occam.jpg" alt="" /></a>
	    				<header>
		    				<h6><a data-toggle="tab" href="#occam">Occam's Razor</a></h6>
				    	</header>
					    <p>February, 2018</p>
			    	</article>
                    <article>
                        <a class="image featured"><img src=" images/quiz-images/lone.jpg" alt="" /></a>
                        <header>
                            <h6><a data-toggle="tab" href="#lone">Lone Wolf</a></h6>
                        </header>
                        <p>February, 2018</p>
                    </article>
                    <article>
                        <a class="image featured"><img src=" images/quiz-images/mastermind.jpg" alt="" /></a>
                            <h6><a data-toggle="tab" href="#mastermind">Mastermind<br></a></h6>
                        </header>
                        <p>April, 2018</p>
                    </article>
			    </div> 
		    </section> 
		</div>
        <div id="description" class="animatedParent animateOnce" data-sequence='700'>
            <section  class="tab-content"  id="dummy-id">
                <article id="fresher" class="tab-pane fade active in animated fadeIn slower" data-id='2'>
                    <h1>Fresher's Events</h1>
                    <p>
                    The Quizzing Club will introduce newcomers to the style of quizzing in college and show them how to quiz! This will be followed by some freshers only quizzes, all in the months of August and September.
                    </p>
                </article>
                <article id="league" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <h1>League Quizzes</h1>
                    <p>The Quizzing Club conducts a Quizzing League every year, with an auction occurring at the start of the year to form 6 teams. These 6 teams battle it put throughout the year in 6 quizzes, each with varying topics and formats. These include the India Quiz, the Variety Quiz (on Music, Technology, Travel & History), the Jeopardy Quiz and more. </p>
                </article>
                <article id="themed" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <h1>Themed Quizzes</h1>
                    <p style="text-align: center">A series of fun, light-hearted quizzes that we will conduct on topics like popular TV shows, movies, sports, India, etc.</p>
                </article>
                <article id="occam" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <h1>Occam's Razor</h1>
                    <p>The 2 stage interhostel quiz will be conducted in February, in which all 13 hostels battle it out in the prelims, and 6 qualify for the finals.</p>
                </article>
                <article id="lone" class="tab-pane fade animated fadeIn slower" data-id='2'>
                    <h1>Lone Wolf</h1>
                    <p style="text-align: center"> A solo quiz that will occur in February, that is the ultimate test for a quizzer in IIT.</p>
                </article>
                <article id="mastermind" class="tab-pane fade animated fadeIn slower" data-id='2' style="padding-bottom: 43.3px">
                    <h1>Mastermind</h1>
                    <p>TA solo quiz that tests your mastery of one field, like Sports, History, Entertainment, etc in a rapid fire format. The winner gets the prestigious Mastermind Trophy. Held in April.</p>
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