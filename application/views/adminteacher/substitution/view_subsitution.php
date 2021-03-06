

<div class="main-panel">

      <div class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="card">
                     <div class="content">
                       <h4 class="title">List of Substitution</h4><hr>
                        <div class="fresh-datatables">
                           <table id="bootstrap-table" class="table">
                              <thead>
                                 <th>S.no</th>
                                 <th>Class</th>
                                 <th>Substituted by</th>
                                 <th>Period</th>
                                 <th>Substitution Date</th>
                                 <th>Status</th>
                              </thead>
                              <tbody>
                                 <?php
                                    $i=1;
                                    foreach ($substitution as $rows) { $stu=$rows->status;
                                     ?>
                                 <tr>
                                    <td><?php  echo $i; ?></td>
                                    <td><?php  echo $rows->class_name; ?> - <?php  echo $rows->sec_name; ?> </td>
                                    <td><?php  echo $rows->name; ?></td>
                                    <td><?php  echo $rows->period_id; ?></td>
                                    <td><?php $dateTime=new DateTime($rows->sub_date); $tdate=date_format($dateTime,'d-m-Y' ); echo $tdate; ?></td>

									<td><?php
									  if($stu=='Active'){?>
									   <button class="btn btn-success btn-fill btn-wd">Active</button>
									 <?php  }else{?>
									  <button class="btn btn-danger btn-fill btn-wd">De-Active</button>
									  <?php } ?></td>

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
   /* $('#mastersmenu').addClass('collapse in');
   $('#master').addClass('active');
   $('#masters2').addClass('active'); */
    $('#specialclasssection').validate({ // initialize the plugin
        rules: {
            class_name:{required:true },
			teacher:{required:true },
			sub_topic:{required:true },
			spe_date:{required:true },
			stime:{required:true },
			etime:{required:true },
			status:{required:true },

        },
        messages: {
              class_name: "Select Class",
			   teacher: "Select Teacher",
			   sub_topic: "Enter Subject Topic",
			   spe_date: "Select Date",
			   stime: "Select Start Time",
			   etime: "Select End Time",
			   status: "Select Status",


            }
    });
	demo.initFormExtendedDatetimepickers();
   });

    $('#bootstrap-table').DataTable();

 function checksubject(cid) {
  //alert(cid);//exit;
$.ajax({
	type: 'post',
	url: '<?php echo base_url(); ?>specialclass/checker',
	data: {
		classid:cid
	},
	dataType: "JSON",
	//cache: false,
	success: function(test1) {
		//var test=test1.status;
		//alert(test);
		 if (test1.status=='Success') {
			   var sub = test1.subject_name;
			   //alert(sub.length);
			   var sub_id=test1.subject_id;
			   var len=sub.length;
			   //alert(len);
			   var i;
			   var name='';
			   for (i = 0; i < len; i++) {
				//$("#child_selection").append("<option value=""+array_list[i].value+"">"+array_list[i].display+"</option>");
				   name +='<option value="'+sub_id[i]+'">'+sub[i]+'</option>';
				  $("#ajaxres").html(name);
			   }
		   } else {
			    //$('#msg').html('<span style="color:red;text-align:center;">Subject Not Found</p>');
				$("#ajaxres").html('');
				alert("Error");
		   }
	}
});
}
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
