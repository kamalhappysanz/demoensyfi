<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-10">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Update Circular Master</h4>

                       </div>
						<?php foreach($result as $res){ }	?>
                       <div class="content">
                       <form method="post" action="<?php echo base_url(); ?>circular/update_circular_master" class="form-horizontal" enctype="multipart/form-data" id="circularmaster" name="circularmaster">
                        <fieldset>
                           <div class="form-group">
								<input type="hidden" name="year_id"  value="<?php  echo $res->academic_year_id; ?>">
								<input type="hidden" name="cid"  value="<?php  echo $res->id; ?>">


                              <label class="col-sm-2 control-label">Title <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                 <input type="text" name="ctitle"  value="<?php echo $res->circular_title;?>" required class="form-control" maxlength="30"  />
                                 <input type="hidden" name="old_circular_doc"  value="<?php echo $res->circular_doc;?>" required class="form-control"  />
							</div>
							<div class="col-sm-6"></div>
                           </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Circular Document</label>
                                <div class="col-sm-4">
                                  <input type="file" name="circular_doc"  class="form-control" />
                                </div>
								<div class="col-sm-6"></div>
                            </div>
                        </fieldset>
						 <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label"> Description <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                <textarea name="cdescription" MaxLength="500" placeholder="Maximum 500 characters" rows="4" cols="80" id="cdescription" class="form-control"><?php echo $res->circular_description;?> </textarea>
                              </div>
							<div class="col-sm-6"></div>
                           </div>
                        </fieldset>

						<fieldset>
                           <div class="form-group">
								<label class="col-sm-2 control-label">Status <span class="mandatory_field">*</span></label>
                              <div class="col-sm-4">
                                <select name="status"  class="selectpicker form-control" >
								  <option value="Active">Active</option>
								  <option value="Deactive">Inactive</option>
							  </select>
							    <script language="JavaScript">document.circularmaster.status.value="<?php echo $res->status; ?>";</script>
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
        $('#communcicationmenu').addClass('collapse in');
        $('#communication').addClass('active');
        $('#communication3').addClass('active');

		 $('#circularmaster').validate({ // initialize the plugin
        rules: {
            ctype:{required:true },
			ctitle:{required:true },
			cdescription:{required:true },
			status:{required:true },

        },
        messages: {
               ctype: "This field cannot be empty!",
			   ctitle: "This field cannot be empty!",
			   cdescription:"This field cannot be empty!",
			   status: "Please choose an option!",
            }
    });


      });
  </script>
