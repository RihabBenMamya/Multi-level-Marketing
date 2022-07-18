<x-app-layout>
  <x-slot name="header_content">
    <h1>
        {{ __('Show Role') }}
    </h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></div>
        <div class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('Roles') }}</a></div>
        <div class="breadcrumb-item"><a href="#">{{ __('Show Role') }}</a></div>
    </div>
</x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>{{ __('Name:') }}</strong>
              {{ $role->name }}
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>{{ __('Permissions:') }}</strong>
              @if(!empty($rolePermissions))
              @foreach($rolePermissions as $v)
              <label class="label label-success">{{ $v->name }},</label>
              @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
