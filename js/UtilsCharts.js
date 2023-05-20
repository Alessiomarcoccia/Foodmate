function colors(tipologie){
  var colori = {
    frutta:"rgb(34,139,34)",
    verdura:"rgb(135, 206, 235)",
    carne: "rgb(139, 69, 19)",
    cereali: "rgb(255, 215, 0)",
    pesce: "rgb(0, 119, 190)",
    dolce: "rgb(255, 99, 71)",
    latticini: "rgb(248, 240, 221)",
    altro: "rgb(128, 128, 128)"
  }

  var backgroundColors = [];
  for (var i = 0; i <tipologie.length; i++) {
      backgroundColors.push(colori[tipologie[i]]);
    }
  return backgroundColors;

}


function convertLabels(labels){
  var mesi ={
    "1":"Gennaio",
    "2":"Febbraio",
    "3":"Marzo",
    "4":"Aprile",
    "5":"Maggio",
    "6":"Giugno",
    "7":"Luglio",
    "8":"Agosto",
    "9":"Settembre",
    "10":"Ottobre",
    "11":"Novembre",
    "12":"Dicembre"
  }
  var newLabels = [];
  for (var i = 0; i <labels.length; i++) {
      newLabels.push(mesi[labels[i]]);
    }
  return newLabels;


  /* function translateLabels(labels){
    rez = [];
    for (var i = 0; i <labels.length; i++) {
      rez.push(translate(labels[i]));
    }
    return rez;
  } */

}


