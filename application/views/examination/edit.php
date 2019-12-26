<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Edit Examination</h4>

                       </div>
						<?php foreach ($res as $rows)
							{
						  $rows->exam_year;
							}?>
                       <div class="content">
                           <form method="post" action="<?php echo base_url(); ?>examination/update" class="form-horizontal" enctype="multipart/form-data" id="myformsection" name="myformsection">
                                <fieldset>
										<input type="hidden" name="exam_id" class="form-control" id="yexam" placeholder="Enter Exam Year" required value="<?php echo $rows->exam_id; ?>">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Academic year <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
											<select name="exam_year"  required class="selectpicker" data-title="Select From & To Year " data-style="btn-default btn-block" data-menu-style="dropdown-blue">

                                        <?php
                                          $tea_name=$rows->exam_year;
										  $sQuery = "SELECT * FROM edu_academic_year ";
										  $objRs=$this->db->query($sQuery);
										  $row=$objRs->result();
										  foreach ($row as $rows1)
										  {
												 $s= $rows1->year_id;

												 $fyear=$rows1->from_month;
												 $month= strtotime($fyear);
												 $sec=date('Y',$month);

												 $eyear=$rows1->to_month;
												 $month1= strtotime($eyear);
												 $sec1=date('Y',$month1);

												 $arryPlatform = explode(",",$tea_name);
												 $sPlatform_id  = trim($s);
												 $sPlatform_name  = trim($sec);
												 $sPlatform_name1  = trim($sec1);
												 if (in_array($sPlatform_id, $arryPlatform ))
												  {
													   echo "<option  value=\"$s\" selected  /> $sec-$sec1&nbsp;&nbsp; </option>";
												  }
												 else {
												echo "<option value=\"$s\" />$sec-$sec1&nbsp;&nbsp;</option>";
												 }
										  }
														?>
                                  </select>
                                        </div>
				                 </div>
                                    </fieldset>
	                                   <fieldset>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label">Exam Name <span class="mandatory_field">*</span></label>
                                    <div class="col-sm-4">
                                          <input type="text" name="exam_name" class="form-control" placeholder="Enter Exam Name"  value="<?php echo $rows->exam_name; ?>" maxlength="30">
                                      </div>
                                    </div>
                                        </fieldset>
										<fieldset>
										<div class="form-group">
										 <label class="col-sm-2 control-label">Exam Type <span class="mandatory_field">*</span></label>
										   <div class="col-sm-4">
										   <select  name="exam_flag" id="exam_flag" class="selectpicker"  class="form-control">
											  <option value="1">Internal/External</option>
											  <option value="0">Total</option>
											</select>
										<script language="JavaScript">document.myformsection.exam_flag.value="<?php echo $rows->exam_flag; ?>";</script>
										  </div>
										</div>
										</fieldset>

										<fieldset>
										   <div class="form-group">
											  <label class="col-sm-2 control-label">Grade Option <span class="mandatory_field">*</span></label>
											  <div class="col-sm-4">
												 <select  name="grade_flag" id="grade_flag" class="selectpicker"  class="form-control">
													<option value="1">Yes</option>
													<option value="0">No</option>
												 </select>
												   <script language="JavaScript">document.myformsection.grade_flag.value="<?php echo $rows->grade_flag; ?>";</script>
											  </div>
										   </div>
										</fieldset>
										<fieldset>
											<div class="form-group">
											<label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
											<div class="col-sm-4">
											<select name="status" class="selectpicker form-control" data-style="btn-default btn-block" >
												<option value="Active">Active</option>
												<option value="Deactive">Inactive</option>
											</select>
										<script language="JavaScript">document.myformsection.status.value="<?php echo $rows->status; ?>";</script>
										</div>
										</div>
										</fieldset>
									<fieldset>
                                        <div class="form-group">
										  <label class="col-sm-2 control-label"></label>
                                          <div class="col-sm-4">
												<input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE">
											</div>
                                            </div>
                                    </fieldset>
                             </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {

    $('#myformsection').validate({ // initialize the plugin
        rules: {
            exam_year:{required:true },
            exam_name:{required:true },


        },
        messages: {
              exam_year: "Please choose an option!",
              exam_name: "This field cannot be empty!"
            }
    });
   });


</script>
<script type="text/javascript">
$('#exammenu').addClass('collapse in');
$('#exam').addClass('active');
$('#exam1').addClass('active');

</script>
