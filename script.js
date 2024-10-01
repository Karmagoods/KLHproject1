// Functionality to toggle article visibility
document.querySelectorAll('.article-title').forEach(title => {
    title.addEventListener('click', function() {
        const article = this.nextElementSibling;
        article.style.display = (article.style.display === 'block' || article.style.display === '') ? 'none' : 'block';
    });
});

// Select the dark mode toggle checkbox
const toggleCheckbox = document.getElementById('darkModeToggle');

// Check saved preference from local storage
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
    toggleCheckbox.checked = true; // Set the checkbox to checked if dark mode is enabled
}

// Add an event listener to toggle dark mode
toggleCheckbox.addEventListener('change', () => {
    document.body.classList.toggle('dark-mode'); // Toggle the dark mode class on the body
    toggleCheckbox.nextElementSibling.innerText = document.body.classList.contains('dark-mode') ? 'Light Mode' : 'Dark Mode';

    // Save the preference to local storage
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
    } else {
        localStorage.setItem('darkMode', 'disabled');
    }
});
