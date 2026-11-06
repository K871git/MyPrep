const loginForm = document.getElementById("loginForm");
const loginMessage = document.getElementById("loginMessage");
const url = "/appmanager/resources/php/sessionP.php";
loginForm.addEventListener("submit", async function (event) {
    event.preventDefault();
    const formData = new FormData(loginForm);

    try {
        const response = await fetch(url, {
            method: "POST",
            body: formData
        });

        const result = await response.json();
        loginMessage.textContent = result.message;

        setTimeout(() => {
            window.location.href = "/appmanager/resources/php/dashboard.php";
        }, 1000);
    } catch (error) {
        loginMessage.textContent = "Something went wrong...!";
        console.log("Error :", error)
    }

});