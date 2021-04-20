<?php 

    if ( ! function_exists('url_amigavel')){ 
        /**
        * url_amigavel
        * 
        * Retira acentos, substitui espaço por - e
        * deixa tudo minúsculo
        * 
        *
        * @param	string
        * @return	string
        */
        function url_amigavel($variavel){
            $procurar 	= array('à','ã','â','é','ê','í','ó','ô','õ','ú','ü','ç',);
            $substituir = array('a','a','a','e','e','i','o','o','o','u','u','c',);
            $variavel = strtolower($variavel);
            $variavel	= str_replace($procurar, $substituir, $variavel);
            $variavel = htmlentities($variavel);
        $variavel = preg_replace("/&(.)(acute|cedil|circ|ring|tilde|uml);/", "$1", $variavel);
        $variavel = preg_replace("/([^a-z0-9]+)/", "-", html_entity_decode($variavel));
        return trim($variavel, "-");
        }

    }   

    if ( ! function_exists('redirect')) {
        //Safe PHP function to grant page redirection. It tris redirecting with php, html and js.
        function redirect($url) {
            if (!headers_sent())
            {
                header('Location: '.$url);
            }
            else
            {
                echo '<script type="text/javascript">';
                echo 'window.location.href="'.$url.'";';
                echo '</script>';
                echo '<noscript>';
                echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
                echo '</noscript>';
            }
        }
    }