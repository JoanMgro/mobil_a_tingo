
<div id="modal" class="modal">
    <div class="pagina__data_paginas">
        <?php foreach($listadoPagPer as $pagper):?> 
                      
            <div id="<?='pag' . $pagper['pagid']?>">
                <label for="<?=$pagper['pagid']?>"><?=$pagper['pagnom']?></label>
                <?php if(isset($pagper['pefid'])):?>
                    <input type="checkbox" name="pagid" id="<?=$pagper['pagid']?>" checked value="<?=$pagper['pagid'] . '-' . $pagper['perfil'] . '-' . 'borrarpagper'?>">
                <?php else:?>
                    <input type="checkbox" name="pagid" id="<?=$pagper['pagid']?>" value="<?=$pagper['pagid'] . '-' . $pagper['perfil'] . '-' . 'agregarpagper'?>">
                <?php endif;?>
            </div>
        <?php endforeach;?>
        
    </div>
    <button id="close_modal" class="modal_btn">Cerrar</button>
    <script type="module" src="../../src/js/modal/modalpagper.js"></script>
</div>