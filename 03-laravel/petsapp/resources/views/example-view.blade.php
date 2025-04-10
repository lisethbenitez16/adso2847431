<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
</head>

<body>
    <h1 class="text-4xl text-center my-10">{{$title}}</h1>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Breed</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($pets as $pet)

                    <tr class="hover:bg-base-300">
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle h-12 w-12">
                                        <img src="{{ asset('images/'.$pet->image)}}"
                                            alt="{{ $pet->name}}" />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">{{ $pet->name}}</div>

                                    @if ($pet->kind == 'Dog')
                                    <div class="badge badge-dash badge-primary">{{ $pet->kind}}🐶</div>
                                        
                                    @else
                                    <div class="badge badge-dash badge-info">{{ $pet->kind}}😺</div>
                                    @endif

                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-ghost badge-sm">{{ $pet->breed }}</span>
                        </td>
                        <td>{{ $pet->location }}</td>
                        <td>
                            <a href="{{url('show/pet/'.$pet->id)}}" class="btn btn-sm btn-outline btn-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                  </svg>
                                  
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!-- foot -->
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Breed</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>

</html>