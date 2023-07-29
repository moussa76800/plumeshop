<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReturnController extends Controller
{
    public function returnRequest(){
        // Récupérer les commandes avec leur statut associé où return_order est égal à 1
    $orders = Order::whereHas('orderStatus', function ($query) {
        $query->where('return_order', 1);
    })
    ->with('orderStatus') // Charger la relation orderStatus
    ->get();  
       return view('backend.return_order.return_request',compact('orders')); 
    }

    public function requestApprove($order_id) {
        // Mettre à jour la commande avec le statut de retour approuvé (return_order = 2)
        $order = Order::find($order_id);
        
        if ($order) {
            $order->orderStatus()->update(['return_order' => 2]);
    
            // Message de notification en fonction de la langue
            $message = (session()->get('language') == 'french') 
                ? 'Le retour a bien été approuvé'
                : 'The return has been approved';
    
            $notification = [
                'message' => $message,
                'alert-type' => 'success'
            ];
    
            return redirect()->back()->with($notification);
        } else {
            // La commande n'existe pas, afficher un message d'erreur
            $message = (session()->get('language') == 'french') 
                ? 'La commande n\'existe pas'
                : 'The order does not exist';
    
            $notification = [
                'message' => $message,
                'alert-type' => 'error'
            ];
    
            return redirect()->back()->with($notification);
        }
    }
    

public function requestViewAll()
{
    $allRequests = Order::whereHas('orderStatus', function ($query) {
        $query->where('return_order', 2);
    })
    ->with('orderStatus') // Charger la relation orderStatus
    ->get();  

    return view('backend.return_order.all_return_request', compact('allRequests'));
}
}
