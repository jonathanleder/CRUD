function mostrarMensaje(mensaje, tipo) {
    Swal.fire({
        title: 'Mensaje',
        text: mensaje,
        icon: tipo || 'info',
        confirmButtonText: 'Cerrar'
    });
}


document.addEventListener("DOMContentLoaded", function () {
    // Selecciona el botón de alta
    const altaButton = document.getElementById("altaForm");

    // Agrega un evento de clic al botón de alta
    altaButton.addEventListener("submit", function () {

        // Obtiene los datos del formulario
        const nombre = document.querySelector('input[name="nombre"]').value;
        const apellido = document.querySelector('input[name="apellido"]').value;
        const mail = document.querySelector('input[name="mail"]').value;
        const usuario = document.querySelector('input[name="usuario"]').value;
        const rol = document.querySelector('select[name="rol"]').value;

        // Realiza una petición AJAX para dar de alta al usuario
        fetch("alta.php", {
            method: "POST",
            body: JSON.stringify({ nombre, apellido, mail, usuario, rol }),
            headers: {
                "Content-Type": "application/json",
            },
        })
        .then((response) => response.json())
        .then((data) => {
            // Muestra el mensaje de confirmación
            mostrarMensaje(data.mensaje);

            // Limpia el formulario si el alta fue exitosa
            if (data.success) {
                document.getElementById("altaForm").reset();
            }
        })
        .catch((error) => {
            console.error("Error al dar de alta el registro:", error);
        });
    });

    // Agrega un evento de clic a todos los botones de clase "eliminar-btn"
    const eliminarButtons = document.querySelectorAll(".eliminar-btn");
    console.log("boton eliminar clickeado");
    eliminarButtons.forEach((button) => {
        console.log("boton eliminar clickeado");
        button.addEventListener("click", function () {
            const idEliminar = button.getAttribute("data-id");

            // Mostrar cuadro de diálogo de confirmación con SweetAlert2
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Deseas dar de baja a este usuario?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, dar de baja',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Realizar una solicitud AJAX para eliminar al usuario
                    fetch("eliminar.php", {
                        method: "POST",
                        body: JSON.stringify({ idEliminar }),
                        headers: {
                            "Content-Type": "application/json",
                        },
                    })
                    .then((response) => response.text())
                    .then((data) => {
                        // Muestra el mensaje de confirmación o error con SweetAlert2
                        Swal.fire({
                            title: data === "Registro eliminado con éxito" ? 'Eliminado' : 'Error',
                            text: data,
                            icon: data === "Registro eliminado con éxito" ? 'success' : 'error',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function() {
                            // Recarga la página después de eliminar con éxito
                            if (data === "Registro eliminado con éxito") {
                                location.reload();
                            }
                        });
                    })
                    .catch((error) => {
                        console.error("Error al eliminar el registro:", error);
                    });
                }
            });
        });
    });
});
