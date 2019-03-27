<tr>
	<td><input type="checkbox" class="select-items toggle-list-{{$type}}" data-id="{{$i->id}}" data-tld="{{$i->tld}}"></td>
	<td>{{ $i->id }}</td>
	<td>{{ $i->tld }}</td>
	@php
		$prices = (array)json_decode($i->pricing, true);
	@endphp
	@foreach ($prices as $p)
		<td>
			<span class="text-red">{{ $p['s'] }}*</span>
			<br>
			<span class="strike">{{ $p['l'] }}*</span>
		</td>
	@endforeach
	<td>
		@if ($i->status)
			<span class="label label-xs label-success">Active</span>
		@else
			<span class="label label-xs label-danger">Inactive</span>
		@endif
	</td>
	<td>
		<a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-price-{{ $i->id }}" data-toggle="modal" title="Edit" data="{{json_encode($i, true)}}">
			<span class="label label-sm label-success"><i class="fa fa-pencil"></i></span>
		</a>
		<a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-pricing" data-toggle="modal" data-id="{{$i->id}}" data-tld="{{$i->tld}}">
			<span class="label label-sm label-red">
				<i class="fa fa-trash-o"></i>
			</span>
		</a>
	</td>
</tr>
