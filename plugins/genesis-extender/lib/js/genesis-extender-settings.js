eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(2($){$.c.f=2(p){p=$.d({g:"!@#$%^&*()+=[]\\\\\\\';,/{}|\\":<>?~`.- ",4:"",9:""},p);7 3.b(2(){5(p.G)p.4+="Q";5(p.w)p.4+="n";s=p.9.z(\'\');x(i=0;i<s.y;i++)5(p.g.h(s[i])!=-1)s[i]="\\\\"+s[i];p.9=s.O(\'|\');6 l=N M(p.9,\'E\');6 a=p.g+p.4;a=a.H(l,\'\');$(3).J(2(e){5(!e.r)k=o.q(e.K);L k=o.q(e.r);5(a.h(k)!=-1)e.j();5(e.u&&k==\'v\')e.j()});$(3).B(\'D\',2(){7 F})})};$.c.I=2(p){6 8="n";8+=8.P();p=$.d({4:8},p);7 3.b(2(){$(3).f(p)})};$.c.t=2(p){6 m="A";p=$.d({4:m},p);7 3.b(2(){$(3).f(p)})}})(C);',53,53,'||function|this|nchars|if|var|return|az|allow|ch|each|fn|extend||alphanumeric|ichars|indexOf||preventDefault||reg|nm|abcdefghijklmnopqrstuvwxyz|String||fromCharCode|charCode||alpha|ctrlKey||allcaps|for|length|split|1234567890|bind|jQuery|contextmenu|gi|false|nocaps|replace|numeric|keypress|which|else|RegExp|new|join|toUpperCase|ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('|'),0,{}));

function insertAtCaret(obj, text) {
	if(document.selection) {
		obj.focus();
		var orig = obj.value.replace(/\r\n/g, '\n');
		var range = document.selection.createRange();

		if(range.parentElement() != obj) {
			return false;
		}

		range.text = text;
		
		var actual = tmp = obj.value.replace(/\r\n/g, '\n');

		for(var diff = 0; diff < orig.length; diff++) {
			if(orig.charAt(diff) != actual.charAt(diff)) break;
		}

		for(var index = 0, start = 0; 
			tmp.match(text) 
				&& (tmp = tmp.replace(text, '')) 
				&& index <= diff; 
			index = start + text.length
		) {
			start = actual.indexOf(text, index);
		}
	} else if(obj.selectionStart) {
		var start = obj.selectionStart;
		var end   = obj.selectionEnd;

		obj.value = obj.value.substr(0, start) 
			+ text 
			+ obj.value.substr(end, obj.value.length);
	}
	
	if(start != null) {
		setCaretTo(obj, start + text.length);
	} else {
		obj.value += text;
	}
}

jQuery(document).ready(function($) {

	// Variables
	var genesis_extender_options_nav_all = $('.genesis-extender-options-nav-all');
	var genesis_extender_all_options = $('.genesis-extender-all-options');
	
	genesis_extender_options_nav_all.click(function() {
		var nav_id = $(this).attr('id');
		genesis_extender_all_options.hide();
		$('#'+nav_id+'-box').show();
		genesis_extender_options_nav_all.removeClass('genesis-extender-options-nav-active');
		$('#'+nav_id).addClass('genesis-extender-options-nav-active');
	});
	
	function show_message(response) {
		$('#ajax-save-throbber').hide();
		$('#ajax-save-no-throb').show();
		$('#genesis-extender-settings-saved').html(response).css('position', 'fixed').fadeIn('slow');
		window.setTimeout(function(){
			$('#genesis-extender-settings-saved').fadeOut('slow'); 
		}, 2222);
	}
	
	$('.genesis-extender-save-button').mousedown(function() {
		$('#ajax-save-no-throb').hide();
		$('#ajax-save-throbber').show();
	});
	
	$('form#plugin-settings-form').submit(function() {	
		var genesis_extender_data = $(this).serialize();
		jQuery.post(ajaxurl, genesis_extender_data, function(response) {
			if(response) {
				show_message(response);
			}
		});
		return false;
	});

	$('.forbid-chars').on('keydown', function() {
		if (!$(this).data('init')) {
			$(this).data('init', true);
			$(this).alphanumeric({allow:'_',nocaps:false});
			$(this).trigger('keydown');
		}
	});
	
	$('#genesis-extender-remove-all-page-titles').change(function() {
		var remove_all_page_titles = $('#genesis-extender-remove-all-page-titles:checked').val();
		if( remove_all_page_titles ) {
			$('#genesis-extender-remove-all-page-titles-box').animate({'height': 'hide'}, { duration: 300 });
		} else {
			$('#genesis-extender-remove-all-page-titles-box').animate({'height': 'show'}, { duration: 300 });
		}
	});
	$('#genesis-extender-remove-all-page-titles').change();

	$('#content-page-ids').click(function() {
		$('#content-page-ids-box').animate({'height': 'toggle'}, { duration: 300 });
	});

	$('#genesis-extender-include-inpost-cpt-all').change(function() {
		var include_inpost_cpt_all = $('#genesis-extender-include-inpost-cpt-all:checked').val();
		if( include_inpost_cpt_all ) {
			$('#genesis-extender-include-inpost-cpt-all-box').animate({'height': 'hide'}, { duration: 300 });
		} else {
			$('#genesis-extender-include-inpost-cpt-all-box').animate({'height': 'show'}, { duration: 300 });
		}
	});
	$('#genesis-extender-include-inpost-cpt-all').change();

	$('#custom-post-type-names').click(function() {
		$('#custom-post-type-names-box').animate({'height': 'toggle'}, { duration: 300 });
	});

	$('#genesis-extender-static-homepage').change(function() {
		var static_homepage = $('#genesis-extender-static-homepage:checked').val();
		if( static_homepage ) {
			$('.genesis-extender-static-homepage-box').animate({'height': 'show'}, { duration: 300 });
			$('.genesis-extender-static-homepage-type').change();
		} else {
			$('.genesis-extender-static-homepage-box').animate({'height': 'hide'}, { duration: 300 });
			$('#genesis-extender-static-homepage-content-box').hide();
		}
	});
	$('#genesis-extender-static-homepage').change();

	$('.genesis-extender-static-homepage-type').change(function() {
		var static_homepage_content = $('#genesis-extender-static-homepage-content:checked').val();
		if( static_homepage_content ) {
			$('#genesis-extender-static-homepage-content-box').animate({'height': 'show'}, { duration: 300 });
		} else {
			$('#genesis-extender-static-homepage-content-box').animate({'height': 'hide'}, { duration: 300 });
		}
	});
	$('.genesis-extender-static-homepage-type').change();

	$.fn.insertAtCaret = function (tagName) {
		return this.each(function(){
			if (document.selection) {
				//IE support
				this.focus();
				sel = document.selection.createRange();
				sel.text = tagName;
				this.focus();
			} else if (this.selectionStart || this.selectionStart == '0') {
				//MOZILLA/NETSCAPE support
				startPos = this.selectionStart;
				endPos = this.selectionEnd;
				scrollTop = this.scrollTop;
				this.value = this.value.substring(0, startPos) + tagName + this.value.substring(endPos,this.value.length);
				this.focus();
				this.selectionStart = startPos + tagName.length;
				this.selectionEnd = startPos + tagName.length;
				this.scrollTop = scrollTop;
			} else {
				this.value += tagName;
				this.focus();
			}
		});
	};

	function google_font_shortcode_creator() {
		var button_id = $(this).attr('id');
		var font_style = button_id.substring(button_id.indexOf('te-') +3);
		var link_code = $('#google-font-shortcode-creator').val();
		var font_name_pre = link_code.substring(link_code.indexOf('family=') +7);
		if( font_name_pre.indexOf(':') === -1 && font_name_pre.indexOf('&') === -1 ) {
			var font_name = font_name_pre.substr(0, font_name_pre.indexOf('\''));
			var font_code = font_name;
		} else if( font_name_pre.indexOf(':') === -1 && font_name_pre.indexOf('&') != -1 ) {
			var font_name = font_name_pre.substr(0, font_name_pre.indexOf('&'));
			var font_code = font_name_pre.substr(0, font_name_pre.indexOf('\''));
		} else {
			var font_name = font_name_pre.substr(0, font_name_pre.indexOf(':'));
			var font_code = font_name_pre.substr(0, font_name_pre.indexOf('\''));
		}
		var font_family = '\''+font_name.replace(/\+/g, ' ')+'\', '+font_style;
		var font_shortcode = '['+font_name.replace(/\+/g, ' ')+'|'+font_code+'|'+font_family+']\n';
		$('#genesis-extender-add-google-fonts').insertAtCaret(font_shortcode);
		$('#google-font-shortcode-creator').val('');
		$('#google-font-shortcode-creator').blur();
	}
	$('.google-fonts-create').bind('click', google_font_shortcode_creator);

	$('#genesis-extender-html-five-active').change(function() {
		var html_file_active = $('#genesis-extender-html-five-active:checked').val();
		if( html_file_active || $('#genesis-extender-fancy-dropdowns-active-box').hasClass('html-five-child-theme') ) {
			$('#genesis-extender-fancy-dropdowns-active-box').animate({'height': 'show'}, { duration: 300 });
		} else {
			$('#genesis-extender-fancy-dropdowns-active-box').animate({'height': 'hide'}, { duration: 300 });
		}
	});
	$('#genesis-extender-html-five-active').change();
	
	$('.genesis-extender-custom-fonts-button').click(function() {
		var $this = $(this), font_css_id = $this.attr('id');
		$('#'+font_css_id+'-box').animate({'height': 'toggle'}, { duration: 300 });
		hilight_custom();
	});

});