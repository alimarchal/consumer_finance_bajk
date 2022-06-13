<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="{{route('customer.show', [1])}}" class="nav-link @if(request()->routeIs('customer.show')) active @endif ">
            Borrower Profile
        </a>
    </li>

    <li class="nav-item">
        <a href="{{route('guarantee.index', $customer->id)}}" class="nav-link @if(request()->routeIs('guarantee.index')) active @endif  ">Personal Guarantee</a>
    </li>
{{--    <li class="nav-item">--}}
{{--        <a href="{{route('otherGuarantee.index')}}" class="nav-link @if(request()->routeIs('otherGuarantee.index')) active @endif  ">Other Than Guarantee</a>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a href="{{route('insurance.index')}}" class="nav-link @if(request()->routeIs('insurance.index')) active @endif  ">Insurance</a>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a href="{{route('insuranceClaim.index')}}" class="nav-link @if(request()->routeIs('insuranceClaim.index')) active @endif  ">Litigation Status</a>--}}
{{--    </li>--}}
{{--    <li class="nav-item">--}}
{{--        <a href="{{route('litigation.index')}}" class="nav-link  @if(request()->routeIs('litigation.index')) active @endif  ">Installments</a>--}}
{{--    </li>--}}


</ul>
