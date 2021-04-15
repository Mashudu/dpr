@csrf
<div class="form-row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="name"><strong>Name</strong></label>
            <input class="form-control @error('name') is-invalid @enderror" name="name"
                id="name" type="text" placeholder="Enter Name" 
                value="{{old('name') }} @isset($process){{trim($process->name)}}@endisset" />
            @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="priority"><strong>Priority (from 1 to 11 [1 means very important]) </strong></label>
            <input class="form-control @error('priority') is-invalid @enderror" name="priority"
                id="priority" type="text" placeholder="Enter Priority" 
                value="{{old('priority') }} @isset($process){{trim($process->priority)}}@endisset" />
            @error('priority')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>
<div class="form-group">
    <label class="small mb-1" for="description"><strong>Description</strong></label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
          aria-describedby="descriptionHelp" placeholder="Enter Description"
         > {{ old('description') }} @isset($process) {{ trim($process->description) }} @endisset</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label class="small mb-1" for="problem"><strong>Business Problem</strong></label>
    <textarea class="form-control @error('problem') is-invalid @enderror" name="problem" id="problem"
          aria-describedby="problemHelp" placeholder="Enter Problem"
         > {{ old('problem') }} @isset($process) {{ trim($process->problem) }} @endisset</textarea>
    @error('problem')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label class="small mb-1" for="solution"><strong>Solution </strong> </label>
    <textarea class="form-control @error('solution') is-invalid @enderror" name="solution" id="solution"
          aria-describedby="solutionHelp" placeholder="Enter solution"
         > {{ old('solution') }} @isset($process) {{ trim($process->solution) }} @endisset</textarea>
    @error('solution')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label class="small mb-1" for="benefit_description"><strong>Benefit Short Description </strong></label>
    <textarea class="form-control @error('benefit_description') is-invalid @enderror" name="benefit_description" id="benefit_description"
          aria-describedby="descriptionHelp" placeholder="Enter Benefit Description"
         > {{ old('benefit_description') }} @isset($process) {{ trim($process->benefit_description) }} @endisset</textarea>
    @error('benefit_description')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label class="small mb-1" for="status"><strong>Status</strong></label>
    <select class="form-control @error('status') is-invalid @enderror" name="status">  
        <option value="@isset($process) {{trim($process->status) }} @endisset"> @if(isset($process)) {{ trim($process->status) }} @else Select a Status @endif  </option>
        @foreach ($statuses as $status)
        <option value="{{ $status->name }}">{{ $status->name }}</option>
        @endforeach
      
        
      </select>   
    @error('status')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label class="small mb-1" for="functional_area_id"><strong>Functional Area</strong></label>
    <select class="form-control @error('functional_area_id') is-invalid @enderror" name="functional_area_id">  
        <option value="@isset($process) {{trim($process->functional_area_id) }} @endisset"> @if(isset($process)) {{ trim($process->functionalArea->name) }} @else Select a Functional Area @endif  </option>
        @foreach ($functionalAreas as $functionalArea)
        <option value="{{ $functionalArea->id }}">{{ $functionalArea->name }}</option>
        @endforeach
      
        
      </select>   
    @error('functional_area_id')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="dept"><strong>File Upload</strong></label>
    <input type="file" name="file" id="file" class="form-control">
  </div>
<div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
        type="submit">Submit</button></div>