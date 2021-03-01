<?php
 $host = "localhost";
 $user = "root";
 $pwd = "";
 $db= "db_records";


 $conn = mysqli_connect($host,$user,$pwd) or die ("Error Connecting to Database");
 $seldb = mysqli_select_db($conn,$db) or die ("Error Selectign Database");

function sanitized($string){
	$string = mysqli_real_escape_string($GLOBALS['$conn'],trim($string));
	return $string;
}

function loaddata($tablename){

	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * FROM $tablename");
	while($row=mysqli_fetch_assoc($sel)){
		extract($row);

		if($tablename=="subjects"){
			$data[] = array('<input type="checkbox" name="subj_id" id="subj_id" value='.$subj_id.'>',$subj_code,$subj_desc,$units);
		}
		else if($tablename=="year_level"){
			$data[] = array('<input type="checkbox" name="year_id" id="year_id" value='.$year_id.'>',$year_level,$section);
		}
		else if($tablename=="teachers"){
			$data[] = array('<input type="checkbox" name="teach_id" id="teach_id" value='.$teach_id.'>',$teach_no,$teach_fname.' '.$teach_mname.' '.$teach_lname,$teach_gender,$teach_degree,$teach_masteral);
		}
		else if($tablename=="students"){
			$data[] = array('<input type="checkbox" name="stud_id" id="stud_id" value='.$stud_id.'>',$stud_no,$stud_fname.' '.$stud_mname.' '.$stud_lname,$stud_gender,$stud_age.' years old');
		}

	}

	echo json_encode($data);
}

function validate($string,$fieldname,$tablename){

	$val = mysqli_query($GLOBALS['$conn'],"SELECT $fieldname from $tablename where $fieldname='$string' ");

	$num = mysqli_num_rows($val);

	if($num==0){
		echo 'available';
	}
	else{
		echo 'not';
	}
}

function validate_edit($string,$id,$tablename,$fieldname,$fieldnameid){
	$val = mysqli_query($GLOBALS['$conn'],"SELECT $fieldname FROM $tablename where $fieldname='$string' and $fieldnameid='$id' ");
	$num = mysqli_num_rows($val);

	if($num==1){
		echo 'available';
	}
	else{
		$val2 = mysqli_query($GLOBALS['$conn'],"SELECT $fieldname from $tablename where $fieldname='$string' ");
		$num2 = mysqli_num_rows($val2);
		if($num2==1){
			echo 'not';
		}
		else{
			echo 'available';
		}
	}
}

function validate_section($section,$grade){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * from year_level where year_level='$grade' and section='$section' ");
	$num = mysqli_num_rows($sel);
	if($num==1){
		echo 'failed';
	}
	else{
		echo 'available';
	}
}

function validate_section_edit($section,$grade,$id){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * from year_level where year_level='$grade' and section='$section' and year_id='$id' ");
	$num = mysqli_num_rows($sel);
	if($num==1){
		echo 'available';
	}
	else{
		$sel = mysqli_query($GLOBALS['$conn'],"SELECT * from year_level where year_level='$grade' and section='$section'");
		$num = mysqli_num_rows($sel);
		if($num==1){
			echo "failed";
		}
		else{
			echo "available";
		}
	}
}

function addquery($data,$tablename){

	$fieldname = array_keys($data);

	$add = mysqli_query($GLOBALS['$conn'],"INSERT INTO ".$tablename."(".implode(",", $fieldname).") VALUES('".implode("','", $data)."')");
}

function get_content($id,$tablename,$fieldname){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * from $tablename where $fieldname='$id' ");

	while($row=mysqli_fetch_assoc($sel)){
		extract($row);

		if($tablename=="subjects"){
			$data = array('subj_id'=>$subj_id,'subj_code'=>$subj_code,'subj_desc'=>$subj_desc,'units'=>$units);
		}
		else if($tablename=="year_level"){
			$data = array('year_id'=>$year_id,'year_level'=>$year_level,'section'=>$section);
		}
		else if($tablename=="teachers"){
			$data = array('teach_id'=>$teach_id,'fname'=>$teach_fname,'mname'=>$teach_mname,'lname'=>$teach_lname,'gender'=>$teach_gender,'degree'=>$teach_degree,'masteral'=>$teach_masteral,'idnum'=>$teach_no);
		}
		else if($tablename=="students"){
			$data = array('stud_id'=>$stud_id,'fname'=>$stud_fname,'mname'=>$stud_mname,'lname'=>$stud_lname,'gender'=>$stud_gender,'age'=>$stud_age,'idnum'=>$stud_no);
		}
	}

	echo json_encode($data);
}

function editquery($id,$fieldname,$data,$tablename){
	
	foreach ($data as $key => $value) {
		$val[] = "$key='$value' ";
	}
	$updatedata = implode(",", $val); 

	$edit = mysqli_query($GLOBALS['$conn'],"UPDATE $tablename SET $updatedata WHERE $fieldname='$id' " );

	if($edit==true){
		echo 'success';
	}
	else{
		echo 'failed';
	}
}

function deletequery($id,$tablename,$fieldname){
	$count = count($id);
	$var = 0;
	foreach ($id as $subject) {
		$del = mysqli_query($GLOBALS['$conn'],"DELETE From $tablename where $fieldname='$subject' ");
		if($del==true){
			$var +=1;
		}
	}

	if($count==$var){
		echo 'success';
	}
	else{
		echo 'failed';
	}
}

function dropdown($tablename){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * from $tablename");
			echo '<option value=0>Select Year Level</option>';
	while($row=mysqli_fetch_assoc($sel)){
		extract($row);

		echo '<option value='.$year_id.'>'.$year_level.'-'.$section.'</option>';
	}
}

function getstudentbyyear($sy){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * from students");

	while($row=mysqli_fetch_assoc($sel)){
		extract($row);
		$sel2 = mysqli_query($GLOBALS['$conn'],"SELECT * FROM student_year_level as syl join year_level as yl on syl.year_id=yl.year_id where syl.stud_id='$stud_id' and syl.schoolyear='$sy'");
		$num = mysqli_num_rows($sel2);
		if($num==0){
			$data[] = array('<input type="checkbox" name="stud_id" id="stud_id" value='.$stud_id.'>',$stud_no,$stud_fname.' '.$stud_mname.' '.$stud_lname);
		}
		else{
			while($row=mysqli_fetch_assoc($sel2)){
				extract($row);
				$data[] = array($year_level,$stud_no,$stud_fname.' '.$stud_mname.' '.$stud_lname);
			}
			
		}
	}
	echo json_encode($data);
}

function enroll_student($year,$sy,$stud_id){

	foreach ($stud_id as $id) {
		$insert = mysqli_query($GLOBALS['$conn'],"INSERT INTO student_year_level (stud_id,year_id,schoolyear) values ('$id','$year','$sy') ");
	}
}

function getstudentbyyearsy($sy,$year){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * from student_year_level as syl join students as s on syl.stud_id=s.stud_id join year_level as yl on syl.year_id=yl.year_id where syl.schoolyear='$sy' and syl.year_id='$year' ");

	while($row=mysqli_fetch_assoc($sel)){
		extract($row);
		$data[] = array('<input type="checkbox" name="stud_id" id="stud_id" value='.$syl_id.'>',$stud_no,$stud_fname.' '.$stud_mname.' '.$stud_lname,$year_level);
		
	}
	echo json_encode($data);
}

function getdatachart($sy){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * FROM year_level");

	while($row=mysqli_fetch_assoc($sel)){
		extract($row);
		$sel2 = mysqli_query($GLOBALS['$conn'],"SELECT * from student_year_level where year_id='$year_id' and schoolyear='$sy' ");
		$num = mysqli_num_rows($sel2);
		$data[] = array('y'=>$year_level,'a'=>$num);
	}

	echo json_encode($data);
}

function get_year_name($id){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * from year_level where year_id='$id' ");
	while($row=mysqli_fetch_assoc($sel)){
		extract($row);
		echo $year_level.'- '.$section;
	}
}

function add_subjects_grades($grade,$subject){
	$count = count($subject);
	$var = 0;
	foreach ($subject as $subj_id) {
		$sel = mysqli_query($GLOBALS['$conn'],"SELECT * from year_level_subject where subj_id='$subj_id' and year_id='$grade' ");
		$num = mysqli_num_rows($sel);
		if($num==0){
			$insert = mysqli_query($GLOBALS['$conn'],"INSERT INTO year_level_subject (subj_id,year_id) values ('$subj_id','$grade') ");
			if($insert==true){
				$var +=1;
			}
		}
	}

	if($count==$var){
		echo 'success';
	}
	else{
		echo 'notcomplete';
	}
}

function load_year_subjects($id){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * FROM year_level_subject as yls join subjects as s on yls.subj_id=s.subj_id  where yls.year_id='$id' ");

	while($row=mysqli_fetch_assoc($sel)){
		extract($row);
		$data[] = array('<input type="checkbox" name="yls_id" id="yls_id" value='.$yls_id.'>',$subj_code,$subj_desc);
	}
	echo json_encode($data);
}

function get_print_subjects($id){
	$totalunits = 0;
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * FROM year_level_subject as yls join subjects as s on yls.subj_id=s.subj_id  where yls.year_id='$id' ");
	while($row=mysqli_fetch_assoc($sel)){
		extract($row);
		echo '<tr>';
		echo '<td>'.$subj_code.'</td>';
		echo '<td>'.$subj_desc.'</td>';
		echo '<td>'.$units.'</td>';
		echo '</tr>';
		$totalunits += $units;
	}
	echo '<tr>';
	echo '<td></td>';
	echo '<td></td>';
	echo '<td></td>';
	echo '</tr>';

	echo '<tr>';
	echo '<th>Total Units</th>';
    echo '<td></td>';
	echo '<th>'.$totalunits.' units'.'</th>';
	echo '</tr>';
}

function get_print_students($year,$sy){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * from student_year_level as syl join students as s on syl.stud_id=s.stud_id join year_level as yl on syl.year_id=yl.year_id where syl.schoolyear='$sy' and syl.year_id='$year' ");

	while($row=mysqli_fetch_assoc($sel)){
		extract($row);

		echo '<tr>';
		echo '<td>'.$stud_no.'</td>';
		echo '<td>'.$stud_fname.' '.$stud_mname.' '.$stud_lname.'</td>';
		echo '<td>'.$stud_gender.'</td>';
		echo '<td>'.$stud_age.'</td>';
		echo '</tr>';
	}
}

function generate_schedule($sy,$year_id,$room){

	$time = array('7:30-8:30','8:30-9:30','10:00-11:00','11:00-12:00','1:00-2:00','2:00-3:00','3:30-4:30','7:30-8:30','8:30-9:30','10:00-11:00','11:00-12:00','1:00-2:00','2:00-3:00','3:30-4:30');
	$timecount = count($time);
	$mwf = "mwf";
	$tth = "tth";

	$val = mysqli_query($GLOBALS['$conn'],"SELECT * FROM schedule as sched join year_level_subject as yls on sched.yls_id=yls.yls_id where  sched.schoolyear='$sy' and yls.year_id='$year_id' ");
	$num = mysqli_num_rows($val);


	if($num>0){
		echo '<div class="callout callout-danger">
                    <h4>Unable to generate Schedule</h4>
                    <p>This year level in this school year already have schedule try to view the schedule.</p>
                  </div>';
	}
	else{
		$yls = mysqli_query($GLOBALS['$conn'],"SELECT * from year_level_subject where year_id='$year_id'");
		$x = 0;
		while($row=mysqli_fetch_assoc($yls)){
			extract($row);
			
			$sel = mysqli_query($GLOBALS['$conn'],"SELECT * FROM schedule as sched join year_level_subject as yls on sched.yls_id=yls.yls_id where sched.days='$mwf' and sched.schoolyear='$sy' and yls.year_id='$year_id' ");
			$num = mysqli_num_rows($sel);
			if($num<7){
				$timehr = $time[$x];
				$ins = mysqli_query($GLOBALS['$conn'],"INSERT INTO schedule (timehr,days,schoolyear,yls_id,room) VALUEs ('$timehr','$mwf','$sy','$yls_id','$room') ");
				$x +=1;
			}
			else{
				$timehr = $time[$x];
				$ins = mysqli_query($GLOBALS['$conn'],"INSERT INTO schedule (timehr,days,schoolyear,yls_id,room) VALUEs ('$timehr','$tth','$sy','$yls_id','$room') ");
				$x +=1;
			}	
			
		}
		get_schedule($sy,$year_id);		
	}
	
}

function get_schedule($sy,$year_id){
	$sel = mysqli_query($GLOBALS['$conn'],"SELECT * FROM schedule as sched join year_level_subject as yls on sched.yls_id=yls.yls_id join subjects as s on yls.subj_id=s.subj_id where sched.schoolyear='$sy' and yls.year_id='$year_id' ");
	echo '<table class="table table-bordered table-hover">';
	echo '<thead>
		  <tr>
		  <th>Time</th>
		  <th>Days</th>
		  <th>Subject</th>
		  <th>Teacher</th>
		  </tr>
		  </thead>';

	while($row=mysqli_fetch_array($sel)){
		extract($row);
		echo '<tr>';
		echo '<td>'.$timehr.'</td>';
		if($days=="mwf"){
			echo '<td>MWF</td>';
		}
		else{
			echo '<td>TTH</td>';
		}
		echo '<td>'.$subj_code.' '.$subj_desc.'</td>';
		$teach = mysqli_query($GLOBALS['$conn'],"SELECT * FROM teachers");
		echo '<td><select id="selteacher" onchange="updateteacher('.$sched_id.')" >
			  <option value=0>Select Teacher</option>

		';
		while($row=mysqli_fetch_assoc($teach)){
			extract($row);
			echo '<option value='.$teach_id.'>'.$teach_fname.' '.$teach_mname.' '.$teach_lname.'</option>';
		}
		echo '</select></td>';

		echo '</tr>';

	}
	echo '</table>';
				
}
	


?>