<x-app-layout>
<form action="/{{$user->username}}/update" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Profile</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div>
                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <input type="text" name="username" id="username" autocomplete="username" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{$user->username}}">
                    </div>
                    </div>
                    @error('username')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>     
                    @enderror
                </div>

                <div class="mt-2 col-span-full">
                    <label for="bio" class="block text-sm font-medium leading-6 text-gray-900">Bio</label>
                    <div>
                    <textarea id="bio" name="bio" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$user->bio}}</textarea>
                    </div>
                </div>
                <div class="mt-2 col-span-full">
                    <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                    <div class="flex items-center gap-x-3">
                        <input class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl"name="image" type="file" id="file_input" >
                        <x-button>{{ __('Save')}} </x-button>
                    </div>
                </div>
                <div>
                    <div class="mt-2 flex items-start">
                        <div class="flex items-center h-5">
                            <input name="private_account" id="private_account" type="checkbox" class="focus:ring-neutral-600 border-gray-300 rounded"{{$user->private_account ? 'checked' : ''}}>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="private_account" class="font-medium text-gray-700">{{__('Private account')}}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-10 border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
            <div class="mt-1 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="mt-2 sm:col-span-2 sm:col-start-1">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">{{__('Name')}}</label>
                    <div>
                    <input type="text" name="name" id="name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$user->name}}">
                    </div>
                    @error('name')
                        <div class="mt-2 text-sm text-red-600">{{$message}}</div>     
                    @enderror
                </div>

                <div class="mt-2 sm:col-span-2 sm:col-start-1">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div>
                        <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" value="{{$user->email}}">
                    </div>
                    @error('email')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>     
                    @enderror
                </div>

                <div class="mt-2 sm:col-span-2 sm:col-start-1">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">{{__('Password')}}</label>
                    <div>
                        <input type="password" name="password" id="password" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>     
                    @enderror
                </div>

                <div class="mt-2 sm:col-span-2 sm:col-start-1">
                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">Password confirmation</label>
                    <div>
                    <input type="password" name="password_confirmation" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password_confirmation')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>     
                    @enderror
                </div>
            </div>    
            <div class="mt-2 px-4 py-3 bg-gray-50 text-center sm:px-6">
                <x-button>{{ __('Save')}} </x-button>
            </div>
        </div>
    </div>
</form>
</x-app-layout>