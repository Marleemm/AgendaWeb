document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('orden-az').addEventListener('click', function() {
        // Cargar contactos ordenados de A-Z
        fetch('../AgendaWeb/Controladores/controlador_ordenar.php?criterio=nombre&orden=asc')
            .then(response => response.text())
            .then(html => {
                document.getElementById('lista').innerHTML = html;
            })
            .catch(error => {
                console.error('Error al cargar contactos ordenados de A-Z:', error);
            });
    });

    document.getElementById('orden-za').addEventListener('click', function() {
        // Cargar contactos ordenados de Z-A
        fetch('../AgendaWeb/Controladores/controlador_ordenar.php?criterio=nombre&orden=desc')
            .then(response => response.text())
            .then(html => {
                document.getElementById('lista').innerHTML = html;
            })
            .catch(error => {
                console.error('Error al cargar contactos ordenados de Z-A:', error);
            });
    });
});
