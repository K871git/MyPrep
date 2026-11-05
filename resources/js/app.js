
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
const url = "/appmanager/resources/php/fh7.php";
uploadForm.addEventListener("submit", async function (e) {
    e.preventDefault();

    const formData = new FormData(uploadForm);

    const uploaderName = formData.get('uploader');
    const uploadedFile = formData.get('uploaded_file');

    // basic front-end validation
    if (!uploaderName) {
        console.log("Please enter a valid name")
        alert("Please enter a valid name..!")
        return;
    }

    if (!uploadedFile || uploadedFile.size === 0) {
        console.log("Please select a file")
        alert("Please select a file..!")
        return;
    }

    // try-catch to send this data to backend
    try {
        const response = await fetch(url, {
            method: "POST",
            body: formData,
        });

        // getting response back from backend 
        const result = await response.json();

        if (!response.ok) {
            // console.error(result.status)
            // console.error(result.message)
            console.error(result);
            return;
        }
        console.log(result.message);

    } catch (error) {
        console.error("Upload failed :", error);
    }

    // using the progress bar



});


// XMLHttpRequest

/**uploading with progress bar
 * 
 * const xhr = new XMLHttpRequest();
    xhr.open("POST", url);

    xhr.upload.addEventListener("progress", (event) => {
        if (event.lengthComputable) {
            const percent = (event.loaded / event.total) * 100;

            console.log("Uploaded : " + percent.toFixed(2) + "%");

            document.querySelector("#progressBar").style.width = percent + "%";
            document.querySelector("#progressText").textContent = percent.toFixed(0) + "%";
        }
    });

    xhr.onload = () => {
        if (xhr.status === 200) {
            const result = JSON.parse(xhr.responseText);
        } else {
            console.log("upload failed!");
        }

    }
    xhr.onerror = () => {
        console.log("Network Error");
        console.error(xhr.status);
    };

    xhr.send(formData);
 */