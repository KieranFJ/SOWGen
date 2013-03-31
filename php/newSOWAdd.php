<?php

@include('class.sqlhandler.userdb.php');

$query = "SELECT * FROM qualifications WHERE Qual_ID = '".$_GET['Qual_ID']."';";

$resultSelectedQual = sqlHandler::getDB()->select($query);

$query = "SELECT * FROM unit WHERE Unit_ID = '".$_GET['Unit_ID']."';";

$resultSelectedUnit = sqlHandler::getDB()->select($query);

$query = "SELECT * FROM outcomes WHERE Unit_ID = '".$_GET['Unit_ID']."';"; 

$resultOutcomes = sqlHandler::getDB()->select($query);

$query = "SELECT * FROM schemeofwork WHERE SOW_ID = '".$_GET['SOW_ID']."';";

$resultSOW = sqlHandler::getDB()->select($query);

$query = "SELECT * FROM additionalqual;";

$resultAddQual = sqlHandler::getDB()->select($query);

?>

<div class="container">
    <div class="span6">
        <form action="php/newSOWAddSubmit.php" method="post" class="form-horizontal">
            <fieldset>
                <legend>Additional Qualifications</legend>                
                <?php
                foreach($resultAddQual as $row)
                {?>
                <div class="control-group">
                    <label class="control-label"><?php echo $row['Add_Qual_Name']?></label>
                    <div class="controls">
                        <input type="checkbox" name="Add_Qual_ID[]" value="<?php echo $row['Add_Qual_ID']?>"></input>
                    </div>
                </div>                
                <?php
                }?>
                <div class="form-actions">
                    <input type="hidden" name="SOW_ID" value="<?php echo $_GET['SOW_ID']; ?>"></hidden>
                    <input type="submit" class="btn btn-primary"></input>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="span5">
        <table class="table-condensed">
            <thread>
                <tr>
                    <td class="tdright"><h3>SOW Details</h3></td>
                </tr>
            </thread>
            <tr>
                <td class="tdright"><h4>Name:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Name']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Campus:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Campus']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Room Type:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Room_Type']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Room Number:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Room_Number']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Tutor Name:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Tutor']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>TA:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_TA']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>Course Leader:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Course_Leader']; ?></td>
            </tr>
            <tr>
                <td class="tdright"><h4>IV Name:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_IV_Name']; ?></td>
            </tr>
        </table>
    
        