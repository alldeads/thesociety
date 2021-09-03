<!DOCTYPE html>

<html lang="en" data-textdirection="ltr" class="">

<head>
  	<meta charset=" utf-8" />
  	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
  	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
  	<meta name="csrf-token" content="{{ csrf_token() }}" />

  	<title>Point of Sale</title>
  	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.ico') }}" />
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

  	<link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/nouislider.min.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />

	<link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/vertical-menu.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-sliders.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('css/base/pages/app-ecommerce.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}" />

	<link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}" />
	<link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}" />
</head>

<body class="vertical-layout vertical-menu-modern 2-columns navbar-floating menu-expanded footer-static" data-layout="" data-menu="vertical-menu-modern" data-col="2-columns" style="" data-framework="laravel" data-asset-path="{{ asset('/') }}">

	
	@include('pos.layouts.navbar')
  
  

  
  <ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center">
      <a href="javascript:void(0);">
        <h6 class="section-label mt-75 mb-0">Files</h6>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between w-100" href="http://full-version.test/app/file-manager">
        <div class="d-flex">
          <div class="mr-75">
            <img src="http://full-version.test/images/icons/xls.png" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Two new item submitted</p>
            <small class="text-muted">Marketing Manager</small>
          </div>
        </div>
        <small class="search-data-size mr-50 text-muted">&apos;17kb</small>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between w-100" href="http://full-version.test/app/file-manager">
        <div class="d-flex">
          <div class="mr-75">
            <img src="http://full-version.test/images/icons/jpg.png" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">52 JPG file Generated</p>
            <small class="text-muted">FontEnd Developer</small>
          </div>
        </div>
        <small class="search-data-size mr-50 text-muted">&apos;11kb</small>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between w-100" href="http://full-version.test/app/file-manager">
        <div class="d-flex">
          <div class="mr-75">
            <img src="http://full-version.test/images/icons/pdf.png" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">25 PDF File Uploaded</p>
            <small class="text-muted">Digital Marketing Manager</small>
          </div>
        </div>
        <small class="search-data-size mr-50 text-muted">&apos;150kb</small>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between w-100" href="http://full-version.test/app/file-manager">
        <div class="d-flex">
          <div class="mr-75">
            <img src="http://full-version.test/images/icons/doc.png" alt="png" height="32"></div>
          <div class="search-data">
            <p class="search-data-title mb-0">Anna_Strong.doc</p>
            <small class="text-muted">Web Designer</small>
          </div>
        </div>
        <small class="search-data-size mr-50 text-muted">&apos;256kb</small>
      </a>
    </li>
    <li class="d-flex align-items-center">
      <a href="javascript:void(0);">
        <h6 class="section-label mt-75 mb-0">Members</h6>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="http://full-version.test/app/user/view">
        <div class="d-flex align-items-center">
          <div class="avatar mr-75">
            <img src="http://full-version.test/images/portrait/small/avatar-s-8.jpg" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">John Doe</p>
            <small class="text-muted">UI designer</small>
          </div>
        </div>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="http://full-version.test/app/user/view">
        <div class="d-flex align-items-center">
          <div class="avatar mr-75">
            <img src="http://full-version.test/images/portrait/small/avatar-s-1.jpg" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Michal Clark</p>
            <small class="text-muted">FontEnd Developer</small>
          </div>
        </div>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="http://full-version.test/app/user/view">
        <div class="d-flex align-items-center">
          <div class="avatar mr-75">
            <img src="http://full-version.test/images/portrait/small/avatar-s-14.jpg" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Milena Gibson</p>
            <small class="text-muted">Digital Marketing Manager</small>
          </div>
        </div>
      </a>
    </li>
    <li class="auto-suggestion">
      <a class="d-flex align-items-center justify-content-between py-50 w-100" href="http://full-version.test/app/user/view">
        <div class="d-flex align-items-center">
          <div class="avatar mr-75">
            <img src="http://full-version.test/images/portrait/small/avatar-s-6.jpg" alt="png" height="32">
          </div>
          <div class="search-data">
            <p class="search-data-title mb-0">Anna Strong</p>
            <small class="text-muted">Web Designer</small>
          </div>
        </div>
      </a>
    </li>
  </ul>

  
  <ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between">
      <a class="d-flex align-items-center justify-content-between w-100 py-50">
        <div class="d-flex justify-content-start">
          <span class="mr-75" data-feather="alert-circle"></span>
          <span>No results found.</span>
        </div>
      </a>
    </li>
  </ul>
  
  <!-- END: Header-->

  <!-- BEGIN: Content-->
  <div class="app-content content ecommerce-application">
    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper">
      
       <div class="content-header row">
  <div class="content-header-left col-md-9 col-12 mb-2">
    <div class="row breadcrumbs-top">
      <div class="col-12">
        <h2 class="content-header-title float-left mb-0">Shop</h2>
        <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
              
                            <li class="breadcrumb-item">
                                    <a href="http://full-version.test">
                                            Home
                                        </a>
                                </li>
                            <li class="breadcrumb-item">
                                    <a href="javascript:void(0)">
                                            eCommerce
                                        </a>
                                </li>
                            <li class="breadcrumb-item">
                                        Shop
                                    </li>
                        </ol>
                  </div>
      </div>
    </div>
  </div>
  <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
    <div class="form-group breadcrumb-right">
      <div class="dropdown">
        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="http://full-version.test/app/todo">
            <i class="mr-1" data-feather="check-square"></i>
            <span class="align-middle">Todo</span>
          </a>
          <a class="dropdown-item" href="http://full-version.test/app/chat">
            <i class="mr-1" data-feather="message-square"></i>
            <span class="align-middle">Chat</span>
          </a>
          <a class="dropdown-item" href="http://full-version.test/app/email">
            <i class="mr-1" data-feather="mail"></i>
            <span class="align-middle">Email</span>
          </a>
          <a class="dropdown-item" href="http://full-version.test/app/calendar">
            <i class="mr-1" data-feather="calendar"></i>
            <span class="align-middle">Calendar</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
 
      <div class="content-detached content-right">
        <div class="content-body">
          
          <!-- E-commerce Content Section Starts -->
<section id="ecommerce-header">
  <div class="row">
    <div class="col-sm-12">
      <div class="ecommerce-header-items">
        <div class="result-toggler">
          <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
            <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
          </button>
          <div class="search-results">16285 results found</div>
        </div>
        <div class="view-options d-flex">
          <div class="btn-group dropdown-sort">
            <button type="button" class="btn btn-outline-primary dropdown-toggle mr-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="active-sorting">Featured</span>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:void(0);">Featured</a>
              <a class="dropdown-item" href="javascript:void(0);">Lowest</a>
              <a class="dropdown-item" href="javascript:void(0);">Highest</a>
            </div>
          </div>
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn">
              <input type="radio" name="radio_options" id="radio_option1" checked />
              <i data-feather="grid" class="font-medium-3"></i>
            </label>
            <label class="btn btn-icon btn-outline-primary view-btn list-view-btn">
              <input type="radio" name="radio_options" id="radio_option2" />
              <i data-feather="list" class="font-medium-3"></i>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- E-commerce Content Section Starts -->

<!-- background Overlay when sidebar is shown  starts-->
<div class="body-content-overlay"></div>
<!-- background Overlay when sidebar is shown  ends-->

<!-- E-commerce Search Bar Starts -->
<section id="ecommerce-searchbar" class="ecommerce-searchbar">
  <div class="row mt-1">
    <div class="col-sm-12">
      <div class="input-group input-group-merge">
        <input type="text" class="form-control search-product" id="shop-search" placeholder="Search Product" aria-label="Search..." aria-describedby="shop-search" />
        <div class="input-group-append">
          <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- E-commerce Search Bar Ends -->

<!-- E-commerce Products Starts -->
<section id="ecommerce-products" class="grid-view">
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="http://full-version.test/app/ecommerce/details">
        <img class="img-fluid card-img-top" src="http://full-version.test/images/pages/eCommerce/1.png" alt="img-placeholder" /></a>
    </div>
    <div class="card-body">
      <div class="item-wrapper">
        <div class="item-rating">
          <ul class="unstyled-list list-inline">
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
          </ul>
        </div>
        <div>
          <h6 class="item-price">$339.99</h6>
        </div>
      </div>
      <h6 class="item-name">
        <a class="text-body" href="http://full-version.test/app/ecommerce/details">Apple Watch Series 5</a>
        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Apple</a></span>
      </h6>
      <p class="card-text item-description">
        On Retina display that never sleeps, so it’s easy to see the time and other important information, without
        raising or tapping the display. New location features, from a built-in compass to current elevation, help users
        better navigate their day, while international emergency calling1 allows customers to call emergency services
        directly from Apple Watch in over 150 countries, even without iPhone nearby. Apple Watch Series 5 is available
        in a wider range of materials, including aluminium, stainless steel, ceramic and an all-new titanium.
      </p>
    </div>
    <div class="item-options text-center">
      <div class="item-wrapper">
        <div class="item-cost">
          <h4 class="item-price">$339.99</h4>
        </div>
      </div>
      <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
        <i data-feather="heart"></i>
        <span>Wishlist</span>
      </a>
      <a href="javascript:void(0)" class="btn btn-primary btn-cart">
        <i data-feather="shopping-cart"></i>
        <span class="add-to-cart">Add to cart</span>
      </a>
    </div>
  </div>
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="http://full-version.test/app/ecommerce/details">
        <img class="img-fluid card-img-top" src="http://full-version.test/images/pages/eCommerce/2.png" alt="img-placeholder" />
      </a>
    </div>
    <div class="card-body">
      <div class="item-wrapper">
        <div class="item-rating">
          <ul class="unstyled-list list-inline">
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
          </ul>
        </div>
        <div>
          <h6 class="item-price">$669.99</h6>
        </div>
      </div>
      <h6 class="item-name">
        <a class="text-body" href="http://full-version.test/app/ecommerce/details">Apple iPhone 11 (64GB, Black)</a>
        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Apple</a></span>
      </h6>
      <p class="card-text item-description">
        The Apple iPhone 11 is a great smartphone, which was loaded with a lot of quality features. It comes with a
        waterproof and dustproof body which is the key attraction of the device. The excellent set of cameras offer
        excellent images as well as capable of recording crisp videos. However, expandable storage and a fingerprint
        scanner would have made it a perfect option to go for around this price range.
      </p>
    </div>
    <div class="item-options text-center">
      <div class="item-wrapper">
        <div class="item-cost">
          <h4 class="item-price">$699.99</h4>
        </div>
      </div>
      <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
        <i data-feather="heart" class="text-danger"></i>
        <span>Wishlist</span>
      </a>
      <a href="javascript:void(0)" class="btn btn-primary btn-cart">
        <i data-feather="shopping-cart"></i>
        <span class="add-to-cart">Add to cart</span>
      </a>
    </div>
  </div>
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="http://full-version.test/app/ecommerce/details"><img class="img-fluid card-img-top" src="http://full-version.test/images/pages/eCommerce/3.png" alt="img-placeholder" /></a>
    </div>
    <div class="card-body">
      <div class="item-wrapper">
        <div class="item-rating">
          <ul class="unstyled-list list-inline">
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
          </ul>
        </div>
        <div>
          <div class="item-cost">
            <h6 class="item-price">$999.99</h6>
          </div>
        </div>
      </div>
      <h6 class="item-name">
        <a class="text-body" href="http://full-version.test/app/ecommerce/details">Apple iMac 27-inch</a>
        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Apple</a></span>
      </h6>
      <p class="card-text item-description">
        The all-in-one for all. If you can dream it, you can do it on iMac. It’s beautifully & incredibly intuitive and
        packed with tools that let you take any idea to the next level. And the new 27-inch model elevates the
        experience in way, with faster processors and graphics, expanded memory and storage, enhanced audio and video
        capabilities, and an even more stunning Retina 5K display. It’s the desktop that does it all — better and faster
        than ever.
      </p>
    </div>
    <div class="item-options text-center">
      <div class="item-wrapper">
        <div class="item-cost">
          <h4 class="item-price">$999.99</h4>
          <p class="card-text shipping"><span class="badge badge-pill badge-light-success">Free Shipping</span></p>
        </div>
      </div>
      <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
        <i data-feather="heart"></i>
        <span>Wishlist</span>
      </a>
      <a href="javascript:void(0)" class="btn btn-primary btn-cart">
        <i data-feather="shopping-cart"></i>
        <span class="add-to-cart">Add to cart</span>
      </a>
    </div>
  </div>
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="http://full-version.test/app/ecommerce/details">
        <img class="img-fluid card-img-top" src="http://full-version.test/images/pages/eCommerce/4.png" alt="img-placeholder" /></a>
    </div>
    <div class="card-body">
      <div class="item-wrapper">
        <div class="item-rating">
          <ul class="unstyled-list list-inline">
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
          </ul>
        </div>
        <div class="item-cost">
          <h6 class="item-price">$49.99</h6>
        </div>
      </div>
      <h6 class="item-name">
        <a class="text-body" href="http://full-version.test/app/ecommerce/details">OneOdio A71 Wired Headphones</a>
        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">OneOdio</a></span>
      </h6>
      <p class="card-text item-description">
        Omnidirectional detachable boom mic upgrades the headphones into a professional headset for gaming, business,
        podcasting and taking calls on the go. Better pick up your voice. Control most electric devices through voice
        activation, or schedule a ride with Uber and order a pizza. OneOdio A71 Wired Headphones voice-controlled device
        turns any home into a smart device on a smartphone or tablet.
      </p>
    </div>
    <div class="item-options text-center">
      <div class="item-wrapper">
        <div class="item-cost">
          <h4 class="item-price">$49.99</h4>
        </div>
      </div>
      <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
        <i data-feather="heart"></i>
        <span>Wishlist</span>
      </a>
      <a href="javascript:void(0)" class="btn btn-primary btn-cart">
        <i data-feather="shopping-cart"></i>
        <span class="add-to-cart">Add to cart</span>
      </a>
    </div>
  </div>
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="http://full-version.test/app/ecommerce/details">
        <img class="img-fluid card-img-top" src="http://full-version.test/images/pages/eCommerce/5.png" alt="img-placeholder" />
      </a>
    </div>
    <div class="card-body">
      <div class="item-wrapper">
        <div class="item-rating">
          <ul class="unstyled-list list-inline">
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
          </ul>
        </div>
        <div class="item-cost">
          <h6 class="item-price">$999.99</h6>
        </div>
      </div>
      <h6 class="item-name">
        <a class="text-body" href="http://full-version.test/app/ecommerce/details">
          Apple - MacBook Air® (Latest Model) - 13.3" Display - Silver
        </a>
        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Apple</a></span>
      </h6>
      <p class="card-text item-description">
        MacBook Air is a thin, lightweight laptop from Apple. MacBook Air features up to 8GB of memory, a
        fifth-generation Intel Core processor, Thunderbolt 2, great built-in apps, and all-day battery life.1 Its thin,
        light, and durable enough to take everywhere you go-and powerful enough to do everything once you get there,
        better.
      </p>
    </div>
    <div class="item-options text-center">
      <div class="item-wrapper">
        <div class="item-cost">
          <h4 class="item-price">$999.99</h4>
        </div>
      </div>
      <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
        <i data-feather="heart" class="text-danger"></i>
        <span>Wishlist</span>
      </a>
      <a href="javascript:void(0)" class="btn btn-primary btn-cart">
        <i data-feather="shopping-cart"></i>
        <span class="add-to-cart">Add to cart</span>
      </a>
    </div>
  </div>
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="http://full-version.test/app/ecommerce/details">
        <img class="img-fluid card-img-top" src="http://full-version.test/images/pages/eCommerce/6.png" alt="img-placeholder" />
      </a>
    </div>
    <div class="card-body">
      <div class="item-wrapper">
        <div class="item-rating">
          <ul class="unstyled-list list-inline">
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
          </ul>
        </div>
        <div class="item-cost">
          <h6 class="item-price">$429.99</h6>
        </div>
      </div>
      <h6 class="item-name">
        <a class="text-body" href="http://full-version.test/app/ecommerce/details"> Switch Pro Controller </a>
        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Sharp</a></span>
      </h6>
      <p class="card-text item-description">
        The Nintendo Switch Pro Controller is one of the priciest "baseline" controllers in the current console
        generation, but it's also sturdy, feels good to play with, has an excellent direction pad, and features
        impressive motion sensors and vibration systems. On top of all of that, it uses Bluetooth, so you don't need an
        adapter to use it with your PC.
      </p>
    </div>
    <div class="item-options text-center">
      <div class="item-wrapper">
        <div class="item-cost">
          <h4 class="item-price">$429.99</h4>
          <p class="card-text shipping"><span class="badge badge-pill badge-light-success">Free Shipping</span></p>
        </div>
      </div>
      <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
        <i data-feather="heart"></i>
        <span>Wishlist</span>
      </a>
      <a href="javascript:void(0)" class="btn btn-primary btn-cart">
        <i data-feather="shopping-cart"></i>
        <span class="add-to-cart">Add to cart</span>
      </a>
    </div>
  </div>
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="http://full-version.test/app/ecommerce/details">
        <img class="img-fluid card-img-top" src="http://full-version.test/images/pages/eCommerce/7.png" alt="img-placeholder" />
      </a>
    </div>
    <div class="card-body">
      <div class="item-wrapper">
        <div class="item-rating">
          <ul class="unstyled-list list-inline">
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
          </ul>
        </div>
        <div class="item-cost">
          <h6 class="item-price">$129.29</h6>
        </div>
      </div>
      <h6 class="item-name">
        <a class="text-body" href="http://full-version.test/app/ecommerce/details"> Google - Google Home - White/Slate fabric </a>
        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Google</a></span>
      </h6>
      <p class="card-text item-description">
        Simplify your everyday life with the Google Home, a voice-activated speaker powered by the Google Assistant. Use
        voice commands to enjoy music, get answers from Google and manage everyday tasks. Google Home is compatible with
        Android and iOS operating systems, and can control compatible smart devices such as Chromecast or Nest.
      </p>
    </div>
    <div class="item-options text-center">
      <div class="item-wrapper">
        <div class="item-cost">
          <h4 class="item-price">$129.29</h4>
          <p class="card-text shipping">
            <span class="badge badge-pill badge-light-success">Free Shipping</span>
          </p>
        </div>
      </div>
      <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
        <i data-feather="heart"></i>
        <span>Wishlist</span>
      </a>
      <a href="javascript:void(0)" class="btn btn-primary btn-cart">
        <i data-feather="shopping-cart"></i>
        <span class="add-to-cart">Add to cart</span>
      </a>
    </div>
  </div>
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="http://full-version.test/app/ecommerce/details">
        <img class="img-fluid card-img-top" src="http://full-version.test/images/pages/eCommerce/8.png" alt="img-placeholder" />
      </a>
    </div>
    <div class="card-body">
      <div class="item-wrapper">
        <div class="item-rating">
          <ul class="unstyled-list list-inline">
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
          </ul>
        </div>
        <div class="item-cost">
          <h6 class="item-price">$7999.99</h6>
        </div>
      </div>
      <h6 class="item-name">
        <a class="text-body" href="http://full-version.test/app/ecommerce/details"> Sony 4K Ultra HD LED TV </a>
        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Apple</a></span>
      </h6>
      <p class="card-text item-description">
        Sony 4K Ultra HD LED TV has 4K HDR Support. The TV provides clear visuals and provides distinct sound quality
        and an immersive experience. This TV has Yes HDMI ports & Yes USB ports. Connectivity options included are HDMI.
        You can connect various gadgets such as your laptop using the HDMI port. The TV comes with a 1 Year warranty.
      </p>
    </div>
    <div class="item-options text-center">
      <div class="item-wrapper">
        <div class="item-cost">
          <h4 class="item-price">$29.99</h4>
        </div>
      </div>
      <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
        <i data-feather="heart"></i>
        <span>Wishlist</span>
      </a>
      <a href="javascript:void(0)" class="btn btn-primary btn-cart">
        <i data-feather="shopping-cart"></i>
        <span class="add-to-cart">Add to cart</span>
      </a>
    </div>
  </div>
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="http://full-version.test/app/ecommerce/details">
        <img class="img-fluid card-img-top" src="http://full-version.test/images/pages/eCommerce/9.png" alt="img-placeholder" />
      </a>
    </div>
    <div class="card-body">
      <div class="item-wrapper">
        <div class="item-rating">
          <ul class="unstyled-list list-inline">
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
            <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
          </ul>
        </div>
        <div class="item-cost">
          <h6 class="item-price">$14.99</h6>
        </div>
      </div>
      <h6 class="item-name">
        <a class="text-body" href="http://full-version.test/app/ecommerce/details"> OnePlus 7 Pro </a>
        <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Philips</a></span>
      </h6>
      <p class="card-text item-description">
        The OnePlus 7 Pro features a brand new design, with a glass back and front and curved sides. The phone feels
        very premium but’s it’s also very heavy. The Nebula Blue variant looks slick but it’s quite slippery, which
        makes single-handed use a real challenge. It has a massive 6.67-inch ‘Fluid AMOLED’ display with a QHD+
        resolution, 90Hz refresh rate and support for HDR 10+ content. The display produces vivid colours, deep blacks
        and has good viewing angles.
      </p>
    </div>
    <div class="item-options text-center">
      <div class="item-wrapper">
        <div class="item-cost">
          <h4 class="item-price">$14.99</h4>
        </div>
      </div>
      <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
        <i data-feather="heart"></i>
        <span>Wishlist</span>
      </a>
      <a href="javascript:void(0)" class="btn btn-primary btn-cart">
        <i data-feather="shopping-cart"></i>
        <span class="add-to-cart">Add to cart</span>
      </a>
    </div>
  </div>
</section>
<!-- E-commerce Products Ends -->

<!-- E-commerce Pagination Starts -->
<section id="ecommerce-pagination">
  <div class="row">
    <div class="col-sm-12">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mt-2">
          <li class="page-item prev-item"><a class="page-link" href="javascript:void(0);"></a></li>
          <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
          <li class="page-item" aria-current="page"><a class="page-link" href="javascript:void(0);">4</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
          <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
          <li class="page-item next-item"><a class="page-link" href="javascript:void(0);"></a></li>
        </ul>
      </nav>
    </div>
  </div>
</section>
<!-- E-commerce Pagination Ends -->
        </div>
      </div>

      <div class="sidebar-detached sidebar-left">
        <div class="sidebar">
          
          <!-- Ecommerce Sidebar Starts -->
<div class="sidebar-shop">
  <div class="row">
    <div class="col-sm-12">
      <h6 class="filter-heading d-none d-lg-block">Filters</h6>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <!-- Price Filter starts -->
      <div class="multi-range-price">
        <h6 class="filter-title mt-0">Multi Range</h6>
        <ul class="list-unstyled price-range" id="price-range">
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="priceAll" name="price-range" class="custom-control-input" checked />
              <label class="custom-control-label" for="priceAll">All</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="priceRange1" name="price-range" class="custom-control-input" />
              <label class="custom-control-label" for="priceRange1">&lt;=$10</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="priceRange2" name="price-range" class="custom-control-input" />
              <label class="custom-control-label" for="priceRange2">$10 - $100</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="priceARange3" name="price-range" class="custom-control-input" />
              <label class="custom-control-label" for="priceARange3">$100 - $500</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="priceRange4" name="price-range" class="custom-control-input" />
              <label class="custom-control-label" for="priceRange4">&gt;= $500</label>
            </div>
          </li>
        </ul>
      </div>
      <!-- Price Filter ends -->

      <!-- Price Slider starts -->
      <div class="price-slider">
        <h6 class="filter-title">Price Range</h6>
        <div class="price-slider">
          <div class="range-slider mt-2" id="price-slider"></div>
        </div>
      </div>
      <!-- Price Range ends -->

      <!-- Categories Starts -->
      <div id="product-categories">
        <h6 class="filter-title">Categories</h6>
        <ul class="list-unstyled categories-list">
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category1" name="category-filter" class="custom-control-input" checked />
              <label class="custom-control-label" for="category1">Appliances</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category2" name="category-filter" class="custom-control-input" />
              <label class="custom-control-label" for="category2">Audio</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category3" name="category-filter" class="custom-control-input" />
              <label class="custom-control-label" for="category3">Cameras & Camcorders</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category4" name="category-filter" class="custom-control-input" />
              <label class="custom-control-label" for="category4">Car Electronics & GPS</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category5" name="category-filter" class="custom-control-input" />
              <label class="custom-control-label" for="category5">Cell Phones</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category6" name="category-filter" class="custom-control-input" />
              <label class="custom-control-label" for="category6">Computers & Tablets</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category7" name="category-filter" class="custom-control-input" />
              <label class="custom-control-label" for="category7">Health, Fitness & Beauty</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category8" name="category-filter" class="custom-control-input" />
              <label class="custom-control-label" for="category8">Office & School Supplies</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category9" name="category-filter" class="custom-control-input" />
              <label class="custom-control-label" for="category9">TV & Home Theater</label>
            </div>
          </li>
          <li>
            <div class="custom-control custom-radio">
              <input type="radio" id="category10" name="category-filter" class="custom-control-input" />
              <label class="custom-control-label" for="category10">Video Games</label>
            </div>
          </li>
        </ul>
      </div>
      <!-- Categories Ends -->

      <!-- Brands starts -->
      <div class="brands">
        <h6 class="filter-title">Brands</h6>
        <ul class="list-unstyled brand-list">
          <li>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="productBrand1" />
              <label class="custom-control-label" for="productBrand1">Insignia™</label>
            </div>
            <span>746</span>
          </li>
          <li>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="productBrand2" checked />
              <label class="custom-control-label" for="productBrand2">Samsung</label>
            </div>
            <span>633</span>
          </li>
          <li>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="productBrand3" />
              <label class="custom-control-label" for="productBrand3">Metra</label>
            </div>
            <span>591</span>
          </li>
          <li>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="productBrand4" />
              <label class="custom-control-label" for="productBrand4">HP</label>
            </div>
            <span>530</span>
          </li>
          <li>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="productBrand5" checked />
              <label class="custom-control-label" for="productBrand5">Apple</label>
            </div>
            <span>442</span>
          </li>
          <li>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="productBrand6" />
              <label class="custom-control-label" for="productBrand6">GE</label>
            </div>
            <span>394</span>
          </li>
          <li>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="productBrand7" />
              <label class="custom-control-label" for="productBrand7">Sony</label>
            </div>
            <span>350</span>
          </li>
          <li>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="productBrand8" />
              <label class="custom-control-label" for="productBrand8">Incipio</label>
            </div>
            <span>320</span>
          </li>
          <li>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="productBrand9" />
              <label class="custom-control-label" for="productBrand9">KitchenAid</label>
            </div>
            <span>318</span>
          </li>
          <li>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="productBrand10" />
              <label class="custom-control-label" for="productBrand10">Whirlpool</label>
            </div>
            <span>298</span>
          </li>
        </ul>
      </div>
      <!-- Brand ends -->

      <!-- Rating starts -->
      <div id="ratings">
        <h6 class="filter-title">Ratings</h6>
        <div class="ratings-list">
          <a href="javascript:void(0)">
            <ul class="unstyled-list list-inline">
              <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
              <li>& up</li>
            </ul>
          </a>
          <div class="stars-received">160</div>
        </div>
        <div class="ratings-list">
          <a href="javascript:void(0)">
            <ul class="unstyled-list list-inline">
              <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
              <li>& up</li>
            </ul>
          </a>
          <div class="stars-received">176</div>
        </div>
        <div class="ratings-list">
          <a href="javascript:void(0)">
            <ul class="unstyled-list list-inline">
              <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
              <li>& up</li>
            </ul>
          </a>
          <div class="stars-received">291</div>
        </div>
        <div class="ratings-list">
          <a href="javascript:void(0)">
            <ul class="unstyled-list list-inline">
              <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
              <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
              <li>& up</li>
            </ul>
          </a>
          <div class="stars-received">190</div>
        </div>
      </div>
      <!-- Rating ends -->

      <!-- Clear Filters Starts -->
      <div id="clear-filters">
        <button type="button" class="btn btn-block btn-primary">Clear All Filters</button>
      </div>
      <!-- Clear Filters Ends -->
    </div>
  </div>
</div>
<!-- Ecommerce Sidebar Ends -->
        </div>
      </div>
    </div>
  </div>
  <!-- End: Content-->

   <div class="customizer d-none d-md-block">

  <a class="customizer-toggle d-flex align-items-center justify-content-center" href="javascript:void(0);">
    <i class="spinner" data-feather="settings">
    </i>
  </a>

  <div class="customizer-content">
    <!-- Customizer header -->
    <div class="customizer-header px-2 pt-1 pb-0 position-relative">
      <h4 class="mb-0">Theme Customizer</h4>
      <p class="m-0">Customize & Preview in Real Time</p>

      <a class="customizer-close" href="javascript:void(0);"><i data-feather="x"></i></a>
    </div>

    <hr />

    <!-- Styling & Text Direction -->
    <div class="customizer-styling-direction px-2">
      <p class="font-weight-bold">Skin</p>
      <div class="d-flex">
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="skinlight" name="skinradio" class="custom-control-input layout-name" checked data-layout="" />
          <label class="custom-control-label" for="skinlight">Light</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="skinbordered" name="skinradio" class="custom-control-input layout-name" data-layout="bordered-layout" />
          <label class="custom-control-label" for="skinbordered">Bordered</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="skindark" name="skinradio" class="custom-control-input layout-name" data-layout="dark-layout" />
          <label class="custom-control-label" for="skindark">Dark</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="skinsemidark" name="skinradio" class="custom-control-input layout-name" data-layout="semi-dark-layout" />
          <label class="custom-control-label" for="skinsemidark">Semi Dark</label>
        </div>

      </div>
    </div>

    <hr />

    <!-- Menu -->
    <div class="customizer-menu px-2">
      <div id="customizer-menu-collapsible" class="d-flex">
        <p class="font-weight-bold mr-auto m-0">Menu Collapsed</p>
        <div class="custom-control custom-control-primary custom-switch">
          <input type="checkbox" class="custom-control-input" id="collapse-sidebar-switch" />
          <label class="custom-control-label" for="collapse-sidebar-switch"></label>
        </div>
      </div>
    </div>
    <hr />

    <!-- Layout Width -->
    <div class="customizer-footer px-2">
      <p class="font-weight-bold">Layout Width</p>
      <div class="d-flex">
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="layout-width-full" name="layoutWidth" class="custom-control-input" checked />
          <label class="custom-control-label" for="layout-width-full">Full Width</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="layout-width-boxed" name="layoutWidth" class="custom-control-input" />
          <label class="custom-control-label" for="layout-width-boxed">Boxed</label>
        </div>
      </div>
    </div>
    <hr />

    <!-- Navbar -->
    <div class="customizer-navbar px-2">
      <div id="customizer-navbar-colors">
        <p class="font-weight-bold">Navbar Color</p>
        <ul class="list-inline unstyled-list">
          <li class="color-box bg-white border selected" data-navbar-default=""></li>
          <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
          <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
          <li class="color-box bg-success" data-navbar-color="bg-success"></li>
          <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
          <li class="color-box bg-info" data-navbar-color="bg-info"></li>
          <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
          <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
        </ul>
      </div>

      <p class="navbar-type-text font-weight-bold">Navbar Type</p>
      <div class="d-flex">
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="nav-type-floating" name="navType" class="custom-control-input" checked />
          <label class="custom-control-label" for="nav-type-floating">Floating</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="nav-type-sticky" name="navType" class="custom-control-input" />
          <label class="custom-control-label" for="nav-type-sticky">Sticky</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="nav-type-static" name="navType" class="custom-control-input" />
          <label class="custom-control-label" for="nav-type-static">Static</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" id="nav-type-hidden" name="navType" class="custom-control-input" />
          <label class="custom-control-label" for="nav-type-hidden">Hidden</label>
        </div>
      </div>
    </div>
    <hr />

    <!-- Footer -->
    <div class="customizer-footer px-2">
      <p class="font-weight-bold">Footer Type</p>
      <div class="d-flex">
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="footer-type-sticky" name="footerType" class="custom-control-input" />
          <label class="custom-control-label" for="footer-type-sticky">Sticky</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="footer-type-static" name="footerType" class="custom-control-input" checked />
          <label class="custom-control-label" for="footer-type-static">Static</label>
        </div>
        <div class="custom-control custom-radio mr-1">
          <input type="radio" id="footer-type-hidden" name="footerType" class="custom-control-input" />
          <label class="custom-control-label" for="footer-type-hidden">Hidden</label>
        </div>
      </div>
    </div>
  </div>

</div>

 <div class="buy-now">
    <a href="https://1.envato.market/vuexy_admin" target="_blank" class="btn btn-danger">Buy Now</a>
</div>

 
  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>

  
  <!-- BEGIN: Footer-->
<footer class="footer  footer-light">
  <p class="clearfix mb-0">
    <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; <script>document.write(new Date().getFullYear())</script><a class="ml-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a>
      <span class="d-none d-sm-inline-block">, All rights Reserved</span>
    </span>
    <span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span>
  </p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

  
  <script src="http://full-version.test/vendors/js/vendors.min.js"></script>
<script src="http://full-version.test/vendors/js/ui/prism.min.js"></script>
<!-- Vendor js files -->
<script src="http://full-version.test/vendors/js/extensions/wNumb.min.js"></script>
<script src="http://full-version.test/vendors/js/extensions/nouislider.min.js"></script>
<script src="http://full-version.test/vendors/js/extensions/toastr.min.js"></script>

<script src="http://full-version.test/js/core/app-menu.js"></script>
<script src="http://full-version.test/js/core/app.js"></script>
<script src="http://full-version.test/js/scripts/customizer.js"></script>

<!-- Page js files -->
<script src="http://full-version.test/js/scripts/pages/app-ecommerce.js"></script>


  <script type="text/javascript">
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14
          , height: 14
        })
      }
    })

  </script>
</body>
</html>
