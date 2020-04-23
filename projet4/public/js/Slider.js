let sliderImages = document.querySelectorAll(".slide");
let arrowLeft = document.querySelector("#arrow-left");
let arrowRight = document.querySelector("#arrow-right");
current = 0;


//clear all images
function reset() {

    for (let i = 0; i < sliderImages.length; i++) {

        sliderImages[i].classList.remove('visible');
        sliderImages[i].classList.add('hidden');
    }

}

//init slider
function startSlide() {

    reset();

    sliderImages[current].classList.add('visible');
    sliderImages[current].classList.remove('hidden');

}

//show previous
function slideLeft() {
    reset();

    sliderImages[current - 1].classList.add('visible');
    sliderImages[current - 1].classList.remove('hidden');
    current--;
}

//show next
function slideRight() {
    reset();

    if (current === sliderImages.length - 1) {
        current = -1;
    }

    sliderImages[current + 1].classList.add('visible');
    sliderImages[current + 1].classList.remove('hidden');
    current++;

}

//left arrow click
arrowLeft.addEventListener('click', function () {

    if (current === 0) {
        current = sliderImages.length;
    }
    slideLeft();
})

//right arrow click
arrowRight.addEventListener('click', function () {

    if (current === sliderImages.length - 1) {
        current = -1;
    }
    slideRight();
})

setInterval(slideRight, 5000);
startSlide();
