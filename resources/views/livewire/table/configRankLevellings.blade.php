<div>
    <x-data-table :data="$data" :model="$configRankLevellings">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('rank_id')" role="button" href="#">
                        rank_id
                        @include('components.sort-icon', ['field' => 'rank_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('amount')" role="button" href="#">
                        amount
                        @include('components.sort-icon', ['field' => 'amount'])
                    </a></th>
                    @if (Auth::user()->isAdmin())  <th>Action</th> @endif
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($configRankLevellings as $configRankLevellings)
            <tr x-data="window.__controller.dataTableController({{ $configRankLevellings->id }})">
                <td>{{ $configRankLevellings->id }}</td>
                <td>{{ $configRankLevellings->rank_id }}</td>
                <td>{{ $configRankLevellings->amount }}</td>

                @if (Auth::user()->isAdmin())
                <td class="whitespace-no-wrap row-action--icon">

                    <a role="button" href="{{ route('configRankLevellings.edit', $configRankLevellings->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $configRankLevellings->id }})" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                </td>
                @endif
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
