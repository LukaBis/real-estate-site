<div class="click-closed"></div>
<!--/ Form Search Star /-->
<div class="box-collapse">
  <div class="title-box-d">
    <h3 class="title-d">{{ __('Search Property') }}</h3>
  </div>
  <span class="close-box-collapse right-boxed ion-ios-close"></span>
  <div class="box-collapse-wrap form">
    <form class="form-a">
      <div class="row">
        <div class="col-md-12 mb-2">
          <div class="form-group">
            <label for="Type">{{ __('Keyword') }}</label>
            <input type="text" class="form-control form-control-lg form-control-a" placeholder="{{ __('Keyword') }}">
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="Type">{{ __('Type') }}</label>
            <select class="form-control form-control-lg form-control-a" id="Type">
              <option>All Type</option>
              <option>For Rent</option>
              <option>For Sale</option>
              <option>Open House</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="city">{{ __('City') }}</label>
            <select class="form-control form-control-lg form-control-a" id="city">
              <option>All City</option>
              <option>Alabama</option>
              <option>Arizona</option>
              <option>California</option>
              <option>Colorado</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="bedrooms">{{ __('Bedrooms') }}</label>
            <select class="form-control form-control-lg form-control-a" id="bedrooms">
              <option>Any</option>
              <option>01</option>
              <option>02</option>
              <option>03</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="garages">{{ __('Garages') }}</label>
            <select class="form-control form-control-lg form-control-a" id="garages">
              <option>Any</option>
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="bathrooms">{{ __('Bathrooms') }}</label>
            <select class="form-control form-control-lg form-control-a" id="bathrooms">
              <option>Any</option>
              <option>01</option>
              <option>02</option>
              <option>03</option>
            </select>
          </div>
        </div>
        <div class="col-md-6 mb-2">
          <div class="form-group">
            <label for="price">{{ __('Min Price') }}</label>
            <select class="form-control form-control-lg form-control-a" id="price">
              <option>Unlimite</option>
              <option>$50,000</option>
              <option>$100,000</option>
              <option>$150,000</option>
              <option>$200,000</option>
            </select>
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
