<div>
    <x-data-table :data="$data" :model="$order">
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
                <th><a wire:click.prevent="sortBy('parent_id')" role="button" href="#">
                        parent_id
                        @include('components.sort-icon', ['field' => 'parent_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('parent_rank_id')" role="button" href="#">
                        parent_rank_id
                        @include('components.sort-icon', ['field' => 'parent_rank_id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('total_value')" role="button" href="#">
                        total_value
                        @include('components.sort-icon', ['field' => 'total_value'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('paid')" role="button" href="#">
                        paid
                        @include('components.sort-icon', ['field' => 'paid'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('paid_at')" role="button" href="#">
                        paid_at
                        @include('components.sort-icon', ['field' => 'paid_at'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('fo')" role="button" href="#">
                        fo
                        @include('components.sort-icon', ['field' => 'fo'])
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
            @foreach ($order as $order)
            <tr x-data="window.__controller.dataTableController({{ $order->id }})">
                <td>{{ $order->id }}</td>
                <td>{{ $order->advisor_id }}</td>
                <td>{{ $order->advisor_rank_id }}</td>
                <td>{{ $order->parent_id }}</td>
                <td>{{ $order->parent_rank_id }}</td>
                <td>{{ $order->total_value }}</td>
                <td>{{ $order->paid }}</td>
                <td>{{ $order->paid_at }}</td>
                <td>{{ $order->fo }}</td>
                @if (!@empty($order->created_at))
                <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                @else
                <td>{{ $order->created_at }}</td>
                @endif
                @if (Auth::user()->isAdmin())
                <td class="whitespace-no-wrap row-action--icon">

                    <a role="button" href="{{ route('order.edit', $order->id) }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                    <a role="button" wire:click.prevent="deleteItem({{ $order->id }})" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                </td>
                @endif
            </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
