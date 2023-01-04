// const clickeableImage = document.querySelectorAll('.clickeable-image');
// const productImage = document.querySelectorAll('.product-image > img');
//
// for (let i = 0; i < clickeableImage.length; i++) {
//
//     clickeableImage[i].addEventListener('click',() => {
//
//         let dataId = clickeableImage[i].getAttribute('data-id');
//         let src =clickeableImage[i].getAttribute('src');
//         clickeableImage.forEach((element) => element.classList.remove('active-image'));
//         clickeableImage[i].classList.add('active-image');
//
//         setImage(dataId,src)
//
//     })
//
// }
//
// function setImage(id,src) {
//
//     for (let i = 0; i < productImage.length; i++) {
//
//         if (productImage[i].getAttribute('data-id') == id) {
//
//
//             productImage[i].setAttribute('src',src)
//
//         }
//
//     }
// }
//
// var myRating = raterJs( {
//     element:document.querySelector("#rater"),
//     rateCallback:function rateCallback(rating, done) {
//       this.setRating(rating);
//       done();
//     }
// });
//
//
