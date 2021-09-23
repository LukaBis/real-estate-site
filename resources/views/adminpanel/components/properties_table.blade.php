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
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Rent') }}</th>
                                <th>{{ __('Check') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($properties as $property)
                            <tr>
                                <td>{{ $property->city }}</td>
                                <td>{{ $property->status->status }}</td>
                                <td>{{ $property->type->name }}</td>
                                <td>${{ $property->price }}</td>
                                <td>${{ $property->rent }}</td>
                                <td>
                                  <a href="/home/property/{{ $property->id }}">
                                    {{ __('Edit') }} <i class="pl-2 fas fa-edit"></i>
                                  </a>
                                </td>
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
