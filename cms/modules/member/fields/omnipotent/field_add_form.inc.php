
	<div class="form-group">
      <label class="col-md-2 control-label">表单</label>
      <div class="col-md-9">
            <textarea name="setting[formtext]" id="options" style="height:100px;" class="form-control"></textarea>
            <span class="help-block">例如：&lt;input type='text' name='info[voteid]' id='voteid' value='{FIELD_VALUE}' style='50' &gt;</span>
      </div>
    </div>
	<div class="form-group">
      <label class="col-md-2 control-label">字段类型</label>
      <div class="col-md-9">
	  <select name="setting[fieldtype]" onchange="javascript:fieldtype_setting(this.value);">
	  <option value="varchar">字符 VARCHAR</option>
	  <option value="tinyint">整数 TINYINT(3)</option>
	  <option value="smallint">整数 SMALLINT(5)</option>
	  <option value="mediumint">整数 MEDIUMINT(8)</option>
	  <option value="int">整数 INT(10)</option>
	  </select> <span id="minnumber" style="display:none"><div class="mt-radio-inline">
          <label class="mt-radio mt-radio-outline"><input type="radio" name="setting[minnumber]" value="1" checked/> <font color='red'>正整数</font> <span></span></label>
          <label class="mt-radio mt-radio-outline"><input type="radio" name="setting[minnumber]" value="-1" /> 整数</span><span></span></label></div>
	  </div>
    </div>
