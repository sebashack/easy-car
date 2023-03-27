document.addEventListener("DOMContentLoaded", function(event) {
  const isNewCheckbox = document.querySelector('#is_new');
  const kilometers = document.querySelector('#kilometers');

  // Escuchar el evento "change" del campo "manufacture_year"
  kilometers.addEventListener('change', function(event) {
    // Verificar si el año de fabricación es igual al año actual
    if (parseInt(kilometers.value) > 0) {
      // Marcar la casilla "is_new"
      isNewCheckbox.checked = false;
      isNewCheckbox.disabled = true;
    } else {
      // Desmarcar la casilla "is_new"
      isNewCheckbox.disabled = false;
    }
  });
});
