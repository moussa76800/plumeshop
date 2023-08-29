<?php

namespace App\Http\Controllers\User;


use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AllUserController extends Controller
{
    public Function myOrder(){
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
    	return view('frontend.user.order.order_view',compact('orders'));
    }

    public function OrderDetail($order_id)
{
    // Récupérez la commande spécifique avec l'utilisateur et le pays associés
    $order = Order::with('user', 'address.country')->where('id', $order_id)->where('user_id', Auth::id())->first();

    // Récupérez l'objet "OrderStatus" associé à la commande
    $orderStatus = OrderStatus::where('order_id', $order_id)->first();

    $orderItem = OrderItem::with('book')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

    return view('frontend.user.order.order_detail', compact('order', 'orderItem', 'orderStatus'));
}

    
    public function InvoiceDownload($order_id){
        $order = Order::with('user', 'address.country')
                ->where('id', $order_id)
                ->where('user_id', Auth::id())
                ->first();

         $orderItem = OrderItem::with('book')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    
         $pdf = Pdf::loadView('frontend.user.order.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
                ]);
                return $pdf->download('invoice.pdf');
     } 

     public function returnOrder(Request $request, $order_id)
{
    $order = Order::findOrFail($order_id);
    $order->orderStatus()->update([
        'return_date' => Carbon::now()->format('d F Y'),
        'return_reason' => $request->return_reason,
        'return_order' => 1,
    ]);

    $notification = [
        'message' => 'Demande de retour envoyée avec succès',
        'alert-type' => 'success'
    ];

    return redirect()->route('my_Order')->with($notification);
}


public function ReturnOrderList()
{
    $orders = Order::whereHas('orderStatus', function ($query) {
        $query->whereNotNull('return_reason');
    })->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

    return view('frontend.user.order.return_Order_View', compact('orders'));
}


    public function CancelOrders()
    {
        $orders = Order::with('orderStatus')->whereHas('orderStatus', function ($query) {
            $query->whereNull('cancel_date');
        })->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        return view('frontend.user.order.cancel_order_view', compact('orders'));
    }

    // ORDER TRACKING

    public function orderTracking(Request $request){
 

        $invoice = $request->code;

        $track = Order::where('invoice_no',$invoice)->first();

        if ($track) {

        return view('frontend.tracking.track_order',compact('track'));

        }else{
            
            $notification = array(
            'message' => "Le code de facturation n'est pas valide",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    } 

}