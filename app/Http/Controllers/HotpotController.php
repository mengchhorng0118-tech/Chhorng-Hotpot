<?php
// app/Http/Controllers/HotpotController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotpotCustomer;

class HotpotController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'table_number' => 'required|integer',
        ]);

        $customer = HotpotCustomer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'table_number' => $request->table_number,
        ]);

        return response()->json([
            'status' => 'success',
            'customer' => $customer
        ]);
    }
}
