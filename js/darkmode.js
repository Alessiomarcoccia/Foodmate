// funzione che esegue il toggle della classe dark-mode su tutti gli elementi che devono essere in dark mode
function toggleDarkMode() {

  //creo una variabile che prende il body della pagina e gli eseguo il toggle della classe dark-mode
  var body = document.getElementsByTagName("body")[0];
  if(body != null) body.classList.toggle("dark-mode");

  //creo un array di elementi che devono essere in dark mode
  var elements = ["btn", "profilo", "contents", "link-text", "modal-content", "lang"];

  //uso un ciclo for per prendere tutti gli elementi che devono essere in dark mode
  for (var i = 0; i < elements.length; i++) {
    var element = document.getElementsByClassName(elements[i]);
    //poi se l'elemento non è nullo eseguo il toggle della classe dark-mode
    if (element != null) {
      for (var j = 0; j < element.length; j++) {
        element[j].classList.toggle("dark-mode");
      }
    }
  }

  //infine salvo il valore della variabile dark-mode in local storage
  var isDarkModeEnabled = body.classList.contains("dark-mode");
  localStorage.setItem("darkModeEnabled", isDarkModeEnabled);
}


//funzione che controlla se il dark mode è abilitato o meno, se è abilitato esegue il toggle della classe dark-mode
window.addEventListener("DOMContentLoaded", function () {
  var isDarkModeEnabled = localStorage.getItem("darkModeEnabled");
  if (isDarkModeEnabled === "true") {
    toggleDarkMode();
  }
});

//funzione che esegue il toggle del dark mode quando viene cliccato il bottone
$(document).on("click", ".dark-mode-toggle", function () {
  toggleDarkMode();
});