<style>
    .txt {
        font-weight: 200;
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                    <div class="card">
                        <div class="content">
                            <h4 class="title">Attendance for <?php foreach($get_name_class as $rows){} echo $rows->class_name; echo "-";echo $rows->sec_name;  ?> <button onclick="history.go(-1);" class="btn btn-wd btn-default pull-right" style="margin-top:0px;">BACK</button></h4>
                            <hr>
                            <div class="fresh-datatables">
                                <table id="bootstrap-table" class="table">
                                    <thead>
                                        <th data-field="id" class="text-center" data-sortable="true">S. No</th>
                                        <th data-field="date" class="text-center" data-sortable="true">Name</th>
                                        <th data-field="year" class="text-center" data-sortable="true">Status </th>
                                    </thead>
                                    <tbody>
                                        <?php
          $i=1;
          foreach ($result as $rows) {

          ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $i;  ?>
                                                </td>
                                                <td class="text-center  txt">
                                                    <?php echo $rows->name; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php $stat=$rows->a_status;
                 if($stat=="OD"){ ?>
                                                        <button class="btn btn-info btn-fill btn-wd">OD</button>
                                                        <?php }else if($stat=="A"){ ?>
                                                            <button class="btn btn-danger btn-fill btn-wd">ABSENT</button>
                                                            <?php }
                    else if($stat=="L"){ ?>
                                                                <button class="btn btn-warning btn-fill btn-wd">LEAVE</button>
                                                                <?php }
                    else{  ?>
                                                                    <button class="btn btn-success btn-fill btn-wd">PRESENT</button>
                                                                    <?php  }
                ?>
                                                </td>
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
        </div>

    </div>
</div>
</div>
</div>

<script type="text/javascript">
   $('#bootstrap-table').DataTable();
   
    $('#attendmenu').addClass('collapse in');
    $('#atten').addClass('active');
    $('#atten2').addClass('active');
</script>
