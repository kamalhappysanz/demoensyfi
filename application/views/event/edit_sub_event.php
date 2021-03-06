
<div class="main-panel">
<div class="content">
<div class="col-md-12">

                        <div class="card">
                            <div class="header">
                                <legend>Edit Coordinator Assignment</legend>
                            </div>
                            <?php if($this->session->flashdata('msg')): ?>
                              <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button> <?php echo $this->session->flashdata('msg'); ?>
                     </div>

                     <?php endif; ?>

                            <div class="content">
                                <form method="post" action="<?php echo base_url(); ?>event/sub_event_update" class="form-horizontal" enctype="multipart/form-data" id="eventform" name="eventform">
								 <?php foreach ($res as $rows) {   } ?>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Sub Event <span class="mandatory_field">*</span></label>
                                        <div class="col-md-4">
										 <input type="hidden" name="event_id" value="<?php echo $rows->event_id; ?>" class="form-control">
										 <input type="hidden" name="co_id" value="<?php echo $rows->co_id; ?>" class="form-control">
                                            <input type="text" required name="sub_event_name" value="<?php echo $rows->sub_event_name; ?>" placeholder="Sub Event" class="form-control" maxlength="50">
											 <div class="col-md-6"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Coordinator <span class="mandatory_field">*</span></label>
                                        <div class="col-md-4">
										<select   name="co_name" required class="selectpicker" data-style=" btn-block"  data-menu-style="dropdown-blue">

                                        <?php
                                         $tea_name=$rows->co_name_id;
                          $sQuery = "SELECT * FROM edu_teachers";
                          $objRs=$this->db->query($sQuery);
                          $row=$objRs->result();
                          foreach ($row as $rows1)
						  {
								 $s= $rows1->teacher_id;
								 $sec=$rows1->name;
								 $arryPlatform = explode(",",$tea_name);
								 $sPlatform_id  = trim($s);
								 $sPlatform_name  = trim($sec);
								 if (in_array($sPlatform_id, $arryPlatform ))
								  {
                                       echo "<option  value=\"$s\" selected  /> $sec &nbsp;&nbsp; </option>";
                                  }
                                 else {
                                echo "<option value=\"$s\" />$sec &nbsp;&nbsp;</option>";
                                 }
                                      }
                                        ?>
                                  </select>

                                        </div>
										 <div class="col-md-6"></div>
                                    </div>

									 <div class="form-group">
                                            <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                              <select name="status" class="selectpicker form-control"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                  <option value="Active">Active</option>
                                                  <option value="Deactive">Inactive</option>
                                              </select>
                     <script language="JavaScript">document.eventform.status.value="<?php echo $rows->status; ?>";</script>
                                            </div>
 <div class="col-md-6"></div>
                                        </div>

                                    <div class="form-group">
                                        <label class="col-md-2"></label>
                                        <div class="col-md-4">
										<input type="submit" id="save" class="btn btn-info btn-fill center"  value="SAVE">
								 
                                           <!-- <button type="submit" class="btn btn-fill btn-info">Save</button> -->
                                        </div>
										 <div class="col-md-6"></div>
                                    </div>
                                </form>

                            </div>
                        </div>  <!-- end card -->

                    </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
  $('#eventmenu').addClass('collapse in');
  $('#event').addClass('active');
  $('#event2').addClass('active');
 $('#eventform').validate({ // initialize the plugin
     rules: {
         event_date:{required:true },
         event_details:{required:true },
         event_name:{required:true },
         event_status:{required:true }
     },
     messages: {
           sub_event_name: "This field cannot be empty!",
           event_date: "Select Event Date",
           event_name: "Enter Event Name",
           event_status: "Select Status"
         }
 });
});

</script>
