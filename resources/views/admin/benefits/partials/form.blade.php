@csrf
<div class="form-group">
    <label class="small mb-1" for="process_id">Process</label>
    <select class="form-control @error('process_id') is-invalid @enderror" name="process_id">  
        <option value="@isset($benefit) {{trim($benefit->process->id) }} @endisset"> @if(isset($benefit)) {{ trim($benefit->process->name) }} @else Select a Process For this Benefit @endif  </option>
        @foreach ($processes as $process)
        <option value="{{ $process->id }}">{{ $process->name }}</option>
        @endforeach
      
        
      </select>   
    @error('process_id')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label class="small mb-1" for="benefit_type_id">Benefit Type</label>
    <select class="form-control @error('benefit_type_id') is-invalid @enderror" name="benefit_type_id">  
        <option value="@isset($benefit) {{trim($benefit->benefitType->id) }} @endisset"> @if(isset($benefit)) {{ trim($benefit->benefitType->name) }} @else Select a Benefit Type  For this Benefit @endif  </option>
        @foreach ($benefitTypes as $benefitType)
        <option value="{{ $benefitType->id }}">{{ $benefitType->name }}</option>
        @endforeach
      
        
      </select>   
    @error('process_id')
        <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>


<div class="form-row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="small mb-1" for="value">Benefit Value</label>
            <input  class="form-control @error('value') is-invalid @enderror" name="value"
                id="value" type="number" placeholder="Enter  value" 
                value="@isset($benefit){{trim($benefit->value)}}@endisset" />
            @error('value')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
    </div>

</div>



<div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
        type="submit">Submit</button></div>