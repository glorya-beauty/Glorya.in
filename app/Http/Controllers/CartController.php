<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function __construct()
    {
        // Remove auth middleware from constructor to handle guests
        // We'll handle authentication in individual methods
    }

    /**
     * Add item to cart (works for both guests and authenticated users)
     */
    public function add(Request $request)
    {
        try {
            $request->validate([
                'service_name' => 'required|string',
                'service_price' => 'required|numeric',
                'service_image' => 'required|string',
                'service_time' => 'required|string',
                'service_category' => 'required|string',
            ]);

            // Handle guest users (store in session)
            if (!auth()->check()) {
                // Get cart from session or create new array
                $cart = session()->get('guest_cart', []);
                
                // Generate a unique key for this item
                $itemKey = md5($request->service_name . $request->service_price);
                
                if (isset($cart[$itemKey])) {
                    // Update quantity if item exists
                    $cart[$itemKey]['quantity'] += 1;
                    $message = 'Service quantity updated in cart!';
                } else {
                    // Add new item to cart
                    $cart[$itemKey] = [
                        'service_name' => $request->service_name,
                        'service_price' => $request->service_price,
                        'service_image' => $request->service_image,
                        'service_time' => $request->service_time,
                        'service_category' => $request->service_category,
                        'quantity' => 1,
                    ];
                    $message = 'Service added to cart successfully!';
                }
                
                // Store updated cart in session
                session()->put('guest_cart', $cart);
                
                // Calculate cart count
                $cartCount = array_sum(array_column($cart, 'quantity'));
                
                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'cart_count' => $cartCount,
                    'is_guest' => true
                ]);
            }
            
            // Handle authenticated users
            $user = auth()->user();
            $userId = $user->id;

            // Get or create user's cart
            $cart = Cart::firstOrCreate(['user_id' => $userId]);

            // Check if item already exists in cart
            $existingItem = CartItem::where('cart_id', $cart->id)
                ->where('service_name', $request->service_name)
                ->first();

            if ($existingItem) {
                // Update quantity if item exists
                $existingItem->quantity += 1;
                $existingItem->save();
                $message = 'Service quantity updated in cart!';
            } else {
                // Add new item to cart
                CartItem::create([
                    'cart_id' => $cart->id,
                    'service_name' => $request->service_name,
                    'service_price' => $request->service_price,
                    'service_image' => $request->service_image,
                    'service_time' => $request->service_time,
                    'service_category' => $request->service_category,
                    'quantity' => 1,
                ]);
                $message = 'Service added to cart successfully!';
            }

            // Get updated cart count
            $cartCount = CartItem::where('cart_id', $cart->id)->sum('quantity');

            return response()->json([
                'success' => true,
                'message' => $message,
                'cart_count' => $cartCount,
                'is_guest' => false
            ]);
        } catch (\Exception $e) {
            \Log::error('Cart add error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error adding to cart: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Get cart count (works for both guests and authenticated users)
     */
    public function count()
    {
        // Handle guest users
        if (!auth()->check()) {
            $cart = session()->get('guest_cart', []);
            $cartCount = array_sum(array_column($cart, 'quantity'));
            
            return response()->json([
                'count' => $cartCount
            ]);
        }
        
        // Handle authenticated users
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        
        $cartCount = 0;
        if ($cart) {
            $cartCount = CartItem::where('cart_id', $cart->id)->sum('quantity');
        }

        return response()->json([
            'count' => $cartCount
        ]);
    }

    /**
     * Remove item from cart
     */
    public function remove(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string',
        ]);

        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();

        if ($cart) {
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('service_name', $request->service_name)
                ->first();

            if ($cartItem) {
                if ($cartItem->quantity > 1) {
                    $cartItem->quantity -= 1;
                    $cartItem->save();
                    $message = 'Service quantity updated in cart!';
                } else {
                    $cartItem->delete();
                    $message = 'Service removed from cart!';
                }

                // Get updated cart count
                $cartCount = CartItem::where('cart_id', $cart->id)->sum('quantity');

                return response()->json([
                    'success' => true,
                    'message' => $message,
                    'cart_count' => $cartCount
                ]);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Item not found in cart'
        ]);
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request)
    {
        $request->validate([
            'service_name' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();

        if ($cart) {
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('service_name', $request->service_name)
                ->first();

            if ($cartItem) {
                $cartItem->quantity = $request->quantity;
                $cartItem->save();

                $cartCount = CartItem::where('cart_id', $cart->id)->sum('quantity');

                return response()->json([
                    'success' => true,
                    'message' => 'Cart updated successfully!',
                    'cart_count' => $cartCount
                ]);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Item not found in cart'
        ]);
    }

    /**
     * Clear entire cart
     */
    public function clear(Request $request)
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();

        if ($cart) {
            CartItem::where('cart_id', $cart->id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Cart cleared successfully!',
                'cart_count' => 0
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Cart is already empty'
        ]);
    }

    /**
     * Show cart page
     */
    public function index()
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->with('items')->first();
        
        // Calculate totals with GST
        $subtotal = 0;
        $gstAmount = 0;
        $total = 0;
        
        if ($cart && $cart->items) {
            foreach ($cart->items as $item) {
                $subtotal += $item->service_price * $item->quantity;
            }
            $gstAmount = $subtotal * 0.05; // 5% GST
            $total = $subtotal + $gstAmount;
        }

        return view('frontend.cart.index', compact('cart', 'subtotal', 'gstAmount', 'total'));
    }

    /**
     * Transfer guest cart to user cart after login/registration
     */
    public function transferGuestCart()
    {
        if (!auth()->check()) {
            return;
        }
        
        $guestCart = session()->get('guest_cart', []);
        if (empty($guestCart)) {
            return;
        }
        
        $user = auth()->user();
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);
        
        foreach ($guestCart as $item) {
            // Check if item already exists in user cart
            $existingItem = CartItem::where('cart_id', $cart->id)
                ->where('service_name', $item['service_name'])
                ->first();
            
            if ($existingItem) {
                // Update quantity
                $existingItem->quantity += $item['quantity'];
                $existingItem->save();
            } else {
                // Add new item
                CartItem::create([
                    'cart_id' => $cart->id,
                    'service_name' => $item['service_name'],
                    'service_price' => $item['service_price'],
                    'service_image' => $item['service_image'],
                    'service_time' => $item['service_time'],
                    'service_category' => $item['service_category'],
                    'quantity' => $item['quantity'],
                ]);
            }
        }
        
        // Clear guest cart from session
        session()->forget('guest_cart');
    }

    /**
     * Show checkout page (handles both guests and authenticated users)
     */
    public function checkout()
    {
        // Handle guest users - show registration modal
        if (!auth()->check()) {
            // Return JSON response for AJAX requests
            if (request()->ajax() || request()->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please register or login to proceed to checkout',
                    'requires_auth' => true,
                    'auth_type' => 'register' // Show registration modal for new users
                ]);
            }
            
            // For direct URL access, redirect to home with registration modal
            return redirect()->route('home')->with('show_register_modal', true);
        }
        
        // Handle authenticated users
        $user = auth()->user();
        
        // Transfer guest cart to user cart if needed
        $this->transferGuestCart();
        
        // Debug: Log user and cart info
        \Log::info('Checkout page accessed:', [
            'user_id' => $user->id,
            'user_email' => $user->email
        ]);
        
        $cart = Cart::where('user_id', $user->id)->with('items')->first();
        
        // Debug: Log cart data
        \Log::info('Cart data:', [
            'cart_found' => $cart ? 'yes' : 'no',
            'items_count' => $cart ? ($cart->items ? $cart->items->count() : 0) : 0
        ]);
        
        // Calculate totals with GST
        $subtotal = 0;
        $gstAmount = 0;
        $total = 0;
        
        if ($cart && $cart->items && $cart->items->count() > 0) {
            foreach ($cart->items as $item) {
                $subtotal += $item->service_price * $item->quantity;
                \Log::info('Cart item:', [
                    'service_name' => $item->service_name,
                    'price' => $item->service_price,
                    'quantity' => $item->quantity
                ]);
            }
            $gstAmount = $subtotal * 0.05; // 5% GST
            $total = $subtotal + $gstAmount;
            
            \Log::info('Cart totals calculated:', [
                'subtotal' => $subtotal,
                'gst_amount' => $gstAmount,
                'total' => $total
            ]);
        }

        return view('frontend.booking.checkout', compact('cart', 'subtotal', 'gstAmount', 'total'));
    }
}
