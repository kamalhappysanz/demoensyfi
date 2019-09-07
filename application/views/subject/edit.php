<div class="main-panel">
<div class="content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Edit Subject</h4>
                           <?php if($this->session->flashdata('msg')): ?>
                             <div class="alert alert-success">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                           ×</button> <?php echo $this->session->flashdata('msg'); ?>
                   </div>

             <?php endif; ?>
                       </div>
                       <?php
                       foreach($datas as $rows){}

                          ?>
                       <div class="content">
                           <form action="<?php echo base_url(); ?>subjectadd/save_subject" method="post" enctype="multipart/form-data" id="myformsub" name="myformsub">
                               <div class="row">
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label>Subject</label>
                                           <input type="text" class="form-control"  placeholder="" name="subjectname" id="subjectname" value="<?php  echo $rows->subject_name; ?>">
                                           <input type="hidden" class="form-control"  placeholder="" name="subject_id" value="<?php  echo $rows->subject_id; ?>">

                                       </div>
                                   </div>
								                           <div class="col-md-4">
                                             <div class="form-group">
                                                 <label>Status</label>
                                                <select name="status" class="selectpicker form-control">
                        												  <option value="Active">Active</option>
                        												  <option value="Deactive">Inactive</option>
                        												</select>
                        											<script language="JavaScript">document.myformsub.status.value="<?php echo $rows->status; ?>";</script>
                                             </div>
                                           </div>
                                   <div class="col-md-4">
                                     <div class="form-group">
                                       <br>
                                        <label class="col-sm-2 control-label"></label>
                                       <label><input type="checkbox" name="is_preferred_lang" value="1" style="margin-right:10px;" <?php if ($rows->is_preferred_lang == 1) echo 'checked'; ?> >Set as second language</label>
                                       </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                   <div class="text-center">
                                         <button type="submit" class="btn btn-info btn-fill">SAVE</button>
                                    </div>
                              </div>




                               <div class="clearfix"></div>
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
  $('#mastersmenu').addClass('collapse in');
  $('#master').addClass('active');
  $('#masters4').addClass('active');



  $('#myformsub').validate({ // initialize the plugin
      rules: {
          subjectname:{required:true },
      },
      messages: {
            subjectname: "Please Enter Subject Name"
          }
  });
 });





</script>
