<x-app-layout>
    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"> {{-- Start of Update Product --}}
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Update Products
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Please fill the necessary information to update existing product.
                            </p>
                        </header>

                        <form method="POST" action="{{ route('product.update') }}" class="mt-6 space-y-6 forms-sample"
                            enctype="multipart/form-data" id="updateProductForm">
                            @csrf
                            <label for="Product Id." class="me-2">Id</label>
                            <input type="text" name="id" value="{{ $products->id }}" class="rounded-md" />
                            {{-- Name --}}
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="name">
                                    Product Name
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" type="text" value="{{ $products->name }}"
                                    required="required" autofocus="autofocus" autocomplete="name">
                                @error('name')
                                    <span class="text-danger">{{ message }}</span>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="description">
                                    Product Description
                                </label>
                                <textarea
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full form-control @error('description') is-invalid @enderror"
                                    id="description" name="description" type="text" required="required" autofocus="autofocus"
                                    autocomplete="description">{{ $products->description }}
                                </textarea>
                                @error('description')
                                    <span class="text-danger">{{ message }}</span>
                                @enderror
                            </div>


                            <div class="w-full flex gap-5">
                                {{-- Old Image --}}
                                <div class="me-5">
                                    <label class="block font-medium text-sm text-gray-700" for="oldImage">
                                        Old Image
                                    </label>
                                    <img id="oldImage" class="mt-2" style="max-width:100px; border:1px solid black;"
                                        src="{{ Storage::url($products->image) }}" alt="Old Product Image"
                                        width="100">
                                </div>

                                {{-- New Image
                                <div class="ms-5">
                                    <x-input-label for="image" :value="__('New Image')" />
                                    <img id="imagePreview" class="mt-2"
                                        style="max-width:100px; display:none; border:1px solid black;">
                                    <input id="image" name="image" type="file" class="mt-1 block w-full"
                                        accept="image/*" onchange="previewImage(event)">
                                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                                </div> --}}
                            </div>

                            {{-- <div>
                                <label class="block font-medium text-sm text-gray-700" for="image">
                                    Image
                                </label>
                                <img src="{{ Storage::url($products->image) }}" alt="Product Image" width="100">
                                <input id="image" name="image" type="file" class="mt-1 block w-full"
                                    accept="image/*">
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            </div> <!--ChatGPT 1 Working-->

                            <div>
                                <x-input-label for="image" :value="__('Image')" />
                                <input id="image" name="image" type="file"
                                    value="{{ Storage::url($products->image) }}" class="mt-1 block w-full"
                                    accept="image/*" />
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                            </div> <!--my image idea--> --}}


                            {{-- Status --}}

                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="product_status">
                                    Status
                                </label>
                                <select id="status" name="product_status"
                                    class="mt-1 block w-half     form-control @error('product_status') is-invalid @enderror">
                                    <option value="">--Select a status--</option>
                                    <option value="in-stock"
                                        {{ $products->product_status == 'in-stock' ? 'selected' : '' }}>In-stock
                                    </option>
                                    <option value="out-of-stock"
                                        {{ $products->product_status == 'out-of-stock' ? 'selected' : '' }}>
                                        Out-of-stock</option>
                                </select>
                                @error('product_status')
                                    <span class="text-danger">{{ message }}</span>
                                @enderror
                            </div>


                            {{-- Price --}}
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="price">
                                    Price
                                </label>
                                <input
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-half form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" type="text" value="{{ $products->price }}"
                                    required="required" autofocus="autofocus" autocomplete="price">
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
            </div> {{-- End of Update Product --}}
</x-app-layout>

<script>
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
