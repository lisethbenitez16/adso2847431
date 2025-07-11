<?php
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
//use App\Http\Controllers\AdoptionController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function (Request $request) {
    if(Auth::user()->role =='Admin'){
return view('dashboard-admin');
    }
    else if(Auth::user()->role =='Customer'){
        return view('dashboard-customer');
    }else{
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back()->with('error', 'Role no exist');
    }

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

Route::resources([
        'users' => UserController::class,
     'pets' => PetController::class,
]);
    Route::post('users/search',[UserController::class, 'search']);
    Route::post('pets/search',[PetController::class, 'search']);
});

require __DIR__.'/auth.php';

Route::get('show/users', function () {
    $users = \App\Models\User::all();
   // dd($users->toArray());
    return view('users-factory')->with('users', $users);
});


Route::get('hello', function () {
    return "<h1>Hello Laravel</h1>";
})->name('hello');

Route::get('show/pets', function () {
    $pets = \App\Models\Pet::all();
   // var_dump($pets->toArray());
   dd($pets->toArray()); //dd->dump and die

});

Route::get('challenge/users', function () {
    $users = \App\Models\User::limit(20)->get();

    $code = "<table style='border-collapse: collapse; margin: 2rem auto; font-family : Arial'>
                    <tr>
                        <th style='background: gray; color: white; padding: 0.4rem'>Id</th>
                        <th style='background: gray; color: white; padding: 0.4rem'>Fullname</th>
                        <th style='background: gray; color: white; padding: 0.4rem'>Age</th>
                        <th style='background: gray; color: white; padding: 0.4rem'>Created At</th>

                    </tr>";


                    foreach ($users as $user){
                        $code .= ($user->id%2 == 0) ? "<tr style='background: #ddd'>" : "<tr>";
                        $code .= "<td style='border: 1px solid #ddd; padding: 0.4rem'>".$user->id."</td>";
                        $code .= "<td style='border: 1px solid #ddd; padding: 0.4rem'>".$user->fullname."</td>";
                        $code .= "<td style='border: 1px solid #ddd; padding: 0.4rem'>".Carbon::parse($user->birthdate)->age." years old</td>";
                        $code .= "<td style='border: 1px solid #ddd; padding: 0.4rem'>".$user->created_at->diffForHumans()."</td>";
                        $code .= "</tr>";
                        }
                        return $code. "</table>";
                    });

             Route::get('view/blade', function () {
                $title = "Examples Blade";
                $pets = App\Models\Pet::whereIn('kind', ['dog', 'cat'])->get();

                return view('example-view')
                ->with('title', $title)
                ->with('pets', $pets);
             });

             Route::get('/view/info/{id}', function () {
                $title = "Info Pet";

                $pet = \App\Models\Pet::find(request()->id);
                return view('pets-info')
                ->with('title', $title)
                ->with('pet', $pet);
             });



