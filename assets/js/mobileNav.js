// document.addEventListener("DOMContentLoaded", () => {
//   const openBtn = document.getElementById("mobile-menu-open");
//   const closeBtn = document.getElementById("mobile-nav-close");
//   const nav = document.getElementById("mobile-nav");
//   const panel = document.getElementById("mobile-nav-panel");
//   const overlay = document.getElementById("mobile-nav-overlay");

//   if (!openBtn || !closeBtn || !nav || !panel || !overlay) return;

//   const openNav = () => {
//     nav.classList.remove("hidden");
//     requestAnimationFrame(() => {
//       panel.classList.remove("translate-x-full");
//     });
//   };

//   const closeNav = () => {
//     panel.classList.add("translate-x-full");
//     setTimeout(() => {
//       nav.classList.add("hidden");
//     }, 300);
//   };

//   openBtn.addEventListener("click", openNav);
//   closeBtn.addEventListener("click", closeNav);
//   overlay.addEventListener("click", closeNav);
// });

// document.addEventListener("DOMContentLoaded", () => {
//   const openBtn = document.getElementById("mobile-menu-open");
//   const closeBtn = document.getElementById("mobile-nav-close");
//   const nav = document.getElementById("mobile-nav");
//   const panel = document.getElementById("mobile-nav-panel");
//   const overlay = document.getElementById("mobile-nav-overlay");

//   if (!openBtn || !closeBtn || !nav || !panel || !overlay) return;

//   const openNav = () => {
//     nav.classList.remove("hidden");
//     document.body.style.overflow = "hidden";
//     requestAnimationFrame(() => {
//       panel.classList.remove("translate-x-full");
//     });
//   };

//   const closeNav = () => {
//     panel.classList.add("translate-x-full");
//     document.body.style.overflow = "";
//     setTimeout(() => {
//       nav.classList.add("hidden");
//     }, 300);
//   };

//   openBtn.addEventListener("click", openNav);
//   closeBtn.addEventListener("click", closeNav);
//   overlay.addEventListener("click", closeNav);
// });

document.addEventListener("DOMContentLoaded", () => {
  const openBtn = document.getElementById("mobile-menu-open");
  const closeBtn = document.getElementById("mobile-nav-close");
  const nav = document.getElementById("mobile-nav");
  const panel = document.getElementById("mobile-nav-panel");
  const overlay = document.getElementById("mobile-nav-overlay");

  if (!openBtn || !closeBtn || !nav || !panel || !overlay) return;

  const openNav = () => {
    nav.classList.remove("hidden");
    document.body.style.overflow = "hidden";
    requestAnimationFrame(() => {
      panel.classList.remove("translate-x-full");
    });
  };

  const closeNav = () => {
    panel.classList.add("translate-x-full");
    document.body.style.overflow = "";
    setTimeout(() => {
      nav.classList.add("hidden");
    }, 300);
  };

  openBtn.addEventListener("click", openNav);
  closeBtn.addEventListener("click", closeNav);
  overlay.addEventListener("click", closeNav);

  window.toggleMobileAccordion = function (id) {
    const panel   = document.getElementById(id);
    const chevron = document.getElementById("chevron-" + id);
    const btn     = panel.previousElementSibling;
    const isOpen  = panel.style.maxHeight !== "0px" && panel.style.maxHeight !== "";

    document.querySelectorAll('#mobile-nav-accordion [id^="nav-item-"]').forEach(function (p) {
      if (p.id !== id) {
        p.style.maxHeight = "0px";
        const c = document.getElementById("chevron-" + p.id);
        if (c) c.style.transform = "rotate(0deg)";
        const b = p.previousElementSibling;
        if (b) b.setAttribute("aria-expanded", "false");
      }
    });

    if (isOpen) {
      panel.style.maxHeight = "0px";
      chevron.style.transform = "rotate(0deg)";
      btn.setAttribute("aria-expanded", "false");
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
      chevron.style.transform = "rotate(180deg)";
      btn.setAttribute("aria-expanded", "true");
    }
  };
});