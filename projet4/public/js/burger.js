
class Burger {

    constructor() {

        this.burger = document.querySelector(".burger");
        this.burger.addEventListener("click", () => { this.toggle();});

    }

    /* affichage du menu au click sur le burger et inversement */
    toggle() {

        this.burger.classList.toggle("active");

        if ( navTabs.style.display == "flex") {
            navTabs.style.display = "none";
        }

        else {
            navTabs.style.display = "flex";
        }

    }

}

new Burger();
