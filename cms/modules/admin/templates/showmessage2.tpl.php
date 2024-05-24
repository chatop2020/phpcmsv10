<?php defined('IS_ADMIN') && IS_ADMIN or exit('No permission resources.'); ?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<title><?php echo L('message_tips');?></title>
<meta name="author" content="zhaoxunzhiyin" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="<?php echo CSS_PATH?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH?>admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>Dialog/main.js"></script>
<script type="text/javascript">
var is_admin = 0;
var web_dir = '<?php echo WEB_PATH;?>';
var pc_hash = '<?php echo dr_get_csrf_token();?>';
var csrf_hash = '<?php echo csrf_hash();?>';
</script>
<script language="JavaScript" src="<?php echo JS_PATH?>admin_common.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>layer/layer.js"></script>
</head>
<body>
<div class="showMsg">
    <h5><?php echo L('message_tips');?></h5>
    <div class="content guery"><?php echo $msg?></div>
    <div class="bottom">
    <?php if($url_forward=='goback' || $url_forward=='') {?>
    <a href="javascript:history.back();" >[<?php echo L('return_previous');?>]</a>
    <?php } elseif($url_forward=="close") {?>
    <button type="button" id="close" class="btn red"> <i class="fa fa-close"></i> <?php echo L('close');?></button>
    <?php } elseif($url_forward=="blank") {?>
    <?php } elseif($url_forward) {if(strpos($url_forward,'&pc_hash')===false) $url_forward .= '&pc_hash='.dr_get_csrf_token();?>
    <a href="<?php echo $url_forward?>"><?php echo L('click_here');?></a>
    <script language="javascript">setTimeout("redirect('<?php echo $url_forward?>');",<?php echo $ms?>);</script> 
    <?php }?>
    <?php if($returnjs) { ?> <script style="text/javascript"><?php echo $returnjs;?></script><?php } ?>
    <?php if ($dialog):?><script style="text/javascript">$(function(){if (window.top.$(".layui-tab-item.layui-show").find("iframe")[0].contentWindow.right) {window.top.$(".layui-tab-item.layui-show").find("iframe")[0].contentWindow.right.location.reload(true);}else{window.top.$(".layui-tab-item.layui-show").find("iframe")[0].contentWindow.location.reload(true);}if(window.top.art.dialog({id:"<?php echo $dialog?>"})){window.top.art.dialog({id:"<?php echo $dialog?>"}).close();}else{ownerDialog.close();}})</script><?php endif;?>
        </div>
</div>
<?php if($url_forward=="close") {?>
<script src="<?php echo JS_PATH?>layui/layui.js" charset="utf-8"></script>
<script src="<?php echo CSS_PATH?>layuimini/js/lay-config.js?v=2.0.0" charset="utf-8"></script>
<script>
layui.use(['form','miniTab'], function () {
    var form = layui.form,
        layer = layui.layer,
        miniTab = layui.miniTab;

    //监听关闭
    $('#close').on('click', function() {
        miniTab.deleteCurrentByIframe();
    });
});
</script>
<?php }?>
</body>
</html>