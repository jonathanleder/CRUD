function confirmarEliminacion(id) {
    if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
        // Si el usuario confirma, redirige al script de eliminación
        window.location.href = "bajas.php?id=" + id;
    } else {
        // Si el usuario cancela, no se realiza ninguna acción
    }
}