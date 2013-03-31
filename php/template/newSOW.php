<?php
//@todo have qual and unit selects highlight chosen option

@include('php/class.sqlHandler.userdb.php');

$query = "SELECT Qual_Name, Qual_ID FROM qualifications"; 

$resultQual = sqlHandler::getDB()->select($query);

if(isset($_GET['Qual_ID']))
{
    $query = "SELECT * FROM qualifications WHERE Qual_ID = '".$_GET['Qual_ID']."';";
    
    $resultSelectedQual = sqlHandler::getDB()->select($query);
}

$query = "SELECT Unit_Name, Unit_ID FROM unit WHERE Qual_ID = '".$_GET['Qual_ID']."';";

$resultUnit = sqlHandler::getDB()->select($query);

if(isset($_GET['Unit_ID']))
{
    $query = "SELECT * FROM unit WHERE Unit_ID = '".$_GET['Unit_ID']."';";
    
    $resultSelectedUnit = sqlHandler::getDB()->select($query);
}

/*$query = "SELECT * FROM outcomes 
            JOIN criteria 
            ON outcomes.Outcome_ID = criteria.Outcome_ID 
        WHERE Unit_ID = '".$_GET['Unit_ID']."';";     */   

$query = "SELECT * FROM outcomes WHERE Unit_ID = '".$_GET['Unit_ID']."';";        


$resultOutcomes =  sqlHandler::getDB()->select($query);

?>

<div class="container">
    <div class="span6">
            <form action="newsow.php" method="submit" class="form-horizontal">
            <fieldset>
                <legend>Choose Qualification</legend>
                <div class="control-group">
                    <label class="control-label">Qualification: </label>
                    <div class="controls">
                        <select name="Qual_ID" class="input-xlarge" onchange="this.form.submit()">
                            <option value="">-- Qual --</option>
                            <?php                        
                            foreach($resultQual as $row)
                            {?>
                            <option value="<?php echo $row['Qual_ID'];?>"><?php echo $row['Qual_Name']; ?></option>
                            <?php
                            }?>                  
                        </select>
                    </div>
                </div>
            </fieldset>
        </form>
        <form action="newsow.php" method="submit" class="form-horizontal">
            <fieldset>
                <legend>Choose Unit</legend>
                <div class="control-group">
                    <label class="control-label">Unit: </label>
                    <div class="controls">
                        <input type="hidden" name="Qual_ID" value="<?php echo $_GET['Qual_ID']?>"></input>
                        <select name="Unit_ID" class="input-xlarge" onchange="this.form.submit()">
                            <option value="">-- Unit --</option>
                            <?php                        
                            foreach($resultUnit as $row)
                            {?>
                            <option value="<?php echo $row['Unit_ID'];?>"><?php echo $row['Unit_Name']; ?></option>
                            <?php
                            }?>
                        </select>
                    </div>
                </div>
            </fieldset>
        </form>   

        <form action="php/SOWSubmit.php" method="post" class="form-horizontal">
            <fieldset>
                <legend>Additional Information</legend>
                <div class="control-group">
                    <label class="control-label">SOW Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="SOW_Name"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Campus</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="SOW_Campus"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Room Type</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="SOW_Room_Type"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Room Number</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="SOW_Room_Number"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tutor</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="SOW_Tutor"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">TA</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="SOW_TA"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Course Leader</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="SOW_Course_Leader"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">IV Name</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="SOW_IV_Name"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Class Size</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="SOW_Class_Size"></input>
                    </div>
                </div>
                
                <div class="form-actions">
                    <input type="hidden" name="Qual_ID" value="<?php echo $_GET['Qual_ID']; ?>"></input>
                    <input type="hidden" name="Unit_ID" value="<?php echo $_GET['Unit_ID']; ?>"></input>
                    <button type="submit" class="btn btn-primary">Submit</button>                    
                </div>
            </fieldset>
        </form>
    </div>
    