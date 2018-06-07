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

	      $stmt = $conn->prepare("INSERT INTO SATBOT_experiment_checktest1 (lid, wt, c101, c102, c103, c104, c105, c106, c107, c108, c109, c110) 
	        VALUES (:lid, :wt, :c101, :c102, :c103, :c104, :c105, :c106, :c107, :c108, :c109, :c110)");
	      $stmt->bindParam(':lid', $_POST['lid']);
	      $stmt->bindParam(':wt', $wt, PDO::PARAM_STR);
	      $stmt->bindParam(':c101', $_POST['data']['c101']);
	      $stmt->bindParam(':c102', $_POST['data']['c102']);
	      $stmt->bindParam(':c103', $_POST['data']['c103']);
	      $stmt->bindParam(':c104', $_POST['data']['c104']);
	      $stmt->bindParam(':c105', $_POST['data']['c105']);
	      $stmt->bindParam(':c106', $_POST['data']['c106']);
	      $stmt->bindParam(':c107', $_POST['data']['c107']);
	      $stmt->bindParam(':c108', $_POST['data']['c108']);
	      $stmt->bindParam(':c109', $_POST['data']['c109']);
	      $stmt->bindParam(':c110', $_POST['data']['c110']);
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
		<form action="https://satbot-v2.herokuapp.com/public/checktest/checktest3.php" id="checktest2_Form" method="post" accept-charset="utf-8">
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
					<p class="mental-question-text mb-10">気持ちがしずんでしまうことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c201]" id="answer_select_10" value="0" class="radio"><label for="answer_select_10">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c201]" id="answer_select_11" value="1" class="radio"><label for="answer_select_11">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c201]" id="answer_select_12" value="2" class="radio"><label for="answer_select_12">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c201]" id="answer_select_13" value="3" class="radio"><label for="answer_select_13">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q2</p>
					<p class="mental-question-text mb-10">朝、気分よく起きられたことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c202]" id="answer_select_170" value="0" class="radio"><label for="answer_select_170">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c202]" id="answer_select_171" value="1" class="radio"><label for="answer_select_171">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c202]" id="answer_select_172" value="2" class="radio"><label for="answer_select_172">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c202]" id="answer_select_173" value="3" class="radio"><label for="answer_select_173">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q3</p>
					<p class="mental-question-text mb-10">眠りが浅いように感じたことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c203]" id="answer_select_140" value="0" class="radio"><label for="answer_select_140">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c203]" id="answer_select_141" value="1" class="radio"><label for="answer_select_141">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c203]" id="answer_select_142" value="2" class="radio"><label for="answer_select_142">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c203]" id="answer_select_143" value="3" class="radio"><label for="answer_select_143">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q4</p>
					<p class="mental-question-text mb-10">普段の生活に満足できたことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c204]" id="answer_select_30" value="0" class="radio"><label for="answer_select_30">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c204]" id="answer_select_31" value="1" class="radio"><label for="answer_select_31">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c204]" id="answer_select_32" value="2" class="radio"><label for="answer_select_32">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c204]" id="answer_select_33" value="3" class="radio"><label for="answer_select_33">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q5</p>
					<p class="mental-question-text mb-10">充実していると感じたことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c205]" id="answer_select_200" value="0" class="radio"><label for="answer_select_200">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c205]" id="answer_select_201" value="1" class="radio"><label for="answer_select_201">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c205]" id="answer_select_202" value="2" class="radio"><label for="answer_select_202">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c205]" id="answer_select_203" value="3" class="radio"><label for="answer_select_203">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q6</p>
					<p class="mental-question-text mb-10">いら立ってしまうことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c206]" id="answer_select_80" value="0" class="radio"><label for="answer_select_80">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c206]" id="answer_select_81" value="1" class="radio"><label for="answer_select_81">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c206]" id="answer_select_82" value="2" class="radio"><label for="answer_select_82">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c206]" id="answer_select_83" value="3" class="radio"><label for="answer_select_83">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q7</p>
					<p class="mental-question-text mb-10">何となく疲れていると感じたことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c207]" id="answer_select_150" value="0" class="radio"><label for="answer_select_150">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c207]" id="answer_select_151" value="1" class="radio"><label for="answer_select_151">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c207]" id="answer_select_152" value="2" class="radio"><label for="answer_select_152">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c207]" id="answer_select_153" value="3" class="radio"><label for="answer_select_153">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q8</p>
					<p class="mental-question-text mb-10">食欲がないように思うことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c208]" id="answer_select_160" value="0" class="radio"><label for="answer_select_160">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c208]" id="answer_select_161" value="1" class="radio"><label for="answer_select_161">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c208]" id="answer_select_162" value="2" class="radio"><label for="answer_select_162">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c208]" id="answer_select_163" value="3" class="radio"><label for="answer_select_163">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q9</p>
					<p class="mental-question-text mb-10">自分の将来のことに希望が持てないことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c209]" id="answer_select_20" value="0" class="radio"><label for="answer_select_20">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c209]" id="answer_select_21" value="1" class="radio"><label for="answer_select_21">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c209]" id="answer_select_22" value="2" class="radio"><label for="answer_select_22">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c209]" id="answer_select_23" value="3" class="radio"><label for="answer_select_23">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q10</p>
					<p class="mental-question-text mb-10">自分自身が嫌になってしまうことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c210]" id="answer_select_40" value="0" class="radio"><label for="answer_select_40">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c210]" id="answer_select_41" value="1" class="radio"><label for="answer_select_41">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c210]" id="answer_select_42" value="2" class="radio"><label for="answer_select_42">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c210]" id="answer_select_43" value="3" class="radio"><label for="answer_select_43">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q11</p>
					<p class="mental-question-text mb-10">心から楽しいと感じたことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c211]" id="answer_select_180" value="0" class="radio"><label for="answer_select_180">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c211]" id="answer_select_181" value="1" class="radio"><label for="answer_select_181">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c211]" id="answer_select_182" value="2" class="radio"><label for="answer_select_182">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c211]" id="answer_select_183" value="3" class="radio"><label for="answer_select_183">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q12</p>
					<p class="mental-question-text mb-10">孤独を感じたことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c212]" id="answer_select_190" value="0" class="radio"><label for="answer_select_190">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c212]" id="answer_select_191" value="1" class="radio"><label for="answer_select_191">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c212]" id="answer_select_192" value="2" class="radio"><label for="answer_select_192">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c212]" id="answer_select_193" value="3" class="radio"><label for="answer_select_193">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q13</p>
					<p class="mental-question-text mb-10">悲しい気分になったことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c213]" id="answer_select_60" value="0" class="radio"><label for="answer_select_60">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c213]" id="answer_select_61" value="1" class="radio"><label for="answer_select_61">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c213]" id="answer_select_62" value="2" class="radio"><label for="answer_select_62">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c213]" id="answer_select_63" value="3" class="radio"><label for="answer_select_63">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q14</p>
					<p class="mental-question-text mb-10">すぐに悩んでしまうことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c214]" id="answer_select_70" value="0" class="radio"><label for="answer_select_70">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c214]" id="answer_select_71" value="1" class="radio"><label for="answer_select_71">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c214]" id="answer_select_72" value="2" class="radio"><label for="answer_select_72">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c214]" id="answer_select_73" value="3" class="radio"><label for="answer_select_73">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q15</p>
					<p class="mental-question-text mb-10">何もしたくないと思うことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c215]" id="answer_select_110" value="0" class="radio"><label for="answer_select_110">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c215]" id="answer_select_111" value="1" class="radio"><label for="answer_select_111">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c215]" id="answer_select_112" value="2" class="radio"><label for="answer_select_112">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c215]" id="answer_select_113" value="3" class="radio"><label for="answer_select_113">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q16</p>
					<p class="mental-question-text mb-10">自分自身に魅力を感じなくなったことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c216]" id="answer_select_100" value="0" class="radio"><label for="answer_select_100">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c216]" id="answer_select_101" value="1" class="radio"><label for="answer_select_101">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c216]" id="answer_select_102" value="2" class="radio"><label for="answer_select_102">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c216]" id="answer_select_103" value="3" class="radio"><label for="answer_select_103">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q17</p>
					<p class="mental-question-text mb-10">何となく毎日を過ごしていると感じることが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c217]" id="answer_select_130" value="0" class="radio"><label for="answer_select_130">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c217]" id="answer_select_131" value="1" class="radio"><label for="answer_select_131">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c217]" id="answer_select_132" value="2" class="radio"><label for="answer_select_132">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c217]" id="answer_select_133" value="3" class="radio"><label for="answer_select_133">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q18</p>
					<p class="mental-question-text mb-10">自分はつまらない人間だと感じたことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c218]" id="answer_select_50" value="0" class="radio"><label for="answer_select_50">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c218]" id="answer_select_51" value="1" class="radio"><label for="answer_select_51">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c218]" id="answer_select_52" value="2" class="radio"><label for="answer_select_52">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c218]" id="answer_select_53" value="3" class="radio"><label for="answer_select_53">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q19</p>
					<p class="mental-question-text mb-10">物事を判断するのに困難を感じることが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c219]" id="answer_select_90" value="0" class="radio"><label for="answer_select_90">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c219]" id="answer_select_91" value="1" class="radio"><label for="answer_select_91">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c219]" id="answer_select_92" value="2" class="radio"><label for="answer_select_92">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c219]" id="answer_select_93" value="3" class="radio"><label for="answer_select_93">週のうち5日以上続いた</label>					</div>
									</div>
			</div>
					<div class="mental-question-wrapper">
				<div class="mental-question">
					<p class="mental-question-number">Q20</p>
					<p class="mental-question-text mb-10">自分が本当は何をやりたいのかわからないと思うことが</p>
				</div>
				<div class="mental-question-answer-wrapper">
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c220]" id="answer_select_120" value="0" class="radio"><label for="answer_select_120">1週間でまったくなかった</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c220]" id="answer_select_121" value="1" class="radio"><label for="answer_select_121">週のうち1～2日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c220]" id="answer_select_122" value="2" class="radio"><label for="answer_select_122">週のうち3～4日続いた</label>					</div>
										<div class="mental-question-answer mental-question-answer-quarter">
						<input type="radio" name="data[c220]" id="answer_select_123" value="3" class="radio"><label for="answer_select_123">週のうち5日以上続いた</label>					</div>
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