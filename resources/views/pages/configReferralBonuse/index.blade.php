<x-app-layout>
    <x-slot name="header_content">
        <h1>
            {{ __('Data config Referral Bonuse') }}
        </h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Config Referral Bonuse</a></div>
            <div class="breadcrumb-item"><a href="{{ route('configRankLevellings.index') }}">Data config Referral Bonuse</a></div>
        </div>
    </x-slot>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div>
        <livewire:table.main name="configReferralBonuse" :model="$configReferralBonuse" />
    </div>
</x-app-layout>
