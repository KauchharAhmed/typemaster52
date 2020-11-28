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

Route::get('/', function () {
    return view('website.index');
});

#----------------------Admin panel access area---------------------#
Route::get('apanel','AdminController@index');
Route::post('loginProcess','AdminController@accessPermission');
Route::post('userloginProcess','AdminController@userloginProcess');
Route::get('adminDashboard','AdminController@adminDashboard');
Route::get('entrepreneurDashboard','AdminController@entrepreneurDashboard');
Route::get('adminLogout','AdminController@adminLogout');
Route::get('userLogout','AdminController@userLogout');
#---------------------End of Admin panel area----------------------#

#---------------------------user registration---------------------------------#
Route::post('userRegistrationProcess','AdminController@userRegistrationProcess');
#---------------------------user registration---------------------------------#

#---------------------------admin change password / update profile--------------------------#
Route::get('changePassword','AdminController@changePassword');
Route::post('adminChangePasswordInfo','AdminController@adminChangePasswordInfo');
Route::get('updateProfile','AdminController@updateProfile');
Route::post('updateProfileInfo','AdminController@updateProfileInfo');
#-----------------------End admin change password / update profile--------------------------#

#---------------------------user signup area-------------------------#
Route::get('signin','UserController@signin');
Route::get('userSignUp','UserController@userSignUp');
Route::post('userSignupInfo','UserController@userSignupInfo');
#----------------------------end user signup area--------------------#

Route::post('/getDistrictByDivision','UserController@getDistrictByDivision');
Route::post('/getThanaByDistrict','UserController@getThanaByDistrict');
Route::post('/getPerDistrictByDivision','UserController@getPerDistrictByDivision');
Route::post('/getPerThanaByDistrict','UserController@getPerThanaByDistrict');

#---------------------------user approval area------------------------#
Route::get('unapprovedUser','UserController@unapprovedUser');
Route::get('approveUser/{id}','UserController@approveUser');
Route::get('rejectUser/{id}','UserController@rejectUser');
Route::get('approvedUser','UserController@approvedUser');
Route::get('rejectUserlist','UserController@rejectUserlist');
Route::get('approvedUserChangeStatus/{id}','UserController@approvedUserChangeStatus');
#---------------------------user approval area------------------------#

#---------------------------Exam Fee approve / reject area---------------------------#
Route::get('unapprovedExamFee','PaymentController@unapprovedExamFee');
Route::get('approveExamFee/{id}','PaymentController@approveExamFee');
Route::get('approvedExamFee','PaymentController@approvedExamFee');
Route::get('rejectExamFee/{id}','PaymentController@rejectExamFee');
Route::get('rejectedExamFee','PaymentController@rejectedExamFee');
#---------------------------Exam Fee approve / reject area---------------------------#

#---------------------------user change password / update profile--------------------------#
Route::get('userChangePassword','UserController@userChangePassword');
Route::post('userChangePasswordInfo','UserController@userChangePasswordInfo');
Route::get('userProfileUpdate','UserController@userProfileUpdate');
Route::post('userProfileUpdateInfo','UserController@userProfileUpdateInfo');
#-----------------------End user change password / update profile--------------------------#

#----------------------Start of Step--------------------------#
Route::get('addStep','StepController@addStep');
Route::post('addStepInfo','StepController@addStepInfo');
Route::get('manageStep','StepController@manageStep');
Route::get('editStep/{id}','StepController@editStep');
Route::get('deleteStep/{id}','StepController@deleteStep');
Route::post('updateStepInfo','StepController@updateStepInfo');
#----------------------End of Step--------------------------#

#---------------- Start Paragraph --------------------------#
Route::get('addParagraph','ParagraphController@addParagraph');
Route::post('addParagraphInfo','ParagraphController@addParagraphInfo');
Route::get('manageParagraph','ParagraphController@manageParagraph');
Route::get('editParagraph/{id}','ParagraphController@editParagraph');
Route::post('updateParagraphInfo','ParagraphController@updateParagraphInfo');
// active / deactive paragraph
Route::get('activeParagraph/{id}','ParagraphController@activeParagraph');
Route::get('deactiveParagraph/{id}','ParagraphController@deactiveParagraph');
#---------------- End of Paragraph --------------------------#

#---------------------Start of Contact Person----------------------#
// group
Route::get('addGroup','ContactController@addGroup');
Route::post('addGroupInfo','ContactController@addGroupInfo');
Route::get('manageGroup','ContactController@manageGroup');
Route::get('editGroup/{id}','ContactController@editGroup');
Route::post('updateGroupInfo','ContactController@updateGroupInfo');
Route::get('deleteGroup/{id}','ContactController@deleteGroup');
// contact
Route::get('addContact','ContactController@addContact');
Route::post('addContactInfo','ContactController@addContactInfo');
Route::get('manageContact','ContactController@manageContact');
Route::get('editContact/{id}','ContactController@editContact');
Route::post('updateContactInfo','ContactController@updateContactInfo');
Route::get('deleteContact/{id}','ContactController@deleteContact');
#---------------------End of Contact Person----------------------#

#------------------------------ Start of Slider ------------------------#
Route::get('addSlider','SliderController@addSlider');
Route::post('addSliderInfo','SliderController@addSliderInfo');
Route::get('manageSlider','SliderController@manageSlider');
Route::get('editSlider/{id}','SliderController@editSlider');
Route::post('updateSlider','SliderController@updateSlider');
Route::get('deleteSlider/{id}','SliderController@deleteSlider');
#------------------------------ Start of Slider ------------------------#

#------------------------- Exam Controller --------------------------#
Route::get('chooseSession','ExamController@chooseSession');
Route::get('chooseSessionInfo/{step_id}','ExamController@chooseSessionInfo');
Route::get('startExam','ExamController@startExam');
Route::post('forceSubmitExamForm','ExamController@forceSubmitExamForm');
// manually submit exam form by student
Route::post('manuallySubmitExamForm','ExamController@manuallySubmitExamForm');

Route::post('wrongWordEntry','ExamController@wrongWordEntry');
Route::post('wrongWordView','ExamController@wrongWordView');
Route::post('liveScore','ExamController@liveScore');

Route::get('examResult','ExamController@examResult');
Route::get('allSessions','ExamController@allSessions');
Route::get('sessionWiseExamReport/{step_id}','ExamController@sessionWiseExamReport');

#---------------------------- Payment By Bkash ----------------------------#
Route::post('paymentByBkash','PaymentController@paymentByBkash');
#---------------------------- Payment By Bkash ----------------------------#

#----------------------------Start for Settings----------------------------#
Route::get('changeExamFee','StepController@changeExamFee');
Route::post('changeExamFeeInfo','StepController@changeExamFeeInfo');
#----------------------------Start for Settings----------------------------#

#-----------------------------Registration Fee payment----------------------#
Route::get('registrationFeePayment/{user_id}/{random_number_encode}','PaymentController@registrationFeePayment');
Route::post('paymentRegistrationFee','PaymentController@paymentRegistrationFee');
#-----------------------------Registration Fee payment----------------------#
#-----------------------------PAYMENT GATEWAY------------------------------#
Route::get('makePayment/{studentName}/{username}/{mobile}','WalletmixController@makePayment');
Route::post('paymentSuccess','WalletmixController@checkPayment');
Route::get('makeExamFeePayment/{admin_id}','WalletmixController@makeExamFeePayment');
Route::post('examFeePaymentSuccess','WalletmixController@checkPaymentTwo');
#-----------------------------PAYMENT GATEWAY------------------------------#