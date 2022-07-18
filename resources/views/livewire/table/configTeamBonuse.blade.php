<div>
    <x-data-table :data="$data" :model="$configTeamBonuse">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('parent_rank_id')" role="button" href="#">
                        parent_rank_id
                        @include('components.sort-icon', ['field' => 'parent_rank_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('advisor_rank_id')" role="button" href="#">
                        advisor_rank_id
                        @include('components.sort-icon', ['field' => 'advisor_rank_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('bonus_percentage')" role="button" href="#">
                        bonus_percentage
                        @include('components.sort-icon', ['field' => 'bonus_percentage'])
                    </a></th>

                    @if (Auth::user()->isAdmin()) <th>Action</th> @endif
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($configTeamBonuse as $configTeamBonuse)
            <tr x-data="window.__controller.dataTableController({{ $configTeamBonuse->id }})">
                <td>{{ $configTeamBonuse->id }}</td>
                <td>{{ $configTeamBonuse->parent_rank_id }}</td>
                <td>{{ $configTeamBonuse->advisor_rank_id }}</td>
                <td>{{ $configTeamBonuse->bonus_percentage }}</td>

                @if (Auth::user()->isAdmin())

                <td class="whitespace-no-wrap row-action--icon">

                    <a role="button" href="{{ route('configTeamBonuse.edit', $configTeamBonuse->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $configTeamBonuse->id }})" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                </td>
                @endif
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
