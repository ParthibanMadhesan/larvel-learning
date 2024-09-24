<x-layout>
    <x-slot:heading>
       Login
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
<form method="POST" action="/login">
    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
     
      <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        

        <x-form-field>
          <x-form-label for="email">email</x-form-label>
          <div class="mt-2">
                  <x-form-input name="email" id="email" type="email" :value="old('email')" placeholder="email" required >  </x-form-input>
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
      <x-form-button >login</x-form-button>
  </div>
  </form>

</x-layout>
    