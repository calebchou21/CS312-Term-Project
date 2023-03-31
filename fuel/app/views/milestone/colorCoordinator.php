 <?php  echo Asset::js("formValidation.js", array('defer'=>''));  ?>  

<form method="get" id="color-form">
    <label for="rows-columns">Enter number of rows and columns (Rows/Columns):</label>   
    <p class="invisible" id="rowColError">Please enter input as rows / columns</p>
    <input type="text" id="rows-columns" name="rows-columns" placeholder="Rows / Columns">
    <label for="num-colors">Enter number of colors:</label>
    <p class="invisible" id="colorError">Please enter number 1-10</p>  
    <input type="number" id="num-colors" name="num-colors">
    <button type="submit">Submit</button>
</form> 


