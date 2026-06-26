document.addEventListener("DOMContentLoaded", () => {
    const readMoreBtn = document.querySelector(".specialists-section .read-more button");
    const immigrationText = document.querySelector(".specialists-section .immigration-text");

    if (readMoreBtn && immigrationText) {
        readMoreBtn.addEventListener("click", () => {

            if (immigrationText.style.maxHeight === "none" || immigrationText.classList.contains("expanded")) {
                // Collapse
                immigrationText.style.maxHeight = "200px";
                immigrationText.classList.remove("expanded");
                readMoreBtn.innerHTML = "Read More <span>></span>";
            } else {
                // Expand
                immigrationText.style.maxHeight = "none";
                immigrationText.classList.add("expanded");
                readMoreBtn.innerHTML = 'Read Less <span>></span>';
            }

        });
    }
});