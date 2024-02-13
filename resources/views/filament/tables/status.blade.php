{{-- @if ($getRecord()->status == 'pending')
    <x-badge label="Pending" warning flat />
@endif --}}

@switch($getRecord()->status)
    @case('pending')
        <x-badge label="Pending" warning flat />
    @break

    @case('accepted')
        <x-badge label="Accepted" positive flat />
    @break

    @case('declined')
        <x-badge label="Declined" negative flat />
    @break

    @default
@endswitch
