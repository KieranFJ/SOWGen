<?php

@include_once('class.sqlHandler.userdb.php');

if($_POST['LP_ID'])
{
    //update existing
    $query = "UPDATE lessonplans 
                SET LP_Date = '".date('Y-m-d', strtotime($_POST['LP_Date']))."',
                    LP_Time = TIME( STR_TO_DATE( '".$_POST['LP_Time']."', '%h:%i %p' )),
                    LP_Aim = '".$_POST['LP_Aim']."',
                    LP_Learning_Outcomes = '".$_POST['LP_Learning_Outcomes']."',
                    LP_Excep_Circ = '".$_POST['LP_Excep_Circ']."',
                    LP_Notes = '".$_POST['LP_Notes']."'
                WHERE LP_ID = '".$_POST['LP_ID']."'
                AND SOW_ID = '".$_POST['SOW_ID']."';";
    
    $result = sqlHandler::getDB()->update($query);
}
else
{
    //insert new
    $query = "INSERT INTO lessonplans (SOW_ID, LP_Date, LP_Time, LP_Aim, LP_Learning_Outcomes, 
                LP_Excep_Circ, LP_Notes)
              VALUES ('".$_POST['SOW_ID']."', '".date('Y-m-d', strtotime($_POST['LP_Date']))."', TIME( STR_TO_DATE( '".$_POST['LP_Time']."', '%h:%i %p' )), '".$_POST['LP_Aim']."',
                  '".$_POST['LP_Learning_Outcomes']."', '".$_POST['LP_Excep_Circ']."', '".$_POST['LP_Notes']."');";
    
    $result = sqlHandler::getDB()->insert($query);
}   

    header('Location: ../newLessonPlan.php?SOW_ID='.$_POST['SOW_ID'].'')
            
?>
