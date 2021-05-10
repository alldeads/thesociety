@isset($pageConfigs)
    {!! Helper::updatePageConfig($pageConfigs) !!}
@endisset

<!DOCTYPE html>
    @php
        $configData = Helper::applClasses();
    @endphp

    <html lang="@if(session()->has('locale')){{session()->get('locale')}}@else{{$configData['defaultLanguage']}}@endif" data-textdirection="{{ env('MIX_CONTENT_DIRECTION') === 'rtl' ? 'rtl' : 'ltr' }}" class="{{ ($configData['theme'] === 'light') ? '' : $configData['layoutTheme'] }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            Puchase Order - The Society 32
        </title>

        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/symbol.jpg') }}">

        {{-- <link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}" />
		<link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}" /> --}}
		<link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />

		{{-- {!! Helper::applClasses() !!} --}}
		@php $configData = Helper::applClasses(); @endphp

		{{-- <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/vertical-menu.css')) }}" /> --}}
		<link rel="stylesheet" href="{{asset(mix('css/base/pages/app-invoice-print.css'))}}">

		{{-- Laravel Style --}}
		<link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}" />

		{{-- user custom styles --}}
		<link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}" />
		<link rel="stylesheet" href="{{ asset(mix('css/style-rtl.css')) }}" />
    </head>

    <body class="vertical-layout vertical-menu-modern blank-page {{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }} {{($configData['theme'] === 'dark') ? 'dark-layout' : 'light' }}
    data-menu=" vertical-menu-modern" data-layout="{{ ($configData['theme'] === 'light') ? '' : $configData['layoutTheme'] }}" style="{{ $configData['bodyStyle'] }}" data-framework="laravel" data-asset-path="{{ asset('/')}}">

        <!-- BEGIN: Content-->
        <div class="app-content content {{ $configData['pageClass'] }}">
            <div class="content-wrapper {{ $configData['layoutWidth'] === 'boxed' ? 'container p-0' : '' }}">
                <div class="content-body">
                	<section class="invoice-preview-wrapper">
						<div class="row invoice-preview">
							<div class="col-xl-9 col-md-8 col-12">
								<div class="card invoice-preview-card">
									<div class="card-body invoice-padding pb-0">
										<div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
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
												<p class="card-text mb-0">{{ $company->email ?? "N/A" }}</p>
											</div>

											<div class="mt-md-0 mt-2">
												<h4 class="invoice-title">
													P.O
													{{-- <span class="invoice-number">#{{ $inputs['reference'] }}</span> --}}
												</h4>
												<div class="invoice-date-wrapper">
													<p class="invoice-date-title">Date Issued:</p>
													{{-- <p class="invoice-date">{{ $inputs['purchase_date'] }}</p> --}}
												</div>
											</div>
										</div>
									</div>
					            </div>
					        </div>
					    </div>
					</section>
				</div>
            </div>
        </div>

        {{-- include default scripts --}}
        {{-- @include('panels/scripts') --}}
    </body>
</html>