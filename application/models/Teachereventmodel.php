<?php

Class Teachereventmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }

   function getYear()
    {
      $sqlYear = "SELECT * FROM edu_academic_year WHERE CURDATE() >= from_month AND CURDATE() <= to_month AND status = 'Active'";
      $year_result = $this->db->query($sqlYear);
      $ress_year = $year_result->result();

      if($year_result->num_rows()==1)
      {
        foreach ($year_result->result() as $rows)
        {
            $year_id = $rows->year_id;
        }
        return $year_id;
      }
    }

      function get_teacher_event($user_id){
          $year_id = $this->getYear();
          $get_teacher ="SELECT et.teacher_id FROM edu_users AS ed LEFT JOIN edu_teachers AS et ON ed.teacher_id=et.teacher_id WHERE user_id='$user_id'";
          $result1=$this->db->query($get_teacher);
          $teacher_id=$result1->result();
          foreach ($teacher_id as $rows) { }
          $teacher_id=$rows->teacher_id;
           $query="SELECT ev.event_id,ev.event_name,ev.event_date,evc.co_name_id FROM edu_events AS ev  LEFT JOIN edu_event_coordinator AS evc ON ev.event_id= evc.event_id  WHERE  evc.co_name_id='$teacher_id' AND ev.year_id='$year_id' AND evc.status='Active' GROUP BY event_id ";
          $resultset=$this->db->query($query);
          $res=$resultset->result();
          return $res;
       }

       function get_teacher_allevent(){
           $year_id = $this->getYear();
          // $query="SELECT ev.event_id,ev.event_name,ev.event_date FROM edu_events AS ev WHERE ev.status='Active' ORDER  BY event_date DESC";
           //$query="SELECT ee.*,eec.co_name_id,eu.user_master_id,eu.user_id FROM edu_events as ee left join edu_event_coordinator as eec on eec.event_id=ee.event_id left join edu_users as eu on eu.user_master_id=eec.co_name_id and eu.user_type=2 where year_id='$year_id' and ee.status='Active' GROUP BY eec.co_name_id";
           $query="SELECT ee.event_id,ee.event_name,ee.event_date,ee.event_details FROM edu_events as ee  where ee.year_id='$year_id' and ee.status='Active' GROUP by ee.event_id";
           $resultset=$this->db->query($query);
           $res=$resultset->result();
           return $res;
           // if($resultset->num_rows()==0){
           //   $data= array("status" => "failure");
           //   return $data;
           // }else{
           //   $res=$resultset->result();
           //   $data= array("status" => "success","event_li"=>$res);
           //   return $data;
           // }
        }


        function get_event_details($event_id){
          $query="SELECT ev.event_id,ev.event_name,ev.event_date,ev.event_details FROM edu_events AS ev WHERE ev.event_id='$event_id'";
           $resultset=$this->db->query($query);
           if($resultset->num_rows()==0){
             $data= array("status" => "failure");
             return $data;
           }else{
             $res=$resultset->result();
             $data= array("status" => "success","eventview"=>$res);
             return $data;
           }
        }

        function get_teacher_in_event($event_id)
		{
			  $query="SELECT ec.event_id,es.event_name,et.name,es.event_date,ec.sub_event_name,es.event_details FROM edu_event_coordinator AS ec LEFT JOIN edu_teachers AS et ON ec.co_name_id=et.teacher_id LEFT JOIN edu_events AS es ON es.event_id=ec.event_id WHERE ec.event_id='$event_id' AND ec.status='Active'";
			  $resultset=$this->db->query($query);
			  if($resultset->num_rows()==0){
			  $data= array("status" => "failure");
			  return $data;
			 }else{
			  $res=$resultset->result();
			  $data= array("status" => "success","event_li"=>$res);
			  return $data;
			}
        }


        function save_to_do_list($to_do_date,$to_do_list,$to_do_notes,$to_user,$user_type,$status){
           $query="INSERT INTO edu_reminder(user_id,to_do_date,to_do_title,to_do_description,status,created_by,created_at,updated_by,updated_at) VALUES ('$to_user','$to_do_date','$to_do_list','$to_do_notes','$status','$user_type',NOW(),'$user_type',NOW())";

          $resultset=$this->db->query($query);
          if($resultset){
            $data= array("status" => "success");
            return $data;
          }else{
            $data= array("status" => "failure");
            return $data;
          }
        }

        function view_all_reminder($user_id){
          $query="SELECT to_do_date AS start,to_do_title AS title,to_do_description AS description FROM edu_reminder AS eh WHERE user_id='$user_id' AND status='Active'";
          $result=$this->db->query($query);
          return $result->result();
        }



        function get_all_special_leave_staff(){
          $year_id=$this->getYear();
          $sql1="SELECT lm.leave_id,lm.leave_type AS description,lm.leave_classes,lm.status,el.leaves_name AS title,el.leave_mas_id,el.leave_date AS start,el.days,el.week FROM edu_leavemaster AS lm,edu_leaves AS el WHERE lm.leave_id=el.leave_mas_id AND lm.leave_type='Special Holiday'  AND lm.status='Active'";
          $res=$this->db->query($sql1);
          return $res->result();
        }









}
?>
