<html lang="en" data-textdirection="ltr" class="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="csrf-token" content="fiElBfDZkWAsqBgWFLyfPjaXf4Xj0koaKziIU64m">

	<title>
  		Download Purchase Order - The Society 32
  	</title>
  	
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/symbol.jpg') }}">

	<link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
</head>

<body style="background-color: white !important;">
	<div class="container" >
		<div class="row">
			<div class="col-6" style="float: left;">
				<div>
					<div class="logo-wrapper">
						<img class="img-fluid rounded"
							src="{{ $company->avatar ?? '' }}"
							width="150"
							alt="Company logo"/>
					</div>

					<p class="card-text mb-25">{{ $company->name }}</p>
					<p class="card-text mb-25">{{ $company->address[0] ?? "N/A" }}</p>
					<p class="card-text mb-25">{{ $company->address[1] ?? "N/A" }}</p>
					<p class="card-text mb-25">{{ $company->address[2] ?? "N/A" }}</p>
					<p class="card-text mb-0">{{ $company->phone ?? "N/A" }}</p>
				</div>
			</div>
			<div class="col-6 text-right" style="float: right;">
				<div>
					<h4 class="invoice-title">
						P.O:
						<span class="invoice-number">#{{ $purchase['reference'] }}</span>
					</h4>

					<h6 class="invoice-title">
						Date:
						<span class="invoice-number">{{ $purchase['purchase_date'] }}</span>
					</h6>
				</div>
			</div>

			<hr style="margin-top: 280px;">

		</div>

		<div class="row" style="margin-top: 580px;">
			<div class="col-6" style="float: left;">
				<div>
					<h6>Supplier:</h6>
					<h6 class="mb-25">{{ $address['supplier_name'] }}</h6>
					<p class="card-text mb-25">{{ $address['supplier_address'][0] ?? "N/A" }}</p>
					<p class="card-text mb-25">{{ $address['supplier_address'][1] ?? "N/A" }}</p>
					<p class="card-text mb-25">{{ $address['supplier_address'][2] ?? "N/A" }}</p>

					@if ($address['supplier_phone'] != null)
						<p class="card-text mb-0">{{ $address['supplier_phone'] }}</p>
					@endif

					<p class="card-text mb-0">{{ $address['supplier_email'] }}</p>
				</div>
			</div>
			<div class="col-6 text-right" style="float: right;">
				<div>
					<h4 class="invoice-title">
						P.O:
						<span class="invoice-number">#{{ $purchase['reference'] }}</span>
					</h4>

					<h6 class="invoice-title">
						Date:
						<span class="invoice-number">{{ $purchase['purchase_date'] }}</span>
					</h6>
				</div>
			</div>

			<hr style="margin-top: 280px;">

		</div>
	</div>
</body>

</html>