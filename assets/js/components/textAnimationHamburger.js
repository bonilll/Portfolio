import anime from 'animejs/lib/anime.es.js';

import {TweenLite, Power3, Expo, Linear, TweenMax, CSSPlugin} from "gsap/All";

console.log(CSSPlugin);


export const textAnimationHamburger = {


    init: function () {

        const textWrapper = document.querySelectorAll('.hamburgerlink');
        textWrapper.forEach(textEl);

        function textEl (textWrapper) {
            textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
        }


        anime.timeline({loop: true})
            .add({
                targets   : '.hamburgerlink .letter',
                translateX: [40, 0],
                translateZ: 0,
                opacity   : [0, 1],
                easing    : "easeOutExpo",
                duration  : 1200,
                delay     : (el, i) => 500 + 30 * i
            }).add({
            targets   : '.hamburgerlink .letter',
            translateX: [0, -30],
            opacity   : [1, 0],
            easing    : "easeInExpo",
            duration  : 1100,
            delay     : (el, i) => 100 + 30 * i
        });
    }
};