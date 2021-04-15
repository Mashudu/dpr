@csrf
<div class="form-row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="name">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" name="name"
                id="name" type="text" placeholder="Enter  name" 
                value="{{old('name') }} @isset($functionalArea){{trim($functionalArea->name)}}@endisset" />
            @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>
<div class="form-group">
    <label class="small mb-1" for="description">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
          aria-describedby="descriptionHelp" placeholder="Enter Description"
         > {{ old('description') }} @isset($functionalArea) {{ trim($functionalArea->description) }} @endisset</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label class="small mb-1" for="business_unit_id">Business Unit</label>
    <select class="form-control @error('business_unit_id') is-invalid @enderror" name="business_unit_id">  
        <option value="@isset($functionalArea) {{trim($functionalArea->businessUnit->id) }} @endisset"> @if(isset($functionalArea)) {{ trim($functionalArea->businessUnit->name) }} @else Select a Business Unit @endif  </option>
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