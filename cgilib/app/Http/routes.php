<?php


Route::get('/check-scrap',        'ScrapController@checkScrap'); // tube8


Route::get('/site-scrap',        'ScrapController@site_scrap_data'); // tube8
Route::get('/site-two-scrap',    'ScrapController@two_site_checking');  //se


Route::get('/', function(){
    return redirect('/user/login');
});

Route::get('/user', function(){
    return redirect('/user/login');
});

Route::get('/login', function(){
    return redirect('/user/login');
});



Route::get('/admin-login', function(){
    return redirect('/admin/login');
});

Route::get('/admin', function(){
    return redirect('/admin/login');
});


Route::group(['prefix' => 'user'], function () {

	Route::get('/login',    'User\AuthController@login');
    Route::post('/login',   'User\AuthController@loginAction');
		
	Route::group(['middleware' => 'user-auth'], function () {
	    
		Route::get('/boga' ,                                        'User\HomeController@bogus');
		
	    Route::post('/file-download', 'User\FileDownloaderController@test_dl');
	    
		
		Route::get('/home' ,                                        'User\UserHomeController@index');
		//Route::get('/home' ,                                        'User\CalendarController@index');
    	Route::get('/home/two' ,                                    'User\UserHomeController@index_two');
    	Route::get('/home/three' ,                                    'User\UserHomeController@index_three');
    	Route::get('/home/four' ,                                    'User\UserHomeController@index_four');
        
    	Route::get('/home/five' ,                                    'User\UserHomeController@index_five');
    	Route::get('/home/six' ,                                    'User\UserHomeController@index_six');
    	Route::get('/home/seven' ,                                    'User\UserHomeController@index_seven');
    	Route::get('/home/eight' ,                                    'User\UserHomeController@index_eight');
		Route::get('/home/nine' ,                                    'User\UserHomeController@index_nine');
		Route::get('/home/ten' ,                                    'User\UserHomeController@index_ten');
	
		
		Route::get('/calendar-event-detail/{date}' ,                	'User\CalendarController@event_details');
		Route::get('/calendar-detail/{id}' ,                        	'User\CalendarController@calendar_event_details');
    		
		Route::get('/change-task-status/{user_id}/{rowid}/{sdate}' ,   'User\UserHomeController@change_task_status');		
		Route::get('/copy-url/{rowid}/{titleid}' ,						 'User\HomeController@copy_url');
		Route::post('/user-thumbnail-download' , 						 'User\HomeController@thumbnailImageDownload');
		
		Route::get('/t', 'User\TestController@test_table');
    	
		Route::get('/jp-download', 'User\UserHomeController@getJpPornHubDonwloadLink');
    
	
	
		Route::get('/calendar-json' ,                               'User\CalendarController@calendar_events_json');
		Route::get('/news-event-list-json' ,                        'User\NewsController@news_event_json');
		Route::get('/news-detail/{id}' ,                            'User\NewsController@news_detail');
		
		Route::post('/event-make-poll' ,                            'User\CalendarController@make_poll');
		Route::get('/event-polls/{id}' ,                            'User\CalendarController@poll_result');
		Route::post('/make-poll-request-form' ,                     'User\CalendarController@poll_request_form');
			
		Route::get('/membership-power' ,                           'User\MembershipPowerController@index');
		Route::get('/membership-power-feedback-list-json' ,        'User\MembershipPowerController@membersip_power_feedback_list_json');	
	    Route::post('/membership-power-make-poll',                 'User\MembershipPowerController@membership_power_make_poll');
	    Route::post('/membership-power-feedback-request-form',     'User\MembershipPowerController@membership_power_feedback_request_form');

		Route::get('/ithopia-request-form' ,                        'User\IthopiaRequestController@index');
		Route::get('/give-business-idea' ,                          'User\BusinessIdeaController@index');
        
    
		Route::get('/question-answer' ,                             'User\QuestionAnswerController@index');
        Route::post('/question-answer-request-form' ,               'User\QuestionAnswerController@user_request');
        
        Route::get('/mobile-application' ,                          'User\MobileApplicationController@index');        
		
        Route::get('/business-member-audition' ,                    'User\BusinessMemberAuditionController@index');
		Route::post('/business-member-audition-request' ,           'User\BusinessMemberAuditionController@audition_request');
                
        
		Route::get('/majime-terrorist' ,                            'User\MajimeTerroristController@index');
        Route::post('/majime-terrorist-request' ,                   'User\MajimeTerroristController@user_request');
        
		Route::get('/blockchain-related-lecture' ,                  'User\BlockChainRelatedLectureController@index');
		Route::get('/bitcoin-related-lecture' ,                     'User\BitcoinRelatedLectureController@index');
		Route::get('/crazy-mindset' ,                               'User\CrazyMindsetController@index');
		Route::get('/know-realtime-earning'           ,             'User\KnowRealtimeEarningController@index');
		Route::get('/world-secret-talk'           ,                 'User\WorldSecretTalkController@index');
	 
		
		Route::get('/logout',                                       'User\AuthController@logout');
		Route::get('/circle-on-image' ,                             'User\TestController@index');
	});	
}); 



Route::group(['prefix' => 'admin'], function(){

	Route::get('/login',           'Backend\LoginController@index');
    Route::get('/logout',          'Backend\LoginController@logout');
    Route::post('/authenticate',   'Backend\LoginController@authenticate');
    
	
	Route::group(['middleware' => 'admin-auth'], function () {
	    
		Route::get('/dashboard' ,                            'Backend\DashboardController@index');
		
		
		Route::get('/pending-report' ,                            'Backend\DashboardController@pending_report');		
		Route::get('/done-report' ,                            'Backend\DashboardController@done_report');
		Route::post('/show-pending-report-data' ,                       'Backend\DashboardController@getPendingReportData');
		Route::post('/show-done-report-data' ,                       'Backend\DashboardController@getDoneReportData');
		
		Route::get('/show-report' ,                            'Backend\DashboardController@show_report');
		Route::post('/show-report-data' ,                       'Backend\DashboardController@getReportData');
		Route::get('/scrap' , 'Backend\ScrapController@index');
		Route::post('/scrap-data' , 'Backend\ScrapController@scrap_data');
	
		//Members
		Route::get('/members-registration',                  'Backend\MembersController@index');
		Route::post('/members-registration',                 'Backend\MembersController@registration');		
		Route::get('/fc2-members-list',                      'Backend\MembersController@members_list');				 
		Route::get('/members-list-data-table',               'Backend\MembersController@members_list_data_table');					 
		Route::get('/all-fc2-members' , 'Backend\HomeController@getUsers');	
		
		Route::get('/custom-members-registration',           'Backend\MembersController@customer_member_registration');
		Route::post('/custom-members-registration',           'Backend\MembersController@custom_member_registration_action');
		
		
		
				
		//Calendar 
	    Route::get('/calendar-event-entry',                  'Backend\CalendarController@index');				 
		Route::get('/calendar-set-event/{date}',             'Backend\CalendarController@set_shcedule');	
		Route::post('/calendar-set-event' ,                  'Backend\CalendarController@set_shcedule_action');	
		Route::get('/calendar-event-list',                   'Backend\CalendarController@events_list');		
		Route::get('/events-list-data-table',                'Backend\CalendarController@events_list_data_table');		
		
		
	    Route::get('/calendar-event-edit/{date}/{id}',       'Backend\CalendarController@calendar_event_edit');		
	    Route::post('/calendar-event-edit-action' ,          'Backend\CalendarController@calendar_event_edit_action');

     	Route::get('/news-entry',       'Backend\NewsController@index');	
		Route::post('/news-entry',      'Backend\NewsController@news_entry');	
		Route::get('/news-list',       'Backend\NewsController@news_list');	
		Route::get('/news-list-data-table',       'Backend\NewsController@news_list_data_table');	
		Route::get('/news-edit/{id}',       'Backend\NewsController@news_edit');
		Route::post('/news-edit-action',       'Backend\NewsController@news_edit_action');


        Route::get('/message-entry',  'Backend\ExplanationController@index');
		Route::get('/message-list',  'Backend\ExplanationController@explanations_list');
		Route::get('/message-edit/{id}',  'Backend\ExplanationController@explanation_edit');
        Route::post('/message-edits',  'Backend\ExplanationController@explanation_edit_action');
        
		
		//Explanations
		Route::get('/explanation-entry',  'Backend\ExplanationController@index');
		Route::post('/explanation-entry', 'Backend\ExplanationController@explanation_entry');
		Route::get('/explanation-list',  'Backend\ExplanationController@explanations_list');
		Route::get('/explanation-data-table', 'Backend\ExplanationController@explanations_data_table');
		Route::get('/explanation-edit/{id}',  'Backend\ExplanationController@explanation_edit');
		Route::post('/explanation-edit', 'Backend\ExplanationController@explanation_edit_action');

		
		//new url entry
		Route::post('/get-combo-users',  'Backend\UrlEntryController@getUsers');
		Route::get('/url-entry-new',  'Backend\UrlEntryController@index');
		Route::post('/url-entry-new',  'Backend\UrlEntryController@url_entry');
		Route::get('/user-jobs/{userid}/{month}' , 'Backend\UrlEntryController@members_jobs');
      	
		Route::get('/user-pending-data/{userid}/{month}' , 'Backend\UrlEntryController@members_peding_jobs');
		Route::get('/user-done-data/{userid}/{month}' , 'Backend\UrlEntryController@members_done_jobs');
		Route::post('/check-user-url' , 'Backend\UrlEntryController@check_user_url');      

		Route::post('/get-row-details' , 'Backend\UrlEntryController@check_row_detail'); 
		
		
	   
	    Route::get('/url-entry',  'Backend\VideosController@index');
	    Route::post('/url-entry',  'Backend\VideosController@video_entry');
        Route::get('/url-list',             'Backend\VideosController@videos_list');
	  
		
		
		
        //Videos 
        Route::get('/videos-entry',  'Backend\VideosController@index');
        Route::post('/video-entry',  'Backend\VideosController@video_entry');       
        Route::post('/video-owners-list' , 'Backend\VideosController@videos_owners_list');
        Route::get('/video-list',             'Backend\VideosController@videos_list');
        Route::get('/video-list-data-table',  'Backend\VideosController@videos_list_data_table');
        
        
        //Audios 
        Route::get('/audios-entry',  'Backend\AudiosController@index');
        Route::post('/audios-entry',  'Backend\AudiosController@audios_entry');
        Route::get('/audios-list',  'Backend\AudiosController@audios_list');
        Route::get('/audio-list-data-table',  'Backend\AudiosController@audios_list_data_table');
        
        
        //Business Member Audition
        Route::get('/business-member-audition-request',             'Backend\BusinessMemberAuditionController@index');
        Route::get('/business-member-audition-request-data-table',  'Backend\BusinessMemberAuditionController@member_request_list_data_table');
        
        
        //Question and Answer
        Route::get('/question-answer-request',  'Backend\QuestionAnswerController@index');
        Route::get('/question-answer-request-data-table',  'Backend\QuestionAnswerController@question_answer_request_list_data_table');
        
        
        
        //Majime Terrorist 
         Route::get('/majime-terrorist-requests',  'Backend\MajimeTerroristController@index');
         Route::get('/majime-terrorist-requests-data-table',  'Backend\MajimeTerroristController@majime_terrorist_request_list_data_table');
        
        
		
    });

});



