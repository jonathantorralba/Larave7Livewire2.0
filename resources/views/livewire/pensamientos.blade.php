<div>
<h1>{{ $foo }}</h1>
<div class="card mb-5">
    <div class="card-header" wire:poll>
            Current time: {{ now() }}
        ¿En que estas pensando ahora?
    </div>

    <div class="card-body">

        <form wire:submit.prevent="submit()">
            
            <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            </div>

            <div class="form-group">
                <label for="">Ahora estoy pensando en:</label>
                <input type="text" class="form-control @error('body') is-invalid @enderror" name="pensamiento" wire:model="body">
                @error('body') @include('alerts.alert-danger') @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                Enviar pensamiento
            </button>

        </form>
        
    </div>
</div>

{{ $posts->links('vendor.pagination.bootstrap-4') }}
@foreach($posts as $post)
    <!-- Componente LiveWire -->
    <livewire:pensamientos-list :post="$post" :key="$post->id">
@endforeach
{{ $posts->links('vendor.pagination.bootstrap-4') }}

</div>