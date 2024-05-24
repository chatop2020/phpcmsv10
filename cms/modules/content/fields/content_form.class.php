<?php
class content_form {
	public $input,$catid,$siteid,$userid,$categorys,$data,$content_url,$position_data_db;
	public $modelid;
	public $fields;
	public $id;
	public $formValidator;

    function __construct($modelid,$catid = 0,$categorys = array()) {
		$this->input = pc_base::load_sys_class('input');
		$this->modelid = $modelid;
		$this->catid = $catid;
		$this->categorys = $categorys;
		$this->fields = getcache('model_field_'.$modelid,'model');
		$this->siteid = get_siteid();
		$this->userid = param::get_session('userid') ? param::get_session('userid') : (param::get_cookie('_userid') ? param::get_cookie('_userid') : param::get_cookie('userid'));
    }

	function get($data = array()) {
		$_groupid = param::get_cookie('_groupid');
		$this->data = $data;
		if(isset($data['id'])) $this->id = $data['id'];
		$info = array();
		if(isset($data['url'])) $this->content_url = $data['url'];
		if (is_array($this->fields)) {
			foreach($this->fields as $field=>$v) {
				if(defined('IS_ADMIN') && IS_ADMIN) {
					if($v['iscore'] || check_in(param::get_session('roleid'), $v['unsetroleids'])) continue;
				} else {
					if($v['iscore'] || !$v['isadd'] || check_in($_groupid, $v['unsetgroupids'])) continue;
				}
				$func = $v['formtype'];
				$value = isset($data[$field]) ? new_html_special_chars($data[$field]) : '';
				if($func=='pages' && isset($data['maxcharperpage'])) {
					$value = $data['paginationtype'].'|'.$data['maxcharperpage'];
				}
				if(!method_exists($this, (string)$func)) continue;
				$form = $this->$func($field, $value, $v);
				if($form !== false) {
					if(defined('IS_ADMIN') && IS_ADMIN) {
						if($v['isbase']) {
							$star = $v['minlength'] || $v['pattern'] ? 1 : 0;
							$info['base'][$field] = array('name'=>$v['name'], 'tips'=>$v['tips'], 'form'=>$form, 'star'=>$star,'isomnipotent'=>$v['isomnipotent'],'formtype'=>$v['formtype']);
						} else {
							$star = $v['minlength'] || $v['pattern'] ? 1 : 0;
							$info['senior'][$field] = array('name'=>$v['name'], 'tips'=>$v['tips'], 'form'=>$form, 'star'=>$star,'isomnipotent'=>$v['isomnipotent'],'formtype'=>$v['formtype']);
						}
					} else {
						$star = $v['minlength'] || $v['pattern'] ? 1 : 0;
						$info[$field] = array('name'=>$v['name'], 'tips'=>$v['tips'], 'form'=>$form, 'star'=>$star,'isomnipotent'=>$v['isomnipotent'],'formtype'=>$v['formtype']);
					}
				}
			}
		}
		return $info;
	}
}?>