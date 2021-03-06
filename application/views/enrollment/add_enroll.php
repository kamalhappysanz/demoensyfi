<div class="main-panel">
   <div class="content">
      <div class="col-md-12">
         <div class="card">
            <div class="header">
               <legend>Class Allocation</legend>
            </div>
            <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
               ×</button> <?php echo $this->session->flashdata('msg'); ?>
            </div>
            <?php endif; ?>
            <?php foreach ($res as $rows) { } ?>
            <div class="content">
               <form method="post" action="<?php echo base_url(); ?>enrollment/create" class="form-horizontal" enctype="multipart/form-data" id="admissionform">
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Academic Year</label>
                        <div class="col-sm-4">
                           <?php  $status=$years['status']; if($status=="success"){
                              foreach($years['all_years'] as $row){}
                                ?>
                           <input type="hidden" name="year_id"  value="<?php  echo $row->year_id; ?>">
                           <input type="text" name="year_name"  class="form-control" value="<?php echo date('Y', strtotime($row->from_month));  echo "-"; echo date('Y', strtotime( $row->to_month));  ?>" readonly="">
                           <?php   }else{  ?>
                           <input type="text" name="year_id"  class="form-control" value="" readonly="">
                           <?php     } ?>
                           <!-- <select name="admit_year" class="selectpicker form-control" data-title="Select Year" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <?php foreach ($years as $row) {
                                 $fyear=$row->from_month;
                                 $month= strtotime($fyear);
                                 // echo $rows->year_id;
                                 $eyear=$row->to_month;
                                 $month1= strtotime($eyear);
                                 ?>
                              <option value="<?php echo $row->year_id; ?>"><?php echo date('Y',$month); ?> (To) <?php  echo date('Y',$month1); ?></option>
                              <?php } ?>

                              </select>-->
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Admission Number</label>
                        <div class="col-sm-4">
                           <input type="text" class="form-control" readonly value="<?php echo $rows->admisn_no; ?>" name="admisn_no" id="admission_no">
                           <input type="hidden" class="form-control" value="<?php echo $rows->admission_id; ?>" name="admission_id" id="admission_id">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Registration Date <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" value="" name="admit_date" class="form-control datepicker" placeholder="Registration Date"/>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Student Name</label>
                        <div class="col-sm-4">
                           <input type="text" value="<?php echo $rows->name; ?>"name="name" readonly class="form-control">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Class <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <select name="class_section" class="selectpicker form-control" data-title="Select Class" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <?php foreach ($getall_class as $rows) {  ?>
                              <option value="<?php echo $rows->class_sec_id; ?>"><?php echo $rows->class_name; ?>&nbsp; - &nbsp;<?php echo $rows->sec_name; ?></option>
                              <?php      } ?>
                           </select>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Quota  <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <select name="quota_id" class="selectpicker form-control" data-title="Select Quota" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <?php foreach ($quota as $row1) {  ?>
                              <option value="<?php echo $row1->id; ?>"><?php echo $row1->quota_name; ?></option>
                              <?php      } ?>
                           </select>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">House</label>
                        <div class="col-sm-4">
                           <select name="groups_id" class="selectpicker form-control" data-title="Select House" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <?php foreach ($groups as $row2) {  ?>
                              <option value="<?php echo $row2->id; ?>"><?php echo $row2->group_name; ?></option>
                              <?php      } ?>
                           </select>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Co-curricular Activity</label>
                        <div class="col-sm-4">
                           <select multiple name="activity_id[]" class="selectpicker form-control" data-title="Select Activity" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <?php foreach ($activities as $row3) {  ?>
                              <option value="<?php echo $row3->id; ?>"><?php echo $row3->extra_curricular_name; ?></option>
                              <?php      } ?>
                           </select>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Status  <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <select name="status" class="selectpicker form-control"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                              <option value="Active">Active</option>
                              <option value="Deactive">Inactive</option>
                           </select>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <!-- <label class="col-sm-4 control-label">&nbsp;</label> -->
                        <div class="text-center">
							<input type="submit" id="save" class="btn btn-info btn-fill center" value="ALLOCATE">
                          
                        </div>
                     </div>
                  </fieldset>
               </form>
            </div>
         </div>
         <!-- end card -->
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {

    $('#admissionform').validate({ // initialize the plugin
        rules: {
             year_id:{required:true},
			year_name:{required:true},
            admit_year:{required:true, number: true },
            admisn_no:{required:true },
            admit_date:{required:true },
            name:{required:true },
            admit_date:{required:true },
            class_section:{required:true },
            section:{required:true },
			quota_id:{required:true },
			groups_id:{required:true },
			//"activity_id[]":{required:true },
			status:{required:true }

        },
        messages: {
              year_id:"Please choose an option!",
				year_name:"This field cannot be empty!",
              admit_year: "Please choose an option!",
              admisn_no: "Please choose an option!",
              admit_date: "This field cannot be empty!",
              name: "This field cannot be empty!",
               admit_date: "This field cannot be empty!",
              class_section: "Please choose an option!",
              section: "Please choose an option!",
			quota_id: "Please choose an option!",
               groups_id: "Please choose an option!",
              //"activity_id[]": "Select Extra Curricular  ",
              status: "Please choose an option!"

            }
    });
   });

</script>
<script type="text/javascript">
   $().ready(function(){
   jQuery('#enrollmentmenu').addClass('collapse in');
   $('#enroll').addClass('active');
   $('#enroll1').addClass('active');
     $('.datepicker').datetimepicker({
       format: 'DD-MM-YYYY',
       icons: {
           time: "fa fa-clock-o",
           date: "fa fa-calendar",
           up: "fa fa-chevron-up",
           down: "fa fa-chevron-down",
           previous: 'fa fa-chevron-left',
           next: 'fa fa-chevron-right',
           today: 'fa fa-screenshot',
           clear: 'fa fa-trash',
           close: 'fa fa-remove'
       }
    });
   });
</script>
