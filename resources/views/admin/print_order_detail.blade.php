<html>
    <head>
        <h3 style="text-align:center">Invoice</h3>
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
                h5{
                        font-size: 12px;
                        line-height: 15px;  
                        margin: 2px;
                }

        </style>
    </head>
    <body>
        <table align="center" style="width:720px;">
            <tr>
                <td align="left"><b>Seller Registered Address</b></td>
                <td align="right">Ordered through <b>Shopinway.com</b></td>
            </tr>
            <tr>
                <td align="left" style="width:450px;">
                    <p style="width:180px;">Shopinway Ecommerce Pvt. Ltd.
                        80 Purba Sinthee Bye Lane, DumDum</p>
                        <p>Kolkata, West Bengal. -700030</p>
                </td>
                <td align="right">
                        <img src="{{asset('assets/images/logo-log.png')}}" width="250" height="auto">
                </td>
                
            </tr>
            <tr>
                <td align="left">
                    <p>Contact us: (033) 2548 9016 | support@shopinway.com</p>
                </td>
            </tr>
        </table>
        <br>
        <table align="center" style="border: 1px solid black;border-collapse: collapse;width:720px;" cellpadding="10">
            <tr>
                <td align="left" style="width:357px;border: 1px solid black;">
                <h2 ><b>{{$order['paymentmode']}}</b></h2>

                
                        <h3 style="margin-bottom:0;">Amount to be Paid:  {{$order['net_total']}}
                        </h3>
                            <p style="font-size: 10px;margin-top:4px;">(Price is inclusive of all taxes)</p>
                                @if($order['type']=='membership')
                                <h3 style="margin-bottom:0;">Member ID: {{$order['student_unique_no']}} </h3>
                                @endif
                        <h3 style="margin-bottom:0;">Order ID: {{$order['order_no']}} </h3>
                        <h5 style="margin-top:4px;">Order Date : {{ date('d-m-Y',strtotime($order['created_at'])) }}</h5>
                        <h3 style="margin-bottom:0;">Invoice No.: {{$order['invoice_no']}} </h3>
                        <h5 style="margin-top:4px;">Invoice  Date : {{ date('d-m-Y',strtotime($order['updated_at'])) }}</h5>
                </td>
                <td align="left" style="width:357px;border: 1px solid black;">
                        <h3>Buyer Shipping Address</h3>
                        <h3>{{$order['name']}}</h3>
                        <p style="width:300px;">{{$order['address']}},{{$order['landmark']}},
                                {{$order['city']}}<br>
                                Pincode–<b>{{$order['pincode']}}</b>
                                </p>
                    <h4>Phone : {{$order['phone_no']}} <br>
                    Email:   {{$order['email']}}</h4>
                   
                </td>
            </tr>
            
        </table>
        <br>
        <h5 style="text-align:center">This Shipment contains following product</h5>
        <table align="center" style="border: 1px solid black;border-collapse: collapse;width:720px;" >
                <tr>
                    <td align="center" style="border: 1px solid black;">
                        <h4>Sl No.</h4>
                    </td>
                    <td align="center" style="border: 1px solid black;">
                            <h4>Product Title.</h4>
                    </td>
                    <td align="center" style="border: 1px solid black;">
                            <h4>Qty.</h4>
                    </td>
                    <td align="center" style="border: 1px solid black;">
                            <h4>Price</h4>
                    </td>
                    <td align="center" style="border: 1px solid black;">
                            <h4>Sub Total</h4>
                    </td>
                </tr>
                <?php $i=1;?>
                @foreach($order['products'] as $product_item) 
                <tr>
                        <td align="center" style="border: 1px solid black;">
                        <h4>{{$i}}</h4>
                        </td>
                        <td align="center" style="border: 1px solid black;width:400px">
                                <h4>{{$product_item['product_name']}}</h4>
                        </td>
                        <td align="center" style="border: 1px solid black;">
                                <h5>{{$product_item['qty']}}</h5>
                        </td>
                        <td align="center" style="border: 1px solid black;">
                                <h5>{{$product_item['subtotal']}}</h5>
                        </td>
                        <td align="center" style="border: 1px solid black;">
                                <h5>{{$product_item['subtotal']}}</h5>
                        </td>
                </tr>
                <?php $i++;?>
                @endforeach
                <tr>
                        <td align="center" style="border: 1px solid black;" colspan="3">
                            <h4>Total</h4>
                        </td>
                      
                        <td align="center" style="border: 1px solid black;">
                                <h5>Rs. {{$order['itemtotal']}}</h5>
                        </td>
                        <td align="center" style="border: 1px solid black;">
                                <h5>Rs .{{$order['itemtotal']}}</h5>
                        </td>
                </tr>
                <tr>
                        <td align="right" style="border: 1px solid black;" colspan="4">
                            <h4>Shipping Charge</h4>
                        </td>
                      
                        <td align="center" style="border: 1px solid black;">
                                <h5>Rs. {{$order['delivery_charge']}}</h5>
                        </td>
                       
                </tr>
                <tr>
                        <td align="center" style="border: 1px solid black;" colspan="4">
                            <h4>Grand Total</h4>
                        </td>
                      
                        <td align="center" style="border: 1px solid black;">
                                <h5>Rs. {{$order['net_total']}}</h5>
                        </td>
                       
                </tr>
                <tr>
                       <td colspan="5">
                           <p style="font-size:12px;"> Declaration: The products are sold for 
                               user internal/personal consumption andnot for resale.</p>
                       </td>
                </tr>
                
            </table>
            <br>
            <h5 style="text-align:center; font-size:11px;">Note: This is a computer generated invoice and does not require signature.<br>
                    **Condition Apply. Please refer to the product page for more detail.</h5>
                    
    </body>
</html>