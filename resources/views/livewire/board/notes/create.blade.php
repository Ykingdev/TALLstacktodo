<div>
    <form wire:submit.prevent="create">
        <div class="flex flex-col">
            <div class="flex flex-col">
                <label for="title" class="text-sm font-bold text-gray-700 tracking-wide">Title</label>
                <input wire:model="title" type="text" name="title" id="title" placeholder="Enter a title" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                <label for="body" class="text-sm font-bold text-gray-700 tracking-wide">Body</label>
                <textarea wire:model="body" name="body" id="body" placeholder="Enter a body" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"> </textarea>
                @error('body') <span class="text-red-500">{{ $message }}</span>@enderror
                <label for="due_date" class="text-sm font-bold text-gray-700 tracking-wide">Due Date</label>
                <input wire:model="due_date" type="date" name="due_date" id="due_date" placeholder="Enter a due date" class="border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <button wire:click="create" type="submit">Create</button>
            </div>
        </div>
    </form>
</div>
