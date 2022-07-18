<div>
    <x-data-table :data="$data" :model="$teamBonuse">
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
                    <th><a wire:click.prevent="sortBy('advisor_rank_id')" role="button" href="#">
                        advisor_rank_id
                        @include('components.sort-icon', ['field' => 'advisor_rank_id'])
                    </a></th>
                    <th><a wire:click.prevent="sortBy('child_id')" role="button" href="#">
                        child_id
                        @include('components.sort-icon', ['field' => 'child_id'])
                    </a></th>
                    <th><a wire:click.prevent="sortBy('child_rank_id')" role="button" href="#">
                        child_rank_id
                        @include('components.sort-icon', ['field' => 'child_rank_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('amount')" role="button" href="#">
                        amount
                        @include('components.sort-icon', ['field' => 'amount'])
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
            @foreach ($teamBonuse as $teamBonuse)
            <tr x-data="window.__controller.dataTableController({{ $teamBonuse->id }})">
                <td>{{ $teamBonuse->id }}</td>
                <td>{{ $teamBonuse->advisor_id }}</td>
                <td>{{ $teamBonuse->advisor_rank_id }}</td>
                <td>{{ $teamBonuse->child_id }}</td>
                <td>{{ $teamBonuse->child_rank_id }}</td>
                <td>{{ $teamBonuse->amount }}</td>
                @if (!@empty($teamBonuse->created_at))
                <td>{{ $teamBonuse->created_at->format('d M Y H:i') }}</td>
                @else
                <td>{{ $teamBonuse->created_at }}</td>
                @endif
                 @if (Auth::user()->isAdmin())
<td class="whitespace-no-wrap row-action--icon">

                    <a role="button" href="{{ route('teamBonuse.edit', $teamBonuse->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $teamBonuse->id }})" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                </td>
                @endif
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
