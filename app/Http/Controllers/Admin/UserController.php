<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Notification;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(10);
        
       return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'company_studio_name' => 'required|string',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email',
            'poc_name' => 'required|string',
            'poc_number' => 'required|string',
            'user_pass' => 'required',
            'user_type' => 'required|numeric'
        ]);
         $input['name'] = $request->name;
         $input['last_name'] = $request->last_name;
         $input['company_studio_name'] = $request->company_studio_name;
         $input['phone_number'] = $request->phone_number;
         $input['email'] = $request->email;
         $input['user_type'] = $request->user_type;
         $input['poc_name'] = $request->poc_name;
         $input['poc_number'] = $request->poc_number;
         $input['password'] = bcrypt($request->user_pass);
         $input['email_verified_at']= date('Y/m/d H:i:s', time());

        //  dd( $input['email_verified_at']);

          

         // dd($input);
       $user =  User::create($input);

        return redirect()->route('admin.user.index')->with('success','user added successfully.');
    }

    public function update(Request $request, User $user)
    {
        
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'company_studio_name' => 'required|string',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email',
            'poc_name' => 'required|string',
            'poc_number' => 'string',
            'user_type' => 'required|numeric'
        ]);

          $user->name = $request->name;
          $user->last_name = $request->last_name;
          $user->company_studio_name = $request->company_studio_name;
          $user->email = $request->email;
          $user->phone_number = $request->phone_number;
          $user->poc_name = $request->poc_name;
          $user->poc_number = $request->poc_number;
          $user->user_type = $request->user_type;
          if(isset($request->user_pass)){
            $user->password =  bcrypt($request->user_pass);
          }
          
          $user->save();
          return redirect()->route('admin.user.index')->with('success','user updated successfully.');
       
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      return view('admin.user.edit',compact('user'));
    }

    public function approve($selecteduser)
    {
        $user = User::findOrFail($selecteduser);
        $user->email_verified_at = date('Y/m/d H:i:s', time());

        if(!isset($user->poc_name)){
          $user->poc_name = "Tania Guha";
          $user->poc_number = "+91 92255 55559";
        }
        
        $user->save();



      Notification::route('mail',$user->email)
      ->notify(new \App\Notifications\RegisterApproved($user->poc_name));

      return redirect()->route('admin.user.index')->with('success','User Account Approved');
    }
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
      return redirect()->route('admin.user.index')->with('success','user deleted successfully.');
    }
}
