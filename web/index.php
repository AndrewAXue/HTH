<?php
$displaying = false;
$coordinates = null;
$showHospitals = $_GET["showHospitals"];
$showSchools = $_GET["showSchools"];
$showLibraries = $_GET["showLibraries"];
$showCommunityCentres = $_GET["showCommunityCentres"];
$showTourismPOI = $_GET["showTourismPOI"];

if (!empty($_GET["json"])) {
    $coordinates = $_GET["json"];
    $displaying = true;


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="One Page Corporate HTML Template">
    <meta name="author" content="">
    <link rel="icon" href="https://i.imgur.com/ho4gBzL.png">

    <!-- Title -->
    <title>CalKulocation - Location Optimization</title>

    <!-- Necessary CSS Files -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">	 	<!-- Google Font -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap  -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Template Main css  -->
    <link href="css/jquery.bxslider.css" rel="stylesheet">
    <!-- Client Logo Slider  -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- Testimonial Slider -->
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css">
    <!-- Testimonial Slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen">
    <!-- Video Popup -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Wow Animation CSS -->

    <!--RESPONSIVE TAB -->
    <link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css">

</head>
<body>
<div class="se-pre-con"></div>
<!-- header -->
<div class="header" id="header">
    <div class="container">
        <div class="row header-top" data-spy="affix" data-offset-top="70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo"><a href="#"><img height="35" width="200"
                                                           src="https://i.imgur.com/1TSRkGp.png"
                                                           alt="logo"></a></div>
                        <div id="menu-icon"><span></span><span></span><span></span></div>
                        <div class="clear"></div>

                    </div>
                    <div class="col-lg-9 col-md-9" id="menu">
                        <div class="menu">
                            <ul>
                                <li><a href="#header">Home</a></li>
                                <li><a href="#features">How To Use</a></li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="wow fadeInDown">CalKulocation</h1>
                <p class="wow fadeInDown">Find your perfect location. CalKulocation helps business owners, city planners, tourists, and home owners to use the city of Hamilton's urban data to help them plan their new venture.</p>
                <br>

            </div>
        </div>


        <form method="GET" action="php/getpoints.php">
            <center>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">


                        <div>
                            <label for="schoolpriority">School Priority</label>
                            <input style="width: 100%;" value=<?php
                            echo (int)$_GET["schoolpriority"];

                            ?> type="range" id="schoolpriority" name="schoolpriority"
                                   min="0" max="10">

                        </div>
                        <div>
                            <label for="hospitalpriority">Hospital Priority</label>
                            <input style="width: 100%;" value= <?php
                            echo (int)$_GET["hospitalpriority"];
                            ?> type="range" id="hospitalpriority" name="hospitalpriority"
                                   min="0" max="10">

                        </div>
                        <div>
                            <label for="tourismpoipriority">Tourism & Entertainment Priority</label>
                            <input style="width: 100%;" value= <?php
                            echo (int)$_GET["tourismpoipriority"];
                            ?> type="range" id="tourismpoipriority" name="tourismpoipriority"
                                   min="0" max="10">

                        </div>


                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6">


                            <div>
                                <label id="lplabel" for="librarypriority">Library Priority</label>
                                <input style="width: 100%;" value= <?php
                                echo (int)$_GET["librarypriority"];
                                ?> type="range" id="librarypriority" name="librarypriority"
                                       min="0" max="10" onchange="updateTextInput(this.value);">

                            </div>
                            <div>
                                <label for="communitycentrespriority">Community Centre Priority</label>
                                <input style="width: 100%;" value= <?php
                                echo (int)$_GET["communitycentrespriority"];
                                ?> type="range" id="communitycentrespriority" name="communitycentrespriority"
                                       min="0" max="10">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6">


                                <div>
                                    <label for="k_value">Number of Results: </label>

                                    <input type="number" default=1 value= <?php
                                    echo (int)$_GET["k_val"];
                                    ?> id="kval" name="k_val"
                                           min="1" max="10"></div>

                                Show Hospitals: <input type="checkbox" name="showHospitals" id="showhospitals"
                                                       value="true" <?php if ($_GET["showHospitals"] == "true") {
                                    echo "checked";
                                } ?> ><br>
                                Show Schools: <input type="checkbox" name="showSchools" id="showschools"
                                                     value="true" <?php if ($_GET["showSchools"] == "true") {
                                    echo "checked";
                                } ?> ><br>
                                Show Libraries: <input type="checkbox" name="showLibraries" id="showlibraries"
                                                       value="true" <?php if ($_GET["showLibraries"] == "true") {
                                    echo "checked";
                                } ?> ><br>
                                Show Community Centres: <input type="checkbox" name="showCommunityCentres" id="showcommunitycentres"
                                                               value="true" <?php if ($_GET["showCommunityCentres"] == "true") {
                                    echo "checked";
                                } ?> >
                                <br>
                                Show Entertainment: <input type="checkbox" name="showTourismPOI" id="showtourismpoi"
                                                           value="true" <?php if ($_GET["showTourismPOI"] == "true") {
                                    echo "checked";
                                } ?> >

                            </div>
                            <br>
                        </div>
                        <input class="btn2" type="submit" value="Get Locations">
            </center>
        </form>


        <div class="row">
            <div class="col-lg-12">
                <div class="toping wow fadeInUp">


                    <?php

                    if ($displaying == true) {
                        $url = "https://kaveenk.me/hth/innerdisplay.php?json=" . $coordinates . "&showHospitals=" . $showHospitals . "&showSchools=" . $showSchools . "&showLibraries=" . $showLibraries."&showCommunityCentres=".$showCommunityCentres."&showTourismPOI=".$showTourismPOI;
                        echo "<iframe frameborder='0' width='1100' height='600' src='" . $url . "'></iframe>";
                    } else {
                        echo "<iframe frameborder='0' width='1100' height='600' src='https://kaveenk.me/hth2/innerdisplay.php'></iframe>";
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- header End-->

<!-- features -->
<div class="section2 dark-section dark-color-bg" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading">
                    <span>Our Algorithm</span>
                    <h2>How do you use it?</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 module">
                <div class="f-box wow fadeInUp" data-wow-duration="1s">
                    <div class="f-img"><img src="images/icon3.png" alt="f1"></div>
                    <a href="#">1: Pick the number of locations</a>
                    <p>Your number of locations will be the “K Value” for our program. So, the amount of different locations of your franchises, potential homes, or tourism spots you would like to consider.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 module">
                <div class="f-box wow fadeInUp" data-wow-duration="2s">
                    <div class="f-img"><img src="images/icon2.png" alt="f2"></div>
                    <a href="#">2: Change your priorities</a>
                    <p>Change the weights on each point of interest to reflect how much each will influence your decision. Home owner with children? Go ahead and increase the weight on schools and recreational centres. Visiting the city? Up the weight on tourism spots. Everything is catered to your individual experience.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 module">
                <div class="f-box wow fadeInUp" data-wow-duration="3s">
                    <div class="f-img"><img src="images/icon6.png" alt="f3"></div>
                    <a href="#">3: Inspect your results</a>
                    <p>Take a look at your results. The blue markers are your optimal spots. Feel free to play around with our other visualization tools, to see where any of the points of interest are (and their respective info cards), walking distances, and much more.</p>
                </div>
            </div>




        </div>
    </div>
</div>
<!-- features End-->


<!-- footer-->

<div class="last-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="footer-copy">
                    <p>Designed for UrbanHacks 2018 by Kaveen Kumarasinghe, Andrew Xue, Alex Xue, and Shawn Cameron</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="foot-social">
                    <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                    <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                    <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                    <a href="#"><i class="icofont icofont-social-pinterest"></i></a>
                    <a href="#"><i class="icofont icofont-social-youtube-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- footer End-->

<script src="js/jquery-1.9.1.min.js"></script>
<!-- For screen gallery tab -->
<script src="js/jquery.min.js"></script>                                                        <!-- librery -->
<script src="js/bootstrap.min.js"></script>
<!-- bootstrap -->
<script src="js/jquery.bxslider.min.js"></script>
<!-- For Logos Slider -->
<script src="js/slick.js" type="text/javascript" charset="utf-8"></script>
<!-- For Testimonial Slider -->
<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
<!-- For Video Pop up -->
<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
<!-- For Screenshot Details -->
<script type="text/javascript" src="js/jquery.gallery.js"></script>
<!-- For Screenshot Details -->
<script src="js/easyResponsiveTabs.js"></script>
<!-- For screen gallery tab -->
<script src="js/wow.min.js"></script>
<!--Wow animation js -->

<script src="js/retina.js"></script>                      <!-- Retina js -->
<script src="js/retina.min.js"></script>                  <!-- Retina js -->

<script>

    function updateTextInput(val) {
        document.getElementById('lplabel').value=val;
    }

</script>

<script>
    function updateTextInput(val) {
        document.getElementById('lplabel').value=val;
    }
    $(document).ready(function () {

        //Screenshot in details slider ==============================================

        $(function () {
            $('#dg-container').gallery();
        });


        //Testimonials slider ==============================================

        $(".center").slick({
            dots: true,
            infinite: true,
            centerMode: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        mobileFirst: true,
                        slidesToShow: 1,
                    }
                }
            ]
        });

        // Logo Slider ==============================================

        $('.slider1').bxSlider({
            slideWidth: 260,
            minSlides: 2,
            maxSlides: 4,
            slideMargin: 10,
        });


        //Responsive Menu ==============================================

        $("#menu-icon").click(function () {
            $("#menu").slideToggle("slow");
        });


        // Video popup ==============================================

        $(".various").fancybox({
            type: "iframe", //<--added
            maxWidth: 800,
            maxHeight: 600,
            fitToView: false,
            width: '70%',
            height: '70%',
            autoSize: false,
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none'
        });


        // Number Count for Our strong numbers ==============================================

        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });


        // Scroll to Section ==============================================

        $('a[href^="#"]').on('click', function (event) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top
                }, 1000);
            }
        });
    });


    // Animate loader off screen ==============================================

    $(window).load(function () {

        $(".se-pre-con").fadeOut("slow");
        ;
    });


    // Wow animation ==============================================
    new WOW().init();


    // screen gallery tab ==============================================

    $(document).ready(function () {
        //Horizontal Tab
        $('#parentHorizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

    });


</script>


</body>
</html>