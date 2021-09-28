<div class="form-group row mt-4">
  <div class="col-12">
    <label for="vertical-image">{{ __('Select ') }} <b>{{ __('multiple horizontal images') }}</b> <br/> {{__('image width')}}: 1900px</label>
    <span type="button" class="text-primary"
      data-toggle="popover"
      title="How to select multiple images"
      data-content="Hold down the CTRL or SHIFT key while selecting. If you are on mobile devices, hold on image then you'll have multiple select."
      style="cursor: pointer;">
      <b>Help</b>
    </span>
    <br>
    <input class="mt-2" type="file" id="horizontal-images" name="horizontalImages[]" multiple>
  </div>
</div>
