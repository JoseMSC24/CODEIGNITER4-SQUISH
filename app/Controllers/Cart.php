<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Cart extends BaseController
{
    public function add($id)
    {
        $session = session();
        $model = new ProductModel();
        $product = $model->find($id);

        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        $cart = $session->get('cart') ?? [];
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1,
            ];
        }

        $session->set('cart', $cart);

        return redirect()->to('/cart');
    }

    public function index()
    {
        $session = session();
        $data['cart'] = $session->get('cart') ?? [];
        
        return view('cart/index', $data);
    }
    public function checkout()
    {
        // Verifica si hay productos en el carrito
        $cart = session()->get('cart');
        if (empty($cart)) {
            return redirect()->to('/cart')->with('error', 'No hay productos en el carrito.');
        }
    
        // Muestra la vista del formulario de pago y la lista de productos en el carrito
        return view('cart/checkout', ['cart' => $cart]);
    }
    
    // En tu controlador Cart.php

    public function clearCart()
    {
        // Verifica si existe el carrito en la sesión
        if (session()->has('cart')) {
            // Elimina todos los elementos del carrito
            session()->remove('cart');
        }
    }

    public function processPayment()
    {
        // Procesa el pago aquí (simulación en este caso)
        // Supongamos que el pago siempre se realiza con éxito
        $payment_success = true;
    
        if ($payment_success) {
            // Vacía el carrito
            $this->clearCart();
    
            // Redirige a una página de confirmación de pago exitoso
            return redirect()->to('/cart/payment_confirmation')->with('success', '¡Pago realizado correctamente!');
        } else {
            // Si el pago falla, redirige al carrito con un mensaje de error
            return redirect()->to('/cart')->with('error', '¡El pago ha fallado!');
        }
    }
    
    public function paymentConfirmation()
    {
        // Muestra la vista de confirmación de pago
        return view('cart/payment_confirmation');
    }    

    public function remove($id)
    {
        // Verifica si existe el carrito en la sesión
        if (session()->has('cart')) {
            // Obtiene el carrito de la sesión
            $cart = session()->get('cart');
    
            // Busca el producto en el carrito por su ID
            foreach ($cart as $key => $item) {
                if ($item['id'] == $id) {
                    // Elimina el producto del carrito
                    unset($cart[$key]);
                    // Actualiza el carrito en la sesión
                    session()->set('cart', $cart);
                    // Configura un mensaje de éxito en la sesión
                    session()->setFlashdata('success', 'Producto eliminado del carrito.');
                    // Redirige de vuelta al carrito
                    return redirect()->to('/cart');
                }
            }
        }
    
        // Si el producto no se encontró en el carrito, configura un mensaje de error en la sesión
        session()->setFlashdata('error', 'Producto no encontrado en el carrito.');
        // Redirige de vuelta al carrito
        return redirect()->to('/cart');
    }
}