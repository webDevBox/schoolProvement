<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
Use \Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
use Illuminate\Support\Str;

class schoolapi extends Controller
{
//......................................IOS APP.......................................
//......................................IOS LOGIN APP.......................................
            public function userLogin(Request $request) {
			   
			 $name=$request->name;
			 $password= $request->password;
			 $role=$request->role;
			 $status="";
			 $results="";
			   
			   if(strlen($password)<5)
			   {
			       $status="false";
			      return response()->json(["status"=>$status,"results" =>$results,"message" => "password should contain 5 letter"], 200);
			   }
			   else
			   {
			     if ($role=="Parent")
				{
			        $results=DB::select('select  parent_id as "user_id",parent_anonymous_name as "user_name",parent_district as "user_district" from parent where parent_anonymous_name = ? and parent_password = ?', [$name, $password]);		      
			              if ($results){
				           $status="true";
			                  return response()->json(["status"=>$status,"user_details" =>$results[0],"message" => "login success"], 200);
			                         }
			                   else {
			                        $status="false";
			                     return response()->json(["status"=>$status,"user_details" =>$results,"message" => "incorrect credentials"], 404);
					                }
				}
				else if ($role=="Student")
				{
				     $results=DB::select('select school_id,student_id as "user_id",student_anonymous_name as "user_name",student_district as "user_district" from student where student_anonymous_name = ? and student_password = ?', [$name, $password]);
				       if ($results){
				           $status="true";
			                  return response()->json(["status"=>$status,"user_details" =>$results[0],"message" => "login success"], 200);
			                         }
			                   else {
			                        $status="false";
			                     return response()->json(["status"=>$status,"user_details" =>$results,"message" => "incorrect credentials"], 404);
					                }
				}
				else if ($role=="Teacher")
				{
			     	    $password= md5($password);
			        	$results=DB::select('select school_id, teacher_id as "user_id", CONCAT(teacher_firstName," ",teacher_lastName) as "user_name" ,teacher_district as "user_district" from teacher where teacher_email = ? and teacher_password = ?', [$name, $password]);	
				
			    if ($results){
				           $status="true";
			                  return response()->json(["status"=>$status,"user_details" =>$results[0],"message" => "login success"], 200);
			                         }
			                   else {
			                        $status="false";
			                     return response()->json(["status"=>$status,"user_details" =>$results,"message" => "incorrect credentials"], 404);
					                }
				}
				
				
				else if ($role=="Community Member")
				{
				         $results=DB::select('select communityMember_id as "user_id",communityMember_anonymous_name as "user_name",communityMember_district as "user_district" from communitymember where communityMember_anonymous_name = ? and communityMember_password = ?', [$name, $password]);		      
			             if ($results){
				           $status="true";
			                  return response()->json(["status"=>$status,"user_details" =>$results[0],"message" => "login success"], 200);
			                         }
			                   else {
			                        $status="false";
			                     return response()->json(["status"=>$status,"user_details" =>$results,"message" => "incorrect credentials"], 404);
					                }
				}
				else if ($role=="Principal")
				{
		         	$password= md5($password);

				     $results=DB::select('select school_id,principal_id as "user_id",principal_name as "user_name",principal_district as "user_district" from principal where principal_email = ? and principal_password = ?', [$name, $password]);		      
			  
			          if ($results){
				           $status="true";
			                  return response()->json(["status"=>$status,"user_details" =>$results[0],"message" => "login success"], 200);
			                         }
			                   else {
			                        $status="false";
			                        return response()->json(["status"=>$status,"user_details" =>$results,"message" => "incorrect credentials"], 404);
					                }
				}
				else
                 { 
                     
                     $status="false";
			          return response()->json(["status"=>$status,"user_details" =>$results,"message" => "incorrect role"], 404);
                 }  
			   }
				

		
			}
			
			
			
//.......................................................IOS FB LOGIN APP..........................................................
            public function userFBLogin(Request $request) {
			   
			 $email= $request->email;
			 $role=$request->role;
			 $status="";
			 $results="";
			   

			     if ($role=="Parent")
				{
			        $results=DB::select('select  parent_id as "user_id",parent_anonymous_name as "user_name",parent_district as "user_district" from parent where parent_email = ?', [$email]);		      
			              if ($results){
				           $status="true";
			                  return response()->json(["status"=>$status,"user_details" =>$results[0],"message" => "login success"], 200);
			                         }
			                   else {
			                        $status="false";
			                     return response()->json(["status"=>$status,"user_details" =>$results,"message" => "incorrect credentials"], 404);
					                }
				}
				else if ($role=="Student")
				{
				     $results=DB::select('select school_id,student_id as "user_id" ,student_anonymous_name as "user_name",student_district as "user_district" from student where student_email = ?', [$email]);
				       if ($results){
				           $status="true";
			                  return response()->json(["status"=>$status,"user_details" =>$results[0],"message" => "login success"], 200);
			                         }
			                   else {
			                        $status="false";
			                     return response()->json(["status"=>$status,"user_details" =>$results,"message" => "incorrect credentials"], 404);
					                }
				}
				
				else if ($role=="Community Member")
				{
				         $results=DB::select('select communityMember_id as "user_id" ,communityMember_anonymous_name as "user_name",communityMember_district as "user_district" from communitymember where communityMember_email = ?', [$email]);		      
			             if ($results){
				           $status="true";
			                  return response()->json(["status"=>$status,"user_details" =>$results[0],"message" => "login success"], 200);
			                         }
			                   else {
			                        $status="false";
			                     return response()->json(["status"=>$status,"user_details" =>$results,"message" => "incorrect credentials"], 404);
					                }
				}
				
				else
                 { 
                     
                     $status="false";
			          return response()->json(["status"=>$status,"results" =>$results,"message" => "incorrect role"], 404);
                 } 
                 
                 
	 }
				

			
			
			
//......................................................IOS SIGNUP APP......................................................		
		  public function userSignup(Request $request) 
		  {
		      
		      
		       $name=$request->name;
			   $email= $request->email;
			   $password= $request->password;
			   $country_name= $request->country_name;
			   $school_id= $request->school_id;
			   $state= $request->state;
			   $dist_name= $request->dist_name;
			   $role=$request->role;
			   $status="";
			   $results="";
			   $checkAlready="";
               $checkAlreadyEmail="";
			   
			   if(strlen($password)<5)
			   {
			       $status="false";
			      return response()->json(["status"=>$status,"message" => "password should contain 5 letter"], 404);
			   }
			   else
			   {
			     if ($role=="Parent")
				{
			       
			        $checkAlready=DB::select('select * from parent where parent_anonymous_name = ? ', [$name]);
			        $checkAlreadyEmail=DB::select('select * from parent where parent_email = ? ', [$email]);
			        
			        if($checkAlready)
			                  {
			                   $status="false";
			                   return response()->json(["status"=>$status,"message" => "Name Already Exist"], 200); 
			                   }
			                   else if($checkAlreadyEmail)
			                   {
			                    $status="false";
			                   return response()->json(["status"=>$status,"message" => "Email Already Exist"], 200);   
			                   }
			      else{
			   
			         $create=DB::table('parent')->insertGetId(array('parent_anonymous_name' =>$name ,
					'parent_email'			=>$email,
					'parent_password'		=>$password,
					'country_name'		    =>$country_name,
					'parent_state'			=>$state,
					'parent_district'	    =>$dist_name));

			        if ($create){
			        
			        $status="true";
			        return response()->json(["status"=>$status,"message" => "Signup Successfully"], 200);
			    	}
			          else {
			               $status="false";
			               return response()->json(["status"=>$status,"message" => "signup failed"],404);
					       }
			           }
			       
			       
			       
				}
				else if ($role=="Student")
				{
				     
				 $checkAlready=DB::select('select * from student where student_anonymous_name = ? ', [$name]);
				 $checkAlreadyEmail=DB::select('select * from student where student_email = ? ', [$email]);
			     if($checkAlready)
			                     {
			                      $status="false";
			                      return response()->json(["status"=>$status,"message" => "Name Already Exist"], 200);
			                     }
			                     else if($checkAlreadyEmail)
			                   {
			                    $status="false";
			                   return response()->json(["status"=>$status,"message" => "Email Already Exist"], 200);   
			                   }
			        else{

			         $create=DB::table('student')->insertGetId(array('student_anonymous_name' =>$name ,
					'student_email'			=>$email,
					'student_password'		=>$password,
					'country_name'		    =>$country_name,
					'school_id'				=>$school_id,
					'student_state'			=>$state,
					'student_district'		=>$dist_name));

			               if ($create){
			                      $status="true";
			                      return response()->json(["status"=>$status,"message" => "Signup Successfully"], 200);
			                        	}
			              else {
			                   $status="false";
			                   return response()->json(["status"=>$status,"message" => "signup failed"],404);
					           }
			                }    
				     
				     
				     
				}
				
				else if ($role=="Community Member")
				{
				   $checkAlready=DB::select('select * from communitymember where communityMember_anonymous_name = ? ', [$name]);
				   $checkAlreadyEmail=DB::select('select * from communitymember where communityMember_email = ? ', [$email]);
			       if($checkAlready)
			               {
			                return response()->json(["status"=>$status,"message" => "Name Already Exist"], 200);
			               }
			               else if($checkAlreadyEmail)
			                   {
			                    $status="false";
			                   return response()->json(["status"=>$status,"message" => "Email Already Exist"], 200);   
			                   }
			      else{
			         $create=DB::table('communitymember')->insertGetId(array('communityMember_anonymous_name' =>$name ,
					'communityMember_email'			=>$email,
					'communityMember_password'		=>$password,
					'country_name'		            =>$country_name,
					'communityMember_state'			=>$state,
					'communityMember_district'		=>$dist_name));

			        if ($create){
			         $status="true";
			         return response()->json(["status"=>$status,"message" => "Signup Successfully"], 200);
			        	}
			    	
			         else {
			            $status="false";
			           return response()->json(["status"=>$status,"message" => "signup failed"],404);
					      }
			            }      
				    
				    
				        
				}
				else
                 { 
                     
                     $status="false";
			          return response()->json(["status"=>$status,"message" => "incorrect role"], 404);
                 }  
			   }
				

		      
		  }	
			
			
//......................................IOS USER PROFILE UPDATE APP.......................................		
		  public function userProfileShow(Request $request) 
		  {
			   $role=$request->role;
			   $id= $request->id;
			   $status="";
			   $results="";
			   $completedHabits="";
			   $totalFollowedSchools="";
			   $totalFollowedTeachers="";
			   
			     if ($role=="Parent")
				{
			          $results=DB::select('select parent_anonymous_name as "user_name",parent_email as "user_email",country_name as "country_name" ,parent_district as "user_district" from parent where parent_id = ?', [$id]);		      
			         if ($results){
			                     $completedHabits=DB::select('select COUNT(*) as "total" from habitstatus where status = "completed" AND user_role = "parent" AND user_id = ?',[$id]);
			                     $totalFollowedSchools=DB::select('select count(p.parent_id) as total from parent p inner join follow f on (f.parent_id=p.parent_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and p.parent_id = ?', ['school', $id]);
			                     $totalFollowedTeachers=DB::select('select count(p.parent_id) as total from parent p inner join follow f on (f.parent_id=p.parent_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and p.parent_id = ?', ['teacher', $id]);
			                     $status="true";
			                     return response()->json(["status"=>$status,'user_details' => $results[0],'completed_habits' => $completedHabits[0],'followed_schools'=>$totalFollowedSchools[0],'followed_teacher'=>$totalFollowedTeachers[0],"message" => "success"],200);
			                      }
			                else {
			                      $status="false";
			                       $std=json_decode("{}");
			                      return response()->json(["status"=>$status,'user_details' => $results[0],'completed_habits' => $completedHabits,'followed_schools'=>$totalFollowedSchools[0],'followed_teacher'=>$totalFollowedTeachers[0],"message" => "incorrect id"], 404);
					             }  
			       
			    
			       
			       
				}
				else if ($role=="Student")
				{
				      
				  $results=DB::select('select student_anonymous_name as "user_name" ,student_email as "user_email",country_name  as "country_name" ,student_district as "user_district"  from student where student_id = ?', [$id]);	
			      if ($results){
			                     $completedHabits=DB::select('select COUNT(*) as "total" from habitstatus where status = "completed" AND user_role = "student" AND user_id = ?',[$id]);
			                     $totalFollowedSchools=DB::select('select count(st.student_id) as total from student st inner join follow f on (f.student_id=st.student_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and st.student_id = ?', ['school', $id]);
			                     $totalFollowedTeachers=DB::select('select count(st.student_id) as total from student st inner join follow f on (f.student_id=st.student_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and st.student_id = ?', ['teacher', $id]);
			       			     $status="true";              
			       			     return response()->json(["status"=>$status,'user_details' => $results[0],'completed_habits' => $completedHabits[0],'followed_schools'=>$totalFollowedSchools[0],'followed_teacher'=>$totalFollowedTeachers[0],"message" => "success"],200);

			             }
			             else {
			                     $status="false";
			                     $std=json_decode("{}");
			                    return response()->json(["status"=>$status,'user_details' => $results,'completed_habits' => $completedHabits,'followed_schools'=>$totalFollowedSchools,'followed_teacher'=>$totalFollowedTeachers,"message" => "incorrect id"], 404);

					          } 
				      
				      
				}
				
				else if ($role=="Community Member")
				{
				   
				  
				 $results=DB::select('select communityMember_anonymous_name as "user_name",communityMember_email  as "user_email" ,country_name as "country_name",communityMember_district as "user_district" from communitymember where communityMember_id = ?', [$id]);		      
			    if ($results){
			                 $completedHabits=DB::select('select COUNT(*) as "total" from habitstatus where status = "completed" AND user_role = "community" AND user_id = ?',[$id]);
			                 $totalFollowedSchools=DB::select('select count(c.communityMember_id) as total from communitymember c inner join follow f on (f.communityMember_id=c.communityMember_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and c.communityMember_id = ?', ['school', $id]);
			                 $totalFollowedTeachers=DB::select('select count(c.communityMember_id) as total from communitymember c inner join follow f on (f.communityMember_id=c.communityMember_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and c.communityMember_id = ?', ['teacher', $id]);
			                 $status="true";              
			       			     return response()->json(["status"=>$status,'user_details' => $results[0],'completed_habits' => $completedHabits[0],'followed_schools'=>$totalFollowedSchools[0],'followed_teacher'=>$totalFollowedTeachers[0],"message" => "success"],200);
			                 }
			                 
			              else {
			                    $status="false";
			                    $std=json_decode("{}");
			                     return response()->json(["status"=>$status,'user_details' => $results,'completed_habits' => $completedHabits,'followed_schools'=>$totalFollowedSchools,'followed_teacher'=>$totalFollowedTeachers,"message" => "incorrect id"], 404);
					           }
				        
				}
				else if ($role=="Principal")
				{
				
				 $results=DB::select('select principal_name as "user_name" ,principal_email as "user_email",country_name as "country_name",principal_district as "user_district" from principal where principal_id = ?', [$id]);		      
			      if ($results){
			                   $completedHabits=DB::select('select COUNT(*) as "total" from habitstatus where status = "completed" AND user_role = "teacher" AND user_id = ?',[$id]);
			                   $totalFollowedSchools=DB::select('select count(p.principal_id) as total from principal p inner join follow f on (f.parent_id=p.principal_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and p.principal_id = ?', ['school', $id]);
			                   $totalFollowedTeachers=DB::select('select count(p.principal_id) as total from principal p inner join follow f on (f.principal_id=p.principal_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and p.principal_id = ?', ['teacher', $id]);
			                     $status="true";              
			       			     return response()->json(["status"=>$status,'user_details' => $results[0],'completed_habits' => $completedHabits[0],'followed_schools'=>$totalFollowedSchools[0],'followed_teacher'=>$totalFollowedTeachers[0],"message" => "success"],200);
			        }
			        else {
			                     $status="false";
			                     $std=json_decode("{}");
			                     return response()->json(["status"=>$status,'user_details' => $results,'completed_habits' => $completedHabits,'followed_schools'=>$totalFollowedSchools,'followed_teacher'=>$totalFollowedTeachers,"message" => "incorrect id"], 404);
					 } 
				  
				        
				}
				else if ($role=="Teacher")
				{
				  
				  
				  $results=DB::select('select teacher_firstName as "user_name" ,teacher_email as "user_email",country_name as "country_name",teacher_district as "user_district" from teacher where teacher_id = ?', [$id]);		      
			        if ($results){
			                      $completedHabits=DB::select('select COUNT(*) as "total" from habitstatus where status = "completed" AND user_role = "teacher" AND user_id = ?',[$id]);
			                      $totalFollowedSchools=DB::select('select count(t.teacher_id) as total from teacher t inner join follow f on (f.parent_id=t.teacher_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and t.teacher_id = ?', ['school', $id]);
			                      $totalFollowedTeachers=DB::select('select count(t.teacher_id) as total from teacher t inner join follow f on (f.teacher_id=t.teacher_id) inner join teacher t2 on (f.toBeFollow=t2.teacher_id) where f.role = ? and t.teacher_id = ?', ['teacher', $id]);
			                      $status="true";              
			       			      return response()->json(["status"=>$status,'user_details' => $results[0],'completed_habits' => $completedHabits[0],'followed_schools'=>$totalFollowedSchools[0],'followed_teacher'=>$totalFollowedTeachers[0],"message" => "success"],200);
			                      }
			                   else {
			                         $status="false";
			                         $std=json_decode("{}");
			                        return response()->json(["status"=>$status,'user_details' => $results,'completed_habits' => $completedHabits,'followed_schools'=>$totalFollowedSchools,'followed_teacher'=>$totalFollowedTeachers,"message" => "incorrect id"], 404);
					                }
				
				        
				}
				else
                 { 
                      $status="false";
			          return response()->json(["status"=>$status,"message" => "incorrect role"], 404);
                 }  
			   
		      
		      
		  }
				

			
//......................................IOS USER PROFILE UPDATE APP.......................................		
		  public function userProfileUpdate(Request $request) 
		  {
		      
		       $name=$request->name;
			   $email= $request->email;
			   $password= $request->password;
			   $role=$request->role;
			   $id= $request->id;
			   $status="";
			   $results="";
			   $checkAlready="";
               $checkAnotherUser="";
			   
			   if(strlen($password)<5)
			   {
			       $status="false";
			      return response()->json(["status"=>$status,"message" => "password should contain 5 letter"], 200);
			   }
			   else
			   {
			     if ($role=="Parent")
				{
			       
			       $parent_id=null;
			       $checkAlready=DB::select('select * from parent where parent_anonymous_name = ? AND parent_id =?', [$name,$id]);
			       $checkAnotherUser=DB::select('select * from parent where parent_anonymous_name = ? AND parent_id !=?', [$name,$id]);
			       if($checkAlready)
			                     {
			                        $parent_id=DB::table('parent')->where('parent_id',$id)->update(array(
				                 	'parent_anonymous_name' =>$name ,
				                 	'parent_email'			=>$email,
				                 	'parent_password'		=>$password));
			                         if ($parent_id){
			                                        $status="true";
			                                        return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                                        }
			                          else {
			                          $status="false";
			                          return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
					                       }
			                      }
			                  else if($checkAnotherUser){
			                                           $status="false";
			                                           return response()->json(["status"=>$status,"message" => "Name already exist"], 404);
			                        } 
			                        
			                        else{
			                           
			                           $parent_id=DB::table('parent')->where('parent_id',$id)->update(array(
				                 	'parent_anonymous_name' =>$name ,
				                 	'parent_email'			=>$email,
				                 	'parent_password'		=>$password));
			                         if ($parent_id){
			                                        $status="true";
			                                        return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                                        }
			                          else {
			                          $status="false";
			                          return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
					                       } 
			                            
			                        }
			       
			    
			    
			    
			       
			       
				}
				else if ($role=="Student")
				{
				       $student_id=null;
			           $checkAlready=DB::select('select * from student where student_anonymous_name = ? AND student_id=?', [$name,$id]);
			           $checkAnotherUser=DB::select('select * from student where student_anonymous_name = ? AND student_id !=?', [$name,$id]);
			           if($checkAlready)
			                          {
			                           $student_id=DB::table('student')->where('student_id',$id)->update(array(
				                      'student_anonymous_name' =>$name ,
				                      'student_email'			=>$email,
				                      'student_password'		=>$password));
			                          if ($student_id){
			                                        $status="true";
			                                        return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                                          }
			                                     else {
			                                         $status="false";
			                                         return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
					                                  }
			                           }
			                           
			                           else if($checkAnotherUser){
			                                           $status="false";
			                                           return response()->json(["status"=>$status,"message" => "Name already exist"], 404);
			                           } 
			                           
			                           
			                           else{
			                                $student_id=DB::table('student')->where('student_id',$id)->update(array(
					                        'student_anonymous_name' =>$name ,
					                        'student_email'			=>$email,
				                         	'student_password'		=>$password));
			                                   if ($student_id){
			                                        $status="true";
			                                        return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                                                   }
			                                                 else {
			                                              $status="false";
			                                              return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
			                        
					                                               }
			                                }
				}
				
				else if ($role=="Community Member")
				{
				   $communityMember_id=null;
			       $checkAlready=DB::select('select * from communitymember where communityMember_anonymous_name = ? AND communityMember_id =?', [$name,$id]);
			       $checkAnotherUser=DB::select('select * from communitymember where communityMember_anonymous_name = ? AND communityMember_id !=?', [$name,$id]);
			      if($checkAlready)
			                     {
			                       	$communityMember_id=DB::table('communitymember')->where('communityMember_id',$id)->update(array(
			                       	  'communityMember_anonymous_name' =>$name ,  
					                  'communityMember_email'			=>$email,
					                  'communityMember_password'		=>$password));
					
			                       if ($communityMember_id){
			                                        $status="true";
			                                        return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                                               }
			    	
			                                            else {
			                                                 $status="false";
			                                                 return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
					                                         }
			                   }
			                   
			                   else if($checkAnotherUser){
			                                           $status="false";
			                                           return response()->json(["status"=>$status,"message" => "Name already exist"], 404);
			                   }
			                   else{
			                  	 $communityMember_id=DB::table('communitymember')->where('communityMember_id',$id)->update(array(
                                'communityMember_anonymous_name' =>$name ,
				             	'communityMember_email'			=>$email,
					            'communityMember_password'		=>$password));
					
			                      if ($communityMember_id){
			                                               $status="true";
			                                               return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                                              }
			                                           else {
			                                              $status="false";
			                                              return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
					                                        }
			                      }
				  
				 
				        
				}
				else if ($role=="Principal")
				{
				  
				  $password= md5($password);
			      $principal_id=null;
			   
			       $checkAlready=DB::select('select * from principal where principal_email = ? AND principal_id=?', [$email,$id]);
			       $checkAnotherUser=DB::select('select * from principal where principal_email = ? AND principal_id !=?', [$email,$id]);
			                     if($checkAlready)
			                                     {
			                                     $principal_id=DB::table('principal')->where('principal_id',$id)->update(array(	
			                                         'principal_email'			=>$email,
			                                         'principal_password'		=>$password));
			                                     if ($principal_id){
			                                        $status="true";
			                                        return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                                                    }
			                                    else {
			                                         $status="false";
			                                         return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
					                                 }
			                                      }
			                                      
			                                      
			                                     else if($checkAnotherUser){
			                                           $status="false";
			                                           return response()->json(["status"=>$status,"message" => "Email already exist"], 404);
			                                           } 
			                                      
			                                      else{
			   
			                                        	$principal_id=DB::table('principal')->where('principal_id',$id)->update(array(

					                                    'principal_email'			=>$email,
				                                      	'principal_password'		=>$password));
			                                             if ($principal_id){
			                                               $status="true";
			                                               return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                                                               }
			    	
			                                                          else {
			                                                                $status="false";
			                                                                return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
					                                                       }
			                                          }
				        
				}
				else if ($role=="Teacher")
				{
				  
				  
				  $password= md5($password);
			      $teacher_id=null;
			   
			    $checkAlready=DB::select('select * from teacher where teacher_email = ? AND teacher_id=? ', [$email,$id]);
			    $checkAnotherUser=DB::select('select * from teacher where teacher_email = ? AND teacher_id !=?', [$email,$id]);
			    if($checkAlready)
			                    {
			                      $teacher_id=DB::table('teacher')->where('teacher_id',$id)->update(array(
			                          'teacher_email'			    =>$email,
			                          'teacher_password' =>$password));
			                      if ($teacher_id){
			                                   $status="true";
			                                   return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                                      }
			    	
			                                   else {
			                                         $status="false";
			                                         return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
					                                }
			                      }
			                      
			                      else if($checkAnotherUser){
			                                           $status="false";
			                                           return response()->json(["status"=>$status,"message" => "Email already exist"], 404);
			                                           } 
			                      
			                      else{
			   
				                      $teacher_id=DB::table('teacher')->where('teacher_id',$id)->update(array(
					
					                   'teacher_email'			    =>$email,
					                   'teacher_password'		    =>$password));
			                           if ($teacher_id){
			        	
			                                          $status="true";
			                                          return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                                           }
			    	
			                                      else {
			                                             $status="false";
			                                             return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
					                                   }
			                         }
				  
				        
				}
				else
                 { 
                     
                      $status="false";
			          return response()->json(["status"=>$status,"message" => "incorrect role"], 404);
                 }  
			   }
				

		      
		  }	
//......................................IOS STUDENT HOME APP.......................................		
		  public function studentHome(Request $request) 
		  {
		    $school_id=(int)$request->school_id; 
		     $user_id=(int)$request->user_id; 
		    $user_role=$request->user_role; 
		    $follow_status="";
		    $checkFollow;
		    $status="";
		    $schoolDetails="";
		    $totalAbsence="";
		    $schoolTeachers="";
		    
		    
		    
		    
		    $check=DB::select('select * from school where school_id= ?', [$school_id]);
		    if($check)
		    {
		        
		         $status="true";
		         $schoolDetails=DB::select('select s.school_id,s.school_name,s.country_name,s.school_district,s.school_image,ROUND(AVG(sf.schoolFeedback_rating),1) as average_rating from schoolfeedback sf INNER JOIN school s on(sf.school_id=s.school_id) where s.school_id= ?', [$school_id]);
		         $totalAbsence=DB::select('select SUM(teacher_absence) as total_absence from teacher where school_id= ?', [$school_id]);
		         $schoolTeachers=DB::select('select teacher_id,teacher_firstName,teacher_lastName,teacher_image from school s inner join teacher t on (s.school_id=t.school_id) where s.school_id = ?', [$school_id]);
			                 
			          return response()->json(["status"=>$status,"schoolDetails" =>$schoolDetails[0],"schoolAbsence" =>$totalAbsence[0],"schoolTeachers" =>$schoolTeachers,"message" => "success"], 200);
			}
			 else {
			       $status="false";
			       return response()->json(["status"=>$status,"schoolDetails" =>$schoolDetails,"schoolAbsence" =>$totalAbsence,"schoolTeachers" =>$schoolTeachers,"message" => "incorrect school"], 200);
				  }
		      
		  }	
		  
		  
//......................................IOS SCHOOL PROFILE APP.......................................		
		  public function schoolProfileScreen(Request $request) 
		  {
		    $school_id=(int)$request->school_id; 
		     $user_id=(int)$request->user_id; 
		    $user_role=$request->user_role; 
		    $follow_status="";
		    $checkFollow;
		    $status="";
		    $schoolDetails="";
		    $totalAbsence="";
		    $schoolTeachers="";
		    
		    
		    
		    
		    $check=DB::select('select * from school where school_id= ?', [$school_id]);
		    if($check)
		    {
		        if($user_role == "Student"){
		         $checkFollow=DB::select('SELECT * FROM `follow` where student_id = ? AND toBeFollow = ? AND role ="school"', [$user_id,$school_id]);
		         }
		         else if($user_role == "Parent"){
		         $checkFollow=DB::select('SELECT * FROM `follow` where parent_id = ? AND toBeFollow = ? AND role ="school"', [$user_id,$school_id]);
		         }
		         else if($user_role == "Community Member"){
		         $checkFollow=DB::select('SELECT * FROM `follow` where communityMember_id = ? AND toBeFollow = ? AND role ="school"', [$user_id,$school_id]);
		         }
		         else if($user_role == "Teacher"){
		         $checkFollow=DB::select('SELECT * FROM `follow` where teacher_id = ? AND toBeFollow = ? AND role ="school"', [$user_id,$school_id]);
		         }
		         else if($user_role == "Principal"){
		         $checkFollow=DB::select('SELECT * FROM `follow` where principal_id = ? AND toBeFollow = ? AND role ="school"', [$user_id,$school_id]);
		         }
		         else{
		             
		         }
		         
		         if($checkFollow){
		            $follow_status="1" ;
		         }
		         else{
		             $follow_status="0";
		         }
		         $status="true";
		         $schoolDetails=DB::select('select s.school_id,s.school_name,s.country_name,s.school_district,s.school_image,ROUND(AVG(sf.schoolFeedback_rating),1) as average_rating from schoolfeedback sf INNER JOIN school s on(sf.school_id=s.school_id) where s.school_id= ?', [$school_id]);
		         $totalAbsence=DB::select('select SUM(teacher_absence) as total_absence from teacher where school_id= ?', [$school_id]);
		         
			                 
			          return response()->json(["status"=>$status,"schoolDetails" =>$schoolDetails[0],"schoolAbsence" =>$totalAbsence[0],"follow_status"=>"$follow_status","message" => "success"], 200);
			}
			 else {
			       $status="false";
			       return response()->json(["status"=>$status,"schoolDetails" =>$schoolDetails,"schoolAbsence" =>$totalAbsence,"follow_status"=>"$follow_status","message" => "incorrect school"], 200);
				  }
		      
		  }	
//......................................IOS teacher Profile Screen APP.......................................		
		  public function teacherProfileScreen(Request $request) 
		  {
		    $teacher_id=(int)$request->teacher_id; 
		    $status="";
		    $user_id=(int)$request->user_id; 
		    $user_role=$request->user_role; 
		    $follow_status="";
		    $checkFollow;
		    $teacherDetails="";
		    $averageRating="";
		    $rating=0;
		    $check=DB::select('select * from teacher where teacher_id= ?', [$teacher_id]);
		    if($check)
		    {    if($user_role == "Student"){
		         $checkFollow=DB::select('SELECT * FROM `follow` where student_id = ? AND toBeFollow = ? AND role ="teacher"', [$user_id,$teacher_id]);
		         }
		         else if($user_role == "Parent"){
		         $checkFollow=DB::select('SELECT * FROM `follow` where parent_id = ? AND toBeFollow = ? AND role ="teacher"', [$user_id,$teacher_id]);
		         }
		         else if($user_role == "Community Member"){
		         $checkFollow=DB::select('SELECT * FROM `follow` where communityMember_id = ? AND toBeFollow = ? AND role ="teacher"', [$user_id,$teacher_id]);
		         }
		         else if($user_role == "Teacher"){
		         $checkFollow=DB::select('SELECT * FROM `follow` where teacher_id = ? AND toBeFollow = ? AND role ="teacher"', [$user_id,$teacher_id]);
		         }
		         else if($user_role == "Principal"){
		         $checkFollow=DB::select('SELECT * FROM `follow` where principal_id = ? AND toBeFollow = ? AND role ="teacher"', [$user_id,$teacher_id]);
		         }
		         else{
		             
		         }
		         
		         if($checkFollow){
		            $follow_status="1" ;
		         }
		         else{
		             $follow_status="0";
		         }
		         
		         
		         $status="true";
		         $teacherDetails=DB::select('select t.teacher_id,t.teacher_firstName,t.teacher_lastName,t.teacher_image,t.attendance_percentage,s.school_name,t.teacher_absence from school s inner join teacher t on (s.school_id=t.school_id) where t.teacher_id = ?', [$teacher_id]);
                 $averageRating=DB::select('select ROUND(AVG(f.Feedback_rating),1) as average_rating from feedback f INNER JOIN teacher t on(f.teacher_feedback_id=t.teacher_id) where t.teacher_id= ?', [$teacher_id]);
		         foreach($averageRating as $results)
		         {
		            $rating = $results->average_rating; 
		         }
		         
		         if($rating!="")
		         {
		           $status="true";
		           return response()->json(["status"=>$status,"teacherDetails" =>$teacherDetails[0],"averageRating" =>$averageRating[0],"message" => "success","follow_status"=>"$follow_status"], 200);  
		         }
		         else
		         {
		           $status="true";  
		           return response()->json(["status"=>$status,"teacherDetails" =>$teacherDetails[0],"averageRating" =>json_decode("{}"),"message" => "success","follow_status"=>"$follow_status"], 200);  
		         }
			                 
			          
			}
			 else {
			       $status="false";
			       return response()->json(["status"=>$status,"teacherDetails" =>$teacherDetails,"averageRating" =>$averageRating,"message" => "incorrect teacher","follow_status"=>"$follow_status"], 200);
				  }
		      
		  }	
		  
		  
//.....................................ABSENT LIST OF TEACHER IOS APP........................................	


		  public function teacherProfileAbsentList(Request $request) {
			 
                $teacher_id=(int)$request->teacher_id;
                $status="";
                $check=DB::select('select * from teacher where teacher_id= ?', [$teacher_id]);
               if($check) 
               {
                   
                $results=DB::select('SELECT t.teacher_id, t.teacher_firstName ,t.teacher_lastName, r.teacher_claim as "absence_reason", r.reportAbsence_date from  teacher t INNER JOIN reportabsence r on (t.teacher_id = r.teacher_id) WHERE r.attendance_status="absent" AND t.teacher_id = ? ORDER BY r.reportAbsence_date DESC',[$teacher_id]);	
				
			    if ($results)
			        {
			        $status="true";
			        return response()->json(["status"=>$status,"absentList" =>$results,"message" => "success"], 200);
			        }
			    else {
			         $status="true";
			         return response()->json(["status"=>$status,"absentList" =>$results,"message" => "This teacher has no absences"], 200);
					 }   
               }
               else
               {
                $status="false";
			    return response()->json(["status"=>$status,"message" => "Incorrect teacher id"], 400);   
               }
                
				

			}



//.....................................ABSENT LIST OF SCHOOLS IOS APP........................................

public function schoolProfileAbsentList(Request $request) {
			 
                $school_id=(int)$request->school_id;
                $status="";
                $check=DB::select('select * from school where school_id= ?', [$school_id]);
                if($check){
                  $results=DB::select('SELECT t.teacher_id, t.teacher_firstName ,t.teacher_lastName, r.teacher_claim as "absence_reason", r.reportAbsence_date from  teacher t INNER JOIN reportabsence r on (t.teacher_id = r.teacher_id) WHERE r.attendance_status="absent" AND t.school_id = ? ORDER BY r.reportAbsence_date DESC',[$school_id]);	
				
			    if ($results){
			        $status="true";
			        return response()->json(["status"=>$status,"absentList" =>$results,"message" => "success"], 200);
			        }
			    else {
			         $status="true";
			         return response()->json(["status"=>$status,"absentList" =>$results,"message" => "This school has no absences"], 200);
					 }  
                }
                else{
                   $status="false";
			       return response()->json(["status"=>$status,"message" => "Incorrect school id"], 400); 
                }
                
				

			}						
			
//......................................IOS ALL SCHOOLS API APP..............................................		
		
public function showfilterSchools(Request $request) {
			    
			    $district=$request->district;
			    $status="";
				$results=DB::select('SELECT s.school_id,s.school_name, s.country_name AS school_country , s.school_state,s.school_district,s.school_image,s.attendance_percentage ,ROUND(AVG(f.schoolFeedback_rating),1) AverageRating  , SUM(t.teacher_absence) as TotalAbsence FROM school s  LEFT JOIN schoolfeedback f on (s.school_id = f.school_id) LEFT JOIN teacher t on(s.school_id = t.school_id) where s.school_district=? GROUP BY s.school_id ',[$district]);		      
			    if ($results){
			        $status="true";
			        return response()->json(["status"=>$status,"results" =>$results,"message" => "success"], 200);
			        }
			    else {
			        $status="false";
			        return response()->json(["status"=>$status,"results" =>$results,"message" => "success"], 200);
					 }
			}
			
//......................................IOS SCHOOLS TEACHERS API APP.......................................			
public function showSchoolTeachers(Request $request) {
				$school_id=(int)$request->school_id;
				$status="";
				$school_name="";
				$country_name="";
				$school_district="";
				$school_image="";
				
				
				$schoolDetails=DB::select('select school_name, country_name, school_district, school_image from school where school_id = ?', [$school_id]);
				$teacherDetails=DB::select('select teacher_id,teacher_firstName,teacher_lastName,joining_date,teacher_image from teacher where school_id = ?', [$school_id]);		      
			    if ($schoolDetails){
			         foreach ($schoolDetails as $results) {
                       $school_name = $results->school_name;
                       $country_name = $results->country_name;
                       $school_district = $results->school_district;
                       $school_image = $results->school_image;
				 }
			         $status="true";
			         return response()->json(["status"=>$status,"school_name"=>$school_name,"country_name"=>$country_name,"school_district"=>$school_district,"school_image"=>$school_image,"teachers list" =>$teacherDetails,"message" => "success"], 200);
			        }
			    else {
			        $status="false";
			        return response()->json(["status"=>$status,"teachers list" =>$teacherDetails,"message" => "success"], 200);
					 }
			}
//...................................USER FOLLOWED TEACHERS API IOS..........................................
			
			public function userFollowedTeacher(Request $request) {
			   
			   $results=null;
			   $id=(int)$request->id;
			   $followerrole=$request->role;
			   $status="";
			 
				if ($followerrole=="Parent")
				{
				 $results=DB::select('select t.teacher_id,t.teacher_firstName,t.teacher_lastName,t.teacher_image from parent p inner join follow f on (f.parent_id=p.parent_id) inner join teacher t on (f.toBeFollow=t.teacher_id) inner join school s on (t.school_id = s.school_id) where f.role = ? and p.parent_id = ?', ['teacher', $id]);
				 $status="true";
			     return response()->json(["status"=>$status,"teacher_details" =>$results,"message" => "success"], 200);
				    
				}
				else if ($followerrole=="Student")
				{
				$results=DB::select('select t.teacher_id,t.teacher_firstName,t.teacher_lastName,t.teacher_image from student s inner join follow f on (f.student_id=s.student_id) inner join teacher t on (f.toBeFollow=t.teacher_id) inner join school sc on (t.school_id = sc.school_id) where f.role = ? and s.student_id = ?', ['teacher', $id]);
	             $status="true";
			     return response()->json(["status"=>$status,"teacher_details" =>$results,"message" => "success"], 200);
				}
				else if ($followerrole=="Teacher")
				{
				$results=DB::select('select t2.teacher_id,t2.teacher_firstName,t2.teacher_lastName,t2.teacher_image from teacher t inner join follow f on (f.teacher_id=t.teacher_id) inner join teacher t2 on (f.toBeFollow=t2.teacher_id) inner join school s on (t.school_id = s.school_id) where f.role = ? and t.teacher_id = ?', ['teacher', $id]);
				
			     $status="true";
			     return response()->json(["status"=>$status,"teacher_details" =>$results,"message" => "success"], 200);
				}
				else if ($followerrole=="Community Member")
				{
				$results=DB::select('select t.teacher_id,t.teacher_firstName,t.teacher_lastName,t.teacher_image from communitymember c inner join follow f on (f.communityMember_id=c.communityMember_id) inner join teacher t on (f.toBeFollow=t.teacher_id) inner join school s on (t.school_id = s.school_id) where f.role = ? and c.communityMember_id = ?', ['teacher', $id]);
				
			     $status="true";
			     return response()->json(["status"=>$status,"teacher_details" =>$results,"message" => "success"], 200);
				}
				else if ($followerrole=="Principal")
				{
				$results=DB::select('select t.teacher_id,t.teacher_firstName,t.teacher_lastName,t.teacher_image from principal p inner join follow f on (f.principal_id=p.principal_id) inner join teacher t on (f.toBeFollow=t.teacher_id) inner join school s on (t.school_id = s.school_id) where f.role = ? and p.principal_id = ?', ['teacher', $id]);
				$status="true";
			    return response()->json(["status"=>$status,"teacher_details" =>$results,"message" => "success"], 200);
				    
				}

		       else
		          {
		              $status="false";
			          return response()->json(["status"=>$status,"message" => "incorrect role"], 404);
		          }
			   
			}
			
			
			
//...................................USER FOLLOWED SCHOOLS API IOS..........................................
			
			public function userFollowedSchool(Request $request) {
			   
			   $results=null;
			   $id=(int)$request->id;
			   $followerrole=$request->role;
			   $status="";
			 
				if ($followerrole=="Parent")
				{
				 $results=DB::select('select s.school_id,s.school_name,s.country_name,s.school_district,s.school_image,s.attendance_percentage from parent p inner join follow f on (f.parent_id=p.parent_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and p.parent_id = ?', ['school', $id]);
				 $status="true";
			     return response()->json(["status"=>$status,"school details" =>$results,"message" => "success"], 200);
				    
				}
				else if ($followerrole=="Student")
				{
				$results=DB::select('select s.school_id,s.school_name,s.country_name,s.school_district,s.school_image,s.attendance_percentage from student st inner join follow f on (f.student_id=st.student_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and st.student_id = ?', ['school', $id]);
	             $status="true";
			     return response()->json(["status"=>$status,"school details" =>$results,"message" => "success"], 200);
				}
				else if ($followerrole=="Teacher")
				{
				$results=DB::select('select s.school_id,s.school_name,s.country_name,s.school_district,s.school_image,s.attendance_percentage from teacher t inner join follow f on (f.teacher_id=t.teacher_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and t.teacher_id = ?', ['school', $id]);
				
			     $status="true";
			     return response()->json(["status"=>$status,"school details" =>$results,"message" => "success"], 200);
				}
				else if ($followerrole=="Community Member")
				{
				$results=DB::select('select s.school_id,s.school_name,s.country_name,s.school_district,s.school_image,s.attendance_percentage from communitymember c inner join follow f on (f.communityMember_id=c.communityMember_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and c.communityMember_id = ?', ['school', $id]);
				
			     $status="true";
			     return response()->json(["status"=>$status,"school details" =>$results,"message" => "success"], 200);
				}
				else if ($followerrole=="Principal")
				{
				$results=DB::select('select  s.school_id,s.school_name,s.country_name,s.school_district,s.school_image,s.attendance_percentage from principal p inner join follow f on (f.principal_id=p.principal_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and p.principal_id = ?', ['school', $id]);
				$status="true";
			    return response()->json(["status"=>$status,"school details" =>$results,"message" => "success"], 200);
				    
				}

		       else
		          {
		              $status="false";
			          return response()->json(["status"=>$status,"message" => "incorrect role"], 404);
		          }
			   
			}
			

//...................................USER ALL HABITS API IOS..........................................
public function userAllHabit(Request $request) {
			   $results=null;
			   $Userrole=$request->role;
			   $status="";
			   $results="";
			   
				if ($Userrole=="Parent")
				{
				$results=DB::select('select id,name,info,date from habit where Parent = "true" ');
				     if($results)
				
				         {
				         	$status="true";
			                return response()->json(["status"=>$status,"Habits list" =>$results,"message" => "success"], 200);
				         }
				         else
				         {
				           $status="true";
			               return response()->json(["status"=>$status,"Habits list" =>$results,"message" => "No habbits available"], 200);  
				         }
				
				    
				}
				else if ($Userrole=="Student")
				{
				$results=DB::select('select  id,name,info,date from habit where Student = "true" ');
				 if($results)
				
				         {
				         	$status="true";
			                return response()->json(["status"=>$status,"Habits list" =>$results,"message" => "success"], 200);
				         }
				         else
				         {
				           $status="true";
			               return response()->json(["status"=>$status,"Habits list" =>$results,"message" => "No habbits available"], 200);  
				         }
	
				}
				else if ($Userrole=="Teacher")
				{
				$results=DB::select('select id,name,info,date from habit where Teacher = "true" ');
				 if($results)
				
				         {
				         	$status="true";
			                return response()->json(["status"=>$status,"Habits list" =>$results,"message" => "success"], 200);
				         }
				         else
				         {
				           $status="true";
			               return response()->json(["status"=>$status,"Habits list" =>$results,"message" => "No habbits available"], 200);  
				         }
				}
				else if ($Userrole=="Community Member")
				{
				$results=DB::select('select id,name,info,date from habit where 	CommunityMember = "true" ');
				 if($results)
				
				         {
				         	$status="true";
			                return response()->json(["status"=>$status,"Habits list" =>$results,"message" => "success"], 200);
				         }
				         else
				         {
				           $status="true";
			               return response()->json(["status"=>$status,"Habits list" =>$results,"message" => "No habbits available"], 200);  
				         }
				}
				else if ($Userrole=="Principal")
				{
				$results=DB::select('select id,name,info,date from habit where 	Principal = "true" ');
				 if($results)
				
				         {
				         	$status="true";
			                return response()->json(["status"=>$status,"Habits list" =>$results,"message" => "success"], 200);
				         }
				         else
				         {
				           $status="true";
			               return response()->json(["status"=>$status,"Habits list" =>$results,"message" => "No habbits available"], 200);  
				         }
				}
				else
                    { 
                      $status="false";
			          return response()->json(["status"=>$status,"message" => "incorrect role"], 404);
					 }
			}			
	
	
//...................................USER ADD FOLLOW API IOS..........................................

public function userAddFollow(Request $request) {
			    
			    $id=(int)$request->following_id;
			    $followbyrole=$request->following_role;
			    $followerrole=$request->follower_role;
			    $followby_id=$request->follower_id;
			    
			    $status="";
		    	$checkAlready="";
			    $results="";
			    
			    
			    if($id == $followby_id && strtolower($followerrole) == strtolower($followbyrole))
			    {
			      $status="false";
			      return response()->json(["status"=>$status,"message" => "Can't follow yourself"], 400);  
			    }
			    
		
				if ($followerrole=="Parent")
				{
				    $checkAlready=DB::select('select * from follow where parent_id =? AND toBeFollow = ? AND role = ?', [$followby_id, $id, $followbyrole]);
			        if($checkAlready)
			                        {
			                         $status="false";
			                         return response()->json(["status"=>$status,"message" => "Already followed"], 200);  
			                        }
			                        else
			                        {
			                          $results=DB::insert('INSERT INTO `follow`(`parent_id`, `toBeFollow`,`role`) VALUES (?, ?, ?)', [$followby_id, $id, $followbyrole]); 
			                          if($results){
			                              $status="true";
			                              return response()->json(["status"=>$status,"message" => "Successfully followed"], 200);
			                              
			                          } 
			                          else
			                          {
			                            $status="false";
			                            return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			                          }
			                        }
				
				}
				else if ($followerrole=="Student")
				{
				    $checkAlready=DB::select('select * from follow where student_id =? AND toBeFollow = ? AND role = ?', [$followby_id, $id, $followbyrole]);
			        if($checkAlready)
			                        {
			                         $status="false";
			                         return response()->json(["status"=>$status,"message" => "Already followed"], 200);  
			                        }
			                        else
			                        {
			                          $results=DB::insert('INSERT INTO `follow`(`student_id`, `toBeFollow`,`role`) VALUES (?, ?, ?)', [$followby_id, $id, $followbyrole]); 
			                          if($results){
			                              $status="true";
			                              return response()->json(["status"=>$status,"message" => "Successfully followed"], 200);
			                              
			                          } 
			                          else
			                          {
			                            $status="false";
			                            return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			                          }
			                        }
				    
				    
				    
				
				}
				else if ($followerrole=="Teacher")
				{
				    $checkAlready=DB::select('select * from follow where teacher_id =? AND toBeFollow = ? AND role = ?', [$followby_id, $id, $followbyrole]);
			        if($checkAlready)
			                        {
			                         $status="false";
			                         return response()->json(["status"=>$status,"message" => "Already followed"], 200);  
			                        }
			                        else
			                        {
			                          $results=DB::insert('INSERT INTO `follow`(`teacher_id`, `toBeFollow`,`role`) VALUES (?, ?, ?)', [$followby_id, $id, $followbyrole]); 
			                          if($results){
			                              $status="true";
			                              return response()->json(["status"=>$status,"message" => "Successfully followed"], 200);
			                              
			                          } 
			                          else
			                          {
			                            $status="false";
			                            return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			                          }
			                        }
				    
				    
				    
				    
				
				}
				else if ($followerrole=="Community Member")
				{
				  $checkAlready=DB::select('select * from follow where communityMember_id =? AND toBeFollow = ? AND role = ?', [$followby_id, $id, $followbyrole]);
			        if($checkAlready)
			                        {
			                         $status="false";
			                         return response()->json(["status"=>$status,"message" => "Already followed"], 200);  
			                        }
			                        else
			                        {
			                          $results=DB::insert('INSERT INTO `follow`(`communityMember_id`, `toBeFollow`,`role`) VALUES (?, ?, ?)', [$followby_id, $id, $followbyrole]); 
			                          if($results){
			                              $status="true";
			                              return response()->json(["status"=>$status,"message" => "Successfully followed"], 200);
			                              
			                          } 
			                          else
			                          {
			                            $status="false";
			                            return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			                          }
			                        }  
				    
				    
				
				}
				else if ($followerrole=="Principal")
				{
				    $checkAlready=DB::select('select * from follow where principal_id =? AND toBeFollow = ? AND role = ?', [$followby_id, $id, $followbyrole]);
			        if($checkAlready)
			                        {
			                         $status="false";
			                         return response()->json(["status"=>$status,"message" => "Already followed"], 200);  
			                        }
			                        else
			                        {
			                          $results=DB::insert('INSERT INTO `follow`(`principal_id`, `toBeFollow`,`role`) VALUES (?, ?, ?)', [$followby_id, $id, $followbyrole]); 
			                          if($results){
			                              $status="true";
			                              return response()->json(["status"=>$status,"message" => "Successfully followed"], 200);
			                              
			                          } 
			                          else
			                          {
			                            $status="false";
			                            return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			                          }
			                        }  
				    
				    
				
				}
                else
			      {
			          $status="false";
			          return response()->json(["status"=>$status,"message" => "incorrect role"], 404); 
			      }
		 }
			


//...................................USER UN FOLLOW API IOS..........................................

public function userUnFollow(Request $request) {
    
			    $id=(int)$request->following_id;
			    $followbyrole=$request->following_role;
			    $followerrole=$request->follower_role;
			    $followby_id=$request->follower_id;
			    
			    $status="";
			    
			    
				if ($followerrole=="Parent")
				{
				$results=DB::delete('delete from `follow` where `parent_id`=? and `toBeFollow`=? and `role`=?', [$followby_id, $id, $followbyrole]);
				if($results)
				            {
			                  $status="true";
			                  return response()->json(["status"=>$status,"message" => "Successfully Unfollowed"], 200);
			                 } 
			                  else
			                     {
			                         $status="false";
			                         return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			                     }
			
				}
				else if ($followerrole=="Student")
				{
				$results=DB::delete('delete from `follow` WHERE `student_id`=? and `toBeFollow`=? and `role`=?', [$followby_id, $id, $followbyrole]);
				if($results)
				            {
			                  $status="true";
			                  return response()->json(["status"=>$status,"message" => "Successfully Unfollowed"], 200);
			                 } 
			                  else
			                     {
			                         $status="false";
			                         return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			                     }
				
				
				}
				else if ($followerrole=="Teacher")
				{
				$results=DB::delete('delete from `follow` where `teacher_id`=? and `toBeFollow`=? and `role`=?', [$followby_id, $id, $followbyrole]);
				if($results)
				            {
			                  $status="true";
			                  return response()->json(["status"=>$status,"message" => "Successfully Unfollowed"], 200);
			                 } 
			                  else
			                     {
			                         $status="false";
			                         return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			                     }
				
				}
				else if ($followerrole=="Community Member")
				{
				$results=DB::delete('delete from `follow` where `communityMember_id`=? and `toBeFollow`=? and `role`=?', [$followby_id, $id, $followbyrole]);
				if($results)
				            {
			                  $status="true";
			                  return response()->json(["status"=>$status,"message" => "Successfully Unfollowed"], 200);
			                 } 
			                  else
			                     {
			                         $status="false";
			                         return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			                     }
				}
				else if ($followerrole=="Principal")
				{
				$results=DB::delete('delete from `follow` where `principal_id`=? and `toBeFollow`=? and `role`=? ', [$followby_id, $id, $followbyrole]);
				if($results)
				            {
			                  $status="true";
			                  return response()->json(["status"=>$status,"message" => "Successfully Unfollowed"], 200);
			                 } 
			                  else
			                     {
			                         $status="false";
			                         return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			                     }
				}
               else
               {
                  $status="false";
			      return response()->json(["status"=>$status,"message" => "incorrect role"], 404);  
               }
			}



//......................................IOS APP SET CURRENT HABIT API .......................................


public function setCurrentHabit(Request $request) {
			    
			    $habit_status="current";
			    $starting_date=$request->starting_date;
			    $user_id=(int)$request->user_id;
			    $user_role=$request->user_role;
			    $habit_id=(int)$request->habit_id;
			    $status="";
			    
			    $check=DB::select('select * from habitstatus where status="current" AND user_id = ? AND user_role = ?', [$user_id,$user_role]);	
			    if($check){
			                  $status="false";
			                  return response()->json(["status"=>$status,"Habit details"=>json_decode("{}"),"message" => "Complete Current Habit first"], 200);  
			    }
			    else{
				    $results1=DB::insert('INSERT INTO `habitstatus`(`status`,`date`, `user_id`,`user_role`,`habit_id`) VALUES (?, ?, ?, ?,?)', [$habit_status,$starting_date, $user_id, $user_role, $habit_id]);
				    $results=DB::select('select id,name,info,date from habit where id = ?',[$habit_id]);
				
                    if ($results1)
                               {
                                   $status="true";
			                       return response()->json(["status"=>$status,"Habit details"=>$results[0],"message" => "Successfully added"], 200);
			                   }
			    else {
			        $status="false";
			        return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);
					}
			    }
			}


//......................................IOS APP SHOW USER HABITs API .......................................
public function userCompletedHabits(Request $request) {
			    
			    $user_id=(int)$request->user_id;
			    $user_role=$request->user_role;
			    $status="";
			 
				//$current=DB::select('select h.id ,h.name,h.info,st.date ,st.status,st.completed_days from habit h inner join habitstatus st on (h.id=st.habit_id) where st.status="current" AND st.user_id = ? AND st.user_role = ?', [$user_id,$user_role]);		      
				$completed=DB::select('select h.name,h.info,st.date from habit h inner join habitstatus st on (h.id=st.habit_id) where st.status="complete" AND st.user_id = ? AND st.user_role = ?', [$user_id,$user_role]);		      
                    
                    
			
                   if($completed){
                                       $status="true";
			                           return response()->json(["status"=>$status,"Completed habits" => $completed,"message" => "Success"], 200);
                                      }
                                      else
                                      {
                                       $status="false";
			                           return response()->json(["status"=>$status,"Completed habits" => $completed,"message" => "No Habits yet"], 200); 
                                      }
    
}



//.............................................................................
public function userCurrentHabit(Request $request) {
			    
			    $user_id=(int)$request->user_id;
			    $user_role=$request->user_role;
			 
				$current=DB::select('select h.id ,h.name,h.info,st.date ,st.status,ROUND((st.completed_days * 100.0 / (30)),2) as "habit_percentage" from habit h inner join habitstatus st on (h.id=st.habit_id) where st.status="current" AND st.user_id = ? AND st.user_role = ?', [$user_id,$user_role]);		      
			//	$completed=DB::select('select h.id ,h.name,h.info,st.date,st.status,st.completed_days from habit h inner join habitstatus st on (h.id=st.habit_id) where st.status="complete" AND st.user_id = ? AND st.user_role = ?', [$user_id,$user_role]);		      
                    
                    if($current){
                                       $status="true";
			                           return response()->json(["status"=>$status,"Current_habit" => $current[0],"message" => "Success"], 200);
                                      }
                                      else
                                      {
                                       $status="false";
			                           return response()->json(["status"=>$status,"Current_habit" => json_decode("{}"),"message" => "No Current Habits yet"], 200); 
                                      }
			}


//.............................................................................

	public function updateHabit(Request $request) {
			    $completed_days=null;
			    $result1=null;
			    $status=$request->status;
			    $completed_date=$request->completed_date;
			    $user_id=(int)$request->user_id;
			    $user_role=$request->user_role;
			    $habit_id=(int)$request->habit_id;
			    $days=$request->days;
			    $statuss="";
			    $result="";
			    
			    
			    if($days=="yes")
			    {
			       $result=DB::select('select completed_days from `habitstatus`  where user_id = ? AND user_role = ? AND habit_id = ?', [$user_id,$user_role,$habit_id]);
			       if($result)
			       {
			        
			        foreach ($result as $results) {
                    $completed_days= $results->completed_days;
                    }
			   
			        $completed_days=(int)$completed_days+1; 
			   
			        $query=DB::table('habitstatus')->where('user_id',$user_id)->where('user_role', $user_role)->where('habit_id', $habit_id)->update(array('completed_days' =>$completed_days ,'status'=>$status,'date'=>$completed_date ));
			        $status="true";
			        return response()->json(["status"=>$status,"message" => "Day added"], 200);
			           
			       } else
			       {
			          $status="false";
			          return response()->json(["status"=>$status,"message" => "Incorrect values"], 400); 
			       }
			        
				 
			    }
			    
			    else
			    {
			        $query=DB::table('habitstatus')->where('user_id',$user_id)->where('user_role', $user_role)->where('habit_id', $habit_id)->update(array('status'=>$status,'date'=>$completed_date ));
			        if($query){
			         $status="true";
			        return response()->json(["status"=>$status,"message" => "Habit completed"], 200);
			            
			        }else{
			        $status="false";
			        return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);
			        }
			        
			    }
			    
			}


  //--------------------------------------SCHOOL TEACHER REVIEWS IOS APP-----------------------------------------
			public function insertUserFeedback(Request $request) {
			   $results=null;
			   $status="";
			   $type= $request->type;
			   $rating= (int)$request->rating;
			   $reviews=$request->reviews;
			   $feedback_date=$request->feedback_date;
			   $id=(int)$request->id;
			   $feedback_to=$request->role;
			   $feedbackby_id=$request->user_id;
			   $role=$request->user_role;
			   $dateAlready="";
			   $difference="";
			   $started="";
			   $end="";
			   
			   
			   if($feedback_to == "Teacher"){
			   
				if ($role=="Parent" || $role=="parent" )
				{
				 $checkAlready=DB::select('select * from feedback where parent_id = ? AND teacher_feedback_id =?', [$feedbackby_id,$id]);  
				 if($checkAlready){
				       foreach ($checkAlready as $results) {
                       $dateAlready = $results->feedback_date;
                       }
                        $started = Carbon::parse($dateAlready);
			            $end = Carbon::parse($feedback_date);
			            $difference = $end->diff($started);
                        $difference = $difference->format('%a');
                       if($difference > 7){
                          $results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text`,`feedback_date` , `parent_id`) VALUES (?, ?, ?, ?, ?,?)', [$id, $type, $rating, $reviews,$feedback_date, $feedbackby_id]);    
                       } 
                       else
                       {
                           $status="false";
			               return response()->json(["status"=>$status,"message" => "1 feedback/week allowed"], 200);  
                       }
				 }
				 else{
				  $results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text`,`feedback_date` , `parent_id`) VALUES (?, ?, ?, ?, ?,?)', [$id, $type, $rating, $reviews,$feedback_date, $feedbackby_id]);   
				 }
				
				}
				else if ($role=="Student" || $role =="student" )
				{
				$checkAlready=DB::select('select * from feedback where student_id = ? AND teacher_feedback_id =?', [$feedbackby_id,$id]);  
				 if($checkAlready){
				       foreach ($checkAlready as $results) {
                       $dateAlready = $results->feedback_date;
                       }
                        $started = Carbon::parse($dateAlready);
			            $end = Carbon::parse($feedback_date);
			            $difference = $end->diff($started);
                        $difference = $difference->format('%a');
                       if($difference > 7){
                          	$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text`,`feedback_date` , `student_id`) VALUES (?, ?, ?, ?,?, ?)', [$id, $type, $rating, $reviews,$feedback_date, $feedbackby_id]);    
                       } 
                       else
                       {
                           $status="false";
			               return response()->json(["status"=>$status,"message" => "1 feedback/week allowed"], 200);  
                       }
				 }
				 else{
				  	$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text`,`feedback_date` , `student_id`) VALUES (?, ?, ?, ?,?, ?)', [$id, $type, $rating, $reviews,$feedback_date, $feedbackby_id]);   
				 }
				    
			
				}
				else if ($role=="Teacher" || $role=="teacher")
				{
				    $checkAlready=DB::select('select * from feedback where teacher_id = ? AND teacher_feedback_id =?', [$feedbackby_id,$id]);  
				    if($checkAlready){
				       foreach ($checkAlready as $results) {
                       $dateAlready = $results->feedback_date;
                       }
                        $started = Carbon::parse($dateAlready);
			            $end = Carbon::parse($feedback_date);
			            $difference = $end->diff($started);
                        $difference = $difference->format('%a');
                       if($difference > 7){
                          	$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text` ,`feedback_date`, `teacher_id`) VALUES (?, ?, ?, ?, ?,?)', [$id, $type, $rating, $reviews,$feedback_date, $feedbackby_id]);  
                       } 
                       else
                       {
                           $status="false";
			               return response()->json(["status"=>$status,"message" => "1 feedback/week allowed"], 200);  
                       }
				 }
				 else{
				  	$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text` ,`feedback_date`, `teacher_id`) VALUES (?, ?, ?, ?, ?,?)', [$id, $type, $rating, $reviews,$feedback_date, $feedbackby_id]);  
				 }
				    
				
				}
				else if ($role=="Community Member"|| $role=="community")
				{
				    $checkAlready=DB::select('select * from feedback where communityMember_id = ? AND teacher_feedback_id =?', [$feedbackby_id,$id]);  
				    if($checkAlready){
				       foreach ($checkAlready as $results) {
                       $dateAlready = $results->feedback_date;
                       }
                        $started = Carbon::parse($dateAlready);
			            $end = Carbon::parse($feedback_date);
			            $difference = $end->diff($started);
                        $difference = $difference->format('%a');
                       if($difference > 7){
                          		$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text` ,`feedback_date`, `communityMember_id`) VALUES (?, ?, ?,?, ?, ?)', [$id, $type, $rating, $reviews, $feedback_date,$feedbackby_id]);
                       } 
                       else
                       {
                           $status="false";
			               return response()->json(["status"=>$status,"message" => "1 feedback/week allowed"], 200);  
                       }
				 }
				 else{
				  		$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text` ,`feedback_date`, `communityMember_id`) VALUES (?, ?, ?,?, ?, ?)', [$id, $type, $rating, $reviews, $feedback_date,$feedbackby_id]);
				 }
			
				}
				else if ($role=="Principal"||$role=="principal")
				{
				    $checkAlready=DB::select('select * from feedback where principal_id = ? AND teacher_feedback_id =?', [$feedbackby_id,$id]);  
				    if($checkAlready){
				       foreach ($checkAlready as $results) {
                       $dateAlready = $results->feedback_date;
                       }
                        $started = Carbon::parse($dateAlready);
			            $end = Carbon::parse($feedback_date);
			            $difference = $end->diff($started);
                        $difference = $difference->format('%a');
                       if($difference > 7){
                          			$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text` ,`feedback_date`, `principal_id`) VALUES (?, ?, ?, ?, ?,?)', [$id, $type, $rating, $reviews, $feedback_date,$feedbackby_id]);
                       } 
                       else
                       {
                           $status="false";
			               return response()->json(["status"=>$status,"message" => "1 feedback/week allowed"], 200);  
                       }
				 }
				 else{
				  			$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text` ,`feedback_date`, `principal_id`) VALUES (?, ?, ?, ?, ?,?)', [$id, $type, $rating, $reviews, $feedback_date,$feedbackby_id]);
				 }
				    
			
				}
				else{
				  $status="false";
			      return response()->json(["status"=>$status,"message" => "Incorrect user"], 400);  
				}
			   
			       
			   }
			   else if($feedback_to == "School"){
			       
			   if ($role=="Parent" || $role=="parent" )
				{
				     $checkAlready=DB::select('select * from schoolfeedback where parent_id = ? AND school_id =?', [$feedbackby_id,$id]);  
				 if($checkAlready){
				       foreach ($checkAlready as $results) {
                       $dateAlready = $results->feedback_date;
                       }
                        $started = Carbon::parse($dateAlready);
			            $end = Carbon::parse($feedback_date);
			            $difference = $end->diff($started);
                        $difference = $difference->format('%a');
                       if($difference > 7){
                         $results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`, `feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review`,`feedback_date` , `parent_id`) VALUES (?,? ,?, ?,?, ?)', [$id,$type, $rating, $reviews, $feedback_date,$feedbackby_id,]);
                       } 
                       else
                       {
                           $status="false";
			               return response()->json(["status"=>$status,"message" => "1 feedback/week allowed"], 200);  
                       }
				 }
				 else{
				  $results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`, `feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review`,`feedback_date` , `parent_id`) VALUES (?,? ,?, ?,?, ?)', [$id,$type, $rating, $reviews, $feedback_date,$feedbackby_id,]);  
				 }
				
				}
			    	else if ($role=="Student" || $role =="student" )
				{
				     $checkAlready=DB::select('select * from schoolfeedback where student_id = ? AND school_id =?', [$feedbackby_id,$id]);  
				 if($checkAlready){
				       foreach ($checkAlready as $results) {
                       $dateAlready = $results->feedback_date;
                       }
                        $started = Carbon::parse($dateAlready);
			            $end = Carbon::parse($feedback_date);
			            $difference = $end->diff($started);
                        $difference = $difference->format('%a');
                       if($difference > 7){
                        $results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`,`feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review` ,`feedback_date`, `student_id`) VALUES (?,?, ?,? ,?, ?)', [$id,$type, $rating, $reviews, $feedback_date,$feedbackby_id,]);
                       } 
                       else
                       {
                           $status="false";
			               return response()->json(["status"=>$status,"message" => "1 feedback/week allowed"], 200);  
                       }
				 }
				 else{
				 $results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`,`feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review` ,`feedback_date`, `student_id`) VALUES (?,?, ?,? ,?, ?)', [$id,$type, $rating, $reviews, $feedback_date,$feedbackby_id,]);
				 }
				
				}
				else if ($role=="Teacher" || $role=="teacher")
				{
				     $checkAlready=DB::select('select * from schoolfeedback where teacher_id = ? AND school_id =?', [$feedbackby_id,$id]);  
				 if($checkAlready){
				       foreach ($checkAlready as $results) {
                       $dateAlready = $results->feedback_date;
                       }
                        $started = Carbon::parse($dateAlready);
			            $end = Carbon::parse($feedback_date);
			            $difference = $end->diff($started);
                        $difference = $difference->format('%a');
                       if($difference > 7){
                        	$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`,`feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review`,`feedback_date` , `teacher_id`) VALUES (?,?, ?,?, ?, ?)', [$id, $type,$rating, $reviews,$feedback_date, $feedbackby_id,]);
                       } 
                       else
                       {
                           $status="false";
			               return response()->json(["status"=>$status,"message" => "1 feedback/week allowed"], 200);  
                       }
				 }
				 else{
				 	$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`,`feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review`,`feedback_date` , `teacher_id`) VALUES (?,?, ?,?, ?, ?)', [$id, $type,$rating, $reviews,$feedback_date, $feedbackby_id,]);
				 }
			
				}
					else if ($role=="Community Member"|| $role=="community")
				{
				     $checkAlready=DB::select('select * from schoolfeedback where communityMember_id = ? AND school_id =?', [$feedbackby_id,$id]);  
				 if($checkAlready){
				       foreach ($checkAlready as $results) {
                       $dateAlready = $results->feedback_date;
                       }
                        $started = Carbon::parse($dateAlready);
			            $end = Carbon::parse($feedback_date);
			            $difference = $end->diff($started);
                        $difference = $difference->format('%a');
                       if($difference > 7){
                        	$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`, `feedback_type` ,`schoolFeedback_rating`,`schoolFeedback_review` ,`feedback_date`, `communityMember_id`) VALUES (?,? ,?,?, ?, ?)', [$id,$type, $rating, $reviews,$feedback_date, $feedbackby_id,]);
                       } 
                       else
                       {
                           $status="false";
			               return response()->json(["status"=>$status,"message" => "1 feedback/week allowed"], 200);  
                       }
				 }
				 else{
				 		$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`, `feedback_type` ,`schoolFeedback_rating`,`schoolFeedback_review` ,`feedback_date`, `communityMember_id`) VALUES (?,? ,?,?, ?, ?)', [$id,$type, $rating, $reviews,$feedback_date, $feedbackby_id,]);
				 }
			
				}
				else if ($role=="Principal"||$role=="principal")
				{
				    $checkAlready=DB::select('select * from schoolfeedback where principal_id = ? AND school_id =?', [$feedbackby_id,$id]);  
				 if($checkAlready){
				       foreach ($checkAlready as $results) {
                       $dateAlready = $results->feedback_date;
                       }
                        $started = Carbon::parse($dateAlready);
			            $end = Carbon::parse($feedback_date);
			            $difference = $end->diff($started);
                        $difference = $difference->format('%a');
                       if($difference > 7){
                        		$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`,`feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review`,`feedback_date` , `principal_id`) VALUES (?,? ,?,?, ?, ?)', [$id, $type,$rating, $reviews,$feedback_date ,$feedbackby_id,]);
                       } 
                       else
                       {
                           $status="false";
			               return response()->json(["status"=>$status,"message" => "1 feedback/week allowed"], 200);  
                       }
				 }
				 else{
				 		$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`,`feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review`,`feedback_date` , `principal_id`) VALUES (?,? ,?,?, ?, ?)', [$id, $type,$rating, $reviews,$feedback_date ,$feedbackby_id,]);
				 }
			
				}   
                 else{
				  $status="false";
			      return response()->json(["status"=>$status,"message" => "Incorrect user"], 400); 
			     }
			       
			   }
			   
			   
			   else{
			     $status="false";
			     return response()->json(["status"=>$status,"message" => "Incorrect role"], 400);    
			   }
			       
			
			   if($results){
			     $status="true";
			     return response()->json(["status"=>$status,"message" => "Feedback added"], 200);  
			   }
			   else{
			     $status="false";
			     return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);  
			   }
			    
			    
			}
			
 //------------------------------------ SHOW SCHOOL TEACHER REVIEWS IOS APP-------------------------------------------


	public function feedbackShow(Request $request) {
	    
				$id=(int)$request->id;
				$role=$request->role;
				$user_id=(int)$request->user_id;
				$user_role=(int)$request->user_role;
				$status="";
				$results="";
				
				
				if($role=="Teacher")
				{
				    if($user_role=="Teacher" && $user_id==$id)
				    {
				      $results=DB::select('select feedback_review_text,feedback_date from feedback where teacher_feedback_id = ?', [$id]);		      
			         if ($results){
			                    $status="true";
			                    return response()->json(["status"=>$status,"feedback_details" => $results,"message" => "Success"], 200);
			                       }
			                       else {
			                              $status="false";
			                              return response()->json(["status"=>$status,"feedback_details" => $results,"message" => "Success"], 200);
					               }   
				    }
				    else
				    {
				     $results=DB::select('select feedback_review_text,feedback_date from feedback where feedback_type = "Public" AND teacher_feedback_id = ?', [$id]);		      
			         if ($results){
			                    $status="true";
			                    return response()->json(["status"=>$status,"feedback_details" => $results,"message" => "Success"], 200);
			                       }
			                       else {
			                              $status="false";
			                              return response()->json(["status"=>$status,"feedback_details" => $results,"message" => "Success"], 200);
					               }    
				    }
				    	
				  
				  
				}
				else if($role=="School")
				{
				    $results=DB::select('select schoolFeedback_review as "feedback_review_text" , feedback_date from schoolfeedback where feedback_type = "Public" AND school_id = ?', [$id]);		      
			         if ($results){
			                    $status="true";
			                    return response()->json(["status"=>$status,"feedback_details" => $results,"message" => "Success"], 200);
			                       }
			                       else {
			                              $status="false";
			                              return response()->json(["status"=>$status,"feedback_details" => $results,"message" => "Success"], 200);
					               }
				}
				else
				{
				    $status="false";
			        return response()->json(["status"=>$status,"feedback_details" => $results,"message" => "Inavalid role"], 400);
				}
				
			}
			
			
			
//........................................SCHOOL CHANGE IOS APP.....................................
				public function schoolChange(Request $request) {
			 	$country_name=$request->country_name;
			    $student_district= $request->dist_name;
			    $school_id=(int)$request->school_id;
			    $id=(int)$request->student_id;
			    $status="";
			    $student_id=null;
			   
			    $student_id=DB::table('student')->where('student_id',$id)->update(array(
					'country_name'			=>$country_name,
					'student_district'		=>$student_district,
					'school_id'			    =>$school_id));
			    
			    
			    if ($student_id){
			                     $status="true";
			                     return response()->json(["status"=>$status,"message" => "Updated successfully"], 200);
			                    }
			                    else {
			                          $status="false";
			                          return response()->json(["status"=>$status,"message" => "incorrect credentials"], 404);
					                  }
			     
			   }			
			
			
//-------------------------------------------------REPORT TEACHER ABSENCE IOS APP---------------------------------------------------------------------------------------			

		public function reportTeacher(Request $request) {
				$school_id="";
				$status="";
				$teacher_id=(int)$request->teacher_id;
			    $reportAbsence_date=$request->reportAbsence_date;
			    $reportAbsence_shift=$request->reportAbsence_shift;
				$reporter_id=(int)$request->reporter_id;
			    $reporter_role=$request->reporter_role;
			    $report_time=$request->report_time;
			    $attendance_status='pending';
                $teacher_claim='No Response';
                $notification_status='active';
                $resolve='no';
                
                
                $getSchoolId=DB::select('select * from `teacher` where teacher_id = ? ', [$teacher_id]);
                 foreach ($getSchoolId as $records) {
                       $school_id = $records->school_id;
                     
                 }
                
                
                
                
                $checkSameDate=DB::select('select * from `reportabsence` where reportAbsence_date = ? AND teacher_id = ? ', [$reportAbsence_date,$teacher_id]);
		        if($checkSameDate){
			         $status="false";
			         return response()->json(["status"=>$status,"message" => "Already reported this day"], 200);  
	             }
			    else{
                $results1=DB::insert('INSERT INTO `reportabsence`( `reporter_id`,`reporter_role`,`teacher_id`, `school_id`, `reportAbsence_date`, `reportAbsence_shift`,`report_time`, `attendance_status`, `teacher_claim`,`resolve`, `positiveCount`, `negativeCount`,`notification_status`)
                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)', [$reporter_id,$reporter_role,$teacher_id, $school_id, $reportAbsence_date,$reportAbsence_shift,$report_time,$attendance_status,$teacher_claim,$resolve,0,0,$notification_status]);
                
			        if ($results1){
			         $status="true";
			         return response()->json(["status"=>$status,"message" => "Report submitted successfully"], 200);   
			        }
			    	
			    else {
			        $status="false";
			        return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);
					  }
	    }
	}
		
//-------------------------------------------------REPORT ABSENCE LIST IOS APP---------------------------------------------------------------------------------------		
		
public function reportAbsenceList(Request $request) {
				
				$startDate=null;
				$teacher_id=null;
				$teacher_absence=null;
				$positive= null;
				$negative = null;
				$reportAbsence_id=null;
				$difference=null;
				$results=null;
				$myresult=null;
				$status="";
				
				$currentDate = $request->current_date;
				$currentTime = $request->current_time;
				$user_id = $request->user_id;
				$user_role=$request->user_role;
			   
			   if($currentDate == "" || $currentTime =="" || $user_id=="" ||  $user_role=="")
			   {
			        $status="false";
			        return response()->json(["status"=>$status,"Report_list" => $myresult,"message" => "Incorrect values"], 400);  
			   }
			   else{
			      $records = DB::select('select * from reportabsence r where r.notification_status ="active" ');
			    foreach ($records as $results) {
                       $time = $results->report_time;
                       $date = $results->reportAbsence_date;
                      
                       $time =  date("H:i:s", strtotime("$time"));
                       $currentTime =  date("H:i:s", strtotime("$currentTime"));
                      
                       $startDate = $date." ".$time;
                       $endDate = $currentDate." ".$currentTime;
                       
                       $startDate = Carbon::parse($startDate);
                       $endDate = Carbon::parse($endDate);
                       
                       $diff = $endDate->diff($startDate);
                       $difference = $diff->format('%a');
               
               if($difference >= 2)
               {
                  
                    $reportAbsence_id =  $results->reportAbsence_id;
                    $positive = $results->positiveCount;
                    $negative = $results->negativeCount;
                    $updateStatus=DB::update('UPDATE `reportabsence` SET `notification_status` = "expired" WHERE reportAbsence_id  = ?', [$reportAbsence_id]);
                    
                    if($positive >= $negative)
                    {
			        
			       // $reportAbsence_id =  $results->reportAbsence_id;
			        $result1=DB::update('UPDATE `reportabsence` SET `attendance_status` = "absent" WHERE  reportAbsence_id = ?', [$reportAbsence_id]);
			        $teacher = DB::select('select * from reportabsence  where  reportAbsence_id = ?', [$reportAbsence_id]);
			       
			        foreach ($teacher as $teachers)  { $teacher_id = $teachers->teacher_id; }
			       
			        $result2 =DB::select('select teacher_absence from `teacher`  where teacher_id = ?',[$teacher_id]);
			          
			           foreach ($result2 as $myresult)  { $teacher_absence = $myresult->teacher_absence; }
			               
			                $teacher_absence=(int)$teacher_absence+1;
			                $updateAbsence=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_absence' =>$teacher_absence));
	
                    }
                    else
                    {
                     $result1=DB::update('UPDATE `reportabsence` SET `attendance_status` = "present" WHERE  reportAbsence_id = ?', [$reportAbsence_id]);   
                    }
                   
                  
			   }
			}
			
			
			if($user_role == "Community Member")
			{
			   //	$myresult = DB::select('select r.reportAbsence_id, CONCAT(t.teacher_firstName," ",t.teacher_lastName) as "teacher_name",t.teacher_image,r.reportAbsence_date,r.reportAbsence_shift from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) INNER JOIN follow f on (f.toBeFollow = r.teacher_id) INNER JOIN communitymember c on (f.communityMember_id = c.communityMember_id) where r.notification_status ="active" AND f.role ="teacher" AND f.communityMember_id = ? GROUP BY r.teacher_id',[$user_id]);
			
			    $myresult = DB::select('select r.reportAbsence_id, CONCAT(t.teacher_firstName," ",t.teacher_lastName) as "teacher_name" ,t.teacher_image,r.reportAbsence_date,r.reportAbsence_shift from 
                                        confirmreporter cr INNER JOIN reportabsence r on (cr.reportAbsence_id=r.reportAbsence_id) 
                                         inner join teacher t on (r.teacher_id=t.teacher_id) 
                                         INNER JOIN follow f on (f.toBeFollow = r.teacher_id) 
                                         INNER JOIN communitymember c on (f.communityMember_id = c.communityMember_id) 
                                         where r.notification_status ="active"  AND f.role ="teacher" AND f.communityMember_id = ? AND cr.reportAbsence_id 
                                         NOT IN 
                                         (SELECT reportAbsence_id FROM confirmreporter WHERE reporter_id = ? AND reporter_role ="Community Member" ) GROUP BY r.teacher_id',[$user_id,$user_id]);  
			    
			}
			
		    else if ($user_role == "Parent")
			{
			  $myresult = DB::select('select r.reportAbsence_id, CONCAT(t.teacher_firstName," ",t.teacher_lastName) as "teacher_name" ,t.teacher_image,r.reportAbsence_date,r.reportAbsence_shift from 
                                        confirmreporter cr INNER JOIN reportabsence r on (cr.reportAbsence_id=r.reportAbsence_id) 
                                         inner join teacher t on (r.teacher_id=t.teacher_id) 
                                         INNER JOIN follow f on (f.toBeFollow = r.teacher_id) 
                                         INNER JOIN parent p on (f.parent_id = p.parent_id) 
                                         where r.notification_status ="active"  AND f.role ="teacher" AND f.parent_id = ? AND cr.reportAbsence_id 
                                         NOT IN 
                                         (SELECT reportAbsence_id FROM confirmreporter WHERE reporter_id = ? AND reporter_role ="Parent" ) GROUP BY r.teacher_id',[$user_id,$user_id]);  
			}
		    else if ($user_role == "Student")
			{
			   	//$myresult = DB::select('select r.reportAbsence_id, CONCAT(t.teacher_firstName," ",t.teacher_lastName) as "teacher_name",t.teacher_image,r.reportAbsence_date,r.reportAbsence_shift from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) INNER JOIN follow f on (f.toBeFollow = r.teacher_id) INNER JOIN student st on (f.student_id = st.student_id) where r.notification_status ="active"  AND f.role ="teacher" AND f.student_id = ?  GROUP BY r.teacher_id',[$user_id]);

                $myresult = DB::select('select r.reportAbsence_id, CONCAT(t.teacher_firstName," ",t.teacher_lastName) as "teacher_name" ,t.teacher_image,r.reportAbsence_date,r.reportAbsence_shift from 
                                        confirmreporter cr INNER JOIN reportabsence r on (cr.reportAbsence_id=r.reportAbsence_id) 
                                         inner join teacher t on (r.teacher_id=t.teacher_id) 
                                         INNER JOIN follow f on (f.toBeFollow = r.teacher_id) 
                                         INNER JOIN student st on (f.student_id = st.student_id)
                                         where r.notification_status ="active"  AND f.role ="teacher" AND f.student_id = ? AND cr.reportAbsence_id 
                                         NOT IN 
                                         (SELECT reportAbsence_id FROM confirmreporter WHERE reporter_id = ? AND reporter_role ="Student" ) GROUP BY r.teacher_id',[$user_id,$user_id]); 
			}
		    else if($user_role == "Teacher")
			{
			 //	$myresult = DB::select('select r.reportAbsence_id,CONCAT(t.teacher_firstName," ",t.teacher_lastName) as "teacher_name",t.teacher_image,r.reportAbsence_date,r.reportAbsence_shift from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) INNER JOIN follow f on (f.toBeFollow = r.teacher_id) INNER JOIN teacher te on (f.teacher_id = te.teacher_id) where r.notification_status ="active"  AND f.role ="teacher" AND f.teacher_id = ?  GROUP BY r.teacher_id',[$user_id]);
                
                 $myresult = DB::select('select r.reportAbsence_id, CONCAT(t.teacher_firstName," ",t.teacher_lastName) as "teacher_name" ,t.teacher_image,r.reportAbsence_date,r.reportAbsence_shift from 
                                        confirmreporter cr INNER JOIN reportabsence r on (cr.reportAbsence_id=r.reportAbsence_id) 
                                         inner join teacher t on (r.teacher_id=t.teacher_id) 
                                         INNER JOIN follow f on (f.toBeFollow = r.teacher_id) 
                                         INNER JOIN teacher te on (f.teacher_id = te.teacher_id)
                                         where r.notification_status ="active"  AND f.role ="teacher" AND f.teacher_id = ? AND cr.reportAbsence_id 
                                         NOT IN 
                                         (SELECT reportAbsence_id FROM confirmreporter WHERE reporter_id = ? AND reporter_role ="Teacher" ) GROUP BY r.teacher_id',[$user_id,$user_id]); 
   
			}
	    	else if ($user_role == "Principal")
			{
			  //$myresult = DB::select('select r.reportAbsence_id,CONCAT(t.teacher_firstName," ",t.teacher_lastName) as "teacher_name",t.teacher_image,r.reportAbsence_date,r.reportAbsence_shift from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) INNER JOIN follow f on (f.toBeFollow = r.teacher_id) INNER JOIN principal p on (f.principal_id = p.principal_id) where r.notification_status ="active"  AND f.role ="teacher" AND f.principal_id = ?  GROUP BY r.teacher_id',[$user_id]);
              
              $myresult = DB::select('select r.reportAbsence_id, CONCAT(t.teacher_firstName," ",t.teacher_lastName) as "teacher_name" ,t.teacher_image,r.reportAbsence_date,r.reportAbsence_shift from 
                                         confirmreporter cr INNER JOIN reportabsence r on (cr.reportAbsence_id=r.reportAbsence_id) 
                                         inner join teacher t on (r.teacher_id=t.teacher_id) 
                                         INNER JOIN follow f on (f.toBeFollow = r.teacher_id) 
                                         INNER JOIN principal p on (f.principal_id = p.principal_id)
                                         where r.notification_status ="active"  AND f.role ="teacher" AND f.principal_id = ? AND cr.reportAbsence_id 
                                         NOT IN 
                                         (SELECT reportAbsence_id FROM confirmreporter WHERE reporter_id = ? AND reporter_role ="Principal" ) GROUP BY r.teacher_id',[$user_id,$user_id]); 
              
			}
			
		
			if ($myresult){
			        $status="true";
			        return response()->json(["status"=>$status,"Report_list" => $myresult,"message" => "Success"], 200);
			        }
			    else {
			        $status="true";
			        return response()->json(["status"=>$status,"Report_list" => $myresult,"message" => "No notifications yet"], 200);
					 } 
	}
			    
}


//---------------------------------------------------------REPORT VOTING IOS APP------------------------------------------------------------------------------
public function reportVoting(Request $request) {
			    //0 for False not 1 or other for true
                $user_choice=(int)$request->choice;
			    $report_id=(int)$request->report_id;
			    $reporter_id=(int)$request->voter_id;
			    $reporter_role=$request->voter_role;
			    $status="";
			     
			     $checkAlreadyVote=DB::select('select * from `confirmreporter` where reportAbsence_id = ? AND reporter_id = ? AND reporter_role = ?', [$report_id, $reporter_id, $reporter_role]);
		        if($checkAlreadyVote){
		            
		            $status="false";
			        return response()->json(["status"=>$status,"message" => "You already voted"], 200);
			     
	            }
			    else {
			    
			         if($user_choice){
			                          $vote_status="yes";
			                          $results1=DB::insert('INSERT INTO `confirmreporter`(`reportAbsence_id`, `reporter_id`,`reporter_role`,`vote_status`) VALUES (?, ?, ?,?)', [$report_id, $reporter_id, $reporter_role,$vote_status]);
			                          $result=DB::select('select positiveCount from `reportabsence` r where r.reportAbsence_id = ?', [$report_id]);
			                          foreach ($result as $results) {
                                                                      $positiveCount= $results->positiveCount;
                                      }
			                          
			                          $positiveCount=(int)$positiveCount+1;    
			                          $query=DB::table('reportabsence')->where('reportAbsence_id',$report_id)->update(array('positiveCount' =>$positiveCount ,));
			          }
			      else{
			           $vote_status="no";
			           $results1=DB::insert('INSERT INTO `confirmreporter`(`reportAbsence_id`, `reporter_id`,`reporter_role`,`vote_status`) VALUES (?, ?, ?,?)', [$report_id, $reporter_id, $reporter_role,$vote_status]);
			           $result=DB::select('select negativeCount from `reportabsence` r where r.reportAbsence_id = ?', [$report_id]);
			           foreach ($result as $results) {
                                                     $negativeCount= $results->negativeCount;
                       }
			           $negativeCount=(int)$negativeCount+1;
			           $query=DB::table('reportabsence')->where('reportAbsence_id',$report_id)->update(array('negativeCount' =>$negativeCount ,));
			      }

			        
			        
			        
			        if ($query){
			        	$status="true";
			            return response()->json(["status"=>$status,"message" => "Vote Submitted successfully"], 200);
			        }
			    	
			    else {
			        $status="false";
			         return response()->json(["status"=>$status,"message" => "Incorrect values"], 400);
			                        
					  }
					  
					  
	    }		  
					  
}



//-------------------------------------------------------COUNT STAR RATING ---------------------------------------------------------------------------
public function starRating(Request $request) {
	            $id=(int)$request->id;
			    $role=$request->role;
	            $five_star=0;
	            $four_star=0;
	            $three_star=0;
	            $two_star=0;
	            $one_star=0;
	            $status="";
	 
	            if($role=="Teacher"){
	            $five_str=DB::select('select COUNT(*) as "total" FROM feedback WHERE feedback_rating = 5 AND teacher_feedback_id= ?',[$id]);
			    foreach($five_str as $record){
			      $five_star= $record->total;
			    }
			    
			    $four_str=DB::select('select COUNT(*) as "total" FROM feedback WHERE feedback_rating = 4 AND teacher_feedback_id= ?',[$id]);
			    foreach($four_str as $record){
			      $four_star= $record->total;
			    }
			    
			     $three_str=DB::select('select COUNT(*) as "total" FROM feedback WHERE feedback_rating = 3 AND teacher_feedback_id= ?',[$id]);
			    foreach($three_str as $record){
			      $three_star= $record->total;
			    }
			    
			    $two_str=DB::select('select COUNT(*) as "total" FROM feedback WHERE feedback_rating = 2 AND teacher_feedback_id= ?',[$id]);
			    foreach($two_str as $record){
			      $two_star= $record->total;
			    }
			    
			    $one_str=DB::select('select COUNT(*) as "total" FROM feedback WHERE feedback_rating = 1 AND teacher_feedback_id= ?',[$id]);
			    foreach($one_str as $record){
			      $one_star= $record->total;
			    }
			    
			     
			   //$average_rating=DB::select('SELECT s.school_id,s.school_name, s.country_name AS school_country , s.school_state,s.school_district,s.school_image,s.attendance_percentage ,ROUND(AVG(f.schoolFeedback_rating),1) AverageRating  , SUM(t.teacher_absence) as TotalAbsence FROM school s  LEFT JOIN schoolfeedback f on (s.school_id = f.school_id) LEFT JOIN teacher t on(s.school_id = t.school_id) where s.school_district=? GROUP BY s.school_id ',[$district]);		      

			 
			    
			       $status="true";
			       return response()->json(["status"=>$status,"five_star"=>$five_star,"four_star"=>$four_star,"three_star"=>$three_star,"two_star"=>$two_star,"one_star"=>$one_star,"average_rating"=>"hello","message"=>"success"], 200);
			    
			    
	           }
	           else if($role=="School"){
	            
	             $five_str=DB::select('select COUNT(*) as "total" FROM schoolfeedback WHERE schoolFeedback_rating = 5 AND school_id= ?',[$id]);
			    foreach($five_str as $record){
			      $five_star= $record->total;
			    }
			    
			    $four_str=DB::select('select COUNT(*) as "total" FROM schoolfeedback WHERE schoolFeedback_rating = 4 AND school_id= ?',[$id]);
			    foreach($four_str as $record){
			      $four_star= $record->total;
			    }
			    
			     $three_str=DB::select('select COUNT(*) as "total" FROM schoolfeedback WHERE schoolFeedback_rating = 3 AND school_id= ?',[$id]);
			    foreach($three_str as $record){
			      $three_star= $record->total;
			    }
			    
			    $two_str=DB::select('select COUNT(*) as "total" FROM schoolfeedback WHERE schoolFeedback_rating = 2 AND school_id= ?',[$id]);
			    foreach($two_str as $record){
			      $two_star= $record->total;
			    }
			    
			    $one_str=DB::select('select COUNT(*) as "total" FROM schoolfeedback WHERE schoolFeedback_rating = 1 AND school_id= ?',[$id]);
			    foreach($one_str as $record){
			      $one_star= $record->total;
			    }
			    
			       $status="true";
			       return response()->json(["status"=>$status,"five_star"=>$five_star,"four_star"=>$four_star,"three_star"=>$three_star,"two_star"=>$two_star,"one_star"=>$one_star,"message"=>"success"], 200);
			    
	            
	               
	           }
	           else{
	              $status="false";
			      return response()->json(["status"=>$status,"five_star"=>$five_star,"four_star"=>$four_star,"three_star"=>$three_star,"two_star"=>$two_star,"one_star"=>$one_star,"message"=>"incorrect role"], 200); 
	           }
			       
			    
                    
				
				
			}



//-------------------------------------PUSH NOTIFICATION LIST FOR IOS APP ----------------------------------------------------------------------------


public function adminNotifications(Request $request) {
			 
                   $dist=$request->user_district;
                   $user=$request->user_role;
                   $id=(int)$request->user_id;
                   $status="";
                  
                   
                   if($user == "Student")
                   {
                       
                    $results=DB::select('SELECT date,text FROM `notification` WHERE dist = ? AND (user like "%Students%" OR user like "Students%" OR user like "%Students") AND school IN (SELECT s.school_name from student st INNER JOIN school s on (st.school_id=s.school_id) WHERE st.student_id=?) ', [$dist, $id]);	
                   }
                   else if($user == "Parent")
                   {
                    $results=DB::select('SELECT date,text FROM `notification` WHERE dist = ? AND (user like "%Parents%" OR user like "Parents%" OR user like "%Parents") AND school IN (SELECT s.school_name from follow f INNER JOIN school s on(f.toBeFollow=s.school_id) WHERE f.role = "school" AND f.parent_id = ?)',[$dist,$id]);
                   }
                    else if($user == "Community Member")
                   {
                       $results=DB::select('SELECT date,text FROM `notification` WHERE dist = ? AND (user like "%Community Members%" OR user like "Community Members%" OR user like "%Community Members") AND school IN (SELECT s.school_name from follow f INNER JOIN school s on(f.toBeFollow=s.school_id) WHERE f.role = "school" AND f.communityMember_id = ?)',[$dist,$id]);
                   }
                    else if($user == "Teacher")
                   {
                        $results=DB::select('SELECT date,text FROM `notification` WHERE dist = ? AND (user like "%Teachers%" OR user like "Teachers%" OR user like "%Teachers") AND school IN (SELECT s.school_name from teacher t INNER JOIN school s on (t.school_id=s.school_id) WHERE t.teacher_id = ?) ', [$dist, $id]);
                        
                   }
                    else if($user == "Principal")
                   {
                        $results=DB::select('SELECT date,text FROM `notification` WHERE dist = ? AND (user like "%Principals%" OR user like "Principals%" OR user like "%Principals") AND school IN (SELECT s.school_name from principal p INNER JOIN school s on (p.school_id=s.school_id) WHERE p.principal_id = ?) ', [$dist, $id]);
                        
                   }
			
			    
			       else 
			       {
			       $status="false" ;   
			       return response()->json(["status"=>$status,"message"=>"Incorrect role"], 404);
			       }
			    
			    
			    if($results)
			    {
			     $status="true";   
			       return response()->json(["status"=>$status,"notification_details"=>$results,"message"=>"Success"], 200);
			    }
			    else
			    {
			       $status="true";   
			       return response()->json(["status"=>$status,"notification_details"=>$results,"message"=>"No notifications yet"], 200); 
			    }
			    
}		


//--------------------------------------IOS APP FEEDBACK API ------------------------------------------------------------------------------------------

	public function feedbackApp(Request $request) {
			   $results=null;
			   $comment=$request->comment;
			   $status="";
			  
				$results=DB::insert('INSERT INTO `appfeedback`(`comment`) VALUES (?)', [$comment]);
				
			        if ($results){
			         $status="true";   
			         return response()->json(["status"=>$status ,"message"=>"Feedback added successfully"], 200);
			        }
			    else {
			         $status="true";   
			         return response()->json(["status"=>$status ,"message"=>"Feedback not added"], 404);
			        
					  }
			}
			
			
			
//---------------------------------------------------------------- IOS TEACHER REPORTS SHOW ------------------------------------------------------------------


 public function teacherReportsList(Request $request) {
    
				$teacher_id=(int)$request->teacher_id;
				$status="";
				
				$results=DB::select('select * from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) where r.teacher_claim ="No Response" AND r.teacher_id = ? ', [$teacher_id]);		      
			    
			    if ($results){
			        
			        $check=DB::select('select * from `reportabsence`  where positiveCount >= negativeCount AND attendance_status = "absent" AND teacher_claim ="No Response" AND resolve ="no" AND notification_status ="expired" AND teacher_id = ?', [$teacher_id]);
			        
			        if($check)
			        {
			            $check2=DB::select('select reportAbsence_id,reportAbsence_date from `reportabsence`  where positiveCount >= negativeCount AND attendance_status = "absent" AND teacher_claim ="No Response" AND resolve ="no" AND notification_status ="expired" AND teacher_id = ? ORDER BY reportAbsence_date DESC ', [$teacher_id]);
			        
			        $status="true";   
			        return response()->json(["status"=>$status,"notification_details"=>$check2,"message"=>"Success"], 200);
			        }
			        else
			        {
			         $status="true";   
			         return response()->json(["status"=>$status,"notification_details"=>$check2,"message"=>"No notifications yet"], 200);   
			        }
			        
			        
			        }
			    else {
			         $status="true";   
			         return response()->json(["status"=>$status,"notification_details"=>$check2,"message"=>"No notifications yet"], 200);
					 }
			}


//----------------------------------------------------------------IOS TEACHER RESPONSE API -------------------------------------------------------------------


	public function teacherResponse(Request $request) {
				$teacher_id=(int)$request->teacher_id;
				$reportAbsence_id=(int)$request->reportAbsence_id;
				$teacher_claim=$request->teacher_claim;
				$teacher_dispute=null;
				$id =null;
				$teacher_absence=null;
				$status="";
				
				 $checkTeacher=DB::select('select * from `reportabsence`  where teacher_id = ? AND reportAbsence_id =?',[$teacher_id,$reportAbsence_id]);
				 if($checkTeacher)
				 {
				    if($teacher_claim !="Teacher Negated Absence"){
				                       $result=DB::select('select teacher_absence from `teacher`  where teacher_id = ?',[$teacher_id]);
			                           foreach ($result as $results) {
                                       $teacher_absence = $results->teacher_absence;
                                       }
			                           $teacher_absence=(int)$teacher_absence+1;
			                           $update=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_absence' =>$teacher_absence));  
				    }
				
				    $query=DB::table('reportabsence')->where('teacher_id',$teacher_id)->where('reportAbsence_id', $reportAbsence_id)->update(array('teacher_claim' =>$teacher_claim,'attendance_status'=>"absent"));
				    if ($query){
			                   $check=DB::select('select *  from reportabsence where teacher_claim = "Teacher Negated Absence" AND positiveCount >= negativeCount AND resolve = "no" AND teacher_id = ?',[$teacher_id]);
			                   if($check){
			                             $result=DB::select('select teacher_dispute from `teacher`  where teacher_id = ?',[$teacher_id]);
			                             foreach ($result as $results) {
                                         $teacher_dispute = $results->teacher_dispute;
                               }
			                   $teacher_dispute=(int)$teacher_dispute+1;
			                   $update=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_dispute' =>$teacher_dispute));

			                
			        }
			        
			         $status="true";   
			         return response()->json(["status"=>$status,"message"=>"teacher claim inserted"], 200);
			        }
			    else {
			         $status="true";   
			         return response()->json(["status"=>$status,"message"=>"teacher claim not inserted"], 400);
					 }
 
				 }
				 else
				 {
				     $status="false";   
			         return response()->json(["status"=>$status,"message"=>"Incorrect teacher"], 400);
				 }
				
	}

	
//--------------------------------------------------------------------------IOS CONFLICTS TEACHER NAMES API----------------------------------------------------
public function conflictTeacherNames(Request $request)
      {
          
       $principal_id=(int)$request->principal_id;
       $status="";
       
       $teacher=DB::select('select distinct t.teacher_id , t.teacher_firstName,t.teacher_lastName from  
       principal p inner join school s on (p.school_id=s.school_id) 
       inner join teacher t on (t.school_id=s.school_id) 
       inner join reportabsence r on(r.teacher_id=t.teacher_id) where t.teacher_dispute >=3 AND r.resolve="no" AND r.attendance_status ="absent" AND p.principal_id =?',[$principal_id]);
       
       if ($teacher){
			        $status="true";   
			        return response()->json(["status"=>$status,"teacher_list"=>$teacher,"message"=>"Success"], 200); 
			        }
			    else {
			         $status="true";   
			         return response()->json(["status"=>$status,"teacher_list"=>$teacher,"message"=>"No conflicts yet"], 200); 
					 }
       
       
       
      }
			
//---------------------------------------------------------------------------IOS CONFLICTS LIST API ---------------------------------------------------------
  public function conflictsList(Request $request)
      {
          
        $teacher_id=(int)$request->teacher_id;
        $status="";
        $teacher=DB::select('select  t.teacher_id , t.teacher_firstName,t.teacher_lastName , r.reportAbsence_date, r.reportAbsence_id from  teacher t
       
        inner join reportabsence r on (r.teacher_id=t.teacher_id) where t.teacher_dispute >=3 AND r.positiveCount > r.negativeCount AND r.attendance_status ="absent" AND t.teacher_id =?',[$teacher_id]);
       
        if ($teacher){
			        $status="true";   
			        return response()->json(["status"=>$status,"conflicts_list"=>$teacher,"message"=>"Success"], 200); 
			        }
			    else {
			         $status="true";   
			         return response()->json(["status"=>$status,"teacher_list"=>$teacher,"message"=>"No conflicts yet"], 200);
					 }
       
      }
      
      
//-------------------------------------------------------------------------CONFLICT RESPONSE -----------------------------------------------------------------


public function conflictResponse(Request $request)
      {
          
       $reportAbsence_id=(int)$request->reportAbsence_id;
       $teacher_id=(int)$request->teacher_id;
       $principalResponse=$request->principalResponse;
       $teacher_absence=null;
       $update1=null;
       $update2=null;
       $teacher_dispute=null;
       $status="";
       
       if($principalResponse=="present" || $principalResponse=="Present")
       {
          $result1=DB::table('reportabsence')->where('teacher_id',$teacher_id)->where('reportAbsence_id', $reportAbsence_id)->update(array('attendance_status' =>"present",'resolve'=>"yes"));
          $result=DB::select('select teacher_absence from `teacher`  where teacher_id = ?',[$teacher_id]);
			           foreach ($result as $results) {
                       $teacher_absence = $results->teacher_absence;
                          }
			                $teacher_absence=(int)$teacher_absence-1;
			                $update1=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_absence' =>$teacher_absence));
			                $dispute =DB::select('select teacher_dispute from `teacher`  where teacher_id = ?',[$teacher_id]);
			                foreach ($dispute as $results) {
                            $teacher_dispute = $results->teacher_dispute;
			                }
			                $teacher_dispute=(int)$teacher_dispute-1;
			                $update2=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_dispute' => $teacher_dispute));
       }
       
       
       
       
       
       if($principalResponse=="absent" || $principalResponse=="Absent")
       {
             $result1=DB::table('reportabsence')->where('teacher_id',$teacher_id)->where('reportAbsence_id', $reportAbsence_id)->update(array('attendance_status' =>"absent",'resolve'=>"yes"));
			                
			                $dispute =DB::select('select teacher_dispute from `teacher`  where teacher_id = ?',[$teacher_id]);
			                foreach ($dispute as $results) {
                            $teacher_dispute = $results->teacher_dispute;
			                }
			                $teacher_dispute=(int)$teacher_dispute-1;
			                $update2=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_dispute' => $teacher_dispute));
   
       }
       
           
       if ($update1 || $update2)
             {
                     $status="true";   
			         return response()->json(["status"=>$status,"message"=>"Conflict resolved"], 200);
			 }
	   else 
			 {
			         $status="false";   
			         return response()->json(["status"=>$status,"message"=>"Conflict not resolved"], 400);
			 }
       
       
      
          
      }
      
 
//.............................................................IOS USER ACCOUNT DELETE APP........................................................     
      public function userDeleteAccount(Request $request) {
			   
			   $results=null;
			   $password="DISABLED!@#$%&^%$#@#%*&^%#DFG^%$#@#%H}|";
			   $id=(int)$request->user_id;
			   $role=$request->user_role;
			   $status="";
			   
				if ($role=="Student")
				{
				$results=DB::table('student')->where('student_id',$id)->update(array(
					'student_password'		=>$password));
				}
				else if ($role=="Parent")
				{
                $results=DB::table('parent')->where('parent_id',$id)->update(array(
					'parent_password'		=>$password));		
				}
				
				else if ($role=="Community Member")
				{
                $results=DB::table('communitymember')->where('communityMember_id',$id)->update(array(
					'communityMember_password'		=>$password));			
				}
				else
            {      $status="false" ;   
			       return response()->json(["status"=>$status,"message"=>"Incorrect role"], 200);}

		      
			    if ($results){
			         $status="false" ;   
			       return response()->json(["status"=>$status,"message"=>"User deleted"], 200);
			        }
			    else {
			         $status="false" ;   
			         return response()->json(["status"=>$status,"message"=>"Incorrect credentials"], 404);
					 }
			}

//.............................................................IOS APP.........................................................
//.............................................................IOS APP.........................................................
           

//-------------------------------------------------------------------------------


//-------------------------------------------------------------------------------
			public function insertFeedbackTeacher(Request $request) {
			   $results=null;
			   
			   $type= $request->type;
			   $rating= (int)$request->rating;
			   $reviews=$request->reviews;
			   $feedback_date=$request->feedback_date;
			   $id=(int)$request->id;
			   $feedbackby_id=$request->feedbackby_id;
			   $role=$request->role;
				if ($role=="parent")
				{
				$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text`,`feedback_date` , `parent_id`) VALUES (?, ?, ?, ?, ?,?)', [$id, $type, $rating, $reviews,$feedback_date, $feedbackby_id]);
				}
				if ($role=="student")
				{
				$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text`,`feedback_date` , `student_id`) VALUES (?, ?, ?, ?,?, ?)', [$id, $type, $rating, $reviews,$feedback_date, $feedbackby_id]);
				}
				if ($role=="teacher")
				{
				$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text` ,`feedback_date`, `teacher_id`) VALUES (?, ?, ?, ?, ?,?)', [$id, $type, $rating, $reviews,$feedback_date, $feedbackby_id]);
				}
				if ($role=="community")
				{
				$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text` ,`feedback_date`, `communityMember_id`) VALUES (?, ?, ?,?, ?, ?)', [$id, $type, $rating, $reviews, $feedback_date,$feedbackby_id]);
				}
				if ($role=="principal")
				{
				$results=DB::insert('INSERT INTO `feedback`(`teacher_feedback_id`,  `feedback_type`, `feedback_rating`,`feedback_review_text` ,`feedback_date`, `principal_id`) VALUES (?, ?, ?, ?, ?,?)', [$id, $type, $rating, $reviews, $feedback_date,$feedbackby_id]);
				}
			      
			        if ($results){
			        return response()->json([
			            "message" => "Feedback inserted successfully",
			            "result" => $results
			        ], 200);
			        }
			    else {
			        return response()->json([
			            "message" => "Feedback not inserted"
			        ], 404);
			        
					  }
			}
			
//.............................................................................
//-------------------------------------------------------------------------------
			public function updatePercentage(Request $request) {
			   $results=null;
			   
			   $type= $request->type;
			   $id=(int)$request->id;
			   $percenatge= (int)$request->percentage;
			   
				if ($type=="teacher")
				{
				  $results=DB::update('UPDATE `teacher` SET `attendance_percentage` = ? WHERE teacher_id  = ?', [$percenatge,$id]);
  
				}
			
				else
				{
				   $results=DB::update('UPDATE `school` SET `attendance_percentage` = ? WHERE school_id  = ?', [$percenatge,$id]);  
				}
				
				if ($results){
			        return response()->json([
			            "message" => "percentage updated successfully",
			            "result" => $results
			        ], 200);
			        }
			    else {
			        return response()->json([
			            "message" => "percentage not updated"
			        ], 404);
			        
					  }
				
			}
			
//.............................................................................
//.............................................................................


			public function districtTimeTable(Request $request) {
			   $result=null;
			   $totalGazetted=null;
			   $totalAbsence=null;
			   $schedule=null;
			   $district=null;
			   $dist_id=(int)null;
			   $id=(int)$request->id;
			   $role=$request->role;
			   
			
				if ($role=="school")
				{
				    
				    
				 $district=DB::select('select dist_id from district d inner join school s on (d.dist_name=s.school_district) where s.school_id = ?', [$id]);	
				 foreach ($district as $results) {
                       $dist_id = $results->dist_id;
				 }
                 $schedule=DB::select('select session_start,session_end,summer_start,summer_end,winter_start,winter_end from schedule where dist_id = ?', [$dist_id]);
                 
                 $totalGazetted=DB::select('select COUNT(*) AS "Total Gazetted" FROM gazettedholidays  WHERE gazetted_day != "Sunday" AND gazetted_day != "sunday" AND gazetted_day != "Saturday" AND gazetted_day != "saturday" AND dist_id = ?', [$dist_id]);
                 
                 $totalAbsence=DB::select('SELECT SUM(teacher_absence) as "Total School Absence" FROM teacher t INNER JOIN school s on (t.school_id=s.school_id) WHERE s.school_id = ?', [$id]);
                       
				 

				    
				}
				if ($role=="teacher")
				{
				    
                 $district=DB::select('select dist_id from district d inner join teacher t on (d.dist_name=t.teacher_district) where t.teacher_id = ?', [$id]);	
				 foreach ($district as $results) {
                       $dist_id = $results->dist_id;
				 }
                 $schedule=DB::select('select session_start,session_end,summer_start,summer_end,winter_start,winter_end from schedule where dist_id = ?', [$dist_id]);
                 
                 $totalGazetted=DB::select('select COUNT(*) AS "Total Gazetted" FROM gazettedholidays  WHERE gazetted_day != "Sunday" AND gazetted_day != "sunday" AND gazetted_day != "Saturday" AND gazetted_day != "saturday" AND dist_id = ?', [$dist_id]);
                 
                 $totalAbsence=DB::select('SELECT teacher_absence as "Total Teacher Absence" , joining_date FROM teacher  WHERE teacher_id = ?', [$id]);
				    
				}
				
			      
			        if ($district){
			        return response()->json([
			            "Schedule" => $schedule,
			            "Total Gazetted" => $totalGazetted,
			            "Total Absence" => $totalAbsence
			        ], 200);
			        }
			    else {
			        return response()->json([
			            "message" => "Invalid id or role"
			        ], 404);
			        
					  }
			}
//.............................................................................


			public function insertFeedbackSchool(Request $request) {
			   $results=null;
			   $rating=(int)$request->rating;
			   $type= $request->type;
			   $reviews=$request->reviews;
			   $feedback_date=$request->feedback_date;
			   $id=(int)$request->id;
			   $feedbackby_id=$request->feedbackby_id;
			   $role=$request->role;
			
				if ($role=="parent")
				{
				$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`, `feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review`,`feedback_date` , `parent_id`) VALUES (?,? ,?, ?,?, ?)', [$id,$type, $rating, $reviews, $feedback_date,$feedbackby_id,]);
				}
				if ($role=="student")
				{
				$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`,`feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review` ,`feedback_date`, `student_id`) VALUES (?,?, ?,? ,?, ?)', [$id,$type, $rating, $reviews, $feedback_date,$feedbackby_id,]);
				}
				if ($role=="teacher")
				{
				$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`,`feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review`,`feedback_date` , `teacher_id`) VALUES (?,?, ?,?, ?, ?)', [$id, $type,$rating, $reviews,$feedback_date, $feedbackby_id,]);
				}
				if ($role=="community")
				{
				$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`, `feedback_type` ,`schoolFeedback_rating`,`schoolFeedback_review` ,`feedback_date`, `communityMember_id`) VALUES (?,? ,?,?, ?, ?)', [$id,$type, $rating, $reviews,$feedback_date, $feedbackby_id,]);
				}
				if ($role=="principal")
				{
				$results=DB::insert('INSERT INTO `schoolfeedback`(`school_id`,`feedback_type` , `schoolFeedback_rating`,`schoolFeedback_review`,`feedback_date` , `principal_id`) VALUES (?,? ,?,?, ?, ?)', [$id, $type,$rating, $reviews,$feedback_date ,$feedbackby_id,]);
				}
				
			      
			        if ($results){
			        return response()->json([
			            "message" => "Feedback inserted successfully",
			            "result" => $results
			        ], 200);
			        }
			    else {
			        return response()->json([
			            "message" => "Feedback not inserted"
			        ], 404);
			        
					  }
			}
//.............................................................................

			public function insertAppFeedback(Request $request) {
			   $results=null;
			   $comment=$request->comment;
			  
				$results=DB::insert('INSERT INTO `appfeedback`(`comment`) VALUES (?)', [$comment]);
				
			        if ($results){
			        return response()->json([
			            "message" => "Feedback inserted successfully",
			            "result" => $results
			        ], 200);
			        }
			    else {
			        return response()->json([
			            "message" => "Feedback not inserted"
			        ], 404);
			        
					  }
			}
//.............................................................................

            public function forgetPassword(Request $request) 
            {
               $newpassword="123456";
               $email="owaismohsin999@gmail.com";
			   
			   $mail = new PHPMailer(true);
			   try
			   {
			       $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                   $mail->isSMTP();                                            // Send using SMTP
                   $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                   $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                   $mail->Username   = 'khubaibwaheed1995@gmail.com';                     // SMTP username
                   $mail->Password   = 'Mergesort1994';                               // SMTP password
                   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                   $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                         //Recipients
                   $mail->setFrom('khubaibwaheed1995@gmail.com', 'School Provement');
                   $mail->addAddress($email);     // Add a recipient
                   // Attachments
                   
                   //    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                   //  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                   // Content
                   $mail->isHTML(true);                                  // Set email format to HTML
                   $mail->Subject = 'Forgot Password';
                   $mail->Body    = "<p> Your New Password is: $newpassword </p>" ;
                   $mail->send();
                   
                   
                  
			   }
			    catch (Exception $e) { }
			    
			    
			    if($mail->send())
			    {
			     return response()->json([
			            "message" => "mail sent"
			        ], 200);    
			    }
			    else
			    {
			        return response()->json([
			            "message" => "mail not sent"
			        ], 404); 
			    }
			   
			}
//.............................................................................
			public function studentSignup(Request $request) {
			  
			   $name=$request->student_anonymous_name;
			   $email= $request->student_email;
			   $password= $request->student_password;
			   $country_name= $request->country_name;
			   $school_id= $request->school_id;
			   $state= $request->student_state;
			   $dist_name= $request->dist_name;
			   $student_id=null;
			   
			   $checkAlready=DB::select('select * from student where student_email = ? ', [$email]);
			   if($checkAlready)
			   {
			       
			       
			    return response()->json([
			            "message" => "Email already exist"
			        ], 404);   
			   }
			   else{

			   $student_id=DB::table('student')->insertGetId(array('student_anonymous_name' =>$name ,
					'student_email'			=>$email,
					'student_password'		=>$password,
					'country_name'		    =>$country_name,
					'school_id'				=>$school_id,
					'student_state'			=>$state,
					'student_district'		        =>$dist_name));

			        if ($student_id){
			        	$results1=DB::insert('INSERT INTO `user`(`student_id`) VALUES (?)', [$student_id]);
			        	if ($results1){
			        return response()->json([
			            "message" => "Student Data inserted successfully",
			            "result" => $results1
			        ], 200);
			        	}
			    	}
			    else {
			        return response()->json([
			            "message" => "Student not inserted"
			        ], 404);
			                        
					  }
					  
			   }
			}
//.............................................................................
			public function parentSignup(Request $request) {
			  
			   $name=$request->parent_anonymous_name;
			   $email= $request->parent_email;
			   $password= $request->parent_password;
			   $country_name= $request->country_name;
			   $state= $request->parent_state;
			   $dist_name= $request->dist_name;
			   
			   $checkAlready=DB::select('select * from parent where parent_anonymous_name = ? ', [$name]);
			   if($checkAlready)
			   {
			    return response()->json([
			            "message" => "name already exist"
			        ], 404);   
			   }
			   else{
			   
			   $parent_id=DB::table('parent')->insertGetId(array('parent_anonymous_name' =>$name ,
					'parent_email'			=>$email,
					'parent_password'		=>$password,
					'country_name'		=>$country_name,
					'parent_state'			=>$state,
					'parent_district'		        =>$dist_name));

			        if ($parent_id){
			        	$results1=DB::insert('INSERT INTO `user`(`parent_id`) VALUES (?)', [$parent_id]);
			        	if ($results1){
			        return response()->json([
			            "message" => "parent Data inserted successfully",
			            "result" => $results1
			        ], 200);
			        	}
			    	}
			    else {
			        return response()->json([
			            "message" => "parent not inserted"
			        ], 404);
			                        
					  }
			   }
			}
//.............................................................................
			public function communitySignup(Request $request) {
			  
			   $name=$request->community_anonymous_name;
			   $email= $request->community_email;
			   $password= $request->community_password;
			  // $password= md5($password);
			   $country_name= $request->country_name;
			   
			   $state= $request->community_state;
			   $dist_name= $request->dist_name;
			   
			   $checkAlready=DB::select('select * from communitymember where communityMember_anonymous_name = ? ', [$name]);
			   if($checkAlready)
			   {
			    return response()->json([
			            "message" => "name already exist"
			        ], 404);   
			   }
			   else{
			   
			   
			   $community_id=DB::table('communitymember')->insertGetId(array('communityMember_anonymous_name' =>$name ,
					'communityMember_email'			=>$email,
					'communityMember_password'		=>$password,
					'country_name'		            =>$country_name,
					'communityMember_state'			=>$state,
					'communityMember_district'		=>$dist_name));

			        if ($community_id){
			        	$results1=DB::insert('INSERT INTO `user`(`communityMember_id`) VALUES (?)', [$community_id]);
			        	if ($results1){
			        return response()->json([
			            "message" => "community Data inserted successfully",
			            "result" => $results1
			        ], 200);
			        	}
			    	}
			    else {
			        return response()->json([
			            "message" => "community not inserted"
			        ], 404);
			                        
					  }
			   }
			}
//.............................................................................
            public function studentLogin(Request $request) {
		
			 $name=$request->student_anonymous_name;
			 $password= $request->student_password;
			 
			   	$followed=DB::select('select * from student s inner join follow f on (f.student_id=s.student_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and s.student_anonymous_name = ?', ['teacher', $name]);
				$results=DB::select('select distinct st.`student_id`, st.`student_anonymous_name`, st.`student_email`, st.`student_password`, st.`country_name`, st.`school_id`, st.`student_state`, st.`student_district`, sc.`school_id`, sc.`school_district`, sc.`school_name`, sc.`country_name`, sc.`school_state`, sc.`school_image` from student st inner join school sc on (st.school_id=sc.school_id) inner join teacher t on (t.school_id=sc.school_id) where student_anonymous_name = ? and student_password = ?', [$name, $password]);
				$schoolTeachers=DB::select('select t.`teacher_id`, t.`school_id`, t.`teacher_firstName`, t.`teacher_lastName`, t.`teacher_absence`, t.`teacher_email`, t.`teacher_password`, t.`teacher_state`, t.`country_name`, t.`teacher_shift`, t.`teacher_image`, t.`joining_date`, t.`teacher_district` from student st inner join school sc on (st.school_id=sc.school_id) inner join teacher t on (t.school_id=sc.school_id) where student_anonymous_name = ? and student_password = ?', [$name, $password]);
			    if ($results){
			       return response()->json([
			        'results' => $results,
                    'schoolTeachers' => $schoolTeachers,
                     'followed' => $followed
			        ]);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}

//.............................................................................
            public function testing(Request $request) {
		
			 $started="2020-02-10";
			 $end="2021-03-12";
			 $started = Carbon::parse($started);
			 $end = Carbon::parse($end);
			 $difference="";
			 $diff = $end->diff($started);
			 
             $difference = $diff->format('%m');
			 
			        return response()->json([$difference], 200);
					 
			}			
//.............................................................................

            public function studentFBLogin(Request $request) {
		
			 $email=$request->student_email;
			 
			 
			   	$followed=DB::select('select * from student s inner join follow f on (f.student_id=s.student_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and s.student_email = ?', ['teacher', $email]);
				$results=DB::select('select distinct st.`student_id`, st.`student_anonymous_name`, st.`student_email`, st.`student_password`, st.`country_name`, st.`school_id`, st.`student_state`, st.`student_district`, sc.`school_id`, sc.`school_district`, sc.`school_name`, sc.`country_name`, sc.`school_state`, sc.`school_image` from student st inner join school sc on (st.school_id=sc.school_id) inner join teacher t on (t.school_id=sc.school_id) where st.student_email = ? ', [$email]);
				$schoolTeachers=DB::select('select t.`teacher_id`, t.`school_id`, t.`teacher_firstName`, t.`teacher_lastName`, t.`teacher_absence`, t.`teacher_email`, t.`teacher_password`, t.`teacher_state`, t.`country_name`, t.`teacher_shift`, t.`teacher_image`, t.`joining_date`, t.`teacher_district` from student st inner join school sc on (st.school_id=sc.school_id) inner join teacher t on (t.school_id=sc.school_id) where st.student_email = ?', [$email]);
			    if ($results){
			       return response()->json([
			        'results' => $results,
                    'schoolTeachers' => $schoolTeachers,
                     'followed' => $followed
			        ]);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................
			public function parentLogin(Request $request) {
			 $name=$request->parent_anonymous_name;
			 $password= $request->parent_password;

				$results=DB::select('select  * from parent where parent_anonymous_name = ? and parent_password = ?', [$name, $password]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }

			}
//.............................................................................

            public function parentFBLogin(Request $request) {
			 $parent_email=$request->parent_email;
			 

				$results=DB::select('select  * from parent where parent_email = ? ', [$parent_email]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }

			}
//.............................................................................

	        public function principalLogin(Request $request) {
			 $email=$request->principal_name;
			 $password= $request->principal_password;
			 $password= md5($password);

				$results=DB::select('select * from principal p inner join school s on (p.school_id=s.school_id) where p.principal_email = ? and p.principal_password = ?', [$email, $password]);		      
			   $schoolTeachers=DB::select('select t.`teacher_id`, t.`school_id`, t.`teacher_firstName`, t.`teacher_lastName`, t.`teacher_absence`, t.`teacher_email`, t.`teacher_password`, t.`teacher_state`, t.`country_name`, t.`teacher_shift`, t.`teacher_image`, t.`joining_date`, t.`teacher_district` from principal p inner join school sc on (p.school_id=sc.school_id) inner join teacher t on (t.school_id=sc.school_id) where p.principal_email = ? and p.principal_password = ?', [$email, $password]);
			    if ($results){
			        return response()->json([
			            'results' => $results,
                    'schoolTeachers' => $schoolTeachers],200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }

			}
//.............................................................................

	        public function teacherLogin(Request $request) {
			 $email=$request->teacher_email;
			 $password= $request->teacher_password;
			 $password= md5($password);

				$results=DB::select('select * from teacher t inner join school s on (t.school_id=s.school_id) where teacher_email = ? and teacher_password = ?', [$email, $password]);	
				
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }

			}
			
//.............................................................................

            public function schoolAbsentTeacher(Request $request) {
			 
                $school_id=(int)$request->school_id;
				$results=DB::select('SELECT t.teacher_id, t.teacher_firstName ,t.teacher_lastName, r.teacher_claim, r.reportAbsence_date from  teacher t INNER JOIN reportabsence r on (t.teacher_id = r.teacher_id) WHERE r.attendance_status="absent" AND t.school_id = ? ORDER BY r.reportAbsence_date DESC',[$school_id]);	
				
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json($results, 200);
					 }

			}
//.............................................................................
            public function teacherAbsentList(Request $request) {
			 
                $teacher_id=(int)$request->teacher_id;
                
				$results=DB::select('SELECT t.teacher_id, t.teacher_firstName ,t.teacher_lastName, r.teacher_claim, r.reportAbsence_date from  teacher t INNER JOIN reportabsence r on (t.teacher_id = r.teacher_id) WHERE r.attendance_status="absent" AND t.teacher_id = ? ORDER BY r.reportAbsence_date DESC',[$teacher_id]);	
				
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json(["message" => "This teacher has no absent"], 404);
					 }

			}
//.............................................................................

            public function teacherList(Request $request) {
			 

				$results=DB::select('select * from teacher t inner join school s on (t.school_id=s.school_id)');	
				
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }

			}
//.............................................................................


            public function pushNotifications(Request $request) {
			 
                   $dist=$request->dist;
                   $school=$request->school;
                   $user=$request->user;
                   $string = null;
                   $contains=null;
                   
                   	
                   
                   
                   if($user == "Students")
                   {
                    $results=DB::select('SELECT * FROM `notification` WHERE dist = ? AND school = ? AND (user like "%Students%" OR user like "Students%" OR user like "%Students")', [$dist, $school]);	
                
                     
                   }
                   else if($user == "Parents")
                   {
                     $results=DB::select('SELECT * FROM `notification` WHERE dist = ? AND school = ? AND (user like "%Parents%" OR user like "Parents%" OR user like "%Parents")', [$dist, $school]);
                   }
                    else if($user == "Community Members")
                   {
                        $results=DB::select('SELECT * FROM `notification` WHERE dist = ? AND school = ? AND (user like "%Community Members%" OR user like "Community Members%" OR user like "%Community Members")', [$dist, $school]);
                   }
                    else if($user == "Teachers")
                   {
                        $results=DB::select('SELECT * FROM `notification` WHERE dist = ? AND school = ? AND (user like "%Teachers%" OR user like "Teachers%" OR user like "%Teachers")', [$dist, $school]);
                   }
                    else if($user == "Principals")
                   {
                        $results=DB::select('SELECT * FROM `notification` WHERE dist = ? AND school = ? AND (user like "%Principals%" OR user like "Principals%" OR user like "%Principals")', [$dist, $school]);
                   }
			
			    
			       else 
			       {
			       return response()->json(["message" => "Not valid role"], 404);
			       }
			    
			    
			    if($results)
			    {
			     return response()->json($results, 200);   
			    }
			    else
			    {
			      return response()->json(["message" => "No notification for you"], 404);  
			    }
			    

			}
//.............................................................................
			public function communityLogin(Request $request) {
			 $name=$request->community_anonymous_name;
			 $password= $request->community_password;

				$results=DB::select('select * from communitymember where communityMember_anonymous_name = ? and communityMember_password = ?', [$name, $password]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }

			}
//.............................................................................

	        public function communityFBLogin(Request $request) {
			 $email=$request->community_email;
			 

				$results=DB::select('select * from communitymember where communityMember_email = ? ', [$email]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }

			}
//.............................................................................
			public function studentProfileShow(Request $request) {
				$id=(int)$request->id;
				$results=DB::select('select * from student where student_id = ?', [$id]);	
			    if ($results){
			        $completedHabits=DB::select('select COUNT(*) as "total" from habitstatus where status = "completed" AND user_role = "student" AND user_id = ?',[$id]);
			        $totalFollowedSchools=DB::select('select count(st.student_id) as total from student st inner join follow f on (f.student_id=st.student_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and st.student_id = ?', ['school', $id]);
			        $totalFollowedTeachers=DB::select('select count(st.student_id) as total from student st inner join follow f on (f.student_id=st.student_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and st.student_id = ?', ['teacher', $id]);
			        return response()->json([
			        'Student details' => $results,
                    'Total completed Habits' => $completedHabits,
                    'Total Followed Schools'=>$totalFollowedSchools,
                    'Total Followed Teacher'=>$totalFollowedTeachers]);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................


        	public function teacherReviewShow(Request $request) {
				$id=(int)$request->id;
				$results=DB::select('select feedback_review_text,feedback_date, feedback_type from feedback where teacher_feedback_id = ?', [$id]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................

	        public function teacherReportNotification(Request $request) {
				$teacher_id=(int)$request->teacher_id;
				$report_id=(int)$request->report_id;
				$date=$request->date;
				$message="ALERT! There is an absence report against you on : Do you agree? ";
				
				error_reporting(-1);
                ini_set('display_errors', 'On');
 
                $firebase = new Firebase();
                $push = new Push();
 
                // // optional payload
                $payload = array();
                $payload['team'] = 'Pak';
                $payload['score'] = '5.6';

                $push->setTitle("Absences Reported");
                $push->setMessage($message);
                $push->setIsBackground(FALSE);
                $push->setPayload($payload);
 
                $json = $push->getPush();
                $response = $firebase->sendToTopic($teacher_id, $json);
        
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................

            public function reportAbsenceShow(Request $request) {
				
				$startDate=null;
				$teacher_id=null;
				$teacher_absence=null;
				$positive= null;
				$negative = null;
				$reportAbsence_id=null;
				$difference=null;
				$results=null;
				$myresult=null;
				
				$currentDate = $request->Date;
				$currentTime = $request->Time;
				$user_id = $request->id;
				$user_role=$request->userRole;
			   
			    $records = DB::select('select * from reportabsence r where r.notification_status ="active" ');
			    foreach ($records as $results) {
                       $time = $results->report_time;
                       $date = $results->reportAbsence_date;
                      
                       $time =  date("H:i:s", strtotime("$time"));
                       $currentTime =  date("H:i:s", strtotime("$currentTime"));
                      
                       $startDate = $date." ".$time;
                       $endDate = $currentDate." ".$currentTime;
                       
                       $startDate = Carbon::parse($startDate);
                       $endDate = Carbon::parse($endDate);
                       
                       $diff = $endDate->diff($startDate);
                       $difference = $diff->format('%a');
               
               if($difference >= 2)
               {
                  
                    $reportAbsence_id =  $results->reportAbsence_id;
                    $positive = $results->positiveCount;
                    $negative = $results->negativeCount;
                    $updateStatus=DB::update('UPDATE `reportabsence` SET `notification_status` = "expired" WHERE reportAbsence_id  = ?', [$reportAbsence_id]);
                    
                    if($positive >= $negative)
                    {
			        
			       // $reportAbsence_id =  $results->reportAbsence_id;
			        $result1=DB::update('UPDATE `reportabsence` SET `attendance_status` = "absent" WHERE  reportAbsence_id = ?', [$reportAbsence_id]);
			        $teacher = DB::select('select * from reportabsence  where  reportAbsence_id = ?', [$reportAbsence_id]);
			       
			        foreach ($teacher as $teachers)  { $teacher_id = $teachers->teacher_id; }
			       
			        $result2 =DB::select('select teacher_absence from `teacher`  where teacher_id = ?',[$teacher_id]);
			          
			           foreach ($result2 as $myresult)  { $teacher_absence = $myresult->teacher_absence; }
			               
			                $teacher_absence=(int)$teacher_absence+1;
			                $updateAbsence=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_absence' =>$teacher_absence));
	
                    }
                    else
                    {
                     $result1=DB::update('UPDATE `reportabsence` SET `attendance_status` = "present" WHERE  reportAbsence_id = ?', [$reportAbsence_id]);   
                    }
                   
                  
			   }
			}
			
			
			if($user_role == "community")
			{
			   	$myresult = DB::select('select * from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) INNER JOIN follow f on (f.toBeFollow = r.teacher_id) INNER JOIN communitymember c on (f.communityMember_id = c.communityMember_id) where r.notification_status ="active" AND f.role ="teacher" AND f.communityMember_id = ? ORDER BY r.reportAbsence_date DESC',[$user_id]);
			}
			
		else if ($user_role == "parent")
			{
			  $myresult = DB::select('select * from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) INNER JOIN follow f on (f.toBeFollow = r.teacher_id) INNER JOIN parent p on (f.parent_id = p.parent_id) where r.notification_status ="active"  AND f.role ="teacher" AND f.parent_id = ?  ORDER BY r.reportAbsence_date DESC',[$user_id]);  
			}
		else	if ($user_role == "student")
			{
			   	$myresult = DB::select('select * from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) INNER JOIN follow f on (f.toBeFollow = r.teacher_id) INNER JOIN student st on (f.student_id = st.student_id) where r.notification_status ="active"  AND f.role ="teacher" AND f.student_id = ?  ORDER BY r.reportAbsence_date DESC',[$user_id]);

			}
		else	if($user_role == "teacher")
			{
			 	$myresult = DB::select('select * from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) INNER JOIN follow f on (f.toBeFollow = r.teacher_id) INNER JOIN teacher te on (f.teacher_id = te.teacher_id) where r.notification_status ="active"  AND f.role ="teacher" AND f.teacher_id = ?  ORDER BY r.reportAbsence_date DESC',[$user_id]);
   
			}
		else	if ($user_role == "principal")
			{
			  $myresult = DB::select('select * from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) INNER JOIN follow f on (f.toBeFollow = r.teacher_id) INNER JOIN principal p on (f.principal_id = p.principal_id) where r.notification_status ="active"  AND f.role ="teacher" AND f.principal_id = ?  ORDER BY r.reportAbsence_date DESC',[$user_id]);
  
			}
			
		
			if ($myresult){
			        return response()->json($myresult, 200);
			        }
			    else {
			        return response()->json([$myresult], 404);
					 }
}


//.............................................................................
           public function teacherReportShow(Request $request) {
    
				$teacher_id=(int)$request->teacher_id;
				
				$results=DB::select('select * from reportabsence r inner join teacher t on (r.teacher_id=t.teacher_id) where r.teacher_claim ="No Response" AND r.teacher_id = ? ', [$teacher_id]);		      
			    
			    if ($results){
			        
			        $check=DB::select('select * from `reportabsence`  where positiveCount >= negativeCount AND attendance_status = "absent" AND teacher_claim ="No Response" AND resolve ="no" AND notification_status ="expired" AND teacher_id = ?', [$teacher_id]);
			        
			        if($check)
			        {
			            $check2=DB::select('select * from `reportabsence`  where positiveCount >= negativeCount AND attendance_status = "absent" AND teacher_claim ="No Response" AND resolve ="no" AND notification_status ="expired" AND teacher_id = ? ORDER BY reportAbsence_date DESC ', [$teacher_id]);
			         return response()->json([
			            "message" => "positive count is greater",
			            "result" => $check2
			        ], 200);   
			        }
			        else
			        {
			         return response()->json(["message" => "negative count is greater"], 200);     
			        }
			        
			        
			        }
			    else {
			        return response()->json([
			            "message" => "This teacher was never reported"
			        ], 404);
					 }
			}


//.............................................................................

           public function expireNotification(Request $request) {
    
				$reportAbsence_id=(int)$request->reportAbsence_id;
				$startDate = $request->start_date;
				$endDate = $request->current_date;
				
			    $startDate	=date("H:i:s", strtotime("$startDate"));
			    $endDate	=date("H:i:s", strtotime("$endDate"));
			    
			    
                $startDate = Carbon::parse('$startDate');
                $endDate = Carbon::parse('$endDate');
             
             // $date = Carbon::parse('$startDate');
                
                
                $diff = $startDate->diff($endDate);
               
               foreach ($diff as $results) {
                       $difference = $results['d'];
               }
               
               if($difference >= 2)
               {
                  $results=DB::update('UPDATE `reportabsence` SET `notification_status` = "expired" WHERE reportAbsence_id  = ?', [$reportAbsence_id]);
			      $result1=DB::update('UPDATE `reportabsence` SET `attendance_status` = "absent" WHERE positiveCount >= negativeCount AND reportAbsence_id = ?', [$reportAbsence_id]); 
			      			    
			      	if ($results)
			      	{
			         return response()->json("notification expired", 200); 
			        }
			        
			        else
			        {
			         return response()->json("notification not expired", 400);     
			        }
               }
               
               else
               return response()->json([
			     
			            "message" => "48 hours not passed"
			        ], 200);
				
				
				
			
			        		 
			}


//.............................................................................
     public function conflictsShow(Request $request)
      {
          
       $teacher_id=(int)$request->teacher_id;
       
       $teacher=DB::select('select  t.teacher_id , t.teacher_firstName,t.teacher_lastName , r.reportAbsence_date, r.reportAbsence_id from  teacher t
       
       inner join reportabsence r on (r.teacher_id=t.teacher_id) where t.teacher_dispute >=3 AND r.positiveCount > r.negativeCount AND r.attendance_status ="absent" AND t.teacher_id =?',[$teacher_id]);
       
       if ($teacher){
			        return response()->json([
			         
			            "Teacher conflicts" => $teacher
			        ], 200);
			        }
			    else {
			        return response()->json([$teacher], 404);
					 }
       
       
       
      }

//.............................................................................

public function conflictsName(Request $request)
      {
          
       $principal_id=(int)$request->principal_id;
       
       $teacher=DB::select('select distinct t.teacher_id , t.teacher_firstName,t.teacher_lastName from  
       principal p inner join school s on (p.school_id=s.school_id) 
       inner join teacher t on (t.school_id=s.school_id) 
       inner join reportabsence r on(r.teacher_id=t.teacher_id) where t.teacher_dispute >=3 AND r.attendance_status ="absent" AND p.principal_id =?',[$principal_id]);
       
       if ($teacher){
			        return response()->json([
			         
			            "Teacher names" => $teacher
			        ], 200); 
			        }
			    else {
			        return response()->json([$teacher], 404);
					 }
       
       
       
      }

//.............................................................................

 public function conflictsResolve(Request $request)
      {
          
       $reportAbsence_id=(int)$request->reportAbsence_id;
       $teacher_id=(int)$request->teacher_id;
       $principalResponse=$request->principalResponse;
       $teacher_absence=null;
       $update1=null;
       $update2=null;
       $teacher_dispute=null;
       
       if($principalResponse=="present" || $principalResponse=="Present")
       {
          $result1=DB::table('reportabsence')->where('teacher_id',$teacher_id)->where('reportAbsence_id', $reportAbsence_id)->update(array('attendance_status' =>"present"));
          $result=DB::select('select teacher_absence from `teacher`  where teacher_id = ?',[$teacher_id]);
			           foreach ($result as $results) {
                       $teacher_absence = $results->teacher_absence;
                          }
			                $teacher_absence=(int)$teacher_absence-1;
			                $update1=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_absence' =>$teacher_absence));
			                $dispute =DB::select('select teacher_dispute from `teacher`  where teacher_id = ?',[$teacher_id]);
			                foreach ($dispute as $results) {
                            $teacher_dispute = $results->teacher_dispute;
			                }
			                $teacher_dispute=(int)$teacher_dispute-1;
			                $update2=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_dispute' => $teacher_dispute));
       }
       
       
       
       
       
       if($principalResponse=="absent" || $principalResponse=="Absent")
       {
             $result1=DB::table('reportabsence')->where('teacher_id',$teacher_id)->where('reportAbsence_id', $reportAbsence_id)->update(array('attendance_status' =>$principalResponse));
			                
			                $dispute =DB::select('select teacher_dispute from `teacher`  where teacher_id = ?',[$teacher_id]);
			                foreach ($dispute as $results) {
                            $teacher_dispute = $results->teacher_dispute;
			                }
			                $teacher_dispute=(int)$teacher_dispute-1;
			                $update2=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_dispute' => $teacher_dispute));
   
       }
       
           
       if ($update1 || $update2)
             {
			        return response()->json(["message" => "teacher dispute updated"], 200);
			 }
	   else 
			 {
			        return response()->json(["message" => "teacher dispute not updated"],400);
			 }
       
       
      
          
      }

//.............................................................................
	public function teacherClaim(Request $request) {
				$teacher_id=(int)$request->teacher_id;
				$reportAbsence_id=(int)$request->reportAbsence_id;
				$teacher_claim=$request->teacher_claim;
				$teacher_dispute=null;
				$id =null;
				$teacher_absence=null;
				
				if($teacher_claim !="Teacher Negated Absence")
				{
				  $result=DB::select('select teacher_absence from `teacher`  where teacher_id = ?',[$teacher_id]);
			           foreach ($result as $results) {
                       $teacher_absence = $results->teacher_absence;
                          }
			                $teacher_absence=(int)$teacher_absence+1;
			                $update=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_absence' =>$teacher_absence));  
				}
				
				$query=DB::table('reportabsence')->where('teacher_id',$teacher_id)->where('reportAbsence_id', $reportAbsence_id)->update(array('teacher_claim' =>$teacher_claim  ));
				
        
			    if ($query){
			        
			         $check=DB::select('select *  from reportabsence where teacher_claim = "Teacher Negated Absence" AND positiveCount >= negativeCount AND resolve = "no" AND teacher_id = ?',[$teacher_id]);
			        
			        if($check)
			        {
			          $result=DB::select('select teacher_dispute from `teacher`  where teacher_id = ?',[$teacher_id]);
			           foreach ($result as $results) {
                       $teacher_dispute = $results->teacher_dispute;
                          }
			                $teacher_dispute=(int)$teacher_dispute+1;
			                $update=DB::table('teacher')->where('teacher_id',$teacher_id)->update(array('teacher_dispute' =>$teacher_dispute));

			                if($teacher_dispute>=3)
			                {
			                    $principle_id=DB::select('select principal_id from principal p inner join school s on (p.school_id=s.school_id) inner join teacher t on (t.school_id=s.school_id) where t.teacher_id =?',[$teacher_id]);
			                    $id = $principle_id->principal_id;
			                    sendTeacherClaimNotification($id);
			                }
			        }
			        
			        return response()->json(["message" => "teacher claim inserted"], 200);
			        }
			    else {
			        return response()->json(["message" => "teacher claim not inserted"], 400);
					 }
			}
			
			
			 public function sendTeacherClaimNotification($id)
    {
        $title="Teacher Absent conflicts raise ";
        $message="tap to resolve";
        error_reporting(-1);
        ini_set('display_errors', 'On');
 
        $firebase = new Firebase();
        $push = new Push();
 
        // // optional payload
        $payload = array();
        $payload['team'] = 'Pak';
        $payload['score'] = '5.6';

        $push->setTitle($title);
        $push->setMessage($message);
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);
 
            $json = $push->getPush();
            $response = $firebase->sendToTopic($id, $json);
        
        if ($response){
			        return response()->json([
			            "message" => "Notification sent successfully",
			            "response" => $response
			        ], 200);
			        }
			    else {
			        return response()->json([
			            "message" => "Notification not sent",
			        ], 404);
			        
					  }
    }
//.............................................................................

	public function checkVoting(Request $request) {
			    
			    
			    $user_id=(int)$request->voter_id;
			    $user_role=$request->voter_role;
			    
			    
			    $check=DB::select('select reportAbsence_id, reporter_id as "voter_id" , reporter_role as "voter_role" , vote_status from confirmreporter where reporter_id = ? AND reporter_role = ?', [$user_id,$user_role]);	
			    if($check){
			      return response()->json([
			         
			            "message" => "you have voted",
			            "result" => $check
			        ], 200); 
			    }
			    
			    else {
			        return response()->json([
			            "message" => "you have not voted"
			        ], 404);
			        
					  }
			    }
			
//.............................................................................


	public function schoolReviewShow(Request $request) {
				$id=(int)$request->id;
				$results=DB::select('select schoolFeedback_review , feedback_date from schoolfeedback where feedback_type = "Public" AND school_id = ?', [$id]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................
				public function studentSchoolChange(Request $request) {
			 	$country_name=$request->country_name;
			    $student_district= $request->student_district;
			    $school_id=(int)$request->school_id;
			    $id=(int)$request->student_id;
			   
			    $student_id=null;
			   
			    $student_id=DB::table('student')->where('student_id',$id)->update(array(
					'country_name'			=>$country_name,
					'student_district'		=>$student_district,
					'school_id'			=>$school_id));
			    
			    
			    if ($student_id){
			        	
			        return response()->json([
			            "message" => "Student school updated ",
			            "result" => $student_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "Student school not updated "
			        ], 404);
			                        
					  }
			     
			   }
				
//.............................................................................
				public function studentProfileUpdate(Request $request) {
			 	$name=$request->student_anonymous_name;
			   $email= $request->student_email;
			   $password= $request->student_password;
			   
			   
			   $id=(int)$request->id;
			   $student_id=null;
			   $checkAlready=DB::select('select * from student where student_anonymous_name = ? ', [$name]);
			   if($checkAlready)
			   {
			    $student_id=DB::table('student')->where('student_id',$id)->update(array(
					'student_email'			=>$email,
					'student_password'		=>$password));
			    if ($student_id){
			        	
			        return response()->json([
			            "message" => "Student data updated except already exsited name ",
			            "result" => $student_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "Select unique name"
			        ], 404);
			                        
					  }
			     
			   }
			   else{
			   
			   
				$student_id=DB::table('student')->where('student_id',$id)->update(array(
					'student_anonymous_name' =>$name ,
					'student_email'			=>$email,
					'student_password'		=>$password));
			        if ($student_id){
			        	
			        return response()->json([
			            "message" => "Student complete data updated ",
			            "result" => $student_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "Student not updated"
			        ], 404);
			                        
					  }
			   }
			}
//.............................................................................

	public function principalProfileUpdate(Request $request) {
			 
			   $email= $request->principal_email;
			   $password= $request->principal_password;
			   
			   $password= md5($password);
			   $id=(int)$request->id;
			   $principal_id=null;
			   
			   $checkAlready=DB::select('select * from principal where principal_email = ? ', [$email]);
			   if($checkAlready)
			   {
			       $principal_id=DB::table('principal')->where('principal_id',$id)->update(array(	'principal_password'		=>$password));
			        if ($principal_id){
			        	
			        return response()->json([
			            "message" => "Principal Data updated except existed email",
			            "result" => $principal_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "Select unique name"
			        ], 404);
			                        
					  }
			   }
			   else{
			   
				$principal_id=DB::table('principal')->where('principal_id',$id)->update(array(

					'principal_email'			=>$email,
					'principal_password'		=>$password));
			        if ($principal_id){
			        	
			        return response()->json([
			            "message" => "Principal Data updated successfully",
			            "result" => $principal_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "Principal not updated"
			        ], 404);
			                        
					  }
			   }
			}
//.............................................................................
public function principalProfileShow(Request $request) {
			    	$id=(int)$request->id;
				$results=DB::select('select * from principal where principal_id = ?', [$id]);		      
			    if ($results){
			        $completedHabits=DB::select('select COUNT(*) as "total" from habitstatus where status = "completed" AND user_role = "teacher" AND user_id = ?',[$id]);
			        $totalFollowedSchools=DB::select('select count(p.principal_id) as total from principal p inner join follow f on (f.parent_id=p.principal_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and p.principal_id = ?', ['school', $id]);
			        $totalFollowedTeachers=DB::select('select count(p.principal_id) as total from principal p inner join follow f on (f.principal_id=p.principal_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and p.principal_id = ?', ['teacher', $id]);
			        return response()->json([
			        'Principal details' => $results,
                    'Total completed Habits' => $completedHabits,
                    'Total Followed Schools'=>$totalFollowedSchools,
                    'Total Followed Teacher'=>$totalFollowedTeachers]);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//............................................................................. 


	public function teacherProfileUpdate(Request $request) {
			 	
			   $email= $request->teacher_email;
			   $password= $request->teacher_password;
			   $password= md5($password);
			  
			   $id=(int)$request->id;
			   $teacher_id=null;
			   
			    $checkAlready=DB::select('select * from teacher where teacher_email = ? ', [$email]);
			   if($checkAlready)
			   {
			       
			    $teacher_id=DB::table('teacher')->where('teacher_id',$id)->update(array('teacher_password' =>$password));
			        if ($teacher_id){
			        	
			        return response()->json([
			            "message" => "Teacher password updated except existed email",
			            "result" => $teacher_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "Select unique email"
			        ], 404);
			                        
					  }
			   }
			   else{
			   
				$teacher_id=DB::table('teacher')->where('teacher_id',$id)->update(array(
					
					'teacher_email'			    =>$email,
					'teacher_password'		    =>$password));
			        if ($teacher_id){
			        	
			        return response()->json([
			            "message" => "Teacher Data updated successfully",
			            "result" => $teacher_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "Teacher not updated"
			        ], 404);
			                        
					  }
			   }
			}
//.............................................................................

	public function teacherProfileShow(Request $request) {
			    	$id=(int)$request->id;
				$results=DB::select('select * from teacher where teacher_id = ?', [$id]);		      
			    if ($results){
			        $completedHabits=DB::select('select COUNT(*) as "total" from habitstatus where status = "completed" AND user_role = "teacher" AND user_id = ?',[$id]);
			        $totalFollowedSchools=DB::select('select count(t.teacher_id) as total from teacher t inner join follow f on (f.parent_id=t.teacher_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and t.teacher_id = ?', ['school', $id]);
			        $totalFollowedTeachers=DB::select('select count(t.teacher_id) as total from teacher t inner join follow f on (f.teacher_id=t.teacher_id) inner join teacher t2 on (f.toBeFollow=t2.teacher_id) where f.role = ? and t.teacher_id = ?', ['teacher', $id]);
			        return response()->json([
			        'Teacher details' => $results,
                    'Total completed Habits' => $completedHabits,
                    'Total Followed Schools'=>$totalFollowedSchools,
                    'Total Followed Teacher'=>$totalFollowedTeachers]);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//............................................................................. 


			public function parentProfileShow(Request $request) {
			    	$id=(int)$request->id;
				$results=DB::select('select * from parent where parent_id = ?', [$id]);		      
			    if ($results){
			        $completedHabits=DB::select('select COUNT(*) as "total" from habitstatus where status = "completed" AND user_role = "parent" AND user_id = ?',[$id]);
			        $totalFollowedSchools=DB::select('select count(p.parent_id) as total from parent p inner join follow f on (f.parent_id=p.parent_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and p.parent_id = ?', ['school', $id]);
			        $totalFollowedTeachers=DB::select('select count(p.parent_id) as total from parent p inner join follow f on (f.parent_id=p.parent_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and p.parent_id = ?', ['teacher', $id]);
			        return response()->json([
			        'Parent details' => $results,
                    'Total completed Habits' => $completedHabits,
                    'Total Followed Schools'=>$totalFollowedSchools,
                    'Total Followed Teacher'=>$totalFollowedTeachers]);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//............................................................................. 
			public function parentProfileUpdate(Request $request) {
			 	$name=$request->parent_anonymous_name;
			    $email= $request->parent_email;
			    $password= $request->parent_password;
			   
			   $id=(int)$request->id;
			   
			   $parent_id=null;
			   $checkAlready=DB::select('select * from parent where parent_anonymous_name = ? ', [$name]);
			   if($checkAlready)
			   {
			       $parent_id=DB::table('parent')->where('parent_id',$id)->update(array(
					'parent_email'			=>$email,
					'parent_password'		=>$password));
			       if ($parent_id){
			        	
			        return response()->json([
			            "message" => "parent data updated except already exsited name",
			            "result" => $parent_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "Select unique name"
			        ], 404);
			                        
					  }
			   }
			   else{
			 
				$parent_id=DB::table('parent')->where('parent_id',$id)->update(array(
					'parent_anonymous_name' =>$name ,
					'parent_email'			=>$email,
					'parent_password'		=>$password));
			        if ($parent_id){
			        	
			        return response()->json([
			            "message" => "parent Data updated successfully",
			            "result" => $parent_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "parent not updated"
			        ], 404);
			                        
					  }
			   }
			}
//.............................................................................
			public function communityProfileShow(Request $request) {
		     	$id=(int)$request->id;
				$results=DB::select('select * from communitymember where communityMember_id = ?', [$id]);		      
			    if ($results){
			        $completedHabits=DB::select('select COUNT(*) as "total" from habitstatus where status = "completed" AND user_role = "community" AND user_id = ?',[$id]);
			        $totalFollowedSchools=DB::select('select count(c.communityMember_id) as total from communitymember c inner join follow f on (f.communityMember_id=c.communityMember_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and c.communityMember_id = ?', ['school', $id]);
			        $totalFollowedTeachers=DB::select('select count(c.communityMember_id) as total from communitymember c inner join follow f on (f.communityMember_id=c.communityMember_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and c.communityMember_id = ?', ['teacher', $id]);
			        return response()->json([
			        'community details' => $results,
                    'Total Completed Habits' => $completedHabits,
                    'Total Followed Schools'=>$totalFollowedSchools,
                    'Total Followed Teacher'=>$totalFollowedTeachers]);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................
			public function communityProfileUpdate(Request $request) {
			 	$name=$request->community_anonymous_name;
			   $email= $request->community_email;
			   $password= $request->community_password;
			 
			   $id=(int)$request->id;
			    $communityMember_id=null;
			    $checkAlready=DB::select('select * from communitymember where communityMember_anonymous_name = ? ', [$name]);
			   if($checkAlready)
			   {
			      	$communityMember_id=DB::table('communitymember')->where('communityMember_id',$id)->update(array(
                     
					'communityMember_email'			=>$email,
					'communityMember_password'		=>$password));
					
			        if ($communityMember_id){
			        	
			        return response()->json([
			            "message" => "communityMember Data updated except already exsited name",
			            "result" => $communityMember_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "select unique name"
			        ], 404);
			                        
					  }
			   }
			   else{
			   
				$communityMember_id=DB::table('communitymember')->where('communityMember_id',$id)->update(array(
                     'communityMember_anonymous_name' =>$name ,
					'communityMember_email'			=>$email,
					'communityMember_password'		=>$password));
					
			        if ($communityMember_id){
			        	
			        return response()->json([
			            "message" => "communityMember Data updated successfully",
			            "result" => $communityMember_id
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "communityMember not updated"
			        ], 404);
			                        
					  }
			   }
			}
//.............................................................................

			public function insertFollow(Request $request, $id,$followerrole,$followby_id,$followbyrole) {
			    
			    
			    $id=(int)$id;
			    $followerrole=$followerrole;
			    $followby_id=$followby_id;
			    $followbyrole=$followbyrole;
			    
			
			  
		
				if ($followerrole=="parent")
				{
				$results=DB::insert('INSERT INTO `follow`(`parent_id`, `toBeFollow`,`role`) VALUES (?, ?, ?)', [$followby_id, $id, $followbyrole]);
				}
				if ($followerrole=="student")
				{
				$results=DB::insert('INSERT INTO `follow`(`student_id`, `toBeFollow`,`role`) VALUES (?, ?, ?)', [$followby_id, $id, $followbyrole]);
				}
				if ($followerrole=="teacher")
				{
				$results=DB::insert('INSERT INTO `follow`(`teacher_id`, `toBeFollow`,`role`) VALUES (?, ?, ?)', [$followby_id, $id, $followbyrole]);
				}
				if ($followerrole=="community")
				{
				$results=DB::insert('INSERT INTO `follow`(`communityMember_id`, `toBeFollow`,`role`) VALUES (?, ?, ?)', [$followby_id, $id, $followbyrole]);
				}
				if ($followerrole=="principal")
				{
				$results=DB::insert('INSERT INTO `follow`(`principal_id`, `toBeFollow`,`role`) VALUES (?, ?, ?)', [$followby_id, $id, $followbyrole]);
				}

			        if ($results){
			            
			        return response()->json([
			         
			            "message" => "Follow inserted successfully",
			            "result" => $results
			        ], 200);
			        }
			    else {
			        return response()->json([
			            "message" => "Follow not inserted"
			        ], 404);
			        
					  }
			}
//.............................................................................

	public function insertHabitStatus(Request $request) {
			    
			    $status=$request->status;
			    $starting_date=$request->starting_date;
			    $user_id=(int)$request->user_id;
			    $user_role=$request->user_role;
			    $habit_id=(int)$request->habit_id;
			    
			    $check=DB::select('select * from habitstatus where status="current" AND user_id = ? AND user_role = ?', [$user_id,$user_role]);	
			    if($check){
			      return response()->json([
			            "message" => "You have already one current habit"
			        ], 404);  
			    }
			    else{
				
				$results1=DB::insert('INSERT INTO `habitstatus`(`status`,`date`, `user_id`,`user_role`,`habit_id`) VALUES (?, ?, ?, ?,?)', [$status,$starting_date, $user_id, $user_role, $habit_id]);
				$results=DB::select('select id,name,info,date from habit where id = ?',[$habit_id]);
				
                    if ($results1){
			       return response()->json($results, 200);
			         
			        }
			    else {
			        return response()->json([
			            "message" => "not inserted"
			        ], 404);
			        
					  }
			    }
			}
//.............................................................................

	public function completeHabitStatus(Request $request) {
			    $completed_days=null;
			    $result1=null;
			    $status=$request->status;
			    $completed_date=$request->completed_date;
			    $user_id=(int)$request->user_id;
			    $user_role=$request->user_role;
			    $habit_id=(int)$request->habit_id;
			    $days=$request->days;
			    
			    if($days=="yes")
			    {
			       $result=DB::select('select completed_days from `habitstatus`  where user_id = ? AND user_role = ? AND habit_id = ?', [$user_id,$user_role,$habit_id]);
			    foreach ($result as $results) {
                    $completed_days= $results->completed_days;
                    }
			   
			    $completed_days=(int)$completed_days+1; 
			   
			    $query=DB::table('habitstatus')->where('user_id',$user_id)->where('user_role', $user_role)->where('habit_id', $habit_id)->update(array('completed_days' =>$completed_days ,'status'=>$status,'date'=>$completed_date ));
				 
			    }
			    
			    else
			    {
			    $query=DB::table('habitstatus')->where('user_id',$user_id)->where('user_role', $user_role)->where('habit_id', $habit_id)->update(array('status'=>$status,'date'=>$completed_date ));
			    }
			    
				
                    if ($query){
                       	$result1=DB::select('select h.id ,h.name,h.info,h.date,st.status,st.completed_days from habit h inner join habitstatus st on (h.id=st.habit_id) where st.status="complete" AND st.user_id = ? AND st.user_role = ?', [$user_id,$user_role]);		      
			       return response()->json(["Completed habits" => $result1], 200);
			        }
			    else {
			        
			        return response()->json([
			            "message" => "data not updated"
			        ], 404);
			        
					  }
			}
//.............................................................................
public function showUserHabits(Request $request) {
			    
			    $user_id=(int)$request->user_id;
			    $user_role=$request->user_role;
			 
				$current=DB::select('select h.id ,h.name,h.info,st.date ,st.status,st.completed_days from habit h inner join habitstatus st on (h.id=st.habit_id) where st.status="current" AND st.user_id = ? AND st.user_role = ?', [$user_id,$user_role]);		      
				$completed=DB::select('select h.id ,h.name,h.info,st.date,st.status,st.completed_days from habit h inner join habitstatus st on (h.id=st.habit_id) where st.status="complete" AND st.user_id = ? AND st.user_role = ?', [$user_id,$user_role]);		      
                    
                    if ($current || $completed){
			       return response()->json(["Current habit" => $current,"Completed habits" => $completed], 200);
			        }
			    else {
			        
			        return response()->json([
			            "message" => "not found any habit"
			        ], 404);
			        
					  }
			}
//.............................................................................

            public function showFollowedSchools(Request $request, $id, $role) {
			   $results=null;
			   $id=(int)$id;
			   $followerrole=$role;
				if ($followerrole=="parent")
				{
				$results=DB::select('select * from parent p inner join follow f on (f.parent_id=p.parent_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and p.parent_id = ?', ['school', $id]);
				}
				else if ($followerrole=="student")
				{
				$results=DB::select('select * from student st inner join follow f on (f.student_id=st.student_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and st.student_id = ?', ['school', $id]);
	
				}
				else if ($followerrole=="teacher")
				{
				$results=DB::select('select * from teacher t inner join follow f on (f.teacher_id=t.teacher_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and t.teacher_id = ?', ['school', $id]);
				}
				else if ($followerrole=="community")
				{
				$results=DB::select('select * from communitymember c inner join follow f on (f.communityMember_id=c.communityMember_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and c.communityMember_id = ?', ['school', $id]);
				}
				else if ($followerrole=="principal")
				{
				$results=DB::select('select * from principal p inner join follow f on (f.principal_id=p.principal_id) inner join school s on (f.toBeFollow=s.school_id) where f.role = ? and p.principal_id = ?', ['school', $id]);
				}
				else
            { $results="Enter valid Role";}

		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................
			public function showFollowedSchoolsTeachers(Request $request, $id) {
				$id=(int)$id;
				$results=DB::select('select * from school s inner join teacher t on (s.school_id=t.school_id) where s.school_id = ?', [$id]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................
            public function showFollowedTeacher(Request $request) {
			   
			   $results=null;
			   $id=(int)$request->id;
			   $followerrole=$request->role;
			 
				if ($followerrole=="parent")
				{
				$results=DB::select('select * from parent p inner join follow f on (f.parent_id=p.parent_id) inner join teacher t on (f.toBeFollow=t.teacher_id) inner join school s on (t.school_id = s.school_id) where f.role = ? and p.parent_id = ?', ['teacher', $id]);
				}
				if ($followerrole=="student")
				{
				$results=DB::select('select * from student s inner join follow f on (f.student_id=s.student_id) inner join teacher t on (f.toBeFollow=t.teacher_id) inner join school sc on (t.school_id = sc.school_id) where f.role = ? and s.student_id = ?', ['teacher', $id]);
	
				}
				if ($followerrole=="teacher")
				{
				$results=DB::select('select * from teacher t inner join follow f on (f.teacher_id=t.teacher_id) inner join teacher t2 on (f.toBeFollow=t2.teacher_id) inner join school s on (t.school_id = s.school_id) where f.role = ? and t.teacher_id = ?', ['teacher', $id]);
				}
				if ($followerrole=="community")
				{
				$results=DB::select('select * from communitymember c inner join follow f on (f.communityMember_id=c.communityMember_id) inner join teacher t on (f.toBeFollow=t.teacher_id) inner join school s on (t.school_id = s.school_id) where f.role = ? and c.communityMember_id = ?', ['teacher', $id]);
				}
				if ($followerrole=="principal")
				{
				$results=DB::select('select * from principal p inner join follow f on (f.principal_id=p.principal_id) inner join teacher t on (f.toBeFollow=t.teacher_id) inner join school s on (t.school_id = s.school_id) where f.role = ? and p.principal_id = ?', ['teacher', $id]);
				}

		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................
            public function showAbsenceList(Request $request, $id, $role) {
			   $results=null;
			   $id=(int)$id;
			   $role=$role;
				if ($role=="teacher")
				{
				$results=DB::select('select * from reportabsence where attendance_status = "absent" and teacher_id = ?', [$id]);
				}
				else if ($role=="school")
				{
                $results=DB::select('select * from reportabsence where attendance_status = "absent" and school_id = ?', [$id]);				
				}
				else
            { $results="Enter valid Role";}

		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................

 public function deleteAccount(Request $request) {
			   
			   $results=null;
			   $password="DISABLED!@#$%&^%$#@#%*&^%#DFG^%$#@#%H}|";
			   $id=(int)$request->id;
			   $role=$request->user_role;
			   
				if ($role=="student")
				{
				$results=DB::table('student')->where('student_id',$id)->update(array(
					'student_password'		=>$password));
				}
				else if ($role=="parent")
				{
                $results=DB::table('parent')->where('parent_id',$id)->update(array(
					'parent_password'		=>$password));		
				}
				
				else if ($role=="community")
				{
                $results=DB::table('communitymember')->where('communityMember_id',$id)->update(array(
					'communityMember_password'		=>$password));			
				}
				else
            { $results="Enter valid Role";}

		      
			    if ($results){
			        return response()->json([
			            "message" => "Account deleted",
			            "result" => $results
			        ], 200);
			        }
			    else {
			        return response()->json([
			            "message" => "Account not deleted",
			            "result" => $results
			        ], 200);
					 }
			}
//.............................................................................

 public function showAllHabit(Request $request,$role) {
			   $results=null;
			 
			   $Userrole=$role;
				if ($Userrole=="parent")
				{
				$results=DB::select('select id,name,info,date from habit where Parent = "true" ');
				}
				else if ($Userrole=="student")
				{
				$results=DB::select('select  id,name,info,date from habit where Student = "true" ');
	
				}
				else if ($Userrole=="teacher")
				{
				$results=DB::select('select id,name,info,date from habit where Teacher = "true" ');
				}
				else if ($Userrole=="community")
				{
				$results=DB::select('select id,name,info,date from habit where 	CommunityMember = "true" ');
				}
				else if ($Userrole=="principal")
				{
				$results=DB::select('select id,name,info,date from habit where 	Principal = "true" ');
				}
				else
            { $results="Enter valid Role";}

		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................
            public function showCountFollowedTeacher(Request $request) {
			   
			   $results=null;
			   $id=(int)$request->id;
			   $followerrole=$request->role;
			 
				if ($followerrole=="parent")
				{
				$results=DB::select('select count(p.parent_id) as total from parent p inner join follow f on (f.parent_id=p.parent_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and p.parent_id = ?', ['teacher', $id]);
				}
				if ($followerrole=="student")
				{
				$results=DB::select('select count(st.student_id) as total from student st inner join follow f on (f.student_id=st.student_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and st.student_id = ?', ['teacher', $id]);
	
				}
				if ($followerrole=="teacher")
				{
				$results=DB::select('select count(t.teacher_id) as total from teacher t inner join follow f on (f.teacher_id=t.teacher_id) inner join teacher t2 on (f.toBeFollow=t2.teacher_id) where f.role = ? and t.teacher_id = ?', ['teacher', $id]);
				}
				if ($followerrole=="community")
				{
				$results=DB::select('select count(c.communityMember_id) as total from communitymember c inner join follow f on (f.communityMember_id=c.communityMember_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and c.communityMember_id = ?', ['teacher', $id]);
				}
				if ($followerrole=="principal")
				{
				$results=DB::select('select count(p.principal_id) as total from principal p inner join follow f on (f.principal_id=p.principal_id) inner join teacher t on (f.toBeFollow=t.teacher_id) where f.role = ? and p.principal_id = ?', ['teacher', $id]);
				}

		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................
			public function reportAttendance(Request $request,$school_id, $id) {
				$school_id=(int)$school_id;
				$teacher_id=(int)$id;
			    $reportAbsence_date=$request->reportAbsence_date;
			    $reportAbsence_shift=$request->reportAbsence_shift;
				$reporter_id=(int)$request->reporter_id;
			    $reporter_role=$request->reporter_role;
			    $report_time=$request->report_time;
			    $attendance_status='pending';
                $teacher_claim='No Response';
                $notification_status='active';
                $resolve='no';
                
                
                $checkSameDate=DB::select('select * from `reportabsence` where reportAbsence_date = ? AND teacher_id = ? ', [$reportAbsence_date,$teacher_id]);
		 if($checkSameDate)
		{
			     return response()->json([
			            "message" => "Report is already submitted on this date for this teacher",
			        ], 200);   
	    }
			    
	else 
	    {
                
                
                $results1=DB::insert('INSERT INTO `reportabsence`( `reporter_id`,`reporter_role`,`teacher_id`, `school_id`, `reportAbsence_date`, `reportAbsence_shift`,`report_time`, `attendance_status`, `teacher_claim`,`resolve`, `positiveCount`, `negativeCount`,`notification_status`)
                                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)', [$reporter_id,$reporter_role,$teacher_id, $school_id, $reportAbsence_date,$reportAbsence_shift,$report_time,$attendance_status,$teacher_claim,$resolve,0,0,$notification_status]);
                
                
                
			        if ($results1){
			        return response()->json([
			            "message" => "Report submitted successfully",
			            "result" => $results1
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "Report Already Submitted Today"
			        ], 404);
			                        
					  }
	    }
			}
//.............................................................................
			public function reportSurvey(Request $request, $report_id, $choice,$reporter_id,$reporter_role) {
			    //0 for False not 1 or other for true
                $user_choice=(int)$choice;
			    $report_id=(int)$report_id;
			    $reporter_id=(int)$reporter_id;
			    $reporter_role=$reporter_role;
			     
			     $checkAlreadyVote=DB::select('select * from `confirmreporter` where reportAbsence_id = ? AND reporter_id = ? AND reporter_role = ?', [$report_id, $reporter_id, $reporter_role]);
		 if($checkAlreadyVote)
		{
			     return response()->json([
			            "message" => "Your vote Already Submitted for this report",
			        ], 200);   
	    }
			    
	else 
	    {
			    
			    if($user_choice)
			    {
			        $vote_status="yes";
			    $results1=DB::insert('INSERT INTO `confirmreporter`(`reportAbsence_id`, `reporter_id`,`reporter_role`,`vote_status`) VALUES (?, ?, ?,?)', [$report_id, $reporter_id, $reporter_role,$vote_status]);
			    $result=DB::select('select positiveCount from `reportabsence` r where r.reportAbsence_id = ?', [$report_id]);
			    foreach ($result as $results) {
                    $positiveCount= $results->positiveCount;
                    }
			   $positiveCount=(int)$positiveCount+1;    
			    $query=DB::table('reportabsence')->where('reportAbsence_id',$report_id)->update(array(
				'positiveCount' =>$positiveCount ,
					));
			    }
			    else
			    {
			        $vote_status="no";
			     $results1=DB::insert('INSERT INTO `confirmreporter`(`reportAbsence_id`, `reporter_id`,`reporter_role`,`vote_status`) VALUES (?, ?, ?,?)', [$report_id, $reporter_id, $reporter_role,$vote_status]);
			     $result=DB::select('select negativeCount from `reportabsence` r where r.reportAbsence_id = ?', [$report_id]);
			    foreach ($result as $results) {
                    $negativeCount= $results->negativeCount;
                    }
			    $negativeCount=(int)$negativeCount+1;
			    $query=DB::table('reportabsence')->where('reportAbsence_id',$report_id)->update(array(
					'negativeCount' =>$negativeCount ,
					));
			    }

			        if ($query){
			        	
			        return response()->json([
			            "message" => "vote Submitted successfully",
			            "result" => $query
			        ], 200);
			        }
			    	
			    else {
			        return response()->json([
			            "message" => "vote Not Submitted"
			        ], 404);
			                        
					  }
					  
					  
	    }		  
					  
			}
//.............................................................................

			public function showSchoolsTeachers(Request $request, $id) {
				$id=(int)$id;
				$results=DB::select('select * from school s inner join teacher t on (s.school_id=t.school_id) where s.school_id = ?', [$id]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json($results, 404);
					 }
			}
//.............................................................................
	public function showTeacherImage(Request $request) {
				
				$id=(int)$request->id;
				$results=DB::select('select teacher_id, teacher_image from  teacher  where teacher_id = ?', [$id]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................

			public function showAllSchools(Request $request) {
			    
			    $district=$request->district;
				$results=DB::select('SELECT s.school_id,s.school_name, s.country_name AS school_country , s.school_state,s.school_district,s.school_image,s.attendance_percentage ,ROUND(AVG(f.schoolFeedback_rating),1) AverageRating  , SUM(t.teacher_absence) as TotalAbsence FROM school s  LEFT JOIN schoolfeedback f on (s.school_id = f.school_id) LEFT JOIN teacher t on(s.school_id = t.school_id) where s.school_district=? GROUP BY s.school_id ',[$district]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................

public function showAllCountry(Request $request) {
				$results=DB::select('SELECT * from country');		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................

public function schoolFilterData(Request $request) {
				$results=DB::select('SELECT s.school_id,s.school_name , ROUND(AVG(f.schoolFeedback_rating),1) AverageRating  , SUM(t.teacher_absence) as TotalAbsence FROM school s INNER JOIN schoolfeedback f on (s.school_id = f.school_id) INNER JOIN teacher t on(s.school_id = t.school_id)  GROUP BY s.school_id');
			    
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................

	public function showAllDistricts(Request $request) {
	    
	    
				$results=DB::select('select * from district');		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................
public function showCountryDistricts(Request $request) {
	    
	                 $country_name=$request->country_name;
				$results=DB::select('select * from district where country_name =?',[$country_name]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([], 200);
					 }
			}
//.............................................................................
public function showDistrictSchools(Request $request) {
	    
	            $dist_name=$request->dist_name;
				$results=DB::select('select * from school where school_district =?',[$dist_name]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([], 200);
					 }
			}
//.............................................................................

			public function showAverageSchoolRating(Request $request,$school_id) {
				$results=DB::select('select ROUND(AVG(schoolFeedback_rating),1) as AverageRating from schoolfeedback where school_id=?',[$school_id]);
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................

			public function showAverageTeacherRating(Request $request,$teacher_feedback_id) {
				$results=DB::select('select ROUND(AVG(feedback_rating),1) as AverageRating from feedback where teacher_feedback_id=?',[$teacher_feedback_id]);		      
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................

	public function showCountTeacherRating(Request $request,$teacher_feedback_id) {
	  
	  $i=1;
	  $count;
	  $results=DB::select('select COUNT(feedback_rating) AS "Count", feedback_rating AS "STAR", teacher_feedback_id FROM feedback WHERE teacher_feedback_id = ? group by teacher_feedback_id , feedback_rating',[$teacher_feedback_id]);
			    	// while($i<6)
			        //{
			          //$results1=('select COUNT(feedback_rating) FROM feedback WHERE feedback_rating = ? group by feedback_rating' [$i]);
			          //if ($results1)
			          //{
			            //  $row=mysqli_fetch_row($results1);
                          //$count=$row[0];
                          //if(!$count>0)
                          //{
                            //  $star=$i;
                              //$count=0;
                          //}
			          //}
			          //$i++;
			        //}
			       
			    if ($results){
			        
			        return response()->json($results, 200);
			        
			        
			        }
			    else {
			        return response()->json([$results], 404);
					 }
				
			}
//.............................................................................

	public function showCountSchoolRating(Request $request,$school_id) {
	  
	  $results=DB::select('select COUNT(schoolFeedback_rating) AS "Count", schoolFeedback_rating AS "STAR", school_id FROM schoolfeedback WHERE school_id = ? group by school_id, schoolFeedback_rating',[$school_id]);
			    if ($results){
			        return response()->json($results, 200);
			        }
			    else {
			        return response()->json([$results], 404);
					 }
			}
//.............................................................................

			public function unfollow(Request $request,$id,$followby_id,$followbyrole,$followerrole) {
			    $id=(int)$id;
			    $followby_id=(int)$followby_id;
			    $results="Not run";
				if ($followerrole=="parent")
				{
				$results=DB::delete('delete from `follow` where `parent_id`=? and `toBeFollow`=? and `role`=?', [$followby_id, $id, $followbyrole]);
				$results="successfully";
				}
				if ($followerrole=="student")
				{
				$results=DB::delete('delete from `follow` WHERE `student_id`=? and `toBeFollow`=? and `role`=?', [$followby_id, $id, $followbyrole]);
				$results="successfully";
				}
				if ($followerrole=="teacher")
				{
				$results=DB::delete('delete from `follow` where `teacher_id`=? and `toBeFollow`=? and `role`=?', [$followby_id, $id, $followbyrole]);
				$results="successfully";
				}
				if ($followerrole=="community")
				{
				$results=DB::delete('delete from `follow` where `communityMember_id`=? and `toBeFollow`=? and `role`=?', [$followby_id, $id, $followbyrole]);
				$results="successfully";
				}
				if ($followerrole=="principal")
				{
				$results=DB::delete('delete from `follow` where `principal_id`=? and `toBeFollow`=? and `role`=? ', [$followby_id, $id, $followbyrole]);
				$results="successfully";
				}
               
			        if ($results){
			        return response()->json([
			            "message2" => "Follow",
			            "message" => "Follow Deleted successfully",
			            "result" => $results
			        ], 200);
			        }
			    else {
			        return response()->json([
			            "message" => "Follow not Deleted",
			        ], 404);
			        
					  }
			}
//.............................................................................
    
    //title=teacher name
    //topic is teacher id
    public function sendReportNotification(Request $request)
    {
        $title=$request->title;
        $message=$request->message;
        $id=(int)$request->id;    
   
        error_reporting(-1);
        ini_set('display_errors', 'On');
 
        $firebase = new Firebase();
        $push = new Push();
 
        // // optional payload
        $payload = array();
        $payload['team'] = 'Pak';
        $payload['score'] = '5.6';

        $push->setTitle($title);
        $push->setMessage($message);
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);
 
            $json = $push->getPush();
            $response = $firebase->sendToTopic($id, $json);
        
        if ($response){
			        return response()->json([
			            "message" => "Notification sent successfully",
			            "response" => $response
			        ], 200);
			        }
			    else {
			        return response()->json([
			            "message" => "Notification not sent",
			        ], 404);
			        
					  }
    }
}  

class Firebase {

    // sending push message to single user by firebase reg id
    public function send($to, $message) {
        $fields = array(
            'to' => $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // Sending message to a topic by topic name
    public function sendToTopic($to, $message) {
        $fields = array(
            'to' => '/topics/' . $to,
            'data' => $message,
        );
        return $this->sendPushNotification($fields);
    }

    // sending push message to multiple users by firebase registration ids
    public function sendMultiple($registration_ids, $message) {
        $fields = array(
            'to' => $registration_ids,
            'data' => $message,
        );

        return $this->sendPushNotification($fields);
    }

    // function makes curl request to firebase servers
    private function sendPushNotification($fields) {
        
        // require_once __DIR__ . '/config.php';

        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=' . 'AAAAk1SHP68:APA91bEV9e3n1bVi4nv2TLrvF8uPoJnKOMLmjLub7reVZD4SRoqZVRjt5_qPS6T2YK-GuB6cuacZ2w4Y-RxsRtsVjzZSHxnGCSrAzNYBWT8QSxaxVxhnvACCo9Xh5APd5v4_R0w2_-KQ',
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        return $result;
    }
}

class Push {

    // push message title
    private $title;
    private $message;
    private $image;
    // push message payload
    private $data;
    // flag indicating whether to show the push
    // notification or not
    // this flag will be useful when perform some opertation
    // in background when push is recevied
    private $is_background;

    function __construct() {
        
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function setImage($imageUrl) {
        $this->image = $imageUrl;
    }

    public function setPayload($data) {
        $this->data = $data;
    }

    public function setIsBackground($is_background) {
        $this->is_background = $is_background;
    }

    public function getPush() {
        $res = array();
        $res['data']['title'] = $this->title;
        $res['data']['is_background'] = $this->is_background;
        $res['data']['message'] = $this->message;
        $res['data']['image'] = $this->image;
        $res['data']['payload'] = $this->data;
        $res['data']['timestamp'] = date('Y-m-d G:i:s');
        return $res;
    }

}


?>