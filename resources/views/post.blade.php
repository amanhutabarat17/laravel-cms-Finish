<x-front-layout>
    <x-hero
        title='{{$post->title}}'
        {{-- description="From Minim fugiat Lorem esse tempor ex cillum est ut dolore quis incididunt fugiat ut mollit." --}}
        {{-- imageUrl='{{$post->image}}' --}}
    />

    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col gap-5">
            <img src="{{ $post->image }}" alt="mockup" class="h-[300px] w-fit">
            {!! $post->content !!}
            
        </div>
    </div>
</x-front-layout>