
const themeToggle = document.getElementById("themeToggle");
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");
const helloButton = document.getElementById("helloButton");
const message = document.getElementById("message");
const year = document.getElementById("year");

// Show the current year in the footer.
year.textContent = new Date().getFullYear();

// Toggle between light and dark themes.
themeToggle.addEventListener("click", () => {
    const isDark = document.body.classList.toggle("dark-theme");

    themeToggle.textContent = isDark ? "☀" : "☾";
    themeToggle.setAttribute(
        "aria-label",
        isDark ? "Switch to light theme" : "Switch to dark theme"
    );
});

// Open and close the mobile navigation.
menuToggle.addEventListener("click", () => {
    const isOpen = navLinks.classList.toggle("open");

    menuToggle.setAttribute("aria-expanded", String(isOpen));
    menuToggle.textContent = isOpen ? "✕" : "☰";
});

// Close the mobile menu after clicking a navigation link.
navLinks.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
        navLinks.classList.remove("open");
        menuToggle.setAttribute("aria-expanded", "false");
        menuToggle.textContent = "☰";
    });
});

// // Add a small interactive greeting.
// helloButton.addEventListener("click", () => {
//     message.textContent = "Hello there! 👋 Thanks for stopping by.";
//     helloButton.innerHTML = "Nice to meet you <span>✓</span>";
// });

// Keep the mobile menu closed when returning to desktop width.
window.addEventListener("resize", () => {
    if (window.innerWidth > 700) {
        navLinks.classList.remove("open");
        menuToggle.setAttribute("aria-expanded", "false");
        menuToggle.textContent = "☰";
    }
});



// ===============================================================================
const uploadForm = document.getElementById("fileuploadForm");

uploadForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(uploadForm);

    // try-catch to send this data to backend
    
    
});
