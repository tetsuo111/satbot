<!DOCTYPE html>
<!-- saved from url=(0054)http://stg.mindset-research.co.jp/StressRelief/sr53_05 -->
<html class="gr__stg_mindset-research_co_jp"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">		<title>SAT BOT |</title>
	
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/animate.min.css">

	<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/jquery.min.js"></script>
	<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/common.js"></script>
<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/jquery.color-2.1.2.min.js"></script>
<?php
	$colorcode = $_POST['data']['color_code'];
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

		// 形選択時処理
		$('.stressrel-shape-item').click(function() {
			$('#js-shape-id').val(
				$(this).data('shape-id')
			);
			$('#js-form').submit();
		});
	});

//]]>
</script></head>
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

	      $stmt = $conn->prepare("INSERT INTO SATBOT_Color (lid, wt, color) 
	        VALUES (:lid, :wt, :color)");
	      $stmt->bindParam(':lid', $_POST['lid']);
	      $stmt->bindParam(':wt', $wt, PDO::PARAM_STR);
	      $stmt->bindParam(':color', $_POST['data']['color_code']);

	      // 使用 exec() ，没有结果返回 
	      $stmt->execute();

	      }
	  catch(PDOException $e) {
	      echo "Connection failed: " . $e->getMessage();
	      }
	      $conn = null;
 	?> 
	<div class="container">
		<form action="https://satbot-v2.herokuapp.com/public/cands/cands3.php" id="js-form" method="post" accept-charset="utf-8"><div style="display:none;">
			<input type="hidden" name="_method" value="POST">
			<input type="hidden" name="color_code" value="<?php echo $_POST['data']['color_code'];?>">
			<input type="hidden" name="lid" value="<?php echo $_POST['lid'];?>"></div>	
		</div><span class="is-hidden"><input name="data[shape_id]" id="js-shape-id" type="text"></span>
<div class="hero stressrel-hero">
	<div class="hero-body stressrel-hero-body">
		<p class="common-title">形に例えると？</p>
			</div>
</div>
<div class="stressrel-contents" style="background-color: rgb(255, 255, 255);">
	<div class="columns is-mobile is-multiline is-centered is-vcentered">
			<div class="column is-4 stressrel-shape-item" data-shape-id="0">
			<img src="https://satbot-v2.herokuapp.com/public/cands/imgs/shape_id_0.png" class="stressrel-shape-image">
		</div>
			<div class="column is-4 stressrel-shape-item" data-shape-id="1">
			<img src="https://satbot-v2.herokuapp.com/public/cands/imgs/shape_id_1.png" class="stressrel-shape-image">
		</div>
			<div class="column is-4 stressrel-shape-item" data-shape-id="2">
			<img src="https://satbot-v2.herokuapp.com/public/cands/imgs/shape_id_2.png" class="stressrel-shape-image">
		</div>
			<div class="column is-4 stressrel-shape-item" data-shape-id="3">
			<img src="https://satbot-v2.herokuapp.com/public/cands/imgs/shape_id_3.png" class="stressrel-shape-image">
		</div>
			<div class="column is-4 stressrel-shape-item" data-shape-id="4">
			<img src="https://satbot-v2.herokuapp.com/public/cands/imgs/shape_id_4.png" class="stressrel-shape-image">
		</div>
			<div class="column is-4 stressrel-shape-item" data-shape-id="5">
			<img src="https://satbot-v2.herokuapp.com/public/cands/imgs/shape_id_5.png" class="stressrel-shape-image">
		</div>
			<div class="column is-4 stressrel-shape-item" data-shape-id="6">
			<img src="https://satbot-v2.herokuapp.com/public/cands/imgs/shape_id_6.png" class="stressrel-shape-image">
		</div>
		</div>
</div>
<footer class="stressrel-footer">
</footer>
<div style="display:none;"><input type="hidden" name="data[_Token][fields]" value="e3a9f7e2f8a9cf8a2698fe9628ace1756d0ecdc5%3A" id="TokenFields577370503"><input type="hidden" name="data[_Token][unlocked]" value="" id="TokenUnlocked1643784989"></div></form>	</div>


</body></html>