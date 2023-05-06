
function colors(tipologie){
  var colori = {
    frutta:"rgb(34,139,34)",
    verdura:"rgb(135, 206, 235)",
    carne: "rgb(139, 69, 19)",
    pesce: "rgb(255, 215, 0)",
    uova: "rgb(0, 119, 190)",
    dolce: "rgb(255, 99, 71)",
    formaggio: "rgb(128, 128, 128)"
  }

  var backgroundColors = [];
  for (var i = 0; i <tipologie.length; i++) {
      backgroundColors.push(colori[tipologie[i]]);
    }
  return backgroundColors;

}


