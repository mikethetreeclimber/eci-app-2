<?php

namespace Modules\Crm\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;

class CrmController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        
        $userId = auth()->id();

        if ($userId !== null && $userId == Auth::id()) {
            return view('crm::index');
        } else {
            session()->put('error', 'You Must Sign in');
            return redirect()->route('login');
        }
    }

}
