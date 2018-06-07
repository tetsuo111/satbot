<html>
 <head>
  <title>PHP Checktest</title>
 </head>
 <body>
  <font size="7">
    チェックテストを保存しました。右上の「×」印をクリックしてLINEへ戻り、「Confirm」ボタンを押してくだい。</font>
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

      $stmt = $conn->prepare("INSERT INTO SATBOT_experiment_checktest (lid, wt, c101, c102, c103, c104, c105, c106, c107, c108, c109, c110) 
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
 </body>
</html>