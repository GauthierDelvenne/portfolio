document.documentElement.classList.add('js-enabled');

import Splide from '@splidejs/splide';

var splide = new Splide( '.splide', {
    perPage: 3,
    breakpoints:{
        1024:{
            perPage: 1,

        }
    }
} );

splide.mount();
