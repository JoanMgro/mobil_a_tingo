<?php if (isset($data)):?>
  <table>
    <thead>
        <tr>
            <th>Compañia</th>
            <th>Calificacion</th>
            <th>Distancia</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $item): ?>
            <tr>
                <?php foreach($item as $key => $value):?>
                    <td><?= $value ?></td>
                <?php endforeach;?>
            </tr>
        <?php endforeach; ?>

    </tbody>   
    
  </table>
  <?php endif; ?>