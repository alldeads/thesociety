<div class="card ecommerce-card">
    <div class="item-img text-center">
        <a href="#" wire:click.prevent="add">
            <img class="img-fluid card-img-top" src="{{ asset('images/pages/eCommerce/5.png') }}" alt="img-placeholder" />
        </a>
        {{-- <img class="img-fluid card-img-top" src="{{ asset('images/default_product.png') }}" alt="img-placeholder" /> --}}
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
                <h6 class="item-price">
                    {{ number_format($item->srp_price, 2, '.', ',') }}
                </h6>
            </div>
        </div>
        <h6 class="item-name">
            <a class="text-body" href="http://full-version.test/app/ecommerce/details">
                {{ $item->name }}
            </a>
        </h6>
        <p class="card-text item-description">
            {{ $item->short_description }}
        </p>
    </div>
    <div class="item-options text-center">
        <div class="item-wrapper">
            <div class="item-cost">
                <h4 class="item-price">
                    {{ number_format($item->srp_price, 2, '.', ',') }}
                </h4>
            </div>
        </div>
        <a href="javascript:void(0)" class="btn btn-primary btn-cart" wire:click.prevent="add">
            <span class="add-to-cart">Add to cart</span>
        </a>
    </div>
</div>