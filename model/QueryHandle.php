<?php 

/**
* class handling all pdo queries
*/
//namespace Queries;

class QueryHandle
{
	protected $conn;

	public function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function dbInsert($table, $params) {

		$query = sprintf("insert into %s (%s) values (%s)",  $table, implode(', ',  array_keys($params)),

			':'.implode(', :', array_keys($params))
		);

		try {

			$stmt = $this->conn->prepare($query);

			$stmt ->execute($params);
			
		} catch (PDOException $e) {
		die($e->getMessage());
		}
	}
	
	public function selectAll($table)
	{
		$stmt = $this->conn->prepare("SELECT *  from {$table}");

		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}
	public function selectColsOrder($columns, $table, $column, $order)
	{
		$k =0; $length = count($columns); 
		$sql = "SELECT ";

			foreach($columns as $column) 
	 		{
	 			if(++$k === $length)
	 			{
	 		$sql .= $column ." "; 
  			}else{
  	 		$sql .= $column." , ";
				} 
			}

		$sql .= "FROM {$table} ORDER BY {$column} {$order}";

		try{
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}catch (Exception $e) {

			die($e->getMessage());
			
		}
	}

	public function selectColumn($column, $table)
	{
		$stmt = $this->conn->prepare("SELECT {$column} FROM {$table} ORDER BY {$column} ASC");

		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function lookUp($column, $table, $cols)
	{
		$n = 0; $len = count($cols);

		$squery = "SELECT {$column}  FROM {$table} WHERE ";
		
		foreach($cols as $seartTerm=>$searchValue) 
	 		{
	 			if(++$n === $len)
	 			{
	 		$squery .= $seartTerm ." = :".$seartTerm;

  			}else{
  	 			$squery .= $seartTerm ." = :".$seartTerm." AND ";
				} 
			}
		try {
		$stmt = $this->conn->prepare($squery);

		$stmt->execute($cols); 

		return $stmt->rowCount();

		} catch (Exception $e) {

			die($e->getMessage());
			
		}
		
	}

	public function passedStudents($table, $column, $cols)
	{
		$n = 0; $len = count($cols);

		$squery = "SELECT admno  FROM {$table} WHERE {$column} >= 50 and ";
		
		foreach($cols as $seartTerm=>$searchValue) 
	 		{
	 			if(++$n === $len)
	 			{
	 		$squery .= $seartTerm ." = :".$seartTerm;

  			}else{
  	 			$squery .= $seartTerm ." = :".$seartTerm." AND ";
				} 
			}
		try {
		$stmt = $this->conn->prepare($squery);

		$stmt->execute($cols); 

		return $stmt->rowCount();

		} catch (Exception $e) {

			die($e->getMessage());
			
		}
		
	}
	

	public function deleteRow($table, $column)
	{
		$n = 0; $len = count($column);

		$delquery = "DELETE FROM {$table} WHERE ";

		foreach($column as $seartTerm=>$searchValue) 
	 		{
	 			if(++$n === $len)
	 			{

	 		$delquery .= $seartTerm ." = :".$seartTerm;

  			}else{

  	 		$delquery .= $seartTerm ." = :".$seartTerm." AND ";
				} 
			}
		try{

		$stmt = $this->conn->prepare($delquery);

		return ($stmt->execute($column)) ? true : false;

	}catch (Exception $e) {
			die($e->getMessage());
		}
	}


	 public function uploadFile($name, $loc)
	{
		
		$rnd = rand(0000000000, 9999999999);

 	 	$filename = $rnd.str_replace(' ', '_', $_FILES[$name]['name']);

 	 	$destination = $loc.$filename;
 	 
  		if (move_uploaded_file($_FILES[$name]['tmp_name'], $destination)) 
  		{
  			return $filename;
  		}
  		
  		return $destination = false;
	}

	public function sSession($column, $table)
	{
		$gSessions = $this->selectColumn($column, $table);

		$op = "<option selected='selected' value='' disabled='disabled'>Session</option>";
		foreach ($gSessions as $gSession) {
			extract($gSession);
			$op .="<option value='".$session."'>".$session."</option>";	
		}

		return $op;
	}

	public function editableSession($selectCols, $table, $whereCols, $orderCol, $order)
	{
		$sessions = $this->selectAndOrder($selectCols, $table, $whereCols, $orderCol, $order);

		$op = "<option selected='selected' value='' disabled='disabled'>Session</option>";
		foreach ($sessions as $session) {
			extract($session);
			$op .="<option value='".$session."'>".$session."</option>";						
		}

		return $op;
	}

	public function term()
	{
		$term = "<option selected='selected' value='' disabled='disabled'>Term</option>
		<option value='Term I'>Term I</option>
		<option value='Term II'>Term II</option>
		<option value='Term III'>Term III</option>";

		return $term;
	}

	public function aeOptions()
	{
		return "<option selected='selected' disabled='disabled' value=''> Select </option>                             
		<option value='A'>A</option>
		<option value='B'>B</option>
		<option value='C'>C</option>
		<option value='D'>D</option>
		<option value='E'>E</option>";
	}

	

//the arguments are: table to be updated, updatecols is an associative array of columns to be updated 
//where the keys are the column names and values are the values to be updated
// and the searchcols also an associative  array of cols used in a where clause 
	public function updateQuery ($table, $updateCols, $searchCols)
	{
		$i = $k = 0; $length = count($updateCols); $length2 = count($searchCols); 

		$sql = " UPDATE {$table} SET ";

		foreach($updateCols as $key=>$value) 
		{
			if(++$i === $length) 
			{
				$sql .= $key ." = :".$key;
 		 	} else {
  	 			$sql .= $key ." = :".$key.", ";
			} 
		}
	 	$sql .= " WHERE ";

	 	foreach($searchCols as $seartTerm=>$searchValue) 
	 		{
	 			if(++$k === $length2) {

	 		$sql .= $seartTerm ." = :".$seartTerm;

  			}else{

  	 		$sql .= $seartTerm ." = :".$seartTerm." AND ";
				} 
			}

 		$combinedArray = $updateCols + $searchCols;

 		try {

			$stmt = $this->conn->prepare($sql);

			$stmt ->execute($combinedArray);
			
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	// selectCols is an array of columns to be selected , it is not associative array
	//whereCols is an associative array for a where clause

	public function selectAndOrder($selectCols, $table, $whereCols, $orderCol, $order)
	{
		$k = $n =0; $length = count($selectCols); $len = count($whereCols);
		$sql = "SELECT ";

			foreach($selectCols as $selectCol) {

	 			if(++$k === $length){

	 		$sql .= $selectCol ." "; 

  			}else{

  	 		$sql .= $selectCol." , ";
				} 
			}
			$sql .= "FROM {$table} WHERE ";

			foreach($whereCols as $seartTerm=>$searchValue) {

	 			if(++$n === $len) {

	 		$sql .= $seartTerm ." = :".$seartTerm;

  			}else{

  	 		$sql .= $seartTerm ." = :".$seartTerm." AND ";
				} 
			}

			$sql .= " ORDER BY {$orderCol} {$order}";
			try {

			$stmt = $this->conn->prepare($sql);

			$stmt ->execute($whereCols);

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}


	public function selectRow($selectCols, $table, $whereCols)
	{
		$k = $n =0; $length = count($selectCols); $len = count($whereCols);
		$sql = "SELECT ";

			foreach($selectCols as $selectCol) {

	 			if(++$k === $length) {

	 		$sql .= $selectCol ." "; 

  			}else{
  	 		$sql .= $selectCol." , ";
				} 
			}
			$sql .= "FROM {$table} WHERE ";

			foreach($whereCols as $seartTerm=>$searchValue) {

	 			if(++$n === $len) {

	 		$sql .= $seartTerm ." = :".$seartTerm;

  			}else{
  	 		$sql .= $seartTerm ." = :".$seartTerm." AND ";

				} 
			}
			try {

			$stmt = $this->conn->prepare($sql);

			$stmt ->execute($whereCols);

			return $stmt->fetch(PDO::FETCH_ASSOC);
			
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function promoteClasses ($class)
	{

		$stmt = $this->conn->prepare("SELECT class from class ORDER BY class ASC");
		$stmt->bindParam(":cc", $class);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function selectDistinct($column, $table, $whereCols)
	{
		$n = 0; $len = count($whereCols);

		$sql = "SELECT DISTINCT ($column) FROM {$table} WHERE ";

		foreach($whereCols as $seartTerm=>$searchValue) {

	 			if(++$n === $len){

	 		$sql .= $seartTerm ." = :".$seartTerm;

  			}else{

  	 		$sql .= $seartTerm ." = :".$seartTerm." AND ";
				} 
			}
			try {
			$stmt = $this->conn->prepare($sql);

			$stmt ->execute($whereCols);

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function getTermClasses($table, $session, $term)
	{
		$qr = $this->conn->prepare("SELECT DISTINCT class FROM {$table} WHERE SESSION = :sess AND term = :tm ORDER BY class ASC");
		$qr ->execute([":sess"=>$session, ":tm"=>$term]);

		return $qr->fetchAll(PDO::FETCH_ASSOC);
	}


public function getSessionSubjects($session, $class)
	{
		$qr = $this->conn->prepare("SELECT DISTINCT subj FROM comb WHERE SESSION = :sess AND class=:cc ORDER BY subj ASC");
		$qr ->execute([":sess"=>$session, ":cc"=>$class]);

		return $qr->fetchAll(PDO::FETCH_ASSOC);

	}

public function getSessionAvgs($session, $class, $subject)
{
	$stmt = $this->conn->prepare("SELECT AVG(term1) AS term1Avg, AVG(term2) AS term2Avg, AVG(term3) AS term3Avg FROM comb WHERE SESSION =:ss  AND class =:cc AND subj =:sb");
	$stmt->execute([":ss"=>$session, ":cc"=>$class, ":sb"=>$subject]);
	return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

	public function subAndAvg($whereCols)
	{
		$n = 0; $len = count($whereCols);

		$sql = "SELECT DISTINCT subj, classavg FROM scores WHERE ";

		foreach($whereCols as $seartTerm=>$searchValue) {

	 			if(++$n === $len) {

	 		$sql .= $seartTerm ." = :".$seartTerm;

  			}else{

  	 		$sql .= $seartTerm ." = :".$seartTerm." AND ";
				} 
			}
			try {
			$stmt = $this->conn->prepare($sql);

			$stmt ->execute($whereCols);

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	//selectCols is simple array of columns to be selected
	//searchcol is the col to use before not in clause
	//cols is another array used after not in clause

	public function selectNotIn ($selectCols, $table, $scol, $cols)
	{
		$count = count($selectCols); $n = 0;
		$sql = "SELECT ";
		foreach ($selectCols as $key) {
			if (++$n === $count) {
				$sql .= $key." ";
			}else {
				$sql .= $key." , ";
			}
		}
		$sql .=  "FROM {$table} WHERE {$scol} NOT IN ( '" . implode( "', '" , $cols ) . "' )";

		try {

			$stmt = $this->conn->prepare($sql);

			$stmt ->execute();

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
			
		} catch (Exception $e) {
			die($e->getMessage());
		}

	}


	public function showGrade($avr){
   	$avr = round($avr);
  	 $grade = $remark = "";
	if($avr>=80){ $grade='A1'; $remark='EXCELLENT';}
	if(($avr>=70) && ($avr<=79)){ $grade='B2'; $remark='VERY GOOD';}
 	if(($avr>=65) && ($avr<=69)){ $grade='B3'; $remark='GOOD';}
 	if(($avr>=60) && ($avr<=64)){ $grade='C4'; $remark='CREDIT';}
 	if(($avr>=55) && ($avr<=59)){ $grade='C5'; $remark='CREDIT';}
 	if(($avr>=50) && ($avr<=54)){ $grade='C6'; $remark='CREDIT';}
 	if(($avr>=45) && ($avr<=49)){ $grade='D7'; $remark='PASS';}
 	if(($avr>=40) && ($avr<=44)){ $grade='E8'; $remark='PASS';}
 	if(($avr>=0) && ($avr<=39)){ $grade='F9'; $remark='FAIL';}

return array($grade, $remark);
}

	public function checkSubject($class, $session, $term, $subject)
	{
		$stmt = $this->conn->prepare(" SELECT s.admno, s.test, s.exam, s.total, a.name
		FROM scores s, students a WHERE s.admno = a.admno AND s.session=a.session AND s.class=a.class AND s.class =:cc 	AND a.class=:cc AND s.session =:ss AND a.session=:ss AND s.term = :tt AND s.subj = :sj ORDER BY s.total DESC ");

		$stmt->execute([":cc"=>$class,  ":ss"=>$session, ":tt"=>$term, ":sj"=>$subject]);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	

	public function selectResults($class, $session, $term)
	{
		$stmt = $this->conn->prepare("SELECT a.admno, a.subjectsTotal, a.gtotal, a.avg, b.name FROM results a, students b WHERE a.admno=b.admno AND a.class=b.class AND a.session=b.session and a.class=:cc and a.session=:ss and a.term=:tt order by a.avg desc, a.gtotal desc");

		$stmt->execute([":cc"=>$class,  ":ss"=>$session, ":tt"=>$term]);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);


	}

	public function resultsReview($admno, $session, $class, $term)
	{
		$stmt = $this->conn->prepare("SELECT r.position, r.avg, s.name, s.sex from results r, students s where r.admno=s.admno and r.session=s.session and r.class=s.class and r.admno=:adm and r.session=:ss and r.class=:cc and r.term=:term");
		$stmt->execute([":adm"=>$admno, ":ss"=>$session, ":cc"=>$class, ":term"=>$term]);

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function getResults($admno, $session, $class, $term)
	{
		$stmt = $this->conn->prepare("SELECT s.name, s.dob, s.sex, s.passport, r.subjectsTotal, r.gtotal, r.avg, r.position, r.pcomments, r.datep, r.tcomment, r.tdate from students s, results r where s.admno=r.admno and s.session=r.session and s.class=r.class and r.admno=:adm and r.session=:sess and r.class=:cl and r.term=:tm");

		$stmt->execute([":adm"=>$admno, ":sess"=>$session, ":cl"=>$class, ":tm"=>$term]);

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function combResult($admno, $session, $class)
	{
		$stmt = $this->conn->prepare("SELECT s.name, s.dob, s.sex, s.passport, r.subjtotal, r.avg, r.pos, r.recommend, r.date, r.status from students s, combr r where s.admno=r.admno and s.session=r.session and s.class=r.class and r.admno=:adm and r.session=:sess and r.class=:cl");

		$stmt->execute([":adm"=>$admno, ":sess"=>$session, ":cl"=>$class]);

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}


	public function subjectStats($class, $session, $term, $subject)
	{
		$stmt = $this->conn->prepare("SELECT count(total) as sbn, AVG(total) as sbavg, min(total) as sbmin, max(total) as sbmax  FROM scores WHERE class=:cc AND session=:sess and term=:tt and subj=:sj");

		$stmt->execute([ ":cc"=> $class, ":sess"=>$session, ":tt"=>$term, ":sj"=>$subject]);

		return $stmt->fetch(PDO::FETCH_ASSOC);
		
	}

	
	public function annualSubject($session, $class, $subject)
	{
		$stmt = $this->conn->prepare("SELECT c.admno, c.term1+c.term2+c.term3 as tt, d.name FROM comb c, students d WHERE c.admno=d.admno and c.session=d.session and c.class=d.class and c.session=:sess and c.class=:cc and c.subj=:sub and c.term1 is not null and c.term2 is not null and c.term3 is not null order by tt DESC");
		
		$stmt->execute([":sess"=>$session, ":cc"=>$class,	":sub"=>$subject]);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function annualSubjectStat($admno, $session, $class)
	{
		$stmt = $this->conn->prepare("SELECT COUNT(DISTINCT subj) as sbn, sum(avg) as studentsum FROM comb where admno=:ad and session=:sess and class=:cc");

		$stmt->execute([":ad"=>$admno, ":sess"=>$session, ":cc"=>$class]);

		return $stmt->fetch(PDO::FETCH_ASSOC);
	}


	public function annualAvg($class, $session, $subject)
	{
		$stmt = $this->conn->prepare("SELECT AVG(avg) as anavg, min(avg) as anmin, max(avg) as anmax  FROM comb WHERE class=:cc AND session=:sess and subj=:sj");

		$stmt->execute([ ":cc"=> $class, ":sess"=>$session, ":sj"=>$subject]);

		return $stmt->fetch(PDO::FETCH_ASSOC);
		
	}

//to be continued when i resume
	public function annualResults($class, $session)
	{
		$stmt = $this->conn->prepare("SELECT r.admno, r.session, r.subjtotal, r.avg, r.class, s.name from combr r, students s where r.admno = s.admno and r.class=s.class and r.session=s.session and r.class=:cc and r.SESSION=:sess order by r.avg desc");

		$stmt->execute([":cc"=>$class, ":sess"=>$session]);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function position($pos)
	{
		if (($pos==1) || ($pos ==21) || ($pos == 31) || ($pos == 41) || ($pos == 51)) { 
			$pos=$pos.'st';
		}elseif(($pos==2) || ($pos==22) || ($pos == 32) || ($pos == 42) ||   ($pos == 52))
		{
			$pos=$pos.'nd';
		}elseif(($pos==3) || ($pos==23)){$pos=$pos.'rd'; }
          else { $pos=$pos.'th'; }
        return $pos;
	}

	public function loggedIn ()
	{
		if(!isset($_SESSION['_ref_user']) || !isset($_SESSION['_id_']) || !isset($_SESSION['role']) || !isset($_SESSION['last_acted_on'])){
		return header('location:logout.php');
		}
		return true;
	}

	public function checkTime(){
	  if(isset($_SESSION['last_acted_on']) && (time() - $_SESSION['last_acted_on'] > 60*30) ){
 	 return header('location:logout.php');
		} else {
 	return $_SESSION['last_acted_on'] = time();  }

	}

	public function searchResults($search){
		$search = "%$search%";
		$stmt=$this->conn->prepare("SELECT name, admno, class, dater, session FROM students WHERE name LIKE :s OR admno LIKE :s");
		$stmt->bindParam(":s", $search);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function login($uname, $pword)
{
 //$result = [];
  $stmt = $this->conn->prepare("SELECT id, name, role, pvihiga, ustarp FROM uzerz WHERE ustarp = :uname AND status='active'");
  $stmt->bindParam(":uname", $uname);
  $stmt ->execute();
  $count = $stmt->rowCount();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($count != 1 || !password_verify($pword, $row['pvihiga'])) {
    return false;
  }else {
    return $row;
  }
 
}

public function combStats($class, $session, $sb)
{
	$stmt = $this->conn->prepare("select max(avg) as cmbmax, min(avg) as cmbmin, avg(avg) as cmbavg from comb where class=:cc and session=:ss and subj=:sb");
	$stmt->execute([":cc"=>$class, ":ss"=>$session, ":sb"=>$sb]);
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function cleanInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

	
	
}

