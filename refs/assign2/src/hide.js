function hide() {
  var combobox = document.getElementById("product").value;
  var enigma = document.getElementById("enigma-package");
  var vertex = document.getElementById("vertex-package");
  var noselect = document.getElementById("no-package");
  
  switch (combobox) {
    case "enigma":
      noselect.style.display = "none";
      vertex.style.display = "none";
      enigma.style.display = "block";
      break;
    case "vertex":
      noselect.style.display = "none";
      vertex.style.display = "block";
      enigma.style.display = "none";
      break;
    default:
      noselect.style.display = "block";
      vertex.style.display = "none";
      enigma.style.display = "none";
      break;
  }
}