@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>  {{-- $post->created_at->toTimeString()  sadece zamanı yanda göstermek için--}}
    <p class="mb-2">{{ $post->body }}</p>

    {{-- @if ($post -> ownedBy(auth()->user())) --}}
    @can('delete',$post)
     <form action="{{ route('posts.destroy' , $post) }}" method="post">
         @csrf 
         @method('DELETE')
         <button class="text-yellow-500" type="submit">Delete</button>
      </form>
    @endcan
    {{-- @endif --}}

  <div class="flex items-center">
     @auth
     @if(!$post->likedBy(auth()->user()))
       <form action="{{ route('posts.likes', $post) }}" class="mr-1" method="post">
          @csrf
        <button class="text-blue-500" type="submit">Like</button>
        </form>
    @else
        <form action="{{ route('posts.likes', $post) }}" class="mr-1" method="post">
           @csrf 
           @method('DELETE')
        <button class="text-red-500" type="submit">Unlike</button>
        </form>
     @endif
     @endauth
    <span>{{  $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

  </div>
 </div>