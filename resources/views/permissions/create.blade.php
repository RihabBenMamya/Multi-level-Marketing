<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Create New Permission') }}
    </h2>
    <div class="pull-right">
      <a class="btn btn-primary" href="{{ route('permissions.index') }}"> {{ __('Back') }}</a>
    </div>
  </x-slot>
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong> {{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

          {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                <strong>{{ __('Name:') }}</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
              </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
            </div>
          </div>
          {!! Form::close() !!}

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
