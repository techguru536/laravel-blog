@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-3 mb-3">
    <div class="card">
      <div class="card-header">@lang('users.profile')</div>
      <div class="list-group list-group-flush">
        <a href="{{ route('users.edit', $user) }}" class="list-group-item {{ ($tab == 'profile') ? 'active' : '' }}">
          <i class="fa fa-user" aria-hidden="true"></i> @lang('users.profile')
        </a>

        <a href="{{ route('users.password', $user) }}" class="list-group-item {{ ($tab == 'security') ? 'active' : '' }}">
          <i class="fa fa-lock" aria-hidden="true"></i> @lang('users.security')
        </a>
      </div>
    </div>
  </div>

  <div class="col-md-9">
      @yield('main_content')
  </div>
</div>
@endsection
