<?php 

    if ( ! function_exists('data_br')){
        /**
        * data_br
        * 
        * Converte uma data no formato mysql para o formato brasileiro
        * 
        *
        * @param	string
        * @return	string
        */
        function data_br($data_bd){
            return implode('/',array_reverse(explode('-',$data_bd)));
        }
    }

    if ( ! function_exists('data_bd')){
        /**
        * data_bd
        * 
        * Converte uma data no formato brasileiro para o formato mysql
        * 
        *
        * @param	string
        * @return	string
        */
        function data_bd($data_br){
            return implode('-',array_reverse(explode('/',$data_br)));
        }
    }