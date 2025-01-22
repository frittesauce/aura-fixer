const form = document.getElementById("login");

const usernameField = document.getElementById("username");
const passwordField = document.getElementById("password");

form.onsubmit = (event) => {
    event.preventDefault();

    const username = usernameField.value;
    const password = passwordField.value;

    fetch("../api/login", {
        method: "POST",
        body: JSON.stringify({
            username: username,
            password: password,
        }),
    });
}; 