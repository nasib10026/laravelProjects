<style>
    .slideshow {
      width: 100%;
      height: 400px;
      position: relative;
      overflow: hidden;
    }

    .slide {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }

    .slide.active {
      opacity: 1;
    }

    .slide img {
      width: auto;
      height: 100%;
      object-fit: contain;
    }

    @keyframes slideAnimation {
      0% {
        opacity: 0;
      }
      100% {
        opacity: 1;
      }
    }

    .slideshow .slide {
      animation: slideAnimation 10s infinite;
    }

    .slideshow .slide:nth-child(2) {
      animation-delay: 3.33s;
    }

    .slideshow .slide:nth-child(3) {
      animation-delay: 6.66s;
    }
  </style>
<div class="slideshow">
    <div class="slide active">
      <img src="images/image1.jpg" alt="Slide 1">
    </div>
    <div class="slide">
      <img src="images/image2.png" alt="Slide 2">
    </div>
    <div class="slide">
      <img src="images/image3.jpg" alt="Slide 3">
    </div>
  </div>
