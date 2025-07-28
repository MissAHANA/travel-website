document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelectorAll(".carousel-slide");
  let currentSlide = 0;

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.remove("active");
      if (i === index) slide.classList.add("active");
    });
  }

  window.moveSlide = function(n) {
    currentSlide = (currentSlide + n + slides.length) % slides.length;
    showSlide(currentSlide);
  };

  setInterval(() => moveSlide(1), 6000); // Auto-slide
});

