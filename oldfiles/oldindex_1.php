<?php

    //@include_once ('php/class.formloader.php');
    @include ('php/class.sqlHandler.userdb.php');

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.livequery.js"></script>
    <script type="text/javascript" src="js/js_sub_control.js"></script>
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
          <a class="brand" href="#">SOW Template</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">New SOW</a></li>
              <li><a href="#about">Qualification Form</a></li>
       
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
http://www.99points.info/2010/12/n-level-dynamic-loading-of-dropdowns-using-ajax-and-php/
    <div class="container">      
        <div id="show_sub_categories">            
                <select name="search_category" class="parent">
                <option value="" selected="selected">-- Categories --</option>
                <?php
                $query = "select Qual_Name , Qual_ID from qualifications";		

                $results = sqlHandler::getDB()->select($query);

                foreach ($results as $rows)
                {?>
                        <option value="qualifications, <?php echo $rows['Qual_ID'];?>"><?php echo $rows['Qual_Name'];?></option>
                <?php
                }?>
                </select>                     
	</div>
        <div id="show_parent_info" class="info_container" name="">

        </div>
            
    </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="js/bootstrap.min.js"></script>

  </body>
</html>