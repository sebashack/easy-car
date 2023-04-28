<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Invoice of Order') }} {{ $order->getId() }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ public_path('./css/order.css') }}">
</head>
<body>
<div>
  <img src="{{ public_path('./images/Logo.jpg') }}" class="logo-container"/>
  <div class="h-30"></div>
</div>

<h1>{{ __('Order') }}: {{ $order->getId() }}</h1>

  <div class="font-ty mb-4">
    <div>
      <h5>{{ __('Invoice to') }}</h5>
      <p>
        {{ $order->getUser()->getName() }} {{ $order->getUser()->getLastName() }}
      </p>
    </div>
    <div>
      <h5>{{ __('Send to') }}</h5>
      <p>
        {{ $order->getShippingAddress() }}
      </p>
      <p>
        {{ $order->getUser()->getEmail() }}
      </p>
    </div>
    <div>
      <h5>{{ __('Invoice number') }}</h5>
      <p> 10000{{ $order->getId() }}</p>
    </div>
    <div>
      <h5>{{ __('Date') }}</h5>
      <p>{{ $order->getDateStr() }}</p>
    </div>
    <div>
      <h5>{{ __('Expiration date') }}</h5>
      <p>{{ $order->getDateStr() }}</p>
    </div>
  </div>

  <table class="table table-bordered table-striped text-center font-ty">
    <thead class="header">
      <tr>
        <th>{{ __('Id') }}</th>
        <th>{{ __('Brand') }}</th>
        <th>{{ __('Model') }}</th>
        <th>{{ __('Color') }}</th>
        <th>{{ __('Price') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($order->getItems() as $item)
      <tr>
        <td>{{ $item->getId() }}</td>
        <td>{{ $item->getCar()->getcarModel()->getBrand() }}</td>
        <td>{{ $item->getCar()->getcarModel()->getModel() }}</td>
        <td>{{ $item->getCar()->getColor() }}</td>
        <td>${{ $item->getCar()->getPrice() }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th>{{ __('Total') }}</th>
        <th>${{ $order->getTotal() }}</th>
      </tr>
    </tfoot>
  </table>

  <div class="mt-3 font-ty">
    <h5>{{ __('Thanks') }}</h5>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>