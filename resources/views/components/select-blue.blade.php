<div>

    <div class="mb-3">
        <label for="code_sus_5" class="form-label my-font-IYB my-f-13 co-sa-o-h">{{$title}}</label>
        <select style="font-size: 12px!important;border: 1px solid #ec6b05;background-color: #ebd5bd" name="pay" id="code_sus_5"  class=" form-select form-select-sm form-label my-font-ISL my-f-11 my-color-b-600"  aria-label="Default select example">
            @foreach ($items as $item)
                <option style="font-size: 12px!important;border: 1px solid #ec6b05;background-color: #ebd5bd" class=" form-label my-font-ISL my-f-11 my-color-b-600" value="{{$item['key']}}">{{$item['val']}}</option>
            @endforeach
        </select>
    </div>

</div>
