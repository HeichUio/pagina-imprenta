document.addEventListener("DOMContentLoaded", () => {

    // 👁️ mostrar / ocultar password
    document.querySelectorAll(".toggle-pass").forEach(btn => {
        btn.addEventListener("click", () => {
            const input = btn.previousElementSibling;

            if (input.type === "password") {
                input.type = "text";
                btn.textContent = "🙈";
            } else {
                input.type = "password";
                btn.textContent = "👁️";
            }
        });
    });

    // 🔥 validación visual
    document.querySelectorAll("input").forEach(input => {
        input.addEventListener("input", () => {
            if (input.value.length > 2) {
                input.style.boxShadow = "0 0 10px #00ff99";
            } else {
                input.style.boxShadow = "0 0 10px #ff4d4d";
            }
        });
    });

});