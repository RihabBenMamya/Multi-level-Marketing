<x-app-layout>
    <x-slot name="header_content">
        <h1>
            {{ __('Data Order') }}
        </h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Order</a></div>
            <div class="breadcrumb-item"><a href="{{ route('order.index') }}">Data Order</a></div>
        </div>
    </x-slot>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div>
        <livewire:table.main name="order" :model="$order" />
    </div>
</x-app-layout>
