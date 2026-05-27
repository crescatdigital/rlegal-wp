document.getElementById('load-more-btn')?.addEventListener('click', function () {
    const allCards = document.querySelectorAll('.article-card');
    const isExpanded = this.textContent === 'Hide articles';
    if (isExpanded) {
        allCards.forEach(function (card) {
            if (card.dataset.originallyHidden === 'true') {
                card.classList.add('hidden');
            }
        });
        this.textContent = 'Load more';
    } else {
        allCards.forEach(function (card) {
            if (card.classList.contains('hidden')) {
                card.dataset.originallyHidden = 'true';
                card.classList.remove('hidden');
            } else {
                card.dataset.originallyHidden = 'false';
            }
        });
        this.textContent = 'Hide articles';
    }
});