/*Html elements*/
let passwordForm = document.getElementById('registration_form_plainPassword_first');
let button = document.getElementById('button');
let lowercase = document.getElementById('lowercase');
let uppercase = document.getElementById('uppercase');
let number = document.getElementById('number');
let passwordlength = document.getElementById('length');
 /*Initialize parameters*/
 let control = 0;
 let strongPassword = 4;
 let passwordMinLength = 8;


/*Function to check if the password is strong*/
passwordForm.addEventListener('input', ()=>{
    
    let inputPassword = passwordForm.value;
   
    /*Lowercase control*/
    if(/[a-z]/.test(inputPassword)){
        /*Change Class*/
        lowercase.classList.replace('alert-danger','alert-success');
        /*increase the score*/
        control++
    }else{
        lowercase.classList.replace('alert-success','alert-danger');
    }
    /*Upperercase control*/
    if(/[A-Z]/.test(inputPassword)){
        uppercase.classList.replace('alert-danger','alert-success');
        control++
    }else{
        uppercase.classList.replace('alert-success','alert-danger');
    }
    /*Number control*/
    if(/[0-9]/.test(inputPassword)){
        number.classList.replace('alert-danger','alert-success')
        control++;
    }else{
        number.classList.replace('alert-success','alert-danger');
    }
    /* Lenght control */
    if(inputPassword.length >= passwordMinLength){
        passwordlength.classList.replace('alert-danger','alert-success');
        control++
    }else{
        passwordlength.classList.replace('alert-success','alert-danger');
    }
    /*Verify all controls are true and active validation button */
    if(control === strongPassword){
        button.disabled = false;
    }else{
        button.disabled = true;
    }
})

