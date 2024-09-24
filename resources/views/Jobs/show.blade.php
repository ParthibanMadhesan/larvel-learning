<x-layout>
    <x-slot:heading>
        job
        </x-slot:heading>
        <h1 class="font-bold text-lg " > 
            {{$job->title}}
        </h1>
        <p>this job pays {{$job->salary}} per year</p>


        @can('edit',$job)
        <p class="mt-6">
            <x-button href="/jobs/{{$job->id}}/edit">Edit job</x-button>
         </p>
        @endcan
        
    </x-layout>