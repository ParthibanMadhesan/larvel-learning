<x-layout>
    <x-slot:heading>
      Register
        </x-slot:heading>
      <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form method="POST" action="/register"> Create Job

 
    <div class="border-b border-gray-900/10 pb-12">
      @csrf
      <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
          <x-form-label for="first_name">firstname</x-form-label>
          <div class="mt-2">
                  <x-form-input name="first_name" id="first_name"  placeholder="first_name" required >  </x-form-input>
                  <x-form-error name="first_name"></x-form-error>
                             
          </div>                     
        </x-form-field>

        <x-form-field>
          <x-form-label for="last_name">lastname</x-form-label>
          <div class="mt-2">
                  <x-form-input name="last_name" id="last_name"  placeholder="last_name" required >  </x-form-input>
                  <x-form-error name="last_name"></x-form-error>
                             
          </div>                     
        </x-form-field>

        <x-form-field>
          <x-form-label for="email">email</x-form-label>
          <div class="mt-2">
                  <x-form-input name="email" id="email" type="email" placeholder="email" required >  </x-form-input>
                  <x-form-error name="email"></x-form-error>
                             
          </div>                     
        </x-form-field>

        
        <x-form-field>
          <x-form-label for="password">password</x-form-label>
          <div class="mt-2">
                  <x-form-input name="password" id="password" type="password" placeholder="password"  required >  </x-form-input>
                  <x-form-error name="password"></x-form-error>
                             
          </div>                     
        </x-form-field>
        <x-form-field>
            <x-form-label for="password_confirmation">confirm password</x-form-label>
            <div class="mt-2">
                    <x-form-input name="password_confirmation" id="password_confirmation" type="password" placeholder="confirm-password" required  >  </x-form-input>
                    <x-form-error name="password_confirmation"></x-form-error>
                               
            </div>                     
          </x-form-field>

       
        {{-- <div class='mt-10'>
      @if ($errors->any())
      <ul>
        @foreach ($errors->all() as $error)
            <li class="text-red-500 italic">{{ $error }}</li>
        @endforeach
      </ul>         
      @endif
    </div> --}}
       
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
      <x-form-button >Register</x-form-button>
  </div>
  </form>

</x-layout>
    