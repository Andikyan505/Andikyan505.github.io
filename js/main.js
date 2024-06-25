let slideIndex = 1;
let autoSlideInterval = 5000;
let autoSlideTimer;

showSlides(slideIndex);
autoSlide(); 

function plusSlides(n) {
  clearTimeout(autoSlideTimer); 
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  clearTimeout(autoSlideTimer); 
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  autoSlide(); 
}

function autoSlide() {
  autoSlideTimer = setTimeout(function() {
    plusSlides(1); 
    autoSlide();
  }, autoSlideInterval);
}

function changePhotos(newPhotoURLs) {
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.backgroundImage = "url('" + newPhotoURLs[i] + "')";
    }

    if (dots.length === newPhotoURLs.length) {
        for (let i = 0; i < dots.length; i++) {
            dots[i].setAttribute("onclick", "currentSlide(" + (i + 1) + ")");
        }
    }

    showSlides(slideIndex); 
}

changePhotos(newPhotoURLs);
