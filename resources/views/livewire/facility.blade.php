<div class="row">
    {{-- The whole world belongs to you. --}}

    <div class="col-md-3 mb-2">
        <label for="type_of_facility_approved"><strong>Nature of facility availed</strong></label>
        <select class="custom-select" required id="type_of_facility_approved"
                name="type_of_facility_approved" wire:change="nature_of_facility($event.target.value)">
            <option value="">None</option>
            @foreach($nature_of_facility as $nf)
                <option value="{{$nf}}"  @if($customer->type_of_facility_approved == $nf) selected @endif >
                    {{$nf}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-2">
        <label for="nature_of_facility_availed"><strong>Type of facility approved</strong></label>
        <select class="custom-select" required id="nature_of_facility_availed" name="nature_of_facility_availed">
            <option value="" selected>None</option>
            @if(!empty($customer) && $check_flag == false)
                <option value="{{$customer->nature_of_facility_availed}}" selected>{{$customer->nature_of_facility_availed}}</option>
            @endif

            @if($type_of_facility_flag)
                @foreach($type_of_facility as $tf)
                    <option value="{{$tf}}" @if($customer->nature_of_facility_availed == $tf) selected @endif  >
                        {{$tf}}
                    </option>
                @endforeach
            @endif
        </select>
    </div>


    <div class="col-md-3 mb-3">
        <label for="renewal_enhancement_fresh_sanction"><abbr
                title="renewal_enhancement_fresh_sanction"><strong>Renewal/Enhancement </strong></abbr></label>

        <select class="form-control select2bs4" required id="renewal_enhancement_fresh_sanction" style="width: 100%;" name="renewal_enhancement_fresh_sanction">
            <option value="">None</option>
            <option value="Renewal" @if($customer->renewal_enhancement_fresh_sanction == "Renewal") selected @endif >Renewal</option>
            <option value="Enhancement" @if($customer->renewal_enhancement_fresh_sanction == "Enhancement") selected @endif >Enhancement</option>
            <option value="Fresh Sanction" @if($customer->renewal_enhancement_fresh_sanction == "Fresh Sanction") selected @endif >Fresh Sanction</option>
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label for="amount_sanctioned"><strong>Amount Sanctioned</strong></label>
        <input type="number" class="form-control" id="amount_sanctioned" required
               name="amount_sanctioned" step="0.01" min="0" value="{{$customer->amount_sanctioned}}">
    </div>
</div>
