# PHPCMS V10 修改版

#### 联系QQ、微信：
![](http://ceshi.kaixin100.cn/upload/images/img.png "联系QQ、微信")

#### QQ群：
![](http://ceshi.kaixin100.cn/upload/images/qqgroup1.png "QQ群")
![](http://ceshi.kaixin100.cn/upload/images/qqgroup2.png "QQ群")

# 不得用于商业用途

版权所有 (c) 2005-2017，酷溜网（北京）科技有限公司保留所有权利。
1 .此版本免费学习交流使用，不得用于商业用途。
2. 未获商业授权之前，不得将本软件用于商业用途（包括但不限于企业网站、经营性网站、以营利为目或实现盈利的网站）。
3. 用户出于自愿而使用，必须了解使用的风险，本人不承担任何因使用而产生问题的相关责任。
4. 通过使用的项目中的任何内容（文字、图片、视频等）所引起的纠纷、争议及所涉及的法律责任由项目所有者承担，本人不承担任何直接、间接或者连带的责任。
5. 不对使用所构建的项目的任何信息内容以及导致的任何版权纠纷和法律争议及后果承担责任。
6. 在任何情况下，对项目所有者及第三人可能造成的损失，本人不承担任何直接、间接或者连带的责任。
7. 任何由于黑客攻击、计算机病毒侵入或发作、因政府管制而造成的暂时性关闭等影响网络正常经营的不可抗力而造成的损失，本人不承担任何直接、间接或者连带的责任。
8. 在源码的使用过程中所造成的个人资料泄露及由此而导致的任何法律争议和后果，本人不承担任何直接、间接或者连带的责任。

#### 修改内容列表：
1. 支持PHP8
2. 支持HTTPS环境
3. 支持MySQL8+
4. 修改PHPCMS目录为CMS
5. 验证码修改
6. 支持H5上传，移除Flash上传
7. 修改后台缩略图裁切图片，移除Flash裁切改为H5裁切
8. 后台附件上传修改为H5上传，会员头像上传修改为H5上传
9. 修改后台界面，修改后台登录界面、后台锁屏界面、后台内容界面
10. 修改前台界面
11. 修复已知BUG
12. 修复已知安全漏洞
13. 增加安装时自定义后台管理登录地址
14. 去掉PHPSSO模块、去掉Video及视频库相关、去掉Upgrade在线升级
15. 去除了已被废弃的视频模块和视频模型
16. 修复安装时DNS解析错误提示
17. 手机电脑同时生成Html
18. 安装文件不检查index.html
19. 安装完删除安装目录
20. 安装删除友情链接、广告数据
21. 增加开启附件分站状态
22. 整合UEditor编辑器
23. UEditor整合上传水印
24. UEditor上传储存数据
25. 附件选择框UI
26. 优化附件选择器界面
27. 增加讯飞关键词获取API、百度关键词获取API，原官方关键词接口已失效
28. 后台增加复制，可复制一条新的到任何栏目或站点
29. 增加头像字段
30. 修改头像，重新写入库
31. 增加组图模式，图片模式、文本模式
32. 百度编辑器上传视频播放器由embed改成video标签
33. 增加本地关键词获取API，原官方关键词接口已失效
34. 增加站点自定义字段、栏目自定义字段、单网页自定义字段
35. 增加一键导入微信文章字段
36. 增加Word导入编辑器字段
37. 增加编辑器可下载微信图片本地化功能
38. 编辑器远程下载图片时加入对尺寸的压缩处理
39. 后台登录密码传输改为加密模式
40. 增加生成静态页进度条
41. 编辑器增加本地图片自动上传
42. 升级为CK4.22.1编辑器
43. 无用文件清理
44. 修改生成缩略图函数thumb
45. 修改获取用户头像函数get_memberavatar
46. 修改原来上传类处理文件，删除原上传类处理文件，新增Upload上传类处理文件
47. 修改原来图片处理类文件
48. 在编辑器底部工具栏中增加去除站外链接选择项
49. 修改IP库类处理文件
50. 新增二维码处理类文件
51. 新增Input类处理文件
52. 新增判断是否是移动端终端is_mobile函数
53. 新增二维码qrcode函数
54. 新增秒转化时间sec2time函数
55. 新增友好时间显示函数dr_fdate
56. 新增时间显示函数dr_date
57. 新增递归创建文件夹create_folder函数
58. 新增调用远程数据dr_catcher_data函数
59. 新增获取远程附件扩展名get_file_ext函数
60. 新增栏目面包屑导航dr_catpos函数
61. 新增手机栏目面包屑导航dr_mobile_catpos函数
62. 新增重新日志记录函数log_message
63. 新增目录扫描dr_dir_map函数
64. 新增文件扫描dr_file_map函数
65. 新增数据返回统一格式dr_return_data函数
66. 新增格式化输出文件大小format_file_size函数
67. 新增附件信息get_attachment函数
68. 新增统一返回json格式并退出程序dr_json函数
69. 新增将数组转换为字符串dr_array2string函数
70. 新增将字符串转换为数组dr_string2array函数
71. 新增根据文件扩展名获取文件预览信息dr_file_preview_html函数
72. 新增用于附件列表查看时dr_file_list_preview_html函数
73. 新增文件是否是图片dr_is_image函数
74. 新增IP转为实际地址ip2address函数
75. 新增当前IP实际地址ip_address_info函数
76. 新增清除HTML标记clearhtml函数
77. 新增提取关键字dr_get_keywords函数
78. 新增提取描述信息dr_get_description函数
79. 新增获取内容中的缩略图get_content_img函数
80. 新增HTML实体字符转换code2html函数
81. 新增判断存在于数组中dr_in_array函数
82. 新增字符长度dr_strlen函数
83. 新增将路径进行安全转换变量模式dr_safe_replace_path函数
84. 新增站点手机配置
85. 新增是否需要检查外部访问
86. 新增关联字段
87. 新增信息表格字段
88. 新增单文件上传字段
89. 水印图片的透明度设置
90. 增加内容编辑时的更新时间字段是否勾选"不更新"的开关
91. 增加百度地图自动读取当前定位坐标功能
92. 增加后台登录口地址自动生成
93. 增加后台菜单初始化菜单
94. 检测附件上传目录不能与缩略图存储目录相同
95. 增加百度主动推送
96. 增加客户站群
97. dr_is_image函数加入对webp格式的图片识别
98. 批量更新URL改名为内容维护
99. 内容维护工具增加批量修改功能
100. 增加首字母头像dr_letter_avatar函数
101. 增加emoji表情符号入库存储（需要MySQL5.6以上，并且需要升级数据库编码）
102. thumb增加下载远程图片进行剪切参数(本功能会对远程服务器参数额外流量)
103. 增加百度编辑器视频在线浏览选取功能
104. 增加后台用户列表对自定义字段进行搜索功能
105. 增加密码加密认证验证
106. 增加上传图片进行压缩时判断图片大小是否溢出内存条件
107. 增加附件上传验证模式(严格模式和宽松模式)进行对附件的安全检测
108. 增加内容维护工具批量删除内容功能
109. 增加内容维护工具提取内容描述信息功能
110. 增加是否定期强制修改密码、强制修改密码周期
111. 增加首次登录是否强制修改密码
112. 增加后台登录后长时间未操作自动退出账号
113. 增加自动退出周期
114. 增加长期未登录锁定
115. 增加在线升级
116. 前台SQL出错不显示详细信息
117. 修改原来备份还原数据库
118. 增加是否同步删除附件
119. thumb函数增加对webp格式的支持
120. 增加html文字提取函数dr_html2text
121. 当thumb不传入尺寸时调用原图文件
122. 增加数组剪切函数dr_arraycut(数组,个数)
123. 增加随机颜色函数dr_random_color
124. str_cut函数修改：str_cut(标题, '0,100', '...')
125. str_cut(标题, '从第几个字符开始,100', '...')
126. title_style函数修改：title_style(样式, 是否随机颜色)
127. 增加站点信息输出{dr_site_info('字段名称', $siteid)}
128. 增加站点设置setting信息输出{dr_site_value('setting字段里的名称', $siteid)}
129. 增加获取栏目数据及自定义字段{dr_cat_value($catid, '栏目字段')}
130. 增加获取单页数据及自定义字段{dr_page_value($catid, '栏目字段')}
131. 增加获取模型数据及自定义字段{dr_value($modelid, $id, '栏目字段')}
132 模型管理增加后台显示字段
133. 表单向导增加后台显示字段
134. 会员模块配置增加后台列表显示字段
135. 删除原来联动菜单数据表
136. 修改原来通过id获取显示联动菜单get_linkage函数{get_linkage($id 联动菜单ID, $keyid 菜单keyid, $space 间隔符号, $url url地址格式, $html 格式替换)}
137. 增加联动菜单包屑导航dr_linkagepos函数{dr_linkagepos($code 联动菜单代码, $id 菜单id, $symbol 间隔符号, $url url地址格式, $html 格式替换)}
138. 联动菜单调用dr_linkage函数{dr_linkage($code 菜单代码, $id 菜单id, $level 调用级别, $name 菜单名称)}
149. 联动菜单的别名获取dr_linkage_cname函数{dr_linkage_cname($code 菜单代码, $id 菜单id)}
140. 管理员管理增加角色为多角色
141. 管理员账号允许同时拥有多个角色组
142. 设置增加是否允许在线编辑模板
143. 会员模块配置增加格式规范
144. 会员模块配置增加登录主字段
145. 会员模块配置增加不允许账号的字符串
146. 会员模块配置增加账号最小长度
147. 会员模块配置增加账号最大长度
148. 会员模块配置增加密码最小长度
149. 会员模块配置增加密码最大长度
150. 会员模块配置增加允许账号与密码相同
151. 会员模块配置增加密码强度（正则）
152. 会员模块配置增加账号规则（正则）

#### 运行环境

PHP7.1以上（支持PHP8）
MySQL5.6及以上，推荐5.7及以上
Apache、Nginx、IIS等Web服务器都可以

#### 建议使用环境：

1. PHP 7.1+
2. Mysql 5.6+
3. Apache 2.4+

#### 安装教程

1. 将代码下载到网站的根目录
2. 运行环境检查程序 /test.php
3. 环境通过后，运行安装文件 /index.php
4. 默认后台入口文件是 /admin.php

#### 期待您的反馈：

使用中有任何疑问或发现BUG，期待您的反馈

## 页面展示
### 安装界面
![](http://ceshi.kaixin100.cn/upload/images/install.png "安装界面")
### 后台登录页面
![](http://ceshi.kaixin100.cn/upload/images/login.png "后台登录")
### 后台首页页面
![](http://ceshi.kaixin100.cn/upload/images/index.png "后台首页")
### 后台设置页面
![](http://ceshi.kaixin100.cn/upload/images/setting.png "后台设置")
### 新增的分词接口功能设置
![](http://ceshi.kaixin100.cn/upload/images/tag.png "后台分词设置")
### 存储策略页面
![](http://ceshi.kaixin100.cn/upload/images/remote.png "存储策略")
### 模块管理页面
![](http://ceshi.kaixin100.cn/upload/images/module.png "模块管理")
### 内容管理页面
![](http://ceshi.kaixin100.cn/upload/images/content.png "内容管理")
### 添加内容页面
![](http://ceshi.kaixin100.cn/upload/images/add_content.png "添加内容")
### 后台附件H5上传
![](http://ceshi.kaixin100.cn/upload/images/h5.png "后台附件H5上传")
### 升级为CK4.22.1编辑器
![](http://ceshi.kaixin100.cn/upload/images/ckeditor.png "升级为CK4.22.1编辑器")
### 升级为Ueditor编辑器
![](http://ceshi.kaixin100.cn/upload/images/ueditor.png "升级为Ueditor编辑器")
### Ueditor上传视频
![](http://ceshi.kaixin100.cn/upload/images/ueditor_video.png "Ueditor上传视频")
### 会员管理页面
![](http://ceshi.kaixin100.cn/upload/images/member.png "会员管理")
### 在线升级页面
![](http://ceshi.kaixin100.cn/upload/images/upgrade.png "在线升级")
### 在线文件MD5对比页面
![](http://ceshi.kaixin100.cn/upload/images/compare.png "在线文件MD5对比")