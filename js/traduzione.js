var arrLang = {
  "en": {
    "chi siamo": "About us",
    "accedi": "Sign in",
    "registrati": "Sign up!",
    'slogan': 'Say goodbye to waste',
    'home': 'Home', 
    'profilo': 'Profile',
    'statistiche': 'Analytics',
    'lista spesa': 'Shopping list',
    'dispense': 'Your dispense',
    'invia' : 'Submit',
    'nome' : 'Name',
    'cognome': 'Surname',
    'account': "Don't have an account?",
    'register': 'Register',
    'header': "Foodmate allows you to manage your pantry in a smart way, so you don't have to throw away food anymore",
    'letsgo': "Let's go!",
    'logout': 'Exit',
    'nome_pro': 'Name:',
    'cognome_pro': 'Surname:',
    'sesso_pro':  'Gender:',
    'ricette': 'Recipes',
    'logout':'Logout',
    'no_ricette':'There are no recipes to show',
    'colazione': 'Breakfast',
    'primo': 'First course',
    'secondo': 'Second course',
    'snack': 'Snack',
    'dessert': 'Dessert',
    'macedonia_title':'Fruit salad',
    'macedonia_desc':'Summer is when the fruit salad becomes your best friend, with its sweetness and freshness that refresh you on hot summer days.',
    'vellutata di verdure_title':'Vegetable soup',
    'vellutata di verdure_desc':'The vegetable soup is a creamy and delicate first course, perfect for cold winter days.',
    'paella_title':'Paella',
    'paella_desc':'The paella is a typical Spanish dish, based on rice and fish, which is prepared in a large pan.',
    'spiedini_title':'Meat skewers',
    'spiedini_desc':'The meat skewers are a very tasty and easy to prepare second course, perfect for a dinner with friends.',
    'torta di mele_title':'Apple pie',
    'torta di mele_desc':'The apple pie is a simple and genuine dessert, perfect for breakfast or a snack.',
  },

  "it": {
    "chi siamo": "Chi siamo",
    "accedi": "Accedi",
    "registrati": "Registrati!",
    "slogan" : 'Dì addio allo spreco',
    'home': 'Home',
    'profilo': 'Profilo',
    'statistiche': 'Statistiche',
    'lista spesa': 'Lista della spesa',
    'dispense': 'Le tue dispense',
    'invia': 'Invia',
    'nome': 'Nome',
    'cognome': 'Cognome',
    'account': 'Non hai un account?',
    'register': 'Registrati',
    'header': 'Foodmate ti permette di gestire la tua dispensa in modo intelligente, cosi da non dover più buttare cibo',
    'letsgo': "Iniziamo!",
    'logout': 'Esci',
    'nome_pro': 'Nome:',
    'cognome_pro': 'Cognome:',
    'sesso_pro': 'Sesso:',
    'ricette': 'Ricette',
    'logout':'Esci',
    'no_ricette':'Non ci sono ricette da mostrare',
    'colazione': 'Colazione',
    'primo': 'Primo',
    'secondo': 'Secondo',
    'snack': 'Snack',
    'dessert': 'Dolce',
    'macedonia_title':'Macedonia di frutta',
    'macedonia_desc':'Estate è quando la macedonia di frutta diventa la tua migliore amica,con la sua dolcezza e freschezza che ti rinfrescano nelle calde giornate estive.',
    'vellutata di verdure_title':'Vellutata di verdure',
    'vellutata di verdure_desc':'La vellutata di verdure è un primo piatto cremoso e delicato, perfetto per le giornate fredde invernali.',
    'paella_title':'Paella',
    'paella_desc':'La paella è un piatto tipico spagnolo, a base di riso e pesce, che viene preparato in una grande padella.',
    'spiedini_title':'Spiedini di carne',
    'spiedini_desc':'Gli spiedini di carne sono un secondo piatto molto gustoso e semplice da preparare, perfetto per una cena tra amici.',
    'torta di mele_title':'Torta di mele',
    'torta di mele_desc':'La torta di mele è un dolce semplice e genuino, perfetto per la colazione o la merenda',
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


