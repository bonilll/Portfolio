import {Power3, Expo, Linear, TweenMax,} from "gsap/All";
import {TimelineLite} from "gsap";


export const CursorHoverMenu = {

    TimeLineCursorHOver: null,
    cursorHover        : true,

    init () {


        this.initTimeLineCursorHOver();
        const $hamburgerContainer = document.querySelector('.hamburger-containerext');
        $hamburgerContainer.addEventListener('mouseenter', (e) => {

            this.cursorHover = true;
            if (this.cursorHover)
                this.goHamburgerHover();
        });
        $hamburgerContainer.addEventListener('mouseleave', (e) => {

            this.cursorHover = true;
            if (this.cursorHover) {
                this.backHamburgerHover();
            }
        });
    },

    initTimeLineCursorHOver () {
        this.TimeLineCursorHOver = new TimelineLite({

            paused: true
        });

        this.TimeLineCursorHOver

            .to('.hamburger-container', 1, {
                rotate: 90,
                ease  : Expo.easeOut
            })
            .to('.hamburger-line', 2, {
                // background: '#040404',
                ease      : Expo.easeOut
            }, "-=1")
            .to('.hamburger-line__left', 2, {
                // background: '#040404',
                marginLeft: 0,
                ease      : Expo.easeOut
            }, "-=2")

    },

    goHamburgerHover () {
        this.TimeLineCursorHOver.play();
    },
    backHamburgerHover () {
        this.TimeLineCursorHOver.reverse();
    },
};