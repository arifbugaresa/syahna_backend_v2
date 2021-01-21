<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = Transaction::with('details.product')->find($id);

        if($product)
            return ResponFormatter::success($product, 'Data transaksi berhasil diambil');
        else 
            return ResponFormatter::error(null, 'Data transaksi tidak ada', 404);
    }
}
