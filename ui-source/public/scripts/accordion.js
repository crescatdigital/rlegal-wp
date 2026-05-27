document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll("[data-accordion]").forEach((accordion) => {
    // Check if this is a load-more type accordion (ServiceSection)
    const loadMoreBtn = accordion.querySelector(".accordion-toggle");
    
    if (loadMoreBtn) {
      // Logic for ServiceSection Load More
      const cards = accordion.querySelectorAll(".accordion-card");
      
      loadMoreBtn.addEventListener("click", () => {
        const isExpanded = loadMoreBtn.getAttribute("aria-expanded") === "true";
        const newExpandedState = !isExpanded;

        // Toggle visibility of additional cards (index >= 2)
        cards.forEach((card, index) => {
          if (index >= 2) {
             card.classList.toggle("hidden");
          }
        });

        // Update button state
        loadMoreBtn.setAttribute("aria-expanded", String(newExpandedState));
        
        const textSpan = loadMoreBtn.querySelector(".accordion-text");
        const iconSpan = loadMoreBtn.querySelector(".accordion-icon");

        if (textSpan && iconSpan) {
          if (newExpandedState) {
            textSpan.textContent = "Show less services";
            iconSpan.textContent = "↑";
          } else {
            textSpan.textContent = "Load more services";
            iconSpan.textContent = "↓";
          }
        }
      });
      return; // Exit if it handled as load-more
    }

    // Standard Accordion Logic (fallback for other components)
    const trigger = accordion.querySelector(".accordion-trigger");
    const content = accordion.querySelector(".accordion-content");
    const icon = accordion.querySelector(".accordion-icon");

    if (!trigger || !content || !icon) return;

    trigger.addEventListener("click", () => {
      const isOpen = content.classList.contains("block");

      content.classList.toggle("block");
      content.classList.toggle("hidden");

      icon.textContent = isOpen ? "↓" : "↑";
      trigger.setAttribute("aria-expanded", String(!isOpen));
    });
  });
});
