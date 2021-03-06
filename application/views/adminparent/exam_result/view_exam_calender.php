<div class="main-panel">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="header">
				  <?php
				  if(empty($cresult)){ echo "Examination Calender";}else{
				  foreach ($cresult as $rows)
								 {}?>
				  <h4 class="title"><?php echo $rows->exam_name; }?></h4>
                  </div>
				  <hr>
                    <div class="content">
                     <div class="fresh-datatables">
                        <table id="bootstrap-table" class="table">
                           <thead>
                              <th>S.no</th>
                              <th>Subject</th>
                              <th>Exam Date</th>
                           </thead>
                           <tbody>
                              <?php
                                 $i=1;
                                 foreach ($cresult as $rows)
								 {
                                  ?>
                              <tr>
                                 <td><?php   echo $i; ?></td>
                                 <td><?php echo $rows->subject_name; ?></td>
                                 <td><?php $date=date_create($rows->exam_date);
                                    echo date_format($date,"d-m-Y");
                                    ?> ( <?php echo $rows->times; ?> ) </td>
                              </tr>
                              <?php $i++;  }  ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  </div>
               </div>
            </div> <!-- row -->
         </div>

      </div>
</div>
<script type="text/javascript">
   $(document).ready(function () {
   $('#examinationmenu').addClass('collapse in');
   $('#exam').addClass('active');
   $('#exam1').addClass('active');

   });

 $('#bootstrap-table').DataTable();
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
