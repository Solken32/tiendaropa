
function showConfirmationDialog(contactoid) {
    var confirmationDialog = document.getElementById("confirmationDialog");
    confirmationDialog.style.display = "block";

    var deleteButton = document.getElementById("deleteButton");
    deleteButton.onclick = function() {
        eliminarproducto(contactoid);
    };

    var cancelButton = document.getElementById("cancelButton");
    cancelButton.onclick = function() {
        confirmationDialog.style.display = "none";
    };
}

function closeConfirmationDialog() {
    var confirmationDialog = document.getElementById("confirmationDialog");
    confirmationDialog.style.display = "none";
}

function eliminarproducto(contactoid) {
    var form = document.createElement("form");
    form.setAttribute("method", "post");
    form.style.display = "none";

    var input = document.createElement("input");
    input.setAttribute("type", "hidden");
    input.setAttribute("name", "id_contacto");
    input.setAttribute("value", contactoid);

    var inputEliminar = document.createElement("input");
    inputEliminar.setAttribute("type", "hidden");
    inputEliminar.setAttribute("name", "eliminar_contacto");
    inputEliminar.setAttribute("value", "eliminar");

    form.appendChild(input);
    form.appendChild(inputEliminar);
    document.body.appendChild(form);
    form.submit();
}




function buscarContacto() {
            // Obtener el valor del input de búsqueda
            let input = document.getElementById('inline-form-input-name').value.toLowerCase();
            // Obtener todas las filas de la tabla
            let tableBody = document.getElementById('ProductosTableBody');
            let rows = tableBody.getElementsByTagName('tr');

            // Recorrer todas las filas y ocultar las que no coincidan con la búsqueda
            for (let i = 0; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName('td');
                let nombre = cells[0].textContent.toLowerCase();
                if (nombre.indexOf(input) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }