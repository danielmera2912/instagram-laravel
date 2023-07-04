<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Imagen') }}
    </h2>
</x-slot>
<div class="py-12 ">
  <img src="http://localhost/{{$image->image_path}}"/>
  <h1>{{$image->description}}. Subido por {{$image->user->nick}}</h1>
  <form class="inline" method="POST"
        action="{{ route('images.destroy', ['image' => $image]) }}">
    @csrf
    @method("DELETE")
    
    @if($image->user->id == auth()->id())
    <button type="submit"
            class="text-red-500 inline-flex items-center mt-4">{{ __("Eliminar imagen") }}
      <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
            fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path d="M5 12h14"></path>
        <path d="M12 5l7 7-7 7"></path>
      </svg>
    </button>
    @endif
  </form>
  <form method="POST" action="{{ route('comments.store') }}" class="flex justify-items-center flex-col">
        @csrf

        <div >
          <input type="hidden" name="image_id" value="{{ $image->id }}">
            <label for="content">Escribir un nuevo comentario</label>
            </br>
            <textarea name="content" placeholder="Descripción" required></textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <x-primary-button class="w-96">
            {{ __('Publicar') }}
        </x-primary-button>

    </form>
  </br>
  <div>Comentarios: </div>
  @foreach($image->comments as $comment)
<div class="font-semibold text-sm mx-4 mt-2 mb-4">- {{$comment->content}}</div>
  @if($comment->user_id == auth()->id())
  <form class="inline" method="POST"
        action="{{ route('comments.destroy', ['comment' => $comment]) }}">
    @csrf
    @method("DELETE")
    <button type="submit"
            class="text-red-500 inline-flex items-center mt-4">{{ __("Eliminar comentario") }}
      <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
            fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path d="M5 12h14"></path>
        <path d="M12 5l7 7-7 7"></path>
      </svg>
    </button>
  </form>
  @endif
  @endforeach
</div>
</x-app-layout>