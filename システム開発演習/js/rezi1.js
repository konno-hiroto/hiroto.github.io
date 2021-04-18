var c = calc(document.getElementById("text"));
var btns = document.getElementsByTagName("button");
for(var i=0; b=btns[i]; i++){
  b.onclick = function(){c[this.innerHTML]();};
}