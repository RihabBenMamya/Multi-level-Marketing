<div>
    <x-data-table :data="$data" :model="$personalScore">
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
            @foreach ($personalScore as $personalScore)
            <tr x-data="window.__controller.dataTableController({{ $personalScore->id }})">
                <td>{{ $personalScore->id }}</td>
                <td>{{ $personalScore->advisor_id }}</td>
                <td>{{ $personalScore->amount }}</td>
                @if (!@empty($personalScore->created_at))
                <td>{{ $personalScore->created_at->format('d M Y H:i') }}</td>
                @else
                <td>{{ $personalScore->created_at }}</td>
                @endif
                 @if (Auth::user()->isAdmin())
<td class="whitespace-no-wrap row-action--icon">

                    <a role="button" href="{{ route('personalScore.edit', $personalScore->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $personalScore->id }})" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                </td>
                @endif
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
