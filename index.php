<!DOCTYPE html>

<html>
    <head>

        <!-- Website Title & Description for Search Engine purposes -->
        <title>Face Detection Project</title>
        <meta name="description" content="Learn how to code your first responsive website with the new Twitter Bootstrap 3.">

        <!-- Mobile viewport optimized -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Bootstrap CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="includes/css/styles.css">

        <!-- Include Modernizr in the head, before any other Javascript -->
        <script src="includes/js/modernizr-2.6.2.min.js"></script>

    </head>
    <body>
        <?php
        if (isset($_GET['logout']) && $_GET['logout']) {
            session_destroy();
        }
        ?>
        <div class="container" id="main">

            <div class="navbar navbar-fixed-top">
                <div class="container">

                    <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                    <button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <div class="nav-collapse collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="#">Home</a>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <strong class="caret"></strong></a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Face Detection</a>
                                    </li>

                                    <li>
                                        <a href="#">Finger Print Recognition</a>
                                    </li>

                                    <li>
                                        <a href="#">Iris Recognition</a>
                                    </li>

                                    <li class="divider"></li>

                                    <li class="dropdown-header">More...</li>

                                    <li>
                                        <a href="#">RFID</a>
                                    </li>

                                    <li>
                                        <a href="#">Virtual Reality</a>
                                    </li>
                                </ul><!-- end dropdown-menu -->
                            </li>
                        </ul>

                        <form class="navbar-form pull-left">
                            <input type="text" class="form-control" placeholder="Search this site..." id="searchInput">
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                        </form><!-- end navbar-form -->

                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> My Account <strong class="caret"></strong></a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#"><span class="glyphicon glyphicon-wrench"></span> Settings</a>
                                    </li>

                                    <li>
                                        <a href="SignUp.html"><span class="glyphicon glyphicon-refresh"></span> Update Profile</a>
                                    </li>

                                    <li>
                                        <a href="#Login" role="button" data-toggle="modal"><span class="glyphicon glyphicon-hand-up"></span> Login </a>
                                    </li>

                                    <li class="divider"></li>

                                    <li>
                                        <a href="Index.php?logout=true"><span class="glyphicon glyphicon-off"></span> Sign out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- end nav pull-right -->

                    </div><!-- end nav-collapse -->

                </div><!-- end container -->
            </div><!-- end navbar -->
            <div class="modal fade" id="Login">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>

                            <h4 class="modal-title">Login with your face</h4>
                        </div><!-- end modal-header -->
                        <div class="modal-body">

                            <h4>Capture Your Face</h4>
                            <div style="text-align:center;">

                                            <!--<p><label for="name">Name:</label>&nbsp;<input type="text" placeholder="Type your name here..." id="name"></p>-->

                            </div>
                            <div style="text-align:center;">
                                <video id="screenshot-stream" class="videostream" autoplay="" style="border:1px solid #cccccc; width:500px; height:auto"></video>
                                <p><button class="btn btn-warning" type="button" id="screenshot-button">Capture</button> <button class="btn btn-danger" type="button" id="screenshot-stop-button">Stop</button></p>
                            </div>

                            <div style="text-align:center;">
                                <canvas id="screenshot-canvas" style="border:1px solid #cccccc;display: none;"></canvas>

                            </div>
                            <div style="text-align:center;">
                                <a href="SignUp.html" target="_blank" role="button" class="btn btn-warning" ><span class="glyphicon glyphicon-hand-up"></span> Sign Up</a>
                            </div>
                            <div>
                                <form id="login-form" action="../fd/src/Controller/DetectController.php" class="form-vertical" method="POST">
                                    <div><label for="name">Type in your name here:</label>&nbsp;<input class="form-control" type="text" id="name" required="required"></div>
                                    <div class="text-center" style="margin-top: 20px"><button class="btn btn-primary"  id="photo-submit" type="submit">Login</button></div>
                                    <div><span class="response"></span></div>
                                </form>
                            </div>
                            <p></p>
                        </div><!-- end modal-body -->

                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                        </div><!-- end modal-footer -->
                    </div><!-- end modal-content -->
                </div><!-- end modal-dialog -->
            </div><!-- end myModal -->

            <div class="carousel slide" id="myCarousel" style="margin-top: 80px;">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li class="active" data-slide-to="0" data-target="#myCarousel"></li>
                    <li data-slide-to="1" data-target="#myCarousel"></li>
                    <li data-slide-to="2" data-target="#myCarousel"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active" id="slide1">
                        <div class="carousel-caption">
                            <h4>Face Detection</h4>
                            <p>Face detection is a computer technology that determines the locations and sizes of human in digital images. It detects face and ignores anything else, such as buildings, trees and bodies.</p>
                        </div><!-- end carousel-caption-->
                    </div><!-- end item -->

                    <div class="item" id="slide2">
                        <div class="carousel-caption">
                            <h4>Fingerprint Recognition</h4>
                            <p>Fingerprint recognition refers to the automated method of verifying a match between two human fingerprints. Fingerprints are one of many forms of biometrics used to identify individuals and verify their identity.</p>
                        </div><!-- end carousel-caption-->
                    </div><!-- end item -->

                    <div class="item" id="slide3">
                        <div class="carousel-caption">
                            <h4>Iris Recognition</h4>
                            <p>Iris recognition is an automated method of biometric identification that uses mathematical pattern-recognition techniques on video images of one or both of the irises of an individual's eyes, whose complex random patterns are unique, stable, and can be seen from some distance.</p>
                        </div><!-- end carousel-caption-->
                    </div><!-- end item -->
                </div><!-- carousel-inner -->

                <!-- Controls -->
                <a class="left carousel-control" data-slide="prev" href="#myCarousel"><span class="icon-prev"></span></a>
                <a class="right carousel-control" data-slide="next" href="#myCarousel"><span class="icon-next"></span></a>

            </div><!-- end myCarousel -->


            <div class="row" id="bigCallout">
                <div class="col-12">
                    <div class="well">
                        <div class="page-header">
                            <h1>More Information <small>See more about biometrics.</small></h1>
                        </div><!-- end page-header -->

                        <p class="lead">Biometrics refers to metrics related to human characteristics Biometrics authentication (or realistic authentication) is used in computer science as a form of identification and access control. It is also used to identify individuals in groups that are under surveillance.</p>

                        <a href="" class="btn btn-large btn-primary" id="alertMe">Click for more</a>
                        <a href="" class="btn btn-large btn-link"></a>
                    </div><!-- end well -->

                </div><!-- end col-12 -->
            </div><!-- end bigCallout -->


            <div class="row" id="featuresHeading">
                <div class="col-12">
                    <h2>More Classes</h2>

                </div><!-- end col-12 -->
            </div><!-- end featuresHeading -->


            <div class="row" id="features">
                <div class="col-sm-4 feature">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Face Detection</h3>
                        </div><!-- end panel-heading -->
                        <img src="images/badge_face.jpg" alt="Face" class="img-circle">

                        <p>Face detection is a computer technology that determines the locations and sizes of human in digital images.</p>

                        <a href="#"  class="btn btn-warning btn-block">Learn Face Detection</a>
                    </div><!-- end panel -->
                </div><!-- end feature -->

                <div class="col-sm-4 feature">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Fingerprint Detection</h3>
                        </div><!-- end panel-heading -->
                        <img src="images/badge_fingerprint.jpg" alt="finger" class="img-circle">

                        <p>Fingerprint recognition refers to the automated method of verifying a match between two human fingerprints.</p>

                        <a href="#"  class="btn btn-danger btn-block">Learn Fingerprint Detection</a>
                    </div><!-- end panel -->
                </div><!-- end feature -->

                <div class="col-sm-4 feature">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Iris Detection</h3>
                        </div><!-- end panel-heading -->
                        <img src="images/badge_Iris.jpg" alt="Iris" class="img-circle">

                        <p>Face detection is a computer technology that determines the locations and sizes of human in digital images.</p>

                        <a href="#"  class="btn btn-info btn-block">Learn Iris Detection</a>
                    </div><!-- end panel -->
                </div><!-- end feature -->
            </div><!-- end features -->


            <div class="row" id="moreInfo">
                <div class="col-sm-6">
                    <h3>Neat Tabbable Content</h3>
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Information</a></li>
                            <li><a href="#tab2" data-toggle="tab">Professors</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <h4><span class="glyphicon glyphicon-map-marker"></span> Our Location <small>More like our favourite surf spot</small></h4>
                                <iframe width="100%" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d10514.530294189124!2d2.4498274290761928!3d48.78890447446628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!1i0!3e6!4m0!4m5!1s0x47e67336465751d7%3A0xd5e6f15ce97cd161!2z5be06buO56ys5Y2B5LqM5aSn5a2m5rOV5Zu9IENyw6l0ZWlsLCBBdmVudWUgZHUgR8OpbsOpcmFsIGRlIEdhdWxsZSwg6YKu5pS_57yW56CBOiA5NDAxMA!3m2!1d48.788139!2d2.445902!5e0!3m2!1szh-CN!2sfr!4v1424270705844" ></iframe>       
                                <p>Biometrics refers to metrics related to human characteristics Biometrics authentication (or realistic authentication) is used in computer science as a form of identification and access control. It is also used to identify individuals in groups that are under surveillance.</p>

                                <p>Biometric identifiers are the distinctive, measurable characteristics used to label and describe individuals. Biometric identifiers are often categorized as physiological versus behavioral characteristics. Physiological characteristics are related to the shape of the body. Examples include, but are not limited to fingerprint, palm veins, face recognition, DNA, palm print, hand geometry, iris recognition, retina and odour/scent. Behavioral characteristics are related to the pattern of behavior of a person, including but not limited to typing rhythm, gait, and voice. Some researchers have coined the term behaviometrics to describe the latter class of biometrics.</p>
                            </div><!-- end tab-pane -->

                            <div class="tab-pane" id="tab2">
                                <h4>A Left Floated Picture <small>Using Placehold.it</small></h4>

                                <img src="http://placehold.it/140" class="thumbnail pull-left" alt="Placeholder image">

                                <p>Biometrics refers to metrics related to human characteristics Biometrics authentication (or realistic authentication) is used in computer science as a form of identification and access control. It is also used to identify individuals in groups that are under surveillance.</p>

                                <p>Biometric identifiers are the distinctive, measurable characteristics used to label and describe individuals. Biometric identifiers are often categorized as physiological versus behavioral characteristics. Physiological characteristics are related to the shape of the body. Examples include, but are not limited to fingerprint, palm veins, face recognition, DNA, palm print, hand geometry, iris recognition, retina and odour/scent. Behavioral characteristics are related to the pattern of behavior of a person, including but not limited to typing rhythm, gait, and voice. Some researchers have coined the term behaviometrics to describe the latter class of biometrics.</p>

                                <hr>
                            </div><!-- end tab-pane -->
                        </div><!-- end tab-content -->
                    </div><!-- end tabbable -->
                </div><!-- end col-sm-6 -->

                <div class="col-sm-6">
                    <h3>Some Info</h3>
                    <p>Biometrics refers to metrics related to human characteristics Biometrics authentication (or realistic authentication) is used in computer science as a form of identification and access control. It is also used to identify individuals in groups that are under surveillance.</p>

                    <h4>A List of class</h4>

                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Iris</h4>
                            <p class="list-group-item-text">ris recognition is an automated method of biometric identification that uses mathematical pattern-recognition techniques</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Fingerprint</h4>
                            <p class="list-group-item-text">Fingerprint recognition refers to the automated method of verifying a match between two human fingerprints. </p>
                        </a>
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading">Facedetect</h4>
                            <p class="list-group-item-text">Face detection is a computer technology that determines the locations and sizes of human in digital images.</p>
                        </a>
                    </div><!-- list-group -->
                </div><!-- end col-sm-6 -->
            </div><!-- end moreInfo -->

        </div><!-- end container -->
        <br>
        <br>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <h6>Copyright &copy; 2015 Team SunXie</h6>
                    </div><!-- end col-sm-2 -->

                    <div class="col-sm-6">
                        <h6>About Us</h6>
                        <p>Team Sun Yuhao Xie Fang</p>
                    </div><!-- end col-sm-4 -->

                    <div class="col-sm-2">
                        <h6>Navigation</h6>
                        <ul class="unstyled">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Links</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div><!-- end col-sm-2 -->

                    <div class="col-sm-2">
                        <h6>Follow Us</h6>
                        <ul class="unstyled">
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Google Plus</a></li>
                        </ul>
                    </div><!-- end col-sm-2 -->


                </div><!-- end row -->
            </div><!-- end container -->
        </footer>


        <!-- All Javascript at the bottom of the page for faster page loading -->

        <!-- First try for the online version of jQuery-->
        <script src="http://code.jquery.com/jquery.js"></script>

        <!-- If no online access, fallback to our hardcoded version of jQuery -->
        <script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>

        <!-- Bootstrap JS -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- Custom JS -->
        <script src="includes/js/script.js"></script>

        <script>
            var errorCallback = function (e) {
                console.log('Reeeejected!', e);
            };
            var j = jQuery.noConflict();
            j(document).ready(function () {

                navigator.getUserMedia = (navigator.getUserMedia ||
                        navigator.webkitGetUserMedia ||
                        navigator.mozGetUserMedia ||
                        navigator.msGetUserMedia);

                // Get handles on the video and canvas elements
                var video = document.querySelector('video');
                var canvas = document.querySelector('canvas');
                // Get a handle on the 2d context of the canvas element
                var ctx = canvas.getContext('2d');
                // Define some vars required later
                var w, h, ratio;
                var capture = document.querySelector('#screenshot-button');
                var stop = document.querySelector('#screenshot-stop-button');
                var submit = document.querySelector('#photo-submit');

                j('form#login-form').submit(function (e) {
                    e.preventDefault();
                    var username = j('form#login-form').find('input#name').val();
                    var dataUrl = canvas.toDataURL();
                    var image = new Image();
                    image.src = canvas.toDataURL('image/jpeg');
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'http://api.cn.faceplusplus.com/v2/' + 'recognition/identify?api_key=' + 'a774702fd3316577efb8b2f93f47b2f4' + '&api_secret=' + 'FkkS6T6mPbUofnQEle4PkUF9NitN8pNm');
                    var fd = new FormData();
                    fd.append('img', dataURItoBlob(image.src));
                    fd.append('group_name', 'user');
                    xhr.send(fd);
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                var result = JSON.parse(xhr.responseText);
                                if (result.face.length == 0) {
                                    console.log('no face found');
                                    alert("No face found, try again please!");
                                    return false;

                                }
                                if (result.face.length > 1) {
                                    console.log('multi face found!');
                                    alert("Multi face found, try again please!");
                                    return false;
                                }
                                var candidate = result.face[0].candidate[0];
                                if (candidate.person_name === username) {
                                    location.href = 'front.php?login=true&username=' + username;
                                    return false;

                                } else {
                                    console.log('recognise failed');
                                    alert("Login failed,username and face not match!");
                                    return false;
                                }
                            }
                        }
                    };
                    return false;
                });

                j('#screenshot-button').click(function (e) {
                    ctx.fillRect(0, 0, w, h);
                    ctx.drawImage(video, 0, 0, w, h);
                });

                // Add a listener to wait for the 'loadedmetadata' state so the video's dimensions can be read
                video.addEventListener('loadedmetadata', function () {
                    // Calculate the ratio of the video's width to height
                    ratio = video.videoWidth / video.videoHeight;
                    // Define the required width as 100 pixels smaller than the actual video's width
                    w = video.videoWidth - 100;
                    // Calculate the height based on the video's width and the ratio
                    h = parseInt(w / ratio, 10);
                    // Set the canvas width and height to the values just calculated
                    canvas.width = w;
                    canvas.height = h;
                }, false);

                j('#screenshot-stop-button').click(function (e) {
                    e.preventDefault();
                    video.stop();
                });

                if (navigator.getUserMedia) {
                    navigator.getUserMedia(
                            // constraints
                                    {
                                        video: true
                                    },
                            // successCallback
                            function (localMediaStream) {
                                var video = document.querySelector('video');
                                video.src = window.URL.createObjectURL(localMediaStream);

                                // Do something with the video here, e.g. video.play()
                            },
                                    // errorCallback
                                            function (err) {
                                                console.log("The following error occured: " + err);
                                            }
                                    );
                                } else {
                            console.log("getUserMedia not supported");
                        }

                        function dataURItoBlob(dataURI) {
                            var binary = atob(dataURI.split(',')[1]);
                            var array = [];
                            for (var i = 0; i < binary.length; i++) {
                                array.push(binary.charCodeAt(i));
                            }
                            return new Blob([new Uint8Array(array)], {type: 'image/jpeg'});
                        }
                    });
        </script>

    </body>
</html>

