<div class="card mb-3">
    <div class="card-header">{{ $post->id }}. Publicado en {{ $post->created_at }}</div>

        <div class="card-body">
            @if($edit_mode)
                <input rows="2" type="text" class="form-control @error('body') is-invalid @enderror" wire:model="body">
                @error('body') @include('alerts.alert-danger') @enderror
            @else
                <p>{{ $post->body }} </p>
            @endif
        </div>

        <div class="card-footer">
            @if($edit_mode)
            <button class="btn btn-success" wire:click="update()">
                Guardar Cambios
            </button>
            <button class="btn btn-secondary" wire:click="cancel()">
                Cancelar
            </button>    
            @else
            <button class="btn btn-secondary" wire:click="edit()">
                Editar
            </button>
            @endif
            <button class="btn btn-danger ml-3" wire:click="delete()" wire:loading.class.remove="btn-danger" wire:loading.class="btn-dark">
                Eliminar
            </button>

            <div class="ml-1" wire:loading wire:target="update">
                Modificando Post...
            </div>
        </div>
</div>