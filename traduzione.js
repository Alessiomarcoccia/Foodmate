var arrLang = {
  "en": {
    "slogan": "Say goodbye to waste",
    "header": "Foodmate allows you to manage your pantry in a smart way, so you don't have to throw away food anymore",
    "login": "Login",
    "signup": "Sign up",
    "letsgo": "Let's go!",
  },
  "it": {
    "slogan": "Dì addio allo spreco",
    "header": "Foodmate ti permette di gestire la tua dispensa in modo intelligente,cosi da non dover più buttare cibo",
    "login": "Accedi",
    "signup": "Registrati",
    "letsgo": "Iniziamo!",
  }

};


// La lingua di default è l'italiano
var lang = "it";
// Controllo se è presente una lingua salvata in local storage
if ('localStorage' in window) {
  var usrLang = localStorage.getItem('uiLang');
  if (usrLang) {
    lang = usrLang
  }
}

$(document).ready(function () {
  // Traduco la pagina
  $(".lang").each(function (index, element) {
    $(this).text(arrLang[lang][$(this).attr("key")]);
  });
  });

//Quando clicco su un pulsante per cambiare lingua
$(".translate").click(function () {

  var lang = $(this).attr("id");
  // Salvo la lingua in local storage
  $(".lang").each(function (index, element) {
    $(this).text(arrLang[lang][$(this).attr("key")]);
  });
});