<div class="row">
    {{-- The whole world belongs to you. --}}

    <div class="col-md-3 mb-2">
        <label for="type_of_facility_approved"><strong>Nature of facility availed</strong></label>
        <select class="custom-select" title="" id="type_of_facility_approved"
                name="type_of_facility_approved" wire:change="nature_of_facility($event.target.value)">
            <option value="">None</option>
            @foreach($nature_of_facility as $nf)
                <option value="{{$nf}}">
                    {{$nf}}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-2">
        <label for="nature_of_facility_availed"><strong>Type of facility approved</strong></label>
        <select class="custom-select" title="" id="nature_of_facility_availed" name="nature_of_facility_availed">
            <option value="" selected>None</option>
            @if($type_of_facility_flag)
                @foreach($type_of_facility as $tf)
                    <option value="{{$tf}}">
                        {{$tf}}
                    </option>
                @endforeach
            @endif
        </select>
        <div class="invalid-feedback">
            Please select a type of facility approved.
        </div>
    </div>


    <div class="col-md-3 mb-3">
        <label for="renewal_enhancement_fresh_sanction"><abbr
                title="renewal_enhancement_fresh_sanction"><strong>Renewal/Enhancement </strong></abbr></label>
        <input class="custom-select" title="" id="renewal_enhancement_fresh_sanction"
               name="renewal_enhancement_fresh_sanction">
        <div class="invalid-feedback">
            Please provide a Renewal/Enhancement.
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <label for="amount_sanctioned"><strong>Amount Sanctioned</strong></label>
        <input type="text" class="form-control" id="amount_sanctioned" title=""
               name="amount_sanctioned">
        <div class="invalid-feedback">
            Please provide a Amount Sanctioned.
        </div>
    </div>
</div>
