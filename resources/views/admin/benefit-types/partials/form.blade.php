@csrf
<div class="form-row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="name">Name</label>
            <input class="form-control @error('name') is-invalid @enderror" name="name"
                id="name" type="text" placeholder="Enter  name" 
                value="{{old('name') }} @isset($benefitType){{trim($benefitType->name)}}@endisset" />
            @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="unit_left">Left Unit</label>
            <input class="form-control @error('unit_left') is-invalid @enderror" name="unit_left"
                id="unit_left" type="text" placeholder="Enter  Left Unit" 
                value="{{old('unit_left') }} @isset($benefitType){{trim($benefitType->unit_left)}}@endisset" />
            @error('unit_left')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="unit_right">Left Right</label>
            <input class="form-control @error('unit_right') is-invalid @enderror" name="unit_right"
                id="unit_right" type="text" placeholder="Enter  Right Unit" 
                value="{{old('unit_right') }} @isset($benefitType){{trim($benefitType->unit_right)}}@endisset" />
            @error('unit_right')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>
<div class="form-group">
    <label class="small mb-1" for="description">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
          aria-describedby="descriptionHelp" placeholder="Enter Description"
         > {{ old('description') }} @isset($benefitType) {{ trim($benefitType->description) }} @endisset</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
        type="submit">Submit</button></div>