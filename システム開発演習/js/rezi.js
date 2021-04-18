var calc = function(t){
  t.value = "";
  var mem = 0;
  var ope = "";
  var f00 = true;
  var getText = function(){
    var tv = Number(t.value);
    return (isNaN(tv)) ? 0 : tv;
  }
  var answer = function(){
    var tv = getText();
    switch(ope){
      case "+": return mem+tv; break;
      case "-": return mem-tv; break;
      case "*": return mem*tv; break;
      case "/": return mem/tv; break;
    }
  }
  var num = function(n){
    if(f00)t.value="";
    t.value += n;
    f00 = false;
  }
  var sym = function(k){
    if(f00 && k=="-"){
      t.value="-";
      f00 = false;
      return;
    }
    mem = (ope=="") ? getText() : answer();
    t.value = mem;
    f00 = true;
    ope = k;
  }
  return {
    "0":function(){num(0);},
    "1":function(){num(1);},
    "2":function(){num(2);},
    "3":function(){num(3);},
    "4":function(){num(4);},
    "5":function(){num(5);},
    "6":function(){num(6);},
    "7":function(){num(7);},
    "8":function(){num(8);},
    "9":function(){num(9);},
    "+":function(){sym("+");},
    "-":function(){sym("-");},
    "*":function(){sym("*");},
    "/":function(){sym("/");},
    ".":function(){
      if(f00){
        t.value = "0.";
        f00 = false;
      }else if(t.value.indexOf('.') == -1){
        t.value += ".";
      }
    },
    "=":function(){
      if(ope == "" || t.value == "") return;
      var a = answer();
      t.value = a;
      mem = a;
      ope = "";
    },
    "C":function(){
      t.value = "";
      mem = 0;
      ope = "";
      f00 = true;
    },
      
     "AC":function(){
      t.value = "";
      mem = 0;
      ope = "";
      f00 = true;
    }, 
  };
};