
flagsManager = document.querySelector(".flagsManager");
flagsManager.addEventListener("click", () => { hideAndShow();});


function hideAndShow()
{
    
        if ( flagsManagerSpace.style.display == "none") {
            flagsManagerSpace.style.display = "block";
        }

        else {
            flagsManagerSpace.style.display = "none";
        }

}