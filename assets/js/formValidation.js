
//Color Number Input
let colorValid = false;
let colorWidget = document.querySelector("#num-colors");
colorWidget.addEventListener("input", checkColorNum);

function checkColorNum() {
    let colorInput = colorWidget.value;
    colorValid = colorInput >= 1 && colorInput <= 10;
}

//Row-Columns Input
let rowColValid = false;
let rowColWidget = document.querySelector("#rows-columns");
rowColWidget.addEventListener("input", checkRowCols);

function checkRowCols(){
   let rowCols = rowColWidget.value;
   let rowColsArr = [];
   rowCols = rowCols.trim();
   rowColsArr = rowCols.split("/");
   rowColsArr = rowColsArr.filter(e => String(e).trim());
   rowColValid = (rowColsArr.length == 2) && !rowColsArr.some(el => el > 26) && !rowColsArr.some(el => el < 1);
}

//Validate form
let formWidget = document.querySelector("#color-form");
formWidget.addEventListener("submit", checkForm);

function checkForm(event) {
   if (!colorValid || !rowColValid) {
      event.preventDefault();
   }
}