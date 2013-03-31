<?php

@include('class.sqlHandler.userdb.php');

$post = $_POST;

$query = "SELECT * FROM qualifications WHERE Qual_Name = '".$post['qualName']."' OR Qual_Code = '".$post['qualCode']."';";

$results = sqlHandler::getDB()->select($query);

if (isset($results))
{
    header("Location: ../index.php");
    /* Qualification already exits, send error back to qualEntry Form page */
}

$query = "INSERT INTO qualifications
            (Qual_Name, Qual_Code, Qual_Level, Qual_Length, Assessment_Date, Assessment_Type, Exam_Board_ID)
            VALUES ('".$post['qualName']."', '".$post['qualCode']."', '".$post['qualLevel']."', '".$post['qualLength']."', '".$post['qualAssDate']."', '".$post['qualAssType']."', '1');";

$return = sqlHandler::getDB()->insert($query);

header("Location: ../unitentry.php?Qual_ID=$return");

?>
