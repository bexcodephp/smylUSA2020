<label for="status">Status</label>
<select name="status" id="status" class="form-control select2">
    <option value="0" @if($status == 0 || old('status') == 0) selected="selected" @endif>Inactive</option>
    <option value="1" @if($status == 1 || old('status') == 1) selected="selected" @endif>Active</option>
    <option value="2" @if($status == 2 || old('status') == 2) selected="selected" @endif>Pending</option>
</select>