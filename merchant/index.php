<?php require_once 'config.php';?>
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
              <li class="active"><a href="index.php">Home</a></li>
              <li><a href="success.php">Success</a></li>
              <li><a href="fail.php">Fail</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <h1>Форма запроса платежа</h1>
      
      <br />
        <div class="alert alert-error">
		  <strong>Внимание!</strong> Все параметры платежа прописаны в файле конфигурации (config.php)
		</div>

      
      <br />
        <form class="form-horizontal" name="pay" method="POST" action="https://www.monexy.com/app/mobi.php">
		<input type="hidden" name="MonexyMerchantID" value="<?php echo $MonexyMerchantID; ?>">
		<input type="hidden" name="MonexyMerchantInfoShopName" value="<?php echo $MonexyMerchantInfoShopName; ?>">
		
		<div class="control-group">
		<label class="control-label" for="inputEmail">Сумма платежа</label>
		<div class="controls">
		<input type="text" class="input-large" name="MonexyMerchantSum" readonly value="<?php echo $MonexyMerchantSum; ?>">
		</div></div>
		
		<div class="control-group">
		<label class="control-label" for="inputEmail">Идентификатор платежа</label>
		<div class="controls">
		<input type="text" class="input-large" name="MonexyMerchantOrderId" readonly value="<?php echo $MonexyMerchantOrderId; ?>">
		</div></div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Описание платежа</label>
		<div class="controls">
		<input type="text" class="input-large" name="MonexyMerchantOrderDesc" readonly value="<?php echo $MonexyMerchantOrderDesc; ?>">
		</div></div>
		
		<input type="hidden" name="MonexyMerchantHash" value="<?php echo $MonexyMerchantHash; ?>">
		
		<input type="hidden" name="MonexyMerchantResultUrl" value="<?php echo $MonexyMerchantResultUrl; ?>">
		<input type="hidden" name="MonexyMerchantSuccessUrl" value="<?php echo $MonexyMerchantSuccessUrl; ?>">
		<input type="hidden" name="MonexyMerchantFailUrl" value="<?php echo $MonexyMerchantFailUrl; ?>">
		
		<input type="hidden" name="MonexyMerchantFields" value="user_field_1 user_field_2 user_field_3">
		<input type="hidden" name="user_field_1" value="user_field_1">
		<input type="hidden" name="user_field_2" value="user_field_2">
		<input type="hidden" name="user_field_3" value="user_field_3">
		
		<div class="control-group">
		<div class="controls">
		<input type="submit" class="btn" name="Submit" value="Оплатить">
		</div></div>
		</form>


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
