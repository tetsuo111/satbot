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

	      $stmt = $conn->prepare("INSERT INTO SATBOT_experiment_checktest2 (lid, wt, c201, c202, c203, c204, c205, c206, c207, c208, c209, c210, c211, c212, c213, c214, c215, c216, c217, c218, c219, c220) 
	        VALUES (:lid, :wt, :c201, :c202, :c203, :c204, :c205, :c206, :c207, :c208, :c209, :c210, :c211, :c212, :c213, :c214, :c215, :c216, :c217, :c218, :c219, :c220)");
	      $stmt->bindParam(':lid', $_POST['lid']);
	      $stmt->bindParam(':wt', $wt, PDO::PARAM_STR);
	      $stmt->bindParam(':c201', $_POST['data']['c201']);
	      $stmt->bindParam(':c202', $_POST['data']['c202']);
	      $stmt->bindParam(':c203', $_POST['data']['c203']);
	      $stmt->bindParam(':c204', $_POST['data']['c204']);
	      $stmt->bindParam(':c205', $_POST['data']['c205']);
	      $stmt->bindParam(':c206', $_POST['data']['c206']);
	      $stmt->bindParam(':c207', $_POST['data']['c207']);
	      $stmt->bindParam(':c208', $_POST['data']['c208']);
	      $stmt->bindParam(':c209', $_POST['data']['c209']);
	      $stmt->bindParam(':c210', $_POST['data']['c210']);
	      $stmt->bindParam(':c211', $_POST['data']['c211']);
	      $stmt->bindParam(':c212', $_POST['data']['c212']);
	      $stmt->bindParam(':c213', $_POST['data']['c213']);
	      $stmt->bindParam(':c214', $_POST['data']['c214']);
	      $stmt->bindParam(':c215', $_POST['data']['c215']);
	      $stmt->bindParam(':c216', $_POST['data']['c216']);
	      $stmt->bindParam(':c217', $_POST['data']['c217']);
	      $stmt->bindParam(':c218', $_POST['data']['c218']);
	      $stmt->bindParam(':c219', $_POST['data']['c219']);
	      $stmt->bindParam(':c220', $_POST['data']['c220']);
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
	<form action="https://satbot-v2.herokuapp.com/public/checktest/checktest4.php" id="checktest3_Form" method="post" accept-charset="utf-8">
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
					<p class="mental-question-text mb-10">人を批判するのは悪いと感じる方である</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c301]" id="answer_select_90" value="0" class="radio"><label for="answer_select_90">いつもそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c301]" id="answer_select_91" value="1" class="radio"><label for="answer_select_91">まあそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c301]" id="answer_select_92" value="2" class="radio"><label for="answer_select_92">そうではない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q2</p>
					<p class="mental-question-text mb-10">思っていることを安易に口に出せない</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c302]" id="answer_select_20" value="0" class="radio"><label for="answer_select_20">いつもそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c302]" id="answer_select_21" value="1" class="radio"><label for="answer_select_21">まあそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c302]" id="answer_select_22" value="2" class="radio"><label for="answer_select_22">そうではない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q3</p>
					<p class="mental-question-text mb-10">つらいことがあっても我慢する方である</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c303]" id="answer_select_40" value="0" class="radio"><label for="answer_select_40">いつもそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c303]" id="answer_select_41" value="1" class="radio"><label for="answer_select_41">まあそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c303]" id="answer_select_42" value="2" class="radio"><label for="answer_select_42">そうではない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q4</p>
					<p class="mental-question-text mb-10">自分らしさがないような気がする</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c304]" id="answer_select_80" value="0" class="radio"><label for="answer_select_80">いつもそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c304]" id="answer_select_81" value="1" class="radio"><label for="answer_select_81">まあそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c304]" id="answer_select_82" value="2" class="radio"><label for="answer_select_82">そうではない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q5</p>
					<p class="mental-question-text mb-10">人の期待に沿うよう努力する方である</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c305]" id="answer_select_60" value="0" class="radio"><label for="answer_select_60">いつもそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c305]" id="answer_select_61" value="1" class="radio"><label for="answer_select_61">まあそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c305]" id="answer_select_62" value="2" class="radio"><label for="answer_select_62">そうではない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q6</p>
					<p class="mental-question-text mb-10">人から気にいられたいと思う</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c306]" id="answer_select_50" value="0" class="radio"><label for="answer_select_50">いつもそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c306]" id="answer_select_51" value="1" class="radio"><label for="answer_select_51">まあそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c306]" id="answer_select_52" value="2" class="radio"><label for="answer_select_52">そうではない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q7</p>
					<p class="mental-question-text mb-10">自分の感情を抑えてしまう方だ</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c307]" id="answer_select_10" value="0" class="radio"><label for="answer_select_10">いつもそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c307]" id="answer_select_11" value="1" class="radio"><label for="answer_select_11">まあそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c307]" id="answer_select_12" value="2" class="radio"><label for="answer_select_12">そうではない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q8</p>
					<p class="mental-question-text mb-10">自分の考えを通そうとする方ではない</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c308]" id="answer_select_70" value="0" class="radio"><label for="answer_select_70">いつもそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c308]" id="answer_select_71" value="1" class="radio"><label for="answer_select_71">まあそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c308]" id="answer_select_72" value="2" class="radio"><label for="answer_select_72">そうではない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q9</p>
					<p class="mental-question-text mb-10">自分にとって重要な人には自分のことをわかってほしいと思う</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c309]" id="answer_select_100" value="0" class="radio"><label for="answer_select_100">いつもそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c309]" id="answer_select_101" value="1" class="radio"><label for="answer_select_101">まあそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c309]" id="answer_select_102" value="2" class="radio"><label for="answer_select_102">そうではない</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q10</p>
					<p class="mental-question-text mb-10">人の顔色や言動が気になる方である</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer">
						<input type="radio" name="data[c310]" id="answer_select_30" value="0" class="radio"><label for="answer_select_30">いつもそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c310]" id="answer_select_31" value="1" class="radio"><label for="answer_select_31">まあそうである</label>					</div>
										<div class="mental-question-answer">
						<input type="radio" name="data[c310]" id="answer_select_32" value="2" class="radio"><label for="answer_select_32">そうではない</label>					</div>
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