!function($){$(function(){function o(o){var e="";return e+='<div class="soliloquy-video-slide-holder"><p class="no-margin-top"><a href="#" class="button button-secondary soliloquy-delete-video-slide" title="'+soliloquy_metabox.removeslide+'">'+soliloquy_metabox.removeslide+'</a><label for="soliloquy-video-slide-'+o+'-title"><strong>'+soliloquy_metabox.videoslide+'</strong></label><br /><input type="text" class="soliloquy-video-slide-title" id="soliloquy-video-slide-'+o+'-title" value="" placeholder="'+soliloquy_metabox.videoplace+'" /></p><p><label for="soliloquy-video-slide-'+o+'"><strong>'+soliloquy_metabox.videotitle+'</strong></label><br /><input type="text" class="soliloquy-video-slide-url" id="soliloquy-video-slide-'+o+'" value="" placeholder="'+soliloquy_metabox.videooutput+'" /></p><p><label for="soliloquy-video-slide-'+o+'-thumbnail"><strong>'+soliloquy_metabox.videothumb+'</strong></label><br /><input type="text" class="soliloquy-video-slide-thumbnail soliloquy-src" id="soliloquy-video-slide-'+o+'-thumbnail" value="" placeholder="'+soliloquy_metabox.videosrc+'" /> <span><a href="#" class="soliloquy-thumbnail button button-primary" data-field="soliloquy-src">'+soliloquy_metabox.videoselect+'</a> <a href="#" class="soliloquy-thumbnail-delete button button-secondary" data-field="soliloquy-src">'+soliloquy_metabox.videodelete+'</a></span></p><p class="no-margin-bottom"><label for="soliloquy-video-slide-'+o+'-caption"><strong>'+soliloquy_metabox.videocaption+'</strong></label><br /><textarea class="soliloquy-video-slide-caption" id="soliloquy-video-slide-'+o+'-caption"></textarea></p></div>'}function e(o){var e="";return e+='<div class="soliloquy-html-slide-holder"><p class="no-margin-top"><a href="#" class="button button-secondary soliloquy-delete-html-slide" title="'+soliloquy_metabox.removeslide+'">'+soliloquy_metabox.removeslide+'</a><label for="soliloquy-html-slide-'+o+'-title"><strong>'+soliloquy_metabox.htmlslide+'</strong></label><br /><input type="text" class="soliloquy-html-slide-title" id="soliloquy-html-slide-'+o+'-title" value="" placeholder="'+soliloquy_metabox.htmlplace+'" /></p><p class="no-margin-bottom"><label for="soliloquy-html-slide-'+o+'"><strong>'+soliloquy_metabox.htmlcode+'</strong></label><br /><textarea class="soliloquy-html-slide-code" id="soliloquy-html-slide-'+o+'">'+soliloquy_metabox.htmlstart+"</textarea></div>"}function l(){var o={action:"soliloquy_refresh",post_id:soliloquy_metabox.id,nonce:soliloquy_metabox.refresh_nonce};$(".soliloquy-media-library").after('<span class="spinner soliloquy-spinner soliloquy-spinner-refresh"></span>'),$(".soliloquy-spinner-refresh").css({display:"inline-block","margin-top":"-3px"}),$.post(soliloquy_metabox.ajax,o,function(o){o&&o.success&&($("#soliloquy-output").html(o.success),$("#soliloquy-output").find(".wp-editor-wrap").each(function(o,e){var l=$(e).find(".quicktags-toolbar");if(!(l.length>0)){var t=$(e).attr("id").split("-"),i=t.slice(3,-1).join("-");quicktags({id:"soliloquy-caption-"+i,buttons:"strong,em,link,ul,ol,li,close"}),QTags._buttonsInit()}}),$(".soliloquy-html").find(".soliloquy-html-code").each(function(o,e){var l=$(e).attr("id");p[l]=CodeMirror.fromTextArea(e,{enterMode:"keep",indentUnit:4,electricChars:!1,lineNumbers:!0,lineWrapping:!0,matchBrackets:!0,mode:"php",smartIndent:!1,tabMode:"shift",theme:"solarized dark"}),p[l].on("blur",function(o){$("#"+l).text(o.getValue())}),p[l].refresh()}),$("#soliloquy-output").trigger({type:"soliloquyRefreshed",html:o.success,id:soliloquy_metabox.id})),$(".soliloquy-spinner-refresh").fadeOut(300,function(){$(this).remove()})},"json")}function t(){var o=$("#soliloquy-config-mobile");o.is(":checked")&&$("#soliloquy-config-mobile-size-box").fadeIn(300),o.on("change",function(){$(this).is(":checked")?$("#soliloquy-config-mobile-size-box").fadeIn(300):$("#soliloquy-config-mobile-size-box").fadeOut(300)})}function i(){$("#soliloquy .drag-drop-inside").append('<div class="soliloquy-progress-bar"><div></div></div>'),c=new plupload.Uploader(soliloquy_metabox.plupload);var o=$("#soliloquy .soliloquy-progress-bar"),e=$("#soliloquy .soliloquy-progress-bar div"),t=$("#soliloquy-output");c&&($("#soliloquy .max-upload-size").append(' <a class="soliloquy-media-library button button-primary" href="#" title="'+soliloquy_metabox.slider+'" style="vertical-align: baseline;">'+soliloquy_metabox.slider+"</a>"),c.bind("Init",function(o){var e=$("#soliloquy-plupload-upload-ui");o.features.dragdrop&&!$(document.body).hasClass("mobile")?(e.addClass("drag-drop"),$("#soliloquy-drag-drop-area").bind("dragover.wp-uploader",function(){e.addClass("drag-over")}).bind("dragleave.wp-uploader, drop.wp-uploader",function(){e.removeClass("drag-over")})):(e.removeClass("drag-drop"),$("#soliloquy-drag-drop-area").unbind(".wp-uploader")),"html4"==o.runtime&&$(".upload-flash-bypass").hide()}),c.init(),c.bind("FilesAdded",function(e,l){var t=104857600,i=parseInt(e.settings.max_file_size,10);$("#soliloquy-upload-error").html(""),$(o).show().css("display","block"),plupload.each(l,function(o){i>t&&o.size>t&&"html5"!=e.runtime&&a(e,o,!0)}),e.refresh(),e.start()}),c.bind("UploadProgress",function(o,l){$(e).css("width",o.total.percent+"%")}),c.bind("FileUploaded",function(o,e,t){$.post(soliloquy_metabox.ajax,{action:"soliloquy_load_image",nonce:soliloquy_metabox.load_image,id:t.response,post_id:soliloquy_metabox.id},function(o){l()},"json")}),c.bind("UploadComplete",function(){$(o).hide().css("display","none"),$(e).removeAttr("style")}),c.bind("Error",function(o,e){var l=104857600,t=$("#soliloquy-upload-error"),i;switch(e.code){case plupload.FAILED:case plupload.FILE_EXTENSION_ERROR:t.html('<p class="error">'+pluploadL10n.upload_failed+"</p>");break;case plupload.FILE_SIZE_ERROR:a(o,e.file);break;case plupload.IMAGE_FORMAT_ERROR:wpFileError(e.file,pluploadL10n.not_an_image);break;case plupload.IMAGE_MEMORY_ERROR:wpFileError(e.file,pluploadL10n.image_memory_exceeded);break;case plupload.IMAGE_DIMENSIONS_ERROR:wpFileError(e.file,pluploadL10n.image_dimensions_exceeded);break;case plupload.GENERIC_ERROR:wpQueueError(pluploadL10n.upload_failed);break;case plupload.IO_ERROR:i=parseInt(uploader.settings.max_file_size,10),i>l&&e.file.size>l?wpFileError(e.file,pluploadL10n.big_upload_failed.replace("%1$s",'<a class="uploader-html" href="#">').replace("%2$s","</a>")):wpQueueError(pluploadL10n.io_error);break;case plupload.HTTP_ERROR:wpQueueError(pluploadL10n.http_error);break;case plupload.INIT_ERROR:$(".media-upload-form").addClass("html-uploader");break;case plupload.SECURITY_ERROR:wpQueueError(pluploadL10n.security_error);break;default:a(o,e.file)}o.refresh()}))}function a(o,e,l){var t;t=l?pluploadL10n.big_upload_queued.replace("%s",e.name)+" "+pluploadL10n.big_upload_failed.replace("%1$s",'<a class="uploader-html" href="#">').replace("%2$s","</a>"):pluploadL10n.file_exceeds_size_limit.replace("%s",e.name),$("#soliloquy-upload-error").html('<div class="error fade"><p>'+t+"</p></div>"),o.removeFile(e)}var s=$("#soliloquy-tabs"),n=$("#soliloquy-tabs-nav"),r=window.location.hash,d=window.location.hash.replace("!","");if(r&&r.indexOf("soliloquy-tab-")>=0){$(".soliloquy-active").removeClass("soliloquy-active"),n.find('li a[href="'+d+'"]').parent().addClass("soliloquy-active"),s.find(d).addClass("soliloquy-active").show();var u=$("#post").attr("action");u&&(u=u.split("#")[0],$("#post").attr("action",u+r))}$(document).on("click","#soliloquy-tabs-nav li a",function(o){o.preventDefault();var e=$(this);if(!e.parent().hasClass("soliloquy-active")){window.location.hash=r=this.hash.split("#").join("#!");var l=n.find(".soliloquy-active").removeClass("soliloquy-active").find("a").attr("href");e.parent().addClass("soliloquy-active"),s.find(l).removeClass("soliloquy-active").hide(),s.find(e.attr("href")).addClass("soliloquy-active").show();var t=$("#post").attr("action");t&&(t=t.split("#")[0],$("#post").attr("action",t+r))}});var c;$('input[name="_soliloquy[type]"]').length>0&&"default"==$('input[name="_soliloquy[type]"]:checked').val()&&i(),t(),0!==$(".soliloquy-helper-needed").length&&$('<div class="soliloquy-meta-helper-overlay" />').prependTo("#soliloquy"),$(document).on("click",".soliloquy-meta-icon",function(o){o.preventDefault();var e=$(this),l=e.parent(),t=e.next();t.is(":visible")?($(".soliloquy-meta-helper-overlay").remove(),l.removeClass("soliloquy-helper-active")):(0===$(".soliloquy-meta-helper-overlay").length&&$('<div class="soliloquy-meta-helper-overlay" />').prependTo("#soliloquy"),l.addClass("soliloquy-helper-active"))}),$(document).on("change",'input[name="_soliloquy[type]"]:radio',function(o){var e=$(this);$(".soliloquy-type-spinner .soliloquy-spinner").css({display:"inline-block","margin-top":"-1px"});var l={action:"soliloquy_change_type",post_id:soliloquy_metabox.id,type:e.val(),nonce:soliloquy_metabox.change_nonce};$.post(soliloquy_metabox.ajax,l,function(o){"default"==o.type?($("#soliloquy-slider-main").html(o.html),i()):$("#soliloquy-slider-main").html(o.html),$(document).trigger("soliloquySliderType",o),$(".soliloquy-type-spinner .soliloquy-spinner").hide()},"json")}),$(document).on("click",".soliloquy-media-library",function(o){o.preventDefault(),$("#soliloquy-upload-ui").appendTo("body").show()}),$(".soliloquy-slider").on("click",".thumbnail, .check, .media-modal-icon",function(o){o.preventDefault(),$(this).parent().parent().hasClass("soliloquy-in-slider")||($(this).parent().parent().hasClass("selected")?$(this).parent().parent().removeClass("details selected"):$(this).parent().parent().addClass("details selected"))}),$(document).on("click",".soliloquy-load-library",function(o){o.preventDefault();var e=$(this);e.next().css({display:"inline-block","margin-top":"14px","margin-left":"-5px"});var l={action:"soliloquy_load_library",offset:parseInt(e.attr("data-soliloquy-offset")),post_id:soliloquy_metabox.id,nonce:soliloquy_metabox.load_slider};$.post(soliloquy_metabox.ajax,l,function(o){e.attr("data-soliloquy-offset",parseInt(e.attr("data-soliloquy-offset"))+20),o&&o.html&&e.hasClass("has-search")?($(".soliloquy-slider").html(o.html),e.removeClass("has-search")):$(".soliloquy-slider").append(o.html),e.next().hide()},"json")}),$(document).on("keyup keydown","#soliloquy-slider-search",function(){var o=$(this);o.prev().css({display:"inline-block","margin-top":"1px","vertical-align":"middle","margin-right":"4px"});var e=$(this).val(),l={action:"soliloquy_library_search",nonce:soliloquy_metabox.library_search,post_id:soliloquy_metabox.id,search:e};v(function(){$.post(soliloquy_metabox.ajax,l,function(e){$(".soliloquy-load-library").addClass("has-search").attr("data-soliloquy-offset",parseInt(0)),e&&$(".soliloquy-slider").html(e.html),o.prev().hide()},"json")},"500")}),$(document).on("click",".soliloquy-media-insert",function(o){o.preventDefault();var e=$(this),l=e.text(),t={action:"soliloquy_insert_slides",nonce:soliloquy_metabox.insert_nonce,post_id:soliloquy_metabox.id,images:{},videos:{},html:{}},i=!1,a=!1,s=!1,n=o;e.text(soliloquy_metabox.inserting),$(".soliloquy-media-frame").find(".attachment.selected:not(.soliloquy-in-slider)").each(function(o,e){t.images[o]=$(e).attr("data-attachment-id"),i=!0}),$(".soliloquy-media-frame").find(".soliloquy-video-slide-holder").each(function(o,e){t.videos[o]={title:$(e).find(".soliloquy-video-slide-title").val(),url:$(e).find(".soliloquy-video-slide-url").val(),src:$(e).find(".soliloquy-video-slide-thumbnail").val(),caption:$(e).find(".soliloquy-video-slide-caption").val()},a=!0}),$(".soliloquy-media-frame").find(".soliloquy-html-slide-holder").each(function(o,e){t.html[o]={title:$(e).find(".soliloquy-html-slide-title").val(),code:$(e).find(".soliloquy-html-slide-code").val()},s=!0}),$.post(soliloquy_metabox.ajax,t,function(o){setTimeout(function(){_(n),e.text(l),i&&$(".soliloquy-load-library").attr("data-soliloquy-offset",0).addClass("has-search").trigger("click")},500)},"json")}),$(document).on("click",".soliloquy-media-frame .media-menu-item",function(o){o.preventDefault();var e=$(this),l=e.parent().find(".active").removeClass("active").data("soliloquy-content"),t=e.addClass("active").data("soliloquy-content");$("#soliloquy-"+l).hide(),$("#soliloquy-"+t).show()}),$(document).on("click",".soliloquy-add-video-slide",function(e){e.preventDefault();var l=parseInt($(this).attr("data-soliloquy-video-number")),t="soliloquy-video-slide-"+$(this).attr("data-soliloquy-html-number");$(this).attr("data-soliloquy-video-number",l+1).parent().before(o(l))}),$(document).on("click","#soliloquy-video-slides .soliloquy-delete-video-slide",function(o){o.preventDefault(),$(this).parent().parent().remove()});var p={};$(".soliloquy-html").find(".soliloquy-html-code").each(function(o,e){var l=$(e).attr("id");p[l]=CodeMirror.fromTextArea(e,{enterMode:"keep",indentUnit:4,electricChars:!1,lineNumbers:!0,lineWrapping:!0,matchBrackets:!0,mode:"php",smartIndent:!1,tabMode:"shift",theme:"solarized dark"}),p[l].on("blur",function(o){$("#"+l).text(o.getValue())}),p[l].on("change",function(o){q(l,o.getValue())})}),$(document).on("click",".soliloquy-add-html-slide",function(o){o.preventDefault();var l=parseInt($(this).attr("data-soliloquy-html-number")),t="soliloquy-html-slide-"+$(this).attr("data-soliloquy-html-number");$(this).attr("data-soliloquy-html-number",l+1).parent().before(e(l)),p[t]=CodeMirror.fromTextArea(document.getElementById(t),{enterMode:"keep",indentUnit:4,electricChars:!1,lineNumbers:!0,lineWrapping:!0,matchBrackets:!0,mode:"php",smartIndent:!1,tabMode:"shift",theme:"solarized dark"}),p[t].on("blur",function(o){$("#"+t).text(o.getValue())}),p[t].on("change",function(o){q(t,o.getValue())})});var m=$("#soliloquy-output");m.sortable({containment:"#soliloquy",items:"li",cursor:"move",forcePlaceholderSize:!0,placeholder:"dropzone",update:function(o,e){var l={url:soliloquy_metabox.ajax,type:"post",async:!0,cache:!1,dataType:"json",data:{action:"soliloquy_sort_images",order:m.sortable("toArray").toString(),post_id:soliloquy_metabox.id,nonce:soliloquy_metabox.sort},success:function(o){},error:function(o,e,l){}};$.ajax(l)}}),$(document).on("click","#soliloquy .soliloquy-remove-slide",function(o){o.preventDefault();var e=confirm(soliloquy_metabox.remove);if(e){var l=$(this).parent().attr("id"),t={action:"soliloquy_remove_slide",attachment_id:l,post_id:soliloquy_metabox.id,nonce:soliloquy_metabox.remove_nonce};$.post(soliloquy_metabox.ajax,t,function(o){$("#"+l).fadeOut("normal",function(){$(this).remove(),$(".soliloquy-load-library").attr("data-soliloquy-offset",0).addClass("has-search").trigger("click")})},"json")}});var y=[];$(document).on("click.soliloquyModify",".soliloquy-modify-slide",function(o){o.preventDefault();var e=$(this).parent().data("soliloquy-slide"),l="soliloquy-meta-"+e;y=[],$("ul#soliloquy-output li").each(function(){y.push($(this).data("soliloquy-slide"))}),f(e,l)}),$(document).on("click","button.left, button.right",function(o){o.preventDefault(),b();var e=$(this).attr("data-attachment-id"),l="soliloquy-meta-"+e;f(e,l)});var h,f=function(o,e){h=$("#"+e).appendTo("body"),$(h).show(),$("button.left",$(h)).removeClass("disabled"),$("button.right",$(h)).removeClass("disabled");for(var l=-1,t=0;t<y.length;t++)if(y[t]==o){l=t;break}0==l?($("button.left",$(h)).addClass("disabled"),$("button.left",$(h)).attr("data-attachment-id",""),y.length>1?($("button.right",$(h)).removeClass("disabled"),$("button.right",$(h)).attr("data-attachment-id",y[l+1])):($("button.right",$(h)).addClass("disabled"),$("button.right",$(h)).attr("data-attachment-id",""))):l==y.length-1?($("button.left",$(h)).removeClass("disabled"),$("button.left",$(h)).attr("data-attachment-id",y[l-1]),$("button.right",$(h)).addClass("disabled"),$("button.right",$(h)).attr("data-attachment-id","")):($("button.left",$(h)).removeClass("disabled"),$("button.left",$(h)).attr("data-attachment-id",y[l-1]),$("button.right",$(h)).removeClass("disabled"),$("button.right",$(h)).attr("data-attachment-id",y[l+1])),"undefined"!=typeof p["soliloquy-code-"+o]&&p["soliloquy-code-"+o].refresh()};$(document).on("click",".soliloquy-thumbnail",function(o){o.preventDefault();var e=$(this).data("field"),l=wp.media.frames.soliloquy_media_frame=wp.media({className:"media-frame soliloquy-media-frame",frame:"select",multiple:!1,title:soliloquy_metabox.videoframe,library:{type:"image"},button:{text:soliloquy_metabox.videouse}}),t=$(this);l.on("select",function(){var o=l.state().get("selection").first().toJSON();$("input."+e,t.closest(".media-frame-content")).val(o.url).trigger("change")}),l.open()}),$(document).on("change","input.soliloquy-src, input.soliloquy-thumb",function(o){var e=$(this).data("soliloquy-meta");$("div.thumbnail > img."+e,$(this).closest(".media-frame-content")).attr("src",$(this).val())}),$(document).on("click",".soliloquy-thumbnail-delete",function(o){o.preventDefault();var e=$(this).data("field");$("input."+e,$(this).closest(".media-frame-content")).val("").trigger("change")});var q=function(o,e){var l=o.replace("soliloquy-code-","#soliloquy-meta-table-");$(".attachment-media-view .thumbnail",$(l)).html(e)};$(document).on("click",".media-modal-close, .media-modal-backdrop",function(o){o.preventDefault(),b()}),$(document).on("keydown",function(o){27==o.keyCode&&b()});var b=function(){var o=$(h).attr("id");if("undefined"==typeof o)$("#soliloquy-upload-ui").appendTo("#soliloquy-upload-ui-wrapper").hide();else{var e=o.replace("soliloquy-meta-","");$("#"+o).appendTo("#"+e).hide()}};$(document).on("click",".soliloquy-meta-submit",function(o){o.preventDefault();var e=$(this),l=e.text(),t=e.data("soliloquy-item"),i="soliloquy-meta-"+t,a={},s=$("span.settings-save-status span.spinner"),n=$("span.settings-save-status span.saved");e.text(soliloquy_metabox.saving),e.attr("disabled","disabled"),$(s).show(),a.caption=$("#soliloquy-meta-table-"+t).find('textarea[name="_soliloquy[meta_caption]"]').val(),$("#soliloquy-meta-table-"+t).find(":input,select").not(".ed_button").each(function(o,e){$(this).data("soliloquy-meta")&&(a[$(this).data("soliloquy-meta")]="checkbox"==$(this).attr("type")||"radio"==$(this).attr("type")?$(this).is(":checked")?1:0:"select"==$(this).attr("type")?$(this).find(":selected").val():$(this).val())});var r={action:"soliloquy_save_meta",nonce:soliloquy_metabox.save_nonce,attach_id:t,post_id:soliloquy_metabox.id,meta:a};$.post(soliloquy_metabox.ajax,r,function(o){"undefined"!=typeof a.src&&$("li#"+t+" img").attr("src",a.src),"undefined"!=typeof a.title&&$("li#"+t+" h4").text(a.title),e.text(l),e.attr("disabled",!1),$(s).fadeOut("slow",function(){$(n).fadeIn("fast",function(){setTimeout(function(){$(n).fadeOut("slow")},500)})})},"json")}),$(document).on("click","#soliloquy-import-submit",function(o){$(this).next().css("display","inline-block"),0===$("#soliloquy-config-import-slider").val().length&&(o.preventDefault(),$(this).next().hide(),alert(soliloquy_metabox["import"]))}),$(document).on("change","#soliloquy-config-slider-size",function(){var o=$(this),e=o.val(),l=o.find(":selected").data("soliloquy-width"),t=o.find(":selected").data("soliloquy-height");"default"==e&&($("#soliloquy-config-slider-width").val(soliloquy_metabox.width),$("#soliloquy-config-slider-height").val(soliloquy_metabox.height)),l&&$("#soliloquy-config-slider-width").val(l),t&&$("#soliloquy-config-slider-height").val(t)});var v=function(){var o=0;return function(e,l){clearTimeout(o),o=setTimeout(e,l)}}(),_=function(o){o.preventDefault(),$("#soliloquy-upload-ui").appendTo("#soliloquy-upload-ui-wrapper").hide(),l()};$(document).on("click","#soliloquy-upload-ui .media-modal-close, #soliloquy-upload-ui .media-modal-backdrop",_),$(document).on("keydown",function(o){27==o.keyCode&&_(o)})})}(jQuery);