<x-app-layout>
  <x-slot name="header_content">
    <h1>{{ __('Data Role') }}</h1>

    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Role</a></div>
        <div class="breadcrumb-item"><a href="{{ route('roles.index') }}">Data Role</a></div>
    </div>
</x-slot>
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
  <div class="pull-right">
    <a class="btn btn-success" href="{{ route('roles.create') }}"> {{ __('Create New Role') }}</a>
  </div>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="table table-bordered">
            <tr>
              <th>{{ __('No') }}</th>
              <th>{{ __('Name') }}</th>
              <th width="280px">{{ __('Action') }}</th>
            </tr>
            @foreach ($roles as $key => $role)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $role->name }}</td>
              <td>
                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">{{ __('Show') }}</a>
                @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">{{ __('Edit') }}</a>
                @endcan
                @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endcan
              </td>
            </tr>
            @endforeach
          </table>


          {!! $roles->render() !!}

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
