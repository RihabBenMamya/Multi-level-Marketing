<x-app-layout>
  <x-slot name="header_content">
    <h1> {{ __('Show Permission') }}</h1>

    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permission</a></div>
        <div class="breadcrumb-item"><a href="#"> {{ __('Show Permission') }}</a></div>
    </div>
</x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>{{ __('Name:') }}</strong>
              {{ $permission->name }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
