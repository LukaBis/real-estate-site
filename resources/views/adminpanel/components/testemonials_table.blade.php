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
                                <th>{{ __('Names') }}</th>
                                <th>{{ __('Text') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($testemonials as $testemonial)
                            <tr>
                                <td>{{ $testemonial->names }}</td>
                                <td>{{ $testemonial->text }}</td>
                                <td>
                                  <a href="/home/testemonial/{{ $testemonial->id }}">
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
