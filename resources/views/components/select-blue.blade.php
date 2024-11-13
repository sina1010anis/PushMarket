<div>

    <div class="mb-3">
        <label for="code_sus_5" class="form-label my-font-IYB my-f-13 text-primary my-color-b-800">{{$title}}</label>
        <select name="pay" id="code_sus_5"  class="bg-info bg-opacity-10 border border-primary form-select form-select-sm form-label my-font-ISL my-f-11 my-color-b-600"  aria-label="Default select example">
            @foreach ($items as $item)
                <option class="text-primary form-label my-font-ISL my-f-11 my-color-b-600" value="{{$item['key']}}">{{$item['val']}}</option>
            @endforeach
        </select>
    </div>

</div>
