<form method="POST" action="{{ route('profile.update.picture') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="flex items-center gap-4 mb-4">
        <!-- Show current profile picture -->
        <div class="w-20 h-20 rounded-full overflow-hidden bg-gray-300 dark:bg-gray-700">
            @if (Auth::user()->profile_picture)
                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" class="w-full h-full object-cover" alt="Profile">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=0D8ABC&color=fff&size=128" class="w-full h-full object-cover" alt="Avatar">
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Choose New Picture</label>
            <input type="file" name="profile_picture" class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
    </div>

    @error('profile_picture')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror

    <button type="submit" class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
        Upload Picture
    </button>
</form>