<?php

namespace database;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function suggestions(Request $request)
    {
        $query = $request->input('query');

        $suggestions = ProductModel::where('name', 'LIKE', "%{$query}%")
            ->take(10)
            ->get();

        return response()->json($suggestions);
    }
}
