<style>
   .txt{
   font-weight: 200;
   }
</style>
<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="col-md-12">
            <div class="card">



                  <div class="content">
				  <h4 class="title">Monthwise Attendance for <?php foreach($get_name_class as $rows){} echo $rows->class_name; echo "-";echo $rows->sec_name;  ?> <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:0px;">BACK</button></h4>
                            <hr>
							
				                   
                     <form action="<?php echo base_url(); ?>teacherattendence/attendance_month_view" method="post" class="form-horizontal" id="select_month">
                       <fieldset>
                          <div class="form-group">
                             <label class="col-sm-2 control-label">Year</label>
                             <div class="col-sm-4">

                                <select name="year_class" class="selectpicker form-control" data-title="Select Year" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                   <?php if(empty($result_month)){}else{  foreach($result_month as $rows) {?>
                                   <option value="<?php echo $rows->showyear; ?>"><?php echo $rows->showyear; ?></option>
                                   <?php  } } ?>
                                </select>
                             </div>
                          </div>
                       </fieldset>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">Month</label>
                              <div class="col-sm-4">
                                 <input type="hidden" name="class_master_id" value="<?php echo $class_id; ?>">
                                 <select name="month_id" class="selectpicker form-control" data-title="Select Month" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                    <?php if(empty($result)){}else{  foreach($result as $rows) {?>
                                    <option value="<?php echo $rows->month_id; ?>"><?php echo $rows->showmonth; ?></option>
                                    <?php  } } ?>
                                 </select>
                              </div>
                           </div>
                        </fieldset>
                        <fieldset>
                           <div class="form-group">
                              <label class="col-sm-2 control-label">&nbsp;</label>
                              <div class="col-sm-10">
							  <input type="submit" id="save" class="btn btn-info btn-fill center"  value="VIEW">
                              
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
</div>
</div>
<script type="text/javascript">
   $('#attendmenu').addClass('collapse in');
   $('#atten').addClass('active');
   $('#atten3').addClass('active');
   $(document).ready(function () {


    $('#select_month').validate({ // initialize the plugin
        rules: {
            year_class:{required:true },
            month_id:{required:true }

        },
        messages: {
              year_class: "Please choose an option!",
              month_id: "Please choose an option!"

            }
    });
   });
</script>
