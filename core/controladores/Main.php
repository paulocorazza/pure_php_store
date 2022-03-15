<?php

namespace core\controladores;

use core\classes\Store;

class Main
{

    public function index()
    {

        $dados = [
            'titulo' => APP_NAME . ' ' . APP_VERSION,
          
        ];

        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'inicio',
            'layouts/footer',
            'layouts/html_footer',
        ]);

    }

    public function loja()
    {
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'loja',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

    public function carrinho()
    {
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'carrinho',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }

}