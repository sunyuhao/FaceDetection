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
        if ($_GET['login'] && $_GET['username']) {
            $_SESSION['login'] = $_GET['login'];
            $_SESSION['username'] = $_GET['username'];
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
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
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
                                        <a href="Index.php"><span class="glyphicon glyphicon-off"></span> Sign out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul><!-- end nav pull-right -->

                    </div><!-- end nav-collapse -->

                </div><!-- end container -->
            </div><!-- end navbar -->





            <div class="row" id="bigCallout" style="margin-top: 80px">
                <div class="col-12">


                    <div class="well">
                        <div class="page-header">
                            <h1>Welcome <strong><?php if (isset($_SESSION['username']) && isset($_SESSION['login']) && $_SESSION['login']) {
            echo $_SESSION['username'];
        } ?></strong></h1>
                        </div><!-- end page-header -->

                        <p class="lead">Welcome to the Biometrics World!</p>

                        <p class="lead">
                            Biometrics refers to metrics related to human characteristics Biometrics authentication (or realistic authentication) is used in computer science as a form of identification and access control. It is also used to identify individuals in groups that are under surveillance.
                        </p>

                        <p class="lead">
                            Biometric identifiers are the distinctive, measurable characteristics used to label and describe individuals. Biometric identifiers are often categorized as physiological versus behavioral characteristics. Physiological characteristics are related to the shape of the body. Examples include, but are not limited to fingerprint, palm veins, face recognition, DNA, palm print, hand geometry, iris recognition, retina and odour/scent. Behavioral characteristics are related to the pattern of behavior of a person, including but not limited to typing rhythm, gait, and voice. Some researchers have coined the term behaviometrics to describe the latter class of biometrics.
                        </p>

                        <p class="lead">
                            More traditional means of access control include token-based identification systems, such as a driver's license or passport, and knowledge-based identification systems, such as a password or personal identification number. Since biometric identifiers are unique to individuals, they are more reliable in verifying identity than token and knowledge-based methods; however, the collection of biometric identifiers raises privacy concerns about the ultimate use of this information.
                        </p>
                    </div><!-- end well -->

                </div><!-- end col-12 -->
            </div><!-- end bigCallout -->


        </div><!-- end container -->

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



    </body>
</html>