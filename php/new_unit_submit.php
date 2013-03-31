<?php
@include('class.sqlHandler.userdb.php');

$qualID = $_POST['Qual_ID'];

if ($_POST['submit'] == "final")
{
    header("Location: ../outcomeentry.php?Qual_ID=$qualID");
    //submit to database and redirect to outcomes   
}
else
{

    $query = "SELECT * FROM unit WHERE Unit_name = '".$_POST['Unit_Name']."' OR Unit_Code = '".$_POST['Unit_Code']."';";

    $result = sqlHandler::getDB()->select($query);

    $test = $_POST;

    if ($result[0]['Unit_Name'] === $_POST['Unit_Name'] || $result[0]['Unit_Code'] === $_POST['Unit_Code'])
    {
        header("Location: ../unitentry.php?Qual_ID=$qualID");
        //send back error saying existing unit
    }
    else
    {  
        $query = "INSERT INTO unit (Qual_ID, Unit_Name, Unit_Code, Unit_Credit_Value) 
                    VALUES ('$qualID', '".$_POST['Unit_Name']."', '".$_POST['Unit_Code']."', '".$_POST['Unit_Credit_Value']."');";

        sqlHandler::getDB()->insert($query);


        if ($_POST['submit'] == "next")
        {
                //sumbit to database and refresh page for new unit input
                header("Location: ../unitentry.php?Qual_ID=$qualID");
        }
        else
        {
            header("Location: ../unitentry.php?Qual_ID=$qualID");
            //send back error saying no values input
        }
    }
}

?>
