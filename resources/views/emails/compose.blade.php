@extends('layouts.app-dashboard')

@section('header', 'Compose Email')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <form method="POST" action="{{ route('emails.store') }}">
            @csrf

            <!-- Subject -->
            <div class="mb-6">
                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                    Subject
                </label>
                <input type="text"
                       id="subject"
                       name="subject"
                       value="{{ old('subject') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Enter email subject"
                       required>
                @error('subject')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Recipient List -->
            <div class="mb-6">
                <label for="recipient_list" class="block text-sm font-medium text-gray-700 mb-2">
                    Recipient List
                </label>
                <textarea id="recipient_list"
                          name="recipient_list"
                          rows="3"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Enter email addresses separated by commas (e.g., user1@example.com, user2@example.com)"
                          required>{{ old('recipient_list') }}</textarea>
                <p class="mt-1 text-sm text-gray-500">Separate multiple email addresses with commas</p>
                @error('recipient_list')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Body -->
            <div class="mb-6">
                <label for="body" class="block text-sm font-medium text-gray-700 mb-2">
                    Email Body
                </label>
                <textarea id="body"
                          name="body"
                          rows="10"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                          required>{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('dashboard.index') }}"
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Save Email
                </button>
            </div>
        </form>
    </div>
</div>

<!-- TinyMCE CDN -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#body',
        height: 400,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | \
                  alignleft aligncenter alignright alignjustify | \
                  bullist numlist outdent indent | removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>
@endsection