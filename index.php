<?php include("layout/header.php") ?>
<section class="slider_section">

    <div class="slideshow-container">

        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="images/slide_picture1.jpg" style="width:100%;">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="images/slide_picture2.jpg" style="width:100%;">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="images/slider_picture3.jpg" style="width:100%;">
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <script src="script.js"></script>
</section>

<!-- Brands -->
<section class="Brands">
    <h2>ԲՐԵՆԴՆԵՐ</h2>
    <div><img src="images/brand1.jpg" alt="Error"></div>
    <div><img src="images/brand2.jpg" alt="Error"></div>
    <div><img src="images/brand3.jpg" alt="Error"></div>
    <div><img src="images/brand4.jpg" alt="Error"></div>
    <div><img src="images/brand5.jpg" alt="Error"></div>
    <div><img src="images/brand6.jpg" alt="Error"></div>
    <div><img src="images/brand7.jpg" alt="Error"></div>
    <div><img src="images/brand8.jpg" alt="Error"></div>
</section>

<script src="js/main.js" defer></script>
<?php include("layout/footer.php") ?>