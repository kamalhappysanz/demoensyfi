<div class="main-panel">
<div class="content">
  <div class="card">
    <div class="toolbar">
      <div class="header">
          <legend>Edit Subject <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:-10px;">BACK</button></legend>

      </div>
    </div>
      <div class="row">
    <div class="container">
  <?php foreach($res  as $rows){} ?>
  <form action="<?php echo base_url(); ?>classmanage/save_subject" method="post" class="form-horizontal" id="subject_handling_form" name="subject_handling_form">
     <fieldset>
        <div class="form-group">
           <label class="col-sm-2 control-label">Subject <span class="mandatory_field">*</span></label>
           <div class="col-sm-6">
                <input type="text" name="class_master_id" id="subject" class="form-control" readonly value="<?php echo $rows->subject_name; ?>">
              <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $rows->id; ?>">
           </div>
        </div>
        <div class="form-group">
           <label class="col-sm-2 control-label">Class <span class="mandatory_field">*</span></label>
           <div class="col-sm-6">
                <input type="text" name="class_master_id" id="subject" class="form-control" readonly value="<?php echo $rows->class_name.'-'.$rows->sec_name; ?>">

           </div>
        </div>
        <div class="form-group">
           <label class="col-sm-2 control-label">Module <span class="mandatory_field">*</span></label>
           <div class="col-sm-6">
              <select   name="exam_flag" id="exam_flag" class="form-control">
                <option value="0">Core</option>
                <option value="1">Elective</option>
              </select>
              <script language="JavaScript">document.subject_handling_form.exam_flag.value="<?php echo $rows->exam_flag; ?>";</script>
           </div>
        </div>
        <div class="form-group">
           <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
           <div class="col-sm-6">
              <select   name="status" id="status" class="form-control">
                 <option value="Active">Active</option>
                 <option value="Deactive">Inactive</option>
              </select>
              <script language="JavaScript">document.subject_handling_form.status.value="<?php echo $rows->status; ?>";</script>
           </div>

        </div>
        <div class="form-group">
           <label class="col-sm-2 control-label">&nbsp;</label>
           <div class="col-sm-6">
              <input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE">
           </div>
        </div>
     </fieldset>
  </form>
  </div>
</div></div>
</div>
</div>
<script>
$('#mastersmenu').addClass('collapse in');
$('#master').addClass('active');
$('#masters5').addClass('active');
</script>
