jQuery(function($) {
	/** 繝｢繝ｼ繝繝ｫ ========================================================*/
	// 繝｢繝ｼ繝繝ｫ陦ｨ遉ｺ
	$('.modal-button, .modal-img').on('click', function() {
		var target = $(this).data('target');
		$(target).addClass('is-active');
		// 繧ｻ繝ｪ繝戊ｨｭ螳�
		if ($(target).find('.caption').length > 0) {
			var randomCaptionValue = '7';
			if ($('.caption-list').find('.radio:checked').length > 0) {
				var captionText = '';
				// 閾ｪ蛻��蜉帛愛螳�
				if ($('#JsCaptionListLast').is(':checked')) {
					if ($('#js-caption-input').val() == '') {
						// 譛ｪ蜈･蜉帙�蝣ｴ蜷医�撼陦ｨ遉ｺ
						$(target).find('.caption').hide();
						return;
					}
					captionText = $('#js-caption-input').val();
				} else {
					var checkedValue = $('.caption-list').find('.radio:checked').val();
					if (checkedValue == randomCaptionValue) {
						// 繝ｩ繝ｳ繝繝�縺ｮ蝣ｴ蜷�
						captionText = $('.caption-list').find('.radio').eq(getRandomInt(0, 6)).next('label').text();
					} else {
						captionText = $('.caption-list').find('.radio:checked + label').text();
					}
				}
				$(target).find('.caption-text').text(captionText);
				$(target).find('.caption').show();
			} else {
				$(target).find('.caption').hide();
			}
		}
	});
	// 繝｢繝ｼ繝繝ｫ髢峨§繧�
	$('.modal .delete').on('click', function() {
		$(this).closest('.modal').removeClass('is-active');
	});
	$('.modal-background, .modal-close, .modal-content').on('click', function() {
		$(this).closest('.modal').removeClass('is-active');
	});
	/** 繧｢繧ｳ繝ｼ繝�ぅ繧ｪ繝ｳ髢矩哩 ==============================================*/
	$('.accordion-toggle').click(function(){
		$(this).toggleClass('accordion-toggle-open')
				.next('.accordion-list,.accordion-column').slideToggle();
	});
	/** 謌ｻ繧九�繧ｿ繝ｳ辟｡蜉ｹ蛹� ================================================*/
	var isHistoryPush = false;
	if (history && history.pushState && history.state !== undefined) {
		history.pushState(null, null, null);
		isHistoryPush = true;
		$(window).on('popstate', function(e) {
			if (isHistoryPush) {
				history.pushState(null, null, null);
			}
		});
	}
	/** 繝峨Ο繝��繝繧ｦ繝ｳ髢矩哩 ================================================*/
	$('.dropdown').click(function() {
		$(this).toggleClass('is-active');
	});
	// 繝峨Ο繝��繝繧ｦ繝ｳ縺ｮ鬆�岼驕ｸ謚樊凾
	$('.dropdown-item').click(function() {
		// 繝峨Ο繝��繝繧ｦ繝ｳ繧帝哩縺倥ｋ
		$(this).closest('.dropdown').toggleClass('is-active');
	});
	/** 縺昴�莉� ================================================*/
	/*
	 * 繝ｩ繝ｳ繝繝�蛟､繧貞叙蠕�
	 */
	function getRandomInt(min, max) {
		return Math.floor( Math.random() * (max - min + 1) ) + min;
	}
});