<?php
defined('IS_ADMIN') && IS_ADMIN or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>
<style type="text/css">
hr, p {margin: 20px 0;}
</style>
<div  class="page-container" style="margin-bottom: 0px !important;">
    <div class="page-content-wrapper">
        <div class="page-content page-content3 mybody-nheader main-content<?php if (param::get('is_iframe') && !param::get('is_menu')) {?> main-content2<?php }?>">
                            <div class="page-body">
<p style="white-space: normal;">
   下面红色部分选择关闭
</p>
<p>
    <img src="<?php echo IMG_PATH;?>/admin_img/4.png"/>
</p>
</div>
</div>
</div>
</div>
</body>
</html>