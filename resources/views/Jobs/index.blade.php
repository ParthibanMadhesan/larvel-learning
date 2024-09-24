<x-layout>
<x-slot:heading>
    job page
    </x-slot:heading>
  
        <div class="space-y-4">
        @foreach($jobs as $job)
          
                <a href="/jobs/{{ $job['id'] }}" class="block border border-text-gray-300 px-4 py-3">
                   <div class=" font-bold text-blue-600 text-sm">Empname:{{$job->employer->name}}</div>
                    <div>
                    <strong class="text-parthi">{{ $job['title'] }}</strong>: {{ $job['name'] }} - {{ $job['salary'] }}
                   </div>
                </a>
          
        @endforeach

        <div>
            {{$jobs->links()}}
        </div>
    </div>
   
</x-layout>
