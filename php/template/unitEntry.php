<?php

@include('php/class.sqlHandler.userdb.php');

$qualID = $_GET['Qual_ID'];

$query = "SELECT * FROM qualifications WHERE Qual_ID = ".$qualID.";";

$result = sqlHandler::getDB()->select($query);

$query = "SELECT * FROM unit WHERE Qual_ID = ".$qualID.";";

$resultUnit = sqlHandler::getDB()->select($query);

?>  
<div class="container">
    <div class="span6">
    <form action="php/new_unit_submit.php" method="post" class="form-horizontal">
        <fieldset>
            <legend>Qualification Name: <?php echo $result[0]['Qual_Name']; ?></legend>
            <div class="control-group">
                <label class="control-label">Unit Name:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="Unit_Name"></input>
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label">Unit Code:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name ="Unit_Code"></input>                    
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Credit Value:</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" name="Unit_Credit_Value"></input>
                </div>
            </div>
            <div class="form-actions">
                <input type="hidden" name="Qual_ID" value="<?php echo $qualID; ?>"></hidden>
                <button type="submit" class="btn btn-primary"value="final">Finish</button>
                <button type="submit" class="btn" value="next">Next</button>
            </div>
            
        </fieldset>       
    </form>
    </div>    

