document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("[data-carousel]").forEach((carousel) => {
    const track = carousel.querySelector("[data-track]");
    const items = carousel.querySelectorAll(".carousel-item");
    const prev = carousel.querySelector("[data-prev]");
    const next = carousel.querySelector("[data-next]");

    if (!track || !items.length) return;

    let index = 0;

    const getVisibleCount = () =>
      window.innerWidth >= 1024 ? 2 : 1;

    const update = () => {
      const visible = getVisibleCount();

      items.forEach((item, i) => {
        item.classList.toggle(
          "hidden",
          i < index || i >= index + visible
        );
      });
    };

    prev.addEventListener("click", () => {
      index = Math.max(0, index - 1);
      update();
    });

    next.addEventListener("click", () => {
      index = Math.min(items.length - getVisibleCount(), index + 1);
      update();
    });

    window.addEventListener("resize", update);

    update(); // initial render
  });
});
