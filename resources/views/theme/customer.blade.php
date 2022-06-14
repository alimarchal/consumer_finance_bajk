<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="{{route('customer.show', $customer->id)}}" class="nav-link @if(request()->routeIs('customer.*')) active @endif ">
            Borrower Profile
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('guarantee.index', $customer->id)}}" class="nav-link @if(request()->routeIs('guarantee.*')) active @endif  ">Personal Guarantee</a>
    </li>
    <li class="nav-item">
        <a href="{{route('otherGuarantee.index', $customer->id)}}" class="nav-link @if(request()->routeIs('otherGuarantee.*')) active @endif  ">Other Than Guarantee</a>
    </li>
    <li class="nav-item">
        <a href="{{route('insurance.index', $customer->id)}}" class="nav-link @if(request()->routeIs('insurance.*')) active @endif  ">Insurance</a>
    </li>
    <li class="nav-item">
        <a href="{{route('insuranceClaim.index', $customer->id)}}" class="nav-link @if(request()->routeIs('insuranceClaim.*')) active @endif  ">Litigation Status</a>
    </li>
    <li class="nav-item">
        <a href="{{route('litigation.index', $customer->id)}}" class="nav-link  @if(request()->routeIs('litigation.*')) active @endif  ">Installments</a>
    </li>


</ul>
