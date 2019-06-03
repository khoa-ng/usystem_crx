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

/**
 * 
 * Laravel is providing the auth middleware defined in Illuminate\Auth\Middleware\Authenticate
 * 
 * example: 
*              Route::get('profile' , function(){
*                  ...authenticated users may enter....
*              })->middleware('auth');
 * 
 */

//Route::get('/', function () {
//    return view('member-log');
//})->middleware('auth');
Auth::routes();
Route::get('/', 'MemberLogController@index')->middleware('auth');
Route::get('/getskyperuser','ProjectController@getwholedata');
Route::get('/getskyperuser/{keyhint}','ProjectController@finddata');
Route::get('/getskyperuser/{skypename}/{sky_id}','ProjectController@updatadata');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');
Route::get('/profile', 'ProfileController@index');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');

Route::resource('user-management', 'UserManagementController');
Route::resource('workspaces', 'SlackWorkSpaceController');
Route::resource('applicants', 'ApplicantsController');
Route::resource('keywords', 'ForbiddenKeywordsController');
Route::resource('resource-management', 'ResourceManagementController');
Route::resource('forum-master', 'ForumMasterController');
Route::post('forum-master/add-forum-answer', 'ForumMasterController@addForumAnswer');
Route::resource('aws-master', 'AwsMasterController');
Route::resource('project' , 'ProjectController');

Route::get('market/getProfile' , 'MarketController@getProfile')->name('market.getProfile');
Route::get('market/getTestForProfile' , 'MarketController@getTestForProfile')->name('market.getTestForProfile');
Route::get('market/getEmailStatus' , 'MarketController@getEmailStatus')->name('market.getEmailStatus');
Route::get('market/checkEmail' , 'MarketController@checkEmail')->name('market.checkEmail');
Route::get('market/addTestForProfile' , 'MarketController@addTestForProfile')->name('market.addTestForProfile');
Route::get('market/doneStatus' , 'MarketController@doneStatus')->name('market.doneStatus');
Route::get('market/toggleStatus' , 'MarketController@toggleStatus')->name('market.toggleStatus');
Route::get('market/toggleRunState' , 'MarketController@toggleRunState')->name('market.toggleRunState');
Route::get('market/toggleRunningState' , 'MarketController@toggleRunningState')->name('market.toggleRunningState');
Route::get('market/markasseen' , 'MarketController@markasseen')->name('market.markasseen');

Route::resource('market' , 'MarketController');

Route::resource('slack-chat-pair' , 'SlackChatPairController');

Route::resource('slack-admin-state' , 'SlackAdminStateController');
Route::post('slack-admin-state/active', 'SlackAdminStateController@activeState');

Route::resource('/member-log', 'MemberLogController');
Route::resource('/git-manage', 'GitManageController');
Route::post('member-log/search', 'MemberLogController@search')->name('member-log.search');   
Route::post('member-log/log_detail_add', ['as'=>'ajaxImageUpload','uses'=>'MemberLogController@ajaxImageUpload']);   
Route::post('member-log/log_detail_delete', 'MemberLogController@log_detail_delete');

Route::post('project/store', 'ProjectController@store');
Route::post('project/addTask', 'ProjectController@addTask');
Route::post('project/getfromstatus', 'ProjectController@getfromstatus');
Route::post('project/editProject', 'ProjectController@editProject');
Route::post('project/removeTask', 'ProjectController@removeTask');
Route::post('project/editTask', 'ProjectController@editTask');

Route::post('slack/send', 'SlackController@sendMessage')->name('slack.send');
Route::get('slack', 'SlackController@index')->name('slack.index');
Route::post('slack/presence', 'SlackController@getPresence');


Route::get('slack-chat/{id}', 'SlackChatPairController@slackChat')->name('slack-chat.slackChat');

Route::get('messaging', 'SlackChatController@index')->name('messaging.index');

Route::get('/updateusers_cron', 'SlackWorkSpaceController@updateUsers_cron')->name('workspaces.updateusers');
Route::post('/invite', 'SlackWorkSpaceController@invite')->name('workspaces.invite');

Route::post('/update-statuses', 'SlackChatController@updateUserStatuses_ajax')->name('workspaces.updateUserStatuses');
Route::post('/get-channel-chat', 'SlackChatController@getChannelChat_ajax')->name('workspaces.getChannelChat');
Route::post('/send-slack-message', 'SlackChatController@sendSlackMessage_ajax')->name('workspaces.sendSlackMessage');

//slack chat pair
Route::post('/update-statuses-pair', 'SlackChatPairController@updateUserStatuses_ajax');
Route::post('/get-channel-chat-pair', 'SlackChatPairController@getChannelChat_ajax');
Route::post('/send-slack-message-pair', 'SlackChatPairController@sendSlackMessage_ajax');
Route::post('/select-pair', 'SlackChatPairController@selectPair_ajax');
Route::post('/upload-file', 'SlackChatPairController@uploadFile_ajax');
Route::get('/download-file/{id}/{token}', 'SlackChatPairController@downloadFile');
Route::get('/group-message', 'SlackChatController@groupMessage')->name('group-message.index');
Route::post('/send-slack-message-group', 'SlackChatController@sendGroupMessage_ajax');
Route::post('/slackchat/filterusers', 'SlackChatPairController@filterusers');

Route::post('/update-status-slack', 'SlackController@updateUserStatuses_ajax')->name('slack.updateUserStatuses');


Route::post('/edit-detail', 'ResourceManagementController@editResourceDetail')->name('resource-management.editDetail');
Route::post('/add-detail', 'ResourceManagementController@addResourceDetail')->name('resource-management.addDetail');
Route::get('/delete-detail/{id}', 'ResourceManagementController@deleteResourceDetail')->name('resource-management.deleteDetail');

Route::get('allocateprojects', 'AllocateProjectsController@index')->name('allocate-projects.index');
Route::post('/allocateprojects/ajaxprofromuser', 'AllocateProjectsController@ajaxprofromuser');
Route::post('/allocateprojects/updateproj', 'AllocateProjectsController@updateproj');
Route::post('/allocateprojects/del_proj', 'AllocateProjectsController@delproj');

Route::get('/allocation', 'AllocationController@index')->name('allocation.index');

Route::get('taskallocation', 'TaskAllocationController@index')->name('task-allocation.index');
Route::post('/taskallocation/taskfromuser', 'TaskAllocationController@taskfromuser');
Route::post('/taskallocation/updatetask', 'TaskAllocationController@updatetask');
Route::post('/taskallocation/del_task', 'TaskAllocationController@deltask');
Route::post('/taskallocation/taskfromproj', 'TaskAllocationController@taskfromproj');

Route::post('/gitmanage/ajaxrepofromuser', 'GitManageController@ajaxrepofromuser');
Route::post('/gitmanage/updaterepos', 'GitManageController@updaterepos');
Route::post('/gitmanage/del_invite', 'GitManageController@delinvite');
Route::get('/gitmanage/updateinfo', 'GitManageController@updateinfo');

Route::get('/get-resources-by-user/{id}', 'AllocationController@getResourcesByUser_ajax');
Route::get('/get-resources-by-project/{id}', 'AllocationController@getResourcesByProject_ajax');

Route::post('/update-user-resources', 'AllocationController@updateUserResources_ajax');
Route::post('/delete-user-resource', 'AllocationController@deleteUserResource_ajax');

// tokens
Route::post('/add-token', 'SlackWorkspaceController@addToken')->name('workspace-tokens.addToken');
Route::get('/delete-token/{id}', 'SlackWorkspaceController@deleteToken')->name('workspace-tokens.deleteToken');

//Message Templates
Route::get('/templates' , 'TemplateController@index')->name('templates.index');
Route::post('/templates/store' , 'TemplateController@store');
Route::get('/templates/get' , 'TemplateController@getTemplates');
Route::get('/templates/destroy/{id}' , 'TemplateController@destroy');
Route::get('/templates/get-content/{id}' , 'TemplateController@getContent');
Route::post('/templates/save-content' , 'TemplateController@saveContent');
