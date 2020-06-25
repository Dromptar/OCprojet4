
window.onscroll = function () {navChange();};
document.getElementById('menu').addEventListener('mouseover', mouseOver);
document.getElementById('menu').addEventListener("mouseout", mouseOut);

//this section makes the menu transparent or gray on scroll
function navChange() {

  let scrolling = this.pageYOffset;

    if (scrolling >= 654) {

        document.getElementById('menu').style.opacity = 10;
    } else {
        document.getElementById('menu').style.opacity = 0.5;
    }
}


function mouseOver() {

  document.getElementById('menu').style.opacity = 10;;

  }

function mouseOut() {

  document.getElementById('menu').style.opacity = 0.5;;

}



