<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 
<<<<<<< HEAD
use Psr\Http\Message\ServerRequestInterface;
=======
>>>>>>> lession-46

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    use AuthenticatesUsers;
    
    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    protected $redirectTo = RouteServiceProvider::HOME;
    
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
<<<<<<< HEAD

    public function getToken(ServerRequestInterface $request)
=======
    
    public function getToken(Request $request)
>>>>>>> lession-46
    {
        $request->request->add([
            'grant_type' => 'password',
            'client_id' => 2,
<<<<<<< HEAD
            'client_secret' => 'GEXMjuQ7GMvrnu2sI8CBDvlvTxNsQGOxzASDb0NI',
            'username' => $request->username,
            'password' => $request->password,
        ]);

        $requestToken = Request::create(env('APP_URL') . '/oauth/token', 'post');
        $response = Route::dispatch($requestToken);

        return $response;
    }
}
=======
            'client_secret' => 'bVhGYtFpflz1VIignijyelNRAC3g41MhKZaFnkhK',
            'username' => $request->username,
            'password' => $request->password,
            ]);
            
            $requestToken = Request::create(env('APP_URL') . '/oauth/token', 'post');
            $response = Route::dispatch($requestToken);
            
            return $response;
        }
    }
    
>>>>>>> lession-46
