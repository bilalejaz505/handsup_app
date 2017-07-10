<?php

try
{
	//Open database connection
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con,"jtabletestdb");

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get record count
		$result = mysqli_query($con, "SELECT COUNT(*) AS RecordCount FROM third where PhoneId=".$_GET["PhoneId"].";");
		$row = mysqli_fetch_array($result);
		$recordCount = $row['RecordCount'];

		//Get records from database
		$result = mysqli_query($con, "SELECT * FROM third where PhoneId=".$_GET["PhoneId"].";");
		
		//Add all records to an array
		$rows = array();
		while($row = mysqli_fetch_array($result))
		{
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $recordCount;
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$result = mysqli_query($con, "INSERT INTO third(Third_Desc) VALUES('" . $_POST["Third_Desc"] . "');");
		
		//Get last inserted record (to return to jTable)
		$result = mysqli_query($con, "SELECT * FROM third WHERE ThirdId = LAST_INSERT_ID();");
		$row = mysqli_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysqli_query($con, "UPDATE third SET Third_Desc = '" . $_POST["Third_Desc"] . "' WHERE ThirdId = " . $_POST["ThirdId"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysqli_query($con, "DELETE FROM third WHERE ThirdId = " . $_POST["ThirdId"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysqli_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>