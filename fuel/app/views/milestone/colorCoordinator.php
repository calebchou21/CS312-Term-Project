<form action="get" id="color-form">
    <label for="rows-columns">Enter number of rows and columns (Rows/Columns):</label>   
    <input type="text" id="rows-columns" name="rows-columns" placeholder="Rows / Columns">
    <label for="num-colors">Enter number of colors:</label>  
    <input type="number" id="num-colors" name="num-colors">
    <button type="submit">Submit</button>
</form> 

<?php echo Asset::js("formValidation.js"); ?>
