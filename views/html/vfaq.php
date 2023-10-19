<?php
require_once __DIR__ . '/' . '../../controllers/cfaq.php';
?>
<section class="main__section section">
    <h1>Preguntas Frecuentes</h1>
</section>


<?php foreach ($model->getFaqs() as $item):?>
    <section class="main__section section">

    <?php foreach ($item as $key => $value):?>
        <?php if($key != 'id_faq'): ?>
            <?php if ($key == 'question'): ?>
                <h3><?= $value ?></h3>
            <?php else: ?>
                <p><?= $value ?></p>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>

    </section>   
<?php endforeach;?>
