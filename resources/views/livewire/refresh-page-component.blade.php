<div wire:poll.visible>
    <div class="mb-4">
        <button wire:click="refreshPage">Refresh Page</button>
    </div>
    <ul  class="list-group">
        @foreach ($notifications as $item)
            <li class="list-group-item">{{ json_decode(json_encode($item->data))->name }}</li>
        @endforeach
    </ul>
</div>
