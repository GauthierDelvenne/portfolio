document.documentElement.classList.add('js-enabled');

import Splide from '@splidejs/splide';
const splideElement = document.querySelector('.splide');
if (splideElement) {
let splide = new Splide( '.splide', {
    perPage: 3,
    breakpoints:{
        1024:{
            perPage: 1,

        }
    }
} );

splide.mount();
}
