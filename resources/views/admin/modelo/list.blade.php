<div class="container">
    <div class="card">
        <div class="card-header">
            <!-- Título de la tarjeta -->
            <h3 class="card-title">Seleccionar Marca y Ver Modelos</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <!-- Estructura de contenedor para colocar el select y la etiqueta en línea -->
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Dropdown para seleccionar una marca, con un evento onchange que llama a la función filterModels() -->
                        <select name="marca_id" id="marca_id" class="form-control" onchange="filterModels()">
                            <option value="">[--SELECCIONE--]</option>
                            <!-- Itera a través de las marcas y genera opciones para el dropdown -->
                            @foreach ($marca_modelo as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombremarca }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="items">
                            <!-- Etiqueta para los modelos filtrados -->
                            <label>Modelos Filtrados</label>
                            <!-- Lista de modelos filtrados -->
                            <ul id="selectedMarca">
                                <!-- Itera a través de los modelos y genera elementos de lista, con un atributo de marca-id -->
                                @foreach($listado as $modelo)
                                    <li data-marca-id="{{ $modelo->marca_id }}">{{ $modelo->nombremodelo }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para filtrar los modelos basados en la marca seleccionada -->
<script>
    function filterModels() {
        // Obtiene el valor de la marca seleccionada en el dropdown
        const selectedMarcaId = document.getElementById('marca_id').value;
        // Obtiene los elementos de la lista de modelos
        const itemsList = document.getElementById('selectedMarca').children;

        // Itera a través de los elementos de la lista
        for (let item of itemsList) {
            // Muestra el elemento si el valor de la marca seleccionada coincide con el atributo data-marca-id del elemento, o si no hay ninguna marca seleccionada
            if (selectedMarcaId === "" || item.getAttribute('data-marca-id') === selectedMarcaId) {
                item.style.display = "";
            } else {
                // Oculta el elemento si el valor de la marca seleccionada no coincide con el atributo data-marca-id del elemento
                item.style.display = "none";
            }
        }
    }
</script>
