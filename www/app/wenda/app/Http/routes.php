<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::any('/',"SignController@signin");
Route::get('/s/{type?}/{page?}',"IndexController@index");
Route::post('vmobile',"SignController@vmobile");
Route::post('upload',"TestController@upload");
Route::post('svcode',"SignController@svcode");
Route::post('signup',"SignController@signup");
Route::post('rpassword',"SignController@rpassword");

Route::get('detail/{qaid}/{sort?}/{page?}',"TopicController@detail");
Route::post('scomment',"TopicController@scomment");
Route::post('dcomment',"TopicController@dcomment");
Route::post('like',"TopicController@like");
Route::post('minuslike',"TopicController@minuslike");
Route::post('dislike',"TopicController@dislike");
Route::post('minusdislike',"TopicController@minusdislike");
Route::post('fcreate',"TopicController@fcreate");
Route::post('dcreate',"TopicController@dcreate");
Route::any('search/{content?}/{page?}',"TopicController@search");


Route::post('plike',"CommentController@pluslike");
Route::post('commentqalistpage',"CommentController@comment_qa_list_page");

Route::post('follow',"UserController@follow");
Route::post('delete',"UserController@delete");
Route::get('ask/{uid}/{page?}',"UserController@ask_question");
Route::get('cans/{uid}/{page?}',"UserController@center_answer");
Route::get('col/{page?}',"UserController@collection");
Route::get('careuser/{page?}',"UserController@careuser");
Route::get('dynamic/{uid}/{page?}',"UserController@dynamic");
Route::get('notice/{uid}/{page?}',"UserController@notice");

Route::post('dqa',"UserController@deleteqa");
Route::post('ajaxfollow',"UserController@ajaxfollow");
Route::any('/setting',"UserController@user_setting");
Route::post('updatei',"UserController@updateinfo");
Route::post('supcode',"UserController@supcode");
Route::post('updatepassword',"UserController@updatepassword");

Route::get('signout',"SignController@signout");

Route::any('/qadd',"QuestionController@add_question");
Route::post('/qans',"QuestionController@answer_question");
Route::any('qupdate/{qaid?}',"QuestionController@update_answer");
Route::any('updateq/{qaid?}',"QuestionController@update_question");
Route::post('dnotice',"UserController@delnotice");


Route::get('aindex',"AnswerController@index");

Route::get('column',"TutorController@column");
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
