<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Personas') }}
    </h2>
</x-slot>
<div class="py-12 ">

<div class="bg-gray-100 grid grid-cols-4 gap-2" >
@foreach($users as $user)
  <div class="bg-white border rounded-sm max-w-md">
  {{$user->name}}
</div>
  @endforeach
</div>

</div>
<div class="clearfix"></div>
 {{$users->links()}}
 </div>
</x-app-layout>