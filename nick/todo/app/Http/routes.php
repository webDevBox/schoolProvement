<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



//======================IOS APP======================================================
Route::get('userLogin', 'schoolapi@userLogin'); // INSTEAD OF ANDROID ALL LOGIN APIs

Route::get('userFBLogin', 'schoolapi@userFBLogin');// INSTEAD OF ANDROID ALL SOCIAL MEDIA LOGIN APIs

Route::get('userSignup', 'schoolapi@userSignup'); // added in android 

Route::get('studentHome', 'schoolapi@studentHome'); // INSTEAD OF ANDROID HOME SCREEN RESPONSE FOR ALL USERS

Route::get('userProfileUpdate', 'schoolapi@userProfileUpdate'); // added in android

Route::get('schoolChange', 'schoolapi@schoolChange'); // added in android

Route::get('userProfileShow', 'schoolapi@userProfileShow'); // added in android

Route::get('showfilterSchools', 'schoolapi@showfilterSchools'); // INSTEAD OF ANDROID showAllSchools API

Route::get('showSchoolTeachers', 'schoolapi@showSchoolTeachers'); // INSTEAD OF ANDROID showSchoolsTeachers API (cannot implent)

Route::get('userFollowedTeacher', 'schoolapi@userFollowedTeacher'); // INSTEAD OF ANDROID showFollowedTeacher API (cannot implent)

Route::get('userFollowedSchool', 'schoolapi@userFollowedSchool'); // INSTEAD OF ANDROID showFollowedSchools API (cannot implent)

Route::get('userAllHabit', 'schoolapi@userAllHabit'); // added in android 

Route::get('userAddFollow', 'schoolapi@userAddFollow'); // added in android 

Route::get('userUnFollow', 'schoolapi@userUnFollow'); // added in android

Route::get('setCurrentHabit', 'schoolapi@setCurrentHabit'); // added in android 

Route::get('userCompletedHabits', 'schoolapi@userCompletedHabits'); // added in android

Route::get('userCurrentHabit', 'schoolapi@userCurrentHabit'); // added in android 

Route::get('insertUserFeedback', 'schoolapi@insertUserFeedback'); // added in android

Route::get('feedbackShow', 'schoolapi@feedbackShow'); // added in android

Route::get('updateHabit', 'schoolapi@updateHabit'); // added in android 

Route::get('teacherProfileScreen', 'schoolapi@teacherProfileScreen'); // not used in android

Route::get('teacherProfileAbsentList', 'schoolapi@teacherProfileAbsentList'); // INSTEAD OF ANDROID teacherAbsentList API

Route::get('schoolProfileAbsentList', 'schoolapi@schoolProfileAbsentList'); // added in android

Route::get('starRating', 'schoolapi@starRating'); // added in android

Route::get('adminNotifications', 'schoolapi@adminNotifications'); // INSTEAD OF ANDROID pushNotifications API

Route::get('feedbackApp', 'schoolapi@feedbackApp'); // added in android

Route::get('reportTeacher', 'schoolapi@reportTeacher'); // INSTEAD OF ANDROID reportAttendence API

Route::get('reportAbsenceList', 'schoolapi@reportAbsenceList'); // INSTEAD OF ANDROID reportAbsenceShow API

Route::get('reportVoting', 'schoolapi@reportVoting'); // INSTEAD OF ANDROID reportSurvey API

Route::get('teacherReportsList', 'schoolapi@teacherReportsList'); // INSTEAD OF ANDROID teacherReportShow API

Route::get('conflictTeacherNames', 'schoolapi@conflictTeacherNames'); // added in android

Route::get('conflictsList', 'schoolapi@conflictsList'); // added in android

Route::get('teacherResponse', 'schoolapi@teacherResponse'); // INSTEAD OF ANDROID teacherClaim API

Route::get('conflictResponse', 'schoolapi@conflictResponse'); // added in android

Route::get('userDeleteAccount', 'schoolapi@userDeleteAccount'); // added in android

Route::get('schoolProfileScreen', 'schoolapi@schoolProfileScreen'); // not used in android

Route::get('getteacherpercentage', 'schoolapi@getteacherpercentage');

//======================ANDROID APP======================================================




Route::get('feedback/{id}/{type}/{feedbackby_id}', 'schoolapi@insertFeedbackTeacher');
Route::get('insertAppFeedback', 'schoolapi@insertAppFeedback');
Route::get('updatePercentage', 'schoolapi@updatePercentage');
Route::get('forgetPassword', 'schoolapi@forgetPassword');
Route::get('deleteAccount', 'schoolapi@deleteAccount');
Route::get('teacherList', 'schoolapi@teacherList');
Route::get('studentSignup', 'schoolapi@studentSignup');
Route::get('parentSignup', 'schoolapi@parentSignup');
Route::get('communitySignup', 'schoolapi@communitySignup');
Route::get('studentLogin', 'schoolapi@studentLogin');
Route::get('studentFBLogin', 'schoolapi@studentFBLogin');
Route::get('parentLogin', 'schoolapi@parentLogin');
Route::get('parentFBLogin', 'schoolapi@parentFBLogin');
Route::get('communityLogin', 'schoolapi@communityLogin');
Route::get('communityFBLogin', 'schoolapi@communityFBLogin');
Route::get('insertFeedbackSchool', 'schoolapi@insertFeedbackSchool');
Route::get('studentProfileUpdate', 'schoolapi@studentProfileUpdate');
Route::get('studentSchoolChange', 'schoolapi@studentSchoolChange');
Route::get('teacherAbsentList', 'schoolapi@teacherAbsentList');
Route::get('principalProfileUpdate', 'schoolapi@principalProfileUpdate');
Route::get('teacherProfileUpdate', 'schoolapi@teacherProfileUpdate');
Route::get('studentProfileShow/{id}', 'schoolapi@studentProfileShow');
Route::get('teacherProfileShow/{id}', 'schoolapi@teacherProfileShow');
Route::get('principalProfileShow/{id}', 'schoolapi@principalProfileShow');
Route::get('parentProfileUpdate', 'schoolapi@parentProfileUpdate');
Route::get('parentProfileShow/{id}', 'schoolapi@parentProfileShow');
Route::get('communityProfileUpdate', 'schoolapi@communityProfileUpdate');
Route::get('pushNotifications', 'schoolapi@pushNotifications');
Route::get('communityProfileShow/{id}', 'schoolapi@communityProfileShow');
Route::get('insertFollow/{id}/{followerrole}/{followby_id}/{followbyrole}', 'schoolapi@insertFollow');
Route::get('showFollowedSchools/{id}/{role}', 'schoolapi@showFollowedSchools');
Route::get('showFollowedSchoolsTeachers/{id}', 'schoolapi@showFollowedSchoolsTeachers');
Route::get('showFollowedTeacher/{id}/{role}', 'schoolapi@showFollowedTeacher');
Route::get('reportAttendance/{school_id}/{id}', 'schoolapi@reportAttendance');
Route::get('reportSurvey/{report_id}/{choice}/{reporter_id}/{reporter_role}', 'schoolapi@reportSurvey');
Route::get('checkVoting', 'schoolapi@checkVoting');
Route::get('expireNotification', 'schoolapi@expireNotification');
Route::get('showSchoolsTeachers/{id}', 'schoolapi@showSchoolsTeachers');
Route::get('showAllSchools', 'schoolapi@showAllSchools');
Route::get('showTeacherImage', 'schoolapi@showTeacherImage');
Route::get('showDistrictSchools', 'schoolapi@showDistrictSchools');
Route::get('showCountryDistricts', 'schoolapi@showCountryDistricts');
Route::get('showAllCountry', 'schoolapi@showAllCountry');
Route::get('schoolFilterData', 'schoolapi@schoolFilterData');
Route::get('showAllDistricts', 'schoolapi@showAllDistricts');
Route::get('teacherReviewShow', 'schoolapi@teacherReviewShow');
Route::get('schoolAbsentTeacher', 'schoolapi@schoolAbsentTeacher');
Route::get('schoolReviewShow', 'schoolapi@schoolReviewShow');
Route::get('reportAbsenceShow', 'schoolapi@reportAbsenceShow');
Route::get('principalLogin', 'schoolapi@principalLogin');
Route::get('teacherLogin', 'schoolapi@teacherLogin');
Route::get('teacherReportShow', 'schoolapi@teacherReportShow');
Route::get('teacherClaim', 'schoolapi@teacherClaim');
Route::get('conflictsShow', 'schoolapi@conflictsShow');
Route::get('conflictsResolve', 'schoolapi@conflictsResolve');
Route::get('conflictsName', 'schoolapi@conflictsName');
Route::get('insertHabitStatus', 'schoolapi@insertHabitStatus');
Route::get('completeHabitStatus', 'schoolapi@completeHabitStatus');
Route::get('showUserHabits', 'schoolapi@showUserHabits');
Route::get('showAllHabit/{role}', 'schoolapi@showAllHabit');
Route::get('showCountTeacherRating/{id}', 'schoolapi@showCountTeacherRating');
Route::get('showCountSchoolRating/{id}', 'schoolapi@showCountSchoolRating');
Route::get('showCountFollowedTeacher/{id}/{role}', 'schoolapi@showCountFollowedTeacher');
Route::get('showAbsenceList/{id}/{role}', 'schoolapi@showAbsenceList');
Route::get('districtTimeTable', 'schoolapi@districtTimeTable');
Route::get('showAverageSchoolRating/{id}', 'schoolapi@showAverageSchoolRating');
Route::get('showAverageTeacherRating/{id}', 'schoolapi@showAverageTeacherRating');
Route::get('unfollow/{id}/{followby_id}/{followbyrole}/{followerrole}', 'schoolapi@unfollow');
Route::get('sendReportNotification/{title}/{message}/{id}', 'schoolapi@sendReportNotification');

//===================TESTING==========================================


Route::get('testing', 'schoolapi@testing');



//===================TESTING==========================================











Route::get('testing', 'schoolapi@testing');

// Route::get('feedback/{id}', 'schoolapi@insertFeedbackTeacher');
// Route::get('feedback/{id}', 'schoolapi@insertFeedbackTeacher');
// Route::get('feedback/{id}', 'schoolapi@insertFeedbackTeacher');

Route::post('/', function () {
    return view('welcome');
});



// URL:          https://leadsdeveloper.com/nick/todo/public/sendReportNotification/khubaib/hello/13 
// parameters:   title= 
//               message=
//               id=


// get('feedback/{id}/{type}/{feedbackby_id}) 
// URL:          https://leadsdeveloper.com/nick/todo/public/feedback/1/parent/2 
// parameters:   rating= 
//               reviews=
//               type=

// get('schoolfeedback/{id}/{type}/{feedbackby_id}');
// URL:          https://leadsdeveloper.com/nick/todo/public/schoolfeedback/1/parent/1 
// parameters:   rating= 
//               reviews= 

// get('studentSignup');
// URL:          https://leadsdeveloper.com/nick/todo/public/studentSignup 
// parameters:   student_anonymous_name= 
//               student_email=
//               student_password=
//              student_country=
//              school_id=
//              student_state=
//              student_district=

// get('parentSignup');
// URL:          https://leadsdeveloper.com/nick/todo/public/parentSignup 
// parameters:   parent_anonymous_name= 
//               parent_email=
//               student_password=
//              parent_country=
//              parent_state=
//              parent_district=

// get('communitySignup');
// URL:          https://leadsdeveloper.com/nick/todo/public/communitySignup 
// parameters:   community_anonymous_name= 
//               community_email=
//               community_password=
//              community_country=
//              community_state=
//              community_district=

// get('studentLogin');
// URL:          https://leadsdeveloper.com/nick/todo/public/studentLogin 
// parameters:   student_anonymous_name=zishanaliq 
//               student_password=asdasd

// get('parentLogin');
// URL:          https://leadsdeveloper.com/nick/todo/public/parentLogin 
// parameters:   parent_anonymous_name=zishanaliq 
//               parent_password=asdasd

// get('communityLogin');
// URL:          https://leadsdeveloper.com/nick/todo/public/communityLogin 
// parameters:   community_anonymous_name=zishanaliq 
//               community_password=asdasd

// get('studentProfileUpdate/{id}');
// URL:          https://leadsdeveloper.com/nick/todo/public/studentProfileUpdate/3 
// parameters:   student_anonymous_name= 
//               student_email=
//               student_password=
//              student_country=
//              school_id=
//              student_state=
//              student_district=

// get('studentProfileShow/{id}');
// URL:          https://leadsdeveloper.com/nick/todo/public/studentProfileShow/3 
// parameters:   No Parameter

// get('reportAttendance/{id}/{school_id}
// https://leadsdeveloper.com/nick/todo/public/reportAttendance/1/1 
//   reportAbsence_date=11/20/20
//   reportAbsence_shift=morning
//   reason=asdad

// get('reportSurvey/{report_id}/{choice}'
//https://leadsdeveloper.com/nick/todo/public/reportSurvey/1/1

// get('parentProfileUpdate/{id}'
//  https://leadsdeveloper.com/nick/todo/public/parentProfileUpdate/1
// 	   $parent_anonymous_name;
// 		parent_email;
// 		parent_password;
// 		parent_country;
// 		parent_state;
// 		parent_district;

// get('parentProfileShow/{id}
// https://leadsdeveloper.com/nick/todo/public/parentProfileShow/1

// get('communityProfileUpdate/{id}
// https://leadsdeveloper.com/nick/todo/public/communityProfileUpdate/1
			 //	community_anonymous_name;
			 // community_email;
			 // community_password;
			 // community_country;
			 // community_state;
			 // community_district;

// get('communityProfileShow/{id}
// https://leadsdeveloper.com/nick/todo/public/communityProfileShow/1

// get('insertFollow/{id}/{followerrole}/{followby_id}/{followbyrole}
// https://leadsdeveloper.com/nick/todo/public/insertFollow/1/parent/1/teacher


// get('showFollowedSchools/{follower_id}/{role}'
// https://leadsdeveloper.com/nick/todo/public/showFollowedSchools/1/parent

// get('showFollowedSchoolsTeachers/{ school_id}'
// https://leadsdeveloper.com/nick/todo/public/showFollowedSchoolsTeachers/1

// get('showFollowedTeacher/{follwer_id}/{role}'
// https://leadsdeveloper.com/nick/todo/public/showFollowedTeacher/3/community

// Route::get('showSchoolsTeachers/{id}', 'schoolapi@showSchoolsTeachers');
// https://leadsdeveloper.com/nick/todo/public/showSchoolsTeachers/1

// Route::get('showAllSchools', 'schoolapi@showAllSchools');
// https://leadsdeveloper.com/nick/todo/public/showAllSchools


// Route::get('showAllSchools', 'schoolapi@showAllSchools');
// https://leadsdeveloper.com/nick/todo/public/showAllDistricts


// get('showCountFollowedSchools/{follower_id}/{role}'
// https://leadsdeveloper.com/nick/todo/public/showCountFollowedSchools/1/parent

// get('showCountFollowedTeacher/{follwer_id}/{role}'
// https://leadsdeveloper.com/nick/todo/public/showCountFollowedTeacher/3/community

// get('showAverageSchoolRating/{id}'
// https://leadsdeveloper.com/nick/todo/public/showAverageSchoolRating/1

// get('showAverageTeacherRating/{id}'
// https://leadsdeveloper.com/nick/todo/public/showAverageTeacherRating/1

// get('unfollow/{id}/{followby_id}/{followbyrole}/{followerrole}
// https://leadsdeveloper.com/nick/todo/public/unfollow/1/1/teacher/parent

