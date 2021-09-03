<div class="col-md-4 col-lg-4 col-xl-3 col-12">
    <div class="checkout-options">
        <div class="sidebar-shop" style="width: 100%;">
            <div class="card">
                <div class="card-body">

                    <select class="form-control">
                        <option value="0"> Guest Customer</option>

                        {{-- @foreach( $customers as $customer )
                            <option value="{{ $customer->id }}">
                                {{ $customer->first_name . ' ' . $customer->last_name }}
                            </option>
                        @endforeach --}}
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

                    <input type="number" name="discount" class="form-control" placeholder="Discount" wire:model="discount">

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
                        <button type="button" class="btn btn-primary btn-block btn-next place-order">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>