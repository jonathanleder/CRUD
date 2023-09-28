document.addEventListener("DOMContentLoaded", function () {


    const modForm = document.getElementById("modificarForm");

    // Agrega un evento de envío al formulario de modificación
    modForm.addEventListener("submit", function (event) {
        event.preventDefault();
        // Obtiene los datos del formulario
        const id = document.querySelector('input[name="id"]').value;
        const nombre = document.querySelector('input[name="nombre"]').value;
        const apellido = document.querySelector('input[name="apellido"]').value;
        const mail = document.querySelector('input[name="mail"]').value;
        const usuario = document.querySelector('input[name="usuario"]').value;
        const rol = document.querySelector('select[name="rol"]').value;
        // Realiza una solicitud AJAX para guardar la modificación
        fetch("guardar_modificacion.php", {
            method: "POST",
            body: JSON.stringify({ id, nombre, apellido, mail, usuario, rol }),
        })
        .then((response) => response.json())
        .then((data) => {
            // Muestra el mensaje de confirmación
            Swal.fire({
                title: data.success ? 'Éxito' : 'Error',
                text: data.mensaje,
                icon: data.success ? 'success' : 'error',
                timer: 2000,
                showConfirmButton: false
            }).then(function() {
                if (data.success) {
                    // Redirige o realiza otras acciones después de una modificación exitosa
                    window.location.href = "index.php";
                }
            });
        })
        .catch((error) => {
            console.error("Error al modificar el registro:", error);
        });
    });

});
