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
                    <form method="POST" action="{{ route('dashboard') }}">
                        @csrf
                        <!-- nanme -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="input is-normal" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <button id="add-goal">Add new goal</button>

                        <div id="extra">
                            <div id="to-copy" class="field">
                                <div>
                                    <x-label for="goal-1" :value="__('Goal title')" />
                                    <x-input class="input is-normal"  id="goal-1"  type="text" name="1" :value="old('1')" required autofocus />
                                </div>
                                <div>
                                    <x-label for="goal-desc-1" :value="__('Goal description')" />
                                    <x-input class="input is-normal"  id="goal-desc-1"  type="text" name="1" :value="old('1')" required autofocus />
                                </div>
                                <div>
                                    <x-label for="goal-comp-1" :value="__('Completion')" />
                                    <x-input id="goal-comp-1" class="input is-normal" type="text" name="1" :value="old('1')" required autofocus />
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}">
                                {{ __('Back') }}
                            </a>

                            <x-button class="ml-4">
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
    document.getElementById("add-goal").addEventListener("click", function(event){
        event.preventDefault()

        const node = document.getElementById("to-copy");
        const clone = node.cloneNode(true);

        clone.children[0].children[0].htmlFor = "goal-" + i
        clone.children[0].children[1].id = "goal-" + i
        clone.children[1].children[0].htmlFor = "goal-desc-" + i
        clone.children[1].children[1].id = "goal-desc-" + i
        clone.children[2].children[0].htmlFor = "goal-comp-" + i
        clone.children[2].children[1].id = "goal-comp-" + i
        i++
        document.getElementById("extra").appendChild(clone);
    });
</script>
