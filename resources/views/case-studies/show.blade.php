@php /** @var \App\Models\CaseStudy $case_study */ @endphp
<x-front-layout>
    <section class="bg-light py-10">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 markdown">
                    <h1>{{ $case_study->title }}</h1>
                    <h3 class="text-gray-700">Étude de cas</h3>
                    <p class="lead">
                        {{ $case_study->description }}
                    </p>
                    <hr />
                    {!! \Illuminate\Support\Str::markdown($case_study->content) !!}
            </div>
        </div>
    </section>
</x-front-layout>