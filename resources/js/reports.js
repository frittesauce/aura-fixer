const reports = document.getElementById("reports");

function showReport(name, description, email) {
    const element = document.createElement("tr");
    element.className = "p-8 text-left even:bg-red-500";
    element.innerHTML = `
            <td>John</td>
            <td>Super cool</td>
`;

    reports.appendChild(element);
}

showReport("John", "yes", "email@email.com");
showReport("John", "yes", "email@email.com");
showReport("John", "yes", "email@email.com");
showReport("John", "yes", "email@email.com");
showReport("John", "yes", "email@email.com");
showReport("John", "yes", "email@email.com");
