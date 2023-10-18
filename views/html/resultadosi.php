<section id="resultados" class="main__section main__section_resultados-busqueda  section section_resultados-busqueda">
<!-- contenido creado dinamicamente con resultados de la busqueda main__section_hidden -->
  <table class="tabla_busqueda">
    <thead class="text text_header_tabla">
        <tr>
            <th>Compañia</th>
            <th>Direccion</th>
            <!-- <th>Distancia</th> -->
        </tr>
    </thead>
    <tbody class="text_resultado_tabla">
        <?php foreach($this->model->getEmpresas() as $item): ?>
            <tr>
                <?php foreach($item as $key => $value):?>

                    <td><?= $value ?></td>
                <?php endforeach;?>
            </tr>
        <?php endforeach; ?>

    </tbody>   
    
  </table>

</section>   