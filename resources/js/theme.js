// Tema por defecto
const defaultTheme = "retro";

// Función para aplicar el tema guardado
function applyTheme() {
    const savedTheme = localStorage.getItem('theme') || defaultTheme;
    document.documentElement.setAttribute('data-theme', savedTheme);

    // Sincroniza el estado del checkbox si existe en la página
    const checkbox = document.querySelector('.theme-controller');
    if (checkbox) {
        checkbox.checked = savedTheme === checkbox.value;
    }
}

// Función para cambiar el tema
function changeTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
}

// Aplicar el tema al cargar la página
applyTheme();

// Exportar la función global para el checkbox
window.changeTheme = changeTheme;
