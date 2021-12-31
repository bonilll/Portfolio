


export const popup = {
  init: function () {
    const $cPopupText = document.querySelector(".c-popup-text");
    const $privacy = document.querySelectorAll(".privacy");
    const $cPopupBg = document.querySelector(".c-popup-bg");
    const $closePopup = document.querySelector(".closepopup");

    let slidebarIsOpen = false;

    $privacy.forEach(function ($privcyecookie) {
      $privcyecookie.addEventListener("click", function () {
        $cPopupText.classList.remove("invisible");
        $cPopupText.classList.remove("pointer-events-none");
        $cPopupBg.classList.remove("h-0");
        $cPopupBg.style.height='100%';
    })
    });



    $closePopup.addEventListener("click", function () {

        $cPopupText.classList.remove("visible");
        $cPopupText.classList.add("invisible");
        $cPopupText.classList.remove("pointer-events-auto");
        $cPopupBg.style.height='0%';
        slidebarIsOpen = false;
    })


  }
};
