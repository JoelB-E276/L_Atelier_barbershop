/*Html elements*/
let passwordForm = document.getElementById('registration_form_plainPassword_first');
let button = document.getElementById('button');
let lowercase = document.getElementById('lowercase');
let uppercase = document.getElementById('uppercase');
let number = document.getElementById('number');
let passwordlength = document.getElementById('length');
 /*Initialize parameters*/
 let passwordMinLength = 8;


/*Function to check if the password is strong*/
passwordForm.addEventListener('input', ()=>{
    
    let inputPassword = passwordForm.value;
   
    /*Lowercase control*/
    if(/[a-z]/.test(inputPassword)){
        /*Change Class*/
        lowercase.classList.replace('alert-danger','alert-success');
    }else{
        lowercase.classList.replace('alert-success','alert-danger');
    }
    /*Upperercase control*/
    if(/[A-Z]/.test(inputPassword)){
        uppercase.classList.replace('alert-danger','alert-success');
    }else{
        uppercase.classList.replace('alert-success','alert-danger');
    }
    /*Number control*/
    if(/[0-9]/.test(inputPassword)){
        number.classList.replace('alert-danger','alert-success')
    }else{
        number.classList.replace('alert-success','alert-danger');
    }
    /* Special character control */
    if(/[#?!@$%^&*-]/.test(inputPassword)){
        special.classList.replace('alert-danger','alert-success')
    }else{
        special.classList.replace('alert-success','alert-danger');
    }
    /* Lenght control */
    if(inputPassword.length >= passwordMinLength){
        passwordlength.classList.replace('alert-danger','alert-success');
    }else{
        passwordlength.classList.replace('alert-success','alert-danger');
    }
            /* ^ debut de chaine ou de ligne (rien avant)
            (?=.*\d) il y a au moins un chiffre
            (?=.*[a-z]) il y au moins une minuscule
              
               {8,} = 8 ou plus 
              $ rien après*/

    /*Verify all controls are true and active validation button */
    if(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{16,}$/.test(inputPassword)){
        button.disabled = false;
        console.log('oui');    
    }else{
        button.disabled = true;
        console.log('non');
    }
 
    
})

