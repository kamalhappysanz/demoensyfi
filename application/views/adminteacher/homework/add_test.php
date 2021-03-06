<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <?php if($this->session->flashdata('msg')): ?>
         <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×</button> <?php echo $this->session->flashdata('msg'); ?>
         </div>
         <?php endif; ?>
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="header">
				  <?php if(empty($result))
                        {
                        	echo "<p style=color:red;text-align:center;>No Student Added For This Class</p>";
                        }else{
                        	foreach($result as $res)
                             {
                        	$sub=$res->subject_name;
                        	$cls=$res->class_name;
                        	$sec=$res->sec_name;
                        	}?>
                    <h4 class="title">Enter Marks For<?php echo $cls; ?> - <?php echo $sec; ?>
                     <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" >BACK</button></h4>
                      <p class="category"><b>Subject </b> - <?php echo $sub; ?></p>
                  </div>
                     
                  <div class="content">
                     <table class="table">
                        <thead>
                           <th style="font-size:15px;font-weight:bold;width:10%">S.No</th>
                           <th style="font-size:15px;font-weight:bold;width:40%">Name</th>
                           <th style="font-size:15px;font-weight:bold;width:25%">Marks</th>
                           <th style="font-size:15px;font-weight:bold;width:25%">Comments</th>
                        </thead>
                        <form method="post" action="<?php echo base_url(); ?>homework/marks" class="form-horizontal" enctype="multipart/form-data" id="markform">
                           <tbody>
                              <?php $i=1;
                                 foreach($result as $res)
                                 {
                                 	$sub=$res->subject_name;
                                 	$enr_id=$res->enroll_id;
                                 ?>
                              <tr>
                                 <td><?php echo $i; ?></td>
                                 <td><?php echo $res->name; ?>
                                    <input type="hidden" name="name" value="<?php echo $res->name; ?>"/>
                                    <input type="hidden" name="enroll[]" value="<?php echo $res->enroll_id; ?>"/>
                                    <input type="hidden" name="hwid" value="<?php echo $res->hw_id; ?>"/>
                                 </td>
                                 <td style="width:20%;">
                                    <input type="text" required name="marks[]" value class="form-control"/>
                                 </td>
                                 <td> <textarea required name="remarks[]" MaxLength="150" placeholder="Maximum 150 characters" class="form-control" rows="1" cols="03"></textarea></td>
                                 <td></td>
                              </tr>
                              <?php $i++;  } ?>
                              <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td><button type="submit" id="save" class="btn btn-info btn-fill" style="cursor:pointer;float:right;">SAVE</button></td>
                              </tr><?php }?>
                           </tbody>
                        </form>
                     </table>
                  </div>
               </div>
            </div>
            <!-- end col-md-12 -->
         </div>
         <!-- end row -->
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
     $('#homeworkmenu').addClass('collapse in');
     $('#home').addClass('active');
     $('#home1').addClass('active');
    $('#myformsection').validate({ // initialize the plugin
        rules: {
            marks:{required:true },
			remarks:{required:true }
        },
        messages: {
               marks: "Please Enter The Marks",
   			remarks: "Please Enter The ReMarks"
            }
    });
   });
   
   var $table = $('#bootstrap-table');
         $().ready(function(){
             $table.bootstrapTable({
                 toolbar: ".toolbar",
                 clickToSelect: true,
                 showRefresh: true,
                 search: true,
                 showToggle: true,
                 showColumns: true,
                 pagination: true,
                 searchAlign: 'left',
                 pageSize: 8,
                 clickToSelect: false,
                 pageList: [8,10,25,50,100],
   
                 formatShowingRows: function(pageFrom, pageTo, totalRows){
                     //do nothing here, we don't want to show the text "showing x of y from..."
                 },
                 formatRecordsPerPage: function(pageNumber){
                     return pageNumber + " rows visible";
                 },
                 icons: {
                     refresh: 'fa fa-refresh',
                     toggle: 'fa fa-th-list',
                     columns: 'fa fa-columns',
                     detailOpen: 'fa fa-plus-circle',
                     detailClose: 'fa fa-minus-circle'
                 }
             });
   
             //activate the tooltips after the data table is initialized
             $('[rel="tooltip"]').tooltip();
   
             $(window).resize(function () {
                 $table.bootstrapTable('resetView');
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

