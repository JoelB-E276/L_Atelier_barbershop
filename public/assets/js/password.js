/*Html elements*/
let passwordForm = document.getElementById('registration_form_plainPassword_first');
let button = document.getElementById('button');
let lowercase = document.getElementById('lowercase');
let uppercase = document.getElementById('uppercase');
let number = document.getElementById('number');
let special = document.getElementById('special');
let passwordlength = document.getElementById('length');
 /*Initialize parameter*/
let passwordMinLength = 16;


/*Function to check if the password is strong*/
passwordForm.addEventListener('input', ()=>{
    
    let inputPassword = passwordForm.value;
   
    /*Lowercase control*/
    if(/[a-z]/.test(inputPassword)){
        /*Change Class on HTML element. Red to green*/
        lowercase.classList.replace('alert-danger','alert-success');
    }else{
        lowercase.classList.replace('alert-success','alert-danger');
    }
    /*Upperercase control*/
    if(/[A-Z]/.test(inputPassword)){
         /*Change Class on HTML element. Red to green*/
        uppercase.classList.replace('alert-danger','alert-success');
    }else{
        uppercase.classList.replace('alert-success','alert-danger');
    }
    /*Number control*/
    if(/[0-9]/.test(inputPassword)){
         /*Change Class on HTML element. Red to green*/
        number.classList.replace('alert-danger','alert-success')
    }else{
        number.classList.replace('alert-success','alert-danger');
    }
    /* Special character control */
    if(/[#?!@$%^&*-]/.test(inputPassword)){
         /*Change Class on HTML element. Red to green*/
        special.classList.replace('alert-danger','alert-success')
    }else{
        special.classList.replace('alert-success','alert-danger');
    }
    /* Lenght control */
    if(inputPassword.length >= passwordMinLength){
         /*Change Class on HTML element. Red to green*/
        passwordlength.classList.replace('alert-danger','alert-success');
    }else{
        passwordlength.classList.replace('alert-success','alert-danger');
    }
    /*Verify all controls are true and active validation button */
    if(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{16,}$/.test(inputPassword)){
        button.disabled = false;
    }else{
        button.disabled = true;
    }  
})

