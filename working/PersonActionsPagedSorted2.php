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
		$result = mysqli_query($con, "SELECT COUNT(*) AS RecordCount FROM phone where PersonId=".$_GET["PersonId"].";");
		$row = mysqli_fetch_array($result);
		$recordCount = $row['RecordCount'];

		//Get records from database
		$result = mysqli_query($con, "SELECT * FROM phone where PersonId=".$_GET["PersonId"].";");
		
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
		$result = mysqli_query($con, "INSERT INTO phone(Number) VALUES('" . $_POST["Number"] . "');");
		
		//Get last inserted record (to return to jTable)
		$result = mysqli_query($con, "SELECT * FROM phone WHERE PhoneId = LAST_INSERT_ID();");
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
		$result = mysqli_query($con, "UPDATE phone SET Number = '" . $_POST["Number"] . "' WHERE PhoneId = " . $_POST["PhoneId"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysqli_query($con, "DELETE FROM phone WHERE PhoneId = " . $_POST["PhoneId"] . ";");

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