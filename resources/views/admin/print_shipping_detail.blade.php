<html>
    <head>
        <h3 style="text-align:center">Shipping</h3>
        <style>
                body{
                        font-family: Arial, Helvetica, sans-serif;
                        
                }
                p{
                        font-size: 12px;
                        line-height: 15px;
                }
                td{
                        font-size: 16px;
                        line-height: 18px;  
                }
                h3{
                        font-size: 16px;
                        line-height: 18px;  
                }
                h2{
                        font-size: 18px;
                        line-height: 20px;  
                }
                h4{
                        font-size: 15px;
                        line-height: 17px;  
                        margin: 2px;
                }
        </style>
    </head>
    <body>
      @foreach($orderMain as $order)
        <table align="center" style="border: 1px solid black;border-collapse: collapse;width:720px;" cellpadding="10">
            <tr>
                <td align="left" style="width:357px;border: 1px solid black;">
                <h2 >
                    @if($order->paymentmode=='cod')
                    <b>Cash on Delivery</b>
                    @endif
                    @if($order->paymentmode=='instamojo')
                    <b>PREPAID</b>
                    @endif
                    @if($order->paymentmode=='membership')
                    <b>Shopinway Student Member</b>
                    @endif
                
                </h2>

                @if($order->paymentmode=='instamojo')
                        <h3 style="margin-bottom:0;">Amount Paid:  {{$order->net_total}}
                        </h3>
                @else
                    <h3 style="margin-bottom:0;">Amount to be Paid:  {{$order->net_total}}
                    </h3>
                @endif
                            <p style="font-size: 10px;margin-top:4px;">(Price is inclusive of all taxes)</p>
                            @if($order->type=='membership')
                            <h3 style="margin-bottom:0;">Member ID: {{$order->student_unique_no}} </h3>
                            @endif
                        <h3 style="margin-bottom:0;">Order ID: {{$order->order_no}} </h3>
                        <h5 style="margin-top:4px;">Order Date : {{ date('d-m-Y',strtotime($order->created_at)) }}</h5>
                        <h3 style="margin-bottom:0;">Invoice No.: {{$order->invoice_no}} </h3>
                        <h5 style="margin-top:4px;">Invoice  Date : {{ date('d-m-Y',strtotime($order->updated_at)) }}</h5>
                </td>
                <td align="left" style="width:357px;border: 1px solid black;">
                        <h3>Buyer Shipping Address</h3>
                        <h3>{{$order->name}}</h3>
                        <p style="width:300px;">{{$order->address}},{{$order->landmark}},
                                {{$order->city}}<br>
                                Pincode–<b>{{$order->pincode}}</b>
                                </p>
                    <h4>Phone : {{$order->phone_no}} <br>
                    Email:   {{$order->email}}</h4>
                   
                </td>
            </tr>
            
        </table>
        <br>
      @endforeach
         
    </body>
</html>