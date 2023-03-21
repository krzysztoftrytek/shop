<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\Address;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('users.update',[
            'user'=> $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(StoreUserRequest $request, User $user )
    {
        $validated = $request->validated()['address'];
        if ($user->hasAddress()){
            $address = $user->address;
            $address->fill($validated);
        }else{
             $address = $user->address()->save(new Address($validated));
        }
        $user->address()->save($address);

     return redirect('/admin/users')->with('success','User has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users')->with("success","user deleted sucessfully");
    }
    public function search(Request $request){
        $query = $request->query('search');
        $user = User::where('name', 'like', '%'.$query.'%')->get();
        return view('users.index',[
            'users' => $user,
        ]);
    }
}
