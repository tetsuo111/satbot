<!DOCTYPE html>
<!-- saved from url=(0059)http://stg.mindset-research.co.jp/wb/MentalCheck/check_23_1 -->
<html class="gr__stg_mindset-research_co_jp"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">    <title>SAT BOT | </title>
  
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

  $hostname = $dbparts['host'];
  $username = $dbparts['user'];
  $password = $dbparts['pass'];
  $database = ltrim($dbparts['path'],'/');

  try {
      $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("INSERT INTO face (uid, face_1, face_2, face_3, face_4, face_5, face_6, face_7) 
        VALUES (:uid, :face_1, :face_2, :face_3, :face_4, :face_5, :face_6, :face_7)");
      $stmt->bindParam(':uid', $_POST['uid']);
      $stmt->bindParam(':face_1', $_POST['data']['select_face_id'][0]);
      $stmt->bindParam(':face_2', $_POST['data']['select_face_id'][1]);
      $stmt->bindParam(':face_3', $_POST['data']['select_face_id'][2]);
      $stmt->bindParam(':face_4', $_POST['data']['select_face_id'][3]);
      $stmt->bindParam(':face_5', $_POST['data']['select_face_id'][4]);
      $stmt->bindParam(':face_6', $_POST['data']['select_face_id'][5]);
      $stmt->bindParam(':face_7', $_POST['data']['select_face_id'][6]);
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
      <input type="hidden" name="uid" value="<?php echo $_POST['lid'];?>"></div>
      <div class="progress is-large">
      <div class="progress-bar is-orange progress-bar-0"><p></p></div>
    </div>
    <div class="mental-question-title mb-20">
      <p class="is-color-grey">選んだ顔画像を保存しました。右上の「×」印をクリックしてLINEへ戻り、「選んだらここ」ボタンを押してくだい。</p>
    </div>

      </div>

  <div style="display:none;"><input type="hidden" name="data[_Token][fields]" value="" id="T¥">
    <input type="hidden" name="data[_Token][unlocked]" value="" id=""></div></form></div>
  </div>     

</body></html>