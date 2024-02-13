<div class="w-full flex justify-center relative rounded-xl overflow-hidden bg-gray-600">
    <img src="{{ Storage::url($getRecord()->background_path) }}" class=" h-40 w-full opacity-70 object-cover"
        alt="">
    @if (auth()->user()->user_type == 'provincial')
        <span
            class="text-white absolute uppercase left-4 font-bold bottom-1">{{ $getRecord()->municipality->name }}</span>
    @endif
</div>
