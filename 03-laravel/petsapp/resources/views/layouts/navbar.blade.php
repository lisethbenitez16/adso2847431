<div class="navbar bg-[#fff3] shadow-sm text-white absolute top-0">
    <div class="flex-1">
        <a class="btn btn-ghost text-xl" href="{{ url('/') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </a>
    </div>
    <div class="flex-none">
        @guest

            <ul class="menu menu-horizontal px-1">
                <li>
                    <a href="{{ route('login') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        Login
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Register
                    </a>
                </li>
            </ul>
        @endguest

        @auth
            <ul class="flex items-center gap-2">
                <li>
                    <div class="avatar">
                        <div class="mask mask-squircle w-14">
                            <img src="{{ asset('images/' . Auth::user()->photo) }}" />
                        </div>
                </div>
                </li>

                <li>
                    <span class="badge text-white border-cyan-800 bg-cyan-800">Admin:
                        {{ Auth::user()->fullname}}</span>
                </li>



                <li>
                    <details class="dropdown dropdown-end">
                        <summary class="btn text-white bg-[#fff0] border-[#fff0] shadow-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>

                        </summary>
                        <ul class="menu dropdown-content bg-cyan-600 rounded-box z-1 w-52 p-2 shadow-sm">
                            @if (Auth::user()->role == 'Admin')

                                <li>
                                    <a href="{{ url('users') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                        </svg>
                                        Users
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('pets') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 63.445 63.445"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M21.572,28.926c5.067,0,9.19-5.533,9.19-12.334s-4.123-12.334-9.19-12.334c-5.067,0-9.19,5.533-9.19,12.334 S16.504,28.926,21.572,28.926z M21.572,7.258c3.355,0,6.19,4.275,6.19,9.334s-2.834,9.334-6.19,9.334 c-3.356,0-6.19-4.275-6.19-9.334S18.216,7.258,21.572,7.258z">
                                                        </path>
                                                        <path
                                                            d="M48.83,40.922c-0.189-0.256-0.37-0.498-0.466-0.707c-2.054-4.398-7.689-9.584-16.813-9.713L31.2,30.5 c-8.985,0-14.576,4.912-16.813,9.51c-0.077,0.156-0.247,0.361-0.427,0.576c-0.212,0.254-0.423,0.512-0.604,0.793 c-1.89,2.941-2.853,6.25-2.711,9.318c0.15,3.26,1.512,5.877,3.835,7.369c0.937,0.604,1.95,0.907,3.011,0.907 c2.191,0,4.196-1.233,6.519-2.664c1.476-0.907,3.002-1.848,4.698-2.551c0.191-0.063,0.968-0.158,2.241-0.158 c1.515,0,2.6,0.134,2.833,0.216c1.653,0.729,3.106,1.688,4.513,2.612c2.154,1.418,4.188,2.759,6.395,2.759 c0.947,0,1.867-0.248,2.732-0.742c4.778-2.715,5.688-10.162,2.03-16.603C49.268,41.52,49.048,41.219,48.83,40.922z M45.939,55.838 c-0.422,0.238-0.818,0.35-1.25,0.35c-1.308,0-2.9-1.049-4.746-2.264c-1.438-0.947-3.066-2.02-4.949-2.852 c-0.926-0.41-2.934-0.472-4.046-0.472c-1.629,0-2.76,0.128-3.362,0.375c-1.943,0.808-3.646,1.854-5.149,2.779 c-1.934,1.188-3.604,2.219-4.946,2.219c-0.49,0-0.931-0.137-1.389-0.432c-1.483-0.953-2.356-2.724-2.461-4.984 c-0.113-2.45,0.682-5.135,2.238-7.557c0.113-0.177,0.25-0.334,0.383-0.492c0.274-0.328,0.586-0.701,0.823-1.188 c1.84-3.781,6.514-7.82,14.115-7.82l0.308,0.002c7.736,0.109,12.451,4.369,14.137,7.982c0.225,0.479,0.517,0.875,0.773,1.223 c0.146,0.199,0.301,0.4,0.426,0.619C49.684,48.326,49.279,53.939,45.939,55.838z">
                                                        </path>
                                                        <path
                                                            d="M41.111,28.926c5.068,0,9.191-5.533,9.191-12.334S46.18,4.258,41.111,4.258c-5.066,0-9.189,5.533-9.189,12.334 S36.044,28.926,41.111,28.926z M41.111,7.258c3.355,0,6.191,4.275,6.191,9.334s-2.834,9.334-6.191,9.334 c-3.355,0-6.189-4.275-6.189-9.334S37.756,7.258,41.111,7.258z">
                                                        </path>
                                                        <path
                                                            d="M56.205,22.592c-4.061,0-7.241,4.213-7.241,9.59c0,5.375,3.181,9.588,7.241,9.588s7.24-4.213,7.24-9.588 C63.445,26.805,60.266,22.592,56.205,22.592z M56.205,38.77c-2.299,0-4.241-3.018-4.241-6.588c0-3.572,1.942-6.59,4.241-6.59 s4.24,3.018,4.24,6.59C60.445,35.752,58.503,38.77,56.205,38.77z">
                                                        </path>
                                                        <path
                                                            d="M14.482,32.182c0-5.377-3.181-9.59-7.241-9.59S0,26.805,0,32.182c0,5.375,3.181,9.588,7.241,9.588 S14.482,37.557,14.482,32.182z M7.241,38.77C4.942,38.77,3,35.752,3,32.182c0-3.572,1.942-6.59,4.241-6.59 c2.299,0,4.241,3.018,4.241,6.59C11.482,35.752,9.54,38.77,7.241,38.77z">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>

                                        Pets
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('adoptions') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>

                                        Adoptions
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M20.25 3.75v4.5m0-4.5h-4.5m4.5 0-6 6m3 12c-8.284 0-15-6.716-15-15V4.5A2.25 2.25 0 0 1 4.5 2.25h1.372c.516 0 .966.351 1.091.852l1.106 4.423c.11.44-.054.902-.417 1.173l-1.293.97a1.062 1.062 0 0 0-.38 1.21 12.035 12.035 0 0 0 7.143 7.143c.441.162.928-.004 1.21-.38l.97-1.293a1.125 1.125 0 0 1 1.173-.417l4.423 1.106c.5.125.852.575.852 1.091V19.5a2.25 2.25 0 0 1-2.25 2.25h-2.25Z" />
                                        </svg>


                                        Make Adoptions
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            strokeWidth={1.5} stroke="currentColor" className="size-6">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>

                                        My Adoptions
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                                        </svg>


                                        My Account
                                    </a>
                                </li>

                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        Log Out
                                    </a>
                                </form>

                            </li>
                        </ul>
                    </details>
                </li>
            </ul>
        @endauth

    </div>
</div>
