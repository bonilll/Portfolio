import SmoothScroll from 'smooth-scroll';
import $ from "jquery";



export const smoothScrolls = {
  init: function () {


    const offset = $(window).width() < 1280? 0: 80;


    new SmoothScroll('a[href*="#"]', {
      speed : 1000,
      offset: offset,
    });
console.log(offset)

  }
};
