<style>
   .fc-scroller{
   overflow-x: hidden;
   overflow-y: hidden;
   }

   .fc-ltr .fc-basic-view .fc-day-number{text-align: center;}
   .fc-today-button,.fc-month-button,.fc-basicWeek-button,.fc-basicDay-button{display:none;}
   .fc-month-button{display: none;}


.imgstyle{padding-bottom: 10px;}
ul li a img:active {
    background-color: yellow;
}
.test{padding-top: 15px;text-align: center;padding-left:0px}
.name{padding-left:15px;
font-size:25px;
font-weight: bold;}
 .plusicon
   {
	  display:inline-block;float:right;
   }
   .design{
	 color: white;
    font-size:30px;
   }
   .setcolor{
    background-color: #323546;
   }
   .rem{color:white;font-size:18px;text-transform: capitalize;}
   .title1{font-size:18px;}
</style>
<div class="main-panel">
<div class="content">
<div class="container-fluid">


  <div class="card">
    <div class="row">
       <?php    foreach ($user_details as $rows) { $relationship=$rows->relationship;  } ?>
            <div class="col-md-4 text-center">
                <div class="profile_detail ">
                      <?php if(empty($rows->user_pic)){ ?>
                    <img src="<?php echo base_url(); ?>assets/noimg.png" class="img-circle  " style="width:125px;"/>
                   <?php  }else{  ?>
                  <img src="<?php echo base_url(); ?>assets/parents/profile/<?php echo $rows->user_pic; ?>" class="img-circle" style="width:125px;">
                <?php } ?>


                <br>
                  <p class=""> <?php echo $rows->name; ?> </p>

                </div>
            </div>
        <div class="col-md-4">
          <div  class="textborder"></div>
            <div class="other_details">
            <br>
              <p><b>Relationship</b> - <?php echo $relationship; ?> </p>
              <p><b>Mobile Number</b> - <?php echo  $rows->mobile; ?> </p>
              <p><b>Email ID</b> - <?php echo  $rows->email; ?> </p>
            </div>
        </div>
        <div class="col-md-4">
          <div  class="textborder"></div>
            <div class="other_details">
                <br>
              <h4 class="title">Children</h4>
              <?php foreach($stud_details as $rows_studen){ ?>
                <p class="">Name  : <b><?php  echo $rows_studen->name; ?></b> &nbsp; <span>Class  : <b><?php echo  $rows_studen->class_name; ?>-<?php echo $rows_studen->sec_name; ?></b> </span></p>
            <?php   } ?>


            </div>
        </div>
    </div>
  </div>






         <div class="col-md-12">
		 <div class="col-md-6">
            <div class="card">
               <div id="fullCalendar"></div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card ">
               <div class="header" style="background-color:#1e202c;padding:10px;">
                     <h4 class="title" style="color: white;">Circular
					 <a href="<?php echo base_url();?>adminparent/view_circular" >
						<img class="img-responsive plusicon" src="<?php echo base_url(); ?>assets/img/icons/view1.png"/></a></h4>
                  </div>
                  <div class="content content-full-width">
                     <div class="panel-group" id="accordion">
                        <?php //echo count($stud_details);
                           if(empty($parents_circular)){
                           	echo "<p> No Circular Found </p>";
                           }else{
                           	foreach($parents_circular as $circular){ ?>
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h4 class="panel-title">
                                 <a data-target="#collapseOneHover<?php echo $circular->id; ?>" href="" data-toggle="collapse-hover">
                                 <?php echo $circular->circular_title;?>
                                 </a>
                              </h4>
                           </div>
                           <div id="collapseOneHover<?php echo $circular->id; ?>" class="panel-collapse collapse">
                              <div class="panel-body">
                                 <?php echo $circular->circular_description;?>
                              </div>
                           </div>
                        </div>
                        <?php }}?>
                     </div>
                     <!-- <a href="<?php echo base_url();?>student/view_all_circular" class="btn btn-social btn-simple btn-twitter">View All</a> -->
                  </div>
            </div>
         </div>
      </div>

      </div>
   </div>
</div>
<script>
   $(document).ready(function() {

   $('#dashboard').addClass('collapse in');
   $('#dashboard').addClass('active');
   $('#dashboard').addClass('active');


   $('#fullCalendar').fullCalendar({
   	header: {
   		left: 'prev,next today',
   		center: 'title',
   		right: 'month,basicWeek,basicDay'
   	},
   	defaultDate: new Date(),
   	editable: false,
   	eventLimit: true, // allow "more" link when too many events
   	// events:"<?php echo base_url() ?>event/getall_act_event",
   	eventSources: [
   {
    url: '<?php echo base_url() ?>event/getall_act_event',
    color: 'yellow',
    textColor: 'black'
   },
   {
    url: '<?php echo base_url() ?>event/get_all_regularleave',
    color: 'blue',
    textColor: 'white'
   },
   {
   url: '<?php echo base_url() ?>teacherevent/view_all_reminder',
   color: 'red',
   textColor: 'white'
   },
   {
   url: '<?php echo base_url() ?>adminparent/get_all_special_leave',
   color: 'pink',
   textColor: 'white'
   }
   ],
   	eventMouseover: function(calEvent, jsEvent) {
   var tooltip = '<div class="tooltipevent" style="width:auto;height:auto;background-color:#000;color:#fff;position:absolute;z-index:10001;padding:20px;">' + calEvent.description + '</div>';
   var $tooltip = $(tooltip).appendTo('body');

   $(this).mouseover(function(e) {
   		$(this).css('z-index', 10000);
   		$tooltip.fadeIn('500');
   		$tooltip.fadeTo('10', 1.9);
   }).mousemove(function(e) {
   		$tooltip.css('top', e.pageY + 10);
   		$tooltip.css('left', e.pageX + 20);
   });
   },

   eventMouseout: function(calEvent, jsEvent) {
   $(this).css('z-index', 8);
   $('.tooltipevent').remove();
   },

   });
   		});

</script>
