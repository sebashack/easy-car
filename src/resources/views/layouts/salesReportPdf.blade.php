<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ public_path('./css/order.css') }}">
</head>
<body>
  <div class="mt-3 font-ty">
    <h1>{{ __('Sales report') }}</h1>
    <table class="table table-bordered table-striped text-center font-ty">
      <thead class="header">
        <tr>
          <th>{{ __('Brand') }}</th>
          <th>{{ __('Model') }}</th>
          <th>{{ __('Color') }}</th>
          <th>{{ __('Price') }}</th>
          <th>{{ __('Sale date') }}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($report['items'] as $item)
        <tr>
          <td>{{ $item->getCar()->getcarModel()->getBrand() }}</td>
          <td>{{ $item->getCar()->getcarModel()->getModel() }}</td>
          <td>{{ $item->getCar()->getColor() }}</td>
          <td>${{ $item->getCar()->getPrice() }}</td>
          <td>{{ $item->getCreatedAt() }} UTC</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th></th>
          <th></th>
          <th></th>
          <th>{{ __('Total') }}</th>
          <th>${{ $report['total'] }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
