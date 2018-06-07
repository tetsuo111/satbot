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

	      $stmt = $conn->prepare("INSERT INTO SATBOT_experiment_checktest4 (lid, wt, c401, c402, c403, c404, c405, c406, c407, c408, c409, c410, c411, c412, c413, c414, c415, c416, c417, c418, c419, c420) 
	        VALUES (:lid, :wt, :c401, :c402, :c403, :c404, :c405, :c406, :c407, :c408, :c409, :c410, :c411, :c412, :c413, :c414, :c415, :c416, :c417, :c418, :c419, :c420)");
	      $stmt->bindParam(':lid', $_POST['lid']);
	      $stmt->bindParam(':wt', $wt, PDO::PARAM_STR);
	      $stmt->bindParam(':c401', $_POST['data']['c401']);
	      $stmt->bindParam(':c402', $_POST['data']['c402']);
	      $stmt->bindParam(':c403', $_POST['data']['c403']);
	      $stmt->bindParam(':c404', $_POST['data']['c404']);
	      $stmt->bindParam(':c405', $_POST['data']['c405']);
	      $stmt->bindParam(':c406', $_POST['data']['c406']);
	      $stmt->bindParam(':c407', $_POST['data']['c407']);
	      $stmt->bindParam(':c408', $_POST['data']['c408']);
	      $stmt->bindParam(':c409', $_POST['data']['c409']);
	      $stmt->bindParam(':c410', $_POST['data']['c410']);
	      $stmt->bindParam(':c411', $_POST['data']['c411']);
	      $stmt->bindParam(':c412', $_POST['data']['c412']);
	      $stmt->bindParam(':c413', $_POST['data']['c413']);
	      $stmt->bindParam(':c414', $_POST['data']['c414']);
	      $stmt->bindParam(':c415', $_POST['data']['c415']);
	      $stmt->bindParam(':c416', $_POST['data']['c416']);
	      $stmt->bindParam(':c417', $_POST['data']['c417']);
	      $stmt->bindParam(':c418', $_POST['data']['c418']);
	      $stmt->bindParam(':c419', $_POST['data']['c419']);
	      $stmt->bindParam(':c420', $_POST['data']['c420']);
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
	<form action="https://satbot-v2.herokuapp.com/public/checktest/checktest6.php" id="checktest5_Form" method="post" accept-charset="utf-8">
		<div style="display:none;">
			<input type="hidden" name="_method" value="POST">
			<input type="hidden" name="data[_Token][key]" value="">
			<input type="hidden" name="lid" value="<?php echo $_POST['lid'];?>"></div>
			<div class="progress is-large">
			<div class="progress-bar is-orange progress-bar-0"><p></p></div>
		</div>
		<div class="mental-question-title mb-20">
			<p class="is-color-grey">あなたにあてはまるものを選んでください。</p>
		</div>
							<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q1</p>
					<p class="mental-question-text mb-10">理由がわからないが、下痢、便秘、腰痛、肩凝りなど慢性的な症状がある</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c501]" id="answer_select_60" value="0" class="radio"><label for="answer_select_60">よくある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c501]" id="answer_select_61" value="1" class="radio"><label for="answer_select_61">ときどきある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c501]" id="answer_select_62" value="2" class="radio"><label for="answer_select_62">なし</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q2</p>
					<p class="mental-question-text mb-10">理屈でよくないとわかっているのにその行動を改められない</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c502]" id="answer_select_10" value="0" class="radio"><label for="answer_select_10">よくある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c502]" id="answer_select_11" value="1" class="radio"><label for="answer_select_11">ときどきある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c502]" id="answer_select_12" value="2" class="radio"><label for="answer_select_12">なし</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q3</p>
					<p class="mental-question-text mb-10">自分はどうも不運な星の下に生まれてきたなあと思う</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c503]" id="answer_select_100" value="0" class="radio"><label for="answer_select_100">よくある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c503]" id="answer_select_101" value="1" class="radio"><label for="answer_select_101">ときどきある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c503]" id="answer_select_102" value="2" class="radio"><label for="answer_select_102">なし</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q4</p>
					<p class="mental-question-text mb-10">自分の中に自分でコントロール出来ないものがいるようだと思う</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c504]" id="answer_select_50" value="0" class="radio"><label for="answer_select_50">よくある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c504]" id="answer_select_51" value="1" class="radio"><label for="answer_select_51">ときどきある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c504]" id="answer_select_52" value="2" class="radio"><label for="answer_select_52">なし</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q5</p>
					<p class="mental-question-text mb-10">何故か昔の印象深い光景がイメージとして出てくる</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c505]" id="answer_select_30" value="0" class="radio"><label for="answer_select_30">よくある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c505]" id="answer_select_31" value="1" class="radio"><label for="answer_select_31">ときどきある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c505]" id="answer_select_32" value="2" class="radio"><label for="answer_select_32">なし</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q6</p>
					<p class="mental-question-text mb-10">自分にとって悪い状態にもかかわらず、どこかでその状態に安心している</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c506]" id="answer_select_80" value="0" class="radio"><label for="answer_select_80">よくある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c506]" id="answer_select_81" value="1" class="radio"><label for="answer_select_81">ときどきある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c506]" id="answer_select_82" value="2" class="radio"><label for="answer_select_82">なし</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q7</p>
					<p class="mental-question-text mb-10">なぜか、事故を起こしたり、被害者になったり、失敗やミスが続く</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c507]" id="answer_select_90" value="0" class="radio"><label for="answer_select_90">よくある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c507]" id="answer_select_91" value="1" class="radio"><label for="answer_select_91">ときどきある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c507]" id="answer_select_92" value="2" class="radio"><label for="answer_select_92">なし</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q8</p>
					<p class="mental-question-text mb-10">わけのわからないことで、イライラしたり、不安になる、あるいは無気力になったりする</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c508]" id="answer_select_20" value="0" class="radio"><label for="answer_select_20">よくある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c508]" id="answer_select_21" value="1" class="radio"><label for="answer_select_21">ときどきある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c508]" id="answer_select_22" value="2" class="radio"><label for="answer_select_22">なし</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q9</p>
					<p class="mental-question-text mb-10">自分にとってよくないとわかっているのに、そのよくない方へなぜか進んでいく</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c509]" id="answer_select_70" value="0" class="radio"><label for="answer_select_70">よくある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c509]" id="answer_select_71" value="1" class="radio"><label for="answer_select_71">ときどきある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c509]" id="answer_select_72" value="2" class="radio"><label for="answer_select_72">なし</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q10</p>
					<p class="mental-question-text mb-10">家族やまわりの人に悪いとわかっているが、何度もしてしまう</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c510]" id="answer_select_40" value="0" class="radio"><label for="answer_select_40">よくある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c510]" id="answer_select_41" value="1" class="radio"><label for="answer_select_41">ときどきある</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c510]" id="answer_select_42" value="2" class="radio"><label for="answer_select_42">なし</label>					</div>
									</div>
			</div>
				<div class="field">
			<div class="control">
				<button type="submit" class="button is-next is-fullwidth is-display-block button-icon-arrow-right">次へ</button>			</div>
		</div>
	<div style="display:none;"><input type="hidden" name="data[_Token][fields]" value="" id="T¥">
		<input type="hidden" name="data[_Token][unlocked]" value="" id=""></div></form></div>
	</div>     

</body></html>