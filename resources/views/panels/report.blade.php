<div class="row">
    @foreach( $reports as $report )
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75">{{ number_format($report['value'], 2,'.', ',') }}</h3>
                        <span>{{ $report['label'] }}</span>
                    </div>

                    <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                            <i data-feather="calendar" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>