<!DOCTYPE html>
<!-- saved from url=(0054)http://stg.mindset-research.co.jp/StressRelief/sr53_04 -->
<html class="gr__stg_mindset-research_co_jp"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">		<title>SAT BOT |</title>
	
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/bulma.min.css">
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="https://satbot-v2.herokuapp.com/public/css/wv_style.css">

	<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/jquery.min.js"></script>
	<script type="text/javascript" src="https://satbot-v2.herokuapp.com/public/js/common.js"></script>
<script type="text/javascript">
//<![CDATA[
	jQuery(function($){
		// 初期化
		(function () {
			var color = '';
			if (color != '') {
				checkRadio($('input:radio[value="' + color + '"]').closest('div'));
			}
		})();

		// ラジオボタンチェック時処理
		function checkRadio(jqParentRadio) {
			// ラジオボタンチェック
			jqParentRadio.find('input').prop('checked', true);
			// 枠クラスを削除
			$('.stressrel-color-list-item-checked').removeClass('stressrel-color-list-item-checked');
			// 自身に枠設定
			jqParentRadio.addClass('stressrel-color-list-item-checked');
		}

		// 色選択時処理
		$('.stressrel-color-list-item').click(function() {
			checkRadio($(this));
		});

		// 決定ボタン押下時処理
		$('.stressrel-footer button').click(function() {
			if ($('.stressrel-color-list-item input:checked').length == 0) {
				alert('色が選択されていません。');
				return false;
			}
			$('#js-form').submit();
			return false;
		});
	});
		function init() {
	     var para = decodeURIComponent(location.search.split("?")[1]);
	     document.getElementsByName('lid')[0].value=para;
	   }
//]]>
</script></head>
<body data-gr-c-s-loaded="true" onLoad="init()">
	<div class="container">
		<form action="https://satbot-v2.herokuapp.com/public/cands/cands2.php" id="js-form" method="post" accept-charset="utf-8">
			<div style="display:none;">
			<input type="hidden" name="_method" value="POST">
			<input type="hidden" name="data[_Token][key]" value="">
			<input type="hidden" name="lid" value=""></div>
<div class="hero stressrel-hero">
	<div class="hero-body stressrel-hero-body">
		<p class="common-title">そのストレスは色に例えると？</p>
		<p class="common-title">(イメージに近い色を選んでね)</p>
			</div>
</div>
<div class="stressrel-contents">
	<div class="columns is-mobile is-multiline stressrel-color-list">
					<div class="column stressrel-color-list-item" style="background-color:#300000">
			<input type="radio" name="data[color_code]" id="color_code300000" value="#300000" class="is-hide"><label for="color_code300000"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#4f0000">
			<input type="radio" name="data[color_code]" id="color_code4f0000" value="#4f0000" class="is-hide"><label for="color_code4f0000"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#770000">
			<input type="radio" name="data[color_code]" id="color_code770000" value="#770000" class="is-hide"><label for="color_code770000"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#a00000">
			<input type="radio" name="data[color_code]" id="color_codeA00000" value="#a00000" class="is-hide"><label for="color_codeA00000"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#cc0000">
			<input type="radio" name="data[color_code]" id="color_codeCc0000" value="#cc0000" class="is-hide"><label for="color_codeCc0000"></label>		</div>
							<div class="column stressrel-color-list-item" style="background-color:#210f07">
			<input type="radio" name="data[color_code]" id="color_code210f07" value="#210f07" class="is-hide"><label for="color_code210f07"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#381c0c">
			<input type="radio" name="data[color_code]" id="color_code381c0c" value="#381c0c" class="is-hide"><label for="color_code381c0c"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#603314">
			<input type="radio" name="data[color_code]" id="color_code603314" value="#603314" class="is-hide"><label for="color_code603314"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#7c441a">
			<input type="radio" name="data[color_code]" id="color_code7c441a" value="#7c441a" class="is-hide"><label for="color_code7c441a"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#914e20">
			<input type="radio" name="data[color_code]" id="color_code914e20" value="#914e20" class="is-hide"><label for="color_code914e20"></label>		</div>
							<div class="column stressrel-color-list-item" style="background-color:#000000">
			<input type="radio" name="data[color_code]" id="color_code000000" value="#000000" class="is-hide"><label for="color_code000000"></label>		</div>
				<div class="column stressrel-color-list-item stressrel-color-list-item-checked" style="background-color:#111111">
			<input type="radio" name="data[color_code]" id="color_code111111" value="#111111" class="is-hide"><label for="color_code111111"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#212121">
			<input type="radio" name="data[color_code]" id="color_code212121" value="#212121" class="is-hide"><label for="color_code212121"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#383838">
			<input type="radio" name="data[color_code]" id="color_code383838" value="#383838" class="is-hide"><label for="color_code383838"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#444444">
			<input type="radio" name="data[color_code]" id="color_code444444" value="#444444" class="is-hide"><label for="color_code444444"></label>		</div>
							<div class="column stressrel-color-list-item" style="background-color:#474747">
			<input type="radio" name="data[color_code]" id="color_code474747" value="#474747" class="is-hide"><label for="color_code474747"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#4f4f4f">
			<input type="radio" name="data[color_code]" id="color_code4f4f4f" value="#4f4f4f" class="is-hide"><label for="color_code4f4f4f"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#606060">
			<input type="radio" name="data[color_code]" id="color_code606060" value="#606060" class="is-hide"><label for="color_code606060"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#7f7f7f">
			<input type="radio" name="data[color_code]" id="color_code7f7f7f" value="#7f7f7f" class="is-hide"><label for="color_code7f7f7f"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#939393">
			<input type="radio" name="data[color_code]" id="color_code939393" value="#939393" class="is-hide"><label for="color_code939393"></label>		</div>
							<div class="column stressrel-color-list-item" style="background-color:#150935">
			<input type="radio" name="data[color_code]" id="color_code150935" value="#150935" class="is-hide"><label for="color_code150935"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#200b47">
			<input type="radio" name="data[color_code]" id="color_code200b47" value="#200b47" class="is-hide"><label for="color_code200b47"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#2c0e5b">
			<input type="radio" name="data[color_code]" id="color_code2c0e5b" value="#2c0e5b" class="is-hide"><label for="color_code2c0e5b"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#41118c">
			<input type="radio" name="data[color_code]" id="color_code41118c" value="#41118c" class="is-hide"><label for="color_code41118c"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#5017aa">
			<input type="radio" name="data[color_code]" id="color_code5017aa" value="#5017aa" class="is-hide"><label for="color_code5017aa"></label>		</div>
							<div class="column stressrel-color-list-item" style="background-color:#0c0c35">
			<input type="radio" name="data[color_code]" id="color_code0c0c35" value="#0c0c35" class="is-hide"><label for="color_code0c0c35"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#0e0e42">
			<input type="radio" name="data[color_code]" id="color_code0e0e42" value="#0e0e42" class="is-hide"><label for="color_code0e0e42"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#1b1464">
			<input type="radio" name="data[color_code]" id="color_code1b1464" value="#1b1464" class="is-hide"><label for="color_code1b1464"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#1f1c8e">
			<input type="radio" name="data[color_code]" id="color_code1f1c8e" value="#1f1c8e" class="is-hide"><label for="color_code1f1c8e"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#2424b2">
			<input type="radio" name="data[color_code]" id="color_code2424b2" value="#2424b2" class="is-hide"><label for="color_code2424b2"></label>		</div>
							<div class="column stressrel-color-list-item" style="background-color:#4f6666">
			<input type="radio" name="data[color_code]" id="color_code4f6666" value="#4f6666" class="is-hide"><label for="color_code4f6666"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#5e7b7c">
			<input type="radio" name="data[color_code]" id="color_code5e7b7c" value="#5e7b7c" class="is-hide"><label for="color_code5e7b7c"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#6b8b8e">
			<input type="radio" name="data[color_code]" id="color_code6b8b8e" value="#6b8b8e" class="is-hide"><label for="color_code6b8b8e"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#7da2a8">
			<input type="radio" name="data[color_code]" id="color_code7da2a8" value="#7da2a8" class="is-hide"><label for="color_code7da2a8"></label>		</div>
				<div class="column stressrel-color-list-item" style="background-color:#88b1ba">
			<input type="radio" name="data[color_code]" id="color_code88b1ba" value="#88b1ba" class="is-hide"><label for="color_code88b1ba"></label>		</div>
				</div>
</div>
<footer class="stressrel-footer">
	<div class="columns is-mobile is-gapless">
		<div class="column"><button type="submit" class="button is-square-next is-fullwidth is-display-block button-icon-arrow-right">決定</button></div>
	</div>
</footer>
<div style="display:none;"><input type="hidden" name="data[_Token][fields]" value="538dfbf5ee3f663f008245f4f1b24c1f1927726d%3A" id="TokenFields474830368"><input type="hidden" name="data[_Token][unlocked]" value="" id="TokenUnlocked1131689118"></div></form>	</div>


</body></html>