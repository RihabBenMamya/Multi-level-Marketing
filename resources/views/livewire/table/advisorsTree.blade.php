<div>
    <x-data-table :data="$data" :model="$advisorsTree">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('advisor_id')" role="button" href="#">
                        advisor_id
                        @include('components.sort-icon', ['field' => 'advisor_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('child_id')" role="button" href="#">
                        child_id
                        @include('components.sort-icon', ['field' => 'child_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('direct')" role="button" href="#">
                        direct
                        @include('components.sort-icon', ['field' => 'direct'])
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
            @foreach ($advisorsTree as $advisorsTree)
            <tr x-data="window.__controller.dataTableController({{ $advisorsTree->id }})">
                <td>{{ $advisorsTree->id }}</td>
                <td>{{ $advisorsTree->advisor_id }}</td>
                <td>{{ $advisorsTree->child_id }}</td>
                <td>{{ $advisorsTree->direct }}</td>
                <td>{{ $advisorsTree->created_at->format('d M Y H:i') }}</td>
                @if (Auth::user()->isAdmin())
                <td class="whitespace-no-wrap row-action--icon">

                    <a role="button" href="{{ route('advisorsTree.edit', $advisorsTree->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $advisorsTree->id }})" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                </td>
                @endif
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
