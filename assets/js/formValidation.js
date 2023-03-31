
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
   let rowColsArr = [];
   rowCols = rowCols.trim();
   rowColsArr = rowCols.split("/");
   rowColsArr = rowColsArr.filter(e => String(e).trim());
   rowColValid = (rowColsArr.length == 2) && !rowColsArr.some(el => el > 26) && !rowColsArr.some(el => el < 1);
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