<?php
/**
 * 管理员后台会员组操作类
 */

defined('IN_CMS') or exit('No permission resources.');
pc_base::load_app_class('admin', 'admin', 0);

class member_group extends admin {
	
	private $input,$db,$cache_api,$member_db;
	
	function __construct() {
		parent::__construct();
		$this->input = pc_base::load_sys_class('input');
		$this->db = pc_base::load_model('member_group_model');
		$this->cache_api = pc_base::load_app_class('cache_api', 'admin');
	}

	/**
	 * 会员组首页
	 */
	function init() {
		$page = $this->input->get('page') ? intval($this->input->get('page')) : 1;
		$member_group_list = $this->db->listinfo('', 'sort ASC', $page, SYS_ADMIN_PAGESIZE);
		$this->member_db = pc_base::load_model('member_model');
		//TODO 此处循环中执行sql，会严重影响效率，稍后考虑在memebr_group表中加入会员数字段和统计会员总数功能解决。
		foreach ($member_group_list as $k=>$v) {
			$membernum = $this->member_db->count(array('groupid'=>$v['groupid']));
			$member_group_list[$k]['membernum'] = $membernum;
		}
		$pages = $this->db->pages;
		
		$big_menu = array('javascript:artdialog(\'add\',\'?m=member&c=member_group&a=add\',\''.L('member_group_add').'\',700,500);void(0);', L('member_group_add'));
		include $this->admin_tpl('member_group_list');
	}
			
	/**
	 * 添加会员组
	 */
	function add() {
		if(IS_POST) {
			$info = $this->input->post('info');
			if(!$info['name']) dr_admin_msg(0,L('input').L('groupname'), array('field' => 'name'));
			if ($this->db->count(array('name'=>$info['name']))) {
				dr_admin_msg(0,L('groupname_already_exist'), array('field' => 'name'));
			}
			if(dr_is_empty($info['point'])) dr_admin_msg(0,L('input').L('point'), array('field' => 'point'));
			if(dr_is_empty($info['starnum'])) dr_admin_msg(0,L('input').L('starnum'), array('field' => 'starnum'));
			$info['allowpost'] = $info['allowpost'] ? 1 : 0;
			$info['allowupgrade'] = $info['allowupgrade'] ? 1 : 0;
			$info['allowpostverify'] = $info['allowpostverify'] ? 1 : 0;
			$info['allowsendmessage'] = $info['allowsendmessage'] ? 1 : 0;
			$info['allowattachment'] = $info['allowattachment'] ? 1 : 0;
			$info['allowdownfile'] = $info['allowdownfile'] ? 1 : 0;
			$info['allowsearch'] = $info['allowsearch'] ? 1 : 0;
			$info['allowvisit'] = $info['allowvisit'] ? 1 : 0;
			
			$this->db->insert($info);
			if($this->db->insert_id()){
				$this->_updatecache();
				dr_admin_msg(1,L('operation_success'),'?m=member&c=member_group&a=manage', '', 'add');
			}
		} else {
			$show_header = $show_scroll = true;
			include $this->admin_tpl('member_group_add');
		}
		
	}
	
	/**
	 * 修改会员组
	 */
	function edit() {
		if(IS_POST) {
			$info = $this->input->post('info');
			if(dr_is_empty($info['point'])) dr_admin_msg(0,L('input').L('point'), array('field' => 'point'));
			if(dr_is_empty($info['starnum'])) dr_admin_msg(0,L('input').L('starnum'), array('field' => 'starnum'));
			$info['allowpost'] = isset($info['allowpost']) ? 1 : 0;
			$info['allowupgrade'] = isset($info['allowupgrade']) ? 1 : 0;
			$info['allowpostverify'] = isset($info['allowpostverify']) ? 1 : 0;
			$info['allowsendmessage'] = isset($info['allowsendmessage']) ? 1 : 0;
			$info['allowattachment'] = isset($info['allowattachment']) ? 1 : 0;
			$info['allowdownfile'] = $info['allowdownfile'] ? 1 : 0;
			$info['allowsearch'] = isset($info['allowsearch']) ? 1 : 0;
			$info['allowvisit'] = isset($info['allowvisit']) ? 1 : 0;
			
			$this->db->update($info, array('groupid'=>$info['groupid']));
			
			$this->_updatecache();
			dr_admin_msg(1,L('operation_success'), '?m=member&c=member_group&a=manage', '', 'edit');
		} else {					
			$show_header = $show_scroll = true;
			$groupid = $this->input->get('groupid') ? $this->input->get('groupid') : dr_admin_msg(0,L('illegal_parameters'), HTTP_REFERER);
			
			$groupinfo = $this->db->get_one(array('groupid'=>$groupid));
			include $this->admin_tpl('member_group_edit');		
		}
	}
	
	/**
	 * 排序会员组
	 */
	function sort() {		
		if($this->input->post('sort')) {
			foreach($this->input->post('sort') as $k=>$v) {
				$this->db->update(array('sort'=>$v), array('groupid'=>$k));
			}
			
			$this->_updatecache();
			dr_admin_msg(1,L('operation_success'), HTTP_REFERER);
		} else {
			dr_admin_msg(0,L('operation_failure'), HTTP_REFERER);
		}
	}
	/**
	 * 删除会员组
	 */
	function delete() {	
		$groupidarr = $this->input->post('groupid') ? $this->input->post('groupid') : dr_admin_msg(0,L('illegal_parameters'), HTTP_REFERER);
		$where = to_sqls($groupidarr, '', 'groupid');
		if ($this->db->delete($where)) {
			$this->_updatecache();
			dr_admin_msg(1,L('operation_success'), HTTP_REFERER);
		} else {
			dr_admin_msg(0,L('operation_failure'), HTTP_REFERER);
		}
	}
	
	/**
	 * 更新会员组列表缓存
	 */
	private function _updatecache() {
		$this->cache_api->cache('member_group');
	}

}
?>