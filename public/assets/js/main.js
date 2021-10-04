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
