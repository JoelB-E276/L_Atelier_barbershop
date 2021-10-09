/*Html element function serviceAnim*/
services = document.getElementsByClassName('serviceContainer_Services');
logo = document.getElementById('logoContainer_Logo_Img');
let logo_Height = logo.clientHeight;
/*Html element function showNavbar */
logoContainer = document.getElementById('logoContainer');
hiddenNav = document.getElementById('hiddenNavbar');
let logoContainer_Height = logoContainer.clientHeight;


/* ADD and REMOVE class on servicesContainer*/
window.addEventListener('scroll', function serviceAnim(){
    /*Get the scroll height and compar with header img height */
    if(window.scrollY > logo_Height){
        /*Loop on HTLM Collection for add class on each element*/
        for(let i = 0; i < services.length ; i++){
            services[i].classList.add('containerRotate');
        }
    }
}); 


/* Function for show or hide navbar*/
window.addEventListener('scroll', function showNavbar(){
    /*Get the scroll height and compar with header height */
    if(window.scrollY > logoContainer_Height){
        /*      Change navbar display   */ 
        hiddenNav.classList.add('show');
    }
    else{
        hiddenNav.classList.remove('show');
    }
});
/* if(/[@#!*?$%]/.test(inputPassword)){
    special.classList.replace('alert-danger','alert-success')
    control++;
}else{
    special.classList.replace('alert-success','alert-danger');
}
^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\@\#\!\*\?\$\%])(?=.*[a-zA-Z]).{8,}$/gm
let special = document.getElementById('special'); */