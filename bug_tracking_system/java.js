document.addEventListener("DOMContentLoaded", function() {
    
    const form = document.createElement("form");
    form.className = "container";
    form.method = "post";

    
    const h2 = document.createElement("h2");
    h2.textContent = "Login";
    form.appendChild(h2);

    
    const emailLabel = document.createElement("label");
    emailLabel.setAttribute("for", "email");
    emailLabel.innerHTML = "<b>Email</b>:";
    form.appendChild(emailLabel);
    form.appendChild(document.createElement("br"));

    
    const emailInput = document.createElement("input");
    emailInput.type = "text";
    emailInput.id = "email";
    emailInput.name = "email";
    emailInput.required = true;
    form.appendChild(emailInput);
    form.appendChild(document.createElement("br"));

    
    const passwordLabel = document.createElement("label");
    passwordLabel.setAttribute("for", "password");
    passwordLabel.innerHTML = "<b>Password</b>:";
    form.appendChild(passwordLabel);
    form.appendChild(document.createElement("br"));

    
    const passwordInput = document.createElement("input");
    passwordInput.type = "password";
    passwordInput.id = "password";
    passwordInput.name = "password";
    passwordInput.required = true;
    form.appendChild(passwordInput);
    form.appendChild(document.createElement("br"));
    form.appendChild(document.createElement("br"));


    const submitButton = document.createElement("button");
    submitButton.type = "submit";
    submitButton.value = "Login";
    submitButton.innerHTML = "<b>L</b>";
    form.appendChild(submitButton);
    form.appendChild(document.createElement("br"));

    
    const p = document.createElement("p");
    p.innerHTML = "Don't have an account? <a href='register.php'>Sign in here</a>";
    form.appendChild(p);

    
    document.body.appendChild(form);
});
