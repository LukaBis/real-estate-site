<div class="row">
    <!-- basic table  -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">{{ __('Table of properties') }}</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>{{ __('City') }}</th>
                                <th>{{ __('Street') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Rent') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($properties as $property)
                            <tr>
                                <td>{{ $property->city }}</td>
                                <td>{{ $property->street_name }}</td>
                                <td>{{ $property->status->status }}</td>
                                <td>{{ $property->type->name }}</td>
                                <td>${{ $property->price }}</td>
                                <td>${{ $property->rent }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end basic table  -->
</div>
