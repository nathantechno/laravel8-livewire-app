<div wire:ignore.self>
    {{-- @if ($isBtnAddCliecked)
    @include("livewire.utilisateurs.create");
    @else
    @include("livewire.utilisateurs.liste");

    @endif --}}

    
    @if($currentPage == PAGECREATEFORM)
         @include("livewire.utilisateurs.create")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.utilisateurs.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.utilisateurs.liste")
    @endif
</div>