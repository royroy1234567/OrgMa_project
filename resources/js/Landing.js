import './bootstrap';

const burgerBtn = document.getElementById("burgerBtn");
const mobileMenu = document.getElementById("mobileMenu");

burgerBtn.addEventListener("click", () => {
  mobileMenu.classList.toggle("hidden");
});


 const slides = document.querySelector('.carousel-slides');
  const dots = document.querySelectorAll('.dot');
  const totalSlides = slides.children.length;
  let index = 0;

  function showSlide(i) {
    if (i < 0) index = totalSlides - 1;
    else if (i >= totalSlides) index = 0;
    else index = i;

    slides.style.transform = `translateX(-${index * 100}%)`;

    // Update active dot
    dots.forEach(dot => dot.classList.remove('bg-white'));
    dots[index].classList.add('bg-white');
  }

  // Click dots
  dots.forEach(dot => {
    dot.addEventListener('click', () => {
      const slideIndex = parseInt(dot.dataset.slide);
      showSlide(slideIndex);
    });
  });

  // Auto-slide every 5 seconds
  setInterval(() => showSlide(index + 1), 5000);

  // Initialize first slide
  showSlide(0);


//button next for sale
   const carousel = document.getElementById('carousel');
  const nextBtn = document.getElementById('nextBtn');
  const prevBtn = document.getElementById('prevBtn');

  const scrollAmount = 300; // Adjust how much it scrolls per click

  nextBtn.addEventListener('click', () => {
    carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
  });

  prevBtn.addEventListener('click', () => {
    carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
  });

  
  const carouselb = document.getElementById('brandCarousel');

  document.getElementById('prevBtnb').addEventListener('click', () => {
    carouselb.scrollBy({ left: -300, behavior: 'smooth' });
  });

  document.getElementById('nextBtnb').addEventListener('click', () => {
    carouselb.scrollBy({ left: 300, behavior: 'smooth' });
  });

  const carouselc = document.getElementById('trendingCarousel');

  document.getElementById('prevBtnc').addEventListener('click', () => {
    carouselc.scrollBy({ left: -500, behavior: 'smooth' });
  });

  document.getElementById('nextBtnc').addEventListener('click', () => {
    carouselc.scrollBy({ left: 500, behavior: 'smooth' });
  });

const categoryButtons = document.querySelectorAll('.category-btn');
const productCards = document.querySelectorAll('.product-card');

categoryButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        const category = btn.dataset.category;

        // Reset all buttons
        categoryButtons.forEach(b => {
            b.classList.remove(
                'bg-white',
                'text-blue-500',
                'border-blue-500'
            );
            b.classList.add(
                'text-gray-800',
                'border-white'
            );
        });

        // Active button style (same as hover)
        btn.classList.remove('text-gray-800', 'border-white');
        btn.classList.add(
            'bg-white',
            'text-blue-500',
            'border-blue-500'
        );

        // Filter products
        productCards.forEach(card => {
            const categories = card.dataset.categories
                .split(',')
                .map(c => c.trim());

            card.style.display = categories.includes(category)
                ? 'block'
                : 'none';
        });
    });
});
