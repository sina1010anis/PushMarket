@extends('seting.page')

@section('index')
<div class='px-5'>
    <div class="d-flex justify-content-between align-items-center ">
        <span class="my-font-IYM my-f-18 my-color-b-600"> انبارداری</span>
        <i class="bi bi-box-seam my-color-bl" style="font-size: 55px"></i>
    </div>
    <hr>
    <div>
        <div class="form-check form-switch d-flex justify-content-between align-items-center my-4">
            <input class="form-check-input my-pointer" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
            <label class="form-check-label my-pointer my-select-none my-f-12 my-font-IYL my-color-b-800" for="flexSwitchCheckChecked"><span class="my-f-11-i my-color-b-500">(با فعال بودن این گزینه منو انبارداری قابل استفاده است)</span>  نمایش منو</label>
        </div>
    </div>
</div>



@endsection
