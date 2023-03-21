<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/order.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
</div><div id="app" class="col-11">

<h2>Order: {{ $order->getId() }}</h2>

<div class="row my-3">
  <div class="col-10">
    <h1>{{ __('EasyCar') }}</h1>
  </div>
  <div class="col-2">
    <img src="{{ asset('/images/Logo.png') }}" />
  </div>
</div>

<hr />

<div class="row fact-info mt-3">
  <div class="col-3">
    <h5>{{ __('Invoice to') }}</h5>
    <p>
      {{ $order->getUser()->getName() }}
    </p>
  </div>
  <div class="col-3">
    <h5>Send to</h5>
    <p>
      {{ $order->getShippingAddress() }}
      {{ $order->getUser()->getEmail() }}
    </p>
  </div>
  <div class="col-3">
    <h5>Invoice number</h5>
    <h5>Date</h5>
    <h5>Expiration date</h5>
  </div>
  <div class="col-3">
    <h5>103</h5>
    <p>{{ $order->getDateStr() }}</p><br>
    <p>{{ $order->getDateStr() }}</p>
  </div>
</div>

<div class="row my-5">
  <table class="table table-borderless factura">
    <thead class="header">
      <tr>
        <th>Id</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Color</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($order->getItems() as $item)
      <tr>
        <td>{{ $item->getId() }}</td>
        <td>{{ $item->getCar()->getcarModel()->getBrand() }}</td>
        <td>{{ $item->getCar()->getcarModel()->getModel() }}</td>
        <td>{{ $item->getCar()->getColor() }}</td>
        <td>{{ $item->getCar()->getPrice() }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th></th>
        <th>{{ __('Total') }}</th>
        <th>$ {{ $order->getTotal() }}</th>
      </tr>
    </tfoot>
  </table>
</div>

<div class="cond row">
  <div class="col-12 mt-3">
    <h4>Thanks for counting on us</h4>
  </div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>