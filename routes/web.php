<?php

use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/votes', function (Request $request) {
    // Stoquer l'email
    // return $request['email'];
    return view('votes',['email'=>$request['email']]);
})->name("votes");
Route::get('/results', function () {
    $presidents=[
        "A"=>0,
        "B"=>0,
        "C"=>0
    ];
    $secretaires=[
        "A"=>0,
        "B"=>0,
        "C"=>0,
        "D"=>0,
        "E"=>0,
        "F"=>0,
    ];
    // $secretaires=["A","B"];
    $votes=Vote::all();
    $presidentsGrouped = DB::table('votes')
                 ->select('president', DB::raw('count(*) as total'))
                 ->groupBy('president')
                 ->get();
    $secretairesGrouped = DB::table('votes')
                 ->select('secretaire', DB::raw('count(*) as total'))
                 ->groupBy('secretaire')
                 ->get();

    foreach ($presidents as $key => $value) {
        for ($i=0; $i < count($presidentsGrouped); $i++) {
            if ($presidentsGrouped[$i]->president === $key){
                $presidents[$key]=$presidentsGrouped[$i]->total;
                break;
            }
        }
    }
    foreach ($secretaires as $key => $value) {
        for ($i=0; $i < count($secretairesGrouped); $i++) {
            if ($secretairesGrouped[$i]->secretaire === $key){
                $secretaires[$key]=$secretairesGrouped[$i]->total;
                break;
            }
        }
    }
    // return $secretaires;
    return view('results',['total'=>($votes->count()==0?1:$votes->count()), 'presidents'=>$presidents, 'secretaires'=>$secretaires]);
})->name("results");

Route::post('/updateVote', function (Request $request) {
    // Stoquer l'update
    $vote = Vote::where('email', $request['email'])->first();
    if ($vote) {
        # email existed
        $vote->president = $request['president'];
        $vote->secretaire = $request['secretaire'];
        $vote->save();
    }else{
    DB::table('votes')->insert([
        [
            'email'=>$request['email'],
            'president'=>$request['president'],
            'secretaire'=>$request['secretaire'],
            'created_at'=>now(),
            'updated_at'=>now(),
        ]
    ]);
    }
})->name("update");
