const services = document.getElementsByClassName('serviceContainer_Services');
const headerImg = document.getElementById('headerContainer_Logo_Img');
const headerContainer = document.getElementById('headerContainer');
const hiddenNav = document.getElementById('hiddenNavbar');
let headerImg_Height = headerImg.clientHeight;
let header_Height = headerContainer.clientHeight;

hiddenNav.style.display = 'none';

/* ADD and REMOVE class on servicesContainer*/
window.addEventListener('scroll', () =>{
    if(window.scrollY > headerImg_Height){
        for(let i = 0; i < services.length ; i++){
            services[i].classList.add('containerGrow');
        }
    }
    else{
        for(let i = 0; i < services.length ; i++){
            services[i].classList.remove('containerGrow');
        }
    }
}); 


/*  AJOUTER TRANSITION SUR LA NAV*/

window.addEventListener('scroll', () =>{
    if(window.scrollY > header_Height){
/*         hiddenNav.style.display.transition = 'all 0.5sw';
 */        hiddenNav.style.display = 'block';
    }
    else{
        hiddenNav.style.display = 'none'
    }
});

function validate() { 
    var msg; 
    var str = document.getElementById("mdp").value; 
    if (str.match( /[0-9]/g) && 
            str.match( /[A-Z]/g) && 
            str.match(/[a-z]/g) && 
            str.match( /[^a-zA-Z\d]/g) &&
            str.length >= 10) 
        msg = "<p style='color:green'>Mot de passe fort.</p>"; 
    else 
        msg = "<p style='color:red'>Mot de passe faible.</p>"; 
    document.getElementById("msg").innerHTML= msg; 
} 