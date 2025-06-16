<x-front-layout>
    <x-hero
        title="Welcome to my web"
        description="From Minim fugiat Lorem esse tempor ex cillum est ut dolore quis incididunt fugiat ut mollit."
        buttonText="About Me"
        buttonUrl="#"
        imageUrl="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png"
    />

    <div class="container mx-auto px-4 py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <x-post-card
                    :image="$post['image']" 
                    :title="$post['title']" 
                    :content="Illuminate\Support\Str::limit($post['content'], 100, '...')"
                    :slug="$post['slug']"
                />
            @endforeach
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-front-layout>