<?php
    if (! function_exists('myConfigs')) {
        //Retorna todas as opções de configuração como uma matriz associativa.
        //Se o parâmetro opcional extension estiver definido, apenas as opções especificas para esta extensão serão retornadas.
        function myConfigs() {
            $inis = ini_get_all();
            print_r($inis);
        }
    }

    if (! function_exists('get_ip')) {
            // obtém o número ip do usuário
            function get_ip() {
                return getenv("REMOTE_ADDR");
        }
    }

    if (! function_exists('get_dates_by_period')) {
    
        //pega a data atual e retorna um array com a data exata de 15 em 15 dias neste caso
        function get_dates_by_period($periodo = '15'){
                $lastDate = date('Y-m-d');
                $myDates = array();
            
                for ($x=0; $x<=10; $x++){
                    $myDates[] = $lastDate;
                    $lastDate = date('Y-m-d', strtotime($lastDate . ' +'.$periodo.' days'));
                }
                return $myDates;
            }
    }


    if (! function_exists('get_dates_betwen_two_dates')) {
        function get_dates_betwen_two_dates($periodo = '15', $endDate = '2016-12-04') {
            $lastDate = date('Y-m-d');
            $myDates = array();
            $finished = false;
            while(!$finished){
                $lastDate = date('Y-m-d', strtotime($lastDate . ' +'.$periodo.' days')); 
                if(strtotime($lastDate) > strtotime($endDate)){ $finished = true; break; } 
                $myDates[] = $lastDate;
            }
        }
    }

    if (! function_exists('my_debug')) {
        // função para debugar código com mais praticidade
        function my_debug(&$variavel, $type = 'print'){
        
            echo '<pre>';
        
            if( is_null($variavel) ){
            echo "NULL";
            }
            
            if ( is_array( $variavel ) || is_object( $variavel ) ) {
        
            if ( $type == 'print' ) {
                print_r($variavel);
            } else {
                var_dump($variavel);
            }
        
            } else {
            echo $variavel;
            }
        
            echo '<br></pre>';
        }
    }
    