
<div class="sm:visible invisible cursor js-cursor">
    <div class="cursor__point"></div>
</div>

<div class="sm:visible invisible cursor-point"></div>

<!--<div id="magic-cursor">-->
<!--    <div id="ball"></div>-->
<!--</div>-->

<style>
    #magic-cursor {
        position: absolute;
        width: 30px;
        height: 30px;
        pointer-events: none;
    }

    #ball {
        position: fixed;
        display: block;
        left: 0;
        top: 0;
        transform: translate(-50%, -50%);
        width: 25px;
        height: 25px;
        border: .8px solid #fff;
        border-radius: 50%;
        pointer-events: none;
        opacity:.3;

    }
</style>