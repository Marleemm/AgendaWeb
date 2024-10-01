function cargarFormularioAgregar() {
    const formularioAgregar = document.getElementById('formulario-agregar');
    const url = '../AgendaWeb/Formularios/formulario.php'; // Ruta al formulario

    if (!formularioAgregar.innerHTML) {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                formularioAgregar.innerHTML = html;
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
        const formularioContacto = document.getElementById('formulario-contacto');
        formularioContacto.style.display = 'block';
    }
}
