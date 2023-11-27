<?php
    require_once __DIR__ . '/' . '../../controllers/cadminplanes.php';
    // require_once __DIR__ . '/' . '../../controllers/cshop.php'; 

?>

<section class="main__section section">
    <h1>Mobilatingo eShop</h1>
    <?php
    // var_dump($_SESSION);
    
    ?>

</section>

<?php foreach($listadoRegistros as $registro):?>
<section class='main__section section section_planes'>

    <h3><?=$registro['nom_plan']?></h3>
    
    <div>Valor: <?=$registro['valor_plan']?></div>
    <div>Vigencia: <?=$registro['dias_vigencia']?> dias</div>

    <button id="<?php echo 'verdetalle-' . $registro['id_plan'];?>" class='btn_secondary btn_planes'>Ver Detalle</button>
    
    <div id="<?php echo 'detalle-' . $registro['id_plan'];?>" class='block_hidden scrollbox scrollbox_planes'><?=$registro['desc_plan']?></div> 
    <form action="#" method="post">
    <input type="hidden" name="id_plan" value="<?=$registro['id_plan']?>" id="<?php echo 'inId-' . $registro['id_plan'];?>">
    <input type="hidden" name="nom_plan" value="<?=$registro['nom_plan']?>" id="<?php echo 'inNom-' . $registro['nom_plan'];?>">
    <input type="hidden" name="valor_plan" value="<?=$registro['valor_plan']?>" id="<?php echo 'inVal-' . $registro['valor_plan'];?>">
    <input type="hidden" name="dias_vigencia" value="<?=$registro['dias_vigencia']?>" id="<?php echo 'inVig-' . $registro['dias_vigencia'];?>">
    <input type="hidden" name="controller" value="carrito">
    <!-- <input type="submit" value="Comprar"> -->
    </form>
    <button id="<?php echo 'comprar-' . $registro['id_plan'];?>" data-id="<?=$registro['id_plan']?>" data-nom="<?=$registro['nom_plan']?>" data-val="<?=$registro['valor_plan']?>" data-vigen="<?=$registro['dias_vigencia']?>" data-carrito="<?=$carrito?>" class='btn_secondary btn_planes'>Comprar</button>
</section>
<?php endforeach;?>

<script type="module" src="../../src/js/crude/crudeeshop.js"></script>     

