<?php
session_start();
include_once 'dbconnect.php';

/*if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}*/
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$completed=mysql_query("SELECT * FROM itemscompleted WHERE user_id=".$_SESSION['user']);
$completedRow=mysql_fetch_array($completed);

$amountCompleted=mysql_numrows($completed);
$totalParts=mysql_numrows(mysql_query("SELECT * FROM items"));
$percentage=round($amountCompleted/$totalParts*100)

$totalPartsW0=mysql_numrows(mysql_query("SELECT * FROM items WHERE week_id=0"));
$totalPartsW1=mysql_numrows(mysql_query("SELECT * FROM items WHERE week_id=1"));
$totalPartsW2=mysql_numrows(mysql_query("SELECT * FROM items WHERE week_id=2"));
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CS50 Belgium - Course</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<?php echo 'Hallo '; echo $_SESSION['user']; echo $amountCompleted; ?>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="header">
                    <img src="images/Character.svg">
                    <a class="navbar-brand" href="index.php">CS50 Belgium</a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><?php if(isset($_SESSION['user'])){echo 'Hallo '; echo $userRow['fullname'];} ?></a></li>
                    <?php if(!isset($_SESSION['user'])){echo '<li><a href="login.php">Log-in</a></li>';}else{echo '<li><a href="logout.php?logout">Sign Out</a></li>';} ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->


    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $amountCompleted; ?>"
                  aria-valuemin="0" aria-valuemax="<?php echo $totalParts; ?>" style="width:40%">
                    <?php echo $percentage; ?>% Voltooid
                  </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="images/image2.jpg">
                        <div class="caption">
                            <h4>Week 0 : Wat is programmeren?  </h4>
                            <p>Een computerprogramma is een verhaal dat je aan de computer vertelt. Je zegt tegen de computer: “Doe dit, doe dan dat, en als je dat gedaan hebt, doe dan nog even dit.” Maar computers zijn erg dom. Dus je moet ze heel precies vertellen wat ze moeten doen. Zomaar even zeggen: Hallo computer, hoeveel is 2 + 2, dat werkt niet. Je moet het precies zo zeggen: print 2 + 2 Print betekent: Schrijf op het scherm. Wat 2 + 2 betekent dat snap je wel.</p>
                            <p class="weekly-build">Wat je ervan gaat leren</p>
                            <div>
                                <ul>
                                    <li>Dat een computer heel dom is </li>
                                    <li>Je moet hem precies vertellen wat hij moet doen</li>
                                    <li>Je eerste spelletje maken</li>


                                </ul>
                            </div>
                            <a href="week-0.html" class="btn btn-default btn-xs" role="button">Naar inhoud</a>
                            <!-- 
                            <a href="#" class="btn btn-default btn-xs pull-right" role="button"><i class="glyphicon glyphicon-edit"></i></a> <a href="#" class="btn btn-info btn-xs" role="button">Button</a> <a href="#" class="btn btn-default btn-xs" role="button">Button</a>
-->
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="images/image1.jpg">
                        <div class="caption">
                            <h4>Week 1 : Wat is Windows/Linux/MacOS?</h4>
                            <p>Heb je Les 1 gedaan? Anders begrijp je er straks niks meer van. Gek eigenlijk, dat ‘print’ betekent dat de computer naar het scherm schrijft. In deze les verdiep je in de basiskennis die je hebt gebouwt in het vorige onderdeel. </p>
                            <div>
                                <p class="weekly-build">Wat je ervan gaat leren</p>
                                <ul>
                                    <li>Programmeurs gebruiken graag moeilijke woorden</li>
                                    <li>Een string is simpelweg een stukje tekst</li>



                                </ul>
                            </div>
                            <a href="#" class="btn btn-default btn-xs" role="button">Naar inhoud</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="images/image3.jpg">
                        <div class="caption">
                            <h4>Week 2 : Omgaan met de console</h4>
                            <p>Wat zijn variabelen? Waarvoor worden ze gebruikt? </p>
                            <div>
                                <p class="weekly-build">Wat je ervan gaat leren</p>
                                <ul>
                                    <li>Je zal meer weten dan een groot aantal volwassenen : oa. wat variabelen zijn. </li>
                                    <li>Je weet wat je in een variabelen kan stoppen</li>
                                    <li>Computers kunnen heel goed rekenen </li>


                                </ul>
                            </div>
                            <a href="#" class="btn btn-default btn-xs" role="button">Naar inhoud</a>
                            <!-- 
                            <a href="#" class="btn btn-default btn-xs pull-right" role="button"><i class="glyphicon glyphicon-edit"></i></a> <a href="#" class="btn btn-info btn-xs" role="button">Button</a> <a href="#" class="btn btn-default btn-xs" role="button">Button</a>
-->
                        </div>
                    </div>
                </div>

            </div>
            <!-- End of container -->
        </div>
        <!-- End of main-content -->
        <hr>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                        <p class="copyright text-muted">EU Hackathon '15</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/clean-blog.min.js"></script>

</body>

</html>