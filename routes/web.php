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
// test page
Route::get('/email-register', ['as' => 'template-email-register', 'uses' => 'UserAccountController@emailRegister']);

// landing page
Route::get('/', 'HomeController@index');

// Page Landing Berita
Route::get('/Blog', ['as' => 'articel', 'uses' => 'articles\DetailArticleController@index']);
Route::get('/app', ['as' => 'app', 'uses' => 'HomeController@app']);
Route::get('/articel/single{id_jdl}', ['as' => 'showDetailsBerita', 'uses' => 'articles\DetailArticleController@showDetailsBerita']);
// Route::get('/', function () {
//     return view('welcome');
// });
// Page landing Event
Route::get('/shop', ['as' => 'listBuku', 'uses' => 'digital_library\LibraryDetailController@listBuku']);

//page 404
Route::get('/404', function () {
    return view('404');
});

// middleware auth (harus login dulu)
Route::group(['middleware' => ['auth']], function() {
    // story
    Route::get('story/index', ['as' => 'story', 'uses' => 'admin\StoryController@index']);

    // event
    Route::get('event/create', ['as' => 'create', 'uses' => 'admin\EventController@create']);
    Route::post('event/create', ['as' => 'store', 'uses' => 'admin\EventController@store']);
});

Route::get('/book-detail/{id_story}', 'HomeController@detail');
Route::get('/book-read/{id_part_story}', 'HomeController@read');
Route::get('/book-id/{id_story}', 'HomeController@bookId');

Route::get('/writing-program', 'HomeController@writingProgram');
Route::get('/home-inkubasi/{id}', 'HomeController@homeInkubasi');

Route::get('/all-event', 'HomeController@allEvent');
Route::get('/detail-event/{id}', 'HomeController@detailEvent');
Route::post('/form-competition', 'HomeController@formCompetition');

Route::get('/create/chapter/{id_story}', 'HomeController@chapter');
Route::post('/create/chapter/{id_story}', 'HomeController@chapterStore');
Route::get('/create/create', ['as' => 'create', 'uses' => 'HomeController@createStory']);
Route::post('/create/create', ['as' => 'store', 'uses' => 'HomeController@storeStory']);

Route::post('/view/story', ['as' => 'viewstory', 'uses' => 'HomeController@viewStory']);
Route::post('/search-story', ['as' => 'searchstory', 'uses' => 'HomeController@searchStory']);
Route::get('/search-story', ['as' => 'searchstory', 'uses' => 'HomeController@searchStory']);

Route::get('/news-feeds/{id}', 'HomeController@newsfeeds');

Route::get('/create/view/{id}', 'HomeController@view');
Route::get('/add/view/{id}', 'HomeController@addView');
Route::put('/add/view/{id}', 'HomeController@createView');
Route::put('/create/view/{id}', 'HomeController@updateView');
Route::get('/create/create-satu/{id}', 'HomeController@createsatu');
Route::get('/profil/{id}', 'HomeController@profil');
Route::get('/challenge-satu', 'HomeController@challengesatu');
Route::get('/challenge', 'HomeController@challenge');
Route::get('/news-feed', 'HomeController@news');
Route::get('/news-message-chat', ['as' => 'new-message', 'uses' => 'HomeController@newMessageChat']);
Route::get('/message-chat', 'HomeController@messageChat');
Route::post('/message-chat/sent', 'HomeController@messageChatSent');
Route::get('/conversation/{encrypted}', 'HomeController@conversation');
Route::get('/news-feed-detail/{id}', 'HomeController@newsDetail');
Route::put('/message-reply/sent/{id}', 'HomeController@messageChatReply');
Route::get('/search-message', ['as' => 'search-message', 'uses' => 'HomeController@searchMessage']);
Route::get('search/destroy/{id}', ['as' => 'destroy-message', 'uses' => 'HomeController@destroyMessage']);

Route::get('/search-categories/{id_category}', 'HomeController@searchCategories');

Auth::routes();

Route::get('/@dmin-alomorf', 'admin\AdminController@index');
Route::get('/home', 'HomeController@index');

/*===========================
===========================*/
Route::get('/program-novel/{id}', 'HomeController@programNovel');
Route::get('/formulir-program-novel/{id}', 'HomeController@formulirProgramnovel');
Route::get('/create-formulir-program-novel/{id}', 'HomeController@createformulirProgramNovel');
Route::post('/formulir-program-novel/create/{id}', 'HomeController@postformulirProgramNovel');
Route::post('/formulir-program-novel/update/{id}', 'HomeController@updateformulirProgramNovel');
Route::delete('/formulir-program-novel/destroy/{id}', ['as' => 'destroy', 'uses' => 'HomeController@destroyProgramNovel']);
Route::get('/detail-program-novel/{id}', 'HomeController@detailProgramnovel');

/*===========================
===========================*/

//User Group
Route::get('search-user-groups','admin\UserGroupController@search');
Route::get('/user-groups/index', 'admin\UserGroupController@index');
Route::get('/user-groups/create', ['as' => 'create', 'uses' => 'admin\UserGroupController@create']);
Route::post('/user-groups/store', ['as' => 'store', 'uses' => 'admin\UserGroupController@store']);
Route::get('/user-groups/edit/{id}', 'admin\UserGroupController@edit');
Route::put('/user-groups/upadate/{id}', 'admin\UserGroupController@update');
Route::get('/user-groups/show/{id}', 'admin\UserGroupController@show');
Route::delete('/user-groups/destroy/{id}', 'admin\UserGroupController@destroy');

//Group
Route::get('search-groups','admin\GroupController@search');
Route::get('/groups/index', 'admin\GroupController@index');
Route::get('/groups/create', ['as' => 'create', 'uses' => 'admin\GroupController@create']);
Route::post('/groups/store', ['as' => 'store', 'uses' => 'admin\GroupController@store']);
Route::get('/groups/edit/{id}', 'admin\GroupController@edit');
Route::put('/groups/upadate/{id}', 'admin\GroupController@update');
Route::get('/groups/show/{id}', 'admin\GroupController@show');
Route::delete('/groups/destroy/{id}', 'admin\GroupController@destroy');

//Role 
Route::get('search-roles','admin\RoleController@search');
Route::get('/roles/index', 'admin\RoleController@index');
Route::get('/roles/create', ['as' => 'create', 'uses' => 'admin\RoleController@create']);
Route::post('/roles/store', ['as' => 'store', 'uses' => 'admin\RoleController@store']);
Route::get('/roles/edit/{id}', 'admin\RoleController@edit');
Route::put('/roles/upadate/{id}', 'admin\RoleController@update');
Route::get('/roles/show/{id}', 'admin\RoleController@show');
Route::delete('/roles/destroy/{id}', 'admin\RoleController@destroy');

//Group Role
Route::get('search-group-roles','admin\GroupRoleController@search');
Route::get('/group-roles/index', 'admin\GroupRoleController@index');
Route::get('/group-roles/create', ['as' => 'create', 'uses' => 'admin\GroupRoleController@create']);
Route::post('/group-roles/store', ['as' => 'store', 'uses' => 'admin\GroupRoleController@store']);
Route::get('/group-roles/edit/{id}', 'admin\GroupRoleController@edit');
Route::put('/group-roles/upadate/{id}', 'admin\GroupRoleController@update');
Route::get('/group-roles/show/{id}', 'admin\GroupRoleController@show');
Route::delete('/group-roles/destroy/{id}', 'admin\GroupRoleController@destroy');

//Grup articel
Route::get('article/index', ['as' => 'article', 'uses' => 'articles\ArticleController@index']);
Route::get('article/create', ['as' => 'create', 'uses' => 'articles\ArticleController@create']);
Route::post('article/create', ['as' => 'store', 'uses' => 'articles\ArticleController@store']);
Route::get('article/edit/{id_jdl}', ['as' => 'edit', 'uses' => 'articles\ArticleController@edit']);
Route::put('article/edit/{id_jdl}', ['as' => 'edit', 'uses' => 'articles\ArticleController@update']);
Route::get('article/show/{id_jdl}', ['as' => 'show', 'uses' => 'articles\ArticleController@show']);
Route::delete('article/destroy/{id_jdl}', ['as' => 'destroy', 'uses' => 'articles\ArticleController@destroy']);
Route::get('/searcharticle', ['as' => 'searcharticle', 'uses' => 'articles\ArticleController@search']);

// Group Event
// Route::get('event/index', ['as' => 'event', 'uses' => 'event\EventController@index']);
// Route::get('event/create', ['as' => 'create', 'uses' => 'event\EventController@create']);
// Route::post('event/create', ['as' => 'store', 'uses' => 'event\EventController@store']);
// Route::get('event/edit/{id_evn}', ['as' => 'edit', 'uses' => 'event\EventController@edit']);
// Route::put('event/edit/{id_evn}', ['as' => 'edit', 'uses' => 'event\EventController@update']);
// Route::get('event/show/{id_evn}', ['as' => 'show', 'uses' => 'event\EventController@show']);
// Route::delete('event/destroy/{id_evn}', ['as' => 'destroy', 'uses' => 'event\EventController@destroy']);
// Route::get('searchevent', ['as' => 'searchevent', 'uses' => 'event\Eventontroller@search']);

//Announcement
Route::get('announcement/index', ['as' => 'announcement', 'uses' => 'announcement\AnnouncementController@index']);
Route::get('announcement/create', ['as' => 'create', 'uses' => 'announcement\AnnouncementController@create']);
Route::post('announcement/create', ['as' => 'store', 'uses' => 'announcement\AnnouncementController@store']);
Route::get('announcement/edit/{id}', ['as' => 'edit', 'uses' => 'announcement\AnnouncementController@edit']);
Route::put('announcement/edit/{id}', ['as' => 'edit', 'uses' => 'announcement\AnnouncementController@update']);
Route::get('announcement/show/{id}', ['as' => 'show', 'uses' => 'announcement\AnnouncementController@show']);
Route::delete('announcement/destroy/{id}', ['as' => 'destroy', 'uses' => 'announcement\AnnouncementController@destroy']);
Route::get('searchannouncement', ['as' => 'searchannouncement', 'uses' => 'announcement\AnnouncementController@search']);

//Pimpinan
Route::get('pimpinan/index', ['as' => 'pimpinan', 'uses' => 'pimpinan\PimpinanController@index']);
Route::get('pimpinan/create', ['as' => 'create', 'uses' => 'pimpinan\PimpinanController@create']);
Route::post('pimpinan/create', ['as' => 'store', 'uses' => 'pimpinan\PimpinanController@store']);
Route::get('pimpinan/edit/{id}', ['as' => 'edit', 'uses' => 'pimpinan\PimpinanController@edit']);
Route::put('pimpinan/edit/{id}', ['as' => 'edit', 'uses' => 'pimpinan\PimpinanController@update']);
Route::get('pimpinan/show/{id}', ['as' => 'show', 'uses' => 'pimpinan\PimpinanController@show']);
Route::delete('pimpinan/destroy/{id}', ['as' => 'destroy', 'uses' => 'pimpinan\PimpinanController@destroy']);
Route::get('searchpimpinan', ['as' => 'searchpimpinan', 'uses' => 'pimpinan\PimpinanController@search']);

//edit profil
Route::get('editprofil/index', ['as' => 'editprofil', 'uses' => 'editprofil\EditProfilController@index']);
Route::get('editprofil/create', ['as' => 'create', 'uses' => 'editprofil\EditProfilController@create']);
Route::post('editprofil/create', ['as' => 'store', 'uses' => 'editprofil\EditProfilController@store']);
Route::get('editprofil/edit/{id}', ['as' => 'edit', 'uses' => 'editprofil\EditProfilController@edit']);
Route::put('editprofil/edit/{id}', ['as' => 'edit', 'uses' => 'editprofil\EditProfilController@update']);
Route::get('editprofil/show/{id}', ['as' => 'show', 'uses' => 'editprofil\EditProfilController@show']);
Route::delete('editprofil/destroy/{id}', ['as' => 'destroy', 'uses' => 'editprofil\EditProfilController@destroy']);
Route::get('searcheditprofil', ['as' => 'searcheditprofil', 'uses' => 'editprofil\EditProfilController@search']);

// Category
Route::get('category/index', ['as' => 'category', 'uses' => 'admin\CategoryController@index']);
Route::get('category/create', ['as' => 'create', 'uses' => 'admin\CategoryController@create']);
Route::post('category/create', ['as' => 'store', 'uses' => 'admin\CategoryController@store']);
Route::get('category/edit/{id_category}', ['as' => 'edit', 'uses' => 'admin\CategoryController@edit']);
Route::put('category/edit/{id_category}', ['as' => 'edit', 'uses' => 'admin\CategoryController@update']);
Route::get('category/show/{id_category}', ['as' => 'show', 'uses' => 'admin\CategoryController@show']);
Route::delete('category/destroy/{id_category}', ['as' => 'destroy', 'uses' => 'admin\CategoryController@destroy']);
Route::get('/searchcategory', ['as' => 'searchcategory', 'uses' => 'admin\CategoryController@search']);

// Language
Route::get('language/index', ['as' => 'language', 'uses' => 'admin\LanguageController@index']);
Route::get('language/create', ['as' => 'create', 'uses' => 'admin\LanguageController@create']);
Route::post('language/create', ['as' => 'store', 'uses' => 'admin\LanguageController@store']);
Route::get('language/edit/{id_language}', ['as' => 'edit', 'uses' => 'admin\LanguageController@edit']);
Route::put('language/edit/{id_language}', ['as' => 'edit', 'uses' => 'admin\LanguageController@update']);
Route::get('language/show/{id_language}', ['as' => 'show', 'uses' => 'admin\LanguageController@show']);
Route::delete('language/destroy/{id_language}', ['as' => 'destroy', 'uses' => 'admin\LanguageController@destroy']);
Route::get('/searchlanguage', ['as' => 'searchlanguage', 'uses' => 'admin\LanguageController@search']);

// NewFeed
Route::get('newfeed/index', ['as' => 'newfeed', 'uses' => 'admin\NewFeedController@index']);
Route::get('newfeed/create', ['as' => 'create', 'uses' => 'admin\NewFeedController@create']);
Route::post('newfeed/create', ['as' => 'store', 'uses' => 'admin\NewFeedController@store']);
Route::get('newfeed/edit/{id}', ['as' => 'edit', 'uses' => 'admin\NewFeedController@edit']);
Route::put('newfeed/edit/{id}', ['as' => 'edit', 'uses' => 'admin\NewFeedController@update']);
Route::get('newfeed/show/{id}', ['as' => 'show', 'uses' => 'admin\NewFeedController@show']);
Route::get('newfeed/destroy/{id}', ['as' => 'newsfeed-destroy', 'uses' => 'admin\NewFeedController@destroy']);
Route::get('/searchnewfeed', ['as' => 'searchnewfeed', 'uses' => 'admin\NewFeedController@search']);

// Story Rating
Route::get('story_rating/index', ['as' => 'story_rating', 'uses' => 'admin\StoryRatingController@index']);
Route::get('story_rating/create', ['as' => 'create', 'uses' => 'admin\StoryRatingController@create']);
Route::post('story_rating/create', ['as' => 'store', 'uses' => 'admin\StoryRatingController@store']);
Route::get('story_rating/edit/{id}', ['as' => 'edit', 'uses' => 'admin\StoryRatingController@edit']);
Route::put('story_rating/edit/{id}', ['as' => 'edit', 'uses' => 'admin\StoryRatingController@update']);
Route::get('story_rating/show/{id}', ['as' => 'show', 'uses' => 'admin\StoryRatingController@show']);
Route::delete('story_rating/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\StoryRatingController@destroy']);
Route::get('/searchstory_rating', ['as' => 'searchstory_rating', 'uses' => 'admin\StoryRatingController@search']);

// Part Story Status
Route::get('part_story_status/index', ['as' => 'part_story_status', 'uses' => 'admin\PartStoryStatusController@index']);
Route::get('part_story_status/create', ['as' => 'create', 'uses' => 'admin\PartStoryStatusController@create']);
Route::post('part_story_status/create', ['as' => 'store', 'uses' => 'admin\PartStoryStatusController@store']);
Route::get('part_story_status/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PartStoryStatusController@edit']);
Route::put('part_story_status/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PartStoryStatusController@update']);
Route::get('part_story_status/show/{id}', ['as' => 'show', 'uses' => 'admin\PartStoryStatusController@show']);
Route::delete('part_story_status/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PartStoryStatusController@destroy']);
Route::get('/searchpart_story_status', ['as' => 'searchpart_story_status', 'uses' => 'admin\PartStoryStatusController@search']);
Route::delete('part-story/destroy/{id_part_story}', ['as' => 'destroy', 'uses' => 'HomeController@destroyPartStory']);
Route::get('/part-story/show/{id_part_story}', 'HomeController@showPartStory');
Route::get('/part-story/edit/{id_story}', 'HomeController@chapterEdit');
Route::put('/part-story/edit/{id_story}', 'HomeController@chapterUpdate');

// Story
Route::get('story/create', ['as' => 'create', 'uses' => 'admin\StoryController@create']);
Route::post('story/create', ['as' => 'store', 'uses' => 'admin\StoryController@store']);
Route::get('story/edit/{id}', ['as' => 'edit', 'uses' => 'admin\StoryController@edit']);
Route::put('story/admin/edit/{id}', ['as' => 'edit', 'uses' => 'admin\StoryController@updateOnAdmin']);
Route::put('story/edit/{id}', ['as' => 'edit', 'uses' => 'admin\StoryController@updateStory']);
Route::get('story/show/{id}', ['as' => 'show', 'uses' => 'admin\StoryController@show']);
Route::get('story/destroy/{id_story}', ['as' => 'story-destroy', 'uses' => 'admin\StoryController@destroy']);
Route::get('/searchstory', ['as' => 'searchstory', 'uses' => 'admin\StoryController@search']);
Route::get('story/recommand/{id_story}', ['as' => 'recommand', 'uses' => 'admin\StoryController@recommand']);
Route::get('story/not-recommand/{id_story}', ['as' => 'not_recommand', 'uses' => 'admin\StoryController@notRecommand']);
Route::post('/story/change-cover/{id_story}', ['as' => 'changestory', 'uses' => 'admin\StoryController@changeCover']);

// Event
Route::get('event/index', ['as' => 'event', 'uses' => 'admin\EventController@index']);
Route::get('event/edit/{id}', ['as' => 'edit', 'uses' => 'admin\EventController@edit']);
Route::put('event/edit/{id}', ['as' => 'edit', 'uses' => 'admin\EventController@update']);
Route::get('event/show/{id}', ['as' => 'show', 'uses' => 'admin\EventController@show']);
Route::get('event/destroy/{id}', ['as' => 'event-destroy', 'uses' => 'admin\EventController@destroy']);
Route::get('/searchevent', ['as' => 'searchevent', 'uses' => 'admin\EventController@search']);

// User Profile
Route::get('userprofile/index', ['as' => 'userprofile', 'uses' => 'admin\UserProfileController@index']);
Route::get('userprofile/create', ['as' => 'create', 'uses' => 'admin\UserProfileController@create']);
Route::post('userprofile/create', ['as' => 'store', 'uses' => 'admin\UserProfileController@store']);
Route::get('userprofile/edit/{id_user_profile}', ['as' => 'edit', 'uses' => 'admin\UserProfileController@edit']);
Route::put('userprofile/edit/{id_user_profile}', ['as' => 'edit', 'uses' => 'admin\UserProfileController@update']);
Route::get('userprofile/show/{id_user_profile}', ['as' => 'show', 'uses' => 'admin\UserProfileController@show']);
Route::get('userprofile/destroy/{id_user_profile}', ['as' => 'destroy-userprofile', 'uses' => 'admin\UserProfileController@destroy']);
Route::get('/searchuserprofile', ['as' => 'searchuserprofile', 'uses' => 'admin\UserProfileController@search']);

// Group sliders
Route::get('sliders/index', ['as' => 'sliders', 'uses' => 'admin\SlidersController@index']);
Route::get('sliders/create', ['as' => 'create', 'uses' => 'admin\SlidersController@create']);
Route::post('sliders/create', ['as' => 'store', 'uses' => 'admin\SlidersController@store']);
Route::get('sliders/edit/{id}', ['as' => 'edit', 'uses' => 'admin\SlidersController@edit']);
Route::put('sliders/edit/{id}', ['as' => 'edit', 'uses' => 'admin\SlidersController@update']);
Route::get('sliders/show/{id}', ['as' => 'show', 'uses' => 'admin\SlidersController@show']);
Route::delete('sliders/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\SlidersController@destroy']);
Route::get('/searchsliders', ['as' => 'searchsliders', 'uses' => 'admin\SlidersController@search']);

// Category
Route::get('category-news-feed/index', ['as' => 'category', 'uses' => 'admin\CategoryNewsFeedController@index']);
Route::get('category-news-feed/create', ['as' => 'create', 'uses' => 'admin\CategoryNewsFeedController@create']);
Route::post('category-news-feed/create', ['as' => 'store', 'uses' => 'admin\CategoryNewsFeedController@store']);
Route::get('category-news-feed/edit/{id_category_news_feed}', ['as' => 'edit', 'uses' => 'admin\CategoryNewsFeedController@edit']);
Route::put('category-news-feed/edit/{id_category_news_feed}', ['as' => 'edit', 'uses' => 'admin\CategoryNewsFeedController@update']);
Route::get('category-news-feed/show/{id_category_news_feed}', ['as' => 'show', 'uses' => 'admin\CategoryNewsFeedController@show']);
Route::delete('category-news-feed/destroy/{id_category_news_feed}', ['as' => 'destroy', 'uses' => 'admin\CategoryNewsFeedController@destroy']);
Route::get('/searchcategory-news-feed', ['as' => 'searchcategory-news-feed', 'uses' => 'admin\CategoryNewsFeedController@search']);

// Competition Participant
Route::get('competition-participant/index', ['as' => 'competition-participant', 'uses' => 'admin\CompetitionParticipantController@index']);
Route::get('competition-participant/show/{id}', ['as' => 'show', 'uses' => 'admin\CompetitionParticipantController@show']);
Route::get('competition-participant/verifikasi/{id}', ['as' => 'verifikasi', 'uses' => 'admin\CompetitionParticipantController@verifikasi']);
Route::get('competition-participant/notVerifikasi/{id}', ['as' => 'notVerifikasi', 'uses' => 'admin\CompetitionParticipantController@notVerifikasi']);
Route::get('/searchcompetition-participant', ['as' => 'searchcompetition-participant', 'uses' => 'admin\CompetitionParticipantController@search']);

//Comment
Route::post('/form-comment', 'HomeController@formComment');
Route::post('/form-comment-story-home', 'HomeController@formCommentStoryHome');
Route::post('/form-comment-part-story', 'HomeController@formCommentPartStory');
Route::post('/form-comment-writing-program', 'HomeController@formCommentWritingProgram');
Route::post('/form-comment-program-novel', 'HomeController@formCommentProgramNovel');
Route::post('/form-comment-inkubasi', 'HomeController@formCommentInkubasi');

// Writing Program
Route::get('writing-program/index', ['as' => 'category', 'uses' => 'admin\WritingProgramController@index']);
Route::get('writing-program/create', ['as' => 'create', 'uses' => 'admin\WritingProgramController@create']);
Route::post('writing-program/create', ['as' => 'store', 'uses' => 'admin\WritingProgramController@store']);
Route::get('writing-program/edit/{id}', ['as' => 'edit', 'uses' => 'admin\WritingProgramController@edit']);
Route::put('writing-program/edit/{id}', ['as' => 'edit', 'uses' => 'admin\WritingProgramController@update']);
Route::get('writing-program/show/{id}', ['as' => 'show', 'uses' => 'admin\WritingProgramController@show']);
Route::delete('writing-program/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\WritingProgramController@destroy']);

// Writing Participant
Route::get('writing-program-participant/index', ['as' => 'writing-program-participant', 'uses' => 'admin\WritingProgramParticipantController@index']);
Route::get('writing-program-participant/show/{id}', ['as' => 'show', 'uses' => 'admin\WritingProgramParticipantController@show']);
Route::get('writing-program-participant/verifikasi/{id}', ['as' => 'verifikasi', 'uses' => 'admin\WritingProgramParticipantController@verifikasi']);
Route::get('writing-program-participant/notVerifikasi/{id}', ['as' => 'notVerifikasi', 'uses' => 'admin\WritingProgramParticipantController@notVerifikasi']);
Route::post('/form-writing-program-participant', 'HomeController@formWritingProgram');
Route::get('/searchwriting-program-participant', ['as' => 'searchwriting-program-participant', 'uses' => 'admin\WritingProgramParticipantController@search']);

// Inkubasi Participant
Route::get('inkubasi-program-participant/index', ['as' => 'inkubasi-program-participant', 'uses' => 'admin\InkubatorParticipantController@index']);
Route::get('/searchinkubasi-program-participant', ['as' => 'searchinkubasi-program-participant', 'uses' => 'admin\InkubatorParticipantController@search']);
Route::get('inkubasi-program-participant/edit/{id}', ['as' => 'edit', 'uses' => 'admin\InkubatorParticipantController@edit']);
Route::put('inkubasi-program-participant/edit/{id}', ['as' => 'edit', 'uses' => 'admin\InkubatorParticipantController@update']);

// Profile User
Route::get('profil-user/{id}', ['as' => 'profil-user', 'uses' => 'HomeController@profilUser']);
Route::put('profil-edit-user/{id}', ['as' => 'profil-user', 'uses' => 'ProfilController@update']);

// Konten Inkubator
Route::get('inkubator/index', ['as' => 'index', 'uses' => 'admin\InkubatorController@index']);
Route::get('inkubator/create', ['as' => 'create', 'uses' => 'admin\InkubatorController@create']);
Route::post('inkubator/create', ['as' => 'store', 'uses' => 'admin\InkubatorController@store']);
Route::get('inkubator/edit/{id}', ['as' => 'edit', 'uses' => 'admin\InkubatorController@edit']);
Route::put('inkubator/edit/{id}', ['as' => 'edit', 'uses' => 'admin\InkubatorController@update']);
Route::get('inkubator/show/{id}', ['as' => 'show', 'uses' => 'admin\InkubatorController@show']);
Route::delete('inkubator/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\InkubatorController@destroy']);

// Rating
Route::post('/rating/{id_story}', 'HomeController@rating');

// Filter news feed
Route::get('/filter-news-feed/{id_category_news_feed}', 'HomeController@filterNewsFeed');
// Inkubasi
Route::post('/form-inkubasi-participant', 'HomeController@formInkubasi');
Route::post('/form-chat-inkubasi', 'HomeController@formChatInkubasi');

// Part writing program
Route::get('part-writing-program/index', ['as' => 'index', 'uses' => 'admin\PartWritingProgramController@index']);
Route::get('part-writing-program/create', ['as' => 'create', 'uses' => 'admin\PartWritingProgramController@create']);
Route::post('part-writing-program/create', ['as' => 'store', 'uses' => 'admin\PartWritingProgramController@store']);
Route::get('part-writing-program/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PartWritingProgramController@edit']);
Route::put('part-writing-program/edit/{id}', ['as' => 'edit', 'uses' => 'admin\PartWritingProgramController@update']);
Route::get('part-writing-program/show/{id}', ['as' => 'show', 'uses' => 'admin\PartWritingProgramController@show']);
Route::delete('part-writing-program/destroy/{id}', ['as' => 'destroy', 'uses' => 'admin\PartWritingProgramController@destroy']);

Route::get('select2-autocomplete-ajax', 'HomeController@dataAjax');

Route::get('/verification', ['as' => 'user-account-verification', 'uses' => 'UserAccountController@verificationUser']);
Route::get('/resend-verification-email', ['as' => 'user-account-resend-verification-email', 'uses' => 'UserAccountController@resendVerificationUser']);

// Mentor
Route::get('mentor/index', ['as' => 'index', 'uses' => 'admin\MentorController@index']);
Route::get('mentor/create', ['as' => 'create', 'uses' => 'admin\MentorController@create']);
Route::post('mentor/create', ['as' => 'store', 'uses' => 'admin\MentorController@store']);
Route::get('mentor/edit/{id}', ['as' => 'edit', 'uses' => 'admin\MentorController@edit']);
Route::put('mentor/edit/{id}', ['as' => 'edit', 'uses' => 'admin\MentorController@update']);
Route::get('mentor/show/{id}', ['as' => 'show', 'uses' => 'admin\MentorController@show']);
Route::delete('mentor/destroy/{id}', ['as' => 'destroy-mentor', 'uses' => 'admin\MentorController@destroy']);
