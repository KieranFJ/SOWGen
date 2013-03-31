<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery-1.7.1.min.js"></script> 
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/less-1.3.0.min.js"></script>
    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">    
    <link href="css/main.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php">SOW Template</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">New Item<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="newsow.php">New Scheme of Work</a></li>
                      <li><a href="newLessonPlan.php">New Lesson Plan</a></li>
                      <li class="divider"></li>                          
                      <li><a href="qualentry.php">New Qualification</a></li>
                      <li><a href="addqualentry.php">New Additional Qualification</a></li>
                  </ul>
              </li> 
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Update Item<b class="caret"></b></a>
                  <ul class="dropdown-menu">                      
                      <li><a href="#">Update Scheme of Work</a></li>
                      <li><a href="newLessonPlan.php">Update Lesson Plans</a></li>
                      <li class ="divider"></li>
                      <li><a href="outcomeentry.php">Update Outcomes</a></li>
                      <li><a href="criteriaentry.php">Update Critera</a></li>
                  </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>