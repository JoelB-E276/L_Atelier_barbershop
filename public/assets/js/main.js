const services = document.getElementsByClassName('serviceContainer_Services');
const headerImg = document.getElementById('headerContainer_Logo_Img');
let headerImg_Height = headerImg.clientHeight;


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



