<label>Select Dentist</label>
<select name="dentist" class="form-control dentist">
    @foreach($dentists as $key=>$dentist)
        <option value="{{$dentist->id}}">{{$dentist->name}}</option>
    @endforeach
</select>
