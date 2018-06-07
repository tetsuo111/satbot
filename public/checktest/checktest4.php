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

	      $stmt = $conn->prepare("INSERT INTO SATBOT_experiment_checktest3 (lid, wt, c301, c302, c303, c304, c305, c306, c307, c308, c309, c310) 
	        VALUES (:lid, :wt, :c301, :c302, :c303, :c304, :c305, :c306, :c307, :c308, :c309, :c310)");
	      $stmt->bindParam(':lid', $_POST['lid']);
	      $stmt->bindParam(':wt', $wt, PDO::PARAM_STR);
	      $stmt->bindParam(':c301', $_POST['data']['c301']);
	      $stmt->bindParam(':c302', $_POST['data']['c302']);
	      $stmt->bindParam(':c303', $_POST['data']['c303']);
	      $stmt->bindParam(':c304', $_POST['data']['c304']);
	      $stmt->bindParam(':c305', $_POST['data']['c305']);
	      $stmt->bindParam(':c306', $_POST['data']['c306']);
	      $stmt->bindParam(':c307', $_POST['data']['c307']);
	      $stmt->bindParam(':c308', $_POST['data']['c308']);
	      $stmt->bindParam(':c309', $_POST['data']['c309']);
	      $stmt->bindParam(':c310', $_POST['data']['c310']);
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
		<form action="https://satbot-v2.herokuapp.com/public/checktest/checktest5.php" id="checktest4_Form" method="post" accept-charset="utf-8">
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
					<p class="mental-question-text mb-10">新しいことをするのは、楽しみだ</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c401]" id="answer_select_120" value="0" class="radio"><label for="answer_select_120">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c401]" id="answer_select_121" value="1" class="radio"><label for="answer_select_121">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c401]" id="answer_select_122" value="2" class="radio"><label for="answer_select_122">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c401]" id="answer_select_123" value="3" class="radio"><label for="answer_select_123">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q2</p>
					<p class="mental-question-text mb-10">他人のことが気になる</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c402]" id="answer_select_150" value="0" class="radio"><label for="answer_select_150">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c402]" id="answer_select_151" value="1" class="radio"><label for="answer_select_151">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c402]" id="answer_select_152" value="2" class="radio"><label for="answer_select_152">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c402]" id="answer_select_153" value="3" class="radio"><label for="answer_select_153">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q3</p>
					<p class="mental-question-text mb-10">何か起きるのではないかと、気になってしまう</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c403]" id="answer_select_70" value="0" class="radio"><label for="answer_select_70">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c403]" id="answer_select_71" value="1" class="radio"><label for="answer_select_71">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c403]" id="answer_select_72" value="2" class="radio"><label for="answer_select_72">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c403]" id="answer_select_73" value="3" class="radio"><label for="answer_select_73">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q4</p>
					<p class="mental-question-text mb-10">なかなか決断できない</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c404]" id="answer_select_50" value="0" class="radio"><label for="answer_select_50">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c404]" id="answer_select_51" value="1" class="radio"><label for="answer_select_51">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c404]" id="answer_select_52" value="2" class="radio"><label for="answer_select_52">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c404]" id="answer_select_53" value="3" class="radio"><label for="answer_select_53">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q5</p>
					<p class="mental-question-text mb-10">つまらないことでも、悩んでしまう</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c405]" id="answer_select_80" value="0" class="radio"><label for="answer_select_80">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c405]" id="answer_select_81" value="1" class="radio"><label for="answer_select_81">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c405]" id="answer_select_82" value="2" class="radio"><label for="answer_select_82">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c405]" id="answer_select_83" value="3" class="radio"><label for="answer_select_83">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q6</p>
					<p class="mental-question-text mb-10">家にいても、気持ちが落ち着かない</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c406]" id="answer_select_20" value="0" class="radio"><label for="answer_select_20">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c406]" id="answer_select_21" value="1" class="radio"><label for="answer_select_21">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c406]" id="answer_select_22" value="2" class="radio"><label for="answer_select_22">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c406]" id="answer_select_23" value="3" class="radio"><label for="answer_select_23">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q7</p>
					<p class="mental-question-text mb-10">細かいことまで、気にしてしまう</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c407]" id="answer_select_60" value="0" class="radio"><label for="answer_select_60">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c407]" id="answer_select_61" value="1" class="radio"><label for="answer_select_61">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c407]" id="answer_select_62" value="2" class="radio"><label for="answer_select_62">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c407]" id="answer_select_63" value="3" class="radio"><label for="answer_select_63">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q8</p>
					<p class="mental-question-text mb-10">些細なことも気になってしまう</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c408]" id="answer_select_100" value="0" class="radio"><label for="answer_select_100">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c408]" id="answer_select_101" value="1" class="radio"><label for="answer_select_101">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c408]" id="answer_select_102" value="2" class="radio"><label for="answer_select_102">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c408]" id="answer_select_103" value="3" class="radio"><label for="answer_select_103">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q9</p>
					<p class="mental-question-text mb-10">疲労感がなかなか抜けない</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c409]" id="answer_select_130" value="0" class="radio"><label for="answer_select_130">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c409]" id="answer_select_131" value="1" class="radio"><label for="answer_select_131">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c409]" id="answer_select_132" value="2" class="radio"><label for="answer_select_132">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c409]" id="answer_select_133" value="3" class="radio"><label for="answer_select_133">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q10</p>
					<p class="mental-question-text mb-10">難しそうなことは、避けようとする</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c410]" id="answer_select_30" value="0" class="radio"><label for="answer_select_30">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c410]" id="answer_select_31" value="1" class="radio"><label for="answer_select_31">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c410]" id="answer_select_32" value="2" class="radio"><label for="answer_select_32">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c410]" id="answer_select_33" value="3" class="radio"><label for="answer_select_33">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q11</p>
					<p class="mental-question-text mb-10">夜、寝つきが悪い</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c411]" id="answer_select_110" value="0" class="radio"><label for="answer_select_110">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c411]" id="answer_select_111" value="1" class="radio"><label for="answer_select_111">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c411]" id="answer_select_112" value="2" class="radio"><label for="answer_select_112">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c411]" id="answer_select_113" value="3" class="radio"><label for="answer_select_113">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q12</p>
					<p class="mental-question-text mb-10">何でもないようなことにも、あれこれと思いわずらってしまう</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c412]" id="answer_select_180" value="0" class="radio"><label for="answer_select_180">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c412]" id="answer_select_181" value="1" class="radio"><label for="answer_select_181">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c412]" id="answer_select_182" value="2" class="radio"><label for="answer_select_182">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c412]" id="answer_select_183" value="3" class="radio"><label for="answer_select_183">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q13</p>
					<p class="mental-question-text mb-10">緊張して、イライラしてしまう</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c413]" id="answer_select_170" value="0" class="radio"><label for="answer_select_170">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c413]" id="answer_select_171" value="1" class="radio"><label for="answer_select_171">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c413]" id="answer_select_172" value="2" class="radio"><label for="answer_select_172">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c413]" id="answer_select_173" value="3" class="radio"><label for="answer_select_173">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q14</p>
					<p class="mental-question-text mb-10">先のことが気になって、集中できない</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c414]" id="answer_select_160" value="0" class="radio"><label for="answer_select_160">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c414]" id="answer_select_161" value="1" class="radio"><label for="answer_select_161">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c414]" id="answer_select_162" value="2" class="radio"><label for="answer_select_162">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c414]" id="answer_select_163" value="3" class="radio"><label for="answer_select_163">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q15</p>
					<p class="mental-question-text mb-10">失敗をしてしまうのではと、気になってしまう</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c415]" id="answer_select_10" value="0" class="radio"><label for="answer_select_10">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c415]" id="answer_select_11" value="1" class="radio"><label for="answer_select_11">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c415]" id="answer_select_12" value="2" class="radio"><label for="answer_select_12">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c415]" id="answer_select_13" value="3" class="radio"><label for="answer_select_13">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q16</p>
					<p class="mental-question-text mb-10">気持ちが落ち着いている</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c416]" id="answer_select_200" value="0" class="radio"><label for="answer_select_200">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c416]" id="answer_select_201" value="1" class="radio"><label for="answer_select_201">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c416]" id="answer_select_202" value="2" class="radio"><label for="answer_select_202">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c416]" id="answer_select_203" value="3" class="radio"><label for="answer_select_203">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q17</p>
					<p class="mental-question-text mb-10">何も手につかないことがある</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c417]" id="answer_select_90" value="0" class="radio"><label for="answer_select_90">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c417]" id="answer_select_91" value="1" class="radio"><label for="answer_select_91">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c417]" id="answer_select_92" value="2" class="radio"><label for="answer_select_92">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c417]" id="answer_select_93" value="3" class="radio"><label for="answer_select_93">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q18</p>
					<p class="mental-question-text mb-10">人に会うのがおっくうである</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c418]" id="answer_select_190" value="0" class="radio"><label for="answer_select_190">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c418]" id="answer_select_191" value="1" class="radio"><label for="answer_select_191">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c418]" id="answer_select_192" value="2" class="radio"><label for="answer_select_192">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c418]" id="answer_select_193" value="3" class="radio"><label for="answer_select_193">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q19</p>
					<p class="mental-question-text mb-10">責任ある仕事を任されると、逃げ出したい気持ちになる</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c419]" id="answer_select_140" value="0" class="radio"><label for="answer_select_140">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c419]" id="answer_select_141" value="1" class="radio"><label for="answer_select_141">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c419]" id="answer_select_142" value="2" class="radio"><label for="answer_select_142">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c419]" id="answer_select_143" value="3" class="radio"><label for="answer_select_143">いつもそうである</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q20</p>
					<p class="mental-question-text mb-10">小さなことでも、深く考え込んでしまう</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c420]" id="answer_select_40" value="0" class="radio"><label for="answer_select_40">そうではない</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c420]" id="answer_select_41" value="1" class="radio"><label for="answer_select_41">たまにそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c420]" id="answer_select_42" value="2" class="radio"><label for="answer_select_42">しばしばそうである</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c420]" id="answer_select_43" value="3" class="radio"><label for="answer_select_43">いつもそうである</label>					</div>
									</div>
			</div>
				<div class="field">
			<div class="control">
				<button type="submit" class="button is-next is-fullwidth is-display-block button-icon-arrow-right">次へ</button>			</div>
		</div>

	<div style="display:none;"><input type="hidden" name="data[_Token][fields]" value="" id="">
		<input type="hidden" name="data[_Token][unlocked]" value="" id=""></div></form></div>
	</div>     

</body></html>