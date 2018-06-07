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

	      $stmt = $conn->prepare("INSERT INTO SATBOT_experiment_checktest5 (lid, wt, c501, c502, c503, c504, c505, c506, c507, c508, c509, c510) 
	        VALUES (:lid, :wt, :c501, :c502, :c503, :c504, :c505, :c506, :c507, :c508, :c509, :c510)");
	      $stmt->bindParam(':lid', $_POST['lid']);
	      $stmt->bindParam(':wt', $wt, PDO::PARAM_STR);
	      $stmt->bindParam(':c501', $_POST['data']['c501']);
	      $stmt->bindParam(':c502', $_POST['data']['c502']);
	      $stmt->bindParam(':c503', $_POST['data']['c503']);
	      $stmt->bindParam(':c504', $_POST['data']['c504']);
	      $stmt->bindParam(':c505', $_POST['data']['c505']);
	      $stmt->bindParam(':c506', $_POST['data']['c506']);
	      $stmt->bindParam(':c507', $_POST['data']['c507']);
	      $stmt->bindParam(':c508', $_POST['data']['c508']);
	      $stmt->bindParam(':c509', $_POST['data']['c509']);
	      $stmt->bindParam(':c510', $_POST['data']['c510']);
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
			<p class="is-color-grey">あなたにあてはまるものを選んでください。</p>
		</div>
							<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q1</p>
					<p class="mental-question-text mb-10">人に頼るのは苦手である</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c601]" id="answer_select_80" value="0" class="radio"><label for="answer_select_80">いつもそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c601]" id="answer_select_81" value="1" class="radio"><label for="answer_select_81">まあそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c601]" id="answer_select_82" value="2" class="radio"><label for="answer_select_82">そうでない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q2</p>
					<p class="mental-question-text mb-10">自分の感情や気持ちがわからなくなることがある</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c602]" id="answer_select_90" value="0" class="radio"><label for="answer_select_90">いつもそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c602]" id="answer_select_91" value="1" class="radio"><label for="answer_select_91">まあそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c602]" id="answer_select_92" value="2" class="radio"><label for="answer_select_92">そうでない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q3</p>
					<p class="mental-question-text mb-10">理由のわからない下痢、便秘、頭痛、腰痛、肩凝り、アレルギー症状など慢性的な身体症状がある</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c603]" id="answer_select_100" value="0" class="radio"><label for="answer_select_100">いつもそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c603]" id="answer_select_101" value="1" class="radio"><label for="answer_select_101">まあそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c603]" id="answer_select_102" value="2" class="radio"><label for="answer_select_102">そうでない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q4</p>
					<p class="mental-question-text mb-10">自立している自分に安心感がある</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c604]" id="answer_select_50" value="0" class="radio"><label for="answer_select_50">いつもそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c604]" id="answer_select_51" value="1" class="radio"><label for="answer_select_51">まあそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c604]" id="answer_select_52" value="2" class="radio"><label for="answer_select_52">そうでない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q5</p>
					<p class="mental-question-text mb-10">人に弱音を吐きたくない方である</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c605]" id="answer_select_40" value="0" class="radio"><label for="answer_select_40">いつもそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c605]" id="answer_select_41" value="1" class="radio"><label for="answer_select_41">まあそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c605]" id="answer_select_42" value="2" class="radio"><label for="answer_select_42">そうでない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q6</p>
					<p class="mental-question-text mb-10">どちらかというと人に頼られるほうである</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c606]" id="answer_select_20" value="0" class="radio"><label for="answer_select_20">いつもそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c606]" id="answer_select_21" value="1" class="radio"><label for="answer_select_21">まあそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c606]" id="answer_select_22" value="2" class="radio"><label for="answer_select_22">そうでない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q7</p>
					<p class="mental-question-text mb-10">感情的にならない自分に安心感がある</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c607]" id="answer_select_30" value="0" class="radio"><label for="answer_select_30">いつもそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c607]" id="answer_select_31" value="1" class="radio"><label for="answer_select_31">まあそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c607]" id="answer_select_32" value="2" class="radio"><label for="answer_select_32">そうでない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q8</p>
					<p class="mental-question-text mb-10">依存的になる自分に許せないとか、恥ずかしさを感じる</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c608]" id="answer_select_60" value="0" class="radio"><label for="answer_select_60">いつもそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c608]" id="answer_select_61" value="1" class="radio"><label for="answer_select_61">まあそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c608]" id="answer_select_62" value="2" class="radio"><label for="answer_select_62">そうでない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q9</p>
					<p class="mental-question-text mb-10">感情的になる自分が恥ずかしい方である</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c609]" id="answer_select_10" value="0" class="radio"><label for="answer_select_10">いつもそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c609]" id="answer_select_11" value="1" class="radio"><label for="answer_select_11">まあそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c609]" id="answer_select_12" value="2" class="radio"><label for="answer_select_12">そうでない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q10</p>
					<p class="mental-question-text mb-10">弱い自分を見せたくない方である</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c610]" id="answer_select_70" value="0" class="radio"><label for="answer_select_70">いつもそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c610]" id="answer_select_71" value="1" class="radio"><label for="answer_select_71">まあそう</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c610]" id="answer_select_72" value="2" class="radio"><label for="answer_select_72">そうでない</label>					</div>
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