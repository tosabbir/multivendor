<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: green;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>Multivendor</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               Multivendor Head Office
               Email:sabbir.climaxitsystem.com <br>
               Mobile: 01718022214 <br>
               Dhaka 1207,Dhanmondi:#4 <br>

            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{ $order_details->name }} <br>
           <strong>Email:</strong> {{ $order_details->email }} <br>
           <strong>Phone:</strong> {{ $order_details->phone }} <br>
            @php
            $div =  $order_details->division->division_name;
            $dis =  $order_details->district->district_name;
            $police_station = $order_details->police_station->police_station_name;
            @endphp
           <strong>Address:</strong> {{ $order_details->adress }} / {{$div}} / {{ $dis }}/ {{ $police_station }}<br>
           <strong>Post Code:</strong> {{ $order_details->post_code }}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Invoice:</span> #{{ $order_details->invoice_no }}</h3>
            order_details Date: {{ $order_details->order_details_date }} <br>
             Delivery Date: {{ $order_details->delivered_date }} <br>
            Payment Type : {{ $order_details->payment_method }} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>


  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>Image</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Color</th>
        <th>Code</th>
        <th>Quantity</th>
        <th>Vendor</th>
        <th>Total </th>
      </tr>
    </thead>
    <tbody>

     @foreach($order_item as $item)
      <tr class="font">
        <td align="center">
            <img src="{{ public_path($item->product->product_thambnail) }}" height="50px;" width="50px;" alt="">
        </td>
        <td align="center">{{ $item->product->product_name }}</td>

         @if($item->color == NULL)
         <td align="center"> ...</td>
         @else
          <td align="center"> {{ $item->color }}</td>
         @endif

         @if($item->size == NULL)
         <td align="center"> ...</td>
         @else
          <td align="center"> {{ $item->size }}</td>
         @endif
        <td align="center">{{ $item->product->product_code }}</td>
        <td align="center">{{ $item->qty }}</td>

         @if($item->vendor_id == NULL)
         <td align="center">Owner</td>
          @else
          <td align="center">{{ $item->product->vendorInfo->vendor_shop_name }}</td>
          @endif

        <td align="center">${{ $item->price }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">Subtotal:</span>${{ $order_details->amount }}</h2>
            <h2><span style="color: green;">Total:</span> ${{ $order_details->amount }}</h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>
