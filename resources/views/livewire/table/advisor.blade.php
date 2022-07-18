<div>
    <x-data-table :data="$data" :model="$advisors">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('rank_id')" role="button" href="#">
                        Rank_id
                        @include('components.sort-icon', ['field' => 'rank_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('parent_id')" role="button" href="#">
                        parent_id
                        @include('components.sort-icon', ['field' => 'parent_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('login')" role="button" href="#">
                        login
                        @include('components.sort-icon', ['field' => 'login'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Created Date
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                @if (Auth::user()->isAdmin())
                <th>Action</th>
                @endif
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($advisors as $advisor)
            <tr x-data="window.__controller.dataTableController({{ $advisor->id }})">
                <td>{{ $advisor->id }}</td>
                <td>{{ $advisor->rank_id }}</td>
                <td>{{ $advisor->parent_id }}</td>
                <td>{{ $advisor->login }}</td>
                <td>{{ $advisor->created_at }}</td>

                @if (Auth::user()->isAdmin())
                <td class="whitespace-no-wrap row-action--icon">

                    <a role="button" href="{{ route('advisors.edit', $advisor->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $advisor->id }})" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                </td>
                @endif
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
