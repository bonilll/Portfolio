/*import {popup} from './components/popup';
import {smoothScrolls} from './components/smoothScroll';
import {form} from './components/form';
*/
import {TweenLite, Power3, Expo, Linear} from "gsap/All";
import {CursorHoverAnchor} from './components/cursor/CursorHoverAnchor';
import {CursorMove} from './components/cursor/cursormove';
import {textAnimationHamburger} from "./components/textAnimationHamburger";
import {MenuHover} from "./components/HoverMenu";
import {hamburger} from './components/hamburger';
// import {skybox} from './components/skybox';
import {CursorHoverMenu} from './components/cursorhovermenu';
// import {HorizontalScrollFun} from './components/horizzontalscroll';
import {magneticIcon} from './components/magnetizeElement';

import "../css/app.css";


document.addEventListener('DOMContentLoaded', function () {


  TweenLite.set('body', {visibility: 'visible'});
  TweenLite.to('.cursor', 2, {
    opacity: .25,
  });
  window.cursorisHoverR = false;

  CursorMove.init();
  // magneticIcon.init();
  CursorHoverAnchor.init();
  // ActiveByUrl.init();
  hamburger.init();
  CursorHoverMenu.init();
  textAnimationHamburger.init();
  MenuHover.init();
  // skybox.init();
  // HorizontalScrollFun.init();


/*
  popup.init();
  smoothScrolls.init();
  form.init();
*/






});