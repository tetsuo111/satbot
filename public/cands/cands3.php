<!DOCTYPE html>
<!-- saved from url=(0054)http://stg.mindset-research.co.jp/StressRelief/sr53_06 -->
<html class="gr__stg_mindset-research_co_jp"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">		<title>SAT BOT |</title>
	
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/wv_style.css">

	<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/jquery.min.js"></script>
	<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/common.js"></script>
<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/jquery.color-2.1.2.min.js"></script>
<?php
	$colorcode = $_POST['color_code'];
	$shapeId = $_POST['data']['shape_id'];
	$shapesrc ="https://satbot-v2.herokuapp.com/public/cands/imgs/shape_id_".$_POST['data']['shape_id'].".png";
?>
<script type="text/javascript">
//<![CDATA[
	jQuery(function($){
		var colorcode = <?php echo json_encode($colorcode) ?>;
		// 背景色アニメーション表示
		$('.stressrel-contents').animate({
			'backgroundColor': colorcode
		}, 3000);
	
		// 高さ調整
		$('.stressrel-shape-item p').each(function() {
			// 幅と同じに変更
			$(this).css('height', $(this).css('width'))
				   .css('line-height', $(this).css('width'));
		});
		// ボタン遅延表示
		$('.stressrel-footer').delay(3000).fadeIn();
	});

//]]>
</script></head>
<body data-gr-c-s-loaded="true">
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

	      $stmt = $conn->prepare("INSERT INTO SATBOT_Shape (lid, wt, shape) 
	        VALUES (:lid, :wt, :shape)");
	      $stmt->bindParam(':lid', $_POST['lid']);
	      $stmt->bindParam(':wt', $wt, PDO::PARAM_STR);
	      $stmt->bindParam(':shape', $_POST['data']['shape_id']);

	      // 使用 exec() ，没有结果返回 
	      $stmt->execute();

	      }
	  catch(PDOException $e) {
	      echo "Connection failed: " . $e->getMessage();
	      }
	      $conn = null;
 	?> 
	<div class="container">
		<div class="hero stressrel-hero">
	<div class="hero-body stressrel-hero-body">
		<p class="common-title">目を閉じて、このものが迫ってくるところを思い浮かべて</p>
			</div>
</div>
<div class="stressrel-contents" style="background-color: rgb(255, 255, 255);">
		<div class="stressrel-shapre-image-selected">
		<img src="<?php echo $shapesrc;?>">
	</div>
	</div>
<footer class="stressrel-footer is-hide" style="display: block;">
	<div class="columns is-mobile is-gapless">
		<div class="column"><a href="https://satbot-v2.herokuapp.com/public/cands/candsend.php" class="button is-square-next is-fullwidth button-icon-arrow-right">次へ</a></div>
	</div>
</footer>
	</div>


</body></html>