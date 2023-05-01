
//Color number input validation
let colorValid = false;
let colorWidget = document.querySelector("#num-colors");
let colorErrorMessage = document.querySelector("#colorError")
colorWidget.addEventListener("keyup", checkColorNum);

function checkColorNum() {
    let colorInput = colorWidget.value;
    colorValid = colorInput >= 1 && colorInput <= 10;
    return colorValid;
}

//Row-Columns input validation
let rowColValid = false;
let rowColWidget = document.querySelector("#rows-columns");
let rowColErrorMessage = document.querySelector("#rowColError");
rowColWidget.addEventListener("keyup", checkRowCols);

function checkRowCols(){
   let rowCols = rowColWidget.value;
   rowColValid = rowCols >=1 && rowCols <= 26;
   return rowColValid;
}

//Validate form on submit
let formWidget = document.querySelector("#color-form");
formWidget.addEventListener("submit", checkForm);

function checkForm(event) {

   if (!checkRowCols() || !checkColorNum()) {
      event.preventDefault();
   }

   if(!checkRowCols()){
      rowColWidget.classList.add("invalid");
      rowColErrorMessage.classList.remove("invisible")
      rowColErrorMessage.classList.add("error-message");
   }else{
      rowColWidget.classList.remove("invalid");
      rowColErrorMessage.classList.add("invisible")
      rowColErrorMessage.classList.remove("error-message");
   }

   if(!checkColorNum()){
      colorWidget.classList.add("invalid");
      colorErrorMessage.classList.remove("invisible")
      colorErrorMessage.classList.add("error-message")
   }else{
      colorWidget.classList.remove("invalid");
      colorErrorMessage.classList.remove("error-message");
      colorErrorMessage.classList.add("invisible")
   }
 
   
}

let allSelectors = document.getElementsByTagName("select");
let colorError = document.querySelector("#colorFormError");


function validateDropdown(){
   let options = document.querySelectorAll(".colorOption");
   var selected = [];
   var colors = ['red','orange','yellow','green','blue','purple','grey','brown','black','teal'];
   var count = -1;
   for(x of allSelectors){
      selected.push(x.value);
      count++;
      if((new Set(selected)).size !== selected.length){
         colorError.classList.remove("invisible");
         colorError.classList.add("error-message");
         x.value = colors[count];
      }else{
         colorError.classList.remove("error-message");
         colorError.classList.add("invisible");
      }
   }
  
}


function colorCell(cell) {
   // Get the selected color from the top table
   var selectorId = "selector" + (document.querySelector('input[name="options"]:checked').parentNode.parentNode.rowIndex)
   let rowCell = "row" + (document.querySelector('input[name="options"]:checked').parentNode.parentNode.rowIndex+1)
   let rowBox = document.getElementById(rowCell);
   var selectedColor = document.getElementById(selectorId).value;
   // Set the background color of the clicked cell to the selected color
   cell.style.backgroundColor = selectedColor;

   var cellIndex = cell.cellIndex;
   var rowIndex = cell.parentNode.rowIndex;
   var coords = String.fromCharCode(64 + cellIndex) + (rowIndex );

   var coordsElement = document.createElement("p");
   var coordsText = document.createTextNode(coords);
   coordsElement.appendChild(coordsText);
   rowBox.appendChild(coordsElement);
}








