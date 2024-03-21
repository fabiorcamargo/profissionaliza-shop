<x-filament-panels::page>
    <x-filament::modal width="5xl" id="myModal">
        {{-- <video class="w-full h-auto max-w-full" controls>
            <source src="https://www.youtube.com/watch?v=JJ8GKy3tap4" type="video/mp4">
            Your browser does not support the video tag.
        </video> --}}
        <div class="relative h-0 overflow-hidden max-w-full w-full" style="padding-bottom: 56.25%">
            <iframe src="https://www.youtube.com/embed/UBOj6rqRUME?autoplay=1&mute=1" frameborder="0" allowfullscreen
                class="absolute top-0 left-0 w-full h-full"></iframe>
        </div>

    </x-filament::modal>

    @push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {

        //dispatch the modal...
        @this.dispatch('open-modal', {
            id: 'myModal'
        });
    });
    </script>
    @endpush
</x-filament-panels::page>
