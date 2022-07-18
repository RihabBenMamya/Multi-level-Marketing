<x-app-layout>
    <x-slot name="header_content">
        <h1>
            {{ __('Data Config Team Bonuse') }}
        </h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Config Team Bonuse</a></div>
            <div class="breadcrumb-item"><a href="{{ route('configTeamBonuse.index') }}">Data config Team Bonuse</a></div>
        </div>
    </x-slot>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div>
        <livewire:table.main name="configTeamBonuse" :model="$configTeamBonuse" />
    </div>
</x-app-layout>
