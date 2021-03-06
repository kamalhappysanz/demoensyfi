<div class="main-panel">
        <div class="content">
            <div class="col-md-12">
			<?php if($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>
                    <?php endif; ?>
            </div>
                <div class="card">
                    <div class="header">
                        <legend>Edit Timetable for <?php foreach($get_name_class as $rows){} echo $rows->class_name.'-'.$rows->sec_name; echo " (";  echo  $this->uri->segment(5); echo ") "; ?> <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:-10px;">Back</button>  </legend>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                              <?php foreach($res as $rows){} ?>
                              <form action="" method="post" class="form-horizontal" id="edit_periods" name="edit_periods">
                                 <fieldset>
                                    <div class="form-group">
                                        <input type="checkbox" class="" id="break_id"  name="is_break" value="1" <?php echo ($rows->is_break==1 ? 'checked' : '');?>>Break
                                       <label class="col-sm-2 control-label">Starting Time</label>
                                       <div class="col-sm-4 clockpicker">
                                         <input type="text" class="form-control"  name="" id="from_time"  placeholder="From Time" value="<?php echo $rows->from_time; ?>" readonly>
                                       </div>
                                    </div>
                                    <div class="form-group" >
                                       <label class="col-sm-2 control-label">Ending Time</label>
                                       <div class="col-sm-4 clockpicker">
                                         <input type="text" class="form-control"  name="to_time" id="to_time"  placeholder="To Time" value="<?php echo $rows->to_time; ?>" readonly>
                                         <input type="hidden" class="form-control"  name="table_id" id="table_id" value="<?php echo $rows->table_id; ?>" readonly>
                                       </div>
                                    </div>
                                    <div class="form-group"  style="display:<?php echo $rows->is_break==0 ? 'none':'block' ?>">
                                       <label class="col-sm-2 control-label">Break Name</label>
                                       <div class="col-sm-4 clockpicker">
                                         <input type="text" class="form-control"  name="break_name" id="break_name"  placeholder="Break Name" value="<?php echo $rows->break_name; ?>" >
                                       </div>
                                    </div>

                                      <div class="form-group" id="subject_id_tab" style="display:<?php echo $rows->is_break==1 ? 'none':'block' ?>">
                                         <label class="col-sm-2 control-label">Subject </label>
                                         <div class="col-sm-4 clockpicker">
                                          <select id="subject_id" name="subject_id" class="subject_id selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                             <option value="">Subject</option>
                                            <?php foreach($res_subject['res'] as $row_subject){ ?>
                                              <option value="<?php echo $row_subject->subject_id; ?>"><?php echo $row_subject->subject_name; ?></option>
                                           <?php } ?>
                                          </select>
                                          <script language="JavaScript">
                                              document.edit_periods.subject_id.value = "<?php echo $rows->subject_id;; ?>";
                                          </script>
                                         </div>
                                      </div>
                                      <div class="form-group" id="teacher_id_tab" style="display:<?php echo $rows->is_break==1 ? 'none':'block' ?>">
                                         <label class="col-sm-2 control-label">Teacher</label>
                                         <div class="col-sm-4 clockpicker">
                                             <select id="teacher_id" name="teacher_id" class="subject_id selectpicker form-control" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                               <option value="">Teacher</option>
                                               <?php foreach($res_teacher['res'] as $row_teacher){ ?>
                                                 <option value="<?php echo $row_teacher->teacher_id; ?>"><?php echo $row_teacher->name; ?></option>
                                              <?php } ?>

                                             </select>
                                             <script language="JavaScript"> document.edit_periods.teacher_id.value = "<?php echo $rows->teacher_id;; ?>";
                                             </script>
                                         </div>
                                      </div>
                                    <div class="form-group">
                                       <label class="col-sm-3 control-label">&nbsp;</label>
                                       <div class="col-sm-4">
                                          <button type="submit" id="save" class="btn btn-info btn-fill center">SAVE</button>
                                       </div>
                                    </div>
                                 </fieldset>
                              </form>

                            </div>
                        </div>
                    </div>
                </div>

      </div>

        <script type="text/javascript">
        $('#edit_periods').validate({ // initialize the plugin
           rules: {

           subject_id:{required:true },
           teacher_id:{required:true },

            },
            messages: {

                  subject_id:"Select Subject",
                  teacher_id:"Select Teacher",
                },

          submitHandler: function(form) {

            $.ajax({
                url: "<?php echo base_url(); ?>timetable/update_timetable_for_class",
                 type:'POST',
                data: $('#edit_periods').serialize(),
                success: function(response) {
             // alert(response);
                    if(response=="success"){
                      swal({
                       title: "Success!",
                       text: "Changes made are saved"

                     });

                    }else{
                      sweetAlert("Oops...", response, "error");
                    }
                }

            });
          }
              });
            jQuery('#timetablemenu').addClass('collapse in');
            $('#time').addClass('active');
            $('#time2').addClass('active');
            $('#break_id').on('change', function() {
                if(document.getElementById('break_id').checked) {

                    $('#subject_id_tab').hide();
                    $('#teacher_id_tab').hide();

                } else {
                    $('#subject_id_tab').show();
                    $('#teacher_id_tab').show();
                }
            });





        </script>
