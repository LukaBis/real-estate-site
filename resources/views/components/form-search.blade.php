<div class="click-closed"></div>
<!--/ Form Search Star /-->
<div class="box-collapse">
  <div class="title-box-d">
    <h3 class="title-d">{{ __('Search Property') }}</h3>
  </div>
  <span class="close-box-collapse right-boxed ion-ios-close"></span>
  <div class="box-collapse-wrap form">
    <form class="form-a" action="/{{ app()->currentLocale() }}/search" method="GET">
      @csrf
      <div class="row">
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="Type">{{ __('Type') }}</label>
            <select name="type" class="form-control form-control-lg form-control-a" id="Type">
              <option>Any</option>
              @foreach($filters["types"] as $type)
              <option>{{ $type }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="city">{{ __('City') }}</label>
            <select name="city" class="form-control form-control-lg form-control-a" id="city">
              <option>Any</option>
              @foreach($filters["cities"] as $city)
              <option>{{ $city }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="bedrooms">{{ __('Beds') }}</label>
            <select name="beds" class="form-control form-control-lg form-control-a" id="bedrooms">
              <option>Any</option>
              @foreach($filters["beds"] as $bedNum)
              <option>{{ $bedNum }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="garages">{{ __('Garages') }}</label>
            <select name="garages" class="form-control form-control-lg form-control-a" id="garages">
              <option>Any</option>
              @foreach($filters["garages"] as $garageNum)
              <option>{{ $garageNum }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="bathrooms">{{ __('Bathrooms') }}</label>
            <select name="bathrooms" class="form-control form-control-lg form-control-a" id="bathrooms">
              <option>Any</option>
              @foreach($filters["baths"] as $bathNum)
              <option>{{ $bathNum }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="price">{{ __('Min Price') }} (USD)</label>
            <input type="text" name="minPrice" value="" id="price" placeholder="Unlimited" class="form-control form-control-lg form-control-a">
          </div>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-b">{{ __('Search Property') }}</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!--/ Form Search End /-->
