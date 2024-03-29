<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Monexy Merchant Interface</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../bootstrap/assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="../bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../bootstrap/assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Monexy Merchant</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li class="active"><a href="success.php">Success</a></li>
              <li><a href="fail.php">Fail</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <h1>Форма выполненного платежа</h1>
      <br />
        <div class="alert alert-success">
		  <strong>Внимание!</strong> В случае успешного выполнения платежа сообщаем клиенту детали сделки.
		</div>
	  <br />
        <div class="alert alert-info">
		  <strong>Важно!</strong> Товар или услугу нужно отдавать в скрипте результата платежа (MonexyMerchantResultUrl).
		</div>
	  
	  <br />
	  <pre>
	  <?php 
	  print_r($_POST);
	  ?>
	  </pre>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/assets/js/jquery.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-transition.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-alert.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-modal.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-dropdown.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-scrollspy.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-tab.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-tooltip.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-popover.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-button.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-collapse.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-carousel.js"></script>
    <script src="../bootstrap/assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
