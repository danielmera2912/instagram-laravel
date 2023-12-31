<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Inicio') }}
    </h2>
</x-slot>
<div class="py-12 ">

<div class="bg-gray-100 grid grid-cols-4 gap-2" >
@foreach($images as $image)
  <div class="bg-white border rounded-sm max-w-md">
  
    <div class="flex items-center px-4 py-3">
    
      <img class="h-8 w-8 rounded-full" src="{{$image->user->image}}"/>
     
      <div class="ml-3 ">
        <span class="text-sm font-semibold antialiased block leading-tight">
            {{$image->user->name}} {{$image->user->surname}} | &#64;{{$image->user->nick}}
        </span>
        
      </div>
    </div>
    <form method="GET" action="{{ route('images.show',$image) }}" enctype="multipart/form-data">
        @csrf
        <button type="submit" class="btn btn-info">
    <img src="{{$image->image_path}}"/>
    </button>
    </form>
    {{$image->getCreatedAtFormattedAttribute()}}
    
    
    <div class="flex items-center justify-between mx-4 mt-3 mb-2">
      <div class="flex gap-5">
        <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>
        <div class="font-semibold text-sm mx-4 mt-2 mb-4">{{$image->likes_count}} likes</div>
        <form method="GET" action="{{ route('images.show',$image) }}" enctype="multipart/form-data">
        @csrf
          <button type="submit" class="btn btn-info">
          <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z" fill-rule="evenodd"></path></svg>
          </button>
        </form>
        <div class="font-semibold text-sm mx-4 mt-2 mb-4">{{$image->comments_count}} comentarios</div>
                    
    
      </div>
      <div class="flex">
      
      </div>
    </div>
    <div class="font-semibold text-sm mx-4 mt-2 mb-4">{{$image->description}}</div>
    
    
  </div>
  @endforeach
</div>

</div>
<div class="clearfix">
 {{$images->links()}}
 </div>
</x-app-layout>