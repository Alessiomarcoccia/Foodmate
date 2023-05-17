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
    'nome' : 'Name',
    'cognome': 'Surname',
    'account': "Don't have an account?",
    'register': 'Register',
    'header': "Foodmate allows you to manage your pantry in a smart way, so you don't have to throw away food anymore",
    'letsgo': "Let's go!",
    'ricette': 'Recipes',
    'logout':'Logout',
    'colazione': 'Breakfast',
    'pranzo': 'Lunch',
    'cena': 'Dinner',
    'snack': 'Snack',
    'macedonia_title':'Fruit salad',
    'macedonia_desc':'Summer is when the fruit salad becomes your best friend, with its sweetness and freshness that refresh you on hot summer days.',
    'vellutata di verdure_title':'Vegetable soup',
    'vellutata di verdure_desc':'The vegetable soup is a creamy and delicate first course, perfect for cold winter days.',
    'paella_title':'Paella',
    'paella_desc':'The paella is a typical Spanish dish, based on rice and fish, which is prepared in a large pan.',
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
    'nome': 'Nome',
    'cognome': 'Cognome',
    'account': 'Non hai un account?',
    'register': 'Registrati',
    'header': 'Foodmate ti permette di gestire la tua dispensa in modo intelligente, cosi da non dover più buttare cibo',
    'letsgo': "Iniziamo!",
    'ricette': 'Ricette',
    'logout':'Esci',
    'colazione': 'Colazione',
    'pranzo': 'Pranzo',
    'cena': 'Cena',
    'snack': 'Snack',
    'macedonia_title':'Macedonia di frutta',
    'macedonia_desc':'Estate è quando la macedonia di frutta diventa la tua migliore amica,con la sua dolcezza e freschezza che ti rinfrescano nelle calde giornate estive.',
    'vellutata di verdure_title':'Vellutata di verdure',
    'vellutata di verdure_desc':'La vellutata di verdure è un primo piatto cremoso e delicato, perfetto per le giornate fredde invernali.',
    'paella_title':'Paella',
    'paella_desc':'La paella è un piatto tipico spagnolo, a base di riso e pesce, che viene preparato in una grande padella.',
  }
};

// The default language is English
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
});
