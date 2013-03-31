<?php


if (($_POST['addQualName'] == "") || ($_POST['addQualDesc'] == ""))
{
    echo "one not filled in";
    //@todo send back message
}
else
{
    @include('class.sqlHandler.userdb.php');
    
    $query = "SELECT * FROM additionalqual 
        WHERE Add_Qual_Name = '".$_POST['addQualName']."' 
            OR Add_Qual_Desc = '".$_POST['addQualDesc']."';";

    $result = sqlHandler::getDB()->select($query);
    
    if($result == 0)
    {
        $query = "INSERT INTO additionalqual (Add_Qual_Name, Add_Qual_Desc) 
            VALUES ('".$_POST['addQualName']."', '".$_POST['addQualDesc']."');";

        $resultID = sqlHandler::getDB()->insert($query);

        for($i = 0, $size = count($_POST['Criteria']); $i < $size; $i++)
        {
            $query = "INSERT INTO additionalqualcriteria (Add_Qual_ID, Add_Qual_Crit_Desc) 
                VALUES ('".$resultID."','".$_POST['Criteria'][$i]."');";

            sqlHandler::getDB()->insert($query);
        }
        
    }
    else
    {
        echo "already exist";
        //@todo send back message
    }           
}

Header("Location: ../addqualentry.php");
?>
