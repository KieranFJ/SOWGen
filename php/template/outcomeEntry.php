<?php

@include('php/class.sqlHandler.userdb.php');

if (isset($_GET['Qual_ID']))
{
    $qualID = $_GET['Qual_ID'];

    $query = "SELECT * FROM qualifications WHERE Qual_ID = ".$qualID.";";

    $result = sqlHandler::getDB()->select($query);

    $query = "SELECT * FROM unit WHERE Qual_ID = ".$qualID.";";

    $resultUnits = sqlHandler::getDB()->select($query);
}
    $query = "SELECT * FROM qualifications;";

    $resultQuals = sqlHandler::getDB()->select($query);

?>
<div class="container">
    <div class="span6">
        <form action="outcomeentry.php" method="submit" class="form-horizontal">
            <fieldset>
                <legend>Qualification: <?php echo $result[0]['Qual_Name']; ?></legend>
                <div class="control-group">
                    <label class="control-label">Qual Name:</label>
                    <div class="controls">
                        <input type="hidden" name="Qual_ID" value="<?php echo $qualID ?>"></input>
                        <select name ="Qual_ID" class="input-xlarge" onchange="this.form.submit()">
                        <option value="" selected="selected" >--- Select Qual ---</option>
                        <?php
                        foreach ($resultQuals as $row)
                        {?>
                            <option value="<?php echo $row['Qual_ID']; ?>"><?php echo $row['Qual_Name']; ?></option> 
                        <?php
                        }?>
                    </select>
                    </div>
                </div>
                
            </fieldset>
        </form>
        <form action="outcomeentry.php" method="submit" class="form-horizontal">
            <fieldset>
                <legend>
                <?php 
                if (isset($_GET['Unit_ID']))
                {
                    $query = "SELECT * FROM unit WHERE Unit_ID = ".$_GET['Unit_ID'].";";

                    $resultUnit = sqlHandler::getDB()->select($query);

                    $query = "SELECT * FROM outcomes WHERE Unit_ID = ".$_GET['Unit_ID'].";";

                    $resultOutcomes = sqlHandler::getDB()->select($query);

                    echo "Unit: ".$resultUnit[0]['Unit_Name']."";

                }
                else
                {
                    echo "Unit: Select a Unit";    
                }
                ?>
                </legend>
                <div class="control-group">
                    <label class="control-label">Unit:</label>
                    <div class="controls">
                        <input type="hidden" name="Qual_ID" value="<?php echo $qualID ?>"></input>
                        <select name="Unit_ID" class="input-xlarge" onchange="this.form.submit()">
                            <option value="" selected="selected" >--- Select Unit ---</option>
                                <?php
                                foreach ($resultUnits as $row)
                                {?>
                                    <option value="<?php echo $row['Unit_ID']; ?>"><?php echo $row['Unit_Name']; ?></option> 
                                <?php
                                }?>
                        </select>
                    </div>
                </div>
            </fieldset>
        </form>
        <form action="php/outcomeSubmit.php" method="post" class="form-horizontal">
            <fieldset>
                <legend>New Outcome</legend>
                <div class="control-group">
                    <label class="control-label">New Outcome Type</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" name="Outcome_Type[]"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">New Outcome Name</label>
                    <div class="controls">
                        <textarea class="input-xlarge" name="Outcome_Name[]"></textarea>
                    </div>
                </div>                
            </fieldset>
            <fieldset>
                <legend>Existing Outcomes</legend>
                <?php
                foreach($resultOutcomes as $row)
                {?> 
                <div class="control-group">
                    <label class="control-label">Outcome Type</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" onchange="this.form.addClass('inputClass')" value="<?php echo $row['Outcome_Type']?>" name="Outcome_Type[]"></input>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Outcome Name</label>
                    <div class="controls">
                        <textarea name="Outcome_Name[]" class="input-xlarge"><?php echo $row['Outcome_Name']?></textarea>
                    </div>                   
                </div>
                <?php }?>  
            </fieldset>
            <div class="form-actions">
                    <input type="hidden" name="Unit_ID" value="<?php echo $_GET['Unit_ID'];?>"></input>
                    <input type="hidden" name="Qual_ID" value="<?php echo $_GET['Qual_ID']; ?>"></input>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>        
    </div>

