@if ($errors->any())
    <div {{ $attributes }}>
        <div class="mt-2 text-sm text-red-600">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    </div>
@endif
