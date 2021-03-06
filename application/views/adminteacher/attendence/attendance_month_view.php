<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="col-md-12">
      
               <div class="card">
                  <div class="content">
                 <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:10px;">BACK</button>
                     <h4 class="title">Monthwise Attendance for <?php foreach($get_name_class as $rows){} echo $rows->class_name; echo "-";echo $rows->sec_name;  ?></h4>
					 <br>
					  <hr>
                     <div class="fresh-datatables">
					
                        <table id="bootstrap-table" class="table">
                           <thead>
                              <th data-field="id" class="text-center"  data-sortable="true">S.No</th>
                              <th data-field="date" data-sortable="true">Name</th>
                              <th data-field="month" class="text-center" data-sortable="true">Month</th>
                              <th data-field="year" class="text-center" data-sortable="true">Days Not Present </th>
                              <th data-field="pp" class="text-center" data-sortable="true">Days Present </th>
                              <th data-field="check" class="text-center" data-sortable="true">View Leave Dates</th>
                           </thead>
                              <p>Total Working Days
                           <?php if($res_total['status']=="success"){echo $wrk= $res_total['result']; }else{echo "No data"; } ?>
                           </p>
                           <tbody>
                              <?php
                                 $i=1;
                                 foreach ($res as $rows) {

                                 ?>
                              <tr>
                                 <td class="text-center"><?php echo $i;  ?></td>
                                 <td  ><?php echo $rows->name; ?></td>
                                  <td class="text-center  txt" ><?php  echo date("F", strtotime('00-'.$month.'-01')); ?></td>
                                 <td class="text-center"><?php echo $ab=$rows->leaves; ?></td>
                                  <td class="text-center"><?php echo $pp=$wrk-$ab; ?></td>

                                  <td class="text-center">
                                    <input type="hidden" name="month_id" id="month_id" value="<?php echo $month;  ?>">
                                    <input type="hidden" name="year_id" id="year_id" value="<?php echo $year;  ?>">

                                    <button onclick="list_dates(<?php echo $rows->enroll_id;   ?>)" value="">View</button> </td>
                              </tr>
                              <?php $i++;  }  ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- end content-->
               </div>
               <!--  end card  -->
               </tbody>
               </table>

         </div>
                 <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Days Not Present</h4>
              </div>
              <div class="modal-body">
              <table id="bootstrap-table" class="table">
                 <thead>
                <tr>
                  <th>Date</th><th>Status</th>
                </tr>
              </thead>
              <tbody id="leavesdates12">

              </tbody>
              </table>
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
function list_dates(student_id){
  //alert("hi");
  var month_id=$("#month_id").val();
  var year_id=$("#year_id").val();
  var student_id=student_id;
//  alert(student_id);
  $.ajax({
    type: 'POST',
    url: '<?php  echo base_url(); ?>teacherattendence/view_dates_id',
    data: {month_id: month_id, year_id: year_id,student_id:student_id},
    dataType: "JSON",
    cache: false,
    success: function(response) {
//alert(response)
     $("#leavesdates12").empty();
      $('#myModal').modal('show');
       var res=response.res;
       var stat=response.status;
       var len=res.length;

        if(stat=="success"){
          for (i = 0; i < len; i++) {
          var markup = "<tr><td>" + res[i].abs_date + "</td><td>" + res[i].a_status + "</td></tr>";
          $("#leavesdates12").append(markup);
          }
        }else if(stat=="nodata"){
          $("#leavesdates12").empty();
          var markup = "<tr><td>No Record</td><td>No Record</td></tr>";
          $("#leavesdates12").append(markup);
        }
        else{
          var markup = "no data";
          $("#leavesdates12").append(markup);
        }
    }
});
}


   $('#bootstrap-table').DataTable();
         $('#attendmenu').addClass('collapse in');
         $('#atten').addClass('active');
         $('#atten3').addClass('active');
</script>
