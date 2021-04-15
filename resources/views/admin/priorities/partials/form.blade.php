@csrf
<div class="form-group">
    <label class="small mb-1" for="business_unit_id">Business Unit</label>
    <select class="form-control @error('business_unit_id') is-invalid @enderror" name="business_unit_id">  
        <option value="@isset($processPriority) {{trim($processPriority->businessUnit->id) }} @endisset"> @if(isset($functionalArea)) {{ trim($functionalArea->businessUnit->name) }} @else Select a Business Unit @endif  </option>
        @foreach ($businessUnits as $businessUnit)
        <option value="{{ $businessUnit->id }}">{{ $businessUnit->name }}</option>
        @endforeach       
      </select>   
    @error('business_unit_id')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
        type="submit">Submit</button></div>