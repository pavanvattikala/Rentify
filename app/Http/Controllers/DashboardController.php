<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        $user = auth()->user();
        $userType = $user->userType;

        if ($userType == UserType::Seller) {
            $sellerProperties = Property::where('user_id', $user->id)->get();
            return view('seller.dashboard', compact('sellerProperties'));
        } else if ($userType == UserType::Buyer) {
            $buyerProperties = User::find($user->id)->properties;
            return view('buyer.dashboard', compact('buyerProperties'));
        } else {
            return view('dashboard');
        }
    }
}
