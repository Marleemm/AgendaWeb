// Selecciona el botón
const boton = document.getElementById('boton');
const formularioContainer = document.getElementById('formulario-container');

// Cargar el formulario de forma dinámica
boton.addEventListener('click', function() {
    if (!formularioContainer.innerHTML) {
        // Cargar el contenido del formulario desde el archivo HTML
        fetch('formulario.php')
            .then(response => response.text())
            .then(html => {
                formularioContainer.innerHTML = html;
                const formularioContacto = document.getElementById('formulario-contacto');
                const cerrarBtn = document.getElementById('cerrar');

                formularioContacto.style.display = 'block';

                cerrarBtn.addEventListener('click', function() {
                    formularioContacto.style.display = 'none';
                });
            })
            .catch(error => {
                console.error('Error al cargar el formulario:', error);
            });
    } else {
        // Si ya está cargado, simplemente mostrar el formulario
        const formularioContacto = document.getElementById('formulario-contacto');
        formularioContacto.style.display = 'block';
    }
});
