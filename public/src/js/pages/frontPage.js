document.addEventListener('DOMContentLoaded', function() {
    const categoryButtons = document.querySelectorAll('.categories button');
    const posts = document.querySelectorAll('.post-item');
    const searchIcon = document.getElementById('search-icon');
    const searchInput = document.getElementById('search-input');

    categoryButtons.forEach(button => {
        button.addEventListener('click', () => {
            const category = button.getAttribute('data-category');
            filterPosts(category);
        });
    });

    searchIcon.addEventListener('click', () => {
        const searchTerm = searchInput.value.trim().toLowerCase();
        filterPosts(searchTerm);
    });

    function filterPosts(category) {
        posts.forEach(post => {
            const postCategories = post.className.split(' ').slice(1); // Obtener categorías del post

            if (category === 'all' || postCategories.includes(category)) {
                post.style.display = 'block';
            } else {
                post.style.display = 'none';
            }
        });
    }
});


