const form = document.getElementById("login");

const usernameField = document.getElementById("username");
const passwordField = document.getElementById("password");

if (form) {
    form.onsubmit = async (event) => {
        event.preventDefault();

        const username = usernameField.value;
        const password = passwordField.value;

        const response = await fetch("../api/login", {
            method: "POST",
            body: JSON.stringify({
                username: username,
                password: password,
            }),
        });

        const json = await response.json();
        if (json["error"]) {
            return alert(json["error"]);
        }

        window.location.reload();
    };
}
