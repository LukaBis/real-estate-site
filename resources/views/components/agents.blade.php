<!--/ Agents Star /-->
<section class="section-agents section-t8">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-wrap d-flex justify-content-between">
          <div class="title-box">
            <h2 class="title-a">
              @if(Request::segment(2) == '')
                {{ __('Best Agents') }}
              @elseif(Request::segment(2) == 'about')
                {{ __('Meet our team') }}
              @endif
            </h2>
          </div>
          <div class="title-link">
            <a href="/{{ app()->currentLocale() }}/agents">
              {{ __('All Agents') }}
              <span class="ion-ios-arrow-forward"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($agents as $agent)
      <div class="col-md-4">
        <div class="card-box-d">
          <div class="card-img-d">
            <img src="{{ asset('images/agent_images/'.$agent->image) }}" alt="" class="img-d img-fluid">
          </div>
          <div class="card-overlay card-overlay-hover">
            <div class="card-header-d">
              <div class="card-title-d align-self-center">
                <h3 class="title-d">
                  <a href="/{{ app()->currentLocale() }}/agent/{{ $agent->id }}" class="link-two">
                    {{ $agent->full_name }}
                  </a>
                </h3>
              </div>
            </div>
            <div class="card-body-d">
              <p class="content-d color-text-a">
                {{ $agent->shortAbout() }}
              </p>
              <div class="info-agents color-a">
                <p>
                  <strong>{{ __('Phone') }}: </strong> {{ $agent->phone }}</p>
                <p>
                  <strong>Email: </strong> {{ $agent->email }}</p>
              </div>
            </div>
            <div class="card-footer-d">
              <div class="socials-footer d-flex justify-content-center">
                <ul class="list-inline">
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="link-one">
                      <i class="fa fa-dribbble" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!--/ Agents End /-->
