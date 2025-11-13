let lastScrollTop = 0;
const header = document.querySelector('header');

window.addEventListener('scroll', function () {
  const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

  if (currentScroll <= 0) {
    // Di paling atas: selalu tampil
    header.classList.remove('translate-y-[-100%]');
    return;
  }

  if (currentScroll > lastScrollTop) {
    // Scroll ke bawah: sembunyikan
    header.classList.add('translate-y-[-100%]');
  } else {
    // Scroll ke atas: tampilkan
    header.classList.remove('translate-y-[-100%]');
  }

  lastScrollTop = currentScroll;
});



  document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.querySelector("button[aria-label='Toggle mobile menu']");
    const mobileMenu = document.getElementById("mobileMenu");
    const closeButton = document.getElementById("closeMenu");
    const overlay = document.getElementById("overlay");

    function openMenu() {
      mobileMenu.classList.remove("translate-x-full");
      mobileMenu.classList.add("translate-x-0");
      overlay.classList.remove("hidden");
    }

    function closeMenu() {
      mobileMenu.classList.remove("translate-x-0");
      mobileMenu.classList.add("translate-x-full");
      overlay.classList.add("hidden");
    }

    toggleButton.addEventListener("click", openMenu);
    closeButton.addEventListener("click", closeMenu);
    overlay.addEventListener("click", closeMenu);
  });