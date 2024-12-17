<div class="fv-row mb-7 {{$class ?? null}}">
    <!--begin::Label-->
    <label class="{{isset($required) && $required ? "required" : null}} fw-semibold fs-6 mb-2 {{$classLabel ?? null}}">{{$title}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input
        class="form-control form-control-solid mb-3 mb-lg-0 {{$classInput ?? null}}"
        type="{{$type}}"
        name="{{$name}}"
        id="{{$id ?? uniqid()}}"
        placeholder="{{$title}}"
        value="{{$value ?? old($name)}}"
        {{isset($required) && $required ? "required" : null}}
        @if(isset($parameters) && !empty($parameters))
            @foreach($parameters as $key => $value)
                {{$key}}="{{$value}}"
            @endforeach
        @endif
    />
    <!--end::Input-->
</div>
