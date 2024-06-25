document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.getElementById('mainImage');
    const miniImages = document.querySelectorAll('.mini-image');

    // Set the src attribute of the main image to the src of the first mini image
    mainImage.setAttribute('src', miniImages[0].getAttribute('src'));

    miniImages.forEach(miniImage => {
        miniImage.addEventListener('click', function() {
            const src = this.getAttribute('src');
            mainImage.setAttribute('src', src);
        });
    });
});
