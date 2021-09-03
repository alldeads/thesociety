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