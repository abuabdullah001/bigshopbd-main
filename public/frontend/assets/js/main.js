document.addEventListener('DOMContentLoaded', function() {
    const goTopButton = document.querySelector('[data-action="gotop"]');

    if (!goTopButton) {
      return;
    }
    goTopButton.addEventListener('click', function() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
    if (window.scrollY < window.innerHeight * 0.5) {
      goTopButton.style.opacity = '0';
      goTopButton.style.visibility = 'hidden';
    }
    window.addEventListener('scroll', function() {
      if (window.scrollY >= window.innerHeight * 0.5) {
        goTopButton.style.opacity = '1';
        goTopButton.style.visibility = 'visible';
      } else {
        goTopButton.style.opacity = '0';
        goTopButton.style.visibility = 'hidden';
      }
    });
});
  