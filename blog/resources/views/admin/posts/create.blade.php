<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" required />
            <x-form.textarea name="excerpt" required />
            <x-form.textarea name="body" required />

            <x-form.field>
                <x-form.label name="category" />

                <select name="catagory_id" id="catagory_id" required>
                    @foreach (\App\Models\Catagory::all() as $catagory)
                        <option value="{{ $catagory->id }}" {{ old('catagory_id') == $catagory->id ? 'selected' : '' }}>
                            {{ ucwords($catagory->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
