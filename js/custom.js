  (function () {
    "use strict";

    var button = document.querySelector('.material-bloom'),
        rippleSize = button.clientWidth * 1.5;
    
    function addRipple(e, i) {
        var delay = 30,
            posX = e.offsetX,
            posY = e.offsetY,
            ripple = document.createElement('div');
        
        ripple.classList.add('ripple');
        ripple.style.left = (posX - (rippleSize / 2)) + 'px';
        ripple.style.top = (posY - (rippleSize / 2)) + 'px';
        ripple.style.height = rippleSize + 'px';
        ripple.style.width = rippleSize + 'px';
        ripple.style.borderRadius = (rippleSize / 2) + 'px';
        
        if (button.hasChildNodes()) {
            button.insertBefore(ripple, button.firstChild);
        } else {
            button.appendChild(ripple);
        }
        
        setTimeout(function () {
            ripple.style['-webkit-transform'] = 'scale(1)';
            ripple.style['-moz-transform'] = 'scale(1)';
            ripple.style.transform = 'scale(1)';
            ripple.style.opacity = 0;
        }, delay);
        
        setTimeout(function () {
            button.removeChild(ripple);
        }, 300);
    }
    
    button.addEventListener('click', addRipple, false);
    
}());