<?php

use core\classes\Store;
$_SESSION['cliente'] = 1;

?>

<div class="container-fluid navegacao">
    <div class="row">
        <div class="col-6 p-3">
            <a href="?a=inicio" class="text-white">
              <h3><?=  APP_NAME ?></h3>
            </a>
        </div>
        <div class="col-6 text-end p-3">
            <a href="?a=inicio" class="text-white">Início</a>
            <a href="?a=loja" class="text-white">Loja</a>

            <?php if(Store::clienteLogado()):?>
                <a href="?a=logout" class="text-white">Logout</a>
                <a href="?a=minha_conta" class="text-white">Minha Conta</a>
            <?php else:?>
                <a href="?a=login" class="text-white">login</a>
                <a href="?a=criar_conta" class="text-white">Criar Conta</a>
            <?php endif; ?>

            <a href="?a=carrinho" class="text-white"><i class="fas fa-shopping-cart"></i></a>
            <span class="badge bg-warning">10</span>
        </div>
    </div>
</div> 