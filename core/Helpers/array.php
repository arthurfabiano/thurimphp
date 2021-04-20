<?php 

    if ( ! function_exists('explode_t')){
        /**
        * explode_t
        * 
        * Faz o explode em PHP, usa a função trim em cada índice do array e monta o array novamente
        * Author: Arthur Fabiano
        *
        * @param	string, string
        * @return	array
        */
        function explode_t($delimitador,$string){
            $explode = explode($delimitador, $string);
            $array = array();
            foreach ($explode as $item) {
                $array[] = trim($item);	
            }
            return $array;
        }
    }