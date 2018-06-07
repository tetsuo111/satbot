<!DOCTYPE html>
<!-- saved from url=(0059)http://stg.mindset-research.co.jp/wb/MentalCheck/check_23_1 -->
<html class="gr__stg_mindset-research_co_jp"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">		<title>SAT BOT | </title>
	
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/wv_style.css">

	<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/jquery.min.js"></script>
	<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/common.js"></script>

</head>
<body data-gr-c-s-loaded="true" onLoad="init()">
	<?php 
	  $url = getenv('JAWSDB_MARIA_URL');
	  $dbparts = parse_url($url);
	  $wt = new DateTime(); 
	  $wt = $wt->format('Y-m-d H:i:s'); 
	  
	  $hostname = $dbparts['host'];
	  $username = $dbparts['user'];
	  $password = $dbparts['pass'];
	  $database = ltrim($dbparts['path'],'/');

	  try {
	      $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	      // set the PDO error mode to exception
	      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	      $stmt = $conn->prepare("INSERT INTO SATBOT_experiment_checktest6 (lid, wt, c601, c602, c603, c604, c605, c606, c607, c608, c609, c610) 
	        VALUES (:lid, :wt, :c601, :c602, :c603, :c604, :c605, :c606, :c607, :c608, :c609, :c610)");
	      $stmt->bindParam(':lid', $_POST['lid']);
	      $stmt->bindParam(':wt', $wt, PDO::PARAM_STR);
	      $stmt->bindParam(':c601', $_POST['data']['c601']);
	      $stmt->bindParam(':c602', $_POST['data']['c602']);
	      $stmt->bindParam(':c603', $_POST['data']['c603']);
	      $stmt->bindParam(':c604', $_POST['data']['c604']);
	      $stmt->bindParam(':c605', $_POST['data']['c605']);
	      $stmt->bindParam(':c606', $_POST['data']['c606']);
	      $stmt->bindParam(':c607', $_POST['data']['c607']);
	      $stmt->bindParam(':c608', $_POST['data']['c608']);
	      $stmt->bindParam(':c609', $_POST['data']['c609']);
	      $stmt->bindParam(':c610', $_POST['data']['c610']);
	      // 使用 exec() ，没有结果返回 
	      $stmt->execute();

	      }
	  catch(PDOException $e) {
	      echo "Connection failed: " . $e->getMessage();
	      }
	      $conn = null;
 	?> 
	<div class="container">
		<div class="contents-margin">
	<form action="https://satbot-v2.herokuapp.com/public/checktest/checktestend.php" id="checktest6_Form" method="post" accept-charset="utf-8">
		<div style="display:none;">
			<input type="hidden" name="_method" value="POST">
			<input type="hidden" name="data[_Token][key]" value="">
			<input type="hidden" name="lid" value="<?php echo $_POST['lid'];?>"></div>
			<div class="progress is-large">
			<div class="progress-bar is-orange progress-bar-0"><p></p></div>
		</div>
		<div class="mental-question-title mb-20">
			<p class="is-color-grey">お疲れ様でした！右上のXを押して、ページを閉じてくださいね</p>
		</div>

			</div>

	<div style="display:none;"><input type="hidden" name="data[_Token][fields]" value="" id="T¥">
		<input type="hidden" name="data[_Token][unlocked]" value="" id=""></div></form></div>
	</div>     

</body></html>