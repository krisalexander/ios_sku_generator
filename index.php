<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

$appname_hash = "";

if(isset($_POST['appname']) && $_POST['appname'] != "") {
  $appname = trim($_POST['appname']);
  $appname_hash = md5($appname);
  $words = explode(" ", $appname);
  if(count($words) > 0) {
    $letters = "";
    foreach($words as $word) {
      $first_letter = mb_substr($word, 0, 1, 'utf-8');
      $letters .= $first_letter;
    }
    $appname_hash = $letters . "." . $appname_hash;
  }
} else {
  $appname = '';
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vested Stock Calculator</title>

    <style>
      body { padding-top: 50px; }
    </style>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body ng-app="VestedStockApp">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Calculator Tools</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse pull-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://krisalexander.com">Kristian's Blog</a></li>
            <li><a href="https://twitter.com/KrisDevelops">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" ng-controller="VestedStockCtrl">

      <div class="starter-template">
        <h1>Apple App SKU Generator</h1>
        <p class="lead">To use, type the name of your app in the bar and click 'Generate'.</p>
      </div>

	<form action="" method="post">
	<div class="row">
	  <div class="col-md-12">
	    <input type="text" class="form-control" name="appname" value="<?= isset($appname) ? $appname : ""  ?>" />
	  </div>
	</div>
	<div class="row">
	  <div class="col-md-12">
	    <input class="btn btn-primary" type="submit" value="Generate" />
	  </div>
	</div>
<hr />
        <div class="row">
          <div class="col-md-12">
	    <p class="lead well">SKU: <?= $appname_hash ?></p>
          </div>
        </div>
	

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </body>
</html>
