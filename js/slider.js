
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
const products = document.querySelectorAll('.product')
const leftArrow = document.querySelector('.changeLeft')
const rightArrow = document.querySelector('.changeRight')

let start = 0;
let end = 4;
rightArrow.addEventListener('click', slideRight)
leftArrow.addEventListener('click', slideLeft)
function slideRight() {
    if (products.length > end && products.length - end > 3 && products.length > 7) {

        start += 4;
        end += 4;
        startSlide()
    }
    else if (products.length <= end ) {
        start = 0;
        end = 4;
        startSlide()
    }
    else if (products.length - end < 4  && products.length > 7) {
        start = end // 8
        end = products.length // 10
        startSlide()
    }
    else if (products.length < 8) {
        start =  products.length - (products.length - 4)
        end =products.length
        startSlide()
    }
}

function slideLeft() {
   if (end - start > 0 && start > 4) {
        end = start
        start =  end -4
        startSlide()
    }
    else if(end == 4 && start == 0) {
        start = products.length - (products.length % 4)
        end = products.length
        startSlide();
    }
    else {
        end = 4
        start = 0
        startSlide()
    }

}

 function startSlide() {
    if (products.length > 4) {
        for (let d = 0; d < products.length; d++) {

            products[d].style.display = "none"

        }
        for (let i = start; i < end; i++) {


            products[i].style.display = "block"

        }
    }
}

startSlide()



