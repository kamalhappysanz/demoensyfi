

<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="header">
                     <h4 class="title">Create Examination</h4>
                  </div>
                  <div class="content" style="padding-left:10%;">
                     <form method="post" action="<?php echo base_url(); ?>examination/create" class="form-horizontal" enctype="multipart/form-data" id="myformsection">
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Academic year <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <select name="exam_year" required class="selectpicker" data-title="Select From & To Year" data-menu-style="dropdown-blue">
                                    <?php
                                       foreach ($years as $rows1)
                                       {
                                         $fyear=$rows1->from_month;
                                          $month= strtotime($fyear);

                                       $eyear=$rows1->to_month;
                                       $month1= strtotime($eyear);
                                         ?>
                                    <option value="<?php echo $rows1->year_id; ?>"><?php  echo  date('Y',$month); ?> (To) <?php  echo  date('Y',$month1); ?></option>
                                    <?php } ?>
                                 </select>
                                 <!--<input type="text" name="exam_year" class="form-control datepicker" id="yexam" placeholder="Enter Exam Year" required value="">-->
                              </div>
							  <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Exam Name <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="exam_name" class="form-control" placeholder="Enter Exam Name" required value="" maxlength="30">
                              </div>
							   <div class="col-sm-6"></div>
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
                              </div>
							  <div class="col-sm-6"></div>
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
                              </div>
							  <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <select name="status"  class="selectpicker form-control">
                                    <option value="Active">Active</option>
                                    <option value="Deactive">Inactive</option>
                                 </select>
                              </div>
							  <div class="col-sm-6"></div>
                           </div>
                        </fieldset>
                        <fieldset>
                           <div class="form-group">
						   <label class="col-sm-2 control-label"></label>
                              <div class="col-sm-4">
								<input type="submit" id="save" class="btn btn-info btn-fill center" value="CREATE">
                              
                              </div>
							  <div class="col-sm-6"></div>

                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php if($this->session->flashdata('msg')): ?>
      <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
         ×</button> <?php echo $this->session->flashdata('msg'); ?>
      </div>
      <?php endif; ?>
      <div class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="content">
                       <h4 class="title">List of Examinations</h4><br>
                        <div class="fresh-datatables">
                           <table id="bootstrap-table" class="table">
                              <thead>
                                 <th>S.no</th>
                                 <th>Academic Year</th>
                                 <th>Exam Name</th>
								 <th>Grade Option</th>
                                 <th>Status</th>
                                 <th>Actions</th>
                              </thead>
                              <tbody>
                                 <?php
                                    $i=1;
                                    foreach ($result as $rows) {
                                    $status=$rows->status;
                                    $fyear=$rows->from_month;
                                    $month= strtotime($fyear);

                                    $eyear=$rows->to_month;
                                    $month1= strtotime($eyear);
                                    ?>
                                 <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php  echo  date('Y',$month); ?> (To) <?php  echo  date('Y',$month1); ?></td>
									
                                    <td><?php echo $rows->exam_name; ?></td>
									 <td><?php if($rows->grade_flag=='1'){ ?>
                                      <i class="fa fa-check" aria-hidden="true"></i>
                                  <?php   }else{ ?>

                                    <?php  } ?></td>
                                    <td><?php if($status=='Active'){?>
                                       <button class="btn btn-success btn-fill btn-wd">Active</button>
                                       <?php }else{?>
                                       <button class="btn btn-danger btn-fill btn-wd">Inactive</button>
                                       <?php } ?>
                                    </td>
                                    <td>
                                       <a href="<?php echo base_url();  ?>examination/edit_exam/<?php echo $rows->exam_id; ?>" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-edit"></i></a>
                                    </td>
                                 </tr>
                                 <?php $i++;  }  ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- end content-->
                  </div>
                  <!--  end card  -->
               </div>
               <!-- end col-md-12 -->
            </div>
            <!-- end row -->
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
 $('#bootstrap-table').DataTable();
   $().ready(function(){
     $('#exammenu').addClass('collapse in');
     $('#exam').addClass('active');
     $('#exam1').addClass('active');

     $('.datepicker').datetimepicker({
       format: 'YYYY',
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
