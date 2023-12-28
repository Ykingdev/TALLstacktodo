<div class="max-w-md mx-auto my-10 bg-white p-8 rounded-lg shadow-lg">
    <form wire:submit.prevent="create">
        <div class="space-y-4">

            <div>
                <label for="title" class="block text-lg font-semibold text-gray-700">Title</label>
                <input wire:model="title" type="text" name="title" id="title" placeholder="Enter a title" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div>
                <label for="body" class="block text-lg font-semibold text-gray-700">Body</label>
                <textarea wire:model="body" name="body" id="body" placeholder="Enter a body" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4"></textarea>
                @error('body') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div>
                <label for="due_date" class="block text-lg font-semibold text-gray-700">Due Date</label>
                <input wire:model="due_date" type="date" name="due_date" id="due_date" class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('due_date') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 rounded-md text-white text-lg font-semibold shadow-lg">Create</button>

        </div>
    </form>
</div>
