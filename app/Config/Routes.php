<?php  

    /**
     * Author: Arthur Fabiano
     * 
     * Rotas do Sistema
     * 
     */

    $route[] = ['/user/create', 'UserController@create'];
    $route[] = ['/user/store', 'UserController@store'];

    $route[] = ['/login', 'UserController@login'];
    $route[] = ['/login/auth', 'UserController@auth'];
    $route[] = ['/logout', 'UserController@logout'];

    $route[] = ['/', 'HomeController@index'];


    $route[] = ['/sobre', 'SobreController@index'];
    $route[] = ['/documentacao', 'DocumentacaoController@index'];

    $route[] = ['/posts', 'PostsController@index'];
    $route[] = ['/posts/{$id}/show', 'PostsController@show'];
    $route[] = ['/posts/create', 'PostsController@create', 'auth'];
    $route[] = ['/posts/store', 'PostsController@store', 'auth'];
    $route[] = ['/posts/{id}/edit', 'PostsController@edit', 'auth'];
    $route[] = ['/posts/{id}/update', 'PostsController@update', 'auth'];
    $route[] = ['/posts/{id}/delete', 'PostsController@delete', 'auth'];

    return $route;