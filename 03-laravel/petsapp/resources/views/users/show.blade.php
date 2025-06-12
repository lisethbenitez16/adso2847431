@extends('layouts.app')
@section('title', 'Create User')

@section('content')
@include('layouts.navbar')

<!-- Authentication -->
<h1 class="text 3xl pt-30 flex gap-2 items-center text-white font-bold mb-10 pb-2 border-b-2">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>
    Show User
</h1>
<div class="breadcrumbs text-sm text-white">
  <ul>
    <li><a href="{{ url('users')}}">User Module</a></li>
    <li><a>Create User</a></li>

  </ul>
</div>

<ul class="list bg-base-100 rounded-box shadow-md w-4/12">

     <!-- PHOTO -->
  <li class="list-row mx-auto">
      <div class="avatar">
            <div class="mask mask-squircle w-48  hover:scale-110 transition-transform">
                <img src="{{ asset('images/'.$user->photo) }}"/>
            </div>

        </div>
    </div>
  </li>

    <!-- DOCUMENT -->
  <li class="list-row">
    <div class="flex gap-4 items-center">
      <div class="font-bold w-24">Document</div>
      <div class="text-xs  font-semibold opacity-60">
        {{ $user->document }}
      </div>
    </div>
  </li>

  <!-- FULL NAME -->
  <li class="list-row">
    <div class="flex gap-4 items-center">
      <div class="font-bold w-24">FullName</div>
      <div class="text-xs  font-semibold opacity-60">
        {{ $user->fullname }}
      </div>
    </div>
  </li>

    <!-- GENDER -->
  <li class="list-row">
    <div class="flex gap-4 items-center">
      <div class="font-bold w-24">Gender</div>
      <div class="text-xs uppercase font-semibold opacity-60">
        {{ $user->document }}
      </div>
    </div>
  </li>

  <!-- GENDER -->
  <li class="list-row">
    <div class="flex gap-4 items-center">
      <div class="font-bold w-24">Birthdate</div>
      <div class="text-xs  font-semibold opacity-60">
        {{ $user->birthdate }}
      </div>
    </div>
  </li>

  <!-- PHONE -->
  <li class="list-row">
    <div class="flex gap-4 items-center">
      <div class="font-bold w-24">Phone</div>
      <div class="text-xs  font-semibold opacity-60">
        {{ $user->phone }}
      </div>
    </div>
  </li>

  <!-- EMAIL -->
  <li class="list-row">
    <div class="flex gap-4 items-center">
      <div class="font-bold w-24">Email</div>
      <div class="text-xs  font-semibold opacity-60">
        {{ $user->email }}
      </div>
    </div>
  </li>

  <!-- ROLE -->
  <li class="list-row">
    <div class="flex gap-4 items-center">
      <div class="font-bold w-24">Role</div>
      <div class="text-xs  font-semibold opacity-60">
        {{ $user->role }}
      </div>
    </div>
  </li>

</ul>


@endsection


