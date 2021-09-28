<div class="row">
    <!-- basic table  -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">{{ __('Table of agents') }}</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered first">
                        <thead>
                            <tr>
                                <th>{{ __('Full name') }}</th>
                                <th>{{ __('Phone') }}</th>
                                <th>{{ __('Email') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($agents as $agent)
                            <tr>
                                <td>{{ $agent->full_name }}</td>
                                <td>{{ $agent->phone }}</td>
                                <td>{{ $agent->email }}</td>
                                <td>
                                  <a href="/home/agent/{{ $agent->id }}">
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
