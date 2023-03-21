<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('shop.account', [
            'user' => $user
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('shop.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AccountUpdateRequest $request, User $user)
    {
        $personal = collect(($request['personal']));
        $address = collect(($request['address']));

        $personal_array = $personal->filter(function ($item){
            return $item;
        });
        $address_array = $address->filter(function ($item){
            return $item;
        });

        $address = $user->address;
        $address->fill($address_array->all());
        $user->address()->save($address);

        $user->fill($personal_array->all());
        $user->save($personal_array->all());

        return redirect()->route('shop.account', $user->id)->with("success"," Account updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
