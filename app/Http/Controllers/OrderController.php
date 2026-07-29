<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Get kitchen orders (Pending and Cooking)
     */
    public function getKitchenOrders()
    {
        try {
            $orders = Order::with('items')
                ->whereIn('status', ['Pending', 'Cooking'])
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json($orders);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Mark order as cooking
     */
    public function markCooking($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'Cooking']);

            return response()->json(['success' => true, 'message' => 'Order is now cooking']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Mark order as ready
     */
    public function markReady($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->update(['status' => 'Ready']);

            return response()->json(['success' => true, 'message' => 'Order is ready']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Delete order
     */
    public function deleteOrder($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return response()->json(['success' => true, 'message' => 'Order deleted']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Clear completed orders
     */
    public function clearCompleted()
    {
        try {
            Order::where('status', 'Completed')->delete();

            return response()->json(['success' => true, 'message' => 'Completed orders cleared']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
