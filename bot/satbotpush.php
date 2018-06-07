<?php
// HTTPヘッダを設定
$channelToken = getenv('CHANNEL_ACCESS_TOKEN');
$headers = [
  'Authorization: Bearer ' . $channelToken,
  'Content-Type: application/json; charset=utf-8',
];
$arr = array('U20018c31875154e683f6db4b41a3d929');

foreach($arr as $uid) {
  // POSTデータを設定してJSONにエンコード
  $post = [
    'to' => $uid,
    'messages' => [
      [
        'type' => 'text',
        'text' => '今日一日お疲れ様でした！今日のストレスを軽減しませんか？もし良かったら、機能メニューの「スタート」を押してくださいね！',
      ],
    ],
  ];
  $post = json_encode($post);

  // HTTPリクエストを設定
  $ch = curl_init('https://api.line.me/v2/bot/message/push');
  $options = [
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_BINARYTRANSFER => true,
    CURLOPT_HEADER => true,
    CURLOPT_POSTFIELDS => $post,
  ];
  curl_setopt_array($ch, $options);

  // 実行
  $result = curl_exec($ch);

  // エラーチェック
  $errno = curl_errno($ch);
  if ($errno) {
    return;
  }

  // HTTPステータスを取得
  $info = curl_getinfo($ch);
  $httpStatus = $info['http_code'];

  $responseHeaderSize = $info['header_size'];
  $body = substr($result, $responseHeaderSize);

  // 200 だったら OK
  echo $httpStatus . ' ' . $body;
}




// <?php
// // HTTPヘッダを設定
// $channelToken = getenv('CHANNEL_ACCESS_TOKEN');
// $headers = [
//   'Authorization: Bearer ' . $channelToken,
//   'Content-Type: application/json; charset=utf-8',
// ];

// //日本時間確認
// date_default_timezone_set('Asia/Tokyo');
// $now = date('Y-m-d H :i :s e');
// $month_now = date('m');
// $day_now = date('d');
// // POSTデータを設定してJSONにエンコード
// $post = [
//   'to' => 'U20018c31875154e683f6db4b41a3d929',
//   'messages' => [
//     [
//       'type' => 'text',
//       'text' => '今日一日お疲れ様でした！今日のストレスを軽減しませんか？もし良かったら、スタートを押してくださいね！',
//     ],
//   ],
// ];
// $post = json_encode($post);

// // HTTPリクエストを設定
// $ch = curl_init('https://api.line.me/v2/bot/message/push');
// $options = [
//   CURLOPT_CUSTOMREQUEST => 'POST',
//   CURLOPT_HTTPHEADER => $headers,
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_BINARYTRANSFER => true,
//   CURLOPT_HEADER => true,
//   CURLOPT_POSTFIELDS => $post,
// ];
// curl_setopt_array($ch, $options);

// // 実行

// $result = curl_exec($ch);

// // エラーチェック
// $errno = curl_errno($ch);
// if ($errno) {
//   return;
// }

// // HTTPステータスを取得
// $info = curl_getinfo($ch);
// $httpStatus = $info['http_code'];

// $responseHeaderSize = $info['header_size'];
// $body = substr($result, $responseHeaderSize);

// // 200 だったら OK
// echo $httpStatus . ' ' . $body;