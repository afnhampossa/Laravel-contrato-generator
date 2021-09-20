const combo = document.getElementById("combobox");
combo.addEventListener("click", toggleCombo, false);
function toggleCombo() {
  var comboList = document.getElementById("combobox-list");
  comboList.classList.toggle("hide");
}


function selectComboList(elementText) {
  combo.innerText = elementText;
    toggleCombo(); 
  }