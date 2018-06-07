<?php

function satbot($bot, $event){
  $id=$event->getUserId();
  if (empty($id)) return;

  $satbotDb = DBselect($id);
  $step = $satbotDb['step'];
  
  if ($event instanceof \LINE\LINEBot\Event\PostbackEvent) {
     $pbdata=$event->getPostbackData();
     $type='pe';
  }else  
  if ($event instanceof \LINE\LINEBot\Event\MessageEvent) {
     $text=$event->getText();
     $type='me';
  }
  

  //start
  if (preg_match('/start/', $text)) {
    // replyMultiMessage($bot, $event->getReplyToken(),
    //   new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
    //     'はじめまして、SAT BOTです。よろしくお願いします！最初にあなたのストレス状態を測定しますね。'),
    //   new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
    //     "'まずここ'ボタンを押して、チャックテストを回答してください",
    //     //ButtonTemplateBuilderNoTextUrl_test：ButtonTemplateBuilderから修正したもの
    //     new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilderNoTextUrl_test (
    //       "'まずここ'ボタンを押して、チャックテストを回答してください", 
    //       array(
    //         new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
    //         'まずここ', "https://" . $_SERVER["HTTP_HOST"] .  "/public/checktest/checktest1.php"."?$id"),
    //         new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
    //         '回答終わったらここ', 'true')
    //       )
    //     )
    //   )
    // );
    $alternativeText = "チェックテスト";
    $fbtext = "チェックテストを受けますか";
    $actionArray = array
      (
        new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
          "Yes", 'yes')
        ,new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
          "No", "no")
      );
    replyMultiMessage($bot, $event->getReplyToken(),       
      new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        'はじめまして、SAT BOTです。よろしくお願いします！最初にあなたのストレス状態を測定しますか？'),
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
          $alternativeText,
          new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder ($fbtext, $actionArray)
        )
    );
    $step = 1;
    DBinsert($id, $step, $userinput);
    DBcreateUserlist($id);
  }

  //step0checktest
  elseif ((($type=='pe') && ($step==1) && ($pbdata =='yes')) || preg_match('/checktest/', $text)) {
    replyMultiMessage($bot, $event->getReplyToken(),
      new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        'ストレス状態を測定しますね。'),
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        "'まずここ'ボタンを押して、チャックテストを回答してください",
        //ButtonTemplateBuilderNoTextUrl_test：ButtonTemplateBuilderから修正したもの
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilderNoTextUrl_test (
          "'まずここ'ボタンを押して、チャックテストを回答してください", 
          array(
            new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
            'まずここ', "https://" . $_SERVER["HTTP_HOST"] .  "/public/checktest/checktest1.php"."?$id"),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            'ストレスを解消するならここ', 'true')
          )
        )
      )
    );
    $step = 1;
    DBinsert($id, $step);
  }

  //step1
  elseif (($type=='pe') && ($step==1) && ($pbdata=='no' || $pbdata=='true')) {
    replyMultiMessage($bot, $event->getReplyToken(),
      new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        'ではこれからストレスを解消しますね。あなた今ストレスに感じていることはなんですか？思い浮かべてください。'),
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder('悩んでいることを選んでください',
        //ButtonTemplateBuilderNoTextUrl_test：ButtonTemplateBuilderから修正したもの
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilderNoTextUrl_test (
          '悩んでいることを選んでください', 
          array(
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            '仕事やお金', 'A0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            '自分の人生や生活、健康', 'A1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            '家族やプライベート', 'A2'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            '対人関係に関する問題', 'A3')
          )
        )
      )
    );
    $step = 2;
    DBinsert($id, $step, $userinput);
  }

  //step2
  elseif (($type=='pe') && ($step==2) && preg_match('/A/', $pbdata)) {
    switch($pbdata){
      case 'A0':
        $fbmessage = '仕事やお金';
        break;
      case 'A1':
        $fbmessage = '自分の人生や生活、健康';
        break;
      case 'A2':
        $fbmessage = '家族やプライベート';
        break;
      case 'A3':
        $fbmessage = '対人関係に関する問題';
        break;
      default:
        break;
    }
    replyTextMessage($bot, $event->getReplyToken(), $fbmessage."のことですね。具体的はどんなことですか？下の入力欄にメッセージを入力して送ってきてね");
    $step = 3;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step3
  elseif (($type=='me') && ($step==3)||preg_match('/debug2/', $text)) {
    $alternativeText='ストレス度';
    $columnArray = array();
    for($i = 1; $i < 2; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '大いにそうである','B0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'まあそうである','B1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'そうではない','B2')
          ); 
          $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "ストレスの程度",
            $actionArray
          );     
          break;
        // case 2:
        //     array_push($actionArray, 
        //       new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
        //         'レベル３かなりストレス','B3'),
        //       new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
        //         'レベル４大変なストレス','B4'),
        //       new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
        //         'その他','null')
        //     ); 
        //     $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
        //     "ストレスの程度　　　　　　　　　page:2",
        //     $actionArray
        //   );     
        //     break;  
        default:
            break;
      }              
      array_push($columnArray, $column);
    }
    replyMultiMessage($bot, $event->getReplyToken(),
     new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        'そのストレスはどの程度ですか？以下から選んでね。'),
       new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
         $columnArray)
     )
    );
    $step = 4;
    $userinput = $text;
    DBinsert($id, $step, $userinput);
  }
  //step4
  elseif ((($type=='pe') && ($step==4) && preg_match('/B/', $pbdata)) || preg_match('/debug3/', $text)) {
    switch($pbdata){
      case 'B2':
        $fbmessage = 'よかったね。このままでいいよ、もし他の何があったら相談してね';
        replyTextMessage($bot, $event->getReplyToken(), $fbmessage); 
        $step = 20;
        $userinput = $pbdata;
        DBinsert($id, $step, $userinput);
        break;
      case 'B1':
        $fbmessage = 'そのストレスの場面の映像は具体的に思い浮かぶ？';
        replyConfirmTemplate($bot,$event->getReplyToken(), $fbmessage,
        $fbmessage,
        new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
          "Yes", 'yes')
        ,new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
          "No", "no")
        );   
        $step = 5;
        $userinput = $pbdata;
        DBinsert($id, $step, $userinput);
        break;
      case 'B0':
        $fbmessage = 'そのストレスの場面の映像は具体的に思い浮かぶ？';
        replyConfirmTemplate($bot,$event->getReplyToken(), $fbmessage,
        $fbmessage,
        new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
          "Yes", 'yes')
        ,new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
          "No", "no")
        );   
        $step = 5;
        $userinput = $pbdata;
        DBinsert($id, $step, $userinput);
        break;

      default:
        break;
    }
  }
  //step5yes身体違和感位置
  elseif ((($type=='pe') && ($step==5) && $pbdata=='yes') || preg_match('/debug4/', $text)) {
    $alternativeText='身体違和感';
    $columnArray = array();
    for($i = 1; $i < 5; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '頭','C0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '顔','C1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '喉','C2')       
          ); 
          $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "違和感を感じるところ　　　page:".$i,
            $actionArray
          );     
          break;

        case 2:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '首','C3'), 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '肩','C4'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '背中','C5')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "違和感を感じるところ　　　page:".$i,
            $actionArray
          );     
          break;  

        case 3:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '腰','C6'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '胸','C7'),  
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'お腹','C8')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "違和感を感じるところ　　　page:".$i,
            $actionArray
          );     
          break;

        case 4:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '腕手足','C9'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '全身','C10'),  
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'その他','C11')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "違和感を感じるところ　　　page:".$i,
            $actionArray
          );     
          break;

        default:
          break;
      }              
      array_push($columnArray, $column);
    }
    replyMultiMessage($bot, $event->getReplyToken(),
     new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        '目を閉じてストレスの場面を思い浮かべてみて、そうすると体のどこに違和感を感じる？'),
       new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
         $columnArray)
     )
    );
    $step = 6;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step5no色や形にたとえる
  elseif ((($type=='pe') && ($step==5) && $pbdata=='no') || preg_match('/debug4b/', $text)) {
    replyMultiMessage($bot, $event->getReplyToken(),
      new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        'ストレスの場面の映像は具体的に思い浮かばない場合は'),
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        "'まずここ'ボタンを押して、ストレスの原因を色や形にたとえる",
        //ButtonTemplateBuilderNoTextUrl_test：ButtonTemplateBuilderから修正したもの
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilderNoTextUrl_test (
          "'まずここ'ボタンを押して、ストレスの原因を色や形にたとえる", 
          array(
            new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
            'まずここ', "https://" . $_SERVER["HTTP_HOST"] .  "/public/cands/cands1.php"."?$id"),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            '回答終わったらここ', 'true')
          )
        )
      )
    );
    $step = 21;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step6身体違和感症状
  elseif ((($type=='pe') && ($step==6) && preg_match('/C/', $pbdata)) || preg_match('/debug5/', $text)) {
    $alternativeText='それはどんな違和感？';
    $columnArray = array();
    for($i = 1; $i < 4; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'どきどきする','D0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '重い','D1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '痛い','D2')       
          ); 
          $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "それはどんな違和感？　　　　　　　　　page:".$i,
            $actionArray
          );     
          break;

        case 2:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '痺れる','D3'), 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '冷える','D4'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'だるい','D5')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "それはどんな違和感？　　　　　　　　　page:".$i,
            $actionArray
          );     
          break;  

        case 3:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'ぎゅっとする','D6'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '張る','D7'),  
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'その他','D8')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "それはどんな違和感？　　　　　　　　　page:".$i,
            $actionArray
          );     
          break;

        default:
          break;
      }
      array_push($columnArray, $column);
    }
    replyMultiMessage($bot, $event->getReplyToken(),
       new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
         $columnArray)
     )
    );
    $step = 7;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step7ストレス度
  elseif ((($type=='pe') && ($step==7) && preg_match('/D/', $pbdata))||preg_match('/debug6/', $text)) {
    replyTextMessage($bot, $event->getReplyToken(), '今のストレス度は何％？0から100の中で、パッと思いついた数字を入力してくださいね');
    $step = 8;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step8光選択
  elseif (($type=='me') && ($step==8)||preg_match('/debug7/', $text)) {
    replyMultiMessage($bot, $event->getReplyToken(),
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        '光イメージ選択',
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder (
          '光イメージ選択', "選択できたら、'選んだらここ'ボタンを押してね",
          "https://" . $_SERVER["HTTP_HOST"] .  "/imgs/lightimg.jpg",
          array(
            new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
            'まずここ', "https://" . $_SERVER["HTTP_HOST"] .  "/public/light/light.html"."?$id"),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            '選んだらここ', 'true')
          )
        )
      ),      
      new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        "その違和感を感じる部分は、どの色の光に守られていると癒されそう？'まずここ'ボタンを押して、好きな色の光を「五つまで」選んでくださいね")
    );
    $step = 9;
    $userinput = $text;
    DBinsert($id, $step, $userinput);
  }
  //step9
  elseif (($type=='pe') && ($step==9)||preg_match('/debug8/', $text)) {
      $lightimgselect = DBlightimgselect($id);
      $light_1 = $lightimgselect['light_1'];
      $light_2 = $lightimgselect['light_2'];
      $light_3 = $lightimgselect['light_3'];
      $light_4 = $lightimgselect['light_4'];
      $light_5 = $lightimgselect['light_5'];

      $LightImageUrl_1 =
        "https://" . $_SERVER["HTTP_HOST"] . "/imgs/light/preview/light_". $light_1 .".jpg";
      $LightImageUrl_2 =
        "https://" . $_SERVER["HTTP_HOST"] . "/imgs/light/preview/light_". $light_2 .".jpg";
      $LightImageUrl_3 =
        "https://" . $_SERVER["HTTP_HOST"] . "/imgs/light/preview/light_". $light_3 .".jpg";
      $LightImageUrl_4 =
        "https://" . $_SERVER["HTTP_HOST"] . "/imgs/light/preview/light_". $light_4 .".jpg";
      $LightImageUrl_5 =
        "https://" . $_SERVER["HTTP_HOST"] . "/imgs/light/preview/light_". $light_5 .".jpg";

      $LightImageOriginalUrl_1 =
        "https://" . $_SERVER["HTTP_HOST"] . "/imgs/light/original/light_". $light_1 .".jpg";
      $LightImageOriginalUrl_2 =
        "https://" . $_SERVER["HTTP_HOST"] . "/imgs/light/original/light_". $light_2 .".jpg";
      $LightImageOriginalUrl_3 =
        "https://" . $_SERVER["HTTP_HOST"] . "/imgs/light/original/light_". $light_3 .".jpg";
      $LightImageOriginalUrl_4 =
        "https://" . $_SERVER["HTTP_HOST"] . "/imgs/light/original/light_". $light_4 .".jpg";
      $LightImageOriginalUrl_5 =
        "https://" . $_SERVER["HTTP_HOST"] . "/imgs/light/original/light_". $light_5 .".jpg";

      $alternativeText='選んだ人たちの中で一番気になる人は誰？';
      $columnArray = array();
      for($i = 1; $i < 6; $i++) {
        $actionArray = array();
        switch ($i) {
          case 1:
              $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
              $LightImageUrl_1,
              new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
                '拡大する', $LightImageOriginalUrl_1)
              );      
            break;

          case 2:
              $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
              $LightImageUrl_2,
              new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
                '拡大する', $LightImageOriginalUrl_2)
              );      
            break;  

          case 3:
              $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
              $LightImageUrl_3,
              new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
                '拡大する', $LightImageOriginalUrl_3)
              );     
            break;

          case 4:
              $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
              $LightImageUrl_4,
              new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
                '拡大する', $LightImageOriginalUrl_4)
              );     
            break;

          case 5:
              $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
              $LightImageUrl_5,
              new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
                '拡大する', $LightImageOriginalUrl_5)
              );     
            break;

          default:
            break;
        }              
        array_push($columnArray, $column);
      }

      replyMultiMessage($bot, $event->getReplyToken(),       
        new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
          $alternativeText,
            new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder (
          $columnArray)
        ),
          new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
            '違和感の部分が、選んだ色の光で包まれるイメージを思い浮かべてみて。できたら教えてね',
          //ButtonTemplateBuilderNoTextUrl_test：ButtonTemplateBuilderから修正したもの
            new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilderNoTextUrl_test (
              '違和感の部分が、選んだ色の光で包まれるイメージを思い浮かべてみて。できたら教えてね', 
                array(
                  new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
                  'できました。', 'yes')
                )
            )
          )
      );
    $step = 10;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step10顔選択
  elseif ((($type=='pe') && ($pbdata=='yes') && ($step==10))||preg_match('/debug9/', $text)) {
    $lightimgselect = DBlightimgselect($id);
    $light_1 = $lightimgselect['light_1'];
    $light_2 = $lightimgselect['light_2'];
    $light_3 = $lightimgselect['light_3'];
    $light_4 = $lightimgselect['light_4'];
    $light_5 = $lightimgselect['light_5'];
    replyMultiMessage($bot, $event->getReplyToken(),
      new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        "'まずここ'ボタンを押して、パッと目に入る・気になるのはどの顔？ 「五つまで」直感で選んで。"),
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        '顔画像選択',
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder (
          '顔画像選択', "選択できたら、'選んだらここ'ボタンを押してね",
          "https://" . $_SERVER["HTTP_HOST"] .  "/imgs/faceimg.png",
          array(
            new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
            'まずここ', "https://" . $_SERVER["HTTP_HOST"] .  "/public/face/face.php"."?$id"."?$light_1"."?$light_2"."?$light_3"."?$light_4"."?$light_5"),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            '選んだらここ', 'true')
          )
        )
      )
    );
    $step = 11;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step11ストレス度
  elseif ((($type=='pe') && ($step==11) && $pbdata = 'true')||preg_match('/debuga/', $text)) {
    $faceimgselect = DBfaceimgselect($id);
    $alternativeText = "ストレス％";
    $face_1 = $faceimgselect['face_1'];
    $face_2 = $faceimgselect['face_2'];
    $face_3 = $faceimgselect['face_3'];
    $face_4 = $faceimgselect['face_4'];
    $face_5 = $faceimgselect['face_5'];

    $FaceImageUrl_1="https://" . $_SERVER["HTTP_HOST"] .  "/imgs/face/face_". $face_1 .".jpg";
    $FaceImageUrl_2="https://" . $_SERVER["HTTP_HOST"] .  "/imgs/face/face_". $face_2 .".jpg";
    $FaceImageUrl_3="https://" . $_SERVER["HTTP_HOST"] .  "/imgs/face/face_". $face_3 .".jpg";
    $FaceImageUrl_4="https://" . $_SERVER["HTTP_HOST"] .  "/imgs/face/face_". $face_4 .".jpg";
    $FaceImageUrl_5="https://" . $_SERVER["HTTP_HOST"] .  "/imgs/face/face_". $face_5 .".jpg";
    $columnArray = array();
    for($i = 1; $i < 6; $i++) {
      switch ($i) {
        case 1:
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
            $FaceImageUrl_1,
            new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
              '拡大',$FaceImageUrl_1)
            );      
          break;

        case 2:
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
            $FaceImageUrl_2,
            new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
              '拡大',$FaceImageUrl_2)
            );      
          break;  

        case 3:
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
            $FaceImageUrl_3,
            new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
              '拡大',$FaceImageUrl_3)
            );     
          break;

        case 4:
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
            $FaceImageUrl_4,
            new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
              '拡大',$FaceImageUrl_4)
            );     
          break;

        case 5:
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
            $FaceImageUrl_5,
            new LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder (
              '拡大',$FaceImageUrl_5)
            );     
          break;

        default:
          break;
      }              
      array_push($columnArray, $column);
    }

    replyMultiMessage($bot, $event->getReplyToken(),
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder (
         $columnArray)
     ),
      new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        "その顔見ると、さっきのストレス何％になる？0から100の中で、パッと思いついた数字を入力してくださいね")
    );
    $step = 12;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step12どんな人になれそう
  elseif (($type=='me') && ($step==12) ||preg_match('/debuga/', $text)) {
    $alternativeText='今選んだのは、あなたを守る味方たち。この人たちを見ていると、どんな性格になれそう？';

    $columnArray1 = array();
    for($i = 1; $i < 4; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '楽しい','E0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '穏やかな','E1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '気にしない','E2')       
          ); 
          $column1 = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "この人たちを見ていると、どんな性格になれそう？　page:".$i,
            $actionArray
          );     
          break;

        case 2:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '明るい','E3'), 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'おおらかな','E4'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '自信がある','E5')
            ); 
            $column1 = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "この人たちを見ていると、どんな性格になれそう？　page:".$i,
            $actionArray
          );     
          break;  

        case 3:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '愉快な','E6'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '素直な','E7'),  
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'その他','E8')
            ); 
            $column1 = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "この人たちを見ていると、どんな性格になれそう？　page:".$i,
            $actionArray
          );     
          break;

        default:
          break;
      }              
      array_push($columnArray1, $column1);
    }


    replyMultiMessage($bot, $event->getReplyToken(),
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
         $columnArray1)
     )
    );
    $step = 13;
    $userinput = $text;
    DBinsert($id, $step, $userinput);
  }

  //step13
  elseif ((($type=='pe') && ($step==13) && preg_match('/E/', $pbdata))||preg_match('/debugb/', $text)) {
    replyTextMessage($bot, $event->getReplyToken(), 'こんな性格なら、ストレスの場面で、どんなふうに対応できそう？パッと直感で思いついたことでいいよ。下の入力欄にメッセージを入力して送ってきてね');
    $step = 14;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step14
  elseif (($type=='me') && ($step==14) ||preg_match('/debugb/', $text)) {
    $alternativeText='こんな性格なら、ストレスの場面で、その対応をすると、結果はどうなりそう？';
    $columnArray = array();
    for($i = 1; $i < 2; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'うまくいく','うまくいく'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'うまくいかない','うまくいかない')
          ); 
          $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "こんな性格なら、ストレスの場面で、その対応をすると、結果はどうなりそう？",
            $actionArray
          );     
          break;
        default:
            break;
      }              
      array_push($columnArray, $column);
    }
    replyMultiMessage($bot, $event->getReplyToken(),
       new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
         $columnArray)
     )
    );
    $step = 15;
    $userinput = $text;
    DBinsert($id, $step, $userinput);
  }
  //step15一番気に入りの顔
  elseif (($type=='pe') && ($step==15)||preg_match('/debugd/', $text)) {
    $faceimgselect = DBfaceimgselect($id);
    $face_1 = $faceimgselect['face_1'];
    $face_2 = $faceimgselect['face_2'];
    $face_3 = $faceimgselect['face_3'];
    $face_4 = $faceimgselect['face_4'];
    $face_5 = $faceimgselect['face_5'];

    $FaceImageUrl_1="https://" . $_SERVER["HTTP_HOST"] .  "/imgs/face/face_". $face_1 .".jpg";
    $FaceImageUrl_2="https://" . $_SERVER["HTTP_HOST"] .  "/imgs/face/face_". $face_2 .".jpg";
    $FaceImageUrl_3="https://" . $_SERVER["HTTP_HOST"] .  "/imgs/face/face_". $face_3 .".jpg";
    $FaceImageUrl_4="https://" . $_SERVER["HTTP_HOST"] .  "/imgs/face/face_". $face_4 .".jpg";
    $FaceImageUrl_5="https://" . $_SERVER["HTTP_HOST"] .  "/imgs/face/face_". $face_5 .".jpg";

    $alternativeText='選んだ人たちの中で一番気になる人は誰？';
    $columnArray = array();
    for($i = 1; $i < 6; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
            $FaceImageUrl_1,
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '確認','F1')
            );      
          break;

        case 2:
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
            $FaceImageUrl_2,
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '確認','F2')
            );      
          break;  

        case 3:
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
            $FaceImageUrl_3,
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '確認','F3')
            );     
          break;

        case 4:
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
            $FaceImageUrl_4,
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '確認','F4')
            );     
          break;

        case 5:
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder (
            $FaceImageUrl_5,
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '確認','F5')
            );     
          break;

        default:
          break;
      }              
      array_push($columnArray, $column);
    }

    replyMultiMessage($bot, $event->getReplyToken(),
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder (
         $columnArray)
      ),
      new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        $alternativeText
      )
    );
    $step = 16;
    $userinput = $text;
    DBinsert($id, $step, $userinput);
  }
  //step16
  elseif (($type=='pe') && ($step==16)||preg_match('/debuge/', $text)) {
    $alternativeText='この人は、あなたにどんなメッセージをくれそう？';
    $columnArray = array();
    for($i = 1; $i < 4; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '大丈夫だよ','G0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '心配いらないよ','G1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '一人じゃないよ','G2')       
          ); 
          $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "どんなメッセージをくれそう？ page:".$i,
            $actionArray
          );     
          break;

        case 2:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'このままでいいよ','G3'), 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'いつも見守っているよ','G4'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'いつも一緒にいるよ','G5')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "どんなメッセージをくれそう？ page:".$i,
            $actionArray
          );     
          break;  

        case 3:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '大好きだよ','G6'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'ただ見てくれている','G7'),  
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '(自分で入力)','textinput_s_16')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "どんなメッセージをくれそう？ page:".$i,
            $actionArray
          );     
          break;

        default:
          break;
      }              
      array_push($columnArray, $column);
    }
    replyMultiMessage($bot, $event->getReplyToken(),
       new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
         $columnArray)
     )
    );
    $step = 17;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step17
  elseif (($type=='pe') && ($step==17) && preg_match('/G/', $pbdata)||($type=='me' && ($step==17))||preg_match('/debugf/', $text)) {
    $alternativeText='もしこのメッセージを送ったら、どんな気持ちになる？上記の選択肢から選んでね';
    $columnArray = array();
    for($i = 1; $i < 4; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'ほっとする','H0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '安心できる','H1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '落ち着く','H2')       
          ); 
          $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "もしこのメッセージを送ったら、どんな気持ちになる？　　　page:".$i,
            $actionArray
          );     
          break;

        case 2:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '元気になる','H3'), 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '勇気づけられる','H4'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '愉快になる','H5')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "もしこのメッセージを送ったら、どんな気持ちになる？　　　page:".$i,
            $actionArray
          );     
          break;  

        case 3:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '癒される','H6'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '楽しくなる','H7'),  
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'あったかくなる','H8')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "もしこのメッセージを送ったら、どんな気持ちになる？　　　page:".$i,
            $actionArray
          );     
          break;

        default:
          break;
      }              
      array_push($columnArray, $column);
    }
    replyMultiMessage($bot, $event->getReplyToken(),
       new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
         $columnArray)
     )
    );
    $step = 18;
    $userinput = $text;
    DBinsert($id, $step, $userinput);
  }
  //step18
  elseif (($type=='pe') && ($step==18) && preg_match('/H/', $pbdata)||preg_match('/debugg/', $text)) {
    $alternativeText='では、この人たち全員の顔を見ていると最初に思い浮かべたストレス、どう感じるようになった？';
    $columnArray = array();
    for($i = 1; $i < 4; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '気にならなくなった','I0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '勇気づけられた','I1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '安心した','I2')       
          ); 
          $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "では、この人たち全員の顔を見ていると最初に思い浮かべたストレス、どう感じるようになった？ page:".$i,
            $actionArray
          );     
          break;

        case 2:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '暖かくなった','I3'), 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'そんなこともあった','I4'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '楽しくなった','I5')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "では、この人たち全員の顔を見ていると最初に思い浮かべたストレス、どう感じるようになった？ page:".$i,
            $actionArray
          );     
          break;  

        case 3:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'どうでもよくなった','I6'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '変わらない','I7'),  
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '(自分で入力)','textinput_s_18')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "では、この人たち全員の顔を見ていると最初に思い浮かべたストレス、どう感じるようになった？ page:".$i,
            $actionArray
          );     
          break;

        default:
          break;
      }              
      array_push($columnArray, $column);
    }
    replyMultiMessage($bot, $event->getReplyToken(),
       new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
         $columnArray)
     )
    );
    $step = 19;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step19
  elseif (($type=='pe') && ($step==19) && preg_match('/I/', $pbdata)||($type=='me' && ($step==19))||preg_match('/debugh/', $text)) {
    $alternativeText='ストレス度';
    $columnArray = array();
    for($i = 1; $i < 2; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '大いにそうである','J0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'まあそうである','J1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'そうではない','J2')
          ); 
          $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "ストレスの程度、どう変わった？",
            $actionArray
          );     
          break;
        // case 2:
        //     array_push($actionArray, 
        //       new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
        //         'レベル３かなりストレス','B3'),
        //       new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
        //         'レベル４大変なストレス','B4'),
        //       new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
        //         'その他','null')
        //     ); 
        //     $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
        //     "ストレスの程度　　　　　　　　　page:2",
        //     $actionArray
        //   );     
        //     break;  
        default:
            break;
      }              
      array_push($columnArray, $column);
    }
    replyMultiMessage($bot, $event->getReplyToken(),       
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
         $columnArray)
     )
    );
    $step = 20;
    $userinput = $text;
    DBinsert($id, $step, $userinput);
  }
  //step20
  elseif ((($type=='pe') && ($step==20) && preg_match('/J/', $pbdata))||preg_match('/debugi/', $text)) {
    replyTextMessage($bot, $event->getReplyToken(), 
      'お疲れ様でした！また今度！');
    $step = 21;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //step21
  elseif (($type=='pe') && ($step==21) || preg_match('/debugj/', $text)) {
    $alternativeText='身体違和感';
    $columnArray = array();
    for($i = 1; $i < 5; $i++) {
      $actionArray = array();
      switch ($i) {
        case 1:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '頭','C0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '顔','C1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '喉','C2')       
          ); 
          $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "違和感を感じるところ　　　page:".$i,
            $actionArray
          );     
          break;

        case 2:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '首','C3'), 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '肩','C4'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '背中','C5')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "違和感を感じるところ　　　page:".$i,
            $actionArray
          );     
          break;  

        case 3:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '腰','C6'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '胸','C7'),  
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'お腹','C8')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "違和感を感じるところ　　　page:".$i,
            $actionArray
          );     
          break;

        case 4:
          array_push($actionArray, 
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '腕手足','C9'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              '全身','C10'),  
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
              'その他','C11')
            ); 
            $column = new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilderNoImage_test (
            "違和感を感じるところ　　　page:".$i,
            $actionArray
          );     
          break;

        default:
          break;
      }              
      array_push($columnArray, $column);
    }
    replyMultiMessage($bot, $event->getReplyToken(),
     new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        '先のイメージを思い浮かべると、体のどこに違和感を感じる？'),
       new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder(
        $alternativeText,
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder (
         $columnArray)
     )
    );
    $step = 6;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //textinput_s_16
  elseif ($pbdata=='textinput_s_16' && ($step==17) ) {
    replyTextMessage($bot, $event->getReplyToken(), 'あなたにどんなメッセージをくれそう？テキストで入力してね');
    $step = 17;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //textinput_s_18
  elseif ($pbdata=='textinput_s_18' && ($step==19)) {
    replyTextMessage($bot, $event->getReplyToken(), 'この人たち全員の顔を見ていると最初に思い浮かべたストレス、どう感じるようになった？下の入力欄にメッセージを入力して送ってきてね');
    $step = 19;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }
  //stepx1
  elseif (($type=='pe') && ($step==1) && ($pbdata=='no' || $pbdata=='true')) {
    replyMultiMessage($bot, $event->getReplyToken(),
      new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(
        "Well, let's relieve stress now. What are you feeling stressed right now?"),
      new \LINE\LINEBot\MessageBuilder\TemplateMessageBuilder('悩んでいることを選んでください',
        //ButtonTemplateBuilderNoTextUrl_test：ButtonTemplateBuilderから修正したもの
        new \LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilderNoTextUrl_test (
          'Please choose what you are suffering from', 
          array(
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            'Work or money', 'A0'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            'Life or health', 'A1'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            'Family and private', 'A2'),
            new LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder (
            'Relationship issues', 'A3')
          )
        )
      )
    );
    $step = 99;
    DBinsert($id, $step, $userinput);
  }

  //stepx2
  elseif (($type=='pe') && ($step==99) && preg_match('/A/', $pbdata)) {
    switch($pbdata){
      case 'A0':
        $fbmessage = '仕事やお金';
        break;
      case 'A1':
        $fbmessage = '自分の人生や生活、健康';
        break;
      case 'A2':
        $fbmessage = '家族やプライベート';
        break;
      case 'A3':
        $fbmessage = '対人関係に関する問題';
        break;
      default:
        break;
    }
    replyTextMessage($bot, $event->getReplyToken(), $fbmessage."Could you tell me more about it? Please enter a message in the input field below and send it");
    $step = 100;
    $userinput = $pbdata;
    DBinsert($id, $step, $userinput);
  }

}

?>