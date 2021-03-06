<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Teacher On Duty Application</h4>
                       </div>
                       <hr>
						<?php foreach($edit as $res){}	?>
                       <div class="content">
                                 <form method="post" class="form-horizontal" enctype="multipart/form-data" id="ondutysection" name="ondutysection">

                        <fieldset>
                           <div class="form-group">
						   <label class="col-sm-2 control-label">Teacher</label>
                              <div class="col-sm-4">
                                 <input type="text" name="tname" readonly class="form-control" value="<?php echo $res->name; ?>">
                              </div>

                              <label class="col-sm-2 control-label">Reason</label>
                              <div class="col-sm-4">
							   <input type="text" name="reason" readonly value="<?php echo $res->od_for; ?>" class="form-control">
                              </div>


                           </div>
                        </fieldset>
						 <fieldset>
                           <div class="form-group">
						   <label class="col-sm-2 control-label">From</label>
                              <div class="col-sm-4">
                                 <input type="text" name="fdate"  readonly class="form-control datepicker" value="<?php $dateTime=new DateTime($res->from_date); $fdate=date_format($dateTime,'d-m-Y' ); echo $fdate; ?>">
                              </div>

                              <label class="col-sm-2 control-label">To</label>
                              <div class="col-sm-4">
                                 <input type="text" name="tdate" readonly class="form-control datepicker" value="<?php $dateTime=new DateTime($res->to_date); $tdate=date_format($dateTime,'d-m-Y' ); echo $tdate; ?>">
                              </div>

                           </div>
                        </fieldset>
						 <fieldset>
                           <div class="form-group">
                               <label class="col-sm-2 control-label">Notes</label>
                              <div class="col-sm-4">
                                 <textarea rows="4" cols="80" readonly name="notes" class="form-control"><?php echo $res->notes; ?></textarea>
                              </div>
                              <label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <select class="form-control" name="status" id="choose" >
												<option value="Pending">Pending</option>
												<option value="Approved">Approved</option>
												<option value="Denied">Denied</option>

								</select>
								<script language="JavaScript">document.ondutysection.status.value="<?php echo $res->status; ?>";</script>
                           </div>
                        </fieldset>

                        <div class="form-group">
                           <!-- <label class="col-sm-2 control-label">&nbsp;</label> -->
                           <div class="text-center">
						   <input type="hidden" name="id" value="<?php echo $res->id; ?>" class="form-control">
							<input type="submit" id="save" class="btn btn-info btn-fill center" style="cursor:pointer;" value="SAVE">
                          
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
 $().ready(function(){
        $('#ondutydetails').addClass('collapse in');
        $('#ondutydetails').addClass('active');
        $('#onduty1').addClass('active');


	$('#ondutysection').validate({ // initialize the plugin
		rules: {
			status:{required:true }
		 },
		messages: {
			status:"Select Status"
			  },

   submitHandler: function(form) {
   swal({
           title: "Are you sure?",
           text: "You Want Confirm this form",
           type: "success",
           showCancelButton: true,
           confirmButtonColor: '#DD6B55',
           confirmButtonText: 'Yes',
           cancelButtonText: "No",
           closeOnConfirm: false,
           closeOnCancel: false
     },
     function(isConfirm) {
        if (isConfirm) {
			$.ajax({
				 url: "<?php echo base_url(); ?>onduty/update_onduty",
				 type:'POST',
				 data: $('#ondutysection').serialize(),
				 success: function(response) {
					 //alert (response);
				if(response=="success")
				{
					swal({
						 title: "Done!",
						 text: "Status Updated!",
						 type: "success"
					  },
					function(){
					 window.location = "<?php echo base_url(); ?>onduty/teachers";
					});
				}else{
					sweetAlert("Oops...", "Something went wrong!", "error");
				}
         }
     });
   }else{
       swal("Cancelled", "Process Cancel :)", "error");
   }
   });
   }
  });
  
  
		 /* $('#ondutysection').validate({ // initialize the plugin
        rules: {
           reason:{required:true },
			notes:{required:true },
			fdate:{required:true },
			tdate:{required:true },
			status:{required:true }

        },
        messages: {
				reason: "Enter Reason",
			   notes: "Enter Notes",
			   fdate: "Select From Date",
			   tdate: "Select To Date",
			   status: "Select Status",


            }
    });
	//demo.initFormExtendedDatetimepickers();

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
       }); */
});
  </script>
