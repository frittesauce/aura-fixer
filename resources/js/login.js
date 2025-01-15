const form = document.getElementById("login");

const usernameField = document.getElementById("username");
const passwordField = document.getElementById("password");

form.onsubmit = (event) => {
    event.preventDefault();

    const username = usernameField.value;
    const password = passwordField.value;

    let formData = new FormData();
    formData.append("username", username);
    formData.append("password", password);

    fetch("../api/login", {
        method: "POST",
        body: formData,
    });
};