<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="{{route('customer.show', $customer->id)}}" class="nav-link @if(request()->routeIs('customer.*')) active @endif ">
            Borrower Profile
        </a>
    </li>

    <li class="nav-item">
        <a href="{{route('otherGuarantee.index', $customer->id)}}" class="nav-link @if(request()->routeIs('otherGuarantee.*')) active @endif  ">Security</a>
    </li>

    <li class="nav-item">
        <a href="{{route('guarantee.index', $customer->id)}}" class="nav-link @if(request()->routeIs('guarantee.*')) active @endif  ">Personal Guarantee</a>
    </li>

    <li class="nav-item">
        <a href="{{route('insurance.index', $customer->id)}}" class="nav-link @if(request()->routeIs('insurance.*')) active @endif  ">Insurance</a>
    </li>

    <li class="nav-item">
        <a href="{{route('insuranceClaim.index', $customer->id)}}" class="nav-link @if(request()->routeIs('insuranceClaim.*')) active @endif  ">Claim Outstanding</a>
    </li>

    <li class="nav-item">
        <a href="{{route('valuation.index', $customer->id)}}" class="nav-link  @if(request()->routeIs('valuation.*')) active @endif  ">Valuation</a>
    </li>

    <li class="nav-item">
        <a href="{{route('litigation.index', $customer->id)}}" class="nav-link  @if(request()->routeIs('litigation.*')) active @endif  ">Litigation</a>
    </li>

    <li class="nav-item">
        <a href="{{route('installment.index', $customer->id)}}" class="nav-link  @if(request()->routeIs('installment.*')) active @endif  ">Installment</a>
    </li>

    <li class="nav-item">
        <a href="{{route('markUpDetails.index', $customer->id)}}" class="nav-link  @if(request()->routeIs('markUpDetails.*')) active @endif  ">Mark-Up Details</a>
    </li>







</ul>
