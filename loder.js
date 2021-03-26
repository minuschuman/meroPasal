document.onreadystatechange = function () {
var state = document.readyState
//state.src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js";
//state.async = false;
if (state == 'interactive') {
     targList=document.getElementsByClassName('body');
     document.getElementsByClassName('body')
     if (targList) {
      for (var x = 0; x < targList.length; x++) {
        targList[x].style.visibility = "hidden";
        }
    }
  } else if (state == 'complete') {
    setTimeout(function(){
       document.getElementById('interactive');
       document.getElementById('load').style.visibility="hidden";
        targList=document.getElementsByClassName('body');
        //.style.visibility="visible";
        document.getElementsByClassName('body')
        if (targList) {
         for (var x = 0; x < targList.length; x++) {
           targList[x].style.visibility = "visible";
           }
       }
    },1000);
}
}
