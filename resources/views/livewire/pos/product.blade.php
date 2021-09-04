<div class="row">
    <div class="col-md-4 col-lg-4 col-xl-3 col-12">
        <div class="checkout-options">
            <div class="sidebar-shop" style="width: 100%;">
                <div class="card">
                    <div class="card-body">

                        <select class="form-control">
                            <option value="0"> Guest Customer</option>
                            @foreach( $customers as $customer )
                                <option value="{{ $customer->id }}">
                                    {{ $customer->first_name . ' ' . $customer->last_name }}
                                </option>
                            @endforeach
                        </select>

                        <table class="table mt-2" style="width: 100%;">

                            @forelse($items as $key => $item)
                                <tr>
                                    <td>
                                        <div class="item-name">
                                            <h6 class="mb-0">
                                                <a href="{{url('app/ecommerce/details')}}" class="text-body">
                                                    {{ $item['item']['name'] }}
                                                </a>
                                            </h6>

                                            <small>x {{ $item['quantity'] }}</small>
                                        </div>
                                    </td>

                                    <td>
                                        <h4 class="item-price">{{ number_format($item['price'], 2, '.', ',') }}</h4>
                                    </td>

                                    <td>
                                        <button class="btn btn-sm btn-danger" wire:click.prevent="deleteItem({{ $key }})">
                                            X
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"> No items.</td>
                                </tr>
                            @endforelse
                            
                        </table>

                        <hr />

                        <input type="text" name="discount" class="form-control" placeholder="Discount" wire:model="discount">

                        <hr />

                        <div class="price-details">
                            <ul class="list-unstyled">
                                <li class="price-detail">
                                    <div class="detail-title">Sub Total</div>
                                    <div class="detail-amt">{{ number_format($inputs['sub_total'], 2, '.', ',') }}</div>
                                </li>
                                <li class="price-detail">
                                    <div class="detail-title">Discount</div>
                                    <div class="detail-amt discount-amt text-success">
                                        -{{ number_format($discount, 2, '.', ',') }}
                                    </div>
                                </li>
                            </ul>

                            <hr />
                            <ul class="list-unstyled">
                                <li class="price-detail">
                                    <div class="detail-title detail-total">Total</div>
                                    <div class="detail-amt font-weight-bolder">{{ number_format($inputs['total'], 2, '.', ',') }}</div>
                                </li>
                            </ul>

                            <button type="button" class="btn btn-primary btn-block btn-next place-order" data-toggle="modal" data-target="#placeOrderModal">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 col-lg-8 col-xl-9 col-12">
        <div class="content-body">
            <section id="ecommerce-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ecommerce-header-items">
                            <div class="result-toggler">
                                <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                                    <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
                                </button>
                                <div class="search-results">{{ $count }} results found</div>
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
                                <div class="btn-group btn-group-toggle" data-toggle="buttons" wire:ignore>
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

            <div class="body-content-overlay"></div>

            <section id="ecommerce-searchbar" class="ecommerce-searchbar">
                <div class="row mt-1">
                    <div class="col-sm-12">
                        <div class="input-group input-group-merge">
                            <input type="text" class="form-control search-product" id="shop-search" placeholder="Search Product" aria-label="Search..." aria-describedby="shop-search" wire:model="search"/>
                            <div class="input-group-append">
                                <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="ecommerce-products" class="grid-view">

                @forelse( $results as $result )
                    @livewire('pos.item', ['item' => $result], key($result->id))
                @empty
                    <div style="width: 100%;">
                        No items
                    </div>
                @endforelse
            </section>

            <section id="ecommerce-pagination">
                <div class="m-auto">
                    {{ $results->links() }}
                </div>
            </section>
        </div>
    </div>

    <div class="modal fade" id="placeOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-center">
                    <h1> {{ number_format($inputs['total'], 2, '.', ',') }}</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Validate</button>
                </div>
            </div>
        </div>
    </div>
</div>