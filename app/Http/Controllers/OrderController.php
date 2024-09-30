<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->input('page', 1); // 1 sahifa default

        $response = Http::get('https://kafil.uz/api/kafil/orders', [
            'page' => $page,
        ]);

        if ($response->successful()) {
            $orders = $response->json();
            return view('admin.orders.index', compact('orders'));
        }

        return redirect()->back()->with('error', 'Failed to fetch orders from API.');
    }
    public function edit($id)
    {
        $response = Http::put("https://kafil.uz/api/kafil/order/{$id}");

        if ($response->successful()) {
            $order = $response->json();
            return view('admin.orders.edit', compact('order'));
        } else {
            dd($response->status(), $response->body());
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $response = Http::put("https://kafil.uz/api/kafil/order/{$id}", [
            'status' => $request->input('status'),
        ]);

        if ($response->successful()) {
            return redirect()->route('orders.index', $id)->with('success', 'Order state updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update order state.');
        }
    }
}
