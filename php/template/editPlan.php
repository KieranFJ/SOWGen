<?php

@include_once('php/class.sqlHandler.userdb.php');

if($_GET['SOW_ID'])
{
    $query = "SELECT * FROM schemeofwork WHERE SOW_ID = '".$_GET['SOW_ID']."';";
    
    $resultSOW = sqlHandler::getDB()->select($query);
    
    $query = "SELECT * FROM qualifications WHERE Qual_ID = '".$resultSOW[0]['Qual_ID']."';";
    
    $resultSelectedQual = sqlHandler::getDB()->select($query);
    
    $query = "SELECT * FROM unit WHERE Unit_ID= '".$resultSOW[0]['Unit_ID']."';";
    
    $resultSelectedUnit = sqlHandler::getDB()->select($query);
    
    $query = "SELECT * FROM outcomes WHERE Unit_ID = '".$resultSOW[0]['Unit_ID']."';";
    
    $resultOutcomes = sqlHandler::getDB()->select($query);
}
else
{
    header('Location: newLessonPlan.php');
}
if($_GET['LP_ID'])
{
    $query = "SELECT * FROM lessonplans WHERE LP_ID = '".$_GET['LP_ID']."';";
    
    $resultLessonPlan = sqlHandler::getDB()->select($query);
}
    
?>

<script src="js/timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/timepicker.css">
<link rel="stylesheet" type="text/css" href="css/rainbow.css">
<script>
    $(function() {
        $('#basicExample').timepicker({'scrollDefaultNow': true});
    });
</script>
<!-- TimePicker:
    http://jonthornton.github.com/jquery-timepicker/
    https://github.com/jonthornton/jquery-timepicker
-->
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/rainbow.js"></script>
<!-- Datepicker: 
    https://github.com/eternicode/bootstrap-datepicker 
    http://www.eyecon.ro/bootstrap-datepicker/
-->

<div class="container">
    <div class="span6">
        <form action="php/submitLessonPlan.php" class="form-horizontal" method="post">
            <fieldset>
                <legend>Select Date</legend>
                <div class="control-group">
                    <label class="control-label">Date</label>  
                    <div class="controls">                    
                        <div class="input-append date" id="datepicker" data-date="01-01-2012" data-date-format="dd-mm-yyyy">
                            <input class="input-medium" size="16" type="text" name="LP_Date" value="<?php
                                $out = ($resultLessonPlan[0]['LP_Date'] 
                                        ? date('d-m-Y', strtotime($resultLessonPlan[0]['LP_Date'])) 
                                        : date('d-m-Y', strtotime('now')));
                                echo $out; ?>">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>  
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Time</label>
                    <div class="controls">	
                        <input id="basicExample" type="text" class="time input-medium" name="LP_Time" value="
                               <?php 
                               if($resultLessonPlan[0]['LP_Time'])
                               {
                                   echo $resultLessonPlan[0]['LP_Time'];
                               }
                               ?>">                        
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Lesson Aim</label>
                    <div class="controls">
                        <textarea class="input-xlarge" rows="4" name="LP_Aim"><?php                               
                               if($resultLessonPlan[0]['LP_Aim'])
                               {
                                   echo $resultLessonPlan[0]['LP_Aim'];
                               }
                               ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Learning Outcomes</label>
                    <div class="controls">
                        <textarea class="input-xlarge" rows="4" name="LP_Learning_Outcomes"><?php 
                               if($resultLessonPlan[0]['LP_Learning_Outcomes'])
                               {
                                   echo $resultLessonPlan[0]['LP_Learning_Outcomes'];
                               }
                               ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Exceptional Circumstances</label>
                    <div class="controls">
                        <textarea class="input-xlarge" rows="4" name="LP_Excep_Circ"><?php 
                               if($resultLessonPlan[0]['LP_Excep_Circ'])
                               {
                                   echo $resultLessonPlan[0]['LP_Excep_Circ'];
                               }
                               ?></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Notes</label>
                    <div class="controls">
                        <textarea class="input-xlarge" rows="4" name="LP_Notes"><?php 
                               if($resultLessonPlan[0]['LP_Notes'])
                               {
                                   echo $resultLessonPlan[0]['LP_Notes'];
                               }
                               ?></textarea>
                    </div>
                </div>
                <div class="form-actions">
                    <input type="hidden" name="SOW_ID" value="<?php echo $_GET['SOW_ID']; ?>">
                    <?php if($_GET['LP_ID'])
                    {
                        echo "<input type=\"hidden\" name=\"LP_ID\" value=\"".$_GET['LP_ID']."\">";
                    }?>                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="php/lessonPlanPrint?SOW_ID=<?php echo $_GET['SOW_ID'] ?>&LP_ID=<?php echo $_GET['LP_ID']; ?>" class="btn btn-success">Print</a>
                </div>                
            <fieldset>
        </form>              
    </div>
<script type="text/javascript">
    $('#datepicker').datepicker({
        format: 'dd-mm-yyyy'
    });
</script>

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
            <tr>
                <td class="tdright"><h4>Class Size:</h4></td>
                <td class="tdleft"><?php echo $resultSOW[0]['SOW_Class_Size']; ?></td>
            </tr>
        </table>
