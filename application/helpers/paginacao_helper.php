<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function pagination($atual, $total_registros, $por_pagina, $url,  $separador = '/'){
    $extraParams = substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1);
    $total_paginas = (int) ceil($total_registros / $por_pagina);

    $queryString = $extraParams != '' ? '?' . urldecode($extraParams) : '';
    $templateLink = base_url() . $url . $separador . '%d' . $separador . $por_pagina . $queryString;

    $html = '<nav><ul class="pagination justify-content-end">';

    // Página anterior
    if ($atual > 1) {
        $html .= '<li class="page-item"><a class="page-link" href="' . sprintf($templateLink, $atual - 1) . '" aria-label="Anterior">&laquo;</a></li>';
    }

    // Primeira página
    if ($atual > 3) {
        $html .= '<li class="page-item"><a class="page-link" href="' . sprintf($templateLink, 1) . '">1</a></li>';
        if ($atual > 4) $html .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
    }

    // Páginas centrais
    for ($i = max(1, $atual - 2); $i <= min($total_paginas, $atual + 2); $i++) {
        $active = $i == $atual ? 'active' : '';
        $html .= '<li class="page-item ' . $active . '"><a class="page-link" href="' . sprintf($templateLink, $i) . '">' . $i . '</a></li>';
    }

    // Última página
    if ($atual < $total_paginas - 2) {
        if ($atual < $total_paginas - 3) $html .= '<li class="page-item disabled"><span class="page-link">...</span></li>';
        $html .= '<li class="page-item"><a class="page-link" href="' . sprintf($templateLink, $total_paginas) . '">' . $total_paginas . '</a></li>';
    }

    // Próxima página
    if ($atual < $total_paginas) {
        $html .= '<li class="page-item"><a class="page-link" href="' . sprintf($templateLink, $atual + 1) . '" aria-label="Próximo">&raquo;</a></li>';
    }

    $html .= '</ul></nav>';
    return $html;
}

function paginationV2($atual, $total_registros, $por_pagina, $url,  $separador = '/'){

    $extraParams = substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1);
    $url_page_def = $url.$separador.'%d'.$separador.$por_pagina . ( $extraParams != '' ? '?'. urldecode($extraParams) : '');

    $total = @ceil( $total_registros / $por_pagina);


    $mnt_page = '<ul class="pagination pull-right" style="margin-top: 0;">';
    // Anterior
    if($atual > 1){
        $url_page_def = $url.$separador.($atual-1).$separador.$por_pagina . ( $extraParams != '' ? '?'. urldecode($extraParams) : '');
        $mnt_page .= '<li class="page-item">
                        <button type="button" class="btn btn-default btn-sm paginator" data-url="'.sprintf($url_page_def , 1 ).'" data-pagina="'.($atual-1).'"><i class="fa fa-angle-left"></i></button>
                    </li>';
    }
    if($atual > 2){
        $url_page_def = $url.$separador.'1'.$separador.$por_pagina . ( $extraParams != '' ? '?'. urldecode($extraParams) : '');
        $mnt_page .= '<li class="page-item">
                        <button type="button" class="btn btn-default btn-sm paginator" data-url="'.sprintf($url_page_def , 1 ).'" data-pagina="1"><i class="fa fa-step-backward" aria-hidden="true"></i></button>
                    </li>';
    }


    if($total > 5){

        // PASSO 1
        $anteriores =  $atual - 1;
        if($anteriores > 0){

            for($p = $anteriores; $p < $atual; $p++){
                if($p <= $total){
                    $url_page_def = $url.$separador.$p.$separador.$por_pagina . ( $extraParams != '' ? '?'. urldecode($extraParams) : '');
                    $mnt_page .= '<li '.($p == $atual ? 'class="active"' : '').'>
                        <button type="button" class="btn '.($p == $atual ? 'btn-primary' : 'btn-default').' btn-sm paginator" data-url="'.sprintf($url_page_def , 1 ).'"  data-pagina="'.$p.'">'.$p.'</button>
                    </li>';
                }
            }
        }else{
            $page = sprintf($url_page_def , 1 );
            $url_page_def = $url.$separador.'1'.$separador.$por_pagina . ( $extraParams != '' ? '?'. urldecode($extraParams) : '');
            $mnt_page .= '<li>
                        <button type="button" class="btn '.(1 == $atual  ? 'btn-primary' : 'btn-default').' btn-sm paginator" data-url="'.sprintf($url_page_def , 1 ).'"  data-pagina="1">1</button>
                    </li>';
        }

        // PASSO 2
        $quantas = $atual + 1;
        $inicia =$atual;
        if($inicia == 1){
            $inicia++;
        }
        for($p = $inicia; $p <= $quantas; $p++){
            if($p <= $total){
                $url_page_def = $url.$separador.$p.$separador.$por_pagina . ( $extraParams != '' ? '?'. urldecode($extraParams) : '');
                $mnt_page .= '<li >
                                <button type="button" class="btn '.($p == $atual ? 'btn-primary' : 'btn-default').' btn-sm paginator" data-url="'.sprintf($url_page_def , 1 ).'"  data-pagina="'.$p.'">'.$p.'</button>
                            </li>';
            }
        }

        if($total > $quantas){
            $url_page_def = $url.$separador.$total.$separador.$por_pagina . ( $extraParams != '' ? '?'. urldecode($extraParams) : '');
            $mnt_page .= '<li class="dots"><button type="button" class="btn btn-default btn-sm" data-url="'.sprintf($url_page_def , 1 ).'" data-pagina="'.$total.'">...</button></li>';
            $mnt_page .= '<li> 
                            <button type="button" class="btn '.($total == $atual ? 'btn-primary' : 'btn-default').' btn-sm paginator" data-url="'.sprintf($url_page_def , 1 ).'"  data-pagina="'.$total.'"><i class="fa fa-step-forward" aria-hidden="true"></i></button>
                        </li>';

        }
    }else{
        for($p = 1; $p <= $total; $p++){
            $url_page_def = $url.$separador.$p.$separador.$por_pagina . ( $extraParams != '' ? '?'. urldecode($extraParams) : '');
            $mnt_page .= '
                    <li>
                        <button type="button" class="btn '.($p == $atual ? 'btn-primary' : 'btn-default').' btn-sm paginator" data-url="'.sprintf($url_page_def , 1 ).'"  data-pagina="'.$p.'">'.$p.'</button>
                    </li>';
        }
    }



    // Pr�ximo
    if($atual < $total){
        $url_page_def = $url.$separador.($atual+1).$separador.$por_pagina . ( $extraParams != '' ? '?'. urldecode($extraParams) : '');
        $mnt_page .= '<li>
                        <button type="button" class="btn btn-default btn-sm paginator" data-url="'.sprintf($url_page_def , 1 ).'" data-pagina="'.($atual+1).'"><i class="fa fa-angle-right"></i></button>
                    </li>';
    }

    $mnt_page .= '</ul>';

    return $mnt_page;
}