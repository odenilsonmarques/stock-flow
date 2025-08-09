<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class UserDashboardController extends Controller
{
    public function index()
    {
        $query = Product::query();
        if(!auth()->user()->isAdmin) {
            $query->where('quantity', '>', 0);
        }

        $products = $query->get(); // pegando os products disponíveis para exibir na tabela quando for clicado na quantidade produtos no card 
        $availableProducts = $query->count(); // contando os produtos disponíveis para exibir no card

        return view('user.dashboard', compact('availableProducts', 'products'));
    }


}
