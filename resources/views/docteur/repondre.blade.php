@extends('docteur.template')

@section('titre')
    Repondre au client
@endsection

@section('content')
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Repondre au client
            </h2>
            <!-- CTA -->


            <!-- General elements -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Elements
            </h4>
            @if (session('status'))
                {{ session('status') }}
            @endif
            <form action="{{ route('message.store',$find->id) }}" method="post">
                @csrf
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Name</span>
                        <input name="name" value="{{ old('name', $find->name, $find->prenom) }}"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            placeholder="Jane Doe" />
                    </label>




                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Message</span>
                        <textarea name="message"
                            class="@error('message') is-invalid
                                
                            @enderror w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            rows="3" placeholder="Enter some long form content."></textarea>
@error('message')
    {{ $message }}
@enderror
                    </label>
                    <br>
                    <div class="mt-5">
                        <button
                        class="flex items-center justify-between mt-5 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                      >
                        
                    envoi
                      </button>
                    </div>
                   

                </div>
                



            </form>
        </div>
    </main>
@endsection
