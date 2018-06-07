<?php
/*------返信用関数-------*/
function replyTextMessage($bot, $replyToken, $text) {
  $response = $bot->replyMessage($replyToken, new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($text));
  if (!$response->isSucceeded()) {
    error_log('Failed!'. $response->getHTTPStatus . ' ' . $response->getRawBody());
  }
}

function replyImageMessage($bot, $replyToken, $originalImageUrl, $previewImageUrl) {
  $response = $bot->replyMessage($replyToken, new \LINE\LINEBot\MessageBuilder\ImageMessageBuilder($originalImageUrl, $previewImageUrl));
  if (!$response->isSucceeded()) {
    error_log('Failed!'. $response->getHTTPStatus . ' ' . $response->getRawBody());
  }
}

function replyButtonsTemplate($bot, $replyToken, $alternativeText, $imageUrl, $title, $text, ...$actions) {
  $actionArray = array();
  foreach($actions as $value) {
    array_push($actionArray, $value);
  }
  $builder = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
    $alternativeText,
    new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder ($title, $text, $imageUrl, $actionArray)
  );
  $response = $bot->replyMessage($replyToken, $builder);
  if (!$response->isSucceeded()) {
    error_log('Failed!'. $response->getHTTPStatus . ' ' . $response->getRawBody());
  }
}

function replyConfirmTemplate($bot, $replyToken, $alternativeText, $text, ...$actions) {
  $actionArray = array();
  foreach($actions as $value) {
    array_push($actionArray, $value);
  }
  $builder = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
    $alternativeText,
    new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder ($text, $actionArray)
  );
  $response = $bot->replyMessage($replyToken, $builder);
  if (!$response->isSucceeded()) {
    error_log('Failed!'. $response->getHTTPStatus . ' ' . $response->getRawBody());
  }
}

function replyCarouselTemplate($bot, $replyToken, $alternativeText, $columnArray) {
  $builder = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
  $alternativeText,
  new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
   $columnArray)
  );
  $response = $bot->replyMessage($replyToken, $builder);
  if (!$response->isSucceeded()) {
    error_log('Failed!'. $response->getHTTPStatus . ' ' . $response->getRawBody());
  }
}

function replyImageCarouselTemplate($bot, $replyToken, $alternativeText, $columnArray) {
  $builder = new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
  $alternativeText,
  new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder (
   $columnArray)
  );
  $response = $bot->replyMessage($replyToken, $builder);
  if (!$response->isSucceeded()) {
    error_log('Failed!'. $response->getHTTPStatus . ' ' . $response->getRawBody());
  }
}

function replyMultiMessage($bot, $replyToken, ...$msgs) {
  $builder = new \LINE\LINEBot\MessageBuilder\MultiMessageBuilder();
  foreach($msgs as $value) {
    $builder->add($value);
  }
  $response = $bot->replyMessage($replyToken, $builder);
  if (!$response->isSucceeded()) {
    error_log('Failed!'. $response->getHTTPStatus . ' ' . $response->getRawBody());
  }
}

/*------DBへ接続する関数-------*/

function DBinsert($id=0, $step=0, $userinput=null) {
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

      $stmt = $conn->prepare("INSERT INTO satbot (id, step, wt, userinput) 
        VALUES (:id, :step, :wt, :userinput)");
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':step', $step);
      $stmt->bindParam(':wt', $wt, PDO::PARAM_STR);
      $stmt->bindParam(':userinput', $userinput);
      // 使用 exec() ，没有结果返回 
      $stmt->execute();
      $conn = null;
      }
  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }
      $conn = null;

}

function DBselect($id) {
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

      $stmt = $conn->prepare("SELECT * FROM satbot WHERE id =:id ORDER BY tid desc LIMIT 1");
      $stmt->bindParam(':id', $id);  
      // 使用 exec() ，没有结果返回 
      $stmt->execute();

      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
       $step = $row['step'];
      }
      $conn = null;
    }
  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }

      $conn = null;

  return array('step' => $step);
}

function DBupdate($id=0, $step=0) {
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

      $stmt = $conn->prepare("UPDATE satbot SET step=:step, id=:id, userinput=:userinput WHERE id=:id ORDER BY tid desc LIMIT 1");
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':step', $step);
      $stmt->bindParam(':wt', $wt, PDO::PARAM_STR);
      $stmt->bindParam(':userinput', $userinput);
      // 使用 exec() ，没有结果返回 
      $stmt->execute();
      $conn = null;
    }
  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }

      $conn = null;

}

function DBdelete($id) {
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

      $stmt = $conn->prepare("DELETE FROM satbot WHERE id=:id");
      $stmt->bindParam(':id', $id);  
      // 使用 exec() ，没有结果返回 
      $stmt->execute();
      $conn = null;
    }
  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }

      $conn = null;

}

function DBlightimgselect($uid) {
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

      $stmt = $conn->prepare("SELECT * FROM light WHERE uid =:uid ORDER BY tid desc LIMIT 1");
      $stmt->bindParam(':uid', $uid);   
      // 使用 exec() ，没有结果返回 
      $stmt->execute();

      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
       $light_1 = $row['light_1'];
       $light_2 = $row['light_2'];
       $light_3 = $row['light_3'];
       $light_4 = $row['light_4'];
       $light_5 = $row['light_5'];
      }
      $conn = null;
    }
  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }
      $conn = null;

  return array('light_1' => $light_1, 'light_2' =>$light_2, 'light_3'=> $light_3, 
    'light_4' => $light_4, 'light_5' => $light_5);
}

function DBfaceimgselect($uid) {
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

      $stmt = $conn->prepare("SELECT * FROM face WHERE uid =:uid ORDER BY tid desc LIMIT 1");
      $stmt->bindParam(':uid', $uid);   
      // 使用 exec() ，没有结果返回 
      $stmt->execute();

      while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
       $face_1 = $row['face_1'];
       $face_2 = $row['face_2'];
       $face_3 = $row['face_3'];
       $face_4 = $row['face_4'];
       $face_5 = $row['face_5'];
       $face_6 = $row['face_6'];
       $face_7 = $row['face_7'];
      }

      $conn = null;
    }
  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }
      $conn = null;

  return array('face_1' => $face_1, 'face_2' =>$face_2, 'face_3'=> $face_3, 
    'face_4' => $face_4, 'face_5' => $face_5, 'face_6' => $face_6, 'face_7' => $face_7);
}

function DBcreateUserlist($id=0) {
  $url = getenv('JAWSDB_MARIA_URL');
  $dbparts = parse_url($url);
  $ft = new DateTime(); 
  $ft = $ft->format('Y-m-d H:i:s'); 

  $hostname = $dbparts['host'];
  $username = $dbparts['user'];
  $password = $dbparts['pass'];
  $database = ltrim($dbparts['path'],'/');
  $count = "0";

  try {
      $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("INSERT INTO SATBOT_UserList (uid, ft, count) 
        VALUES (:uid, :ft, :count) ON DUPLICATE KEY UPDATE count=count+1");
      $stmt->bindParam(':uid', $id);
      $stmt->bindParam(':ft', $ft, PDO::PARAM_STR);
      $stmt->bindParam(':count', $count);
      // 使用 exec() ，没有结果返回 
      $stmt->execute();
      $conn = null;
      }
  catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }
      $conn = null;

}


?>
