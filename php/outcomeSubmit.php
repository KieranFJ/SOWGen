<?php

@include('class.sqlHandler.userdb.php');

$qualID = $_POST['Qual_ID'];
$unitID = $_POST['Unit_ID'];

$entryCount = count($_POST['Outcome_Name']);

$i = 0;

while($i < $entryCount)
{
    $query = "SELECT * FROM outcomes WHERE Outcome_Name = '".$_POST['Outcome_Name'][$i]."'
        OR Outcome_Type = '".$_POST['Outcome_Type'][$i]."';";
    
    $results =  sqlHandler::getDB()->select($query);
    
    if (isset($results))
    {
       $query = "UPDATE outcomes SET Outcome_Name = '".$_POST['Outcome_Name'][$i]."', Outcome_Type = '".$_POST['Outcome_Type'][$i]."'
           WHERE Outcome_Type = '".$_POST['Outcome_Type'][$i]."'
               OR Outcome_Name = '".$_POST['Outcome_Name'][$i]."';";

        $effect = sqlHandler::getDB()->update($query);
        $i++;
    }
    else
    {
        if ( ($_POST['Outcome_Name'][$i] == "") && ($_POST['Outcome_ID'][$i] == ""))
        {
            echo "blah";
        }
        else
        {
            $query = "INSERT INTO outcomes (Outcome_Name, Outcome_Type, Unit_ID) VALUES
            ('".$_POST['Outcome_Name'][$i]."','".$_POST['Outcome_Type'][$i]."','".$unitID."');";
         
            sqlHandler::getDB()->insert($query);
            
        }
        $i++;
    }
    
}
  
header("Location: ../outcomeentry.php?Qual_ID=$qualID&Unit_ID=$unitID");
?>
