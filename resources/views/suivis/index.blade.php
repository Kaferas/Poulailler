@extends("layouts.template")

@section("value")

<div class="col-md-12">
    <div class="row ml-2">
        @livewire("client")
        <div class="col-md-6">
            <div>
                @livewire("details-vente")
            </div>
        </div>
    </div>
</div>
@endsection
