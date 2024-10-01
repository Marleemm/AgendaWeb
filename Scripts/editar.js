document.getElementById('btn-editar').addEventListener('click', function(event) {
    event.preventDefault(); // Evitar el comportamiento predeterminado solo si estamos alternando la visibilidad

    const radio = document.querySelectorAll('input[type="radio"]'); // Selecciona todos los radio buttons


    radio.forEach(radio => {
        radio.style.display = radio.style.display === 'none' ? 'inline' : 'none';
    });
});