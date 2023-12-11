<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$front = [
    'namespace' => 'App\Http\Controllers\Front',
];
Route::group($front,function(){
    Route::get('/',['uses' => 'IndexController@index', 'as' => 'front-index']);
    //Новости
    Route::get('/news',['uses' => 'NewsController@index', 'as' => 'news-index']);
    Route::get('/news/search',['uses' => 'NewsController@search', 'as' => 'news-search']);
    Route::get('/news/search/tag/{id}',['uses' => 'NewsController@searchTag', 'as' => 'news-search-tag']);
    Route::get('/news/article/{id}',['uses' => 'NewsController@article', 'as' => 'news-article']);
    //Форум
    Route::get('/forum',['uses' => 'ForumController@index', 'as' => 'forum-index']);
    Route::get('/forum/search',['uses' => 'ForumController@search', 'as' => 'forum-search']);
    Route::get('/forum/search/tag/{id}',['uses' => 'ForumController@searchTag', 'as' => 'forum-search-tag']);
    Route::get('/forum/article/{id}',['uses' => 'ForumController@article', 'as' => 'forum-article']);
    //Магазин
    Route::get('/shop',['uses' => 'ShopController@index','as' => 'shop-index']);
    Route::get('/shop/rate/{id}/{item}',['uses' => 'ShopController@rate','as' => 'shop-rate']);
    Route::get('/shop/product/{id}',['uses' => 'ShopController@product','as' => 'shop-product']);
    Route::get('/shop/search',['uses' => 'ShopController@search','as' => 'shop-search']);
    //Оплата
    Route::match(['GET','POST'],'/payment/create',['uses' => 'PaymentController@create','as' => 'payment-create']);
    Route::get('/payment/success/{id}/{user_id}',['uses' => 'PaymentController@success','as' => 'payment-success']);
    Route::get('/payment/check/{id}',['uses' => 'PaymentController@check','as' => 'payment-check']);
    // Правила
    Route::get('/rules/{id}',['uses' => 'RulesController@index','as' => 'rules-index']);
    //
    Route::get('/verified/user/{link}',['uses' => 'VerifiedController@index','as' => 'verified-user-index']);
    // База знаний
    $knowledge = [
        'namespace' => 'Knowledge',
        'prefix' => 'knowledge',
    ];
    Route::group($knowledge,function(){
        Route::get('/',['uses' => 'KnowledgeBaseController@index','as' => 'knowledge-base-index']);
        Route::get('/quest',['uses' => 'KnowledgeQuestController@index','as' => 'knowledge-quest-index']);
        Route::get('/npc',['uses' => 'KnowledgeNpcController@index','as' => 'knowledge-npc-index']);
    });
});
$back = [
    'namespace' => 'App\Http\Controllers\Back',
    'middleware' => ['auth', 'web'],
];
Route::group($back,function(){
    $user = [
        'namespace' => 'User',
        'prefix' => 'users'
    ];
    Route::group($user,function(){
        Route::get('/',['uses' => 'IndexController@index','as'=>'users-index']);
        Route::get('/profile',['uses' => 'IndexController@index','as'=>'users-profile']);
        Route::post('/new/password',['uses' => 'IndexController@newPassword','as'=>'users-new-password']);
        Route::post('/new/phone',['uses' => 'IndexController@newPhone','as'=>'users-new-phone']);
        //Регистрация аккаунта
        Route::post('/reg',['uses' => 'RegisterAccountController@reg','as'=>'users-reg-account']);
        Route::post('/reg/new/password',['uses' => 'RegisterAccountController@regNewPassword','as'=>'user-account-new-password']);
        //Корзина
        Route::match(['GET','POST'],'/cart',['uses' => 'CartController@index','as' => 'cart-index']);
        Route::match(['GET','POST'],'/cart/add/{id}',['uses' => 'CartController@add','as' => 'cart-add']);
        Route::match(['GET','POST'],'/cart/delete/{id}',['uses' => 'CartController@delete','as' => 'cart-delete']);
        Route::match(['GET','POST'],'/cart/update',['uses' => 'CartController@update','as' => 'cart-update-price']);
        //перевод итемов на персонажа
        Route::post('/character/add/item',['uses' => 'CharacterController@addItem','as' => 'user-character-add-item']);
        //Forum
        Route::post('/forum/add',['uses' => 'ForumController@add', 'as' => 'forum-add']);
        Route::match(['GET','POST'],'/forum/post/add/{id}/{forum_id}',['uses' => 'ForumController@addPost', 'as' => 'forum-post-add']);
        //chat
        Route::match(['GET','POST'],'/chat/{id}',['uses' => 'ChatController@index','as'=>'chat-index']);
        Route::match(['GET','POST'],'/message',['uses' => 'ChatController@message','as'=>'chat-message']);
    });
    $admin = [
        'namespace' => 'Admin',
        'prefix' => 'admin',
        'middleware' => ['admin'],
    ];
    Route::group($admin,function(){
        Route::get('/',['uses' => 'IndexController@index','as'=>'admin-index']);
        //Users
        Route::get('/users',['uses' => 'UsersController@index','as'=>'admin-users-index']);
        Route::post('/users/add',['uses' => 'UsersController@add','as'=>'admin-users-add']);
        Route::post('/users/edit/{id}',['uses' => 'UsersController@edit','as'=>'admin-users-edit']);
        Route::post('/users/delete/{id}',['uses' => 'UsersController@delete','as'=>'admin-users-delete']);
        //Seo
        Route::get('/seo',['uses' => 'SeoController@index','as'=>'admin-seo-index']);
        Route::post('/seo/add',['uses' => 'SeoController@add','as'=>'admin-seo-add']);
        Route::post('/seo/edit/{id}',['uses' => 'SeoController@edit','as'=>'admin-seo-edit']);
        Route::post('/seo/delete/{id}',['uses' => 'SeoController@delete','as'=>'admin-seo-delete']);
        // Accounts
        Route::get('/account',['uses' => 'AccountsController@index','as' => 'admin-accounts-index']);
        //Character
        Route::get('/character/{id}',['uses' => 'AccountsController@characterIndex','as' => 'admin-character-index']);
        Route::post('/character/edit/{id}',['uses' => 'AccountsController@characterEdit','as' => 'admin-character-edit']);
        Route::post('/character/search',['uses' => 'AccountsController@characterSearch','as' => 'admin-character-search']);
        Route::post('/character/delete/{id}',['uses' => 'AccountsController@characterDelete','as' => 'admin-character-delete']);
        //orders
        Route::get('/orders',['uses' => 'OrdersController@index','as'=>'admin-orders-index']);
        Route::post('/orders/search',['uses' => 'OrdersController@search','as'=>'admin-orders-search']);
        Route::post('/orders/add',['uses' => 'OrdersController@add','as'=>'admin-orders-add']);
        Route::post('/orders/edit/{id}',['uses' => 'OrdersController@edit','as'=>'admin-orders-edit']);
        Route::post('/orders/delete/{id}',['uses' => 'OrdersController@delete','as'=>'admin-orders-delete']);
        //items
        Route::match(['GET','POST'],'/items',['uses' => 'ItemsController@index','as'=>'admin-items-index']);
        Route::match(['GET','POST'],'/items/add',['uses' => 'ItemsController@add','as'=>'admin-items-add']);
        Route::match(['GET','POST'],'/items/edit/{id}',['uses' => 'ItemsController@edit','as'=>'admin-items-edit']);
        Route::match(['GET','POST'],'/items/delete/{id}',['uses' => 'ItemsController@delete','as'=>'admin-items-delete']);
        //paid_items
        Route::match(['GET','POST'],'/paid/items',['uses' => 'PaidItemsController@index','as'=>'admin-paid-items-index']);
        Route::match(['GET','POST'],'/paid/items/add',['uses' => 'PaidItemsController@add','as'=>'admin-paid-items-add']);
        Route::match(['GET','POST'],'/paid/items/edit/{id}',['uses' => 'PaidItemsController@edit','as'=>'admin-paid-items-edit']);
        Route::match(['GET','POST'],'/paid/items/delete/{id}',['uses' => 'PaidItemsController@delete','as'=>'admin-paid-items-delete']);
        //news
        Route::match(['GET','POST'],'/news',['uses' => 'NewsController@index','as'=>'admin-news-index']);
        Route::match(['GET','POST'],'/news/add',['uses' => 'NewsController@add','as'=>'admin-news-add']);
        Route::match(['GET','POST'],'/news/edit/{id}',['uses' => 'NewsController@edit','as'=>'admin-news-edit']);
        Route::match(['GET','POST'],'/news/delete/{id}',['uses' => 'NewsController@delete','as'=>'admin-news-delete']);
        //tags
        Route::match(['GET','POST'],'/tags',['uses' => 'TagsController@index','as'=>'admin-tags-index']);
        Route::match(['GET','POST'],'/tags/add',['uses' => 'TagsController@add','as'=>'admin-tags-add']);
        Route::match(['GET','POST'],'/tags/edit/{id}',['uses' => 'TagsController@edit','as'=>'admin-tags-edit']);
        Route::match(['GET','POST'],'/tags/delete/{id}',['uses' => 'TagsController@delete','as'=>'admin-tags-delete']);
        //Gift
        Route::match(['GET','POST'],'/gifts',['uses' => 'GiftsController@index','as'=>'admin-gifts-index']);
        Route::match(['GET','POST'],'/gifts/add',['uses' => 'GiftsController@add','as'=>'admin-gifts-add']);
        Route::match(['GET','POST'],'/gifts/edit/{id}',['uses' => 'GiftsController@edit','as'=>'admin-gifts-edit']);
        Route::match(['GET','POST'],'/gifts/delete/{id}',['uses' => 'GiftsController@delete','as'=>'admin-gifts-delete']);
        //forum
        Route::match(['GET','POST'],'/forum',['uses' => 'ForumController@index','as'=>'admin-forum-index']);
        Route::match(['GET','POST'],'/forum/add',['uses' => 'ForumController@add','as'=>'admin-forum-add']);
        Route::match(['GET','POST'],'/forum/edit/{id}',['uses' => 'ForumController@edit','as'=>'admin-forum-edit']);
        Route::match(['GET','POST'],'/forum/delete/{id}',['uses' => 'ForumController@delete','as'=>'admin-forum-delete']);
        //rules
        Route::get('/rules/{id}',['uses' => 'RulesController@index','as'=>'admin-rules-index']);
        Route::post('/rules/edit/{id}',['uses' => 'RulesController@edit','as'=>'admin-rules-edit']);
    });
});

Auth::routes();
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
