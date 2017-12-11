<?php

Route::group(['middleware' => 'make_admin_breadcrumb'], function() {
    Auth::routes();
});

Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'make_admin_breadcrumb'], 'prefix' => 'site-admin'], function() {
    Route::get('/', 'AdminController@index');

    Route::resource('/usuarios', 'UsersController');
    Route::resource('/grupos', 'GruposController');
    Route::resource('/permissoes', 'PermissoesController');
    Route::resource('/itens_permissoes', 'ItensPermissoesController');

    Route::get('/grupos_itens_permissoes', 'GruposItensPermissoesController@index');
    Route::get('/grupos_itens_permissoes/create', 'GruposItensPermissoesController@create');
    Route::post('/grupos_itens_permissoes', 'GruposItensPermissoesController@store');
    Route::delete('/grupos_itens_permissoes/{grupo_id}/{itens_permissoes_id}', 'GruposItensPermissoesController@destroy');
    Route::get('/grupos_itens_permissoes/itens_permissoes/{permissao_id}', 'GruposItensPermissoesController@itens_permissoes');

    Route::resource('/categorias', 'CategoriasController');
    Route::resource('/artigos', 'ArtigosController');
    Route::get('/artigos/imagem/tamanho', 'ArtigosController@imagem_tamanho');
    Route::get('/artigos/imagem/{id}', 'ArtigosController@delete_imagem')->name('delete_imagem');
    Route::resource('/destaques', 'DestaquesController');
    Route::get('/destaques/artigos/{num}', 'DestaquesController@more');

    Route::resource('/produtos', 'ProdutosController');
    Route::resource('/designs', 'DesignsController');
    Route::resource('/qualidades_sonoras', 'QualidadesSonorasController');
    Route::resource('/acessorios', 'AcessoriosController');
    Route::resource('/tecnologias', 'TecnologiasController');
    Route::resource('/recursos', 'RecursosController');
    Route::resource('/conectividades', 'ConectividadesController');
    Route::resource('/produtos_destaques', 'ProdutosDestaquesController');
    Route::get('/produtos_destaques/produtos/{num}', 'ProdutosDestaquesController@more');

    Route::resource('/cadastros', 'CadastrosController');
    Route::resource('/tipo_cadastros', 'TipoCadastrosController');
    Route::resource('/historicos_contatos', 'HistoricosContatosController');

    Route::resource('/banners', 'BannersController');

    Route::resource('/franquias', 'FranquiasController');
    Route::resource('/fotos_franquias', 'FotosFranquiasController');

    Route::resource('/questoes', 'QuestoesController');

    Route::get('/depoimentos/cadastros', 'DepoimentosController@cadastros');
    Route::resource('/depoimentos', 'DepoimentosController');

    Route::resource('/perguntas', 'PerguntasController');
    Route::resource('/alternativas', 'AlternativasController');
    Route::get('/respostas', 'RespostasController@index');
    Route::get('/respostas/{id}', 'RespostasController@show');
    Route::delete('/respostas/{id}', 'RespostasController@destroy');

    Route::resource('/redirects', 'RedirectsController');

    Route::resource('/curriculos', 'CurriculosController');

    Route::resource('/locais', 'LocaisController');

    Route::resource('/tipo_media', 'TipoMediaController');
    Route::get('/media/filter', 'MediaController@filter');
    Route::resource('/media', 'MediaController');
    Route::get('/media/media_derivatives/create', 'MediaController@media_derivatives');
    Route::get('/media/media_derivatives/{id}/destroy', 'MediaController@media_derivatives_destroy');

    Route::resource('/scripts', 'ScriptsController');

    Route::resource('/spams_lists', 'SpamsListsController');
});

?>
