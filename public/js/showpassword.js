/*!
 * Bootstrap Show Password Toggle v1.4.1
 * Copyright 2020-2023 C.Oliff
 * Licensed under MIT (https://github.com/coliff/bootstrap-show-password-toggle/blob/main/LICENSE)
 */

$(document).ready(function(){
  let toogle = $('#toggle-password');
  let input = $('#password');

  if (toogle.prop('checked')==true) {
    input.prop('type','text');
  }else{
    input.prop('type','password');
  }

})
function showPass() {
  
  var x = document.getElementById("password");
  x.type = (x.type === "password") ? "text" : "password";
}