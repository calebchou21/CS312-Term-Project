
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


const colorError = document.querySelector("#colorFormError");
const dropdowns = document.querySelectorAll('select');

//Makes sure no two colors selected at same time
dropdowns.forEach(dropdown => {
  // Store the initial value as the previous value
  // The dataset property stores info on a specific element
  dropdown.dataset.previousValue = dropdown.value;

  dropdown.addEventListener('change', event => {
    const selectedValue = event.target.value;
    const dropdownId = event.target.id;

    // This just selects all dropdowns and selected values that aren't the 'current one'
    const otherDropdowns = Array.from(dropdowns).filter(d => d.id !== dropdownId);
    const otherSelectedValues = otherDropdowns.map(d => d.value);

    if (otherSelectedValues.includes(selectedValue)) {
      //If out current selected value is in the other vals, we need to revert it
      // Revert by grabbing the previous value from the 'current selector' dataset 
      event.target.value = event.target.dataset.previousValue;

      colorError.classList.remove('invisible');
      colorError.classList.add('error-message');
      
    } else {
      //If we can select, than we just need to change the previous value in the dataset
      let prev = event.target.dataset.previousValue;
      event.target.dataset.previousValue = selectedValue;
      colorError.classList.add('invisible');
      //We call with the actual previous value and the new previous value (actually the current value)
      changeAllCells(prev, event.target.dataset.previousValue);
    }
  });
});



function colorCell(cell) {
   // Get the selected color from the top table
   var selectorId = "selector" + (document.querySelector('input[name="options"]:checked').parentNode.parentNode.rowIndex)
   let rowCell = "row" + (document.querySelector('input[name="options"]:checked').parentNode.parentNode.rowIndex+1)

  
   let rowBox = document.getElementById(rowCell);
   var selectedColor = document.getElementById(selectorId).value;
   // Set the background color of the clicked cell to the selected color
   cell.style.backgroundColor = selectedColor;

  let cellIndex = cell.cellIndex;
  let rowIndex = cell.parentNode.rowIndex;
  let coords = String.fromCharCode(64 + cellIndex) + (rowIndex );
  let coordsText = coords + ", ";
  let coordinateArray = rowBox.value.split(" ");
  
  //Organize alphabetically
  if(coordinateArray.includes(coordsText.trim())){
    return;
  }
  else{
    coordinateArray.push(coordsText);
    coordinateArray.sort();
    rowBox.value = coordinateArray.join(" ");
  }
}

// Create an object to store the current color for each row
const currentColors = {};

// Get all of the color dropdowns
const dropdownss = document.querySelectorAll('select');

// Attach a change listener to each dropdown
dropdownss.forEach(dropdown => {
  const index = dropdown.id.slice(-1);

  // Set the initial color of the row
  currentColors[index] = dropdown.value.toLowerCase();

  dropdown.addEventListener('change', event => {
    const newColor = event.target.value.toLowerCase();
    const oldColor = currentColors[index];

    // Update the current color of the row
    currentColors[index] = newColor;

    // Get all of the cells in the bottom table
    const cells = document.querySelectorAll('#table2 td');

    // Loop through the cells and update their color if necessary
    cells.forEach(cell => {
      if (cell.style.backgroundColor === oldColor) {
        cell.style.backgroundColor = newColor;
      }
    });
  });
});



 







