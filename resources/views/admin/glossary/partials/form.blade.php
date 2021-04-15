@csrf
<div class="form-row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="term">Term</label>
            <input class="form-control @error('term') is-invalid @enderror" name="term"
                id="term" type="text" placeholder="Enter  term" 
                value="{{old('term') }} @isset($glossary){{trim($glossary->term)}}@endisset" />
            @error('term')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>


</div>
<div class="form-group">
    <label class="small mb-1" for="description">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
          aria-describedby="descriptionHelp" placeholder="Enter Description"
         > {{ old('description') }} @isset($glossary) {{ trim($glossary->description) }} @endisset</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
        type="submit">Submit</button></div>