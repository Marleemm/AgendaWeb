$(document).ready(function() {
    $('.favoritos').click(function() {
        var button = $(this);
        var contactoId = button.data('id');

        var currentImg = button.find('img');

        var currentSrc = currentImg.attr('src');

        var newSrc = currentSrc.includes('imagenes/nfav.png') ? 'imagenes/fav.png' : 'imagenes/nfav.png';
        var isFavorito = newSrc.includes('imagenes/fav.png') ? 1 : 0; // 1 si es favorito, 0 si no

        // Cambiar la imagen
        currentImg.attr('src', newSrc);

        $.ajax({
            url: '../AgendaWeb/Controladores/controlador_favorito.php', // Archivo PHP que manejará la actualización
            type: 'POST',
            data: {
                id: contactoId,
                favorito: isFavorito 
            },
            success: function(response) {
                console.log(response); // Puedes manejar la respuesta si es necesario
                location.reload(); 

            },
            error: function(xhr, status, error) {
                console.error('Error:', error); // Manejar el error
            }
        });
    });
});