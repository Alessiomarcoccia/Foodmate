var arrLang = {
  "en": {
    "chi siamo": "About us",
    "accedi": "Sign in",
    "registrati": "Sign up!",
    'slogan': 'Say goodbye to waste',
    'home': 'Home', 
    'profilo': 'Profile',
    'statistiche': 'Statistic',
    'dispense': 'Your dispense',
    'invia' : 'Submit',
    'nome' : 'name',
    'cognome': 'surname',
    'account': "Don't have account?",
    'register': 'Register',
    'header': "Foodmate allows you to manage your pantry in a smart way, so you don't have to throw away food anymore",
    'letsgo': "Let's go!",
    'logout': 'Logout',
    'nome_pro': 'Name:',
    'cognome_pro': 'Surname:',
    'sex_pro':  'Gender:',
  },

  "it": {
    "chi siamo": "Chi siamo",
    "accedi": "Accedi",
    "registrati": "Registrati!",
    "slogan" : 'Dì addio allo spreco',
    'home': 'Home',
    'profilo': 'Profilo',
    'statistiche': 'Statistiche',
    'dispense': 'Le tue dispense',
    'invia': 'Invia',
    'nome': 'nome',
    'cognome': 'cognome',
    'account': 'Non hai un account?',
    'register': 'Registrati',
    'header': 'Foodmate ti permette di gestire la tua dispensa in modo intelligente, cosi da non dover più buttare cibo',
    'letsgo': "Iniziamo!",
    'logout': 'Logout',
    'nome_pro': 'Nome:',
    'cognome_pro': 'Cognome:',
    'sex_pro': 'Sesso:',
  }
};

/* // The default language is English
var lang = "it";
// Check for localStorage support
if('localStorage' in window){
   
   var usrLang = localStorage.getItem('uiLang');
   if(usrLang) {
       lang = usrLang
   }

}

$(document).ready(function() {

  $(".lang").each(function(index, element) {
    $(this).append(arrLang[lang][$(this).attr("key")])
  });
  $(".langSidebar").each(function(index, element) {
    $(this).append(arrLang[lang][$(this).attr("key")])
  });
});

// get/set the selected language
$(".translate").click(function() {
  var lang = $(this).attr("id");

  // update localStorage key
  if('localStorage' in window){
        localStorage.setItem('uiLang', lang);
        console.log( localStorage.getItem('uiLang') );
  }

  $(".lang").each(function(index, element) {
    $(this).text(arrLang[lang][$(this).attr("key")]);
  });
  $(".langSidebar .link-text").each(function() {
    var key = $(this).parent().attr("key");
    var translatedText = arrLang[lang][key];
    if (translatedText) {
      $(this).text(translatedText);
    }
  });
}); */

var lang = "en";
// Check for localStorage support
if ('localStorage' in window) {
  var usrLang = localStorage.getItem('uiLang');
  if (usrLang) {
    lang = usrLang;
  }
}

$(document).ready(function() {
  $(".lang").each(function(index, element) {
    $(this).append(arrLang[lang][$(this).attr("key")])
  });
  
  $(".langSidebar .link-text").each(function() {
    var key = $(this).parent().attr("key");
    $(this).text(arrLang[lang][key]);
  });
});

// get/set the selected language
$(".translate").click(function() {
  var lang = $(this).attr("id");

  // update localStorage key
  if ('localStorage' in window) {
    localStorage.setItem('uiLang', lang);
    console.log(localStorage.getItem('uiLang'));
  }

  $(".lang").each(function(index, element) {
    $(this).text(arrLang[lang][$(this).attr("key")]);
  });

  $(".langSidebar .link-text").each(function() {
    var key = $(this).parent().attr("key");
    $(this).text(arrLang[lang][key]);
  });
});


