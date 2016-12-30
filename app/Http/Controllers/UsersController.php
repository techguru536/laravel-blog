<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsersRequest;
use App\User;

class UsersController extends Controller
{
  /**
   * Display the specified resource.
   */
  public function show(Request $request, User $user)
  {
    $posts = $user->posts()->orderBy('posted_at', 'desc')->limit(5)->get();
    $comments = $user->comments()->orderBy('posted_at', 'desc')->limit(5)->get();

    return view('users.show')->withUser($user)->withPosts($posts)->withComments($comments);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request, User $user)
  {
    $this->authorize('update', $user);

    return view('users.edit', $user)->withUser($user);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UsersRequest $request, User $user)
  {
      $this->authorize('update', $user);

      $user = Auth::user();

      $user->name = $request->input('name');
      $user->email = $request->input('email');

      if ( $request->input('password') != '')
      {
          $user->password = bcrypt($request->input('password'));
      }

      $user->save();

      return redirect()->route('users.show', $user)->withSuccess(trans('users.updated'));
  }
}
