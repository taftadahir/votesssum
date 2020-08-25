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
    // Verifier que l'email exists
    $emails = [
        "taftadjani@gmail.com",
        "moseshakim24@gmail.com"
    ];
    $email_verif=false;
    for ($i=0; $i < count($emails); $i++) {
        if ($request['email'] === $emails[$i]) {
            $email_verif=true;
        break;
        }
    }
    if ($email_verif) {
        return view('votes',['email'=>$request['email']]);
    }else{
        return redirect()->back();
    }
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
    $totalPresident = 0;
    $totalSecretaire = 0;
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
    foreach ($presidents as $key => $value) {
        $totalPresident +=$presidents[$key];
    }
    foreach ($secretaires as $key => $value) {
        $totalSecretaire += $secretaires[$key];
    }
    // return $secretaires;
    return view('results',['totalSecretaire'=>$totalSecretaire,'totalPresident'=>$totalPresident, 'presidents'=>$presidents, 'secretaires'=>$secretaires]);
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

Route::get('/all', function () {
    // Stoquer l'update
    return Vote::all();
})->name("all");

Route::post('/valider', function (Request $request) {
    // Stoquer l'update
    $email =  $request->email;
    return view('valider', compact("email"));
})->name("valider");


Route::get('/timer', function () {
    $timerEnd = new DateTime();
    return $timerEnd->getTimestamp();
})->name("timer");