<?php

use App\Emails;
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
    return "Not available";
    // Verifier que l'email exists
    $emails=Emails::all();
    // return $emails;
    $email_verif=false;
    for ($i=0; $i < count($emails); $i++) {
        if ($request['email'] === $emails[$i]->email) {
            $email_verif=true;
        break;
        }
    }
    if ($email_verif) {
        return view('votes',['email'=>$request['email']]);
    }else{
        return redirect()->back()->withErrors(["error"=>"You have already voted or your code is invalid!!!" ]);
    }
})->name("votes");

Route::get('/results', function () {
    return "Not available";
    $presidents=[
        "Achwany Simon Eto"=>0,
        "Awar Kon Awet"=>0,
    ];
    $secretaires=[
        "Moses Machar"=>0,
        "David Sebit"=>0,
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
    return view('results',['totalSecretaire'=>$totalSecretaire==0?1:$totalSecretaire,'totalPresident'=>$totalPresident==0?1:$totalPresident, 'presidents'=>$presidents, 'secretaires'=>$secretaires]);
})->name("results");

Route::post('/updateVote', function (Request $request) {
    return "Not available";
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
    return "Not available";
    // Stoquer l'update
    return Vote::all();
})->name("all");

Route::post('/valider', function (Request $request) {
    return "Not available";
    // Stoquer l'update
    $email =  $request->email;
    $email_result=    Emails::where('email',$email)->delete();
    return view('valider');
})->name("valider");

Route::get('addCode', function () {
    return view('addCode');
})->name("addCode");
Route::post('/addCode', function (Request $request) {
    // Insert the mail
    DB::table('emails')->insert([
        [
            'email'=>$request['email'],
            'created_at'=>now(),
            'updated_at'=>now(),
        ]
    ]);
    return redirect()->back();
});
