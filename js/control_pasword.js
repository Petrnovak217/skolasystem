 //control_password
 const password = document.querySelector(".password-reg");
 const control_password = document.querySelector(".con-password-reg");
 const message = document.querySelector(".result-text");
 
 function checkPassword(){
     let value_password = password.value;
     let value_controlP = control_password.value;
 
     if( value_password  === value_controlP){
         message.textContent = "hesla jsou shodná";
         message.classList.add("valid");
         message.classList.remove("invalid");
         
         
     }else{
         message.textContent = "hesla nejsou shodná";
         message.classList.add("invalid");
         message.classList.remove("valid");
   
     }
 }
 
 password.addEventListener("input",() => {
     checkPassword();
 })
 
 control_password.addEventListener("input",() => {
     checkPassword();
 }) 