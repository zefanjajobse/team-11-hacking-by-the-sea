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
                            <button style="position: relative; float: right;"
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                Add
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
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


                    <form method="POST" action="{{ route('pdf.store') }}">

                        @csrf
                        <!-- name -->
                        <div>
                            <div class="field">
                                <label class="label">student name</label>
                                <div class="control">
                                    <x-input id="studentname"
                                             class="input is-normal @error('studentname') is-invalid @enderror"
                                             type="text" name="studentname"
                                             value="{{ old('studentname') }}" required autofocus/>
                                </div>
                                @error('studentname')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <div class="field">
                                <label class="label">Studentnumber</label>
                                <div class="control">
                                    <input type="number" id="studentnumber" name="studentnumber"
                                           class="number @error('studentnumber') is-invalid @enderror"
                                           min="1" max="999999999"
                                           value="{{ old('studentnumber') }}">
                                    @error('studentnumber')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div>
                                <label for="time">{{__("Time")}}:</label>
                                <div class="label">
                                    <div class="control has-icons-left has-icons-right">
                                        <input
                                            @class ([
                                                'input',
                                                'is-danger' => $errors->get('time'),
                                            ])
                                            type="date"
                                            id="time"
                                            name="time"
                                            value={{ date('Y-m-d ') }}>
                                    </div>
                                    <div class="field">
                                        <label class="label">Student Year</label>
                                        <div class="control">
                                            <input type="number" id="studentyear" name=studentyear"
                                                   min="1" max="4"
                                                   class="number  @error('studentyear') is-invalid @enderror"
                                                   value="{{ old('studentyear') }}">
                                            @error('studentyear')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div class="field">
                                        <label class="label">Author</label>
                                        <div class="control">

                                            <x-input id="author"
                                                     class="input is-normal  @error('author') is-invalid @enderror"
                                                     type="text" name="author"
                                                     value="{{ old('author') }}" required autofocus/>
                                            @error('author')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Theme</label>
                                    <div class="control">
                                        <select type="select" id="theme" name="theme"
                                                class="select @error('theme') is-invalid @enderror"
                                                value="{{ old('theme') }}">
                                            <option value="personal development">Personal Development</option>
                                            <option value="community development">Community development</option>
                                            <option value="sustainable development">Sustainable development</option>
                                        </select>
                                        @error('theme')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="field">
                                    <label class="label @error('ec') is-invalid @enderror">EC</label>
                                    <div class="control">
                                        <select type="select" id="ec" name="ec"
                                                class="select" value="{{ old('ec') }}">
                                            <option value=1.25>1.25</option>
                                            <option value=2.5>2.5</option>
                                        </select>
                                        @error('ec')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div id="body-list">
                                    <div id="main-copy" class="field">
                                        <label class="label">Body</label>
                                        <div class="control">
                                        <textarea class="is-normal textarea @error('body') is-invalid @enderror"
                                                  id="body" type="textarea" name="body"
                                                  :value="{{ old('body') }}" required autofocus></textarea>
                                            @error('body')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <a class="button" href="{{ route('dashboard') }}">
                                        {{ __('Back') }}
                                    </a>

                                    <x-button class="ml-4 button is-success">
                                        {{ __('submit') }}
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    i = 2
    document.getElementById("add-body").addEventListener("click", function (event) {
        event.preventDefault()

        const node = document.getElementById("main-copy");
        const clone = node.cloneNode(true);

        clone.children[1].children[0].id = "body-" + i
        i++
        document.getElementById("body-list").appendChild(clone);
    });
</script>
