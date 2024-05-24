<?php
defined('IS_ADMIN') && IS_ADMIN or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>
<style type="text/css">
.progress {border: 0;background-image: none;filter: none;-webkit-box-shadow: none;-moz-box-shadow: none;box-shadow: none;}
.progress {height: 20px;background-color: #fff;border-radius: 4px;}
.progress-bar-success {background-color: #3ea9e2;}
</style>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>jquery.slimscroll.min.js"></script>
<div class="page-container" style="margin-bottom: 0px !important;">
    <div class="page-content-wrapper">
        <div class="page-content page-content3 mybody-nheader main-content<?php if (param::get('is_iframe') && !param::get('is_menu')) {?> main-content2<?php }?>">
                            <div class="page-body" style="padding-top:0px;margin-bottom:30px;">
<div class="text-center" id="dr_check_button">
    <button type="button" id="dr_check_button_ing" disabled="disabled" class="btn blue"> <img width="15" src="<?php echo JS_PATH;?>layer/theme/default/loading-2.gif">  准备中 </button>
</div>

<div id="dr_check_result" class="margin-top-30" style="display: none">

</div>

<div id="dr_check_div"  class="well margin-top-30" style="display: none">
    <div class="scroller" style="height:250px" data-rail-visible="1"  id="dr_check_html">

    </div>
</div>

<div id="dr_check_ing" style="display: none">
    <div class="progress progress-striped">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">

        </div>
    </div>
</div>

<script>
    $(function () {
        dr_checking();
    });
    function dr_checking() {
        $('#dr_check_html').html("");
        $('#dr_check_result').html($('#dr_check_ing').html());
        $('#dr_check_div').show();
        $('#dr_check_result').show();
        $('#dr_check_reing').remove();
        $('#dr_check_button_ing').addClass('blue');
        $('#dr_check_button_ing').removeClass('red');
        $('#dr_check_button_ing').html('<img width="15" src="<?php echo JS_PATH;?>layer/theme/default/loading-2.gif"> 准备中');
        $('#dr_check_html').append('<p class=""><label class="rleft">正在备份本站文件</label></p>');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "?m=admin&c=cloud&a=update_backup&id=<?php echo CMS_ID;?>&dir=<?php echo $dir;?>&is_bf=<?php echo $is_bf;?>&pc_hash="+pc_hash,
            success: function (json) {
                if (json.code == 0) {
					$('#dr_check_button_ing').html('<i class="fa fa-times-circle"></i> 备份失败');
					$('#dr_check_button_ing').addClass('red');
					$('#dr_check_button_ing').removeClass('blue');
					$('#dr_check_button').append('<button type="button" id="dr_check_reing" onclick="dr_do_check()" class="btn green"> <i class="fa fa-refresh"></i> 忽略备份继续升级 </button>');
					$('#dr_check_html').append('<p class="p_error"><label class="rleft">'+json.msg+'</label></p>');
					$('#dr_check_html').append('<p class=""><label class="rleft">建议手动备份本站全部文件，然后再点击上方的【继续升级】按钮</label></p>');
                } else {
					dr_do_check();
				}
            },
            error: function(HttpRequest, ajaxOptions, thrownError) {
                dr_ajax_alert_error(HttpRequest, ajaxOptions, thrownError)
            }
        });

    }
	
	// 验证版本开始下载
	function dr_do_check() {
        $('#dr_check_html').html("");
        $('#dr_check_result').html($('#dr_check_ing').html());
        $('#dr_check_div').show();
        $('#dr_check_result').show();
        $('#dr_check_reing').remove();
        $('#dr_check_button_ing').addClass('blue');
        $('#dr_check_button_ing').removeClass('red');
        $('#dr_check_button_ing').html('<img width="15" src="<?php echo JS_PATH;?>layer/theme/default/loading-2.gif"> 准备中');
		$('#dr_check_html').append('<p class=""><label class="rleft">正在验证版本信息</label></p>');
		$.ajax({
			type: "GET",
			dataType: "json",
			url: "?m=admin&c=cloud&a=update_file&id=<?php echo CMS_ID;?>&ls=<?php echo $ls;?>&pc_hash="+pc_hash,
			success: function (json) {
				if (json.code == 0) {
					$('#dr_check_button_ing').html('<i class="fa fa-times-circle"></i> 下载失败');
					$('#dr_check_button_ing').addClass('red');
					$('#dr_check_button_ing').removeClass('blue');
					$('#dr_check_button').append('<button type="button" id="dr_check_reing" onclick="dr_checking()" class="btn green"> <i class="fa fa-refresh"></i> 重新下载 </button>');
					$('#dr_check_html').append('<p class="p_error"><label class="rleft">'+json.msg+'</label></p>');
				} else {
					dr_do_cron();
				}
			},
			error: function(HttpRequest, ajaxOptions, thrownError) {
				dr_ajax_alert_error(HttpRequest, ajaxOptions, thrownError)
			}
		});
	}
	
    // 执行下载
    function dr_do_cron() {
        // 开始下载他
        $('#dr_check_html').append('<p class=""><label class="rleft">正在开始下载文件</label></p>');
        $('#dr_check_button_ing').html('<img width="15" src="<?php echo JS_PATH;?>layer/theme/default/loading-2.gif"> 下载中');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "?m=admin&c=cloud&a=update_file_down&id=<?php echo CMS_ID;?>&ls=<?php echo $ls;?>&pc_hash="+pc_hash,
            success: function (json) {
                if (json.code == 0) {
                    $('#dr_check_button_ing').html('<i class="fa fa-times-circle"></i> 下载失败');
                    $('#dr_check_button_ing').addClass('red');
                    $('#dr_check_button_ing').removeClass('blue');
                    $('#dr_check_button').append('<button type="button" id="dr_check_reing" onclick="dr_checking()" class="btn green"> <i class="fa fa-refresh"></i> 重新下载 </button>');
                    $('#dr_check_html').append('<p class="p_error"><label class="rleft">'+json.msg+'</label></p>');
                    clearInterval(interval_id);
                } else {

                }
            },
            error: function(HttpRequest, ajaxOptions, thrownError) {
                dr_ajax_alert_error(HttpRequest, ajaxOptions, thrownError)
            }
        });
        // 检测下载结果
        var is_ok_lock = 0;
        var is_jd = 0;
        var is_count = 0;
        var interval_id = window.setInterval(function() {

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "?m=admin&c=cloud&a=update_file_check&id=<?php echo CMS_ID;?>&ls=<?php echo $ls;?>&is_count="+is_count+"&is_jd="+is_jd+"&pc_hash="+pc_hash,
                success: function (json) {
                    is_count++;
                    document.getElementById('dr_check_html').scrollTop = document.getElementById('dr_check_html').scrollHeight;
                    is_jd = json.code;
                    if (json.code == 0) {
                        $('#dr_check_button_ing').html('<i class="fa fa-times-circle"></i> 下载失败');
                        $('#dr_check_button_ing').addClass('red');
                        $('#dr_check_button_ing').removeClass('blue');
                        $('#dr_check_button').html('<button type="button" id="dr_check_reing" onclick="dr_checking()" class="btn green"> <i class="fa fa-refresh"></i> 重新下载 </button>');
                        clearInterval(interval_id);
                    } else {
                        $('#dr_check_result .progress-bar-success').attr('style', 'width:'+json.code+'%');
                        if (json.code == 100) {
                            // 下在完成
                            clearInterval(interval_id);
                            //dr_checking_install();
                            if (is_ok_lock == 0) {
                                $('#dr_check_html').append('<p class=""><label class="rleft">文件下载完成</label></p>');
                                dr_checking_install();
                            }
                            is_ok_lock = 1;
                        } else {
                            $('#dr_check_html').append(json.msg);
                            $('#dr_check_button_ing').html('<img width="15" src="<?php echo JS_PATH;?>layer/theme/default/loading-2.gif">  下载进度 '+json.code+'%');
                        }
                    }
                },
                error: function(HttpRequest, ajaxOptions, thrownError) {
                    dr_ajax_alert_error(HttpRequest, ajaxOptions, thrownError)
                }
            });

        }, 1000);
    }

    function dr_checking_install() {
        $('#dr_check_html').html("");
        $('#dr_check_result').html($('#dr_check_ing').html());
        $('#dr_check_div').show();
        $('#dr_check_result').show();
        $('#dr_check_reing').remove();
        $('#dr_check_button_ing').addClass('blue');
        $('#dr_check_button_ing').removeClass('red');
        $('#dr_check_button_ing').html('<img width="15" src="<?php echo JS_PATH;?>layer/theme/default/loading-2.gif"> 更新中');
        $('#dr_check_html').append('<p class=""><label class="rleft">正在更新本站程序文件</label></p>');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "?m=admin&c=cloud&a=update_file_install&id=<?php echo CMS_ID;?>&ls=<?php echo $ls;?>&pc_hash="+pc_hash,
            success: function (json) {

                if (json.code == 1) {
                    // 升级完成
                    $('#dr_check_button').html('<button type="button" onclick="parent.parent.location.reload()" class="btn green"> <i class="fa fa-refresh"></i> 刷新后台 </button>');
                    $('#dr_check_html').html('<p>恭喜你，升级完成，请刷新后台之后再更新后台缓存</p>');
                    // 避免多次请求赋值
                    $('#dr_check_html').attr('id', "test");
                    $('#dr_check_button').attr('id', "test2");
                } else {
                    $('#dr_check_button_ing').html('<i class="fa fa-times-circle"></i> 升级失败');
                    $('#dr_check_button_ing').addClass('red');
                    $('#dr_check_button_ing').removeClass('blue');
                    $('#dr_check_button').append('<button type="button" id="dr_check_reing" onclick="dr_checking()" class="btn green"> <i class="fa fa-refresh"></i> 重新升级 </button>');
                }

            },
            error: function(HttpRequest, ajaxOptions, thrownError) {
                dr_ajax_alert_error(HttpRequest, ajaxOptions, thrownError)
            }
        });
    }
</script>
</div>
</div>
</div>
</div>
</body>
</html>