
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
            <div class="content">
               <form method="post" action="<?php echo base_url(); ?>enrollment/create" class="form-horizontal" enctype="multipart/form-data" id="admissionform">
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Academic Year <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <?php  $status=$years['status']; if($status=="success"){
                              foreach($years['all_years'] as $rows){}
                              ?>
                           <input type="hidden" name="year_id"  value="<?php  echo $rows->year_id; ?>">
                           <input type="text" name="year_name"  class="form-control" value="<?php echo date('Y', strtotime($rows->from_month));  echo "-"; echo date('Y', strtotime( $rows->to_month));  ?>" readonly="" >
                           <?php   }else{  ?>
                           <input type="text" name="year_name"  class="form-control" value="" readonly="">
                           <?php     } ?>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Admission No <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <select name="admission_id" id="admission_no" onchange="checknamefun(this.value)" class="selectpicker form-control" data-title="Select Admission No" >
                              <?php foreach ($admisno as $row) {  ?>
                              <option value="<?php echo $row->admission_id; ?>"><?php echo $row->admisn_no; ?></option>
                              <?php      } ?>
                           </select>
                            </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Student Name <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <p id="msg" name="name">  </p>
                           <input type="text" name="name" id="name" readonly  class="form-control">
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <div class="form-group">
                        <label class="col-sm-4 control-label">Registration Date <span class="mandatory_field">*</span></label>
                        <div class="col-sm-4">
                           <input type="text" name="admit_date" class="form-control datepicker" placeholder="Registration Date"/>
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
                        <label class="col-sm-4 control-label">Quota <span class="mandatory_field">*</span></label>
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
                        <label class="col-sm-4 control-label">House <span class="mandatory_field">*</span></label>
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
                        <label class="col-sm-4 control-label">Status</label>
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
							<input type="submit" id="save1" class="btn btn-info btn-fill center" value="ALLOCATE">
                           
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
   admission_id:{required:true},
   admit_date:{required:true },
   name:{required:true },
   admit_date:{required:true },
   class_section:{required:true },
   section:{required:true },
   quota_id:{required:true },
   groups_id:{required:true },
   // "activity_id[]":{required:true },
   status:{required:true }

   },
   messages: {
   year_id:"Please choose an option!",
   year_name:"Please choose an option!",
   admission_id: "Please choose an option!",
   admit_date: "Please choose an option!",
   name: "This field cannot be empty!",
   admit_date: "This field cannot be empty!",
   class_section: "Please choose an option!",
   section: "Please choose an option!",
   quota_id: "Please choose an option!",
   groups_id: "Please choose an option!",
   // "activity_id[]": "Select Extra Curricular  ",
   status: "Select Status"

   }
   });
   });

</script>
<script type="text/javascript">
   $().ready(function(){
   $('#enrollmentmenu').addClass('collapse in');
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
<script type="text/javascript">
   function checknamefun(val)
   { //alert(val);
	   $.ajax({
	   type:'post',
	   url:'<?php echo base_url(); ?>/enrollment/checker',
	   data:'admission_id='+val,

	   success:function(test)
	   {
	     //alert(test);
	     if(test!='')
	     {
		   $('#name').val(test);
		   $('#name1').val(test);
		   checknamefun1(val);
		   //$("#msg").html(test);
	     }
	   else{
	   alert("Admission Number not found");
	   $("#save1").hide();
	   //$("#msg").html(test);

	   }
	   }
	   });
   }
</script>
<script type="text/javascript">
   function checknamefun1(val)
   {//alert(val);
   $.ajax({
   type:'post',
   url:'<?php echo base_url(); ?>/enrollment/checker1',
   data:'admisno='+val,

   success:function(test1)
   {
   //alert(test1);
   if(test1=="Already Enrollment Added")
   {

   $("#msg1").html(test1);
   $("#msg2").html(test1).hide();
   }
   else{
   $("#msg2").html(test1);

   }
   }
   });
   }
</script>
