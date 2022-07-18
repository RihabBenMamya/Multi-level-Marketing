<div>
    <x-data-table :data="$data" :model="$configReferralBonuse">
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
                <th><a wire:click.prevent="sortBy('child_rank_id')" role="button" href="#">
                        child_rank_id
                        @include('components.sort-icon', ['field' => 'child_rank_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('bonus_percentage')" role="button" href="#">
                        bonus_percentage
                        @include('components.sort-icon', ['field' => 'bonus_percentage'])
                    </a></th>

                    @if (Auth::user()->isAdmin()) <th>Action</th> @endif
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($configReferralBonuse as $configReferralBonuse)
            <tr x-data="window.__controller.dataTableController({{ $configReferralBonuse->id }})">
                <td>{{ $configReferralBonuse->id }}</td>
                <td>{{ $configReferralBonuse->parent_rank_id }}</td>
                <td>{{ $configReferralBonuse->child_rank_id }}</td>
                <td>{{ $configReferralBonuse->bonus_percentage }}</td>

                @if (Auth::user()->isAdmin())
                <td class="whitespace-no-wrap row-action--icon">

                    <a role="button" href="{{ route('configReferralBonuse.edit', $configReferralBonuse->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $configReferralBonuse->id }})" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                </td>
                @endif
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
