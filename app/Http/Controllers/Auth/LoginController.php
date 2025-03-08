<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    /**
     * Show the login form
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }
        
        return view('auth.login');
    }
    
    /**
     * Handle login request
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        // Add remember me functionality
        $remember = $request->has('remember');
        
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // Update last login timestamp
            $user = Auth::user();
            $user->last_login_at = Carbon::now();
            $user->save();
            
            // Check if user is active
            if ($user->status !== 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                return back()->withErrors([
                    'email' => 'Your account is inactive. Please contact the administrator.',
                ]);
            }
            
            return redirect()->intended(route('dashboard.index'));
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    /**
     * Handle user logout
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
