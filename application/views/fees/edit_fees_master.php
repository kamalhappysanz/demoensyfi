
<div class="main-panel">
<div class="content">
<div class="col-md-12">

                        <div class="card">
						<div class="header">
                           <h4 class="title">Edit Fees Master
			<a href="<?php echo base_url(); ?>feesstructure/view_fees_master" class="btn btn-wd btn-default pull-right">BACK</a>
			<hr>
		 </h4>
		 </div>
                            <?php if($this->session->flashdata('msg')): ?>
                              <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button> <?php echo $this->session->flashdata('msg'); ?>
                     </div>

                     <?php endif;
                            foreach($edit as $rows ){} ?>

                            <div class="content">
                                <form method="post" action="<?php echo base_url(); ?>feesstructure/update_fees_master" class="form-horizontal" enctype="multipart/form-data" id="feesform" name="feesform">

                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Academic Year <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                              <input type="hidden" name="id"  value="<?php  echo $rows->id; ?>">
                                                <input type="hidden" name="year_id"  value="<?php  echo $rows->year_id; ?>">
                                                <input type="text" name="year_name"  class="form-control" value="<?php echo date('Y', strtotime($rows->from_month));  echo "-"; echo date('Y', strtotime( $rows->to_month));  ?>" readonly="">

                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group">
                                          <label class="col-sm-4 control-label">Term <span class="mandatory_field">*</span></label>
                                          <div class="col-sm-4">
										                         <select name="terms"   class="selectpicker form-control"  >
                                                    <?php foreach ($terms as $row) {  ?>
                                                <option value="<?php echo $row->term_id; ?>"><?php echo $row->term_name; ?></option>
                                              <?php      } ?>
                                              </select>
												                    <script language="JavaScript">document.feesform.terms.value="<?php echo $rows->term_id; ?>";</script>
                                          </div>

                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Class <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                               <select name="class_name" disabled class="selectpicker" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                              <option value="<?php  echo $rows->class_master_id; ?>"><?php  echo $rows->class_name; ?> - <?php  echo $rows->sec_name; ?></option>
                                          </select>
										                             <input type="hidden" name="class_id"  value="<?php  echo $rows->class_master_id; ?>">
                                            </div>

                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Fees <span class="mandatory_field">*</span></label>
                      						      	  <div class="col-sm-4">
                      				                <input type="text" name="fees_amount"  value="<?php echo $rows->fees_amount;?>" class="form-control" placeholder="Enter Fees Amount"/>
                      											  </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Quota <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
												                    <select name="quota_name"  class="selectpicker form-control"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                <?php foreach ($quota as $row1) {  ?>
                                                <option value="<?php echo $row1->id; ?>"><?php echo $row1->quota_name; ?></option>
                                               <?php } ?>
                                              </select>
											                       <script language="JavaScript">document.feesform.quota_name.value="<?php echo $rows->quota_id; ?>";</script>
                                            </div>

                                        </div>
                                    </fieldset>
									                  <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Issue Date <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="due_date_from" value="<?php $date=date_create($rows->due_date_from);
                                                        echo date_format($date,"d-m-Y");?>"  class="form-control datepicker" placeholder="Issue date"/>
                                            </div>
                                        </div>
                                    </fieldset>
									                 <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Due Date <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" name="due_date_to" value="<?php $date=date_create($rows->due_date_to);
                                                 echo date_format($date,"d-m-Y");?>" class="form-control datepicker" placeholder="Due date"/>
                                            </div>

                                        </div>
                                    </fieldset>

									               <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Notes <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                              <textarea name="notes" MaxLength="250" placeholder="MaxCharacters 250" class="form-control" rows="4" cols="80"><?php echo $rows->notes; ?></textarea>
                                            </div>
                                        </div>
                                    </fieldset>

						                            <fieldset>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Status <span class="mandatory_field">*</span></label>
                                            <div class="col-sm-4">
                                              <select name="status" class="selectpicker form-control"  data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                                  <option value="Active">Active</option>
                                                    <option value="Deactive">Inactive</option>
                                              </select>
											                          <script language="JavaScript">document.feesform.status.value="<?php echo $rows->status; ?>";</script>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="form-group">
                                            <!-- <label class="col-sm-4 control-label">&nbsp;</label> -->
                                            <div class="text-center">
												<input type="submit" id="save1" class="btn btn-info btn-fill center"  value="SAVE">
                                              
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>  <!-- end card -->

                    </div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
$('#feesmenu').addClass('collapse in');
        $('#payment').addClass('active');
        $('#fees').addClass('active');
 $('#feesform').validate({ // initialize the plugin
     rules: {
         year_id:{required:true},
		     year_name:{required:true},
         terms:{required:true},
         class_name:{required:true },
         quota_name:{required:true },
         fees_amount:{required:true },
         due_date_from:{required:true },
         due_date_to:{required:true },
		     notes:{required:true },
         status:{required:true }

     },
     messages: {
           year_id:"Please choose an option!",
			year_name:"Please choose an option!",
			terms: "Please choose an option!",
			class_name: "Please choose an option!",
			quota_name: "Please choose an option!",
			fees_amount: "This field cannot be empty!",
			due_date_from: "Please choose an option!",
			due_date_to: "Please choose an option!",
			notes: "This field cannot be empty!",
			status: "Please choose an option!"

         }
 });
});

</script>

<script type="text/javascript">
      $().ready(function(){

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
