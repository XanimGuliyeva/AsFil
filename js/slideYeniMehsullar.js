const productsNew = document.querySelectorAll('.product-new')
const leftNew = document.querySelector('.new-left')
const rightNew = document.querySelector('.new-right')

let startNew = 0;
let endNew = 4;

if (rightNew) {
    rightNew.addEventListener('click', slideNewRight)
leftNew.addEventListener('click', slideNewLeft)
}

function slideNewRight() {


    if (productsNew.length > endNew && productsNew.length - endNew > 3 && productsNew.length > 7) {

        startNew += 4;
        endNew += 4;
        startNewSlide()


    }
    else if (productsNew.length <= endNew ) {
        startNew = 0;
        endNew = 4;
        startNewSlide()

    }
    else if (productsNew.length - endNew < 4  && productsNew.length > 7) {

        startNew = endNew // 8
        endNew = productsNew.length // 10
        startNewSlide()
    }
    else if (productsNew.length < 8) {
        startNew =  productsNew.length - (productsNew.length - 4)
        endNew =productsNew.length
        startNewSlide()

    }




}

function slideNewLeft() {
    if (endNew - startNew > 0 && startNew > 4) {
        endNew = startNew
        startNew =  endNew -4
        startNewSlide()
    }
    else if(endNew == 4 && startNew == 0) {
        startNew = productsNew.length - (productsNew.length % 4)
        endNew = productsNew.length
        startNewSlide();
    }
    else {

        endNew = 4
        startNew = 0

        startNewSlide()

    }

}

function startNewSlide() {
    if (productsNew.length > 4) {
        for (let d = 0; d < productsNew.length; d++) {
            productsNew[d].style.display = "none"

        }
        for (let i = startNew; i < endNew; i++) {

            productsNew[i].style.display = "block"

        }
    }
}

if (productsNew.length > 0) {

startNewSlide()
}


