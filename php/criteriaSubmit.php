<?php

@include('class.sqlHandler.userdb.php');

$qualID = $_POST['Qual_ID'];
$unitID = $_POST['Unit_ID'];
$outcomeID = $_POST['Outcome_ID'];

$entryCount = count($_POST['Criteria_Description']);

$i = 0;

while($i < $entryCount)
{
    // select to check for existing criteria
    $query = "SELECT * FROM criteria WHERE Criteria_Description = '".$_POST['Criteria_Description'][$i]."'
        OR Criteria_Type = '".$_POST['Criteria_Type'][$i]."'
            AND Outcome_ID = '".$_POST['Outcome_ID']."';";
    
    $results =  sqlHandler::getDB()->select($query);
    
    if (isset($results))
    {
        //is existing entries update existing entries
       $query = "UPDATE criteria SET Criteria_Description = '".$_POST['Criteria_Description'][$i]."', Criteria_Type = '".$_POST['Criteria_Type'][$i]."'
           WHERE Criteria_Type = '".$_POST['Criteria_Type'][$i]."'
               OR Criteria_Description = '".$_POST['Criteria_Description'][$i]."'
               AND Outcome_ID = '".$_POST['Outcome_ID']."';";

        $effect = sqlHandler::getDB()->update($query);
        $i++;
    }
    else
    {
        //if no existing entries
        if ( ($_POST['Criteria_Descripton'][$i] == "") && ($_POST['Criteria_Type'][$i] == ""))
        {
            //in form is empty
            echo "blah";
        }
        else
        {
            //if form isnt empty, insert data
            $query = "INSERT INTO criteria (Criteria_Description, Criteria_Type, Outcome_ID) VALUES
            ('".$_POST['Criteria_Description'][$i]."','".$_POST['Criteria_Type'][$i]."','".$outcomeID."');";
         
            sqlHandler::getDB()->insert($query);
            
        }
        $i++;
    }
    
}
  
header("Location: ../criteriaentry.php?Qual_ID=$qualID&Unit_ID=$unitID&Outcome_ID=$outcomeID");
?>
