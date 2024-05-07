<x-app-layout>
    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"> {{-- Start of Category --}}
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Add Category
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Please fill the necessary information to add new category in the tray.
                            </p>
                        </header>

                        {{--  --}}
                        <form method="POST" action="{{ route('category.store') }}" class="mt-6 space-y-6 forms-sample"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- Name --}}
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                    Category Name
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" type="text" required="required"
                                    autofocus="autofocus" autocomplete="name">
                                @error('name')
                                    <span class="text-danger">{{ message }}</span>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="flex items-center gap-4">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Save
                                </button>

                            </div>
                        </form>
                    </section>
                </div>
            </div> {{-- End of Add Category --}}
</x-app-layout>
