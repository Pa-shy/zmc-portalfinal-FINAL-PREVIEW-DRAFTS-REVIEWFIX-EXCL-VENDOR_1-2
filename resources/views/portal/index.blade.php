{{-- Accreditation Card --}}
<div class="option">
    ...
    <ul class="bullets">...</ul>

    @guest
        <a class="btn btn-green" href="{{ route('login') }}">
            Login to Apply <i class="ri-arrow-right-line"></i>
        </a>
    @else
        @hasrole('journalist')
            <a class="btn btn-green" href="{{ route('accreditation.portal') }}">
                Go to My Dashboard <i class="ri-arrow-right-line"></i>
            </a>
        @else
            <button class="btn btn-green" style="opacity: 0.5; cursor: not-allowed;" disabled>
                Authorized for Journalists Only
            </button>
        @endhasrole
    @endguest
</div>

{{-- Media House Card --}}
<div class="option">
    ...
    @guest
        <a class="btn btn-dark" href="{{ route('login') }}">
            Login to Register <i class="ri-arrow-right-line"></i>
        </a>
    @else
        @hasrole('media_house')
            <a class="btn btn-dark" href="{{ route('mediahouse.portal') }}">
                Go to Organization Portal <i class="ri-arrow-right-line"></i>
            </a>
        @else
            <button class="btn btn-dark" style="opacity: 0.5; cursor: not-allowed;" disabled>
                Authorized for Media Houses Only
            </button>
        @endhasrole
    @endguest
</div>