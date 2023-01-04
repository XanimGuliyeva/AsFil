const brends = document.querySelectorAll('.hold-logo')
const leftBrend = document.querySelector('.brendLeft')
const rightBrend = document.querySelector('.brendRight')

let startBrend = 0;
let endBrend = 4;
rightBrend.addEventListener('click', brendRight)
leftBrend.addEventListener('click', brendLeft)
function brendRight() {

    if (brends.length > endBrend && brends.length - endBrend > 3 && brends.length > 7) {

        startBrend += 4;
        endBrend += 4;
        startBrendSlide()


    }
    else if (brends.length <= endBrend ) {
        startBrend = 0;
        endBrend = 4;
        startBrendSlide()

    }
    else if (brends.length - endBrend < 4  && brends.length > 7) {

        startBrend = endBrend // 8
        endBrend = brends.length // 10

        startBrendSlide()

    }
    else if (brends.length < 8) {
        startBrend =  brends.length - (brends.length - 4)
        endBrend =brends.length
        startBrendSlide()

    }




}

function brendLeft() {

    if (endBrend - startBrend > 0 && startBrend > 4) {
        endBrend = startBrend
        startBrend =  endBrend -4

        startBrendSlide()
    }
    else if(endBrend == 4 && startBrend == 0) {
        startBrend = brends.length - (brends.length % 4)
        endBrend = brends.length
        startBrendSlide()
    }
    else {
        endBrend =  4
        startBrend = 0
        startBrendSlide()
    }
}

function startBrendSlide() {
    if (brends.length>4){
        for (let d = 0; d < brends.length; d++) {
            brends[d].style.display = "none"

        }
        for (let i = startBrend; i < endBrend; i++) {


            brends[i].style.display = "block"
        }
    }
}
if (brends.length > 0) {

    startBrendSlide()
}
