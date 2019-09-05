<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//练习
Route::get('studen/add', 'UserController@studen');
Route::post('studen/studenadd_do', 'UserController@studenadd_do')->name('do');
Route::get('studen/lists', 'UserController@lists');
Route::get('studen/mali', 'MailController@index');
// 
// 考试学生
Route::get('studen/save', 'StudentController@save');
Route::post('studen/save_do', 'StudentController@save_do');
Route::get('studen/index', 'StudentController@index');
Route::get('studen/del/{id}', 'StudentController@del');
Route::get('studen/up/{id}', 'StudentController@up');
Route::post('studen/up_do/{id}', 'StudentController@up_do');

// 后台
Route::prefix('admin')->middleware('checklogin')->group(function () {
    // 考试货物
    Route::get('cargoadd','CargoController@cargosave');
    Route::post('cargoadd_do','CargoController@cargosave_do');
    Route::get('catgoindex','CargoController@catgoindex');
    Route::get('cargoup/{id}','CargoController@cargoup');
    Route::post('cargoupdate/{id}','CargoController@cargoupdate');
    





    Route::get('index', 'UserController@index');
    Route::get('head', 'UserController@head')->name('head');
    Route::get('foot', 'UserController@foot')->name('foot');
    Route::get('left', 'UserController@left')->name('left');
    Route::get('main', 'UserController@main')->name('main');
    // 管理员
    Route::get('useradd', 'UserController@useradd')->name('useradd');
    Route::post('useradd_do', 'UserController@useradd_do')->name('useradd_do');
    // 商品
    Route::get('goods', 'GoodsController@goods')->name('goods');
    Route::post('admin/goods_do', 'GoodsController@goods_do')->name('goods_do');
    Route::get('goods_list', 'GoodsController@goods_list')->name('goods_list');
    Route::get('goods_edit/{gid}', 'GoodsController@goods_edit');
    Route::post('goods_update/{gid}', 'GoodsController@goods_update');
    Route::get('goods_delete', 'GoodsController@goods_delete');
    // 分类
    Route::get('category', 'CatController@category')->name('category');
    Route::post('category_do', 'CatController@category_do')->name('category_do');
    Route::get('category_list', 'CatController@category_list')->name('category_list');
    // 品牌
    Route::get('brand', 'BrandController@brand')->name('brand');
    Route::post('brand_do', 'BrandController@brand_do')->name('brand_do');
    Route::get('brand_list', 'BrandController@brand_list')->name('brand_list');
    // 网站
    Route::get('site', 'SiteController@site')->name('site');
    Route::post('site_do', 'SiteController@site_do')->name('site_do');
    Route::get('site_list', 'SiteController@site_list')->name('site_list');
    Route::get('site_del', 'SiteController@site_del');
    Route::get('site_edit/{sid}','SiteController@site_edit');
    Route::post('site_update/{sid}', 'SiteController@site_update');
    Route::get('only', 'SiteController@only');
    // 新闻管理
    Route::get('newindex','NewsController@index');
	Route::get('add','NewsController@add');
	Route::post('add_do','NewsController@add_do');
	Route::get('address/{id}','NewsController@address');
	Route::get('dian','NewsController@dian');
    Route::get('qu','NewsController@qu');
    // 新闻管理2
});
    // 登陆
    Route::get('login_del', 'LoginController@login_del')->name('login_del');
    Route::get('login', 'LoginController@login');
    Route::post('login_do', 'LoginController@login_do')->name('login_do');
// 前台
    Route::get('/', 'IndexController@index');
    Route::get('index/login', 'LoginController@index');
    Route::post('index/login_do', 'LoginController@index_do');
    Route::get('/reg', 'LoginController@reg');
    Route::post('/reg_do', 'LoginController@reg_do');
    Route::get('/email', 'LoginController@email');
    // 商品展示
    Route::get('/goods', 'GoodsController@goodslist');
    // 商品详情页
    Route::get('index/proinfo_index/{gid}','ProinfoController@proinfo_index');
    // 所以商品展示
    Route::get('index/prolist/{cid}','ProlistController@prolist');
    // 购物车
    Route::get('index/car_index','GarController@car_index');

