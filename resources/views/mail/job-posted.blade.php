<h2>
    {{$job->title}}
</h2>

<p>
    {{-- <a href="/jobs/{{ $job->id }}">view your job listing</a> --}}
    <a href="{{url('/jobs/'.$job->id)}}">view your job listing</a>
</p>