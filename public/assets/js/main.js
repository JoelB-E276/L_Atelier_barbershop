/*Html element function serviceAnim*/
const services = document.getElementsByClassName('serviceContainer_Services');
const headerImg = document.getElementById('headerContainer_Logo_Img');
let headerImg_Height = headerImg.clientHeight;
console.log(services);
/*Html element function showNavbar */
const headerContainer = document.getElementById('headerContainer');
const hiddenNav = document.getElementById('hiddenNavbar');
let header_Height = headerContainer.clientHeight;


/* ADD and REMOVE class on servicesContainer*/
window.addEventListener('scroll', function serviceAnim(){
    /*Get the scroll height and compar with header img height */
    if(window.scrollY > headerImg_Height){
        /*Loop on HTLM Collection for add class on each element*/
        for(let i = 0; i < services.length ; i++){
            services[i].classList.add('containerGrow');
        }
    }
    else{/*Loop on HTLM Collection for remove class on each element*/
        for(let i = 0; i < services.length ; i++){
            services[i].classList.remove('containerGrow');
        }
    }
}); 


                                                        /*  AJOUTER TRANSITION SUR LA NAV*/
hiddenNav.style.display = 'none';

/* Function for show or hide navbar*/
window.addEventListener('scroll', function showNavbar(){
    /*Get the scroll height and compar with header height */
    if(window.scrollY > header_Height){
        /*      Change navbar display   */ 
        hiddenNav.style.display = 'block';
    }
    else{
        hiddenNav.style.display = 'none'
    }
});
