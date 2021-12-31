import {Expo,} from "gsap/All";
import {TimelineLite} from "gsap";


export const hamburger = {

    TimeLineHamburger: false,
    hamburgerClicked: false,

    init() {


        this.initTimeLineHamburger();
        const $hamburgerContainer = document.querySelector('.hamburger-containerext');
        $hamburgerContainer.addEventListener('click', (e) => {
            this.hamburgerClicked = !this.hamburgerClicked;

            if (this.hamburgerClicked)
                this.openHamburger();
            else {
                this.closeHamburger();
            }
        });
    },

    initTimeLineHamburger() {
        this.TimeLineHamburger = new TimelineLite({

            paused: true
        });

        console.log(this.TimeLineHamburger);
        this.TimeLineHamburger

            .to('.hamburger-wrapper', .6, {
                opacity: 0,
                zIndex: 5,
                ease: Expo.easeOut
            })
            .to('.c-hamburger-open__3', .8, {
                width: '100vw',
                zIndex: 5,
                ease: Expo.easeOut
            })
            .to('.hamburger-line', .8, {
                backgroundColor: '#f1f1f1',
                zIndex: 5,
                ease: Expo.easeOut
            }, "-=.8")
            .to('.hamburger-line__left', .8, {
                backgroundColor: '#1f1f1f',
                zIndex: 5,
                ease: Expo.easeOut
            }, "-=.8")
            .to('body', .8, {
                overflow: 'hidden',
                ease: Expo.easeOut
            }, "-=.8")
            .to('.hamburger-wrapper', .6, {
                opacity: 1,
                zIndex: 5,
                ease: Expo.easeOut
            })
            .to('.c-logo-img', .6, {
                rotate: '90deg',
                ease: Expo.easeOut
            })
            .to('.cursor', .1, {
                // zIndex:'0',
                ease: Expo.easeOut
            })
            .to('.cursor-point', .1, {
                // zIndex:'0',
                ease: Expo.easeOut
            })
            .to('.cursor', .1, {
                // zIndex:100,
                ease: Expo.easeOut
            })


            .to('.opacity-hamburger', 1, {
                opacity: 1,
                ease: Expo.easeOut
            }, "-=1")
        // .to('.c-hamburger-open__1', .1, {
        //   width: '20vw',
        //   ease : Expo.easeOut
        // }, "-=.5")
        // .to('.c-hamburger-open__2', 1, {
        //   width: '60vw',
        //   ease : Expo.easeOut
        // }, "-=.4")
    },

    openHamburger() {
        this.TimeLineHamburger.play();
    },
    closeHamburger() {
        this.TimeLineHamburger.reverse();
    },
};