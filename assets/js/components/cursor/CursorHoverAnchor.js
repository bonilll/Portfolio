import {TweenLite, Power3, Expo, Linear, TweenMax} from "gsap/All";

export const CursorHoverAnchor = {
  init: function () {

    let center = 0;

    let hamburgerClicked = true;


    document.querySelectorAll(".anchor").forEach(function ($anchor) {

      $anchor.addEventListener("mouseenter", mouseOverLink);
      $anchor.addEventListener("mouseleave", mouseOutLink);
    });



    function mouseOverLink (e) {
      center = 50;

      window.cursorisHoverR = true;
      let rect = e.target.getBoundingClientRect();
      TweenMax.to('.cursor', .4, {
        width     : 100,
        height    : 100,
        opacity   : 0,
        x         : e.x - center,
        y         : e.y - center,
        ease      : Expo.easeOut,
      });
      TweenMax.to('.cursor-point', 2, {

        x         : rect.x + rect.width + 10,
        y         : rect.y + rect.height / 2 + 5,
        ease      : Expo.easeOut,
      }, "-=.2");
    }

    function mouseOutLink (e) {
      window.cursorisHoverR = false;
      center = 30;


      TweenMax.to('.cursor', .4, {
        width     : 60,
        height    : 60,
        opacity   : .25,
        ease      : Expo.easeOut,
      });
    }
  }
};
