<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-10">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Edit Student On Duty Form</h4>
                       </div>
						<?php foreach($editstu as $res){}	?>
                       <div class="content">
                                 <form method="post" action="<?php echo base_url(); ?>teacheronduty/update_stu_onduty_list" class="form-horizontal" enctype="multipart/form-data" id="ondutysection" name="ondutysection">
                            <?php foreach($clsstudlist as $rows){} ?>
							 <input type="hidden" name="cls_tea_id" value="<?php echo $rows->class_id; ?>" class="form-control">
                        
						<fieldset>
                           <div class="form-group">
						    <label class="col-sm-2 control-label">Student <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
							     <select name="stu_userid" class="selectpicker form-control">
								 <?php foreach($clsstudlist as $rows){?>
									<option value="<?php echo $rows->user_id; ?>"><?php echo $rows->name; ?></option>
								 <?php } ?>
								  </select>
								  <script language="JavaScript">document.ondutysection.stu_userid.value="<?php echo $res->user_id; ?>";</script>
                              </div>  
                              <label class="col-sm-2 control-label">Reason <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
							   <input type="text" name="reason" value="<?php echo $res->od_for; ?>" class="form-control" maxlength="30">
							    <input type="hidden" name="id" value="<?php echo $res->id; ?>" class="form-control">
                              </div>
                           </div>
                        </fieldset>
						
						 <fieldset>
                           <div class="form-group">
						   <label class="col-sm-2 control-label">From <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="fdate"  class="form-control datepicker" value="<?php $dateTime=new DateTime($res->from_date); $fdate=date_format($dateTime,'d-m-Y' ); echo $fdate; ?>">
                              </div>
                              <label class="col-sm-2 control-label">To <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="tdate" class="form-control datepicker" value="<?php $dateTime=new DateTime($res->to_date); $tdate=date_format($dateTime,'d-m-Y' ); echo $tdate; ?>">
                              </div>
                           </div>
                        </fieldset>
						
						 <fieldset>
                           <div class="form-group">
						   <label class="col-sm-2 control-label">Notes <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <textarea rows="4" cols="80" MaxLength="250" placeholder="maximum 250 characters" name="notes" class="form-control"><?php echo $res->notes; ?></textarea>
                              </div>
							   <div class="col-sm-6"></div>
						   </div>
                        </fieldset>
						
						<fieldset>
                           <div class="form-group">
						   <label class="col-sm-2 control-label"></label>
                              <div class="col-sm-4">
                                <input type="submit" id="save" class="btn btn-info btn-fill center" value="SAVE">
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

</div>

</div>

<script type="text/javascript">
      $().ready(function(){
    $('#ondutymenu').addClass('collapse in');
   $('#stuonduty').addClass('active');
   $('#onduty1').addClass('active'); 
		
		 $('#ondutysection').validate({ // initialize the plugin
        rules: {
			stu_userid:{required:true },
            reason:{required:true },
			notes:{required:true },
			fdate:{required:true },
			tdate:{required:true },
			status:{required:true }
        },
        messages: {
				stu_userid:"Please choose an option!",
               reason: "This field cannot be empty!",
			   notes: "This field cannot be empty!",
			   fdate: "Please choose an option!",
			   tdate: "Please choose an option!",
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
       });
      });
  </script>
