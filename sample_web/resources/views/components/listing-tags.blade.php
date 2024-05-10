{{-- @props(['tagsCsv'])
@php
    $tags=explode(',',$tagsCsv);
@endphp
<ul class="flex">
    @foreach ($tags as $tag)
    <li
    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
>
    <a href="/?tag={{ $tag }}">{{  $tag }}</a>
</li>   
    @endforeach
   
    
</ul> --}}

@props(['tagsCsv'])
@php
    $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex flex-wrap gap-2">
    @foreach ($tags as $tag)
        <li class="inline-flex items-center justify-center bg-black text-white rounded-full py-1 px-3 text-xs">
            <a href="/?tag={{ $tag }}" class="hover:text-lg transition-all duration-300">{{ $tag }}</a>
        </li>
    @endforeach
</ul>

