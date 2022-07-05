<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button style="position: relative; float: right;" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Add
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link
                                id="add-body">
                                {{ __('Body') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>


                    <form method="POST" action="{{ route('dashboard') }}">
                        @csrf
                        <!-- nanme -->
                        <div>
                            <x-label for="title" :value="__('Title')" />

                            <x-input id="title" class="input is-normal" type="text" name="title" :value="old('title')" required autofocus />
                        </div>

                        <div>
                            <x-label for="author" :value="__('Author')" />

                            <x-input id="author" class="input is-normal" type="text" name="author" :value="old('author')" required autofocus />
                        </div>

                        <div id="body-list">
                            <div id="main-copy" class="field">
                                <div>
                                    <x-label for="body-1" :value="__('Body')" />
                                    <textarea class="is-normal textarea "  id="body-1"  type="textarea" name="1" :value="old('1')" required autofocus></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}">
                                {{ __('Back') }}
                            </a>

                            <x-button class="ml-4 button is-black">
                                {{ __('Register') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    i = 2
    document.getElementById("add-body").addEventListener("click", function(event){
        event.preventDefault()

        const node = document.getElementById("main-copy");
        const clone = node.cloneNode(true);

        clone.children[0].children[0].htmlFor = "body-" + i
        clone.children[0].children[1].id = "body-" + i
        // clone.children[1].children[0].htmlFor = "goal-desc-" + i
        // clone.children[1].children[1].id = "goal-desc-" + i
        // clone.children[2].children[0].htmlFor = "goal-comp-" + i
        // clone.children[2].children[1].id = "goal-comp-" + i
        i++
        document.getElementById("body-list").appendChild(clone);
    });
</script>
