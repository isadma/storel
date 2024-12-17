<div class="fv-row mb-7 {{$class ?? null}}">
    <!--begin::Label-->
    <label class="{{isset($required) && $required ? "required" : null}} fw-semibold fs-6 mb-2 {{$classLabel ?? null}}">{{$title}}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <select
        class="form-control form-control-solid mb-3 mb-lg-0 {{$classInput ?? null}}"
        name="{{$name}}"
        id="{{$id ?? uniqid()}}"
        {{isset($required) && $required ? "required" : null}}
    >
        @foreach($values as $item)
            <option value="{{$item["id"]}}" @php echo isset($value) && $value == $item["id"] ? "selected" : null; @endphp > {{$item["name"]}}</option>
        @endforeach
    </select>
    <!--end::Input-->
</div>
