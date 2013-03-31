<?php



//add unit name
//add criteria
?>
<div class="container">
    <div class="span6">
        <form action="php/add_qual_submit.php" method="post" class="form-horizontal">
            <fieldset>
                <legend>Add Additional Qualification</legend>
                <div class="control-group">
                     <label class="control-label">Qual Name</label>
                     <div class="controls">
                         <input type="text" class="input-xlarge" name="addQualName"></input>
                     </div>               
                </div>
                <div class="control-group">
                    <label class="control-label">Qual Description</label>
                    <div class="controls">
                        <textarea type="textarea" class="input-xlarge" name="addQualDesc" rows="3"></textarea>                    
                    </div>  
                </div>
                <div class="control-group">
                    <label class="control-label">Criteria</label>
                    <div class="controls" id="foo">
                        <textarea class="input-xlarge" name="Criteria[]"  rows="3" style="margin: 0px 5px 5px 0px;"></textarea>                              
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class ="btn btn-primary" value="Submit">Submit</button>
                    <input type="button" id="append" value="Add Criteria" class="btn"></input>
                </div>
            </fieldset>
        </form>    
    </div>
</div>
    

<script type="text/javascript">
$(document).ready(function(){
  $("#append").click(function(){
  $("#foo").parent().append($("#foo").clone().removeAttr("id"));
  });
});
</script>