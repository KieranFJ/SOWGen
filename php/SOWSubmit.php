<?php
//@todo send posted date to the next page without having to query DB again

@include('class.sqlhandler.userdb.php');


$query = "INSERT INTO schemeofwork 
            (Qual_ID, Unit_ID, Sow_Name, SOW_Campus, SOW_Room_Type, SOW_Room_Number, SOW_Tutor, 
                SOW_TA, SOW_Course_Leader, SOW_IV_Name, SOW_Class_Size)
            VALUES ('".$_POST['Qual_ID']."','".$_POST['Unit_ID']."','".$_POST['SOW_Name']."',
                '".$_POST['SOW_Campus']."','".$_POST['SOW_Room_Type']."','".$_POST['SOW_Room_Number']."',
                '".$_POST['SOW_Tutor']."','".$_POST['SOW_TA']."','".$_POST['SOW_Course_Leader']."',
                '".$_POST['SOW_IV_Name']."', '".$_POST['SOW_Class_Size']."');";



$result = sqlHandler::getDB()->insert($query);

$out = "../newsowadd.php?Qual_ID=".$_POST['Qual_ID']."&Unit_ID=".$_POST['Unit_ID']."&SOW_ID=$result";

header("Location: $out")

?>

