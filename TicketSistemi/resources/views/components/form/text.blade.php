<div class="form-group m-form__group row">
    <label for="example-text-input" class="col-2 col-form-label">
        {{$isim}}
    </label>
    <div class="col-9">
        {{ Form::text($name, $value, array_merge(['class' => 'form-control m-input'], $attributes)) }}
    </div>
</div>