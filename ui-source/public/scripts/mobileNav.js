document.addEventListener("DOMContentLoaded", () => {
  const openBtn = document.getElementById("mobile-menu-open");
  const closeBtn = document.getElementById("mobile-nav-close");
  const nav = document.getElementById("mobile-nav");
  const panel = document.getElementById("mobile-nav-panel");
  const overlay = document.getElementById("mobile-nav-overlay");

  if (!openBtn || !closeBtn || !nav || !panel || !overlay) return;

  const openNav = () => {
    nav.classList.remove("hidden");
    requestAnimationFrame(() => {
      panel.classList.remove("translate-x-full");
    });
  };

  const closeNav = () => {
    panel.classList.add("translate-x-full");
    setTimeout(() => {
      nav.classList.add("hidden");
    }, 300);
  };

  openBtn.addEventListener("click", openNav);
  closeBtn.addEventListener("click", closeNav);
  overlay.addEventListener("click", closeNav);
});
