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
            /* 
            ^ debut de chaine ou de ligne (rien avant)
            (?=(/ce quon cherche/)) permet de stocker la correspondance
            * quantificateur , un ou plusieurs.
            *? quantificateur lazy, arrête sa recherche dès la permière correspondance
            - désigne un interval
            [] désigne un groupe alternatif
            (?=.*\d) il y a au moins un chiffre
            (?=.*[a-z]) il y au moins une minuscule
               {8} = 8 uniquement
               {8,} = 8 length ou plus
               {8,10} = entre 8 et 10
              $ = operateur de partie, différente valeur. Ici que la fin de la chaine doit être au moins égale a 16
              */

    /*Verify all controls are true and active validation button */
    if(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{16,}$/.test(inputPassword)){
        button.disabled = false;
    }else{
        button.disabled = true;
    }
 
    
})

