<?php

@include('class.sqlhandler.userdb.php');

$i = 0;

while($i < count($_POST['Add_Qual_ID']))
{
    $query = "INSERT INTO schemeaddqual( SOW_ID, AddQual_ID)
        VALUES ('".$_POST['SOW_ID']."','".$_POST['Add_Qual_ID'][$i]."');";
    
    $i++;
    
    sqlHandler::getDB()->insert($query);
}

$out = "../newLessonPlan.php?SOW_ID=".$_POST['SOW_ID'];

header("Location: $out");

?>
