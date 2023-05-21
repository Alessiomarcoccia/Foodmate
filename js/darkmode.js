function toggleDarkMode() {
  var body = document.getElementsByTagName("body")[0];
  var buttons = document.getElementsByClassName("btn");
  var profilo = document.getElementsByClassName("profilo")[0];
  var contents = document.getElementsByClassName("contents");
  var linktext = document.getElementsByClassName("link-text");
  var modalcontent = document.getElementsByClassName("modal-content");
  var lang = document.getElementsByClassName("lang");
  if(body != null) body.classList.toggle("dark-mode");
  
  if(buttons != null) {
  for (var i = 0; i < buttons.length; i++) {
    buttons[i].classList.toggle("dark-mode-btn");
   }
  }

  if(profilo != null) profilo.classList.toggle("dark-mode");
  
  if(contents != null) {
  for (var i = 0; i < contents.length; i++) {
    contents[i].classList.toggle("dark-mode");
    }
  }

  if(linktext != null){
  for (var i = 0; i < linktext.length; i++) {
    linktext[i].classList.toggle("dark-mode");
    }
  }

  if(lang!= null){
    for (var i = 0; i < lang.length; i++) {
      lang[i].classList.toggle("dark-mode");
    }
  } 
  
  if(modalcontent != null){
    for (var i = 0; i < modalcontent.length; i++) {
    modalcontent[i].classList.toggle("dark-mode");
    }
  }

  /* console.log(profilo.classList); */
  var isDarkModeEnabled = body.classList.contains("dark-mode");
  localStorage.setItem("darkModeEnabled", isDarkModeEnabled);
}

window.addEventListener("DOMContentLoaded", function () {
  var isDarkModeEnabled = localStorage.getItem("darkModeEnabled");
  /* console.log(isDarkModeEnabled); */
  if (isDarkModeEnabled === "true") {
    toggleDarkMode();
  }
});

$(document).on("click", ".dark-mode-toggle", function () {
  toggleDarkMode();
});