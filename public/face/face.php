<!DOCTYPE html>
<html class="gr__stg_mindset-research_co_jp"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">		<title>StressRelief</title>
	
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/wv_style.css">

	<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/jquery.min.js"></script>
	<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/common.js"></script>

<script type="text/javascript">
//<![CDATA[
	jQuery(function($){
		// 顔画像選択処理
		function checkProcess(jqCheckBox) {
			jqCheckBox.prop('checked', ! jqCheckBox.is(':checked'));
			jqCheckBox.nextAll('img').toggleClass('myface-image-checked');
			// 決定ボタン有効/無効切替
			toggleBtnNext();
		}
		// 決定ボタン切替処理
		function toggleBtnNext() {
			$('#js-submit-button').prop('disabled', ($('.myface-image-checked').length == 0));
		};
		// ページング処理
		function processPaging(page) {
			// ページ数設定
			$('#js-page').text(page);
			// 表示制御
			controlPagingButton(page);
			// ページ切替
			changeFaceImagePage(page);
		}
		// 顔画像切替処理
		function changeFaceImagePage(page) {
			// すべての顔画像リストを非表示
			$('.stressrel-face-image-list').not(':hidden').addClass('is-hidden');
			// 対象の顔画像リストを表示
			$('.stressrel-face-image-list').filter('[data-group-id="' + page + '"]').removeClass('is-hidden');
		}
		// ページング用ボタン表示制御
		var MAX_PAGE = 2; // 最大ページ数
		function controlPagingButton(curPage) {
			if (MAX_PAGE == 1) {
				// ページングなし(両方非表示)
				$('#js-prev, #js-next').css('visibility', 'hidden');
			} else if (curPage == 1) {
				$('#js-prev').css('visibility', 'hidden');
				$('#js-next').css('visibility', 'visible');
			} else if (curPage == MAX_PAGE) {
				$('#js-prev').css('visibility', 'visible');
				$('#js-next').css('visibility', 'hidden');
			} else {
				$('#js-prev').css('visibility', 'visible');
				$('#js-next').css('visibility', 'visible');
			}
		}

		// 画面ロード初期化処理
		(function() {
			// ページ数設定
			$('#js-page').text('1');
			// ページ送り非表示
			controlPagingButton(1);
			// 顔画像の遅延表示
			$('.is-hide').delay(1000).fadeIn();
		}());

		// 画像選択時
		$('.myface-image').click(function() {
			checkProcess($(this).find(':checkbox'));
		});
		// ページング
		$('#js-prev').click(function() {
			// 前ページ数設定
			var prevPage = parseInt($('#js-page').text(), 10) - 1;
			// 処理
			processPaging(prevPage);
		});
		$('#js-next').click(function() {
			// 次ページ数設定
			var nextPage = parseInt($('#js-page').text(), 10) + 1;
			// 処理
			processPaging(nextPage);
		});
		// ボタン押下
		$('#js-submit-button').click(function()  {
			var selectValue = $(this).val();
			if (selectValue == 0) {
				if ($('.myface-image-checkbox:checked').length == 0) {
					// 顔未選択の場合、スライダー値を1に設定
					$(this).val(1);
					alert('顔が選択されていません。');
					return;
				}
				// 次へ進む
				$('#js-form').submit();
				return;
			}
		});
	});

	function init() {
     var para = decodeURIComponent(location.search.split("?")[1]);
     document.getElementsByName('uid')[0].value=para;
     //光画像の設定
     var light_para1 = decodeURIComponent(location.search.split("?")[2]);
	  var light_para2 = decodeURIComponent(location.search.split("?")[3]);
	  var light_para3 = decodeURIComponent(location.search.split("?")[4]);
	  var light_para4 = decodeURIComponent(location.search.split("?")[5]);
	  var light_para5 = decodeURIComponent(location.search.split("?")[6]);
	  if (light_para5){
	  	$('img[name="light_1"]').attr('src',"http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ light_para1 +".jpg");
	  	$('img[name="light_2"]').attr('src',"http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ light_para2 +".jpg");
	 	$('img[name="light_3"]').attr('src',"http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ light_para3 +".jpg");	 
	 	$('img[name="light_4"]').attr('src',"http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ light_para4 +".jpg");
	   $('img[name="light_5"]').attr('src',"http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ light_para5 +".jpg");
	  }
	  var re="";
		if (light_para5!=""){	
			for(var i=0;i<4;i++)
			{
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para1 +".jpg>"+'</div>';
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para2 +".jpg>"+'</div>';
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para3 +".jpg>"+'</div>';		
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para4 +".jpg>"+'</div>';
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para5 +".jpg>"+'</div>';		
			   }
		}
		else if ((light_para4!="")&&(light_para5==""))
		{	
			for(var i=0;i<4;i++)
			{
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para1 +".jpg>"+'</div>';
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para2 +".jpg>"+'</div>';
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para3 +".jpg>"+'</div>';		
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para4 +".jpg>"+'</div>';	
			   }
		}
		else if ((light_para3!="")&&(light_para4==""))
		{	
			for(var i=0;i<6;i++)
			{
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para1 +".jpg>"+'</div>';
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para2 +".jpg>"+'</div>';
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para3 +".jpg>"+'</div>';		
			   }
		}	
		else if ((light_para2!="")&&(light_para3==""))
		{	
			for(var i=0;i<8;i++)
			{
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para1 +".jpg>"+'</div>';
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para2 +".jpg>"+'</div>';
			   }
		}		
		else if ((light_para1!="")&&(light_para2==""))
		{	
			for(var i=0;i<16;i++)
			{
			    re+='<div class="column is-12 stressrel-pastel-image">'+
			      "<img src=http://satbot-v2.herokuapp.com/imgs/light/original/light_"+ 
			      light_para1 +".jpg>"+'</div>';
			   }
		}				

		document.getElementById('background').innerHTML=re;
   }


//]]>
</script></head>
<body data-gr-c-s-loaded="true" onLoad="init()">
<div class="container">
	<form action="http://satbot-v2.herokuapp.com/public/face/post_send/index.php" id="js-form" method="post" accept-charset="utf-8">
		<div style="display:none;">
			<input type="hidden" name="_method" value="POST">
			<input type="hidden" name="data[_Token][key]" value="">
			<input type="hidden" name="uid" value=""></div>
<div class="hero stressrel-hero">
	<div class="hero-body stressrel-hero-body">
		<p class="common-title">パッと目に入る・気になる…どの顔？ 直感で選んで。その顔見ると、さっきのストレス何%になる？</p>
		<div class="level is-mobile stressrel-hero-body-level mt-10">
			<div class="nav-center">
<!-- 				<div class="level-item stressrel-paging">
					<img src="http://stg.mindset-research.co.jp/img/msr_img/paging_left_arrow.png" id="js-prev" style="visibility: hidden;">
					<span class="stressrel-paging-text"><span id="js-page">1</span>/2</span>
					<img src="http://stg.mindset-research.co.jp/img/msr_img/paging_right_arrow.png" id="js-next" style="visibility: visible;">
				</div> -->
			</div>
		</div>
			</div>
</div>
<div class="stressrel-contents is-paddingless is-hide"  style="display: block;">
	<div class="stressrel-pastel-image-list">
	<div class="columns is-mobile is-multiline is-gapless" id="background">
<!-- 		<div class="column is-12 stressrel-pastel-image">
			<img name="light_1">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_2">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_3">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_4"">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_5"">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_1">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_2">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_3">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_4"">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_5"">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_1">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_2">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_3">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_4"">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_5"">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_1">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_2">
		</div>
		<div class="column is-12 stressrel-pastel-image">
			<img name="light_3">
		</div> -->
				</div>
</div>
		<div class="columns is-multiline is-mobile myface-image-list stressrel-face-image-list" data-group-id="1">
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="1" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_1.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="2" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_2.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="3" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_3.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="4" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_4.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="5" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_5.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="6" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_6.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="7" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_7.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="8" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_8.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="9" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_9.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="10" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_10.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="11" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_11.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="12" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_12.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="13" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_13.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="14" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_14.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="15" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_15.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="16" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_16.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="17" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_17.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="18" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_18.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="19" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_19.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="20" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_20.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="21" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_21.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="22" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_22.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="23" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_23.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="24" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_24.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="25" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_25.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="26" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_26.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="27" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_27.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="28" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_28.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="29" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_29.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="30" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_30.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="31" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_31.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="32" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_32.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="33" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_33.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="34" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_34.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="35" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_35.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="36" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_36.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="37" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_37.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="38" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_38.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="39" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_39.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="40" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_40.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="41" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_41.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="42" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_42.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="43" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_43.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="44" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_44.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="45" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_45.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="46" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_46.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="47" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_47.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="48" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_48.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="49" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_49.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="50" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_50.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="51" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_51.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="52" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_52.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="53" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_53.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="54" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_54.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="55" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_55.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="56" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_56.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="57" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_57.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="58" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_58.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="59" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_59.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="60" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_60.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="61" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_61.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="62" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_62.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="63" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_63.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="64" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_64.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="65" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_65.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="66" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_66.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="67" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_67.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="68" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_68.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="69" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_69.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="70" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_70.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="71" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_71.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="72" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_72.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="73" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_73.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="74" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_74.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="75" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_75.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="76" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_76.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="77" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_77.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="78" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_78.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="79" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_79.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="80" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_80.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="81" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_81.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="82" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_82.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="83" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_83.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="84" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_84.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="85" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_85.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="86" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_86.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="87" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_87.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="88" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_88.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="89" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_89.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="90" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_90.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="91" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_91.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="92" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_92.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="93" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_93.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="94" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_94.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="95" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_95.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="96" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_96.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="97" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_97.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="98" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_98.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="99" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_99.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="100" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_100.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="101" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_101.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="102" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_102.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="103" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_103.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="104" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_104.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="105" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_105.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="106" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_106.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="107" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_107.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="108" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_108.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="109" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_109.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="110" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_110.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="111" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_111.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="112" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_112.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="113" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_113.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="114" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_114.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="115" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_115.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="116" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_116.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="117" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_117.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="118" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_118.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="119" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_119.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="120" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_120.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="121" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_121.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="122" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_122.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="123" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_123.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="124" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_124.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="125" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_125.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="126" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_126.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="127" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_127.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="128" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_128.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="129" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_129.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="130" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_130.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="131" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_131.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="132" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_132.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="133" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_133.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="134" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_134.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="135" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_135.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="136" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_136.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="137" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_137.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="138" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_138.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="139" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_139.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="140" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_140.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="141" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_141.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="142" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_142.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="143" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_143.png" class="">
			</div>
		</div>
				<div class="column is-one-quarter-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="144" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_144.png" class="">
			</div>
		</div>
			</div>
		<div class="columns is-multiline is-mobile myface-image-list stressrel-face-image-list is-hidden" data-group-id="2">
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="145" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_145.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="146" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_146.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="147" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_147.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="148" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_148.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="149" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_149.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="150" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_150.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="151" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_151.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="152" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_152.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="153" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_153.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="154" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_154.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="155" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_155.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="156" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_156.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="157" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_157.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="158" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_158.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="159" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_159.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="160" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_160.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="161" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_161.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="162" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_162.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="163" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_163.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="164" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_164.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="165" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_165.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="166" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_166.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="167" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_167.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="168" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_168.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="169" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_169.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="170" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_170.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="171" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_171.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="172" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_172.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="173" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_173.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="174" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_174.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="175" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_175.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="176" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_176.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="177" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_177.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="178" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_178.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="179" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_179.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="180" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_180.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="181" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_181.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="182" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_182.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="183" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_183.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="184" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_184.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="185" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_185.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="186" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_186.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="187" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_187.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="188" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_188.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="189" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_189.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="190" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_190.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="191" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_191.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="192" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_192.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="193" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_193.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="194" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_194.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="195" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_195.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="196" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_196.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="197" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_197.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="198" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_198.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="199" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_199.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="200" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_200.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="201" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_201.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="202" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_202.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="203" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_203.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="204" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_204.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="205" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_205.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="206" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_206.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="207" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_207.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="208" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_208.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="209" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_209.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="210" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_210.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="211" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_211.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="212" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_212.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="213" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_213.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="214" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_214.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="215" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_215.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="216" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_216.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="217" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_217.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="218" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_218.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="219" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_219.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="220" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_220.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="221" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_221.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="222" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_222.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="223" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_223.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="224" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_224.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="225" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_225.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="226" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_226.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="227" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_227.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="228" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_228.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="229" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_229.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="230" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_230.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="231" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_231.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="232" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_232.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="233" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_233.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="234" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_234.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="235" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_235.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="236" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_236.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="237" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_237.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="238" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_238.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="239" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_239.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="240" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_240.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="241" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_241.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="242" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_242.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="243" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_243.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="244" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_244.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="245" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_245.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="246" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_246.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="247" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_247.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="248" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_248.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="249" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_249.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="250" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_250.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="251" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_251.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="252" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_252.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="253" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_253.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="254" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_254.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="255" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_255.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="256" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_256.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="257" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_257.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="258" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_258.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="259" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_259.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="260" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_260.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="261" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_261.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="262" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_262.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="263" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_263.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="264" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_264.png" class="">
			</div>
		</div>
				<div class="column is-one-third-mobile is-one-quarter-tablet">
			<div class="myface-image">
				<input type="checkbox" name="data[select_face_id][]" value="265" class="checkbox myface-image-checkbox"><label for="select_face_id"></label>				<img src="http://stg.mindset-research.co.jp/img/face/face_265.png" class="">
			</div>
		</div>
			</div>
	</div>
<footer class="stressrel-footer">
	<div class="columns is-mobile is-gapless">
		<div class="column"><button type="submit" id="js-submit-button" class="button is-square-next is-fullwidth is-display-block button-icon-arrow-right" disabled="disabled">決定</button></div>
	</div>
</footer>
<div style="display:none;">
			<input type="hidden" name="data[_Token][fields]" value="">
			<input type="hidden" name="data[_Token][unlocked]" value="">
		</div>
	</form>	
</div>

</body></html>