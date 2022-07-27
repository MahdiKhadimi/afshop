<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    // this function use to open login pages
    public function index()
    {
        return view('admin\admin_layout');
    }

    
    public function create()
    {   
        session()->put('page','admin.create');
        return view('admin.add');
    }

   public function list()
    {  

      session()->put('page','admin.list');      
      $admins = Admin::all();
      return view('admin.list',compact('admins'));

   }
   
    public function store(StoreadminRequest $request)
    {
       $admin = new admin();
       $admin->name = $request->name;
       $admin->email = $request->email;
       $admin->phone = $request->phone;
       $admin->type = $request->type;
       $admin->status = 1;
       $admin->remember_token = $request->_token;
       $admin->password = Hash::make($request->password);
       //upload image
       if($request->file('photo')){
            $file = time().$request->file('photo')->getClientOriginalName();
            $path=$request->file('photo')->move('images/admin',$file);
             $admin->photo = $path;
            
       }
     
     if($admin->save()){
         session()->flash('success','new admin had been successfully add');
         return redirect('admin/create');
     }

    }

  
    public function show(admin $admin)
    {
        //
    }

   
    public function edit(admin $admin)
    {
        //
    }

    // this use to checkPassword
    


    public function update(Request $request,$id=NUll)

 {
     // update user password
     if(isset($request->password)){
        $request->validate([
            'currentPassword'=>'required',
            'newPassword'=>'required',
            'confirmPassword'=>'required',
        ]); 
        if($request->isMethod('post')){
            $admin = admin::where('id',Auth::guard('admin')->user()->id)->first();
         
             if(Hash::check($request->currentPassword,$admin->password)){
                if($request->newPassword==$request->confirmPassword){
                    $result = Admin::where('id',$admin->id)
                    ->update([
                        'password'=>Hash::make($request->newPassword),
                    ]);
                    session()->flash('success','you have been successfully update your password');
                   return redirect()->back();
                }else{
                     session()->flash('error','do not match your password');
                   return redirect()->back();

                 }

             }else{
                session()->flash('error','current password incorrect!');
                return redirect()->back();

              

             }
                                    

        }

        
    }
       
        
    }

    public function updateDetail(Request $request, $id){
         // check image 
         $adminInfo = Admin::where('id',$id)->first();
      
            if(isset($request->photo)){
                if(!empty($adminInfo->photo)){
                   if($adminInfo->photo){
                   unlink($adminInfo->photo);
                     
                   }
                     
                 
                }
                $file = time().$request->file('photo')->getClientOriginalName();
                $photo = $request->file('photo')->move('images/admin',$file);
            }else{
                $photo = $adminInfo->photo;
            }
 
         //update admin table 
         $admin =  Admin::find($id);
         $admin->name = $request->name;
         $admin->email = $request->email;
         $admin->phone = $request->phone;
         $admin->type = $request->type;
         $admin->status = $request->status;
         $admin->remember_token = $request->_token;
         $admin->photo = $photo;
         if($admin->save()){  
             session()->flash('success','selected admin  has been successfully updated');
         }else{
             session()->flash('success','selected admin  has not been successfully updated');

         }
         return redirect()->back();
    

    }

    // delete function 
    public function delete(Request $request,$id)
    {
        $admin= Admin::findOrFail($id);
        if($admin){
            unlink($admin->photo);
            $admin->delete(); 
            session()->flash('success','Selected data has been successfully Deleted');

        }else{
            session()->flash('success','Selected data has not been successfully Deleted');
        }
       return redirect()->back();
                
    }


   // login function
  public function login(Request $request){

         
        

      if($request->isMethod('get')){
        return view('admin\login');

      }else{
         
        $request->validate([
            'email'=>'required|email|max:255',
            'password'=>'required',

        ],[
            'email.required'=>'please enter your email',
            'email.email'=>'please enter a correct email',
            'email.max'=>'your email is to long',
            'password.required'=>'please enter your password',
        ]);



          if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/admin');
          }else{
              session()->flash('error','Your email or password is incorrect');
              return redirect()->back();
              
          }

      }
      
    
 }


// logout function
public function logout(){

    
    Auth::guard('admin')->logout('');
    return redirect('admin/login');
}  

// this function use to change password 
public function setting(){

    
     return view('admin.admin_settings');
}


// this function use to check password




}
