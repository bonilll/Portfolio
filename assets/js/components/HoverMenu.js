import {Power3, Expo, Linear, TweenMax,} from "gsap/All";
import {TimelineLite} from "gsap";


export const MenuHover = {

    init () {

        const $overLink = [...document.getElementsByClassName("c-navar-link")];

        $overLink.forEach.call($overLink, el => {
            el.addEventListener("mouseenter", e => {
                const span = el.getElementsByTagName("span")[0];
                TweenMax.to(span, .5, {
                    color: '#4f4f4f',
                    // marginLeft:'20px',
                    ease: Expo.easeOut
                });
                TweenMax.to('.cursor-point', 1, {
                    // marginLeft:'20px',
                    ease: Expo.easeOut
                });
            });
        });

        $overLink.forEach.call($overLink, el => {
            el.addEventListener("mouseleave", e => {
                const span = el.getElementsByTagName("span")[0];

                TweenMax.to(span, 0.75, { color: '#1f1f1f',marginLeft:'0px', ease: Expo.easeOut });
                TweenMax.to('.cursor-point', 0.75, {marginLeft:'0px', ease: Expo.easeOut });
            });
        });


    },
};