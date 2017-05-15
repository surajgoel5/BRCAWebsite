<?php
list($c_username,$cookie_hash) = explode(',',$_COOKIE['login']);
$secret_word='nyaha';
if (md5($c_username.$secret_word) == $cookie_hash) {
    $id = unserialize($c_username);
} else {
    header('Location: index.php');
    exit;
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

<body style="background-image: url('BG_1.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;" cz-shortcut-listen="true">
<script type="text/javascript">
        $(document).ready(function(){
            var next = 1;
            $(".add-more").click(function(e){
                e.preventDefault();
                var addto = "#b1";
                next = next + 1;
                var newIn = '<div class="input-group" style="margin-top: 1vh; margin-bottom: 5px" id ="field' + next + '" name ="field' + next + '"><span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span> <input type="text" name="mem' + next + '" class="form-control"  placeholder="Name of Member"/> ' +
                    '<span class="input-group-btn"><button id="remove' + (next) + '" class="btn btn-danger remove-me" >-</button></div></span> </div>';
                var newInput = $(newIn);
                $(addto).before(newInput);
                $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                $("#count").val(next);

                $('.remove-me').click(function(e){
                    e.preventDefault();
                    var fieldNum = this.id.charAt(this.id.length-1);
                    var fieldID = "#field" + fieldNum;
//                    $(this).remove();
                    $(fieldID).remove();
//                    next--;
                });
            });



        });
    </script>
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
                            Hi <?php echo $id->name; ?>,
                        </div>
                        <button type="submit" class="btn btn-success" name="doit" onclick="javascript:location.href='index.php'">Logout</button>
                    </div>					</ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
<style>#SELECT_1 {
        background-position: 92% 50%;
        height: 40px;
        vertical-align: middle;
        width: 175px;
        -webkit-appearance: none;
        -webkit-background-clip: padding-box;
        -webkit-locale: en;
        -webkit-perspective-origin: 80px 20px;
        -webkit-transform-origin: 80px 20px;
        background: rgb(255, 255, 255) url(http://dominiquedecooman.com/sites/all/themes/ddc/images/select-arrow.png) no-repeat scroll 92% 50% / auto padding-box padding-box;
        border: 3px solid rgb(239, 239, 239);
        font: normal normal normal 13px/normal Arial, sans-serif;
        margin: 0px;
        padding: 5px 25px 5px 15px;
        -webkit-border-after: 3px solid rgb(239, 239, 239);
        -webkit-border-before: 3px solid rgb(239, 239, 239);
        -webkit-border-end: 3px solid rgb(239, 239, 239);
        -webkit-border-start: 3px solid rgb(239, 239, 239);
    }</style>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="display:flex;">
        <div style="width:250vw;">
        <h1 style="margin-bottom:0vh;">Blitzkrieg</h1>
        <h3 style="margin-top:0vh;">(21/10/16)</h3>
        <p>blah blah blah</p>
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
            
            <div class="container meh">

<div id="login-form" >
    <form method="post">

        <div class="col-md-12">

            <div id = "left" style="max-width: 33%; float: left">

            <div class="form-group">
            </div>

            <div  class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-music"></span></span>
                    <input type="text" name="uname" class="form-control" placeholder="Enter Your Band Name" required />
                </div>
            </div>

            <!--                <div id ="field">-->
            <!--                    <div class="form-group">-->
            <!--                        <div class="input-group">-->
            <!--                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>-->
            <!--                            <input type="text" name="mem1" class="form-control"  placeholder="Name of Member" required />-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                <button id="b1" class="btn add-more" type="button">+</button>-->
            <!--                </div>-->


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                    <input type="email" name="altemail" class="form-control" placeholder="Enter an Alternate Email" required />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
                    <input type="text" name="contact" class="form-control" placeholder="Enter Your Contact" required />
                </div>
            </div>
            
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
                    <input type="text" name="city" class="form-control" placeholder="Enter Your City" required />
                </div>
            </div>


            </div>

            <div id = "right" style="max-width: 33%; float: right; margin-top: 15px">

                <div class="input-append form-group">
                    <div id="field">
                        <div class="input-group" id ="field1" name ="prof1" style="margin-bottom: 5px">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="mem1" class="form-control"  placeholder="Name of Member" required />
                        </div>
                        <button id="b1" class="btn add-more right" type="button" >+ Add</button>
                    </div>
                </div>
            </div>
            <div style="position:absolute;left: 50%;top:-20%">
                <?php
                                if ( isset($errMSG) ) {

                ?>
                <div style="position: relative;left: -50%;" class="form-group">
                    <div class="alert message alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                        <span class="glyphicon glyphicon-info-sign"></span><?php echo $errMSG; ?>
                    </div>
                </div>
                <?php
                                }
                ?>
            </div>
            <div id = "center" style="margin:0 auto;width:300px;bottom:0;">


                <div class="text-center" style="padding-bottom: 55%; margin-top: 45%">
                    <p style="color: #fff;font-size: xx-large;"><a href="http://rdv-iitd.com/spectrum-rules" style="color: #fff"><button type="button" class="btn btn-primary btn-xlarge"><strong>Rules</strong></button></a></p>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-paperclip"></span></span>
                        <input type="text" name="link" class="form-control" placeholder="Enter Your Audio file link" required />
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-default right" name="btn-signup">Register</button>
                </div>


            </div>
        </div>

    </form>
</div>
    
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
    <!-- jnkljnfkvdjnfkvdnfkjvndkfsjdn -->
        </div>
        <div>
            <img src="img/Blitzkrieg.jpg" style="position:relative ;float: right;height: 100%;width:100%;border-radius: 6px;">
        </div>
    </div>
    <div class="jumbotron" style="display:flex;">
        <div style="width:250vw;">
        <h1 style="margin-bottom:0vh;">Kaliedoscope</h1>
        <h3 style="margin-top:0vh;">(22/10/16)</h3>
        <p>blah blah blah</p>
        <select class="ctools-jump-menu-select ctools-jump-menu-change form-select ctools-jump-menu-processed" id="SELECT_1" name="jump">
            <option selected="selected" id="OPTION_2">
                - Number of passes -
            </option>
            <option>
                1
            </option>
            <option >
                2
            </option>
            <option>
                3
            </option>
        </select>
        </div>
        <div>
            <img src="img/Kaliedoscope.jpg" style="position:relative ;float: right;height: 100%;width:100%;border-radius: 6px;">
        </div>
    </div>
    <div class="jumbotron" style="display:flex;">
    <div style="width:250vw;">
        <h1 style="margin-bottom:0vh;">Spectrum</h1>
        <h3 style="margin-top:0vh;">(23/10/16)</h3>
        <p>blah blah blah</p>
        <select class="ctools-jump-menu-select ctools-jump-menu-change form-select ctools-jump-menu-processed" id="SELECT_1" name="jump">
            <option selected="selected" id="OPTION_2">
                - Number of passes -
            </option>
            <option>
                1
            </option>
            <option >
                2
            </option>
            <option>
                3
            </option>
        </select>
    </div>
        <div>
            <img src="img/spectrum.jpg" style="position:relative ;float: right;height: 100%;width:100%;border-radius: 6px;">
        </div>
    </div>
    <div class="jumbotron" style="display:flex;">
    <div style="width:250vw;">
        <h1 style="margin-bottom:0vh;">Dhoom</h1>
        <h3 style="margin-top:0vh;">(24/10/16)</h3>
        <p>blah blah blah</p>
        <select class="ctools-jump-menu-select ctools-jump-menu-change form-select ctools-jump-menu-processed" id="SELECT_1" name="jump">
            <option selected="selected" id="OPTION_2">
                - Number of passes -
            </option>
            <option>
                1
            </option>
            <option >
                2
            </option>
            <option>
                3
            </option>
        </select>
    </div>
        <div>
            <img src="img/Dhoom.jpg" style="position:relative ;float: right;height: 100%;width:100%;border-radius: 6px;">
        </div>
    </div>
    <footer>
        Implemented By Rendezvous' 16 team for IIT Delhi
    </footer>	</div>

<!-- Latest compiled and minified JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body></html>