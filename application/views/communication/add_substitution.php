<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="header">
                     <legend>Substitute Teacher</legend>
                  </div>
                  <div class="content">
                     <form method="post" action="<?php echo base_url(); ?>communication/create_substition" class="form-horizontal" enctype="multipart/form-data" id="myformsection" name="myformsection">
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Class <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <select class="selectpicker form-control" data-title="Select Class" name="sub_cls" >
                                    <?php
                                       if(empty($class_id)){   ?>
                                    <div class="col-md-2">
                                       <p>No Records Found</p>
                                    </div>
                                    <?php }else{ ?>
                                    <?php   $cnt= count($class_id);
                                       for($i=0;$i<$cnt;$i++){ ?>
                                    <option value="<?php echo $class_id[$i]; ?>"><?php echo $class_name[$i]."-".$sec_name[$i]; ?></option>
                                    <?php }}?>
                                 </select>
                              </div>
                              <input type="hidden" name="teacher_id" value="<?php echo $teacher_id;?>">
							  <input type="hidden" name="tname" value="<?php echo $teaname;?>">
							    <input type="hidden" name="num" value="<?php echo $cell;?>">
                              <input type="hidden" name="leave_id" value="<?php echo $leave_id;?>">
                              <label class="col-sm-2 control-label">Date <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="leave_date"  value="<?php $dateTime = new DateTime($from_leave_date);$fdate=date_format($dateTime,'d-m-Y' );echo $fdate;  ?>" class="form-control datepicker">
                              </div>
                           </div>
                        </fieldset>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Teacher <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <select class="selectpicker form-control" data-title="Select Teacher" name="sub_teacher" id="subteacher" onChange="get_teacher_name()">
                                    <?php foreach($teachers as $tec){ ?>
                                    <option value="<?php echo $tec->teacher_id; ?> - <?php echo $tec->name; ?>"><?php echo $tec->name; ?></option>
                                    <?php }?>
                                 </select>
                              </div>
                              <label class="col-sm-2 control-label">Period <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <select name="period_id" class="selectpicker form-control" data-title="Select Period">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                 </select>
                              </div>
                           </div>
                        </fieldset>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <select name="status"  class="selectpicker form-control" data-title="Status" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                    <option value="Active">Active</option>
                                    <option value="De-Active">Inactive</option>
                                 </select>
                              </div>
                              <label class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-4">
							  <input type="submit" id="save" class="btn btn-info btn-fill center" value="SUBSTITUTE" style="width:180px;">

                              </div>
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
				   <div class="header">
                     <legend>List Substitutes</legend>
                  </div>
                     <div class="content">
                        <div class="fresh-datatables">
                           <table id="example" class="table">
                              <thead>
                                 <th>S.no</th>
                                 <th>Teacher</th>
                                 <th>Date</th>
                                 <th>Class</th>
                                 <th>Period</th>
								 <th>Status</th>
                                 <th>Actions</th>
                              </thead>
                              <tbody>
                                 <?php
                                    $i=1;
                                    foreach ($view as $rows) {
                                    //echo $rows->id;
                                     ?>
                                 <tr>
                                    <td><?php  echo $i; ?></td>
                                    <td><?php  echo $rows->name;?></td>
                                    <td><?php   $date=date_create($rows->sub_date);
                                       echo date_format($date,"d-m-Y"); ?></td>
                                    <?php
                                      $cn=$rows->class_name;$sn=$rows->sec_name; $stu=$rows->status;?>
                                    <td><?php  echo $cn; ?> <?php  echo $sn; ?></td>
                                    <td><?php  echo $rows->period_id; ?></td>
									<td><?php
                                       if($stu=='Active'){?>
                                       <button class="btn btn-success btn-fill btn-wd">Active</button>
                                       <?php  }else{?>
                                       <button class="btn btn-danger btn-fill btn-wd">Inactive</button><?php }
                                          ?>
                                    </td>
                                    <td>
                                       <a href="<?php echo base_url();?>communication/sub_edit?v=<?php echo $rows->id; ?>&v1=<?php echo $teacher_id; ?>&v3=<?php echo $leave_id; ?>" title="Edit Details" rel="tooltip" class="btn btn-simple btn-warning btn-icon edit" style="font-size:20px;"><i class="fa fa-edit" aria-hidden="true"></i>
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
   $(document).ready(function() {
     $('#teachermenu').addClass('collapse in');
     $('#teacher').addClass('active');
     $('#teacher3').addClass('active');
	 
		$('#myformsection').validate({ // initialize the plugin
		   rules: {
			 sub_cls:{required:true },
			   leave_date:{required:true },
			   sub_teacher:{required:true },
				 period_id:{required:true },
				 status:{required:true },
			},
			messages: {
				  sub_cls:"Please choose an option!",
				  leave_date:"This field cannot be empty!",
				  sub_teacher:"Please choose an option!",
				  period_id:"Please choose an option!",
				  status:"Please choose an option!",
				}
		});
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


  $('#example').DataTable({
            dom: 'lBfrtip',
            buttons: [
                 {
                     extend: 'excelHtml5',
                     exportOptions: {
                     columns: ':visible'
                     }
                 },
                 {
                     extend: 'pdfHtml5',
                     exportOptions: {
                     columns: ':visible'
                     }
                 }
             ],
             "pagingType": "full_numbers",
			 "ordering": false,
             "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
             responsive: true,
             language: {
				 search: "_INPUT_",
				 searchPlaceholder: "Search Staffs",
             },
			 "bAutoWidth": false,
			"columns": [
					{ "width": "7%" },
					{ "width": "35%%" },
					{ "width": "15%%" },
					{ "width": "15%" },
					{ "width": "10%" },
					{ "width": "10%" },
					{ "width": "8%" }
				  ]
         }); 



</script>
