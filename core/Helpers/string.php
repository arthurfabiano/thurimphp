<?php

/**
* limitar_texto
* 
* Remove todas as tags HTML e limita os caractéres do texto, adicionando ... se for maior que o limite
* 
*
* @param	string, int
* @return	string
*/

    if ( ! function_exists('limitar_texto')){
        function limitar_texto($texto,$limit){
            $texto = strip_tags($texto);
            if(strlen($texto) > $limit){
                return substr($texto,0,$limit).'...';
            } else {		
            return substr($texto,0,$limit);
            }
        }
    }

    if ( ! function_exists('antiInjection')) {
        //Remove palavras suspeitas de injection.
        function antiInjection($str) {
            $str = preg_replace(sql_regcase("/(\n|\r|%0a|%0d|Content-Type:|bcc:|.php|to:|cc:|Autoreply:|from|select|insert|delete|where|drop
        table|show tables|#|\*|--|\\\\)/"), "", $str);
            $str = trim($str);        # Remove espaços vazios.
            $str = strip_tags($str);  # Remove tags HTML e PHP.
            $str = addslashes($str);  # Adiciona barras invertidas à uma string.
            return $str;
        }
    }

    //cria um slug a partir de uma palara ou frase
    if ( ! function_exists('slugfy')) {
        function slugfy($str) {
            
            function tirarAcentos($string) {
                return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
            }

            function sanitize($string) {
            $s = str_replace(array("*","?", "--", "%", "'", "&", "#", "\"", "/", ",", ";"),"", $string);
            }

            $s = tirarAcentos($str);
            $s = sanitize($s);
            $s = strtolower(str_replace(' ', '-', trim($s)));
            return $s;

        }
    }





