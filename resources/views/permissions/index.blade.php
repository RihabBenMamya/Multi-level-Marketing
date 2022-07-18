<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Permission') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permission</a></div>
            <div class="breadcrumb-item"><a href="#">Data Permission</a></div>
        </div>
    </x-slot>
    <div>
        <a class="btn btn-success" href="{{ route('permissions.create') }}"> {{ __('Create New Permission') }}</a>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
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
                            @foreach ($permissions as $key => $permission)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">{{ __('Show') }}</a>
                                    @can('permission-edit')
                                    <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">{{ __('Edit') }}</a>
                                    @endcan
                                    @can('permission-delete')
                                    {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </table>


                        {!! $permissions->render() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
