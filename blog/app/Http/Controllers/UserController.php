<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(('admin.user.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:225',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
        ]);

        // if($request->hasFile('image')){
        //     $image = $request->image;
        //     $image_new_name = time() . '.' . $image->getClientOriginalExtension();
        //     $image->move('storage/user/', $image_new_name);
        //     $user->image = '/storage/user/' . $image_new_name;
        //     $user->save();
        // }

        Session::flash('success', 'User created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:225',
            'email' => "required|email|unique:users,email, $user->id",
            'password' => 'sometimes|nullable|min:8',
        ]);
         
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->slug = Str::slug($request->name, '-');
        $user->description = $request->description;
        $user->save();
        Session::flash('success', 'user updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user) {
            $user->delete();
            Session::flash('success', 'user deleted successfully');
            return redirect()->route('user.index');
        }
    }

    public function profile()
    {  
        $user = auth()->user();
        return view(('admin.user.profile'), compact('user'));
    }

    public function profile_update(Request $request)
    {  
        $user = auth()->user();

        $this->validate($request, [
            'name' => 'required|string|max:225',
            'email' => "required|email|unique:users,email, $user->id",
            'password' => 'sometimes|nullable|min:8',
            'image' => 'sometimes|nullable|image|max:2048',
        ]);
         
        $user->name = $request->name;
        $user->email = $request->email;
        $user->slug = Str::slug($request->name, '-');
        $user->description = $request->description;

        if($request->has('password') && $request->password != null && $request->password != "") {
            $user->password = Hash::make($request->password);
        }

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/user/', $image_new_name);
            $user->image = '/storage/user/' . $image_new_name;
            $user->save();
        }
        $user->save();
        Session::flash('success', 'user updated successfully');
        return redirect()->back();
    }

}
