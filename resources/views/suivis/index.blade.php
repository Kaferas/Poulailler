@extends("layouts.template")

@section("value")

<div class="col-md-12">
    <div class="row ml-2">
        @livewire("client")
        {{-- @dump(Gate::allows("is-admin")) --}}
        <div class="col-md-6">
            <div>
                @livewire("details-vente")
            </div>
        </div>
    </div>
</div>
@endsection
